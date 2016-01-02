<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class NoteModel
 * @package Smalot\Gitlab\Webhook\Model
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
class NoteModel extends ModelBase
{
    const TYPE_COMMIT = 'Commit';
    const TYPE_MERGE_REQUEST = 'MergeRequest';
    const TYPE_ISSUE = 'Issue';
    const TYPE_SNIPPET = ' Snippet';

    /**
     * @return array
     */
    public function getUser()
    {
        return $this->payload['user'];
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
    public function getObjectAttributes()
    {
        return $this->payload['object_attributes'];
    }

    /**
     * @return string
     */
    public function getNoteableType()
    {
        return $this->payload['object_attributes']['noteable_type'];
    }

    /**
     * @return array|null
     */
    public function getTargetObject()
    {
        switch ($this->getNoteableType()) {
            case self::TYPE_COMMIT:
                return $this->payload['commit'];
            case self::TYPE_MERGE_REQUEST:
                return $this->payload['merge_request'];
            case self::TYPE_ISSUE:
                return $this->payload['issue'];
            case self::TYPE_SNIPPET:
                return $this->payload['snippet'];
        }

        return null;
    }
}
