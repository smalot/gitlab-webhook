<?php

namespace Smalot\Gitlab\Webhook\Event;

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
    public function getEventName()
    {
        return 'push';
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
     * @return string
     */
    public function getRef()
    {
        return $this->payload['ref'];
    }

    /**
     * @return string
     */
    public function getCheckoutSha()
    {
        return $this->payload['checkout_sha'];
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->payload['message'];
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
     * @return string
     */
    public function getUserEmail()
    {
        return $this->payload['user_email'];
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
