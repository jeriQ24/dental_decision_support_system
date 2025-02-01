<?php
session_start();
include 'setup.php';
include 'adminstudent_mouth_examination.html';

// Use a prepared statement to avoid SQL injection
$id = isset($_GET['student_id']) ? $_GET['student_id'] : '';

// Directly interpolate $id into the SQL query (be cautious about SQL injection)
$sql = "SELECT * FROM users WHERE student_id = '$id'";
$result_select = mysqli_query($conn, $sql);

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
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = isset($_POST['student_id_input']) ? $_POST['student_id_input'] : '';
    $first_name = isset($_POST['fname_input']) ? $_POST['fname_input'] : '';
    $last_name = isset($_POST['lname_input']) ? $_POST['lname_input'] : '';
    $course = isset($_POST['course_input']) ? $_POST['course_input'] : '';
    $_18 = isset($_POST['18']) ? $_POST['18'] : '';     $_17 = isset($_POST['17']) ? $_POST['17'] : '';
    $_16 = isset($_POST['16']) ? $_POST['16'] : '';     $_15 = isset($_POST['15']) ? $_POST['15'] : '';
    $_14 = isset($_POST['14']) ? $_POST['14'] : '';     $_13 = isset($_POST['13']) ? $_POST['13'] : '';
    $_12 = isset($_POST['12']) ? $_POST['12'] : '';     $_11 = isset($_POST['11']) ? $_POST['11'] : '';
    $_21 = isset($_POST['21']) ? $_POST['21'] : '';     $_22 = isset($_POST['22']) ? $_POST['22'] : '';
    $_23 = isset($_POST['23']) ? $_POST['23'] : '';     $_24 = isset($_POST['24']) ? $_POST['24'] : '';
    $_25 = isset($_POST['25']) ? $_POST['25'] : '';     $_26 = isset($_POST['26']) ? $_POST['26'] : '';
    $_27 = isset($_POST['27']) ? $_POST['27'] : '';     $_28 = isset($_POST['28']) ? $_POST['28'] : '';
    $_55 = isset($_POST['55']) ? $_POST['55'] : '';     $_54 = isset($_POST['54']) ? $_POST['54'] : '';
    $_53 = isset($_POST['53']) ? $_POST['53'] : '';     $_52 = isset($_POST['52']) ? $_POST['52'] : '';
    $_51 = isset($_POST['51']) ? $_POST['51'] : '';     $_61 = isset($_POST['61']) ? $_POST['61'] : '';
    $_62 = isset($_POST['62']) ? $_POST['62'] : '';     $_63 = isset($_POST['63']) ? $_POST['63'] : '';
    $_64 = isset($_POST['64']) ? $_POST['64'] : '';     $_65 = isset($_POST['65']) ? $_POST['65'] : '';
    $_85 = isset($_POST['85']) ? $_POST['85'] : '';     $_84 = isset($_POST['84']) ? $_POST['84'] : '';
    $_83 = isset($_POST['83']) ? $_POST['83'] : '';     $_82 = isset($_POST['82']) ? $_POST['82'] : '';
    $_81 = isset($_POST['81']) ? $_POST['81'] : '';     $_71 = isset($_POST['71']) ? $_POST['71'] : '';
    $_72 = isset($_POST['72']) ? $_POST['72'] : '';     $_73 = isset($_POST['73']) ? $_POST['73'] : '';
    $_74 = isset($_POST['74']) ? $_POST['74'] : '';     $_75 = isset($_POST['75']) ? $_POST['75'] : '';
    $_48 = isset($_POST['48']) ? $_POST['48'] : '';     $_47 = isset($_POST['47']) ? $_POST['47'] : '';
    $_46 = isset($_POST['46']) ? $_POST['46'] : '';     $_45 = isset($_POST['45']) ? $_POST['45'] : '';
    $_44 = isset($_POST['44']) ? $_POST['44'] : '';     $_43 = isset($_POST['43']) ? $_POST['43'] : '';
    $_42 = isset($_POST['42']) ? $_POST['42'] : '';     $_41 = isset($_POST['41']) ? $_POST['41'] : '';
    $_31 = isset($_POST['31']) ? $_POST['31'] : '';     $_32 = isset($_POST['32']) ? $_POST['32'] : '';
    $_33 = isset($_POST['33']) ? $_POST['33'] : '';     $_34 = isset($_POST['34']) ? $_POST['34'] : '';
    $_35 = isset($_POST['35']) ? $_POST['35'] : '';     $_36 = isset($_POST['36']) ? $_POST['36'] : '';
    $_37 = isset($_POST['37']) ? $_POST['37'] : '';     $_38 = isset($_POST['38']) ? $_POST['38'] : '';
    $diagnosis = isset($_POST['diagnosis']) ? $_POST['diagnosis'] : '';
    $treatment = isset($_POST['treatment']) ? $_POST['treatment'] : '';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
    $currentDate = date("Y-m-d");

    // Insert into the student_profile table
    $sql = "INSERT INTO student_profile (
        student_id, student_fname, student_lname, student_course,
        col18, col17, col16, col15, col14, col13, col12, col11, col21, col22, col23, col24, col25, col26, col27, 
        col28, col55, col54, col53, col52, col51, col61, col62, col63, col64, col65, col85, col84, col83, col82, col81, col71, col72, col73, 
        col74, col75, col48, col47, col46, col45, col44, col43, col42, col41, col31, col32, col33, col34, col35, col36, col37, col38, diagnosis,
        treatment, remarks, date
    ) VALUES (
        '$student_id', '$first_name', '$last_name', '$course',
        '$_18', '$_17', '$_16', '$_15', '$_14', '$_13', '$_12', '$_11', '$_21', '$_22', '$_23', '$_24', 
        '$_25', '$_26', '$_27', '$_28', '$_55', '$_54', '$_53', '$_52', '$_51', '$_61', '$_62', '$_63', '$_64', '$_65', '$_85', '$_84', 
        '$_83', '$_82', '$_81', '$_71', '$_72', '$_73', '$_74', '$_75', '$_48', '$_47', '$_46', '$_45', '$_44', '$_43', '$_42', '$_41',
        '$_31', '$_32', '$_33', '$_34', '$_35', '$_36', '$_37', '$_38', '$diagnosis', '$treatment', '$remarks', '$currentDate'
    )";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script> window.location.href = "adminstudentprofile.php?student_id=' . urlencode($student_id) . '"; </script>';
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM student_profile WHERE student_id = '$id' LIMIT 1";
$result_select = mysqli_query($conn, $sql);

