<?php
session_start();
include 'setup.php';
include 'studentappointment.html';

// Validate and initialize session variables
$student_id = $_SESSION['student_id'] ?? '';
$student_fname = $_SESSION['student_fname'] ?? '';
$student_lname = $_SESSION['student_lname'] ?? '';
$student_course = $_SESSION['student_course'] ?? '';
$status = "Pending";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Minimal validation (not recommended for production)
    $description = $_POST["description"] ?? '';
    $date = $_POST["date"] ?? '';
    $time = $_POST["time"] ?? '';

    // Check if the selected time is available
    $checkTimeAvailabilitySql = "SELECT COUNT(*) AS count FROM appointment WHERE date = '$date' AND time = '$time' AND (status = 'Pending' OR status = 'Approved')";
    $result = $conn->query($checkTimeAvailabilitySql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['count'];

        // If the time is already taken and the status is Approved, do not insert a new record
        if ($count > 0) {
            echo '<script>alert("Selected time is already taken and approved. Please choose another time.");</script>';
            // You may add additional handling or redirect here if needed
        } else {
            // Insert data into the database without prepared statements or sanitization
            $insertSql = "INSERT INTO appointment (student_id, status, first_name, last_name, course, date, time, description)
                          VALUES ('$student_id', '$status', '$student_fname', '$student_lname', '$student_course', '$date', '$time', '$description')";

            if ($conn->query($insertSql) === TRUE) {
                echo '<script>alert("Appointment added successfully.");</script>';
                echo '<script>location.replace("studentdash.php");</script>';
            } else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error checking time availability: " . $conn->error;
    }
}
?>
