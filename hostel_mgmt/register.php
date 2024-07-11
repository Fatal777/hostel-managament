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

// Collecting data from POST request
$stud_id = $_POST['student_id'];
$name = $_POST['name'];
$pass = $_POST['password'];
$address = $_POST['address'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];

// Check if the student_id already exists
$query = "SELECT * FROM student WHERE student_id='$stud_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username already registered');</script>";
    echo "<script>window.location = 'secondpage.php';</script>";
} else {
    // Insert the new record into the student table
    $reg = "INSERT INTO student (student_id, name, password, address, email, phoneno) VALUES ('$stud_id', '$name', '$pass', '$address', '$email', '$phoneno')";
    
    // Execute the insert query and check for success
    if (mysqli_query($conn, $reg)) {
        echo "<script>alert('Registration successful');</script>";
        echo "<script>window.location = 'thirdpage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
