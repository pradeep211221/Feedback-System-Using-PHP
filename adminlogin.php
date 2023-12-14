<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    if(isset($_POST['pass'])){
    if (!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query="SELECT * FROM admin WHERE email = '$email'";
      $result=mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0)
        {
            $userdata= mysqli_fetch_assoc($result);
            if($userdata["Password"] == $password)
            {
                header("Location: section.php");
                die;
            }else{
                echo "<script type='text/javascript'> alert('wrong possword')</script>";
            }
        }else{
            echo "<script type='text/javascript'> alert('user not Registered')</script>";
        }
    }
    else{
        echo "<script type='text/javascript'> alert('please provide valid information')</script>";
    }
}
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 160px;
            background-color: #ffffff;
            border: 5px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"]{
            width:100px;
            background-color:lightgreen;
            border-radius:10px;
            cursor:pointer;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .checkbox-group label {
            margin: 0;
        }
        .btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .show-password {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> ADMIN LOGIN</h2>
        <form action="adminlogin.php" method="post">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" id="username" name="mail" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="pass" required>
            </div>
            <div class="checkbox-group">
                <label for="showPassword">
                    <input type="checkbox" id="showPassword"> Show Password
                </label>
            </div>
            <div class="show-password">
            </div>
            <div class="form-group">
                <input type="submit" value="login" class="btn">
            </div>
        </form>
    </div>
    <script>
        const showPasswordCheckbox = document.getElementById("showPassword");
        const passwordInput = document.getElementById("password");
        const showPasswordDiv = document.querySelector(".show-password");

        showPasswordCheckbox.addEventListener("change", function () {
            passwordInput.type = this.checked ? "text" : "password";
        });
    </script>
</body>
</html>