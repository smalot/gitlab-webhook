<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class MergeRequestModel
 * @package Smalot\Gitlab\Webhook\Model
 *
 * Triggered when a new merge request is created, an existing merge request
 * was updated/merged/closed or a commit is added in the source branch.
 */
class MergeRequestModel extends ModelBase
{
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
