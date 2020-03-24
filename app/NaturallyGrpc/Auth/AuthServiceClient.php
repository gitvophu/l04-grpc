<?php
// GENERATED CODE -- DO NOT EDIT!

namespace NaturallyGrpc\Auth;

/**
 * The greeting service definition.
 */
class AuthServiceClient extends \Grpc\BaseStub {

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
     * @param \NaturallyGrpc\Auth\LoginRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Login(\NaturallyGrpc\Auth\LoginRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NaturallyGrpc.Auth.AuthService/Login',
        $argument,
        ['\NaturallyGrpc\Auth\LoginResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \NaturallyGrpc\Auth\GetLoginViewDataRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetLoginViewData(\NaturallyGrpc\Auth\GetLoginViewDataRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/NaturallyGrpc.Auth.AuthService/GetLoginViewData',
        $argument,
        ['\NaturallyGrpc\Auth\GetLoginViewDataResponse', 'decode'],
        $metadata, $options);
    }

}
