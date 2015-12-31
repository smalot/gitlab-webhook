<?php

namespace Smalot\Gitlab\Webhook;

use Smalot\Gitlab\Webhook\Event\EventBase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Webhook
 * @package Smalot\Gitlab\Webhook
 */
class Webhook
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     */
    protected $payload;

    /**
     * @var array
     */
    protected $eventMap;

    /**
     * Webhook constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher = null)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->eventMap = array();
    }

    /**
     * @param string $event
     * @return string
     */
    public function getEventClassName($event)
    {
        $map = $this->getEventMap();

        return $map[$event];
    }

    /**
     * @return array
     */
    public function getDefaultEventNames()
    {
        return array(
            'push',
            'tag_push',
            'issue',
        );
    }

    /**
     * @return array
     */
    public function getEventMap()
    {
        if (empty($this->eventMap)) {
            $this->eventMap = array();
            $namespace = '\\Smalot\\Gitlab\\Webhook\\Event\\';
            $eventNames = $this->getDefaultEventNames();

            $classNames = array_map(
                function ($event) use ($namespace) {
                    $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $event)));

                    return $namespace . $className . 'Event';
                },
                $eventNames
            );

            $this->eventMap = array_combine($eventNames, $classNames);
        }

        return $this->eventMap;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isValidRequest(Request $request)
    {
        try {
            $valid = $this->checkSecurity($request);
        } catch (\Exception $e) {
            return false;
        }

        return $valid;
    }

    /**
     * @param Request $request
     * @param bool $dispatch
     * @return EventBase
     *
     * @throws \InvalidArgumentException
     */
    public function parseRequest(Request $request, $dispatch = true)
    {
        if (!$this->checkSecurity($request)) {
            throw new \InvalidArgumentException('Invalid security checksum header.');
        }

        if ($className = $this->getEventClassName($this->eventName)) {
            $event = new $className($this->eventName, $this->payload);
        } else {
            throw new \InvalidArgumentException('Unknown event type.');
        }

        if (null !== $this->eventDispatcher && $dispatch) {
            $this->eventDispatcher->dispatch(Events::WEBHOOK_REQUEST, $event);
        }

        return $event;
    }

    /**
     * @param Request $request
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    protected function checkSecurity(Request $request)
    {
        // Reset any previously payload set.
        $this->eventName = $this->payload = null;

        // Extract Gitlab headers from request.
        $event = (string) $request->headers->get('X-Gitlab-Event');
        $payload = (string) $request->getContent();

        if (empty($event)) {
            throw new \InvalidArgumentException('Missing Gitlab headers.');
        }

        $json = json_decode($payload, true);

        $this->eventName = $json['object_kind'];
        $this->payload = $payload;

        return true;
    }
}
