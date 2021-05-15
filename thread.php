<!-- this Thread Page is for opening specific Question in another page -->

<!-- This Thread List is to display all the Question in Same Page -->


<?php $active = ''; // for navbar active link glow 
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
    $id = $_GET['thread_id'] ;
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id ";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)) {
        // echo "Test successful";
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];   
    }
    ?>




    <!-- if action is post in the same page then Insert Comments Record into DB -->
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method=='POST'){
            $comment = $_POST['comment'];            
            $time_add = strtotime("+3 hour +30 minutes");
            $my_current_time = date("h:i A (jS M, Y)", $time_add);
            // echo $my_current_time;
            // $comment_by = $_POST['comment_by'];
            

            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', '$my_current_time');
            ";

            $result = mysqli_query($conn, $sql);
            $showAlert = "Your comment has been Posted. Thanks for your Contribution. &#x270C; ";

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


                <?php echo $title; ?>

            </h1>
            <p class="mx-5 fs-5 text-center">
                <?php echo $desc; ?>
            </p>
            <p>Posted by : <span class="fw-bold">ayush@gmail.com</span></p>

            <hr class="my-4">
            <p class="mx-5 fs-7 text-center">This is peer to peer forum for sharing knowledge with each other. No Spam /
                Advertising / Self-promote in the forums. <br> Do not post copyright-infringing material. Do not post
                “offensive” posts, links or images. <br> Do not cross post questions. Remain respectful of other members
                at all times.</p>
        </div>
    </div>






    <!-- If user is Logged in then only they can Post a Question or Answer -->
    <?php    
    // session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        $disableInput = '';
    }else{
        $disableInput = 'disabled placeholder="Please Login to Post a Comment." ';
    }    
    
?>
 <!-- Use this in the input tag to disable it -->
<?php // echo $disableInput; ?> 


    <!-- Post Comments Form stars here -->
    <div class="container mt-5">
        <h3><span style="border-bottom: 3px solid lightblue;">Post a Comment </span></h3>

        <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" class="col-md-6 mt-4 needs-validation"
            novalidate>

            <div class="form-group">
                <label for="comment">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required <?php echo $disableInput; ?> ></textarea>
                <div class="invalid-feedback">
                    Please provide a valid comment.
                </div>

            </div>
            <button type="submit" class="btn btn-info fw-bold">Post</button>

        </form>
    </div>













    <!-- // Disucssed answer comment section starts here  -->
    <div class="container mt-5">
        <h3><span style="border-bottom: 3px solid lightblue;"> Discussions </span></h3>


        <?php
        $id = $_GET['thread_id'] ;
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id ";
        $result = mysqli_query($conn, $sql);
        $noResult = "No Comments Found yet.";   // At initial time if no comment found
        while($row=mysqli_fetch_assoc($result)) 
        {
            // echo "Test successful";
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            
            $noResult = false;  // At initial time if comments found
            
            echo 
            '
                    <div class="media my-5 ">
                        <img class=" " src="img/'.rand(1,6).'.png" style="width: 3rem;" alt="Generic placeholder image">
                        <div class="media-body mx-4">                        
                            <p class="my-0"><span class="fw-bold">Anonymous User </span>at '. $comment_time .' </p> 
                            
                            ' . $content . '
                        </div>
                    </div>

            ';
        }

                 // echo var_dump($noResult);
                // At initial time if no posted found then display below lines
                if($noResult){
                    echo '
                    <div class="container mt-4">
                    <div class="jumbotron alert alert-info">
                        <h1 class=" text-center fw-bold">
                        '. $noResult .'
                        </h1>
                        <p class="fs-4 text-center ">Be the First Person to Comment.</p>
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