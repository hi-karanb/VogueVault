<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Products</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .container1 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
        padding: 20px; 
    }
    .add_container {
        border: 2px solid pink;
        border-radius: 10px;
        padding: 20px; 
        background-color: #f9f9f9;
        max-width: 500px; 
        width: 100%; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .add_container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .input_fields {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .submit_btn, .view_products_btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: pink;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px; 
    }

    .submit_btn:hover, .view_products_btn:hover {
        background-color: #ff66b2; 
    }

    .display_msg {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        position: relative;
    }

    .display_msg i {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    @media (max-width: 600px) {
    .add_container {
        width: 100%;
        padding: 10px;
    }

    .input_fields, .submit_btn {
        padding: 8px;
    }
}

  </style>
</head>
<body>

  <div class="container1">
  <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppingcart_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$display_msg = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    if (isset($_FILES['product_product_image']) && $_FILES['product_product_image']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['product_product_image']['tmp_name'];
        $file_name = $_FILES['product_product_image']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($file_name);

        // Validate file type
        $allowed_exts = ['jpg', 'jpeg', 'png'];
        if (!in_array($file_ext, $allowed_exts)) {
            $display_msg = "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
        } else {
            // Ensure the uploads directory exists
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Move the uploaded file
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Insert data into the database
                $sql = "INSERT INTO products (product_name, product_price, product_product_image) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $product_name, $product_price, $target_file);

                if ($stmt->execute()) {
                    $display_msg = "Product added successfully!";
                } else {
                    $display_msg = "Database error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $display_msg = "Error uploading file.";
                error_log("Failed to move uploaded file. Source: $file_tmp, Destination: $target_file");
            }
        }
    } else {
        $display_msg = "No file was uploaded or there was an upload error.";
    }
}

$conn->close();

if ($display_msg) {
    echo "<div class='display_msg'>
    <span>$display_msg</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
}
?>
<div class="add_container">
      <h2>Add Products</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="product_name" placeholder="Enter product name" class="input_fields" required>
        <input type="number" name="product_price" min="0" placeholder="Enter price" class="input_fields" required>
        <input type="file" name="product_product_image" class="input_fields" required accept="product_image/png, product_image/jpg, product_image/jpeg">
        <input type="submit" name="add_product" class="submit_btn" value="Add product">
        <a href="viewproducts.php" class="view_products_btn">View Products</a>
      </form>
    </div>
  </div>

</body>
</html>