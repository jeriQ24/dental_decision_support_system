<?php
include 'setup.php';

if(isset($_GET['year'])) {
    $selectedYear = $_GET['year'];

    if ($selectedYear === "overall") {
        // Construct the SQL query to fetch data for all years
        $sql = "SELECT 
                    SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) AS male_total,
                    SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) AS female_total,
                    COUNT(*) AS total_users,
                    SUM(CASE WHEN age BETWEEN 5 AND 6 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_5_6,
                    SUM(CASE WHEN age BETWEEN 7 AND 12 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_7_12,
                    SUM(CASE WHEN age BETWEEN 13 AND 16 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_13_16,
                    SUM(CASE WHEN age BETWEEN 17 AND 18 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_17_18,
                    SUM(CASE WHEN age BETWEEN 19 AND 23 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_19_23,
                    SUM(CASE WHEN age BETWEEN 5 AND 6 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_5_6,
                    SUM(CASE WHEN age BETWEEN 7 AND 12 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_7_12,
                    SUM(CASE WHEN age BETWEEN 13 AND 16 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_13_16,
                    SUM(CASE WHEN age BETWEEN 17 AND 18 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_17_18,
                    SUM(CASE WHEN age BETWEEN 19 AND 23 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_19_23
                FROM users";
    } else {
        // Construct the SQL query to fetch data for the selected year
        $sql = "SELECT 
                    SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) AS male_total,
                    SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) AS female_total,
                    COUNT(*) AS total_users,
                    SUM(CASE WHEN age BETWEEN 5 AND 6 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_5_6,
                    SUM(CASE WHEN age BETWEEN 7 AND 12 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_7_12,
                    SUM(CASE WHEN age BETWEEN 13 AND 16 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_13_16,
                    SUM(CASE WHEN age BETWEEN 17 AND 18 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_17_18,
                    SUM(CASE WHEN age BETWEEN 19 AND 23 AND gender = 'Male' THEN 1 ELSE 0 END) AS male_19_23,
                    SUM(CASE WHEN age BETWEEN 5 AND 6 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_5_6,
                    SUM(CASE WHEN age BETWEEN 7 AND 12 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_7_12,
                    SUM(CASE WHEN age BETWEEN 13 AND 16 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_13_16,
                    SUM(CASE WHEN age BETWEEN 17 AND 18 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_17_18,
                    SUM(CASE WHEN age BETWEEN 19 AND 23 AND gender = 'Female' THEN 1 ELSE 0 END) AS female_19_23
                FROM users
                WHERE YEAR(regdate) = $selectedYear";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        $maleData = [
            $data['male_5_6'],
            $data['male_7_12'],
            $data['male_13_16'],
            $data['male_17_18'],
            $data['male_19_23']
        ];

        $femaleData = [
            $data['female_5_6'],
            $data['female_7_12'],
            $data['female_13_16'],
            $data['female_17_18'],
            $data['female_19_23']
        ];

        $totalData = array_map(function($male, $female) {
            return $male + $female;
        }, $maleData, $femaleData);

        // Prepare data to be sent as JSON
        $responseData = [
            'maleData' => $maleData,
            'femaleData' => $femaleData,
            'totalData' => $totalData
        ];

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($responseData);
        exit;
    } else {
        // Handle query error
        echo json_encode(['error' => 'Error executing query']);
        exit;
    }
} else {
    // Handle missing year parameter
    echo json_encode(['error' => 'Year parameter is missing']);
    exit;
}
?>
