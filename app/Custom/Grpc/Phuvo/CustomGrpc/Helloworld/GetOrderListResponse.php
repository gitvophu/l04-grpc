<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: helloworld.proto

namespace Phuvo\CustomGrpc\Helloworld;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>phuvo.customGrpc.helloworld.GetOrderListResponse</code>
 */
class GetOrderListResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 code = 1;</code>
     */
    protected $code = 0;
    /**
     * Generated from protobuf field <code>string message = 2;</code>
     */
    protected $message = '';
    /**
     * Generated from protobuf field <code>repeated .phuvo.customGrpc.helloworld.Order order = 3;</code>
     */
    private $order;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $code
     *     @type string $message
     *     @type \Phuvo\CustomGrpc\Helloworld\Order[]|\Google\Protobuf\Internal\RepeatedField $order
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Helloworld::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 code = 1;</code>
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Generated from protobuf field <code>int32 code = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setCode($var)
    {
        GPBUtil::checkInt32($var);
        $this->code = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string message = 2;</code>
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Generated from protobuf field <code>string message = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->message = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .phuvo.customGrpc.helloworld.Order order = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Generated from protobuf field <code>repeated .phuvo.customGrpc.helloworld.Order order = 3;</code>
     * @param \Phuvo\CustomGrpc\Helloworld\Order[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOrder($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Phuvo\CustomGrpc\Helloworld\Order::class);
        $this->order = $arr;

        return $this;
    }

}

