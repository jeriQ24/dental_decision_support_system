<?php
// Make sure session is started
session_start();

include 'setup.php';

// Retrieve and output approved appointments
$approvedAppointments = array();
$currentDate = date('Y-m-d H:i:s'); // Get the current date and time

if ($stmt = $conn->prepare("SELECT course, CONCAT(first_name, ' ', last_name) AS full_name, date, TIME_FORMAT(time, '%H:%i') AS formatted_time, description FROM appointment WHERE date > ? AND status = 'Approved'")) {
    $stmt->bind_param('s', $currentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $approvedAppointments[] = $row;
        }
        $result->free(); // Free the result set
    }
    $stmt->close();
}

$conn->close();

// Output the approved appointments
header('Content-Type: application/json');
echo json_encode($approvedAppointments);
?>
