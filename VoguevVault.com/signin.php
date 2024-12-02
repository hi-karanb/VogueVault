<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="signup"><h1>Login Here!</h1></div>
        <form action="signin.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="username" id="username" name="username" required><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <button type="submit"> Sign In </button>
        </form>
        <br>
        <p style="text-align:center;">Don't have an acount?
        <a href="signup.php">Sign Up! </a> <br>

        <?php
        include('db.php');
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: main.php");
                } else {
                    echo "<p class='error'>Invalid password</p>";
                }
            } else {
                echo "<p class='error'>No user found</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
