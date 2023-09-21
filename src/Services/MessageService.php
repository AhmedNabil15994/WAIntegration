<?php

namespace WAIntegration\Services;

use WAIntegration\Contracts\MessageContract;
use WAIntegration\WAconnection;

class MessageService implements MessageContract
{
    public $base = '/messages';
    public function send($data)
    {
        return WAconnection::startRequest($this->base.'/sendMessage','POST',$data);
    }
}
