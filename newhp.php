<?php

session_start();

require_once('CreateDb.php');
require_once('component.php');

// create instance of Createdb class
$database = new CreateDb("agrishop", "productdb");

if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'newhp.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);


        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

if (isset($_SESSION['userID'])) {
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrishop</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!---font awesome cdn link--->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!---css file-->
    <link rel="stylesheet" type="text/css" href="homepage.css">

</head>

<body>

    <!----header starts-->
    <section class="header">
        <a href="#" class="logo"><i class="fas fa-shopping-basket"></i> AgriShop </a>

        <nav class="navbar">
            <a href="#home" class="links">Home</a>
            <a href="#features" class="links">features</a>
            <a href="#products" class="links">products</a>
            <a href="#categories" class="links">categories</a>
            <a href="#donate" class="links">donate farmers</a>
            <a href="Admin/admin/admin_login.php" target=”_blank”>admin panel</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <a href="cart.php">
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <?php

                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                } else {
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                }

                ?>
            </a>
            <a href=<?php echo isset($_SESSION['email']) ? "account.php" : "register/login.php" ?>>
                <div class="fas fa-user" id="login-btn"></div>
            </a>
            <form class="search-form">
                <input type="search" id="search-box" placeholder="search here.." name="">
                <label for="search-box" class="fas fa-search"></label>
            </form>
        </div>
    </section>

    <!----header ends-->

    <!--home starts--->
    <section class="home" id="home">
        <div class="content">
            <h3>fresh and<span> organic</span> seeds for your</h3>
            <p>agricultural fields..</p>
            <a href="#" class="btn">shop now</a>
        </div>
    </section>
    <!---home ends-->

    <!---features-->
    <section class="features" id="features">
        <h1 class="heading"> our <span>features</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="images/organic.jpg">
                <h3>fresh & organic</h3>
                <p>eat fresh, stay healthy</p>
                <a href="#" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="images/delivery.jpg">
                <h3>fast & free delivery</h3>
                <p>delivering free to your home</p>
                <a href="#" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="images/easy.jpg">
                <h3>easy & secure payment</h3>
                <p>pay your way- your payment, your choice!</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
    </section>
    <!---features ends--->

    <!---product--->
    <section class="products" id="products">
        <h1 class="heading"> our <span>products</span></h1>

        <div class="container">
            <?php
            $result = $database->getData();
            while ($row = mysqli_fetch_assoc($result)) {
                component($row['name'], $row['price'], $row['image'], $row['id']);
            }
            ?>
        </div>


    </section>
    <!---products ends---->

    <!----categories--->
    <section class="categories" id="categories">
        <h1 class="heading"> product <span>categories</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="images/category1.png">
                <h3>Grains seeds</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">shop now</a>
            </div>
            <div class="box">
                <img src="images/category2.jpg">
                <h3>fresh fruits seeds</h3>
                <p>upto 30% off</p>
                <a href="#" class="btn">shop now</a>
            </div>
            <div class="box">
                <img src="images/category3.jfif">
                <h3>vegetables seeds</h3>
                <p>upto 55% off</p>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>
    </section>
    <!---categories ends-->

    <!---donate farmers-->
    <h1 class="heading"> donate <span>farmers</span></h1>
    <div class="layer">
        <div class="tag-line-div">
            <h3 class="tag-line">"To me, there’s nothing more special than providing food for other families, and that’s what we do out here."</h3>
            <button class="button-35" role="button"><a href="farmer_register.php">Register as a farmer</a></button>
            <button class="button-35" role="button"><a href="./Admin/FarmerPortal/farmer_login.php" target=”_blank”>Login as a farmer</a></button>
        </div>
    </div>
    <!-- <div class="blank" style="height: 100vh; width: 100%;"></div> -->
    <img src="./images/farmerImage" class="back-pic" alt="">




    <div class="list">
        <h1>Select a farmer to donate</h1>
        <?php
        $result = $database->getFarmerData();
        ?>
        <div class="table">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card">
                    <div class="image">
                        <img src="./Admin/FarmerPortal/ProfilePic/<?= $row['image'] ?>" alt="">
                    </div>
                    <div class="details">
                        <h3><?= $row['name'] ?></h3>
                        <div class="detail">
                            <p style="font-size: 16px;"><?php echo substr($row['description'], 0, 380); ?>...<a href="" style="font-size: 14px;">show more</a></p>

                        </div>
                        <button class="button-3" role="button"><a href="farmer_details.php?sln=<?= $row['sln'] ?>">Details</a></button>
                        <button class="button-3" role="button">Donate</button>

                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!---footer starts-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>agrishop <i class="fas fa-shopping-basket"></i></h3>
                <p>for your agricultural fields..</p>
                <div class="share">
                    <a href="#" class="fab fa-meta"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"><i class="fas fa-phone"></i> +91 9804848094</a>
                <a href="#" class="links"><i class="fas fa-phone"></i> +91 9873462889</a>
                <a href="#" class="links"><i class="fas fa-envelope"></i> singhjulie3001@gmail.com</a>
                <a href="#" class="links"><i class="fas fa-map-marker-alt"></i> kolkata- 700004</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home" class="links"><i class="fas fa-arrow-right"></i> home</a>
                <a href="#features" class="links"><i class="fas fa-arrow-right"></i> features</a>
                <a href="#products" class="links"><i class="fas fa-arrow-right"></i> products</a>
                <a href="#categories" class="links"><i class="fas fa-arrow-right"></i> categories</a>
                <a href="#donate" class="links"><i class="fas fa-arrow-right"></i> donate farmers</a>
            </div>

            <div class="box">
                <h3>quick contact</h3>
                <input type="name" placeholder="Name" class="name" name="">
                <input type="number" placeholder="Mobile" class="number" name="">
                <input type="message" placeholder="Message" class="message" name="">
                <input type="submit" value="submit" class="btn" name="">
            </div>
        </div>
        <div class="credit"> created by <span>agrishop team</span> || all rights reserved</div>



    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!---js file-->
    <script type="text/javascript" src="homepage.js"></script>
</body>

</html>