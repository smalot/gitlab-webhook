<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class TagPushModel
 * @package Smalot\Gitlab\Webhook\Model
 *
 * Triggered when you create (or delete) tags to the repository.
 */
class TagPushModel extends ModelBase
{
    /**
     * @return string
     */
    public function getRef()
    {
        return $this->payload['ref'];
    }

    /**
     * @return string
     */
    public function getBefore()
    {
        return $this->payload['before'];
    }

    /**
     * @return string
     */
    public function getAfter()
    {
        return $this->payload['after'];
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->payload['user_id'];
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->payload['user_name'];
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->payload['project_id'];
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
    public function getCommits()
    {
        return $this->payload['commits'];
    }

    /**
     * @return int
     */
    public function getTotalCommitsCount()
    {
        return $this->payload['total_commits_count'];
    }
}
