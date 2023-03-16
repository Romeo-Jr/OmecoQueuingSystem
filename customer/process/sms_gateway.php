<?php

class SmsGateway{
    
    private $host;
    private $port;

    const INVALID_HOST = 0;
    const INVALID_PARAMETERS = 1;
    const SUCCESS = 2;

    public function __construct($host, $port = 8080)
    {
        $this->host = $host;
        $this->port = $port;
    }

    public function sendMessage(int $number, string $message) 
    {
        $message = urlencode($message);
        $number = urlencode($number);
        $dest = "http://".$this->host.":".$this->port."?number=".$number."&message=".$message;
        $res = @file_get_contents($dest);
        if($res === false) {
            return SmsGateway::INVALID_HOST;
        } else {
            $res = json_decode($res);
            if ($res->status) {
                return $res->status;
            } else {
                return SmsGateway::INVALID_HOST;
            }
        }
    }

}