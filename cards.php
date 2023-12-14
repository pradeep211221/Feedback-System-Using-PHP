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
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
    height: 400px;
    margin: 10px;
    background-color: #e1e1e1;
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
            $tableName = "student";
            $totalStudentCount = getTotalCount($con, $tableName);
            echo $totalStudentCount;
            //$con->close();
            ?>
        </p>
        <p>Total No of Feedbacks Received Today:
            <?php
            include("db.php"); 
            $tableName = "student";
            $resultMessage = countStudentsRegisteredToday($con, $tableName);
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

    <div class="card students-card">
        <h2>Students</h2>
        <p>Total Number of Students: 200</p>
    </div>
</div>
<div>
    <div class="graph-container" style="width: 80%; margin: auto;">
        <canvas id="barChart" width="400" height="200"></canvas>
    </div>
    <div>
        <div class="graph-container" width: 80%; margin: auto; margin-top: 20px;">
            <canvas id="dateChart" width="400" height="200"></canvas>
        </div>
    </div>
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
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
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
                }
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
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>