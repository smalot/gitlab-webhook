<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\PushModel;

/**
 * Class PushEvent
 * @package Smalot\Gitlab\Webhook\Event
 *
 * Triggered when you push to the repository except when pushing tags.
 */
class PushEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Gitlab\Webhook\Model\PushModel';
    }

    /**
     * @return PushModel
     */
    public function getData()
    {
        return $this->model;
    }
}
