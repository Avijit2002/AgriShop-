<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){
   //var_dump($_POST);
   $email = $_POST['name'];
   $pass = sha1($_POST['pass']);
   //echo $pass;
   $select_admin = $conn->prepare("SELECT * FROM `farmerlist` WHERE email = ? AND password = ? AND verify = ?");
   $select_admin->execute([$email, $pass,'1']);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);
   //echo $select_admin->rowCount();

   if($select_admin->rowCount() > 0){
      $_SESSION['farmer_id'] = $row['sln'];
      header('location:farmer_dashboard.php');
   }else{
     $message[] = 'incorrect username or password!';
   }

}else{
   echo 'ok';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

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

<section class="form-container">

   <form action="./farmer_login.php" method="POST">
      <h3>login now</h3>
      <input type="email" name="name" required placeholder="enter your username"  class="box">
      <input type="password" name="pass" required placeholder="enter your password" class="box">
      <input type="submit" value="login now" class="btn" name="submit">
   </form>

</section>
   
</body>
</html>