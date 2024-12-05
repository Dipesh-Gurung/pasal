<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">Pasal.</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for products">
            <button>Search</button>
        </div>
        <div class="login-signup">
            <a href="#">Login / Sign-up</a>
        </div>
        <div class="cart">
            <a href="cart.php"><img src="cart.svg" alt="Cart"><span id="cart-counter">
                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
            </span></a>
        </div>
    </header>

    <section class="order-confirmation">
        <h2>Thank You for Your Order!</h2>
        <p>Your payment was successful, and your order is now being processed.</p>
        <p>Order Summary:</p>
        <ul>
            <?php foreach ($_SESSION['cart'] as $product): ?>
                <li><?php echo $product['name'] . ' - ' . $product['price']; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php $_SESSION['cart'] = []; // Clear the cart after order confirmation ?>
    </section>
</body>
</html>
