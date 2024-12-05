<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = json_decode($_POST['product'], true);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    header("Location: index.php");
    exit;
}
?>
