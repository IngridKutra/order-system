<?php

class IngridsProduct
{
    public $price;
    public $title;
    public $id;
    public function __construct($price = 0, $title = "Untitled", $id = 0)
    {
        $this->price = $price;
        $this->title = $title;
        $this->id = $id;
    }
}
