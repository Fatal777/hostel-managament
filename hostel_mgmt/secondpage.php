

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="background1.css">
    <style>
        /* Inline styles for demonstration, move to your CSS file for production */
        body {
            background: linear-gradient(rgba(0, 0, 50, 0.5), rgba(0, 0, 50, 0.5));
            background-size: cover;
            background-position: center;
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow */
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .login-box {
            width: 100%; /* Full width on small screens */
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .login-left, .login-down {
            background: rgba(211, 211, 211, 0.5);
            padding: 20px;
            border-radius: 8px;
            width: calc(50% - 10px); /* 50% width for each box with some gap */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        .login-left h2, .login-down h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: transparent;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #007bff;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-left, .login-down {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <!-- Login Section -->
        <div class="login-left">
            <h2>Login Here</h2>
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label for="stud_id">Student ID</label>
                    <input type="text" id="stud_id" name="stud_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Get Started</button>
            </form>
        </div>

        <!-- Registration Section -->
        <div class="login-down">
            <h2>Register Here</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" id="student_id" name="student_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reg_password">Password</label>
                    <input type="password" id="reg_password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phoneno">Phone Number</label>
                    <input type="text" id="phoneno" name="phoneno" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
