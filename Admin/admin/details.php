<?php

include '../components/connect.php';

session_start();

if(isset($_GET)){
    $sln = $_GET['sln'];
    $data = $conn->prepare("SELECT * FROM `farmerlist` WHERE sln = $sln");
    $data->execute();
    $row = $data->fetch(PDO::FETCH_ASSOC);
    //var_dump($row);
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="../css/form.css">
  </head>
  <body>
    <section class="container">
      <header>Farmer  Details</header>
      <form action=<?php echo $row['verify']=='0'? "./details_update.php":"farmer_verify.php?verified=1" ?> method="POST" class="form">
        <input type="text" name="sln" value=<?php echo $row['sln'] ?> hidden>
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" value=<?php echo $row['name'] ?> readonly name="name" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" value=<?php echo $row['email'] ?> readonly name="email" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" value=<?php echo $row['phone'] ?> readonly name="phone" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" value=<?php echo $row['dob'] ?> readonly name="dob" placeholder="Enter birth date" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
                <?php if($row['gender']=='male'){?>
                    
              <input type="radio" id="check-male" name="gender" value="male" checked />
              <label for="check-male">male</label>
            <?php }?>
            </div>
            <div class="gender">
            <?php if($row['gender']=='female'){?>
                    
                    <input type="radio" id="check-female" name="gender" value="female" checked />
                    <label for="check-female">female</label>
                  <?php }?>
            </div>
            <div class="gender">
            <?php if($row['gender']=='gay'){?>
                    
                    <input type="radio" id="check-male" name="gender" value="female" checked />
                    <label for="check-male">Rather not to say</label>
                  <?php }?>
            </div>
          </div>
        </div>
        <div class="input-box">
            <label>Profile Pic</label>
            <div>
              <img style="height: 200px; width:180px;" src="../FarmerPortal/ProfilePic/<?php echo $row['image']?>" alt="">
            </div>
          </div>
          <div class="input-box">
          <label>About you</label><br>
          <textarea name="desc" class="form-control" id="description" cols="80" rows="10" readonly><?php echo $row['description'] ?></textarea>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input value=<?php echo $row['address'] ?> readonly type="text" name="address" placeholder="Enter street address" required />
          <div class="column">
            <div class="select-box">
              <select name="country" readonly>
                <option><?php echo $row['country'] ?></option>
              </select>
            </div>
            <input value=<?php echo $row['city'] ?> readonly type="text" name="city" placeholder="Enter your city" required />
          </div>
          <div class="column">
            <input value=<?php echo $row['region'] ?> readonly type="text" name="region" placeholder="Enter your region" required />
            <input value=<?php echo $row['zip'] ?> readonly type="number" name="zip" placeholder="Enter postal code" required />
          </div>
        </div>
        
        <div class="input-box">
          <label>Government ID</label>
          <input value=<?php echo $row['govID'] ?> readonly type="text" name="govID" placeholder="Enter government ID" required />
        </div>

        <div class="input-box">
          <label>Account Number</label>
          <input value=<?php echo $row['accnum'] ?> readonly type="text" name="Accnum" placeholder="Enter account number" required />
        </div>

        <div class="input-box">
          <label>IFSC Code</label>
          <input value=<?php echo $row['ifsc'] ?> readonly type="text" name="ifsc" placeholder="Enter IFSC code" required />
        </div>

        <div class="input-box">
          <label>UPI ID</label>
          <input value=<?php echo $row['upiID'] ?> readonly type="text" name="UpiID" placeholder="Enter UPI ID" required />
        </div>
        
        <button type="submit"><?php echo $row['verify']=='0'? 'Verify':'Back' ?></button>
      </form>
    </section>
  </body>
</html>
