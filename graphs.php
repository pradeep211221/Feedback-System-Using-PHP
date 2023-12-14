<?php
function getTotalCount($con, $tableName) {
    $query = "SELECT COUNT(*) as total_reg FROM $tableName";
    $result = $con->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $total_reg = $row['total_reg'];
        return $total_reg;
    } else {
        return "ERROR: " . $con->error;
    }
}
function countStudentsRegisteredToday($con, $tableName) {
    $currentDate = date("Y-m-d");
    $query = "SELECT COUNT(*) as today_reg FROM $tableName WHERE Date_Of_Registration = '$currentDate'";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $today_reg = $row['today_reg'];
        return $today_reg;
    } else {
        return "ERROR: " . $con->error;
    }
}
function getTotalFeedbackCount($con, $tableName) {
    $query = "SELECT COUNT(*) AS total_feedbacks FROM $tableName";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $totalFeedbacks = $row['total_feedbacks'];
        return $totalFeedbacks;
    } else {
        return "ERROR: " . $con->error;
    }
}
function countStudentsfeedToday($con, $tableName) {
    $currentDate = date("Y-m-d");
    $query = "SELECT COUNT(*) as today_feed FROM $tableName WHERE Date= '$currentDate'";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $today_reg = $row['today_feed'];
        return $today_reg;
    } else {
        return "ERROR: " . $con->error;
    }
}

include("db.php"); // Include your database connection script
// $tableName = "student"; // Change this to your actual table name

// // Call the function to get the total student count
// $totalStudentCount = getTotalCount($con, $tableName);

// // Output the result
// echo $totalStudentCount;

// // Close the database connection when done
// $con->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Feedback & Students</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin: 20px;
            width: 200px;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .feedback-card {
            background-color: #007bff;
            color: #fff;
        }

        .students-card {
            background-color: #28a745;
            color: #fff;
        }

        .graph-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Display graphs in a column */
            height: 400px;
            margin: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        canvas {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card feedback-card">
            <h2>Feedback</h2>
            <p>Total No Of Feedbacks Received: 
                <?php
                include("db.php");
                $tableName = "feedback";
                $totalStudentCount = getTotalFeedbackCount($con, $tableName);
                echo $totalStudentCount;
                //$con->close();
                ?>
            </p>
            <p>Total No of Feedbacks Received Today:
                <?php
                include("db.php"); 
                $tableName = "feedback";
                $resultMessage = countStudentsfeedToday($con, $tableName);
                echo $resultMessage;
                //$con->close();
                ?>
            </p>
        </div>

        <div class="card students-card">
            <h2>Students</h2>
            <p>Total Number of Students:<?php
                //include("db.php");
                $tableName = "student";
                $totalStudentCount = getTotalCount($con, $tableName);
                echo $totalStudentCount;
                //$con->close();
                ?></p>
            <p>Total Number of Students Registered Today: 
                <?php
                include("db.php"); 
                $tableName = "student";
                $resultMessage = countStudentsRegisteredToday($con, $tableName);
                echo $resultMessage;
                //$con->close();
                ?>
            </p> 
        </div>

        <div class="card feedback-card">
            <h2>Faculty</h2>
            <p>Number of Faculty: <?php
                include("db.php");
                $tableName = "faculty";
                $totalStudentCount = getTotalCount($con, $tableName);
                echo $totalStudentCount;
                $con->close();
                ?></p>
        </div>
    </div>

    <div class="graph-container" style="width: 80%; margin: auto;">
        <canvas id="barChart" width="400" height="200"></canvas>
    </div>

    <div class="graph-container" style="width: 80%; margin: auto; margin-top: 20px;">
        <canvas id="dateChart" width="400" height="200"></canvas>
    </div>

    <div class="graph-container" style="width: 80%; margin: auto; margin-top: 20px;">
        <canvas id="feedbacksByDateChart" width="400" height="200"></canvas>
    </div>

    <?php
    // Database connection
    include("db.php");
    // Query to fetch data
    $query = "SELECT Gender, COUNT(*) AS count FROM student GROUP BY Gender";
    $result = $con->query($query);

    // Data transformation
    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['Gender'];
        $data[] = $row['count'];
    }
    //query used to fetch the date data
    $dateQuery = "SELECT Date_Of_Registration, COUNT(*) AS count2 FROM student GROUP BY Date_Of_Registration";
    $dateResult = $con->query($dateQuery);

    // Data transformation for date chart
    $dateLabels = [];
    $dateData = [];

    while ($dateRow = $dateResult->fetch_assoc()) {
        $dateLabels[] = $dateRow['Date_Of_Registration'];
        $dateData[] = $dateRow['count2'];
    }

    // Query to fetch data for feedbacks by date
    $feedbacksByDateQuery = "SELECT Date, COUNT(*) AS count3 FROM feedback GROUP BY Date";
    $feedbacksByDateResult = $con->query($feedbacksByDateQuery);

    // Data transformation for feedbacks by date chart
    $feedbacksByDateLabels = [];
    $feedbacksByDateData = [];

    while ($feedbacksByDateRow = $feedbacksByDateResult->fetch_assoc()) {
        $feedbacksByDateLabels[] = $feedbacksByDateRow['Date'];
        $feedbacksByDateData[] = $feedbacksByDateRow['count3'];
    }
    ?>
      <?php
// Generate dynamic colors for each bar based on gender
$backgroundColors = [];
foreach ($labels as $gender) {
    $backgroundColors[] = ($gender == 'male') ? 'rgba(148, 87, 235, 0.8)' : 'rgba(75, 192, 192, 0.8)';
}
?>



    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels);?>,
        datasets: [{
            label: 'Registration Count',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: <?php echo json_encode($backgroundColors); ?>,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true,
                stepSize: 1
            },
            y: {
                beginAtZero: true
            }
        },
        barWidth: 1 // Adjust the width as needed
    }
});

    var dateCtx = document.getElementById('dateChart').getContext('2d');
    var dateChart = new Chart(dateCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($dateLabels); ?>,
            datasets: [{
                label: 'Date Registration Count',
                data: <?php echo json_encode($dateData); ?>,
                backgroundColor: 'rgba(192, 75, 75, 0.5)',
                borderColor: 'rgba(192, 75, 75, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

        var feedbacksByDateCtx = document.getElementById('feedbacksByDateChart').getContext('2d');
        var feedbacksByDateChart = new Chart(feedbacksByDateCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($feedbacksByDateLabels); ?>,
                datasets: [{
                    label: 'Feedbacks by Date',
                    data: <?php echo json_encode($feedbacksByDateData); ?>,
                    backgroundColor: 'rgba(255, 193, 7, 0.7)',
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>

