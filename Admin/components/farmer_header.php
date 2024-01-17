<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="../FarmerPortal/farmer_dashboard.php" class="logo">Farmer <span>Panel</span></a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">home</a>
         <a href="../admin/products.php">Details</a>
         <a href="../admin/placed_orders.php">Donation</a>
         <a href="../admin/messages.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `farmerlist` WHERE sln = ?");
            $select_profile->execute([$farmer_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../components/farmer_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>