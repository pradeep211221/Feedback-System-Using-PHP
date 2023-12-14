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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #333;
            color: #fff;
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
        echo "<table border='1'>
                <tr>
                    <th>S_No</th>
                    <th>Full_Name</th>
                    <th>Email</th>
                    <th>Student_Id</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["S_NO"] . "</td>
                    <td>" . $row["Full_Name"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Student_Id"] . "</td>
                    <td>" . $row["Gender"] . "</td>
                    <td>" . $row["Course"] . "</td>
                    <td><a href='?delete=" . $row["S_NO"] . "'>Delete</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No students found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
