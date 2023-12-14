
<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $studentid = $_POST['student'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $date = $_POST['date'];
    if (!empty($email) && !empty($password) && !is_numeric($email))
    {
    $query = "INSERT INTO student (Full_Name,Email,Password_,Student_Id,Gender,Course,Date_Of_Registration) VALUES ('$fullname', '$email', '$password','$studentid','$gender', '$course','$date')";
    mysqli_query($con, $query);
    echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Email is already registered')</script>";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
 <style>
    *{
        max-height: 100vh;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            padding: 10px;
            margin: 120px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="gender"],
        select {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="email"]{
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="registration.php" method="post">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email</label> <br>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="student">Student Id</label>
            <input type="text" id="student" name="student" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <label for="course">Course</label>
            <select id="course" name="course">
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
            </select>
            <input type="date" id="date" name="date" required><br>
            
            <button type="submit">Submit</button>
            <p>Alread have an account<a href="studlogin.php" >Login Here</a></p>
        </form>
    </div>
</body>
</html>
