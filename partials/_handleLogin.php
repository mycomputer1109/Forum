<?php

$showError = false;
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){

    include '_dbconnect.php';

    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    // Equality to 1 means entered email ID exists
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);

        if( password_verify($pass, $row['user_pass']) ) {

            // start the login session
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_email'] = $email;

            // $showAlert = "You are Logged in & Your Session has been Started";
            header("LOCATION: /ayush/forum/index.php?login=true");
            echo "loggedin";
            exit;
        }
        else{
            header("LOCATION: /ayush/forum/index.php?incorrectPassword=true");
            // $showError = "Incorrect Password Entered.";
            exit;
        }
    }
    else{
        header("LOCATION: /ayush/forum/index.php?emailNotExist=true");
        // $showError = " '.$email.' This Email ID doesn't Exists. Please Sign Up first.";
        exit;
    }

}

?>