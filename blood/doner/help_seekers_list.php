<?php
session_start();
include('../db.php');

$donorBloodType = $_SESSION['blood_type'];

// Query to get help seekers with matching blood type and location
$query = "SELECT * FROM help_seekers WHERE blood_type = '$donorBloodType'";
$result = $conn->query($query);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donate Blood Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="help_seekers_list.css"> <!-- Include the new stylesheet here -->
    <script src="https://kit.fontawesome.com/62ef1335f4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    /* Style for the modal container */
    #modalContainer {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    /* Style for the modal content */
    #modalContent {
        position: relative;
        margin: 10% auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        width: 60%;
    }

    /* Style for the date picker */
    #donation_date_input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        font-weight: 600;
    }

    /* Style for the OK button inside the modal content */
    #modalContent #okButton {
        background-color: #FF2523 !important;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
    }

    #modalContent #okButton:hover {
        background-color: #a62221 !important;
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
    </style>

</head>

<body>

    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <h1>Help Seekers List</h1>
                <a href="donerindex.php" class="btn">
                    <i class="fa-solid fa-bars" style="color: white"></i>
                </a>
            </div>
        </div>
    </header>



    <section class="main-section">
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display help seeker information in a card
                    echo "<div class='help-seeker-card'>";
                    echo "<h3>Name: " . $row['name'] . " " . $row['second_name'] . "</h3>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Phone Number: " . $row['phone_number'] . "</p>";
                    echo "<p>Blood Type: " . $row['blood_type'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    // Add other fields as needed
            
                    // Button for donation
                    echo "<button onclick='donateNow(" . $row['seeker_id'] . ")'>Donate Now</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No help seekers found matching your criteria.</p>";
            }
            ?>
        </div>
    </section>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <script>
    // JavaScript function to handle the donation action
    function donateNow(helpSeekerId) {
        // Create a modal container
        var modalContainer = document.createElement("div");
        modalContainer.id = "modalContainer";
        modalContainer.style.display = "block";
        modalContainer.style.position = "fixed";
        modalContainer.style.top = "0";
        modalContainer.style.left = "0";
        modalContainer.style.width = "100%";
        modalContainer.style.height = "100%";
        modalContainer.style.backgroundColor = "rgba(0,0,0,0.7)";
        modalContainer.style.zIndex = "1";

        // Create a modal content
        var modalContent = document.createElement("div");
        modalContent.style.position = "relative";
        modalContent.style.margin = "10% auto";
        modalContent.style.padding = "20px";
        modalContent.style.backgroundColor = "#fff";
        modalContent.style.borderRadius = "8px";
        modalContent.style.width = "60%";

        // Create a date picker
        var datePicker = document.createElement("input");
        datePicker.type = "date";
        datePicker.id = "donation_date_input";
        datePicker.style.width = "100%";
        datePicker.style.padding = "10px";
        datePicker.style.marginBottom = "15px";
        datePicker.style.border = "1px solid #ccc";
        datePicker.style.borderRadius = "5px";
        datePicker.style.boxShadow = "inset 0 1px 2px rgba(0, 0, 0, 0.1)";
        datePicker.style.fontSize = "16px";
        datePicker.style.fontWeight = "600";

        // Create an "OK" button
        var okButton = document.createElement("button");
        okButton.innerHTML = "OK";
        okButton.id = "okButton"; // Set the ID for styling
        okButton.style.backgroundColor = "#FF2523";
        okButton.style.color = "#fff";
        okButton.style.padding = "10px 20px";
        okButton.style.border = "none";
        okButton.style.borderRadius = "5px";
        okButton.style.cursor = "pointer";
        okButton.style.fontSize = "16px";
        okButton.style.fontWeight = "600";

        // Create a "Cancel" button
        var cancelButton = document.createElement("button");
        cancelButton.innerHTML = "Cancel";
        cancelButton.style.backgroundColor = "#ccc";
        cancelButton.style.color = "#fff";
        cancelButton.style.padding = "10px 20px";
        cancelButton.style.border = "none";
        cancelButton.style.borderRadius = "5px";
        cancelButton.style.cursor = "pointer";
        cancelButton.style.fontSize = "16px";
        cancelButton.style.fontWeight = "600";

        // Append elements to the modal content
        modalContent.appendChild(datePicker);
        modalContent.appendChild(okButton);
        modalContent.appendChild(cancelButton);

        // Append modal content to the modal container
        modalContainer.appendChild(modalContent);

        // Append the modal container to the body
        document.body.appendChild(modalContainer);

        // Listen for the click event on the "OK" button
        okButton.addEventListener("click", function() {
            // Get the selected date
            var donationDate = datePicker.value;

            // Remove the modal container from the body
            document.body.removeChild(modalContainer);

            // Use AJAX to send the donation information to process_donation.php
            $.ajax({
                type: "POST",
                url: "process_donation.php",
                data: {
                    donor_id: <?php echo $_SESSION['donor_id']; ?>,
                    help_seeker_id: helpSeekerId,
                    donation_date: donationDate
                },
                success: function(response) {
                    // Check if the response is successful
                    if (response === "success") {
                        // Donation successful, you can redirect or show a success message
                        alert("Donation successful!");
                    } else {
                        // Handle errors, e.g., show an error message
                        alert("Error in donation process.");
                    }
                },
                error: function() {
                    // Handle errors, e.g., show an error message
                    alert("Error in donation process.");
                }
            });
        });

        // Listen for the click event on the "Cancel" button
        cancelButton.addEventListener("click", function() {
            // Remove the modal container from the body
            document.body.removeChild(modalContainer);
        });
    }
    </script>




</body>

</html>