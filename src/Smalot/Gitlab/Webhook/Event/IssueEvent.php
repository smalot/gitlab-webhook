<?php

namespace Smalot\Gitlab\Webhook\Event;

/**
 * Class IssueEvent
 * @package Smalot\Gitlab\Webhook\Event
 *
 * Triggered when a new issue is created or an existing issue was updated/closed/reopened.
 */
class IssueEvent extends EventBase
{
    /**
     * @return string
     */
    public function getEventName()
    {
        return 'issue';
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return $this->payload['user'];
    }

    /**
     * @return array
     */
    public function getRepository()
    {
        return $this->payload['repository'];
    }

    /**
     * @return array
     */
    public function getObjectAttributes()
    {
        return $this->payload['object_attributes'];
    }
}
