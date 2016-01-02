<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\ModelBase;
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
     * @var string
     */
    protected $payload;

    /**
     * @var ModelBase
     */
    protected $model;

    /**
     * EventBase constructor.
     * @param string $eventName
     * @param string $payload
     */
    public function __construct($eventName, $payload)
    {
        $this->eventName = $eventName;
        $this->payload = $payload;

        $payload = json_decode($this->payload, true);
        $className = $this->getClassModel();
        $this->model = new $className($payload);
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return ModelBase
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    abstract protected function getClassModel();
}
