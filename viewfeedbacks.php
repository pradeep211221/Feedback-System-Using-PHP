<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedbacksystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve feedback data from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View Feedbacks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .feedback-list {
            list-style-type: none;
            padding: 0;
        }

        .feedback-item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9; /* Add background color */
        }
        .feedback-item{
            background-color: lightseagreen;
        }
    </style>
</head>
<body>
    <?php
    // Count the total feedbacks
    $totalFeedbacks = $result->num_rows;
    ?>
    <h1>Admin - View Feedbacks</h1>
    <div class="container">
    <div class="feedback-count">Total Feedbacks: <?php echo $totalFeedbacks; ?></div>
        <ul class="feedback-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='feedback-item'>
                            <strong>Branch:</strong> {$row['branch']}<br>
                            <strong>Section:</strong> {$row['section']}<br>
                            <strong>Feedback Target:</strong> {$row['feedback_about']}<br>
                            <strong>Faculty Rating:</strong> {$row['faculty_rating']}<br>
                            <strong>Management Rating:</strong> {$row['management_rating']}<br>
                            <strong>Course Content:</strong> {$row['course_content']}<br>
                            <strong>Teaching Methods:</strong> {$row['teaching_methods']}<br>
                            <strong>Communication Clarity:</strong> {$row['communication_clarity']}<br>
                            <strong>Assignments Feedback:</strong> {$row['assignments_feedback']}<br>
                            <strong>Availability:</strong> {$row['access_availability']}<br>
                            <strong>Classroom Environment:</strong> {$row['classroom_environment']}<br>
                            <strong>Motivation:</strong> {$row['encouragement']}<br>
                            <strong>Suggestions:</strong> {$row['suggestions']}<br>
                            <strong>Date:</strong> {$row['date']}<br>
                        </li>";
                }
            } else {
                echo "<li>No feedbacks found</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>


