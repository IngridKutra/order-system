<?php

function ik_render_option_page()
{
?>
    <div class="wrap">
        <h2>Ordersystem</h2>
    </div>
    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'ik_orders';

    $orders = $wpdb->get_results("SELECT * FROM $table_name");
    $statuses = ['Recieved', 'Cancelled', 'Shipped', 'Delivered'];

    foreach ($orders as $order) {
    ?>
        <h3>Order ID: <?php echo $order->order_id; ?></h3>
        <p>Beställningsdatum: <?php echo $order->time; ?></p>
        <p>Beställare: <?php echo $order->user; ?></p>
        <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order->order_id; ?>">
            <select name="order_status">
                <?php
                foreach ($statuses as $index => $status) {
                    if ($index == $order->order_status) {
                ?>
                        <option value="<?php echo $index; ?>" selected><?php echo $status; ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="<?php echo $index; ?>"><?php echo $status; ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Uppdatera status">
            <input type="submit" name="delete" value="Ta bort order">
        </form>
<?php
    }
}

if (isset($_POST['submit'])) {
    if (isset($_POST['order_status'])) {
        $status = $_POST['order_status'];
        $order_id = $_POST['order_id'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'ik_orders';
        $wpdb->update(
            $table_name,
            array(
                'order_status' => $status,
            ),
            array(
                'order_id' => $order_id,
            )
        );
    }
}

if (isset($_POST['delete'])) {
    $order_id = $_POST['order_id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'ik_orders';
    $wpdb->query("DELETE FROM $table_name WHERE order_id = " . $order_id . "");
}
