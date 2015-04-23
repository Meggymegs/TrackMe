<?php
class Dist
{
    private $distName;

    function __construct($distName)
    {
        $this->distName = $distName;
    }

    public function setDistName($distName)
    {
        $this->distName = $distName;
    }

    public function getDistName()
    {
        return $this->distName;
    }
}

?>