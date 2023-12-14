
<?php
session_start();
include("db.php");

// Initialize the success message variable
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $course = $_POST['course'];
    $query = "INSERT INTO faculty (Name_,Email,Phone_Number,Department,Designation,Course) VALUES ('$fullname', '$email', '$phone', '$department', '$designation', '$course')";
    if (mysqli_query($con, $query)) {
        // Data inserted successfully, set the success message
        $successMessage = "Added Succesfylly.";
    } else {
        $successMessage = "Sorry TRY Again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow: hidden; 
        position: relative;
    }
    body::before,
    body::after {
        content: '';
        position: absolute;
        background-color: #f9a825; 
        border-radius: 50%;
    }

    body::before {
        width: 300px; 
        height: 300px;
        top: -50px; 
        left: -50px;
    }

    body::after {
        width: 350px; 
        height:350px;
        bottom: -50px; 
        right: -50px;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 400px;
        text-align: center;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 400px;
        text-align: center;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 400px;
        text-align: center;
    }

    h1 {
        color: #333;
    }

    label {
        display: block;
        font-weight: bold;
        color: #555;
        text-align: left;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form > * {
        margin-bottom: 15px;
    }
</style>


</head>
<body>
    <div class="container">
        <h1>ADD FACULTY</h1>
        <?php
        if (!empty($successMessage)) {
            echo '<div style="color: green;">' . $successMessage . '</div>';
        }
        ?>
        <form action="addfaculty.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>

            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" required>

            <label for="course">Course:</label>
            <select id="course" name="course">
                <option value="Computer Science">Computer Science</option>
                <option value="Engineering">Engineering</option>
                <option value="Business">Business</option>
                <option value="Art and Design">Art and Design</option>
            </select><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>