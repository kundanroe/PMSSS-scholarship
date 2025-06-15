<?php
require '../vendor/autoload.php';
// Stripe API keys
\Stripe\Stripe::setApiKey('sk_test_51QU9bcRwDRIuH0C6xiNpyBecaDA5MR6nKcSmJf2mCvosk7kt4RJP7tQA4uAm8dydSrTuGrw3jt8HwQMPoYBQVool00GrZyQMc1'); // Replace with your Secret Key

// Retrieve session details
$sessionID = $_GET['session_id'];
$session = \Stripe\Checkout\Session::retrieve($sessionID);

// Log or display transaction details
$paymentIntentID = $session->payment_intent;
$customerEmail = $session->customer_details['email'];

// Save transaction details to a file or database
file_put_contents('transactions.log', "Transaction ID: $paymentIntentID\nCustomer Email: $customerEmail\n\n", FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
            padding: 20px 30px;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ffd700;
        }
        p {
            font-size: 1.2rem;
            line-height: 1.5;
        }
        .transaction-details {
            margin-top: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        .transaction-details p {
            color: #fff;
            font-size: 1rem;
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            background: #ff7f50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s ease;
        }
        .button:hover {
            background: #e6734c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉Payment Successful!🎉</h1>
        <p>Scholarship amount is credited to users account</p>
        <div class="transaction-details">
            <p><strong>Transaction ID:</strong> <?php echo $paymentIntentID; ?></p>
            <p><strong>Student Email:</strong> <?php echo $customerEmail; ?></p>
        </div>
        <a href="http://localhost/scholarshipms" class="button">Back to Home</a>
    </div>
</body>
</html>
