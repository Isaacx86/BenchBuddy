<?php
//require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to retrieve user from database
    $sql = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        // Decrypt password using password_verify() function
        if (password_verify($password, $stored_password)) {
            echo "Login successful";
            header("Location: main.php");
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    // Close database connection
    mysqli_close($conn);
}

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
    <body style="background: #f5f5f5;">
        <nav class="navbar navbar-expand-lg bg-success bg-gradient text-light mb-2">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
               <img class="rounded" src="images/bench_buddy-removebg-preview.png" alt="Bench Buddy" height="50" width="100">
               <!-- <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-weight: 500;">Bench Buddy</h1> -->
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.html">Login</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row d-flex justify-content-center align-items-center">
                
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <p>test</p>
                </div>

                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg"><br><br>
                            <label class="form-label" for="email">Email address</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"><br><br>
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <input type="submit" name="login" value="Login" class="btn btn-success btn-lg btn-block">
                    </form>
                </div>
                
            </div>
        </div>

        <footer class="navbar fixed-bottom bg-success bg-gradient text-light">
          <div class="text-center p-3">
            © 2023 Copyright: MATZAC Ltd.
          </div>
        </footer>
    </body>
</html>