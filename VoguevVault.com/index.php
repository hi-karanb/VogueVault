<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right,#ffcccc, #feb47b);
            color: #333;
            line-height: 1.6;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container styles */
        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            padding: 40px;
            text-align: center;
            transition: transform 0.3s ease;
            
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 20px 10px white;
        }

        /* Header/Navbar styles */
        header {
    background-color: #ffcccc;
    color: #333;
    padding: 1em 0;
    text-align: center;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 10px 0;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover {
            color: #feb47b;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffcccc;;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #ff7e5f;
        }

        /* Content styles */
        .content {
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            </a>
            <div class="auth-buttons">
                <a href="signup.php" class="button">Sign Up</a>
                <a href="signin.php" class="button">Sign In</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container">
            <h1>Welcome to Our Website</h1>
        </div>
    </div>
</body>
</html>