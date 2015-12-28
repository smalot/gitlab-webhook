<?php

namespace Smalot\Gitlab\Webhook\Event;

/**
 * Class MergeRequestEvent
 * @package Smalot\Gitlab\Webhook\Event
 *
 * Triggered when a new merge request is created, an existing merge request
 * was updated/merged/closed or a commit is added in the source branch.
 */
class MergeRequestEvent extends EventBase
{
    /**
     * @return string
     */
    public function getEventName()
    {
        return 'merge_request';
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
    public function getObjectAttributes()
    {
        return $this->payload['object_attributes'];
    }
}
