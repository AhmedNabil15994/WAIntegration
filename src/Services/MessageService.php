<?php

namespace WaIntegration\Services;

use WaIntegration\Contracts\MessageContract;
use WAIntegration\WAconnection;

class MessageService implements MessageContract
{
    public $base = '/messages';
    public function send($data)
    {
        return WAconnection::startRequest($this->base.'/sendMessage',$data);
    }
}
