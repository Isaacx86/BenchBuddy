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
    <body>
        <div class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center mt-5">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="bench_buddy-removebg-preview.png" class="img-fluid" alt="Logo">
                    </div>

                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 mt-5">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-floating mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"><br><br>
                                <label class="form-label" for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"><br><br>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <input type="submit" name="login" value="Login" class="btn btn-success btn-lg btn-block mb-4">

                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="registration.php"
                            style="color: #393f81;">Register here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>