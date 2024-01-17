<?php
include '../components/connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sln = $_POST['sln'];
    
    $select_messages = $conn->prepare("UPDATE `farmerlist`
    SET verify = '1'
    WHERE sln = $sln
    ");
    $select_messages->execute();

    echo "<script>alert('Verification Success!!!');
    window.location.href = './farmer_verify.php';
    </script>";
  
}



?>