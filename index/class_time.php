<?php
class Time1
{
    private $timeName;

    function __construct($timeName)
    {
        $this->timeName = $timeName;
    }

    public function setTimeName($timeName)
    {
        $this->timeName = $timeName;
    }

    public function getTimeName()
    {
        return $this->timeName;
    }
}

?>