<?php

include '../components/connect.php';

session_start();
$IsVerified = '0';
if(isset($_GET['verified'])){
    if($_GET['verified']=='0'){
        $IsVerified = '0';
    }
    else{
        $IsVerified = '1';
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>
    <section class="show-products" style="font-size: 18px; margin: 50px auto;">
        <h2><?php echo $IsVerified == '0'? 'Farmer verification request list:':'Verified farmers list:' ?></h2><br>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>SL. NO.</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // fetching data from server

                $fam = $conn->prepare("SELECT * FROM `farmerlist` WHERE verify=$IsVerified");
                $fam->execute();
                $num = $fam->rowCount();
                $sln = 1;
                if ($num > 0) {
                    while ($num--)  // while($row = mysqli_fetch_assoc($res) )  it rotates till null value at end
                    {
                        $row = $fam->fetch(PDO::FETCH_ASSOC);
                        //echo var_dump($row);
                        echo '
                    
                        
                            <tr>
                                <td scope="col">' . $sln . '</td>
                                <td scope="col">' . $row['name'] . '</td>
                                <td scope="col">' . $row['email'] . '</td>
                                <td scope="col">' . $row['address'] . '</td>
                                <td scope="col">' . $row['phone'] . '</td>
                                <td scope="col"><button type="button" class="upd btn btn-warning"><a style="color: white" href="./details.php?sln='.$row['sln'].'">DETAILS</a></button></td>
                            </tr>
                        
                    
                            </div>';
                            
                        $sln = $sln + 1;
                    }
                }
                ?>

            </tbody>
        </table>
    </section>


    <script src="../js/admin_script.js"></script>
    <script src="../js/jquery-3.6.2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</body>

</html>