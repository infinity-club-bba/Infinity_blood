<?php
session_start();
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["set_date"])) {
    // Retrieve the donation_id and donation_date from the form
    $donationId = $_POST['donation_id'];
    $donationDate = $_POST['donation_date'];

    // Update the donation record with the provided donation_date
    $updateQuery = "UPDATE donations SET donation_date = '$donationDate' WHERE donation_id = '$donationId'";
    
    if ($conn->query($updateQuery) === TRUE) {
        echo "Donation date set successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
