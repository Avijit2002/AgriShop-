<?php 

session_start();
require('Connection/connect.php');

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $orders =  $_SESSION['orders'];
}

$sql = "CREATE TABLE IF NOT EXISTS `orders` (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(100) NOT NULL,
  product_id VARCHAR(100) NOT NULL,
  status VARCHAR(2) NOT NULL
)";

// Create the table
if (mysqli_query($conn, $sql)) {
  ///echo 'Table created successfully';
} else {
  echo 'Error creating table: ' . mysqli_error($conn);
}

$user_id = mysqli_real_escape_string($conn, $email); // Sanitize the user_id
$product_id = mysqli_real_escape_string($conn, $orders); // Sanitize the product_id

$sql = "INSERT INTO `orders` (`user_id`, `product_id`,`status`)
VALUES ('$user_id', '$product_id','p')";

// Run the SQL query to insert data into the table
if (mysqli_query($conn, $sql)) {
  //echo 'Data inserted successfully';
} else {
  echo 'Error inserting data: ' . mysqli_error($conn);
}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Order Success</title>
  <link rel="stylesheet" type="text/css" href="success.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-top: 0;
      color: #333;
    }

    p {
      margin-bottom: 15px;
      font-size: 16px;
      line-height: 1.5;
    }

    .container p:last-child {
      margin-bottom: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Order Placed Successfully!</h1>
    <p>Thank you for your purchase. Your order has been successfully placed.</p>
    <p>An email with the order details will be sent to your registered email address.</p>
  </div>
  <a href="./newhp.php">Home</a>
</body>
</html>
