<?php

function ik_create_post_type()
{
    register_post_type('products', array(
        'labels' => array(
            'name' => 'Products',
            'singular_name' => 'Product'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
    ));
}

add_action('init', 'ik_create_post_type');


function add_button_to_post($content)
{
    if (in_array(get_post()->post_type, ['products'])) {
        $price = get_post_meta(get_the_ID(), 'price_of_product')[0];
        $title = get_the_title();
        $form = '<form action="" method="post"><input name="price" value="' . $price . '" type="hidden"><input name="title" value="' . $title . '" type="hidden"><input value="Lägg till i kundvagnen" name="submit" type="submit"/></form>';
        return $content . $form;
    } else {
        return $content;
    }
}

add_filter('the_content', 'add_button_to_post');


if (isset($_POST['submit'])) {
    if (isset($_POST['price']) && isset($_POST['title'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $cart = $_SESSION['cart'];
        $product = new IngridsProduct($price, $title);
        array_push($cart->products, $product);
        $_SESSION['cart'] = $cart;
    }
}
