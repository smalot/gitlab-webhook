<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class ModelBase
 * @package Smalot\Gitlab\Webhook\Model
 */
class ModelBase
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * EventBase constructor.
     * @param array $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getObjectKind()
    {
        return $this->payload['object_kind'];
    }
}
