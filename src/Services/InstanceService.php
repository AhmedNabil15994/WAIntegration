<?php

namespace WAIntegration\Services;

use WAIntegration\Contracts\InstanceContract;
use WAIntegration\WAconnection;

class InstanceService implements InstanceContract
{
    public $base = '/instances';
    public function qr()
    {
        return WAconnection::startRequest($this->base.'/qr');
    }
    public function status()
    {
        return WAconnection::startRequest($this->base.'/status');
    }
    public function disconnect()
    {
        return WAconnection::startRequest($this->base.'/disconnect');
    }
    public function clearInstance()
    {
        return WAconnection::startRequest($this->base.'/clearInstance');
    }
    public function clearInstanceData()
    {
        return WAconnection::startRequest($this->base.'/clearInstanceData');
    }
}
