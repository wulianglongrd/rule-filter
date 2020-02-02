<?php
namespace RuleFilter\Common;

class Request
{
    private $payload = [];

    public function getPayload()
    {
        return $this->payload;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }
}
