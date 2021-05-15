<?php $active='About'; // for navbar active link glow ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS alert dissimissible -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Bootstrap CSS Navbar dominating -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


    <title>iForum ~ About</title>
</head>

<body style="background-color:whitesmoke">



    <!-- Invoking Navbar -->
    <?php require 'partials/_header.php';  ?>

    <div class="container">
        <h1 class="mt-3 mb-5 text-center fw-bold">Welcome to iDiscuss Platform ~ About</h1>

        <div class="row ">

        <div class="col-md-4 my-4">            
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/1600x900/?python_language, coding" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>



        </div>
    </div>






    <!-- Invoking Footer -->
    <?php require 'partials/_footer.php';  ?>

    <!-- All JS are kept in the footer -->

</body>

</html>