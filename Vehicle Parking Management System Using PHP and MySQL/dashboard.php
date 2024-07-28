<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <a href="add_parking.php">Add Parking</a>
        <a href="view_parkings.php">View Parkings</a>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
