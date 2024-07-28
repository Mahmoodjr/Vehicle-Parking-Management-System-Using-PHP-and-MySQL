<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
require_once('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_no = $_POST['vehicle_no'];
    $owner_name = $_POST['owner_name'];
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];
    $slot_no = $_POST['slot_no'];

    $sql = "INSERT INTO parkings (vehicle_no, owner_name, entry_time, exit_time, slot_no) 
            VALUES ('$vehicle_no', '$owner_name', '$entry_time', '$exit_time', '$slot_no')";

    if ($conn->query($sql) === TRUE) {
        $success = "New parking record created successfully";
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Parking</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="form-container">
        <h2>Add Parking</h2>
        <form method="post" action="">
            <input type="text" name="vehicle_no" placeholder="Vehicle No" required>
            <input type="text" name="owner_name" placeholder="Owner Name" required>
            <input type="datetime-local" name="entry_time" placeholder="Entry Time" required>
            <input type="datetime-local" name="exit_time" placeholder="Exit Time" required>
            <input type="text" name="slot_no" placeholder="Slot No" required>
            <button type="submit">Add</button>
            <?php if (isset($success)) { echo "<p class='success'>$success</p>"; } ?>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
