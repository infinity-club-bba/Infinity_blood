<?php
session_start();
include('../db.php');

// Check if the form is submitted to process the donation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donor_id"]) && isset($_POST["help_seeker_id"])) {
    $donorId = $_POST['donor_id'];
    $helpSeekerId = $_POST['help_seeker_id'];
    $donationDate = $_POST['donation_date']; // Assuming you have a way to send the donation date

    // Insert the donation into the donations table
    $insertQuery = "INSERT INTO donations (donor_id, help_seeker_id, donation_date) 
                    VALUES ('$donorId', '$helpSeekerId', '$donationDate')";
    if ($conn->query($insertQuery) === TRUE) {
        // Donation successful
        echo "success";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
