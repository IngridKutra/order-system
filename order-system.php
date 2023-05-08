<?php

/**
 * Plugin Name: Ordersystem
 * Version: 1.0
 * Author: Ingrida Kutriene
 * Description: Labb 2 Ordersystem
 */


/*
1. skapa custom post type för våra produkter !!KLAR!!
2. lägg till custom fields för att ange ett pris !!KLAR!!
3. starta en session för att hålla reda på vad som finns i kundvagnen !!KLAR!!
4. skapa en class som heter cart som kan innehålla produkter/books !!KLAR!!
5. lägg till en knapp på vår custom post types som lägger till produkten i kundvagnen !!KLAR!!
6. skapa en widget som visara alla varor som finns i kundvagnen, och har en beställningsknapp ????
7. klicka på beställ -> lägg till ordern i databasen !!KLAR!!
8. visa upp alla ordrar på en adminsida i wp-admin
9. lägg till funktionalitet så att det går att ändra status på ordern
*/

include 'ik_product.php';
include 'ik_cart.php';
include 'ik_session_manager.php';
include 'ik_handle_widget.php';
include 'ik_handle_post_type.php';
include 'ik_create_db_table.php';
include 'admin/ik_register_admin_menu.php';

//Skapa databas tabell
register_activation_hook(__FILE__, 'ik_create_custom_db_table');
//register_activation_hook(__FILE__, 'ik_delete_data'); //Kommentera ut denna innan produktion
//register_activation_hook(__FILE__, 'ik_install_data');