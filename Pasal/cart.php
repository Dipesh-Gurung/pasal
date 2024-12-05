<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
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

    <section class="cart-items">
        <h2>Shopping Cart</h2>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <ul class="cart-list">
                <?php foreach ($_SESSION['cart'] as $index => $product): ?>
                    <li class="cart-item">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <div class="product-details">
                            <h3><?php echo $product['brand']; ?></h3>
                            <p><?php echo $product['name']; ?></p>
                            <p class="price"><?php echo $product['price']; ?></p>
                            <form method="post" action="remove_cart.php">
                                <input type="hidden" name="productIndex" value="<?php echo $index; ?>">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="checkout-button">
                <a href="checkout.php">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </section>
</body>
</html>
