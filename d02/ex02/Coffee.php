<?php

include_once 'HotBeverage.php';

class Coffee extends HotBeverage
{
    private $description = "coffee";
    private $how = "water and coffee bean";

    public function getDescription()
    {
        return $this->description;
    }

    public function getHow()
    {
        return $this->how;
    }


}