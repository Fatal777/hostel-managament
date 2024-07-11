<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Database</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <style>
        /* Added style for marquee effect using CSS */
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
        }
        .marquee span {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 15s linear infinite;
        }
        @keyframes marquee {
            0%   { transform: translate(0, 0); }
            100% { transform: translate(-100%, 0); }
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <h1>
        <div class="marquee">
            <span>Hostel Registration</span>
        </div>
    </h1>
    <br>
    <br>
    <div class="container">
        <form action="secondpage.php" method="post">
            <button type="submit" class="btn btn-primary">Get started</button>
        </form> <!-- Close the form tag here -->
    </div> <!-- Close the div tag here -->
</body>
</html>
