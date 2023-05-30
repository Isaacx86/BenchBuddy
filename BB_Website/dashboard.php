<?php
include("session.php");
include('db.php');

 if (!isset($_SESSION['email'])) {
            // user is not logged in, so redirect to login page
            header("Location: login.php");
            exit();
          }

//if (isset($_SESSION['username'])) {
  // user is logged in, so output their name
  //echo "Welcome, " . $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="uft-8">
        <meta name="viewport" content="width-device-width, inital-scale=1">
        <title>Bench Buddy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="styles/style.css" rel="stylesheet">
    </head>
    <body>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        
        <!--NAV BAR-->
        <div class="row vh-100">
          <div class="col-md-2 bg-success text-light p-0">
            <nav class ="nav flex-lg-column bg-success mr-0 text-light text-center sticky-top">
            
              <a class="navbar-brand" href="#">
                <img class="img-fluid" src="images/bench_buddy-removebg-preview.png" alt="Bench Buddy">
              </a>

              <div class="container-fluid">

                <ul class ="navbar-nav">
                  <li class ="nav-item my-2 fs-5 ml-0">
                    <a  class="nav-link nav-fill" href="dashboard.php"> Workout </a>
                  </li>

                  <li class ="nav-item my-2 fs-5">
                    <a  class="nav-link nav-fill" href="account2.php"> Account </a>
                  </li>

                  <li class ="nav-item my-2 fs-5">
                    <a class="nav-link nav-fill" href="logout.php"> Logout </a>
                  </li>

                </ul>
              </div>

            </nav>
          </div>
          <!--END NAV BAR-->


          <!--MAIN CONTENT-->
          <div class="col-md-10 align-items-center">

            <div class="container-fluid text-center">
            
              <div class="row border-0 mt-5">

                <!--Saved Workout 1-->
                <div class="col">
                  <div class="card mb-2">
                    <img class="card-img-top" src="images/push1.jpg" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title">Push Workout</h4>
                      <p class="card-text">Chest, shoulders, triceps...</p>
                      <a href="workout.php?id=1" class="btn btn-outline-success">Start Workout</a>
                    </div>
                  </div>
                </div>

                <!--Saved Workout 2-->
                <div class="col">
                  <div class="card mb-2">
                    <img class="card-img-top" src="images/pull1.jpg" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title">Pull Workout</h4>
                      <p class="card-text">Lats, rear deltoids, biceps...</p>
                      <a href="workout.php?id=5" class="btn btn-outline-success">Start Workout</a>
                    </div>
                  </div>
                </div>

                <!--Saved Workout 3-->
                <div class="col">
                  <div class="card mb-2">
                    <img class="card-img-top" src="images/legs1.jpg" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title">Leg Workout</h4>
                      <p class="card-text">Quadriceps, hamstrings, calves...</p>
                      <a href="workout.php?id=9" class="btn btn-outline-success">Start Workout</a>
                    </div>
                  </div>
                </div>

              </div>
            
              
          <!--END MAIN CONTENT-->

        </div> 
    </body>
</html>
