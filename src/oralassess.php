<?php
// Define the sanitizeInput function
function sanitizeInput($conn, $input) {
    // Implement your input sanitization logic here
    // For example, you can use mysqli_real_escape_string to prevent SQL injection
    return mysqli_real_escape_string($conn, $input);
}

// Include the setup.php file
include 'setup.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // It's important to pass the $conn parameter to the sanitizeInput function
    $student_id = sanitizeInput($conn, $_POST["studentid"]);
    $fname = sanitizeInput($conn, $_POST["student_fname"]);
    $lname = sanitizeInput($conn, $_POST["student_lname"]);
    $course = sanitizeInput($conn, $_POST["student_course"]);
    $department = sanitizeInput($conn, $_POST["student_department"]);
    $age = sanitizeInput($conn, $_POST["student_age"]);
    $gender = sanitizeInput($conn, $_POST["student_gender"]);
    $lips = sanitizeInput($conn, $_POST["Lips"]);
    $dentalPain = sanitizeInput($conn, $_POST["Dental"]);
    $naturalTeeth = sanitizeInput($conn, $_POST["Teeth"]);
    $dentures = sanitizeInput($conn, $_POST["Dentures"]);
    $oralCleanliness = sanitizeInput($conn, $_POST["Oral"]);
    $saliva = sanitizeInput($conn, $_POST["Saliva"]);
    $tongue = sanitizeInput($conn, $_POST["Tongue"]);
    $gums = sanitizeInput($conn, $_POST["Gums"]);
    $hygiene = sanitizeInput($conn, $_POST["Hygiene"]);


    // Calculate the total score
    $results = $lips + $dentalPain + $naturalTeeth + $dentures + $oralCleanliness + $saliva + $tongue + $gums + $hygiene;

    if ($results > 6) {
        $results_msg = "Immediate Action Required!";
    }
    else if ($results > 4 && $results <= 6) {
        $results_msg = "Addressing Oral Health Issues!";
    }
    else if ($results > 2 && $results <= 4) {
        $results_msg = "Moderate Oral Health Issues!";
    }
    else if ($results == 2) {
        $results_msg = "Watch for Changes!";
    }
    else if ($results == 1) {
        $results_msg = "Good Oral Health!";
    }
    else if ($results <= 0) {
        $results_msg = "Excellent Oral Hygiene!";   
    }
    else {
        $results_msg = "Your dental assessment is in a normal range.";
    }

    // Escape the single quote in the results message
    $results_msg = $conn->real_escape_string($results_msg);

    // Get the current date in Y-m-d format
    $current_date = date("Y-m-d");

    // Insert a new entry into the dental_assessment table
    $insert_sql2 = "INSERT INTO dental_assessment (student_id, first_name, last_name, course, department, age, gender, lips, dental_pain, natural_teeth, dentures, oral_cleanliness, saliva, tongue, gum_and_tissues, oral_hygiene,results, total_results, date)
                    VALUES ('$student_id', '$fname', '$lname', '$course', '$department', '$age', '$gender', '$lips', '$dentalPain', '$naturalTeeth', '$dentures', '$oralCleanliness', '$saliva', '$tongue', '$gums', '$hygiene', '$results_msg', '$results', '$current_date')";

    if ($conn->query($insert_sql2) === TRUE) {
        echo '<script>alert("Assessment data inserted successfully.");</script>';
        echo '<script> window.location.href = "adminstudentprofile.php?student_id=' . urlencode($student_id) . '"; </script>';
    } else {
        echo "Error inserting assessment data: " . $conn->error;
    }
}
?>



