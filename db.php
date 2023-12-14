<?php
$con = new mysqli("localhost", "root", "", "feedbacksystem");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>