if ($result_select === false) {
    die("Error executing query: " . mysqli_error($conn));
}
// Generate HTML form to edit the selected user data
if (mysqli_num_rows($result_select) == 1) {
    $row = mysqli_fetch_assoc($result_select);
    $student_id = $row["student_id"];
    $fname = $row["student_fname"];
    $lname = $row["student_lname"];
    $course = $row["student_course"];
    $_18 = $row["col18"];       $_17 = $row["col17"];       $_16 = $row["col16"];       $_15 = $row["col15"];       
    $_14 = $row["col14"];       $_13 = $row["col13"];       $_12 = $row["col12"];       $_11 = $row["col11"];       
    $_21 = $row["col21"];       $_22 = $row["col22"];       $_23 = $row["col23"];       $_24 = $row["col24"];
    $_25 = $row["col25"];       $_26 = $row["col26"];       $_27 = $row["col27"];       $_28 = $row["col28"];
    $_55 = $row["col55"];       $_54 = $row["col54"];       $_53 = $row["col53"];       $_52 = $row["col52"];
    $_51 = $row["col51"];       $_61 = $row["col61"];       $_62 = $row["col62"];       $_63 = $row["col63"];
    $_64 = $row["col64"];       $_65 = $row["col65"];       $_85 = $row["col85"];       $_84 = $row["col84"];
    $_83 = $row["col83"];       $_82 = $row["col82"];       $_81 = $row["col81"];       $_71 = $row["col71"];
    $_72 = $row["col72"];       $_73 = $row["col73"];       $_74 = $row["col74"];       $_75 = $row["col75"];
    $_48 = $row["col48"];       $_47 = $row["col47"];       $_46 = $row["col46"];       $_45 = $row["col45"];
    $_44 = $row["col44"];       $_43 = $row["col43"];       $_42 = $row["col42"];       $_41 = $row["col41"];
    $_31 = $row["col31"];       $_32 = $row["col32"];       $_33 = $row["col33"];       $_34 = $row["col34"];
    $_35 = $row["col35"];       $_36 = $row["col36"];       $_37 = $row["col37"];       $_38 = $row["col38"];
    $diagnosis = $row["diagnosis"];
    $treatment = $row["treatment"];
    $remarks = $row["remarks"];
    $date = $row["date"];

}

