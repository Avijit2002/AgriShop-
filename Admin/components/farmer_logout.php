<?php

include 'connect.php';

session_start();
session_unset();
session_destroy();

header('location:../FarmerPortal/farmer_login.php');

?>