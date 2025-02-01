<?php
session_start();
include 'setup.php';
include 'admineditprofile.html';

$id = $_SESSION['admin_id'];

if (isset($_POST['fname'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repass']);



    if ($password != $repass) {
        echo '<script>alert("Password and Repeat Password do not match")</script>';
    } else {
        // Fix: Added '=' after 'gender'
        $sql = "UPDATE admin SET first_name='$fname', last_name='$lname', birthday='$birthday', brgy='$brgy', municipality='$municipality', province='$province', email='$email', number='$number', password='$password' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Record has been updated")</script>';
            echo '<script>location.replace("admindash.php")</script>';
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

$sql_select = "SELECT * FROM admin WHERE id = '$id'";
$result_select = mysqli_query($conn, $sql_select);

if ($result_select === false) {
    die("Error executing query: " . mysqli_error($conn));
}

// Generate HTML form to edit the selected user data
if (mysqli_num_rows($result_select) == 1) {
    $row = mysqli_fetch_assoc($result_select);
    $fname = $row["first_name"];
    $lname = $row["last_name"];
    $birthday = $row["birthday"];
    $brgy = $row["brgy"];
    $municipality = $row["municipality"];
    $province = $row["province"];
    $email = $row["email"];
    $number = $row["number"];
    $pass = $row["password"];
}
?>
<script>
    // Set the value in the inputs
    document.getElementById('fname').value = '<?php echo isset($fname) ? $fname : ""; ?>';
    document.getElementById('lname').value = '<?php echo isset($lname) ? $lname : ""; ?>';
    document.getElementById('birthday').value = '<?php echo isset($birthday) ? $birthday : ""; ?>';
    document.getElementById('brgy').value = '<?php echo isset($brgy) ? $brgy : ""; ?>';
    document.getElementById('municipality').value = '<?php echo isset($municipality) ? $municipality : ""; ?>';
    document.getElementById('province').value = '<?php echo isset($province) ? $province : ""; ?>';
    document.getElementById('email').value = '<?php echo isset($email) ? $email : ""; ?>';
    document.getElementById('number').value = '<?php echo isset($number) ? $number : ""; ?>';
    document.getElementById('password').value = '<?php echo isset($pass) ? $pass : ""; ?>';
    document.getElementById('repass').value = '<?php echo isset($pass) ? $pass : ""; ?>';
</script>
