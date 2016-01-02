<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class IssueModel
 * @package Smalot\Gitlab\Webhook\Model
 *
 * Triggered when a new issue is created or an existing issue was updated/closed/reopened.
 */
class IssueModel extends ModelBase
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
