<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
require_once('../config/db.php');

$sql = "SELECT * FROM parkings";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Parkings</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="table-container">
        <h2>Parking Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Vehicle No</th>
                    <th>Owner Name</th>
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                    <th>Slot No</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['vehicle_no']}</td>
                                <td>{$row['owner_name']}</td>
                                <td>{$row['entry_time']}</td>
                                <td>{$row['exit_time']}</td>
                                <td>{$row['slot_no']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
