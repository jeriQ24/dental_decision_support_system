<?php
// Make sure session is started
session_start();

include 'setup.php';

// Use proper escaping for the user input (student_id) to prevent SQL injection
$student_id = $conn->real_escape_string($_SESSION['student_id']);

// Retrieve appointment data
$sql = "SELECT id, date, TIME_FORMAT(time, '%H:%i') AS formatted_time, description FROM appointment WHERE status = 'Approved' AND student_id = '$student_id'";
$result = $conn->query($sql);

$appointments = array();
$doneAppointments = array();

$currentDate = date('Y-m-d H:i:s'); // Get the current date and time

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;

        // Check if the appointment date has passed
        if ($row['date'] <= $currentDate) {
            // Transfer the appointment to the done_appointment table
            $doneAppointments[] = $row;
            $id = $row['id'];
            $date = $row['date'];
            $formattedTime = $row['formatted_time'];
            $description = $conn->real_escape_string($row['description']);

            // Insert the appointment into the done_appointment table
            $insertSql = "INSERT INTO done_appointment (student_id, date, time, description) VALUES ('$student_id', '$date', '$formattedTime', '$description')";
            $conn->query($insertSql);

            // Remove the appointment from the verify_appointment table
            $deleteSql = "DELETE FROM appointment WHERE id = '$id'";
            $conn->query($deleteSql);
        }
    }
    $result->free();  // Free the result set
}

$conn->close();

// Output the appointments that are still pending
header('Content-Type: application/json');
echo json_encode($appointments);
?>
