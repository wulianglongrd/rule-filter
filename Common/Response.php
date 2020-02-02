<?php
namespace RuleFilter\Common;

class Response
{
    private $enable = false;

    /**
     * filter reasons
     */
    private $reasons = [];

    public function isEnable()
    {
        return $this->enable;
    }

    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    public function getReasons()
    {
        return $this->reasons;
    }

    public function addReason($reason)
    {
        array_push($this->reasons, $reason);
    }
}
