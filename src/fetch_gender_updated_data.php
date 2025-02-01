<?php
include 'setup.php';

// Get selected year and month from the request
$genderSelectedYear = $_GET['year'];
$genderSelectedMonth = $_GET['month'];

// Query to fetch updated data
$sql = "SELECT 
            gender,
            SUM(CASE WHEN results = 'Immediate Action Required!' THEN 1 ELSE 0 END) AS immediate_action,
            SUM(CASE WHEN results = 'Addressing Oral Health Issues!' THEN 1 ELSE 0 END) AS addressing_oral_health,
            SUM(CASE WHEN results = 'Moderate Oral Health Issues!' THEN 1 ELSE 0 END) AS moderate_oral_health,
            SUM(CASE WHEN results = 'Watch for Changes!' THEN 1 ELSE 0 END) AS watch_changes,
            SUM(CASE WHEN results = 'Good Oral Health!' THEN 1 ELSE 0 END) AS good_oral_health,
            SUM(CASE WHEN results = 'Excellent Oral Hygiene!' THEN 1 ELSE 0 END) AS excellent_oral_hygiene
        FROM dental_assessment
        WHERE YEAR(date) = '$genderSelectedYear' AND MONTH(date) = '$genderSelectedMonth'
        GROUP BY gender";

$result = mysqli_query($conn, $sql);

$data = array(
    'genders' => array(),
    'immediate_action' => array(),
    'addressing_oral_health' => array(),
    'moderate_oral_health' => array(),
    'watch_changes' => array(),
    'good_oral_health' => array(),
    'excellent_oral_hygiene' => array()
);

while ($row = mysqli_fetch_assoc($result)) {
    $data['genders'][] = $row['gender'];
    $data['immediate_action'][] = $row['immediate_action'];
    $data['addressing_oral_health'][] = $row['addressing_oral_health'];
    $data['moderate_oral_health'][] = $row['moderate_oral_health'];
    $data['watch_changes'][] = $row['watch_changes'];
    $data['good_oral_health'][] = $row['good_oral_health'];
    $data['excellent_oral_hygiene'][] = $row['excellent_oral_hygiene'];
}

// Return data in JSON format
echo json_encode($data);
?>
