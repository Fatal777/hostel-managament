<!DOCTYPE html>
<html>
<head>
    <title>Hostel Management System Query Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .result {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        h2 {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hostel Management System Query Results</h1>
    <div class="result">
        <?php
        session_start();

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hostel_mgmt"; // Replace with your actual database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
            // Sanitize input
            $query = $_POST['query'];
            $stud_id = $_POST['stud_id']; // Added for Query 6

            // Use prepared statements to prevent SQL injection (optional but recommended)
            // Prepare and bind parameters
            switch ($query) {
                case '1':
                    $sql = "SELECT name FROM student WHERE name LIKE 'P%A'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<h2>Names of all Students beginning with P and ending with letter A:</h2>";
                        echo "<table><tr><th>Name</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['name'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found.";
                    }
                    break;

                case '2':
                    $sql = "SELECT r.room_no, s.name AS student_name
                            FROM room r
                            JOIN student s ON r.student_id = s.student_id
                            WHERE s.student_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $stud_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo '<h2>Room details of Student:</h2>';
                        echo "<table><tr><th>Room Number</th><th>Student Name</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['room_no'] . "</td><td>" . $row['student_name'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found.";
                    }
                    break;

                case '3':
                    $sql = "SELECT p.payment_id, p.pay_date, p.amount, s.name AS student_name
                            FROM payment p
                            JOIN student s ON p.student_id = s.student_id
                            WHERE s.student_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $stud_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo '<h2>Payment details of Student:</h2>';
                        echo "<table><tr><th>Payment ID</th><th>Payment Date</th><th>Amount</th><th>Student Name</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['payment_id'] . "</td><td>" . $row['pay_date'] . "</td><td>$" . $row['amount'] . "</td><td>" . $row['student_name'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found.";
                    }
                    break;

                case '4':
                    $sql = "SELECT room_no, capacity, occupied
                            FROM room_cap
                            WHERE occupied < capacity";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<h2>Available rooms:</h2>';
                        echo "<table><tr><th>Room Number</th><th>Capacity</th><th>Occupied</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['room_no'] . "</td><td>" . $row['capacity'] . "</td><td>" . $row['occupied'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found.";
                    }
                    break;

                case '5':
                    $sql = "SELECT m.student_id, m.hostel_id, m.staff_id, r.room_no
                            FROM maintenance m
                            JOIN room r ON m.student_id = r.student_id
                            WHERE r.student_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $stud_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo '<h2>Maintenance Details of Student room:</h2>';
                        echo "<table><tr><th>Student ID</th><th>Hostel ID</th><th>Staff ID</th><th>Room Number</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['student_id'] . "</td><td>" . $row['hostel_id'] . "</td><td>" . $row['staff_id'] . "</td><td>" . $row['room_no'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found.";
                    }
                    break;

                case '6':
                    $sql = "SELECT * FROM student WHERE student_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $stud_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<h2>Details for Student ID $stud_id:</h2>";
                        echo "<table><tr><th>Name</th><th>Address</th><th>Email</th><th>PhoneNo</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['address'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phoneno'] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No student found with ID: $stud_id";
                    }
                    break;

                default:
                    echo "Invalid query selection.";
                    break;
            }
        } else {
            echo "No query parameter received.";
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
