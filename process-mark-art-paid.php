<?php

// Create a database connection
$mysqli = require __DIR__ . '/database.php';

// Get the order id from the session
$_SESSION['order_id'] = $_POST['order_id'];

// Update the isPaid field in art_orders to 1
$sql = "UPDATE art_orders SET isPaid = 1 WHERE id = '$_SESSION[order_id]'";

// Execute the update query and redirect the artist back to the art orders page
if ($mysqli->query($sql) === TRUE) {
    // redirect to order.php?id={$_SESSION['user_id']}
    header("Location: artist-orders.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
