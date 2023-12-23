<?php
session_start();

// Check if the donor is logged in, if not redirect to login page
if (!isset($_SESSION["donor_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add your CSS styles or include external stylesheets if needed -->
    <link rel="stylesheet" type="text/css" href="donerindex.css">
</head>

<body>

    <header>
        <h1>Welcome, Donor!</h1>
    </header>

    <section>
        <h2>Donor Dashboard</h2>

        <div>
            <a href="donation_list.php"><button>Donation List</button></a>
            <a href="help_seekers_list.php"><button>Help Seeker List</button></a>
        </div>
    </section>

    <footer>
        <a href="logout.php"><button>Logout</button></a>
        <!-- Your footer content goes here -->
    </footer>

</body>

</html>
