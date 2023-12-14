<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $branch = $_POST["branch"];
    $section = $_POST["section"];
    $feedbackTarget = $_POST["feedbackTarget"];

    // Common feedback fields
    $facultyRating = $_POST["faculty_rating"];
    $managementRating = $_POST["management_rating"];

    // Additional feedback fields for faculty
    $courseContent = $_POST["course_content"];
    $teachingMethods = $_POST["teaching_methods"];
    $communicationClarity = $_POST["communication_clarity"];
    $assignmentsFeedback = $_POST["assignments_feedback"];
    $accessibilityAvailability = $_POST["accessibility_availability"];
    $classroomEnvironment = $_POST["classroom_environment"];
    $encouragementMotivation = $_POST["encouragement_motivation"];
    $suggestionsImprovement = $_POST["suggestions_improvement"];

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

    // Get the current date
    $currentDate = date("Y-m-d");

    // Insert data into the feedback table with the current date
    $sql = "INSERT INTO feedback (branch, section, feedback_about, faculty_rating, management_rating, course_content, teaching_methods, communication_clarity, assignments_feedback, access_availability, classroom_environment, encouragement, suggestions, date)
            VALUES ('$branch', '$section', '$feedbackTarget', '$facultyRating', '$managementRating', '$courseContent', '$teachingMethods', '$communicationClarity', '$assignmentsFeedback', '$accessibilityAvailability', '$classroomEnvironment', '$encouragementMotivation', '$suggestionsImprovement', '$currentDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>






<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback Form</title>
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

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        select, input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select, input[type="text"], textarea {
            background-color: #f9f9f9;
        }

        select:hover, input[type="text"]:hover, textarea:hover {
            border: 1px solid #aaa;
        }

        .hidden {
            display: none;
        }
        .rad{
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Student Feedback Form</h1>
    <div class="container">
        <form id="branchSectionForm" onsubmit="selectFeedbackTarget(event)" method="post">
            <form id="branchSectionForm" action="form.php" method="post"></form>
                <label for="branch">Select Branch:</label>
                <select id="branch" name="branch">
                    <option name="CSE" value="cse">Computer Science & Engineering</option>
                    <option name="ECE" value="ece">Electronics & Communication Engineering</option>
                    <option name="ME" value="me">Mechanical Engineering</option>
                    <option name="CIVIL" value="civil">Civil Engineering</option>
                </select>

                <label for="section">Select Section:</label>
                <select id="section" name="section">
                    <option name="SectionA" value="sectionA">Section A</option>
                    <option name="SectionB" value="sectionB">Section B</option>
                    <option name="SectionC" value="sectionC">Section C</option>
                </select>

                <label for="feedbackTarget">Feedback for:</label>
                <select id="feedbackTarget" name="feedbackTarget" required onchange="showSelectedForm()">
                    <option value="">Select</option>
                    <option name="faculty" value="faculty">Faculty</option>
                    <option name="Management" value="management">Management</option>
                </select>
            </form>
                <div id="teacherFeedbackForm" class="hidden">
                    <h2>Feedback Form for Faculty</h2>
                    <form action="form.php" method="POST">
                        <label for="rate_the_faculty_members">Rate the faculty members:</label><br><br>
                        <input type="radio" name="faculty_rating" value="excellent"> Excellent
                        <input type="radio" name="faculty_rating" value="good"> Good
                        <input type="radio" name="faculty_rating" value="average"> Average
                        <input type="radio" name="faculty_rating" value="poor"> Poor
                        <br>
                        <br>
                        <label for="course_content">Course Content and Organization:</label><br><br>
                        <input type="radio" name="course_content" value="excellent"> Excellent
                        <input type="radio" name="course_content" value="good"> Good
                        <input type="radio" name="course_content" value="average"> Average
                        <input type="radio" name="course_content" value="poor"> Poor
                        <br>
                        <br>
                        <label for="teaching_methods">Teaching Methods:</label><br><br>
                        <input type="radio" name="teaching_methods" value="excellent"> Excellent
                        <input type="radio" name="teaching_methods" value="good"> Good
                        <input type="radio" name="teaching_methods" value="average"> Average
                        <input type="radio" name="teaching_methods" value="poor"> Poor
                        <br>
                        <br>
                        <label for="communication_clarity">Communication and Clarity:</label><br><br>
                        <input type="radio" name="communication_clarity" value="excellent"> Excellent
                        <input type="radio" name="communication_clarity" value="good"> Good
                        <input type="radio" name="communication_clarity" value="average"> Average
                        <input type="radio" name="communication_clarity" value="poor"> Poor
                        <br>
                        <br>
                        <label for="assignments_feedback">Assessment and Feedback on Assignments:</label><br><br>
                        <input type="radio" name="assigments_feedback" value="excellent"> Excellent
                        <input type="radio" name="assignments_feedback" value="good"> Good
                        <input type="radio" name="assignments_feedback" value="average"> Average
                        <input type="radio" name="assignments_feedback" value="poor"> Poor
                        <br>
                        <br>
                        <label for="accessibility_availability">Accessibility and Availability:</label><br><br>
                        <input type="radio" name="accessibility_availability" value="excellent"> Excellent
                        <input type="radio" name="accessibility_availability" value="good"> Good
                        <input type="radio" name="accessibility_availability" value="average"> Average
                        <input type="radio" name="accessibility_availability" value="poor"> Poor
                        <br>
                        <br>
                        <label for="classroom_environment">Classroom Environment and Behavior:</label><br><br>
                        <input type="radio" name="classroom_environment" value="excellent"> Excellent
                        <input type="radio" name="classroom_environment" value="good"> Good
                        <input type="radio" name="classroom_environment" value="average"> Average
                        <input type="radio" name="classroom_environment" value="poor"> Poor
                        <br>
                        <br>
                        <label for="encouragement_motivation">Encouragement and Motivation:</label><br><br>
                        <input type="radio" name="encouragement_motivation" value="excellent"> Excellent
                        <input type="radio" name="encouragement_motivation" value="good"> Good
                        <input type="radio" name="encouragement_motivation" value="average"> Average
                        <input type="radio" name="encouragement_motivation" value="poor"> Poor
                        <br>
                        <br>
                        <label for="suggestions_improvement">Suggestions for Improvement:</label><br><br>
                        <input type="radio" name="suggestions_improvement" value="excellent"> Excellent
                        <input type="radio" name="suggestions_improvement" value="good"> Good
                        <input type="radio" name="suggestions_improvement" value="average"> Average
                        <input type="radio" name="suggestions_improvement" value="poor"> Poor
                        <br>
                        <br>
                        <input type="submit" value="Submit Feedback">
                    </form>
            </div>

            <div id="managementFeedbackForm" class="hidden">
                <form action="form.php" method="post">
                    <h2>Feedback Form for Management</h2>
                    <p>Rate the faculty members:</p>
                    <input type="radio" name="faculty_rating" value="excellent"> Excellent
                    <input type="radio" name="faculty_rating" value="good"> Good
                    <input type="radio" name="faculty_rating" value="average"> Average
                    <input type="radio" name="faculty_rating" value="poor"> Poor
                    <p> Rate the Managament:</p>
                    <input type="radio" name="management_rating" value="excellent"> Excellent
                    <input type="radio" name="management_rating" value="good"> Good
                    <input type="radio" name="management_rating" value="average"> Average
                    <input type="radio" name="management_rating" value="poor"> Poor
                    <input type="submit" value="Submit">
                 </form>
            </div>
        </form>
    </div>

    <script>
        function selectFeedbackTarget(event) {
            event.preventDefault();
            // Handle form submission based on selected feedback target
        }

        function showSelectedForm() {
            const feedbackSelection = document.getElementById("feedbackTarget").value;
            const teacherForm = document.getElementById("teacherFeedbackForm");
            const managementForm = document.getElementById("managementFeedbackForm");

            if (feedbackSelection === "faculty") {
                teacherForm.style.display = "block";
                managementForm.style.display = "none";
            } else if (feedbackSelection === "management") {
                managementForm.style.display = "block";
                teacherForm.style.display = "none";
            } else {
                teacherForm.style.display = "none";
                managementForm.style.display = "none";
            }
        }
    </script>
</body>
</html>