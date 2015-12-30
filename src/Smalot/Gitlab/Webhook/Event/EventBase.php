<?php

namespace Smalot\Gitlab\Webhook\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class EventBase
 * @package Smalot\Gitlab\Webhook\Event
 */
abstract class EventBase extends Event
{
    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var array
     */
    protected $payload;

    /**
     * EventBase constructor.
     * @param string $eventName
     * @param string $payload
     */
    public function __construct($eventName, $payload)
    {
        $this->eventName = $eventName;
        $this->payload = (array) json_decode($payload, true);
    }

    /**
     * @return string
     */
    abstract public function getEventName();

    /**
     * @return array
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return string
     */
    public function getObjectKind()
    {
        return $this->payload['object_kind'];
    }
}
