<?php
include 'setup.php';

// Ensure that year and month parameters are set
if (isset($_GET['year']) && isset($_GET['month'])) {
    $year = $_GET['year'];
    $month = $_GET['month'];

    // SQL query to fetch updated data for the selected year and month
    $sqlAgeUpdated = "SELECT 
                DISTINCT age_group,
                SUM(CASE WHEN results = 'Immediate Action Required!' THEN 1 ELSE 0 END) AS immediate_action,
                SUM(CASE WHEN results = 'Addressing Oral Health Issues!' THEN 1 ELSE 0 END) AS addressing_oral_health,
                SUM(CASE WHEN results = 'Moderate Oral Health Issues!' THEN 1 ELSE 0 END) AS moderate_oral_health,
                SUM(CASE WHEN results = 'Watch for Changes!' THEN 1 ELSE 0 END) AS watch_changes,
                SUM(CASE WHEN results = 'Good Oral Health!' THEN 1 ELSE 0 END) AS good_oral_health,
                SUM(CASE WHEN results = 'Excellent Oral Hygiene!' THEN 1 ELSE 0 END) AS excellent_oral_hygiene
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
                        results
                    FROM dental_assessment
                    WHERE YEAR(date) = $year AND MONTH(date) = $month AND age BETWEEN 5 AND 23
                ) AS subquery
                GROUP BY age_group
                ORDER BY FIELD(age_group, '5-6', '7-12', '13-16', '17-18', '19-23', 'Other')";

    // Execute SQL query
    $resultUpdated = mysqli_query($conn, $sqlAgeUpdated);

    $agesUpdated = array(); // Array to hold unique ages names
    $dataUpdated = array(
        'Immediate Action Required' => array(),
        'Addressing Oral Health Issues' => array(),
        'Moderate Oral Health Issues' => array(),
        'Watch for Changes' => array(),
        'Good Oral Health' => array(),
        'Excellent Oral Hygiene' => array()
    );

    while ($row = mysqli_fetch_assoc($resultUpdated)) {
        $age = $row['age_group'];

        // If age is not already in the array, add it
        if (!in_array($age, $agesUpdated)) {
            $agesUpdated[] = $age;
        }

        // Populate data for each result type
        $dataUpdated['Immediate Action Required'][] = $row['immediate_action'];
        $dataUpdated['Addressing Oral Health Issues'][] = $row['addressing_oral_health'];
        $dataUpdated['Moderate Oral Health Issues'][] = $row['moderate_oral_health'];
        $dataUpdated['Watch for Changes'][] = $row['watch_changes'];
        $dataUpdated['Good Oral Health'][] = $row['good_oral_health'];
        $dataUpdated['Excellent Oral Hygiene'][] = $row['excellent_oral_hygiene'];
    }

    // Prepare the response array
    $response = array(
        'ages' => $agesUpdated,
        'immediate_action' => $dataUpdated['Immediate Action Required'],
        'addressing_oral_health' => $dataUpdated['Addressing Oral Health Issues'],
        'moderate_oral_health' => $dataUpdated['Moderate Oral Health Issues'],
        'watch_changes' => $dataUpdated['Watch for Changes'],
        'good_oral_health' => $dataUpdated['Good Oral Health'],
        'excellent_oral_hygiene' => $dataUpdated['Excellent Oral Hygiene']
    );

    // Send JSON response
    echo json_encode($response);
} else {
    // Handle error if parameters are not set
    echo "Error: Year and month parameters are required.";
}
?>
