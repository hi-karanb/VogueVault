<?php
// Establish connection
$conn = new mysqli("localhost", "root", "", "shoppingcart_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle add-to-cart action
if (isset($_POST['add-to-cart'])) {
    $product_name = $_POST['product_name'];
    $product_product_price = $_POST['product_price'];
    $product_product_image = $_POST['product_image'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $product_name, $product_price, $product_image);
    $stmt->execute();
    $stmt->close();
}

// Fetch products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>VogueVault.com</h1>
            <nav>
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="">Cart (0)</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="more-products" class="container">
            <h2>More Products</h2>
            <div class="sort-options">
                <label for="sort-product_price">Sort by product_price:</label>
                <select id="sort-product_price">
                    <option value="default">Default</option>
                    <option value="asc">Low to High</option>
                    <option value="desc">High to Low</option>
                </select>
            </div>
            <div class="filter-options">
                <label for="filter-category">Filter by category:</label>
                <select id="filter-category">
                    <option value="all">All</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Hat">Hat</option>
                    <option value="Scarf">Scarf</option>
                    <option value="Tshirt">Tshirt</option>
                    <option value="Jeans">Jeans</option>
                    <option value="Jacket">Jacket</option>
                </select>
            </div>
            <div class="search-bar">
                <input type="text" id="search-bar" placeholder="Search for products...">
            </div>
            <div class="product-grid" id="product-grid">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <div class="product-item" data-category="<?php echo htmlspecialchars($row["category"]); ?>">
                    <img src="product_images/<?php echo htmlspecialchars($row["product_image"]); ?>" alt="<?php echo htmlspecialchars($row["product_name"]); ?>">
                    <h3><?php echo htmlspecialchars($row["product_name"]); ?></h3>
                    <p class="description">Stylish denim jeans perfect for any occasion.</p>
                    <p class="product_price">&#8377;<?php echo htmlspecialchars($row["product_price"]); ?>.00</p>
                    <form action="viewproducts.php" method="post">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row["product_name"]); ?>">
                        <input type="hidden" name="product_product_price" value="<?php echo htmlspecialchars($row["product_price"]); ?>">
                        <input type="hidden" name="product_product_image" value="<?php echo htmlspecialchars($row["product_image"]); ?>">
                        <input type="submit" class="add_cart_btn" value="Add to Cart" name="add-to-cart">
                    </form>
                </div>
                <?php
                    }
                } else {
                    echo "<p>No Products Available</p>";
                }
                ?>
            </div>
            <div class="pagination">
                <button onclick="navigateToPrevPage()" class="prev-page">Previous</button>
                <span class="page-info">Page 2 of 2</span>
                <button onclick="navigateToNextPage()" class="next-page">Next</button>
                <script>
                    function navigateToNextPage() {
                        window.location.href = 'viewproducts.php';
                    }

                    function navigateToPrevPage() {
                        window.location.href = 'more-products.html';
                    }
                </script>
            </div>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
