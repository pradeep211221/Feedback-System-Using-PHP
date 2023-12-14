<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
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

        .student-list {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: left;
        }

        .student-item {
            margin-bottom: 10px;
            background-color: lightpink;
        }

        a {
            color: red;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Student List</h1>

    <?php
    // Your existing PHP code here...
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedbacksystem";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a student has been selected for deletion
    if (isset($_GET['delete'])) {
        $id_to_delete = $_GET['delete'];
        $delete_query = "DELETE FROM student WHERE S_NO = $id_to_delete";
        if ($conn->query($delete_query) === TRUE) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // SQL query to retrieve student data
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='student-list'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='student-item'>
                    <strong>S_No:</strong> " . $row["S_NO"] . "<br>
                    <strong>Full_Name:</strong> " . $row["Full_Name"] . "<br>
                    <strong>Email:</strong> " . $row["Email"] . "<br>
                    <strong>Student_Id:</strong> " . $row["Student_Id"] . "<br>
                    <strong>Gender:</strong> " . $row["Gender"] . "<br>
                    <strong>Course:</strong> " . $row["Course"] . "<br>
                    <strong>Action:</strong> <a href='?delete=" . $row["S_NO"] . "'>Delete</a>
                </div>";
        }
        echo "</div>";
    } else {
        echo "No students found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
