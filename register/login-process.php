<?php

$error = array();

$email = validate_input_email($_POST['email']);
echo $email;
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // sql query
    $query = "SELECT userID, Fname, Lname, email, password, image FROM users WHERE email=?";
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    // bind parameter
    mysqli_stmt_bind_param($q, 's', $email);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // verify password

        if(sha1($password)== $row['password']){
            $_SESSION['email']=$row['email'];
            header("Location: ../newhp.php");
            exit();
        }else{
            echo "NDone";
        }
    }else{
        echo "You are not a member please register!";
    }

}else{
    echo "Please Fill out email and password to login!";
}
