<?php
session_start();
echo $_SESSION['email'];
$id = $_SESSION['email'];
?>
<?php

session_start();
require_once('CreateDb.php');
require_once('component.php');

// create instance of Createdb class
$db = new CreateDb("agrishop", "productdb");

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="cart.css">
</head>

<body class="bg-light">

    <?php
    require_once('header.php');
    ?>
    <style>
        h5 {
            font-size: 2.3rem;
        }

        h6,
        p {
            font-size: 1.5rem;
        }
    </style>

    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h5>My Orders</h5>
                    <hr>

                    <?php
                    $orders = "";
                    $total = 0;
                    //echo $id;
                    $result = $db->getOrders($id);
                    //echo $result;
                    if (mysqli_num_rows($result) > 0) {
                        while ($rowi = mysqli_fetch_assoc($result)) {
                            //echo($rowi['product_id']);
                            $li = $rowi['product_id'];
                            for ($i = 0; $i < strlen($li); $i++) {
                                if ($li[$i] == '-') {
                                    continue;
                                }
                                    //echo $li[$i];
                                    $product = $db->getProduct($li[$i]);
                                    $row = mysqli_fetch_assoc($product);
                                    //echo $row;
                                    OrderElement($row['image'], $row['name'], $row['price'], $row['id']);
        
                            }
                        }
                    } else {
                        echo "<h5>No order placed</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="./register/logout.php" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>