<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\IssueModel;

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
    protected function getClassModel()
    {
        return '\Smalot\Gitlab\Webhook\Model\IssueModel';
    }

    /**
     * @return IssueModel
     */
    public function getData()
    {
        return $this->model;
    }
}
