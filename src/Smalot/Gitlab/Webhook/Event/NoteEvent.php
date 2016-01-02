<?php

namespace Smalot\Gitlab\Webhook\Event;

use Smalot\Gitlab\Webhook\Model\NoteModel;

/**
 * Class NoteEvent
 * @package Smalot\Gitlab\Webhook\Event
 *
 * Triggered when a new comment is made on commits, merge requests, issues, and code snippets.
 * The note data will be stored in object_attributes (e.g. note, noteable_type).
 * The payload will also include information about the target of the comment.
 * For example, a comment on a issue will include the specific issue information under the issue key.
 *
 * Valid target types:
 * - commit
 * - merge_request
 * - issue
 * - snippet
 */
class NoteEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Gitlab\Webhook\Model\NoteModel';
    }

    /**
     * @return NoteModel
     */
    public function getData()
    {
        return $this->model;
    }
}
