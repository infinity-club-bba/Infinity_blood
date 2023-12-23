<?php
session_start();
include('../db.php');

// Retrieve donor information from the session
$donorId = $_SESSION['donor_id'];

// Query to get donation information for the current donor
$query = "SELECT donations.*, help_seekers.name AS seeker_name,help_seekers.second_name AS seeker_2name, help_seekers.email AS seeker_email,help_seekers.phone_number AS seeker_phone
          FROM donations
          JOIN help_seekers ON donations.help_seeker_id = help_seekers.seeker_id
          WHERE donations.donor_id = '$donorId'";
$result = $conn->query($query);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Your Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/62ef1335f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="your_stylesheet.css">
    <!-- Add any other necessary styles or scripts -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Fjalla One', sans-serif;
            height: 100%;
            background-color: #E3E3E3;
        }

        .main-header {
            padding: 20px 0;
            background-color: #FF2523;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-section {
            padding: 20px 0;
        }

        .help-seeker-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .help-seeker-card h3 {
            color: #FF2523;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .help-seeker-card p {
            margin-bottom: 8px;
        }

        .help-seeker-card button {
            background-color: #FF2523;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }

        .help-seeker-card button:hover {
            background-color: #a62221;
        }

        /* Add responsive styles if needed */
        @media only screen and (max-width: 600px) {
            .main-header h1 {
                font-size: 24px;
            }

            .help-seeker-card {
                padding: 15px;
            }

            .help-seeker-card h3 {
                font-size: 18px;
            }

            .help-seeker-card p {
                font-size: 14px;
            }

            .help-seeker-card button {
                font-size: 14px;
            }

            .donation-card {
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .donation-card h3 {
                color: #333;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .donation-card p {
                color: #666;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <header class="main-header">
        <div class="container header-content">
            <h1>Donation List</h1>
            <a href="donerindex.php" class="btn">
                <i class="fas fa-bars" style="color: white;"></i>
            </a>
        </div>
    </header>

    <section class="main-section">
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display donation information in a card
                    echo "<div class='donation-card'>";
                    echo "<h3>Help Seeker: " . $row['seeker_name'], "&nbsp" . $row['seeker_2name'] . "</h3>";
                    echo "<p>Email: " . $row['seeker_email'] . "</p>";
                    echo "<p>phone: " . $row['seeker_phone'] . "</p>";

                    echo "<p>Donation Date: " . ($row['donation_date'] ? $row['donation_date'] : "Not set") . "</p>";

                    // Check if the donation date is not set to display the form
                    if (!$row['donation_date']) {
                        // Form to set donation date
                        echo "<form action='set_donation_date.php' method='post'>";
                        echo "<input type='hidden' name='donation_id' value='" . $row['donation_id'] . "'>";
                        echo "<label for='donation_date'>Set Donation Date:</label>";
                        echo "<input type='date' id='donation_date' name='donation_date'>";
                        echo "<input type='submit' name='set_date' value='Set Date'>";
                        echo "</form>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>No donations found.</p>";
            }
            ?>
        </div>
    </section>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

</body>

</html>