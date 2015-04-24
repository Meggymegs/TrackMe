<?php
class Rep
{
    private $repName;

    function __construct($repName)
    {
        $this->repName = $repName;
    }

    public function setRepName($repName)
    {
        $this->repName = $repName;
    }

    public function getRepName()
    {
        return $this->repName;
    }
}

?>