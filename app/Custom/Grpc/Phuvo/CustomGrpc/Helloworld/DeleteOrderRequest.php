<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: helloworld.proto

namespace Phuvo\CustomGrpc\Helloworld;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>phuvo.customGrpc.helloworld.DeleteOrderRequest</code>
 */
class DeleteOrderRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     */
    protected $order_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $order_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Helloworld::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setOrderId($var)
    {
        GPBUtil::checkInt32($var);
        $this->order_id = $var;

        return $this;
    }

}

