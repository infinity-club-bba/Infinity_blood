<!-- donor/register.php -->
<?php
session_start();
include('../db.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register-submit"])) {
    $name = $_POST['name'];
    $secondName = $_POST['second_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $bloodType = $_POST['blood_type'];

    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $historyHeartProblem = $_POST['history_heart_problem'];
    $bloodPressureHistory = $_POST['blood_pressure_history'];
    $locationWilaya = $_POST['location_wilaya'];
    // Add other fields as needed

    $sql = "INSERT INTO donors (name, second_name, email, phone_number, blood_type, height, weight, history_heart_problem, blood_pressure_history, location_wilaya) 
            VALUES ('$name', '$secondName', '$email', '$phoneNumber', '$bloodType', '$height', '$weight', '$historyHeartProblem', '$bloodPressureHistory', '$locationWilaya')";

    // ... (previous code) ...

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        $_SESSION['donor_id'] = $conn->insert_id;
        $_SESSION['blood_type'] = $bloodType;
        $_SESSION['location_wilaya'] = $locationWilaya;
        // Add other relevant session data

        header("Location: help_seekers_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // ... (remaining code) ...

}

$conn->close(); // Close the database connection
?>
<link rel="stylesheet" type="text/css" href="register.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donate Blood Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="gethelp.css"> <!-- Include the new stylesheet here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <header class="main-header">
        <div class="container">
            <h1>Donation Registration <img src="../read.png" alt="Read" width="50" height="30"></h1>
        </div>
    </header>

    <section class="main-section">
        <div class="container">
            <form action="register.php" method="post">
                <div class="grid-row">
                    <div class="column">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="second_name">Second Name:</label>
                        <input type="text" id="second_name" name="second_name">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone_number">Phone Number:</label>
                        <input type="tel" id="phone_number" name="phone_number" required>

                        <label for="height">Height (cm):</label>
                        <input type="number" id="height" name="height">
                        
                        <label for="weight">Weight (kg):</label>
                        <input type="number" id="weight" name="weight">

                        <!-- Add other fields as needed -->
                    </div>

                    <div class="column">
                        <label for="blood_type">Blood Type:</label>
                        <select id="blood_type" name="blood_type" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>


                        <label for="history_heart_problem">History of Heart Problems:</label>
                        <textarea id="history_heart_problem" name="history_heart_problem"></textarea>

                        <label for="blood_pressure_history">Blood Pressure History:</label>
                        <textarea id="blood_pressure_history" name="blood_pressure_history"></textarea>

                        <label for="location_wilaya">Location (Wilaya):</label>
                        <input type="text" id="location_wilaya" name="location_wilaya">

                        <!-- Add other fields as needed -->
                    </div>
                </div>
                <br>

                <input type="submit" name="register-submit" value="Register as Donor">
            </form>
        </div>
    </section>

    <!-- ... (remaining