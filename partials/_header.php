<nav class="navbar navbar-expand-lg navbar-light bg-inf sticky-top" style="background-color: #1ac6ff;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-danger text-white" href="/ayush/forum/">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'Home') {
                                            echo 'active';
                                        } ?> " aria-current="page" href="/ayush/forum/index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'About') {
                                            echo 'active';
                                        } ?> " href="/ayush/forum/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == 'Contact') {
                                            echo 'active';
                                        } ?> " href="/ayush/forum/contact.php">Contact</a>
                </li>
            </ul>


            <?php
        session_start();
        if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true){
            
            echo ' <button type="button" class="btn-sm btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#loginModal"
            style="background-color: #04E930;">
            Login
            </button>
            
            <button type="button" class="btn-sm btn-warning mx-3 fw-bold" data-bs-toggle="modal"
            data-bs-target="#signupModal" style="background-color: #FC810C;">
            SignUp
            </button> ';
            
        }else{
            $name = $_SESSION['user_email'];

           echo '<p class="my-0">Welcome '. $name . ' </p>';

            echo ' <button  type="button" class="btn-sm btn-danger mr-3 fw-bold" data-bs-toggle="modal"
            data-bs-target="#logoutModal">
            Log Out
        </button> ';
        }
    ?>





            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-sm btn-secondary" type="submit">Search</button>
            </form>


        </div>
    </div>
</nav>

<?php 
    require '_loginModal.php';
    require '_signupModal.php';
    require '_logoutModal.php';



// Alert Section starts here

// ALET FOR SIGN UP  
    if( isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true' ){
        echo ' <div class="mb-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Sign up completed. Now you can Login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    elseif( isset($_GET['emailExists']) && $_GET['emailExists']=='true'  ){
        echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> This Email ID already Exists. Please Login Now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }elseif( isset($_GET['passwordNotMatch']) && $_GET['passwordNotMatch']=='true'  ) {
        echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Password do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }




    // Alert for Login by GET    
    if(isset($_GET['emailNotExist']) && $_GET['emailNotExist']){
        $showError = " This Email ID doesn't Exists. Please Sign Up first.";
        echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> '. $showError .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    elseif(isset($_GET['incorrectPassword']) && $_GET['incorrectPassword']){
        $showError = "Incorrect Password Entered.";
    echo ' <div class="mb-0 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> '. $showError .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    elseif(isset($_GET['login']) && $_GET['login']){
        $showAlert = "You are Logged in & Your Session has been Started.";
        echo ' <div class="mb-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> '. $showAlert.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    elseif(isset($_GET['logout']) && $_GET['logout']){
        $showAlert = "You are Logged Out & Your Session has been Ended.";
        echo ' <div class="mb-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> '. $showAlert.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }


?>