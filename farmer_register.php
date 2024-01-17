<?php

include './Connection/connect.php';
//var_dump($_POST);


if (isset($_FILES['image'])) {
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

  $extensions = array('jpg', 'png', 'jpeg');
  if (!empty($file_name)) {
      if (in_array($file_ext, $extensions) === false) {
          $errors[] = 'please put proper image';
      }
      if ($file_size > 30720000)   //change krna hai
      {
          $errors[] =  'image size must be under 300kb';
      }

      if (empty($errors) == true) {
          move_uploaded_file($file_tmp, "./Admin/FarmerPortal/ProfilePic/" . $file_name);
      } else {

          echo '<div class="alert alert-danger">' . $errors[0] . '</div>';
          die();
      }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['name'])));
  $email = strtolower(trim(mysqli_real_escape_string($conn, $_POST['email'])));
  //$image = mysqli_real_escape_string($conn,$_POST['image']);
  $phone = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['phone'])));
  $dob = trim(mysqli_real_escape_string($conn, $_POST['dob']));
  $gender = trim(mysqli_real_escape_string($conn, $_POST['gender']));
  $address = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['address'])));
  $desc = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['desc'])));
  $country = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['country'])));
  $city = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['city'])));
  $region = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['region'])));
  $zip = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['zip'])));
  $govID = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['govID'])));
  $accnum = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['Accnum'])));
  $ifsc = strtoupper(trim(mysqli_real_escape_string($conn, $_POST['ifsc'])));
  $UpiID = strtoupper(trim(mysqli_real_escape_string($conn, $_POST['UpiID'])));
  $password = trim(sha1($_POST['password']));
  $cpassword = trim(sha1($_POST['cpassword']));


  $sql = " CREATE TABLE IF NOT EXISTS `farmerlist` (
    sln INT AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(100),
    dob DATE,
    gender VARCHAR(10),
    image VARCHAR(255),
    password VARCHAR(255),
    address VARCHAR(255),
    description TEXT,
    country VARCHAR(100),
    city VARCHAR(100),
    region VARCHAR(100),
    zip VARCHAR(100),
    govID VARCHAR(100),
    accnum VARCHAR(100),
    ifsc VARCHAR(100),
    upiID VARCHAR(100),
    verify VARCHAR(2),
    PRIMARY KEY (sln)
);";

if (!mysqli_query($conn, $sql)){
  echo "Error creating table : " . mysqli_error($this->con);
}
  


  // checking if event already registered
  $sqli_farmer_check = "SELECT * FROM `farmerlist` WHERE `email` = '$email' ";
  $res2 = mysqli_query($conn, $sqli_farmer_check) or die("Query failed");
  $num_row_same_id = mysqli_num_rows($res2);
  if ($num_row_same_id > 0) {
      echo "<script>alert('You are already registered')</script>";
      exit();
  }
  if($password!=$cpassword){
    echo "<script>alert('Password not matched!!!')</script>";
      exit();
  }
  

  $sql = "INSERT INTO `farmerlist` (name, email, phone,dob,gender,image,password,address,country,description, city, region, zip, govID, accnum, ifsc, upiID,verify)
        VALUES ('$name', '$email', '$phone', '$dob', '$gender','$file_name','$password', '$address', '$country','$desc', '$city', '$region', '$zip', '$govID', '$accnum', '$ifsc', '$UpiID','0')";

// Run the SQL query to insert data into the table
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registration Form Fill Successfull....You will receive your credentials via email.');
    window.location.href = './newhp.php';
    </script>";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}
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
  </head>
  <body>
    <section class="container">
      <header>Farmer  Registration Form</header>
      <form action="./farmer_register.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" name="phone" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="dob" placeholder="Enter birth date" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="gay" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box">
          <label>Profile Picture</label>
          <input type="file" name="image" required />
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="address" placeholder="Enter street address" required />
          <input type="text" placeholder="Enter street address line 2" required />
          <div class="column">
            <div class="select-box">
              <select name="country">
                <option hidden>Country</option>
                <option>America</option>
                <option>Japan</option>
                <option>India</option>
                <option>Nepal</option>
              </select>
            </div>
            <input type="text" name="city" placeholder="Enter your city" required />
          </div>
          <div class="column">
            <input type="text" name="region" placeholder="Enter your region" required />
            <input type="number" name="zip" placeholder="Enter postal code" required />
          </div>
        </div>
        <div class="input-box">
          <label>About you</label><br>
          <textarea name="desc" class="form-control" id="description" cols="80" rows="10"></textarea>
        </div>
        <div class="input-box">
          <label>Government ID</label>
          <input type="text" name="govID" placeholder="Enter government ID" required />
        </div>

        <div class="input-box">
          <label>Account Number</label>
          <input type="text" name="Accnum" placeholder="Enter account number" required />
        </div>

        <div class="input-box">
          <label>IFSC Code</label>
          <input type="text" name="ifsc" placeholder="Enter IFSC code" required />
        </div>

        <div class="input-box">
          <label>UPI ID</label>
          <input type="text" name="UpiID" placeholder="Enter UPI ID" required />
        </div>
        <div class="input-box">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter Password" required />
        </div>
        <div class="input-box">
          <label>Confirm Password</label>
          <input type="password" name="cpassword" placeholder="Enter Password" required />
        </div>
        
        <button type="submit">Submit</button>
      </form>
    </section>
  </body>
</html>
