<!-- abcd -->
<?php $active = 'Home'; // for navbar active link glow 
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


    <title>iForum</title>
</head>

<body style="background-color:whitesmoke">

    <!-- connecting to the database -->
    <?php require 'partials/_dbconnect.php';  ?>

    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>



    <!-- Carousel starts from here -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x300/?programming, microsoft, gagets" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x300/?networking, tech" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x300/?game, tech" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>




    <!-- Heading and all card are here -->
    <div class="container">
        <h1 class="mt-3 mb-5 text-center fw-bold">Welcome to iDiscuss Platform ~ Browse Categories</h1>

        <!-- Rows for all category display and auto go down if excess boxes are there -->
        <div class="row ">

            <!-- Fetching all category from the database  -->
            <?php
                $select = "SELECT * FROM `categories` ";
                $result = mysqli_query($conn, $select);
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['category_id'];
                    $cat = $row['category_name'];
                    $desc = $row['category_description'];
                    
                    
                    // Displaying all cards using while loop
                    echo '    
                    
                    <div class="col-md-4 my-4">
                    <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1600x900/?'. $cat .' coding laptop tech" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none" href="threadlist.php?catid='.$id.' ">'.$cat .'</a></h5>
                    <p class="card-text">
                        '.  substr($desc, 0, 100)  .' ....
                    </p>
                    <a href="threadlist.php?catid='.$id.' " class="btn btn-primary">View Threads</a>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    
                ';    
                } 
            ?>

        </div>
    </div>






















    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>