<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated faculty data
    $faculty_id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];
    $designation = $_POST["designation"];
    $course = $_POST["course"];

    // Your database connection code here...
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedbacksystem";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the faculty data in the database
    $sql = "UPDATE faculty SET Name_='$name', Email='$email', Phone_Number='$phone', Department='$department', Designation='$designation', Course='$course' WHERE S_no = $faculty_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header("Location: manfac.php");
exit();


    $conn->close();
}
?>