<?php

include "./Connection/connect.php";

if (isset($_GET)) {
    $sln = $_GET['sln'];
}

$sql = "SELECT sln,name, email, phone,gender,image,address,country,description, city, region, zip, accnum, ifsc, upiID FROM `farmerlist` WHERE sln=$sln ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)

?>

<!DOCTYPE html>
<html>

<head>
    <title>Farmer Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .farmer-details {
            margin-top: 30px;
            text-align: center;
        }

        .farmer-details img {
            max-width: 200px;
            display: block;
            margin: 0 auto;
            border-radius: 40%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .farmer-details p {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Farmer Details</h2>
        <div class="farmer-details">
            <?php
            // Sample farmer data

            // Display farmer details
            echo '<img src="./Admin/FarmerPortal/ProfilePic/' . $row['image'] . '" alt="Farmer Photo">';
            echo '<p><strong>Name:</strong> ' . $row['name'] . '</p>';
            echo '<p><strong>Age:</strong> ' . $row['email'] . '</p>';
            echo '<p><strong>Location:</strong> ' . $row['address'] . '</p>';
            ?>
        </div>
    </div>
</body>

</html>