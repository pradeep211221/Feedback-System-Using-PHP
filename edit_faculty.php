<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Edit Faculty</h1>
    <?php
    // Check if the faculty ID is provided in the query parameter
    if (isset($_GET['id'])) {
        $faculty_id = $_GET['id'];

        // Your database connection code here...
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "feedbacksystem";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch faculty data by ID
        $sql = "SELECT * FROM faculty WHERE S_no = $faculty_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display the edit form with faculty data
            echo "<form method='post' action='update_fac.php'>";
            echo "<input type='hidden' name='id' value='" . $faculty_id . "'>";
            echo "<label>Name:</label>";
            echo "<input type='text' name='name' value='" . $row['Name_'] . "' required>";
            echo "<label>Email:</label>";
            echo "<input type='text' name='email' value='" . $row['Email'] . "' required>";
            echo "<label>Phone Number:</label>";
            echo "<input type='text' name='phone' value='" . $row['Phone_Number'] . "' required>";
            echo "<label>Department:</label>";
            echo "<input type='text' name='department' value='" . $row['Department'] . "' required>";
            echo "<label>Designation:</label>";
            echo "<input type='text' name='designation' value='" . $row['Designation'] . "' required>";
            echo "<label>Course:</label>";
            echo "<input type='text' name='course' value='" . $row['Course'] . "' required>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
        } else {
            echo "Faculty not found.";
        }

        $conn->close();
    } else {
        echo "Faculty ID not provided.";
    }
    ?>
</body>
</html>
