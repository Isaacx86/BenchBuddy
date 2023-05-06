<?php

//require_once "db.php";
// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $height = $_POST["height"];

    // Encrypt password using password_hash() function
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into database
    $sql = "INSERT INTO user_info (name, email, password, age, height)
    VALUES ('$name', '$email', '$hashed_password', '$age', '$height')";

    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully";
        header("Location: login.php");
    } else {
        // ON POST CHANGE THIS TO GENERIC ERROR 
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}

// Check if login form submitted
// moved to login.php

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
                    <div class="col-md-6 text-center">
                        <h2>Welcome!</h2>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            
                            <div class="form-floating mb-2"> 
                                <input type="text" id="name" name="name" class="form-control form-control-lg"><br><br>
                                <label class="form-label" for="name">Name</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"><br><br>
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"><br><br>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <input type="number" id="age" name="age"><br><br>
                                    <label class="form-label" for="age">Age</label>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <input type="number" id="height" name="height"><br><br>
                                    <label class="form-label" for="height">Height</label>
                                </div>
                            </div>

                            <input type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
                

    </body>
</html>
