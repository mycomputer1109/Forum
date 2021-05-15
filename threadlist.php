<!-- This Thread List is to display all the Question in Same Page -->


<?php $active = 'Category'; // for navbar active link glow 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS alert dissimissible -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Bootstrap CSS Navbar dominating -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


    <title>iForum ~ Threads</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>


    <!-- Fetching a specific Category name and description using $_GET by their category_id -->
    <?php
    $id = $_GET['catid'] ;
    $sql = "SELECT * FROM `categories` WHERE category_id=$id ";
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)) {
        // echo "Test successful";
        $cat_name = $row['category_name'];
        $desc = $row['category_description'];
    }
    ?>


    <!-- if action is post in the same page then Insert Record into DB -->
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method=='POST'){
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $time_add = strtotime("+3 hour +30 minutes");
            $my_current_time = date("h:i A (jS M, Y)", $time_add);

            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '0', '$my_current_time'); ";
            $result = mysqli_query($conn, $sql);
            $showAlert = "Your thread has been added! Please wait for the community to respond.";

            if($showAlert){

                echo '    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Success! </strong> ' . $showAlert . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ';
            } 

        }
    ?>



    <!-- Specific Thread container heading and description -->
    <div class="container mt-4">
        <div class="jumbotron alert alert-info">
            <h1 class="mb-5 text-center fw-bold">
                Welcome to
                <span class="text-info" style="text-shadow: 1px 2px 3px black;">
                    <?php echo $cat_name; ?>
                </span> Forums
            </h1>
            <p class="mx-5 fs-5 text-center">
                <?php echo $desc; ?>
            </p>

            <hr class="my-4">
            <p class="mx-5 fs-5 text-center">This is peer to peer forum for sharing knowledge with each other. No Spam /
                Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post
                “offensive” posts, links or images. Do not cross post questions. <br> Remain respectful of other members
                at all times.</p>
            <a href="#" class="btn btn-primary mx-5" role="button">Learn More</a>
        </div>
    </div>


    <!-- If user is Logged in then only they can Post a Question or Answer -->
<?php    
    // session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        $disableInput = '';
    }else{
        $disableInput = 'disabled placeholder="Please Login to Post a Question." ';
    }    
    
?>

    <!-- Post Question Form stars here -->
    <div class="container mt-5">
        <h3><span style="border-bottom: 3px solid lightblue;">Start a Discussion </span></h3>

        <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" class="col-md-6 mt-4 needs-validation"
            novalidate>
            <div class="mb-3">

                <label for="title" class="form-label">Problem Title</label>      
                 <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required  <?php echo $disableInput; ?>>
                 <div class="invalid-feedback">
                    Please provide a valid title.
                </div>
                <div id="" class="form-text">Keep your title Short and Crisp.</div>
            </div>


            <div class="form-group">
                <label for="desv">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required  <?php echo $disableInput; ?> ></textarea>
                <div class="invalid-feedback">
                    Please provide a valid description.
                </div>

            </div>
            <button type="submit" class="btn btn-info fw-bold">Post</button>

        </form>
    </div>










    <!-- // Browse question section starts here  -->
    <div class="container mt-5">
        <h3><span style="border-bottom: 3px solid lightblue;"> Browse Questions </span></h3>

        <?php
        $id = $_GET['catid'] ;
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ";
        $result = mysqli_query($conn, $sql);
        $noResult = "Be the First Person to ask a Question.";   // At initial time if no posted found
        while($row=mysqli_fetch_assoc($result)) {
            // echo "Test successful";
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $time = $row['timestamp'];
            $noResult = false;  // At initial time if posted found
            
            echo 
            '
                    <div class="media my-5 ">
                        <img class=" " src="img/'.rand(1,6).'.png" style="width: 3rem;" alt="Generic placeholder image">
                        <div class="media-body mx-4 mb-0">
                            <h5 class="mt-0 mb-0"> 
                            <a href="thread.php?thread_id='. $id .'" style="text-decoration: none; font-weight: bold;  ">  ' . $title .'  </a>
                            </h5>
                            <p class="my-0"><span class="fw-bold">Anonymous User </span>at '. $time .' </p> 
                            ' . $desc . '
                        </div>
                    </div>

            ';
        }


                   // echo var_dump($noResult);
                // At initial time if no posted found then display NO THREAD FOUND lines
                if($noResult){
                    echo '
                    <div class="container mt-4">
                    <div class="jumbotron alert alert-info">
                        <h1 class=" text-center fw-bold">
                            No Threads Found
                        </h1>
                        <p class="fs-4 text-center ">'. $noResult  .'</p>
                    </div>
                    </div>
                     ';
                }

                ?>





    </div>




    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->            

</body>

</html>