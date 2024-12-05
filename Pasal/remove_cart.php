<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['productIndex'])) {
        $productIndex = $_POST['productIndex'];

        // Check if the cart is set and the productIndex is valid
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$productIndex])) {
            // Remove the product from the cart
            unset($_SESSION['cart'][$productIndex]);
            // Reindex the cart array
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
