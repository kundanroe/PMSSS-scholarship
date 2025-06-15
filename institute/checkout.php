<?php
require '../vendor/autoload.php';

// Stripe API keys
\Stripe\Stripe::setApiKey('sk_test_51QU9bcRwDRIuH0C6xiNpyBecaDA5MR6nKcSmJf2mCvosk7kt4RJP7tQA4uAm8dydSrTuGrw3jt8HwQMPoYBQVool00GrZyQMc1'); // Replace with your Secret Key
// Create a checkout session
try {
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'inr',
                'product_data' => [
                    'name' => 'Ashavriti',
                ],
                'unit_amount' => 740000, // Price in cents (e.g., $10.00)
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost/scholarshipms/admin/success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'http://localhost/scholarshipms/admin/cancel.php',
    ]);
} catch (Exception $e) {
    echo 'Error creating checkout session: ' . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #84fab0, #8fd3f4);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
            text-align: center;
            padding: 30px 40px;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            color: #fff;
            background: #2ecc71;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .button.cancel {
            background: #e74c3c;
        }
        .button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pay Now</h1>
        <p>Click "Pay with Stripe" to proceed with the payment or "Cancel" to return.</p>
        <button id="checkout-button" class="button">Pay with Stripe</button>
        <a href="http://localhost/scholarshipms/admin/cancel.php" class="button cancel">Cancel</a>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('pk_test_51QU9bcRwDRIuH0C68rjpKqYZPdt1KOhiYuHLFspPCvOTxNn8rhpbXwDBMAdnDcJC515rDm0IVYvHKx8H2KYeX4Nu00rZ7uesTO'); // Replace with your Publishable Key
        document.getElementById('checkout-button').addEventListener('click', () => {
            stripe.redirectToCheckout({ sessionId: '<?php echo $session->id; ?>' })
                .then((result) => {
                    if (result.error) {
                        alert(result.error.message);
                    }
                });
        });
    </script>
</body>
</html>
