<?php
// Retrieve form data
$name          = $_POST['name'];
$members       = $_POST['members'];
$destination   = $_POST['destination'];
$budget        = $_POST['budget'];
$checkin_date  = $_POST['checkin_date'];
$checkout_date = $_POST['checkout_date'];
$contact_number = $_POST['contact_number'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, members, destination, budget, checkin_date, checkout_date, contact_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssss", $name, $members, $destination, $budget, $checkin_date, $checkout_date, $contact_number);

// Execute the statement
if ($stmt->execute()) {
    echo "Booking successfully completed.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

