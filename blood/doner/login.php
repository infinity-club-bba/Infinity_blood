<!-- donor/login.php -->
<?php
session_start();
include('../db.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login-submit"])) {
    // Assuming you have email and phone_number as login credentials
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];

    // Modify the query based on your actual database schema
    $query = "SELECT * FROM donors WHERE email = '$email' AND phone_number = '$phoneNumber'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['donor_id'] = $row['donor_id'];
        $_SESSION['blood_type'] = $row['blood_type'];
        $_SESSION['location_wilaya'] = $row['location_wilaya'];
        // Add other relevant session data

        header("Location: donerindex.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donor Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add your CSS styles or include external stylesheets if needed -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

    <header>
        <h1>Donor Login</h1>
    </header>

    <section>
        <h2>Login</h2>
        <form action="" method="post">
            <!-- Assuming you have email and phone_number as login credentials -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <input type="submit" name="login-submit" value="Login">
        </form>
    </section>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

</body>

</html>
