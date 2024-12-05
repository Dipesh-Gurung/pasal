<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles1.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    
    <main>
        <section class="checkout-form container">
            <h2>Checkout</h2>
            <form id="payment-form">
                <div id="card-element"></div>
                <button type="submit" id="submit">Pay Now</button>
                <div id="payment-result"></div>
            </form>
        </section>
    </main>

    <script>
        const stripe = Stripe('YOUR_STRIPE_PUBLISHABLE_KEY');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const {clientSecret} = await fetch('process_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
            }).then((r) => r.json());

            const {error, paymentIntent} = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                },
            });

            const paymentResult = document.getElementById('payment-result');
            if (error) {
                paymentResult.textContent = `Payment failed: ${error.message}`;
            } else {
                paymentResult.textContent = 'Payment succeeded!';
                window.location.href = 'order_confirmation.php';
            }
        });
    </script>
</body>
</html>
