<?php
include 'setup.php';
include 'register.html';

if (isset($_POST['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']); // assuming the birthdate is coming from the form
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $allergy = mysqli_real_escape_string($conn, $_POST['allergy']); 
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repass']);

    $birthdateObj = new DateTime($birthdate);
    $currentDateObj = new DateTime();
    $interval = $birthdateObj->diff($currentDateObj);
    $age = $interval->y;

    if ($password != $repass) {
        echo "<script>alert('Password and Repeat Password Do not Match!');</script>";
    } else {
        $sql = "INSERT INTO users (student_id, first_name, last_name, age, birthday, gender, brgy, municipality, province, email, number, department, course, allergy, password) 
                VALUES ('$student_id', '$fname', '$lname', '$age', '$birthdate', '$gender', '$brgy', '$municipality', '$province', '$email', '$phone', '$department', '$course', '$allergy', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New Record Added');</script>";
            echo "<script>location.replace('login.php');</script>";

        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}

mysqli_close($conn);
?>
