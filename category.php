<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Foods</title>
    <link rel="stylesheet" href="./assets/category.css">
    <style>
        /* ... Existing CSS styles ... */

        .count-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .count-btn {
            font-size: 20px;
            padding: 0 10px;
            cursor: pointer;
        }
    </style>
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

    <section class="categories">
        <div class="container">
        <h2 class="section-heading">Explore Foods</h2>

            <div class="menu">
                <h3 class="menu-title">Veg</h3>
                <?php
                // Veg items array
                $vegItems = array(
                    array(
                        'image' => 'images/starters/onion-rings.jpg',
                        'name' => 'Onion Rings',
                        'price' => '$5.99',
                        'count' => 0
                    ),
                    array(
                        'image' => 'images/starters/french-fries.jpg',
                        'name' => 'French Fries',
                        'price' => '$4.99',
                        'count' => 0
                    ),
                    // Add more veg items here
                );

                // Display veg items
                foreach ($vegItems as $key => $item) {
                    echo '<div class="menu-item">';
                    echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '" class="img-responsive img-curve">';
                    echo '<h4 class="menu-item-name">' . $item['name'] . '</h4>';
                    echo '<p class="menu-item-price">' . $item['price'] . '</p>';
                    echo '<div class="count-container">';
                    echo '<button class="count-btn" onclick="decreaseCount(' . $key . ')">-</button>';
                    echo '<span class="item-count" id="count-' . $key . '">' . $item['count'] . '</span>';
                    echo '<button class="count-btn" onclick="increaseCount(' . $key . ')">+</button>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="menu">
                <h3 class="menu-title">Non-Veg</h3>
                <?php
                // Non-veg items array
                $nonVegItems = array(
                    array(
                        'image' => 'images/main-course/pizza.jpg',
                        'name' => 'Pizza',
                        'price' => '$12.99',
                        'count' => 0
                    ),
                    array(
                        'image' => 'images/main-course/burger.jpg',
                        'name' => 'Burger',
                        'price' => '$8.99',
                        'count' => 0
                    ),
                    // Add more non-veg items here
                );

                // Display non-veg items
                foreach ($nonVegItems as $key => $item) {
                    echo '<div class="menu-item">';
                    echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '" class="img-responsive img-curve">';
                    echo '<h4 class="menu-item-name">' . $item['name'] . '</h4>';
                    echo '<p class="menu-item-price">' . $item['price'] . '</p>';
                    echo '<div class="count-container">';
                    echo '<button class="count-btn" onclick="decreaseCount(' . $key . ')">-</button>';
                    echo '<span class="item-count" id="count-' . $key . '">' . $item['count'] . '</span>';
                    echo '<button class="count-btn" onclick="increaseCount(' . $key . ')">+</button>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <script>
        function increaseCount(key) {
    var countElement = document.getElementById('count-' + key);
    var currentCount = parseInt(countElement.innerHTML);
    countElement.innerHTML = currentCount + 1;

    addToCart(key); // Call the addToCart function when increasing count
}

function decreaseCount(key) {
    var countElement = document.getElementById('count-' + key);
    var currentCount = parseInt(countElement.innerHTML);
    if (currentCount > 0) {
        countElement.innerHTML = currentCount - 1;

        removeFromCart(key); // Call the removeFromCart function when decreasing count
    }
}

function addToCart(key) {
    var item = {};
    if (key < <?php echo count($vegItems); ?>) {
        item = <?php echo json_encode($vegItems); ?>[key];
    } else if(key < <?php echo count($nonVegItems); ?>){
        item = <?php echo json_encode($nonVegItems); ?>[key];
    }

    var checkoutItems = document.getElementById('checkout-items');
    var existingItem = checkoutItems.querySelector('[data-key="' + key + '"]');
    if (existingItem) {
        var countElement = existingItem.querySelector('.checkout-item-count');
        var currentCount = parseInt(countElement.innerHTML);
        countElement.innerHTML = currentCount + 1;
    } else {
        var itemHTML = '<div class="checkout-item" data-key="' + key + '">' +
            '<img src="' + item['image'] + '" alt="' + item['name'] + '" class="img-responsive img-curve">' +
            '<h4 class="checkout-item-name">' + item['name'] + '</h4>' +
            '<p class="checkout-item-price">' + item['price'] + '</p>' +
            '<span class="checkout-item-count">1</span>' +
            '</div>';

        checkoutItems.innerHTML += itemHTML;
    }
}

function removeFromCart(key) {
    var checkoutItems = document.getElementById('checkout-items');
    var item = checkoutItems.querySelector('[data-key="' + key + '"]');
    var countElement = item.querySelector('.checkout-item-count');
    var currentCount = parseInt(countElement.innerHTML);

    if (currentCount > 1) {
        countElement.innerHTML = currentCount - 1;
    } else {
        item.remove();
    }
}

</script>


<section class="checkout-menu">
    <div class="container">
    <h2 class="section-heading">Checkout Menu</h2>
        <div id="checkout-items"></div>
    </div>
</section>

<script>
    function increaseCount(key) {
        var countElement = document.getElementById('count-' + key);
        var currentCount = parseInt(countElement.innerHTML);
        countElement.innerHTML = currentCount + 1;

        addToCart(key); // Call the addToCart function when increasing count
    }

    function decreaseCount(key) {
        var countElement = document.getElementById('count-' + key);
        var currentCount = parseInt(countElement.innerHTML);
        if (currentCount > 0) {
            countElement.innerHTML = currentCount - 1;

            removeFromCart(key); // Call the removeFromCart function when decreasing count
        }
    }

    function addToCart(key) {
        var item = {};
        if (key < <?php echo count($vegItems); ?>) {
            item = <?php echo json_encode($vegItems); ?>[key];
        } else {
            item = <?php echo json_encode($nonVegItems); ?>[key - <?php echo count($vegItems); ?>];
        }

        var checkoutItems = document.getElementById('checkout-items');
        var itemHTML = '<div class="checkout-item">' +
            '<img src="' + item['image'] + '" alt="' + item['name'] + '" class="img-responsive img-curve">' +
            '<h4 class="checkout-item-name">' + item['name'] + '</h4>' +
            '<p class="checkout-item-price">' + item['price'] + '</p>' +
            '</div>';

        checkoutItems.innerHTML += itemHTML;
    }

    function removeFromCart(key) {
        var checkoutItems = document.getElementById('checkout-items');
        var items = checkoutItems.getElementsByClassName('checkout-item');
        items[key].remove();
    }
</script>



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


</body>

</html>
