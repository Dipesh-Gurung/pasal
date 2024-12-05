<?php
session_start();
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

// Calculate total amount
$totalAmount = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalAmount += (int) $product['price']; // Ensure price is an integer
}

header('Content-Type: application/json');

try {
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $totalAmount * 100, // Convert to smallest currency unit
        'currency' => 'usd',
        'metadata' => [
            'integration_check' => 'accept_a_payment',
        ],
    ]);

    echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
