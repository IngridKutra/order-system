<?php

// Creating the widget
class ik_cart_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'ik_cart_widget',

            // Widget name will appear in UI
            __('Ingrids kundvagn Widget', 'ik_cart_widget_domain'),

            // Widget description
            array('description' => __('Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        $cart = $_SESSION['cart'];
            // This is where you run the code and display the output

        foreach ($cart->products as $product) {
        
        }
        ?>
        <div class="varukorg">
        <?php
        echo 'Den totala summan är: ' . $cart->sumTotal() . " kr </br>";
        echo 'Antal böcker: ' . count($cart->products) . " </br>";
        $form = '<form action="" method="post"><input name="user" type="text" placeholder="För- och efternamn" value=""/></br><input name="place_order" type="submit" value="Lägg beställning"/><input name="empty_cart" type="submit" value="Töm varukorgen"/></form>';
        echo $form;
        echo $args['after_widget'];?></div>
        <?php
    }

    // Widget Backend
    public function form($instance)
    {
?>
        <p>
            <label><?php echo 'En widget till kundvagnen. När du lagt till den kommer din kundvagn att uppdateras!'; ?></label>
        </p>
<?php
    }
}

// Register and load the widget
function ik_load_widget()
{
    register_sidebar(array(
        'name' => 'Ingrids kundvagn sidebar',
        'id' => 'kundvagn_sidebar',
        'before_widget' => '<div id="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));
    register_widget('ik_cart_widget');
}
add_action('widgets_init', 'ik_load_widget');

if (isset($_POST["empty_cart"])) {
    $cart = $_SESSION['cart'];
    $cart->products = [];
}


if (isset($_POST["place_order"])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'ik_orders';

    $cart = $_SESSION['cart'];
    if (!$cart->cartIsEmpty()) {

        $order_status = 0;
        $user = "guest";

        $wpdb->insert(
            $table_name,
            array(
                'order_status' => $order_status,
                'user' => $user,
            )
        );
        $cart->products = [];
    }
}
