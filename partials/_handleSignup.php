<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '_dbconnect.php';

    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // Learn how to add time 
    $time = date("h:i A (jS M, Y)", strtotime("+3 hour +30 minutes"));



    // Check whether this email exist or not
    $existSql = "SELECT * FROM `users` WHERE user_email='$user_email' ";
    $result = mysqli_query($conn, $existSql); 
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "This Email ID Already Exists!  Go to the Login Page.";
        header("Location: /ayush/forum/index.php?emailExists=true");
        exit;
    }elseif($cpass != $pass) {
        $showError = "Password don't match! Please type the correct Password.";
        header("Location: /ayush/forum/index.php?passwordNotMatch=true");
        exit;
    }else{
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = " INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', '$time'); ";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = "Your account has been created successfully";
            header("Location: /ayush/forum/index.php?signupsuccess=true");
            exit;
        }
    }

}

?>