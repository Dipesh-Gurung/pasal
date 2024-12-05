<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasal</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
<?php session_start(); ?>
    <header>
        <div class="logo">Pasal.</div>
        <div class="search-bar">
            <input id="searchInput" type="text" placeholder="Search for products" onkeyup="filterProducts()">
            <button>Search</button>
        </div>
        <div class="login-signup">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.html">Login</a>
                <a href="register.html">Sign-up</a>
            <?php endif; ?>
        </div>
        <div class="cart">
            <a href="cart.php"><img src="cart.svg" alt="Cart"><span id="cart-counter">
                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
            </span></a>
        </div>
    </header>

    <section class="banner">
        <img src="samsung.png" alt="Samsung Galaxy Z Fold6 | Z Flip6">
    </section>

    <section class="laptops">
        <h2>Laptops</h2>
        <div class="explore-all"><a href="#">Explore All</a></div>
        <div class="products">
            <?php
            // Mock data for products
            $products = [
                [
                    'brand' => 'Apple',
                    'name' => 'Apple MacBook Air M1',
                    'price' => 'Rs 1,45,000',
                    'old_price' => 'Rs 1,50,000',
                    'discount' => '3.33%',
                    'image' => 'mac.jpg'
                ],
                
                [
                    'brand' => 'Microsoft',
                    'name' => 'Microsoft Surface Laptop 5',
                    'price' => 'Rs 2,55,000',
                    'old_price' => 'Rs 2,76,000',
                    'discount' => '7.27%',
                    'image' => 'microsoft.webp'
                ],
                [
                    'brand' => 'Huawei',
                    'name' => 'Huawei MateBook X Pro 2023',
                    'price' => 'Rs 2,33,000',
                    'old_price' => 'Rs 2,48,000',
                    'discount' => '6.04%',
                    'image' => 'huawei.webp'
                ],
                [
                    'brand' => 'Microsoft',
                    'name' => 'Microsoft Surface Pro 9',
                    'price' => 'Rs 2,05,000',
                    'old_price' => 'Rs 2,25,000',
                    'discount' => '8.88%',
                    'image' => 'tab.webp'
                ],
                [
                    'brand' => 'Asus',
                    'name' => 'Asus ROG Strix SCAR 18',
                    'price' => 'Rs 1,25,000',
                    'old_price' => 'Rs 1,50,000',
                    'discount' => '8.88%',
                    'image' => 'Asus.jpg'
                ],
                [
                    'brand' => 'Microsoft',
                    'name' => 'Microsoft Surface Pro 9',
                    'price' => 'Rs 2,05,000',
                    'old_price' => 'Rs 2,25,000',
                    'discount' => '8.88%',
                    'image' => 'tab.webp'
                ],
                [
                    'brand' => 'Microsoft',
                    'name' => 'Microsoft Surface Pro 9',
                    'price' => 'Rs 2,05,000',
                    'old_price' => 'Rs 2,25,000',
                    'discount' => '8.88%',
                    'image' => 'tab.webp'
                ],
                [
                    'brand' => 'Microsoft',
                    'name' => 'Microsoft Surface Pro 9',
                    'price' => 'Rs 2,05,000',
                    'old_price' => 'Rs 2,25,000',
                    'discount' => '8.88%',
                    'image' => 'tab.webp'
                ]
            ];

            // Loop through the products and display them
            foreach ($products as $product) {
                echo '<div class="product">';
                echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                echo '<h3>' . $product['brand'] . '</h3>';
                echo '<p>' . $product['name'] . '</p>';
                echo '<p class="price">' . $product['price'] . '</p>';
                echo '<p class="old-price">' . $product['old_price'] . ' <span class="discount">' . $product['discount'] . '</span></p>';
                echo '<form method="post" action="add_to_cart.php">';
                echo '<input type="hidden" name="product" value="' . htmlspecialchars(json_encode($product)) . '">';
                echo '<button type="submit" class="add-to-cart">Add to cart</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
    <style>
        footer {
    background-color: #f8f9fa; /* Light background for better readability */
    padding: 20px;
    text-align: center;
    border-top: 1px solid #e9ecef; /* Subtle border to separate footer */
}

.footer-text {
    font-family: 'Arial', sans-serif; /* Simple, readable font */
    font-size: 16px;
    color: #333; /* Darker text color for contrast */
    line-height: 1.6; /* Increased line height for readability */
    margin-bottom: 15px; /* Space between paragraphs */
}

.footer-text:last-child {
    font-weight: bold; /* Make the copyright text bold */
    margin-bottom: 0; /* Remove bottom margin on the last paragraph */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

    </style>
    <footer>
    <div class="container">
        <p class="footer-text">This website was created to demonstrate my problem-solving abilities and how various development logics come together to form a cohesive product. With a strong foundation in frontend development, PHP for backend , database interaction, Bootstrap , and API integration, I can design and develop well-rounded, user-centric web applications.</p>
        <p class="footer-text">The key to the success of my projects lies in understanding the psychology of completing tasks, from the initial concept to the final product. I focus on the start-to-end perception of a project, ensuring that every step is meticulously thought out and implemented.</p>
        <p class="footer-text">The whole website is built around daily user interactions. From user registration and login, product searches, adding items to the cart, removing items, logging out, and finally, checking out—these are the essential features I’ve implemented. While other features can be added, mastering these essential parts is critical, and it’s something I’ve learned through experience.</p>
        <p class="footer-text">&copy; 2024 Pasal. All Rights Reserved.</p>
    </div>
</footer>


    <script src="script.js"></script>
</body>
</html>
