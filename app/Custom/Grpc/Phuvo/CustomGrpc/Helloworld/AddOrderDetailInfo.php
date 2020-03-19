<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: helloworld.proto

namespace Phuvo\CustomGrpc\Helloworld;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>phuvo.customGrpc.helloworld.AddOrderDetailInfo</code>
 */
class AddOrderDetailInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 productId = 1;</code>
     */
    protected $productId = 0;
    /**
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     */
    protected $quantity = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $productId
     *     @type int $quantity
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Helloworld::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 productId = 1;</code>
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Generated from protobuf field <code>int32 productId = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setProductId($var)
    {
        GPBUtil::checkInt32($var);
        $this->productId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setQuantity($var)
    {
        GPBUtil::checkInt32($var);
        $this->quantity = $var;

        return $this;
    }

}
