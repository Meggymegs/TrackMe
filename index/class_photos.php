<?php

//This is the Cards class
class Card
{
    private $cardName;

    function __construct($cardName)
    {
        $this->cardName = $cardName;
    }

    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
    }

    public function getCardName()
    {
        return $this->cardName;
    }
}

?>