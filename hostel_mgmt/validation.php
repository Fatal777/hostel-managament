<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel_mgmt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve POST data
$stud_id = $_POST['stud_id'];
$password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM student WHERE student_id = ? AND password = ?");
$stmt->bind_param("ss", $stud_id, $password); // Bind parameters
$stmt->execute();
$result = $stmt->get_result(); // Get the result set from the executed statement

// Check if the user exists
if ($result->num_rows == 1) {
    // Valid user, start session and redirect to thirdpage.php
    $_SESSION['student_id'] = $stud_id; // Store student_id in session for future use
    header('Location: thirdpage.php');
    exit(); // Ensure the script stops executing after the redirect
} else {
    // Invalid user, redirect to secondpage.php
    header('Location: secondpage.php');
    exit(); // Ensure the script stops executing after the redirect
}

// Close prepared statement and connection
$stmt->close();
$conn->close();
?>
