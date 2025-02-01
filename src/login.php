<?php
session_start();
include 'setup.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the specified table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Check if the entered password matches the stored password
        if ($password === $row['password']) {
            // Authentication successful, set session variables based on table
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['student_fname'] = $row['first_name'];
            $_SESSION['student_lname'] = $row['last_name'];
            $_SESSION['student_course'] = $row['course'];
            $_SESSION['student_department'] = $row['department'];
            $_SESSION['student_age'] = $row['age'];
            $_SESSION['student_gender'] = $row['gender'];
            echo "<script>alert('You Logged in as a Student.');</script>";
            echo "<script>location.replace('studentdash.php');</script>";
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Check if the entered password matches the stored password
            if ($password === $row['password']) {
                // Authentication successful, set session variables based on table
                $_SESSION['admin_id'] = $row['id'];
                echo "<script>alert('You Logged in as an Admin.');</script>";
                echo "<script>location.replace('admindash.php');</script>";
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        }
    }
}

include 'login.html';
?>
