<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System Queries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-image"></div>
    <h1>Hostel Management System Queries</h1>
    <form action="query.php" method="post">
        <fieldset>
            <legend>Select a Query:</legend>
            <p>
                <input type="radio" id="query1" name="query" value="1">
                <label for="query1">List the names of all Students beginning with P and ending with letter A</label>
            </p>
            <p>
                <input type="radio" id="query2" name="query" value="2"> 
                <label for="query2">Give the Room Details of Student</label>
            </p>
            <p>
                <input type="radio" id="query3" name="query" value="3">
                <label for="query3">Give the Student Payment Details</label>
            </p>
            <p>
                <input type="radio" id="query4" name="query" value="4">
                <label for="query4">Give the Rooms available for occupancy</label>
            </p>
            <p>
                <input type="radio" id="query5" name="query" value="5">
                <label for="query5">Give the Student Maintenance details</label>
            </p>
            <p>
                <input type="radio" id="query6" name="query" value="6">
                <label for="query6">Search the details for a given Student</label>
            </p>
            <p>
                <label for="stud_id">Enter Student ID (for Query 6): </label>
                <input type="text" id="stud_id" name="stud_id">
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
        </fieldset>
    </form>
</body>
</html>
