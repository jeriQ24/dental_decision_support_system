<?php
include 'setup.php';

if (isset($_GET['year']) && isset($_GET['month'])) {
    $year = $_GET['year'];
    $month = $_GET['month'];

    // Fetching data based on selected month and year
    $sql = "SELECT age_group,
            SUM(CASE WHEN result = 'Low Risk' THEN 1 ELSE 0 END) AS low_risk,
            SUM(CASE WHEN result = 'Moderate Risk' THEN 1 ELSE 0 END) AS moderate_risk,
            SUM(CASE WHEN result = 'High Risk' THEN 1 ELSE 0 END) AS high_risk,
            COUNT(*) AS total
            FROM (
                SELECT 
                    CASE
                        WHEN age BETWEEN 5 AND 6 THEN '5-6'
                        WHEN age BETWEEN 7 AND 12 THEN '7-12'
                        WHEN age BETWEEN 13 AND 16 THEN '13-16'
                        WHEN age BETWEEN 17 AND 18 THEN '17-18'
                        WHEN age BETWEEN 19 AND 23 THEN '19-23'
                        ELSE 'Other'
                    END AS age_group,
                    result
                FROM food_monitoring
                WHERE YEAR(date) = $year AND MONTH(date) = $month
            ) AS subquery
            GROUP BY age_group
            ORDER BY FIELD(age_group, '5-6', '7-12', '13-16', '17-18', '19-23', 'Other')";

    $result = mysqli_query($conn, $sql);

    $ages = [];
    $lowRisk = [];
    $moderateRisk = [];
    $highRisk = [];
    $total = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $ages[] = $row['age_group'];
        $lowRisk[] = $row['low_risk'];
        $moderateRisk[] = $row['moderate_risk'];
        $highRisk[] = $row['high_risk'];
        $total[] = $row['total'];
    }

    // Prepare data to send back as JSON
    $response = [
        'ages' => $ages,
        'low_risk' => $lowRisk,
        'moderate_risk' => $moderateRisk,
        'high_risk' => $highRisk,
        'total' => $total // Include total in the response
    ];

    echo json_encode($response);
} else {
    // Invalid request
    echo json_encode(['error' => 'Invalid request']);
}
?>
