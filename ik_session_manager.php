<?php

session_start();
//unset($_SESSION['cart']);
$cart = $_SESSION['cart'];
if (!isset($cart)) {
    $new_cart = new IngridsCart();
    $_SESSION['cart'] = $new_cart;
}
