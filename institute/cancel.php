<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Canceled</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #ff7e5f, #feb47b);
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
            padding: 20px 30px;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ff4c4c;
        }
        p {
            font-size: 1.2rem;
            line-height: 1.5;
            color: #555;
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
        .icon {
            font-size: 4rem;
            color: #ff4c4c;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">❌</div>
        <h1>Payment Canceled</h1>
        <p>You canceled the payment process. If this was a mistake, you can try again.</p>
        <a href="http://localhost/scholarshipms" class="button">Back to Home</a>
    </div>
</body>
</html>
