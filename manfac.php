<!DOCTYPE html>
<html>
<head>
    <title>Manage Faculty</title>
    <style>
        /* Your existing CSS styles here... */
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
            width: 90%;
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
    <h1>Faculty List</h1>
    <?php
    // Your existing PHP code here...
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
    if (isset($_GET['delete'])) {
        // Delete action (your existing code)
        $id_to_delete = $_GET['delete'];
        $delete_query = "DELETE FROM faculty WHERE S_no = $id_to_delete";
        if ($conn->query($delete_query) === TRUE) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }


    if (isset($_GET['edit'])) {
        // Redirect to the edit page with the faculty ID
        $id_to_edit = $_GET['edit'];
        header("Location: edit_faculty.php?id=$id_to_edit");
        exit();
    }

    // SQL query to retrieve faculty data
    // Your existing code here...
    $sql = "SELECT * FROM faculty";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>S_no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone_Number</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["S_no"] . "</td>
                    <td>" . $row["Name_"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Phone_Number"] . "</td>
                    <td>" . $row["Department"] . "</td>
                    <td>" . $row["Designation"] . "</td>
                    <td>" . $row["Course"] . "</td>
                    <td>
                        <a href='?edit=" . $row["S_no"] . "'>Edit</a> | 
                        <a href='?delete=" . $row["S_no"] . "'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No faculty found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
