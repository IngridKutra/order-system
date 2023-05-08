<?php

class IngridsCart
{
    public $products;
    public function __construct($products = [])
    {
        $this->products = $products;
    }
    public function sumTotal()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $product_price = $product->price;
            $totalPrice += $product_price;
        }
        return $totalPrice;
    }
    public function cartIsEmpty()
    {
        if (count($this->products) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
