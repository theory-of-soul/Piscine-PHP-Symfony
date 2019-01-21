<?php

class Tea extends HotBeverage
{
    private $description = "tea";
    private $how = "water and tea bag";
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getHow()
    {
        return $this->how;
    }
}