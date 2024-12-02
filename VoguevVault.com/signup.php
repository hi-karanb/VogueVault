<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="signup"><h1>Sign Up Here!</h1></div>
        <form action="signup.php" method="POST">
        <label for="username">Username:</label><br>
            <input type="username" id="username" name="username" required><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Sign Up</button>
        </form>
        <br>
        <p style="text-align:center;">Already have an acount?
        <a href="signin.php">Login! </a> <br>

        <?php
        include('db.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            
            $sql = "INSERT INTO users (username, password) VALUES('$username', '$password')";

            if($conn->query ($sql) === TRUE) {
                echo "<p class='success'>New record created successfully</p>";
            } else {
                echo"<p class='error'>Error: ". $sql . "<br>" . $conn->error."</p>";
            }
        }
        $conn->close();
        ?>
    </div>
 
</body>
</html>
