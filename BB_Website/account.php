<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bench Buddy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <style>
    .bmi-bar {
      width: 100%;
      height: 30px;
      background-color: #f1f1f1;
      border-radius: 5px;
      overflow: hidden;
    }

    .bmi-progress {
      height: 100%;
      width: 0%;
      transition: width 0.5s ease;
    }

    .bmi-labels {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      font-weight: bold;
    }

    .bmi-labels span {
      flex-basis: 20%;
    }

    /* Color classes for BMI ranges */
    .bmi-progress.underweight {
      background-color: blue;
    }

    .bmi-progress.normal {
      background-color: green;
    }

    .bmi-progress.overweight {
      background-color: orange;
    }

    .bmi-progress.obese {
      background-color: red;
    }
  </style>
</head>
<body>
  <!--NAV BAR-->
  <div class="row vh-100">
    <div class="col-md-2 bg-success text-light p-0">
      <nav class ="nav flex-lg-column bg-success mr-0 text-light text-center sticky-top">
        <a class="navbar-brand" href="#">
          <img class="img-fluid" src="images/bench_buddy-removebg-preview.png" alt="Bench Buddy">
        </a>

        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item my-2 fs-5 ml-0">
              <a class="nav-link nav-fill" href="workout.php">Workout</a>
            </li>
            <li class="nav-item my-2 fs-5">
              <a class="nav-link nav-fill" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item my-2 fs-5">
              <a class="nav-link nav-fill" href="account.php">Account</a>
            </li>
            <li class="nav-item my-2 fs-5">
              <a class="nav-link nav-fill" href="logout.php">Logout</a>
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
          <?php
          include("session.php");
          include("db.php");

          if (!isset($_SESSION['email'])) {
            // user is not logged in, so redirect to login page
            header("Location: login.php");
            exit();
          }

          // Assuming you have user information stored in a database or session variables
          $userEmail = $_SESSION['email'];

          // Retrieve user's height and weight from the database
          $query = "SELECT * FROM user_info WHERE email = '$userEmail'";
          $result = mysqli_query($conn, $query);

          if ($result) {
            // Check if the query returned any rows
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $userName = $row['name'];
              $userWeight = $row['weight'];
              $userHeight = $row['height'];
              $userAge = $row['age'];

              // Calculate BMI
              $bmi = $userWeight / (($userHeight / 100) * ($userHeight / 100)); // Convert height to meters if needed
              $bmi = round($bmi, 2); // Round to 2 decimal places

              // Print BMI result
      

echo "<div style='display: flex; justify-content: center;'>";
echo "<div style='text-align: center; margin-right: 50px;'>";
// User Information
echo "<h3>User Information</h3>";
echo "<p>Name: " . $userName . "</p>";
echo "<p>Email: " . $userEmail . "</p>";
echo "<p>Weight: " . $userWeight . " kg</p>";
echo "<p>Height: " . $userHeight . " cm</p>";
echo "<p>Age: " . $userAge . "</p>";
echo "</div>";

echo "<div style='text-align: center;'>";
// Update Personal Details
echo "<h3>Update Personal Details</h3>";
echo "<form method='POST' action='' style='width: 300px; margin: 0 auto;'>";
echo "<div class='form-group' style='display: flex;'>";
echo "<div class='input-group' style='flex: 1; margin-right: 10px;'>";
echo "<label for='weight'>Weight (kg):</label>";
echo "<div class='small-input-wrapper'>";
echo "<input type='number' id='weight' name='weight' value='" . $userWeight . "' class='form-control' step='0.1'>";
echo "</div>";
echo "</div>";
echo "<div class='input-group' style='flex: 1;'>";
echo "<label for='height'>Height (cm):</label>";
echo "<div class='small-input-wrapper'>";
echo "<input type='number' id='height' name='height' value='" . $userHeight . "' class='form-control' step='0.1'>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "<br>";
echo "<input type='submit' value='Update' class='btn btn-primary'>";
echo "</form>";
echo "</div>";

echo "</div>";



echo "</div>";



              echo "<div class='bmi-section'>";
              echo "<h3>BMI Rating</h3>";
              echo "<div class='bmi-bar'>";
              echo "<div class='bmi-progress " . ($bmi < 18.5 ? 'underweight' : ($bmi < 25 ? 'normal' : ($bmi < 30 ? 'overweight' : 'obese'))) . "' style='width: " . (($bmi / 40) * 100) . "%;'></div>";
              echo "</div>";
              echo "<div class='bmi-labels'>";
              echo "<span>Underweight</span>";
              echo "<span>Normal</span>";
              echo "<span>Overweight</span>";
              echo "<span>Obese</span>";
              echo "</div>";
             echo "<br>";
             echo "<br>";









              // Check if the form was submitted
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the submitted weight and height values
                $newWeight = $_POST['weight'];
                $newHeight = $_POST['height'];

                // Update the user's weight and height in the database
                $updateQuery = "UPDATE user_info SET weight = '$newWeight', height = '$newHeight' WHERE email = '$userEmail'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                  // Update successful, redirect to the same page
                  header("Location: account.php");
                  exit();
                } else {
                  // Handle the case when the update fails
                  echo "Failed to update weight and height.";
                }
              }

              // Rest of your code to display other user information
              // ...
            } else {
              // Handle the case when the user's information is not found in the database
              echo "User information not found.";
            }
          } else {
            // Handle any errors that occurred during the database query
            echo "Error: " . mysqli_error($conn);
          }
          ?>
        </div>
      </div>
    </div>
    <!--END MAIN CONTENT-->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>
