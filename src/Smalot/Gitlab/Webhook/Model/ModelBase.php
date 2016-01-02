<?php

namespace Smalot\Gitlab\Webhook\Model;

/**
 * Class ModelBase
 * @package Smalot\Gitlab\Webhook\Model
 */
abstract class ModelBase
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
     * @return array
     */
    public function export()
    {
        return array(
            'payload' => $this->payload,
        );
    }

    /**
     * @param array $data
     */
    public function import($data)
    {
        $this->payload = $data['payload'];
    }

    /**
     * @return string
     */
    public function getObjectKind()
    {
        return $this->payload['object_kind'];
    }
}