?>


<script>
    // Set the value property for the hidden input
    document.getElementById('student_id_input').value = '<?php echo isset($student_id) ? $student_id : ""; ?>';
    document.getElementById('fname_input').value = '<?php echo isset($fname) ? $fname : ""; ?>';
    document.getElementById('lname_input').value = '<?php echo isset($lname) ? $lname : ""; ?>';
    document.getElementById('course_input').value = '<?php echo isset($course) ? $course : ""; ?>'; 
    // Set the innerHTML property for the paragraph
    document.getElementById('student_id').innerHTML = '<?php echo isset($student_id) ? $student_id : ""; ?>';
    document.getElementById('fname').innerHTML = '<?php echo isset($fname) ? $fname : ""; ?>';
    document.getElementById('lname').innerHTML = '<?php echo isset($lname) ? $lname : ""; ?>';
    document.getElementById('birthday').innerHTML = '<?php echo isset($birthday) ? $birthday : ""; ?>';
    document.getElementById('brgy').innerHTML = '<?php echo isset($brgy) ? $brgy : ""; ?>';
    document.getElementById('municipality').innerHTML = '<?php echo isset($municipality) ? $municipality : ""; ?>';
    document.getElementById('province').innerHTML = '<?php echo isset($province) ? $province : ""; ?>';
    document.getElementById('email').innerHTML = '<?php echo isset($email) ? $email : ""; ?>';
    document.getElementById('number').innerHTML = '<?php echo isset($number) ? $number : ""; ?>';
    document.getElementById('course').innerHTML = '<?php echo isset($course) ? $course : ""; ?>'; 
    document.getElementById('allergy').innerHTML = '<?php echo isset($allergy) ? $allergy : ""; ?>';
    document.getElementById('gender').innerHTML = '<?php echo isset($allergy) ? $gender : ""; ?>';


    // Set the value property for the  input
    document.getElementById('18').value = '<?php echo isset($_18) ? ($_18) : ""; ?>';   document.getElementById('17').value = '<?php echo isset($_17) ? ($_17) : ""; ?>';
    document.getElementById('16').value = '<?php echo isset($_16) ? ($_16) : ""; ?>';   document.getElementById('15').value = '<?php echo isset($_15) ? ($_15) : ""; ?>';
    document.getElementById('14').value = '<?php echo isset($_14) ? ($_14) : ""; ?>';   document.getElementById('13').value = '<?php echo isset($_13) ? ($_13) : ""; ?>';
    document.getElementById('12').value = '<?php echo isset($_12) ? ($_12) : ""; ?>';   document.getElementById('11').value = '<?php echo isset($_11) ? ($_11) : ""; ?>';
    document.getElementById('21').value = '<?php echo isset($_21) ? ($_21) : ""; ?>';   document.getElementById('22').value = '<?php echo isset($_22) ? ($_22) : ""; ?>';
    document.getElementById('23').value = '<?php echo isset($_23) ? ($_23) : ""; ?>';   document.getElementById('24').value = '<?php echo isset($_24) ? ($_24) : ""; ?>';
    document.getElementById('25').value = '<?php echo isset($_25) ? ($_25) : ""; ?>';   document.getElementById('26').value = '<?php echo isset($_26) ? ($_26) : ""; ?>';
    document.getElementById('27').value = '<?php echo isset($_27) ? ($_27) : ""; ?>';   document.getElementById('28').value = '<?php echo isset($_28) ? ($_28) : ""; ?>';
    document.getElementById('55').value = '<?php echo isset($_55) ? ($_55) : ""; ?>';   document.getElementById('54').value = '<?php echo isset($_54) ? ($_54) : ""; ?>';
    document.getElementById('53').value = '<?php echo isset($_53) ? ($_53) : ""; ?>';   document.getElementById('52').value = '<?php echo isset($_52) ? ($_52) : ""; ?>';
    document.getElementById('51').value = '<?php echo isset($_51) ? ($_51) : ""; ?>';   document.getElementById('61').value = '<?php echo isset($_61) ? ($_61) : ""; ?>';
    document.getElementById('62').value = '<?php echo isset($_62) ? ($_62) : ""; ?>';   document.getElementById('63').value = '<?php echo isset($_63) ? ($_63) : ""; ?>';
    document.getElementById('64').value = '<?php echo isset($_64) ? ($_64) : ""; ?>';   document.getElementById('65').value = '<?php echo isset($_65) ? ($_65) : ""; ?>';
    document.getElementById('85').value = '<?php echo isset($_85) ? ($_85) : ""; ?>';   document.getElementById('84').value = '<?php echo isset($_84) ? ($_84) : ""; ?>';
    document.getElementById('83').value = '<?php echo isset($_83) ? ($_83) : ""; ?>';   document.getElementById('82').value = '<?php echo isset($_82) ? ($_82) : ""; ?>';
    document.getElementById('81').value = '<?php echo isset($_81) ? ($_81) : ""; ?>';   document.getElementById('71').value = '<?php echo isset($_71) ? ($_71) : ""; ?>';
    document.getElementById('72').value = '<?php echo isset($_72) ? ($_72) : ""; ?>';   document.getElementById('73').value = '<?php echo isset($_73) ? ($_73) : ""; ?>';
    document.getElementById('74').value = '<?php echo isset($_74) ? ($_74) : ""; ?>';   document.getElementById('75').value = '<?php echo isset($_75) ? ($_75) : ""; ?>';
    document.getElementById('48').value = '<?php echo isset($_48) ? ($_48) : ""; ?>';   document.getElementById('47').value = '<?php echo isset($_47) ? ($_47) : ""; ?>';
    document.getElementById('46').value = '<?php echo isset($_46) ? ($_46) : ""; ?>';   document.getElementById('45').value = '<?php echo isset($_45) ? ($_45) : ""; ?>';
    document.getElementById('44').value = '<?php echo isset($_44) ? ($_44) : ""; ?>';   document.getElementById('43').value = '<?php echo isset($_43) ? ($_43) : ""; ?>';
    document.getElementById('42').value = '<?php echo isset($_42) ? ($_42) : ""; ?>';   document.getElementById('41').value = '<?php echo isset($_41) ? ($_41) : ""; ?>';
    document.getElementById('31').value = '<?php echo isset($_31) ? ($_31) : ""; ?>';   document.getElementById('32').value = '<?php echo isset($_32) ? ($_32) : ""; ?>';
    document.getElementById('33').value = '<?php echo isset($_33) ? ($_33) : ""; ?>';   document.getElementById('34').value = '<?php echo isset($_34) ? ($_34) : ""; ?>';
    document.getElementById('35').value = '<?php echo isset($_35) ? ($_35) : ""; ?>';   document.getElementById('36').value = '<?php echo isset($_36) ? ($_36) : ""; ?>';
    document.getElementById('37').value = '<?php echo isset($_37) ? ($_37) : ""; ?>';   document.getElementById('38').value = '<?php echo isset($_38) ? ($_38) : ""; ?>';
</script>



