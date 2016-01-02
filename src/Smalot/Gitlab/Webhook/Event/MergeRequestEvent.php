<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\MergeRequestModel;

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
    protected function getClassModel()
    {
        return '\Smalot\Gitlab\Webhook\Model\MergeRequestModel';
    }

    /**
     * @return MergeRequestModel
     */
    public function getData()
    {
        return $this->model;
    }
}
