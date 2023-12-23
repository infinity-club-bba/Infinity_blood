<!-- gethelp.php -->
<?php
include('../db.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["help-submit"])) {
    $name = $_POST['name'];
    $secondName = $_POST['second_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $bloodType = $_POST['blood_type'];
    $description = $_POST['description'];
    $emergencyStatus = $_POST['emergency_status'];
    // Additional fields
    $height = isset($_POST['height']) ? $_POST['height'] : null;
    $weight = isset($_POST['weight']) ? $_POST['weight'] : null;
    $historyHeartProblem = isset($_POST['history_heart_problem']) ? $_POST['history_heart_problem'] : null;
    $bloodPressureHistory = isset($_POST['blood_pressure_history']) ? $_POST['blood_pressure_history'] : null;
    $locationWilaya = isset($_POST['location_wilaya']) ? $_POST['location_wilaya'] : null;

    $sql = "INSERT INTO help_seekers (name, second_name, email, phone_number, blood_type, description, emergency_status,
            height, weight, history_heart_problem, blood_pressure_history, location_wilaya) 
            VALUES ('$name', '$secondName', '$email', '$phoneNumber', '$bloodType', '$description', '$emergencyStatus',
            '$height', '$weight', '$historyHeartProblem', '$bloodPressureHistory', '$locationWilaya')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the request_submitted.php page
        header("Location: request_submitted.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close(); // Close the database connection
?>
<!-- Add this line to include the gethelp.css file -->
<link rel="stylesheet" type="text/css" href="gethelp.css">

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
            <h1>Get Help Registration <img src="../read.png" alt="Read" width="50" height="30"></h1>
        </div>
    </header>

    <!-- ... (previous code) ... -->

    <section class="main-section">
        <div class="container">
            <form action="gethelp.php" method="post">
                <div class="grid-row">
                    <div class="column">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="second_name">Second Name:</label>
                        <input type="text" id="second_name" name="second_name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone_number">Phone Number:</label>
                        <input type="tel" id="phone_number" name="phone_number" required>

                        <label for="height" size="3">Height (cm):</label>
                        <input type="number" id="height" name="height" required>
                      
                        <label for="weight" size="3">Weight (kg):</label>
                        <input type="number" id="weight" name="weight" required>

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

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>

                        <label for="emergency_status">Emergency Status:</label>
                        <select id="emergency_status" name="emergency_status" required>
                            <option value="Urgent">Urgent</option>
                            <option value="Normal">Normal</option>
                            <!-- Add more options as needed -->
                        </select>

                        <label for="history_heart_problem">History of Heart Problems:</label>
                        <textarea id="history_heart_problem" name="history_heart_problem" required></textarea>

                        <label for="blood_pressure_history">Blood Pressure History:</label>
                        <textarea id="blood_pressure_history" name="blood_pressure_history" required></textarea>

                        <label for="location_wilaya">Location (Wilaya):</label>
                        <input type="text" id="location_wilaya" name="location_wilaya" required>

                        <!-- Add other fields as needed -->
                    </div>
                </div>
                <br>
                <input type="submit" name="help-submit" value="Submit Help Request">
            </form>


        </div>
    </section>

    <!-- ... (remaining code) ... -->


    <footer>
        <!-- Your footer content goes here -->
    </footer>

</body>

</html>