   <?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:signin.php");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VogueVault.com</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="script.js"></script>
        <style>
    header {  
                z-index: 1000;
    
            }

            .container3 {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #ff99cc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container2 {
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #ff99cc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
            </style>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>VogueVault.com</h1>
                <nav>
                    <ul>
                    <li class="logo"></li>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#newsletter">Newsletter</a></li>
                        <li><a href="#review">Review</a></li>
                        <li><a href ="addproduct.php">Add Products</a></li>
                        <li class="User"><div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="user.png" alt="" style="height:32px; width:32px; border-radius:20px; margin-right:15px;">
            <strong><?php echo $_SESSION['username'] ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="signin.php">Sign out</a></li>
        </ul>
    </div></li>
                    </ul>
                </nav>
            </div>
        </header>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="home_images/download1.jpg" class="d-block w-100 h-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>50% Off Sale</h5>
                            <p>Starting This Friday. Sale For Black Friday.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="home_images/download.jpeg" class="d-block w-100 h-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>30% Off Sale</h5>
                            <p>On selected items. So shop now!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="home_images/download3.webp" class="d-block w-100 h-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>50% Off Sale</h5>
                            <p>Starting This Friday. Sale For Black Friday.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

    

        <main>
            <section id="home" class="container">
                <h2>Welcome to VogueVault.com</h2>
                <div class="text-center">
                    <h5>Your one-stop shop for the latest fashion trends.</h5>
                </div>
            </section>

            
            <section id="products" class="container">
                <h2>Our Products</h2>
                <div class="product-grid">
                    <div class="product-item">
                        <img src="product_images/Tshirt.jpeg" alt="T-shirt">
                        <h3>T-shirt</h3>
                        <p class="description">A comfortable cotton t-shirt available in various sizes.</p>
                        <p class="price">₹500.00</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                    <div class="product-item">
                        <img src="product_images/jeans.jpeg" alt="Jeans">
                        <h3>Jeans</h3>
                        <p class="description">Stylish denim jeans perfect for any occasion.</p>
                        <p class="price">₹4000.00</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                    <div class="product-item">
                        <img src="product_images/jacket.avif" alt="Jacket">
                        <h3>Jacket</h3>
                        <p class="description">Warm and cozy jacket for the colder months.</p>
                        <p class="price">₹6500.00</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                    <!-- Add more products as needed -->
                </div>

                <div class="more-products text-center">
                    <a href="more-products.html" class="more-products-btn">More Products</a>
                </div>
            </section>

            <section id="about" class="container">
                <div class="container3">
                    <h2>About Us</h2>
                    <p>We are a team of passionate individuals dedicated to bringing you the latest in fashion.<br>
                        Founded in 2024, our mission is to provide high-quality, stylish clothing at affordable prices.<br>
                        We believe that fashion should be accessible to everyone, which is why we offer a wide range of sizes and styles.</p>
                </div>
            </section>

            <section id="newsletter" class="container">
        <div class="container3">
            <div class="newsletter-form">
                <h2>Subscribe to Our Newsletter</h2>
                <?php
                $newsletter_email = "";
                $email_err = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validate email
                    if (empty($_POST["newsletter_email"])) {
                        $email_err = "Email is required";
                    } else {
                        if (!filter_var($_POST["newsletter_email"], FILTER_VALIDATE_EMAIL)) {
                            $email_err = "Invalid email format";
                        } else {
                            $newsletter_email = htmlspecialchars($_POST["newsletter_email"]);
                            // Save email to the database or add to subscription list here
                            echo "<div class='alert alert-success'>Thank you for subscribing!</div>";
                        }
                    }
                }
                ?>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="email" name="newsletter_email" placeholder="Enter your email" value="<?php echo htmlspecialchars($newsletter_email); ?>" required>
                    <div class="error"><?php echo $email_err; ?></div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

            <section id="review" class="container">
        <div class="container3">
            <h2>Feedback and Review Form</h2>

            <?php
            // Initialize form variables
            $name = $email = $feedback = $rating = "";
            $name_err = $email_err = $feedback_err = $rating_err = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Validate name
                if (empty($_POST["name"])) {
                    $name_err = "Name is required";
                } else {
                    $name = htmlspecialchars($_POST["name"]);
                }

                // Validate email
                if (empty($_POST["email"])) {
                    $email_err = "Email is required";
                } else {
                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $email_err = "Invalid email format";
                    } else {
                        $email = htmlspecialchars($_POST["email"]);
                    }
                }

                // Validate feedback
                if (empty($_POST["feedback"])) {
                    $feedback_err = "Feedback is required";
                } else {
                    $feedback = htmlspecialchars($_POST["feedback"]);
                }

                // Validate rating
                if (empty($_POST["rating"])) {
                    $rating_err = "Rating is required";
                } else {
                    $rating = htmlspecialchars($_POST["rating"]);
                }

                // Process form data if no errors
                if (empty($name_err) && empty($email_err) && empty($feedback_err) && empty($rating_err)) {
                    // Save feedback to the database or send via email here
                    echo "<div class='alert alert-success'>Thank you for your feedback!</div>";
                }
            }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>">
                    <div class="error"><?php echo $name_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="error"><?php echo $email_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="feedback" class="form-label">Feedback:</label>
                    <textarea id="feedback" name="feedback" class="form-control"><?php echo htmlspecialchars($feedback); ?></textarea>
                    <div class="error"><?php echo $feedback_err; ?></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating:</label>
                    <div class="rating">
                        <?php
                        for ($i = 5; $i >= 1; $i--) {
                            echo "<input type='radio' id='star$i' name='rating' value='$i'";
                            if ($rating == $i) {
                                echo " checked";
                            }
                            echo "><label for='star$i'>&#9733;</label>";
                        }
                        ?>
                    </div>
                    <div class="error"><?php echo $rating_err; ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="previous-feedback mt-4">
                <h3>Previous Feedback and Reviews</h3>
                <div class="container2">
                    <p><strong>Name:</strong> Karan Bannerjee</p>
                    <p><strong>Email:</strong> khb@gmail.com</p>
                    <p><strong>Feedback:</strong> Soooo good!! It is a must try.</p>
                    <p><strong>Rating:</strong> 4 stars</p>
                </div>
                <div class="container2">
                    <p><strong>Name:</strong> Dyuti Agarwal</p>
                    <p><strong>Email:</strong> da@gmail.com</p>
                    <p><strong>Feedback:</strong> It possesses both positive and negative features.</p>
                    <p><strong>Rating:</strong> 3 stars</p>
                </div>
            </div>
        </div>
    </section>
            <footer>
            <div class="footer-content text-center">
                <h3>VogueVault.com</h3>
                <div class="social-media-links">
                    <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p>&copy; 2024 VogueVault.com. All Rights Reserved.</p>
            </div>
        </footer>

        <button class="back-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
            <i class="fas fa-chevron-up"></i>
        </button>

        <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html> 
