<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    
<!-- Navbar Section Starts Here -->
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="#" title="Logo">
                <img src="./img/ordersta.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>
        <div class="search-bar">
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Foods" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="menu.html">Menu</a>
                </li>
                <li>
                    <a href="foods.php">Foods</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Navbar Section Ends Here -->

<?php
session_start();
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Various Food Categories</h2>

        <?php
        // Assuming the categories are fetched from the database in the original PHP file

        // Sample Category Boxes
        echo '<a href="./category.php">
                <div class="box-3 float-container">
                  <img src="./img/menu-pizza.jpg" alt="Category 1" class="img-responsive img-curve">
                  <a href="./category.php" class="btn btn-primary">Category 1</a>
                </div>
              </a>';

        echo '<a href="./category.php">
                <div class="box-3 float-container">
                  <img src="./img/menu-burger.jpg" alt="Category 2" class="img-responsive img-curve">
                  <a href="./category.php" class="btn btn-primary">Category 2</a>
                </div>
              </a>';

              echo '<a href="./category.php">
              <div class="box-3 float-container">
                  <img src="./img/bg2.jpeg" alt="Category 3" class="img-responsive img-curve">
                  <a href="./category.php" class="btn btn-primary">Category 3</a>
              </div>
          </a>';

        // Add more category boxes here
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- Food Menu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Our Food Menu</h2>

        <?php
        // Assuming the food items are fetched from the database in the original PHP file

        // Sample Food Menu Boxes
        echo '<div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="./img/pizza.jpg" alt="Food Item 1" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Food Item 1</h4>
                    <p class="food-price">$10.99</p>
                    <p class="food-detail">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <br>
                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>';

            echo '<div class="food-menu-box">
            <div class="food-menu-img">
                <img src="./img/pizza.jpg" alt="Food Item 2" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
                <h4>Food Item 2</h4>
                <p class="food-price">$12.99</p>
                <p class="food-detail">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <br>
                <a href="order.php" class="btn btn-primary">Order Now</a>
            </div>
        </div>';

        

        // Add more food menu boxes here
        ?>

        <div class="clearfix"></div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </div>
</section>
<!-- Food Menu Section Ends Here -->

<!-- Include the footer using PHP include statement or manually add the footer code -->
<!--==================== FOOTER ====================-->
<footer class="footer">
    <div class="footer__bg">
        <div class="footer__container container grid">
            <div>
                <h1 class="footer__title">Tiffin</h1>
                <span class="footer__subtitle">Tiffin Services</span>
            </div>

            <ul class="footer__links">
                <li>
                    <a href="./index.html" class="footer__link">Home</a>
                </li>
                <li>
                    <a href="./about.html" class="footer__link">About Us</a>
                </li>
                <li>
                    <a href="./contact.html" class="footer__link">Contact Me</a>
                </li>
            </ul>

            <div class="footer__socials">
                <a href="https://www.instagram.com/singhsaurav062/" target="_blank" class="footer__social">
                    <i class="uil uil-instagram"></i>
                </a>

                <a href="https://twitter.com/singhsaurav062" target="_blank" class="footer__social">
                    <i class="uil uil-twitter"></i>
                </a>

                <a href="https://www.linkedin.com/in/saurav-singh-207878165/" target="_blank" class="footer__social">
                    <i class="uil uil-linkedin"></i>
                </a>
            </div>
        </div>

        <p class="footer__copy">&#169; Tiffin Service. All Rights Reserved</p>
    </div>
</footer>

<script src="./assets/app.js"></script>
</body>
</html>
