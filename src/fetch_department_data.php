<?php
include 'setup.php';

if (isset($_GET['year']) && isset($_GET['month'])) {
    $deptYearSelect = $_GET['year'];
    $deptMonthSelect = $_GET['month'];

    // Fetching data based on selected month and year
    $sql = "SELECT department,
            SUM(CASE WHEN result = 'Low Risk' THEN 1 ELSE 0 END) AS low_risk,
            SUM(CASE WHEN result = 'Moderate Risk' THEN 1 ELSE 0 END) AS moderate_risk,
            SUM(CASE WHEN result = 'High Risk' THEN 1 ELSE 0 END) AS high_risk,
            COUNT(*) AS total
            FROM food_monitoring
            WHERE YEAR(date) = $deptYearSelect AND MONTH(date) = $deptMonthSelect
            GROUP BY department
            ORDER BY department";

    $result = mysqli_query($conn, $sql);

    $departments = [];
    $lowRisk = [];
    $moderateRisk = [];
    $highRisk = [];
    $total = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row['department'];
        $lowRisk[] = $row['low_risk'];
        $moderateRisk[] = $row['moderate_risk'];
        $highRisk[] = $row['high_risk'];
        $total[] = $row['total']; // Add total to the array
    }

    // Prepare data to send back as JSON
    $response = [
        'departments' => $departments,
        'low_risk' => $lowRisk,
        'moderate_risk' => $moderateRisk,
        'high_risk' => $highRisk,
        'total' => $total // Include total in the response
    ];

    // Log the response data
    error_log("Response Data: " . json_encode($response));

    echo json_encode($response);
} else {
    // Debugging statement for invalid request
    error_log("Invalid request: Year and month not set");
    echo json_encode(['error' => 'Invalid request']);
}
?>
