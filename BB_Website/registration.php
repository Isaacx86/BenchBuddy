<?php

require_once "db.php";
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
<html>
<head>
    <title>User Registration and Login Form</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        Age: <input type="number" name="age"><br><br>
        Height: <input type="number" name="height"><br><br>
        <input type="submit" value="Register">
    </form>

</body>
</html>
