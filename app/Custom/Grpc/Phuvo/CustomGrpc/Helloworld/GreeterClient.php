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

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\AddUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AddUser(\Phuvo\CustomGrpc\Helloworld\AddUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/AddUser',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\AddUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\GetUserListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetUserList(\Phuvo\CustomGrpc\Helloworld\GetUserListRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/GetUserList',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\GetUserListResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\DeleteUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeleteUser(\Phuvo\CustomGrpc\Helloworld\DeleteUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/DeleteUser',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\DeleteUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\ShowUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ShowUser(\Phuvo\CustomGrpc\Helloworld\ShowUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/ShowUser',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\ShowUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\AddNppRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AddNpp(\Phuvo\CustomGrpc\Helloworld\AddNppRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/AddNpp',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\AddNppResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\GetNppListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetNppList(\Phuvo\CustomGrpc\Helloworld\GetNppListRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/GetNppList',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\GetNppListResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\DeleteNppRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeleteNpp(\Phuvo\CustomGrpc\Helloworld\DeleteNppRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/DeleteNpp',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\DeleteNppResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Phuvo\CustomGrpc\Helloworld\ShowNppRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ShowNpp(\Phuvo\CustomGrpc\Helloworld\ShowNppRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/phuvo.customGrpc.helloworld.Greeter/ShowNpp',
        $argument,
        ['\Phuvo\CustomGrpc\Helloworld\ShowNppResponse', 'decode'],
        $metadata, $options);
    }

}
