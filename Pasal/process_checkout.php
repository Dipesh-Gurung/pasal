<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];

    // In a real application, you'd process the payment here.
    // This is a simulation, so we'll skip payment processing.

    // Create a unique order ID
    $order_id = uniqid();

    // Save the order details in the session (or a database)
    $_SESSION['order'] = [
        'order_id' => $order_id,
        'name' => $name,
        'address' => $address,
        'city' => $city,
        'zip' => $zip,
        'items' => $_SESSION['cart'],
        'total' => array_reduce($_SESSION['cart'], function ($total, $item) {
            return $total + (float)str_replace('Rs ', '', $item['price']);
        }, 0)
    ];

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to the order confirmation page
    header('Location: order_confirmation.php');
    exit();
}
?>
