<?php

include '../components/connect.php';

session_start();

$farmer_id = $_SESSION['farmer_id'];

if(!isset($farmer_id)){
   header('location:farmer_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Farmer dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/farmer_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">
      <div class="box" style="height:300px; width:300px;">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="" class="btn">update profile</a> 
      </div>
      <div class="box" style="height:300px; width:300px;">
         <?php
            // $select_products = $conn->prepare("SELECT * FROM `productdb`");
            // $select_products->execute();
            // $number_of_products = $select_products->rowCount()
         ?>
         <p>Update Bank Account Details</p>
         <a href="" class="btn">Update</a>
      </div>

      
   </div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>