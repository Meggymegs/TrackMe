<?php

//This is the Food class
class Food
{
    private $foodName;
    private $calories;

    function __construct($foodName, $calories)
    {
        $this->foodName = $foodName;
		$this->calories = $calories;
    }

    public function setFoodName($foodName)
    {
        $this->foodName = $foodName;
    }

    public function getFoodName()
    {
        return $this->foodName;
    }
    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    public function getCalories()
    {
        return $this->calories;
    }
}

?>