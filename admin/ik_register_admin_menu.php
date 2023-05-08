<?php

include 'ik_admin_option_page.php';

function ik_add_admin_menu()
{
    add_menu_page('Ingrids ordersystem', 'Ingrids ordrar', 'manage_options', 'ik_order_system', 'ik_render_option_page', '', null);
}

add_action('admin_menu', 'ik_add_admin_menu');
