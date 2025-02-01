<?php
session_start();
include 'setup.php';
include 'studenteditprofile.html';

$id = $_SESSION['user_id'];

if (isset($_POST['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $allergy = mysqli_real_escape_string($conn, $_POST['allergy']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repass']);

    $birthdateObj = new DateTime($birthday);
    $currentDateObj = new DateTime();
    $interval = $birthdateObj->diff($currentDateObj);
    $age = $interval->y;

    if ($password != $repass) {
        echo '<script>alert("Password and Repeat Password do not match")</script>';
    } else {
        // Fix: Added '=' after 'gender'
        $sql = "UPDATE users SET student_id ='$student_id', first_name='$fname', last_name='$lname', age='$age', birthday='$birthday', brgy='$brgy', municipality='$municipality', province='$province', email='$email', number='$number', course='$course', gender='$gender', allergy='$allergy', password='$password' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Record has been updated")</script>';
            echo '<script>location.replace("studentprofile.php")</script>';
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

$sql_select = "SELECT * FROM users WHERE id = '$id'";
$result_select = mysqli_query($conn, $sql_select);

if ($result_select === false) {
    die("Error executing query: " . mysqli_error($conn));
}

// Generate HTML form to edit the selected user data
if (mysqli_num_rows($result_select) == 1) {
    $row = mysqli_fetch_assoc($result_select);
    $student_id = $row["student_id"];
    $fname = $row["first_name"];
    $lname = $row["last_name"];
    $birthday = $row["birthday"];
    $brgy = $row["brgy"];
    $municipality = $row["municipality"];
    $province = $row["province"];
    $email = $row["email"];
    $number = $row["number"];
    $course = $row["course"];
    $allergy = $row["allergy"];
    $gender = $row["gender"];
    $pass = $row["password"];
}
?>
<script>
    // Set the value in the inputs
    document.getElementById('student_id').value = '<?php echo isset($student_id) ? $student_id : ""; ?>';
    document.getElementById('fname').value = '<?php echo isset($fname) ? $fname : ""; ?>';
    document.getElementById('lname').value = '<?php echo isset($lname) ? $lname : ""; ?>';
    document.getElementById('birthday').value = '<?php echo isset($birthday) ? $birthday : ""; ?>';
    document.getElementById('brgy').value = '<?php echo isset($brgy) ? $brgy : ""; ?>';
    document.getElementById('municipality').value = '<?php echo isset($municipality) ? $municipality : ""; ?>';
    document.getElementById('province').value = '<?php echo isset($province) ? $province : ""; ?>';
    document.getElementById('email').value = '<?php echo isset($email) ? $email : ""; ?>';
    document.getElementById('number').value = '<?php echo isset($number) ? $number : ""; ?>';
    document.getElementById('course').value = '<?php echo isset($course) ? $course : ""; ?>'; 
    document.getElementById('allergy').value = '<?php echo isset($allergy) ? $allergy : ""; ?>';
    document.getElementById('gender').value = '<?php echo isset($gender) ? $gender : ""; ?>';
    document.getElementById('password').value = '<?php echo isset($pass) ? $pass : ""; ?>';
    document.getElementById('repass').value = '<?php echo isset($pass) ? $pass : ""; ?>';
</script>
