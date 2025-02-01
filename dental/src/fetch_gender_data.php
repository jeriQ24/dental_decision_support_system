<?php
include 'setup.php';

if (isset($_GET['year']) && isset($_GET['month'])) {
    $genderYearSelect = $_GET['year'];
    $genderMonthSelect = $_GET['month'];

    // Fetching data based on selected month and year
    $sql = "SELECT gender,
            SUM(CASE WHEN result = 'Low Risk' THEN 1 ELSE 0 END) AS low_risk,
            SUM(CASE WHEN result = 'Moderate Risk' THEN 1 ELSE 0 END) AS moderate_risk,
            SUM(CASE WHEN result = 'High Risk' THEN 1 ELSE 0 END) AS high_risk,
            COUNT(*) AS total
            FROM food_monitoring
            WHERE YEAR(date) = $genderYearSelect AND MONTH(date) = $genderMonthSelect
            GROUP BY gender
            ORDER BY gender";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Debugging statement to output any SQL errors
        error_log("SQL Error: " . mysqli_error($conn));
        echo json_encode(['error' => 'SQL error occurred']);
        exit; // Exit the script if there's an error
    }

    $genders = [];
    $lowRisk = [];
    $moderateRisk = [];
    $highRisk = [];
    $total = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $genders[] = $row['gender'];
        $lowRisk[] = $row['low_risk'];
        $moderateRisk[] = $row['moderate_risk'];
        $highRisk[] = $row['high_risk'];
        $total[] = $row['total']; // Add total to the array
    }

    // Prepare data to send back as JSON
    $response = [
        'genders' => $genders,
        'low_risk' => $lowRisk,
        'moderate_risk' => $moderateRisk,
        'high_risk' => $highRisk,
        'total' => $total // Include total in the response
    ];

    echo json_encode($response);
} else {
    // Debugging statement for invalid request
    error_log("Invalid request: Year and month not set");
    echo json_encode(['error' => 'Invalid request']);
}
?>
