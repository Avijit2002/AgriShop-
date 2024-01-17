<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agrishop</title>

<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

<!---font awesome cdn link--->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!---css file-->
<link rel="stylesheet" type="text/css" href="homepage.css">

</head>
<body>

<!----header starts-->
<section class="header">
         <a href="newhp.php" class="logo"><i class="fas fa-shopping-basket"></i> AgriShop </a>
         
         <nav class="navbar">
         <a href="newhp.php">Home</a>
         <a href="#features">features</a>
         <a href="#products">products</a>
         <a href="#categories">categories</a>
         <a href="#donate farmers">donate farmers</a>
         </nav>

     <div class="icons">
<div class="fas fa-bars" id="menu-btn"></div>
<div class="fas fa-search" id="search-btn"></div>
<a href="cart.php">
<div class="fas fa-shopping-cart"></div>
   <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
</a>
<div class="fas fa-user" id="login-btn"></div>

</div>

<form class="search-form">
     <input type="search" id="search-box" placeholder="search here.." name="">
     <label for="search-box" class="fas fa-search"></label>
</form>
</section>

<!----header ends-->