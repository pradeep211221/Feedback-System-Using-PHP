<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $branch = isset($_POST["branch"]) ? $_POST["branch"] : null;
    $section = isset($_POST["section"]) ? $_POST["section"] : null;
    $feedbackTarget = isset($_POST["feedbackTarget"]) ? $_POST["feedbackTarget"] : null;

    // Common feedback fields
    $facultyRating = isset($_POST["faculty_rating"]) ? $_POST["faculty_rating"] : null;
    $managementRating = isset($_POST["management_rating"]) ? $_POST["management_rating"] : null;

    // Additional feedback fields for faculty
    $courseContent = isset($_POST["course_content"]) ? $_POST["course_content"] : null;
    $teachingMethods = isset($_POST["teaching_methods"]) ? $_POST["teaching_methods"] : null;
    $communicationClarity = isset($_POST["communication_clarity"]) ? $_POST["communication_clarity"] : null;
    $assignmentsFeedback = isset($_POST["assignments_feedback"]) ? $_POST["assignments_feedback"] : null;
    $accessibilityAvailability = isset($_POST["accessibility_availability"]) ? $_POST["accessibility_availability"] : null;
    $classroomEnvironment = isset($_POST["classroom_environment"]) ? $_POST["classroom_environment"] : null;
    $encouragementMotivation = isset($_POST["encouragement_motivation"]) ? $_POST["encouragement_motivation"] : null;
    $suggestionsImprovement = isset($_POST["suggestions_improvement"]) ? $_POST["suggestions_improvement"] : null;

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
            VALUES ('$branch', '$section', '$feedbackTarget', '$facultyRating', '$managementRating',";

    // Add optional feedback columns with default value NULL if not set
    $sql .= isset($courseContent) ? " '$courseContent'," : " NULL,";
    $sql .= isset($teachingMethods) ? " '$teachingMethods'," : " NULL,";
    $sql .= isset($communicationClarity) ? " '$communicationClarity'," : " NULL,";
    $sql .= isset($assignmentsFeedback) ? " '$assignmentsFeedback'," : " NULL,";
    $sql .= isset($accessibilityAvailability) ? " '$accessibilityAvailability'," : " NULL,";
    $sql .= isset($classroomEnvironment) ? " '$classroomEnvironment'," : " NULL,";
    $sql .= isset($encouragementMotivation) ? " '$encouragementMotivation'," : " NULL,";
    $sql .= isset($suggestionsImprovement) ? " '$suggestionsImprovement'," : " NULL,";

    // Complete the SQL query
    $sql .= " '$currentDate')";

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
        /* Your existing styles here */
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
        <form id="feedbackForm" action="form.php" method="post">
            <!-- Common form elements (Branch, Section, Feedback Target) -->
            <label for="branch">Select Branch:</label>
            <select id="branch" name="branch">
                <!-- Options here -->
                    <option name="CSE" value="cse">Computer Science & Engineering</option>
                    <option name="ECE" value="ece">Electronics & Communication Engineering</option>
                    <option name="ME" value="me">Mechanical Engineering</option>
                    <option name="CIVIL" value="civil">Civil Engineering</option>
            </select>

            <label for="section">Select Section:</label>
            <select id="section" name="section">
                <!-- Options here -->
                    <option name="SectionA" value="sectionA">Section A</option>
                    <option name="SectionB" value="sectionB">Section B</option>
                    <option name="SectionC" value="sectionC">Section C</option>
            </select>

            <label for="feedbackTarget">Feedback for:</label>
            <select id="feedbackTarget" name="feedbackTarget" required onchange="showSelectedForm()">
                <!-- Options here -->
                    <option value="">Select</option>
                    <option name="faculty" value="faculty">Faculty</option>
                    <option name="Management" value="management">Management</option>
            </select>

            <!-- Form sections for Faculty and Management feedback -->
            <div id="teacherFeedbackForm" class="hidden">
                <!-- Faculty feedback form elements here -->
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
            </div>

            <div id="managementFeedbackForm" class="hidden">
                <!-- Management feedback form elements here -->
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
            </div>

            <!-- Submit button -->
            <input type="submit" value="Submit Feedback">
        </form>
    </div>

    <script>
        /* Your existing scripts here */
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
