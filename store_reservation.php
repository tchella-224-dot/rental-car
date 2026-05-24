<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: reservation1.php?error=not_logged_in");
    exit();
}

// Validate required fields
if (!isset($_POST['pickup_date']) || !isset($_POST['return_date']) || !isset($_POST['car_selected'])) {
    header("Location: reservation1.php?error=fields_not_set");
    exit();
}

include 'connection.php';

$username = $_SESSION['username'];

// Get first_name and last_name from client table
$stmt = $conn->prepare("SELECT first_name, last_name FROM client WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($first_name, $last_name);
$stmt->fetch();
$stmt->close();

if (!$first_name || !$last_name) {
    // User not found in DB – force logout
    header("Location: logout.php");
    exit();
}

$pickup_date = $_POST['pickup_date'];
$return_date = $_POST['return_date'];
$car_selected = (int)$_POST['car_selected'];

// Validate dates: return date must be after pickup date
if (strtotime($return_date) <= strtotime($pickup_date)) {
    header("Location: reservation1.php?error=invalid_dates");
    exit();
}

// Insert into reservations table (only the columns that exist)
$sql = "INSERT INTO reservations (first_name, last_name, pickup_date, return_date, car_selected)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $first_name, $last_name, $pickup_date, $return_date, $car_selected);

if ($stmt->execute()) {
    // Success – redirect to a thank you / success page
    header("Location: success.php");
    exit();
} else {
    error_log("DB Error in store_reservation: " . $stmt->error);
    header("Location: reservation1.php?error=db_failed");
    exit();
}

$stmt->close();
$conn->close();
?>