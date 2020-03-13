<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2015 gRPC authors.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
namespace Phuvo\CustomGrpc\Helloworld;

/**
 * The greeting service definition.
 */
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a greeting
     * @param \Phuvo\CustomGrpc\Helloworld\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHello(\Phuvo\CustomGrpc\Helloworld\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/SayHello',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\HelloRequest2 $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHello2(\Phuvo\CustomGrpc\Helloworld\HelloRequest2 $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/SayHello2',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHelloAgain(\Phuvo\CustomGrpc\Helloworld\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/SayHelloAgain',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\GetProductListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetProductList(\Phuvo\CustomGrpc\Helloworld\GetProductListRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/GetProductList',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\GetProductListResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\AddProductRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AddProduct(\Phuvo\CustomGrpc\Helloworld\AddProductRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/AddProduct',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\AddProductResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\DeleteProductRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeleteProduct(\Phuvo\CustomGrpc\Helloworld\DeleteProductRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/DeleteProduct',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\DeleteProductResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\ShowProductRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ShowProduct(\Phuvo\CustomGrpc\Helloworld\ShowProductRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/ShowProduct',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\ShowProductResponse', 'decode'],
        $metadata, $options);
    }

}
