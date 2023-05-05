<?php
require_once "db.php";
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

    <h2>User Login Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>

</html>