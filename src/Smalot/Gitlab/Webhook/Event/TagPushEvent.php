<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\TagPushModel;

/**
 * Class TagPushEvent
 * @package Smalot\Gitlab\Webhook\Event
 *
 * Triggered when you create (or delete) tags to the repository.
 */
class TagPushEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Gitlab\Webhook\Model\TagPushModel';
    }

    /**
     * @return TagPushModel
     */
    public function getData()
    {
        return $this->model;
    }
}
