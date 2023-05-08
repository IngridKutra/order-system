<?php

function ik_create_custom_db_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'ik_orders';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        order_id INTEGER NOT NULL AUTO_INCREMENT,
        time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        order_status INTEGER NOT NULL,
        user TINYTEXT NOT NULL,
		PRIMARY KEY  (order_id)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}


