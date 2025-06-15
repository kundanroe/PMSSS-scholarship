<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            padding: 15px 0;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .navbar-brand {
            font-size: 28px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            display: flex;
            align-items: center;
        }

        .navbar .navbar-brand i {
            margin-right: 8px;
            color: #ffc107;
            font-size: 32px;
        }

        .navbar-toggler {
            border: none;
            color: #ffffff;
        }

        .navbar-toggler .oi-menu {
            font-size: 24px;
        }

        .navbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin: 0 12px;
        }

        .navbar-nav .nav-item .nav-link {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
            border-radius: 25px;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background: #ffc107;
            color: #0f2027;
            transform: scale(1.1);
        }

        .navbar-nav .nav-item.active .nav-link {
            background: #ffc107;
            color: #0f2027;
            font-weight: bold;
        }

        .navbar-nav .cta .nav-link {
            background: #ffffff;
            color: #0f2027;
            border: 2px solid #ffc107;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        .navbar-nav .cta .nav-link:hover {
            background: #ffc107;
            color: #ffffff;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="flaticon-university"></i>ASHAVRITI (PMSSS)
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="schemes.php" class="nav-link">Schemes</a></li>
                    <li class="nav-item"><a href="admin/login.php" class="nav-link">SAG Bureau</a></li>
                    <li class="nav-item"><a href="institute/login.php" class="nav-link">Institutions</a></li>
                    <li class="nav-item"><a href="finance/login.php" class="nav-link">Finance Bureau</a></li>
                    <li class="nav-item cta"><a href="users/login.php" class="nav-link"><span>Student Registration/Login!</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
