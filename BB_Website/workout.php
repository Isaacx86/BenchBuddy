<?php
?>

<!DOCTYPE html>
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
        
        <div class="row">
            <!--NAV BAR-->
            <div class="col-md-2 bg-success text-light p-0">
                <nav class ="nav flex-lg-column bg-success mr-0 text-light text-center sticky-top">

                    <div class="container-fluid">
                        <div id="time">
                            <div class="digit" id="min">
                                00
                            </div>
                            <div class="digit" id="sec">
                                00
                            </div>
                        </div>

                        <div id="buttons">
                            <button class="btn" id="stop">Stop Workout</button>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END NAV BAR-->

        </div>
        
    </body>
</html>