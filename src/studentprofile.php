<?php
session_start();
include 'setup.php';
include 'studentprofile.html';

$student_id = $_SESSION['student_id'];
$id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medical_treatment = isset($_POST['medical_treatment']) ? $_POST['medical_treatment'] : '';
    $major_operation = isset($_POST['major_operation']) ? $_POST['major_operation'] : '';
    $heart_ailment = isset($_POST['heart_ailment']) ? $_POST['heart_ailment'] : '';
    $highblood = isset($_POST['highblood']) ? $_POST['highblood'] : '';
    $diabetes = isset($_POST['diabetes']) ? $_POST['diabetes'] : '';
    $rheumatic_fever = isset($_POST['rheumatic_fever']) ? $_POST['rheumatic_fever'] : '';
    $lung_disease = isset($_POST['lung_disease']) ? $_POST['lung_disease'] : '';
    $liver_disease = isset($_POST['liver_disease']) ? $_POST['liver_disease'] : '';
    $weight_loss = isset($_POST['weight_loss']) ? $_POST['weight_loss'] : '';
    $medicine = isset($_POST['medicine']) ? $_POST['medicine'] : '';
    $medication = isset($_POST['medication']) ? $_POST['medication'] : '';
    $special_diet = isset($_POST['special_diet']) ? $_POST['special_diet'] : '';
    $climb_stairs = isset($_POST['climb_stairs']) ? $_POST['climb_stairs'] : '';
    $healing = isset($_POST['healing']) ? $_POST['healing'] : '';
    $general_health = isset($_POST['general_health']) ? $_POST['general_health'] : '';
    $pregnant = isset($_POST['pregnant']) ? $_POST['pregnant'] : '';
    $tooth_extraction = isset($_POST['tooth_extraction']) ? $_POST['tooth_extraction'] : '';

    $sql = "INSERT INTO medical_history(student_id, medical_treatment, major_operation, heart_ailment, highblood, diabetes,
    rheumatic_fever, lung_disease, liver_disease, weight_loss, medicine,
    medication, special_diet, climb_stairs, healing, general_health,
    pregnant, tooth_extraction) VALUES ('$student_id', '$medical_treatment', '$major_operation', '$heart_ailment', '$highblood', '$diabetes',
    '$rheumatic_fever', '$lung_disease', '$liver_disease', '$weight_loss', '$medicine',
    '$medication', '$special_diet', '$climb_stairs', '$healing', '$general_health',
    '$pregnant', '$tooth_extraction')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record added successfully"); location.replace("studentprofile.php");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Retrieve data from the "users" table
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
}

$sql = "SELECT * FROM medical_history WHERE student_id = '$student_id' ORDER BY id DESC LIMIT 1";
$result_select = mysqli_query($conn, $sql);

if ($result_select === false) {
    die("Error executing query: " . mysqli_error($conn));
}
// Generate HTML form to edit the selected user data
if (mysqli_num_rows($result_select) == 1) {
    $row = mysqli_fetch_assoc($result_select);
    $medical_treatment = $row["medical_treatment"];
    $major_operation = $row["major_operation"];
    $heart_ailment = $row["heart_ailment"];
    $highblood = $row["highblood"];
    $diabetes = $row["diabetes"];
    $rheumatic_fever = $row["rheumatic_fever"];
    $lung_disease = $row["lung_disease"];
    $liver_disease = $row["liver_disease"];
    $weight_loss = $row["weight_loss"];
    $medicine = $row["medicine"];
    $medication = $row["medication"];
    $special_diet = $row["special_diet"];
    $climb_stairs = $row["climb_stairs"];
    $healing = $row["healing"];
    $general_health = $row["general_health"];
    $pregnant = $row["pregnant"];
    $tooth_extraction = $row["tooth_extraction"];
}

// Retrieve data from the "student_profile" table
$sql_profile = "SELECT * FROM student_profile WHERE student_id = '$student_id' LIMIT 1";
$result_profile = mysqli_query($conn, $sql_profile);
if ($result_profile === false) {
    die("Error executing query: " . mysqli_error($conn));
}
if (mysqli_num_rows($result_profile) == 1) {
    $row_profile = mysqli_fetch_assoc($result_profile);

    $_18 = $row_profile["col18"];   $_17 = $row_profile["col17"];   $_16 = $row_profile["col16"];
    $_15 = $row_profile["col15"];   $_14 = $row_profile["col14"];   $_13 = $row_profile["col13"];
    $_12 = $row_profile["col12"];   $_11 = $row_profile["col11"];   $_21 = $row_profile["col21"];
    $_22 = $row_profile["col22"];   $_23 = $row_profile["col23"];   $_24 = $row_profile["col24"];
    $_25 = $row_profile["col25"];   $_26 = $row_profile["col26"];   $_27 = $row_profile["col27"];
    $_28 = $row_profile["col28"];   $_55 = $row_profile["col55"];   $_54 = $row_profile["col54"];
    $_53 = $row_profile["col53"];   $_52 = $row_profile["col52"];   $_51 = $row_profile["col51"];
    $_61 = $row_profile["col61"];   $_62 = $row_profile["col62"];   $_63 = $row_profile["col63"];
    $_64 = $row_profile["col64"];   $_65 = $row_profile["col65"];   $_85 = $row_profile["col85"];
    $_84 = $row_profile["col84"];   $_83 = $row_profile["col83"];   $_82 = $row_profile["col82"];
    $_81 = $row_profile["col81"];   $_71 = $row_profile["col71"];   $_72 = $row_profile["col72"];
    $_73 = $row_profile["col73"];   $_74 = $row_profile["col74"];   $_75 = $row_profile["col75"];
    $_48 = $row_profile["col48"];   $_47 = $row_profile["col47"];   $_46 = $row_profile["col46"];
    $_45 = $row_profile["col45"];   $_44 = $row_profile["col44"];   $_43 = $row_profile["col43"];
    $_42 = $row_profile["col42"];   $_41 = $row_profile["col41"];   $_31 = $row_profile["col31"];
    $_32 = $row_profile["col32"];   $_33 = $row_profile["col33"];   $_34 = $row_profile["col34"];
    $_35 = $row_profile["col35"];   $_36 = $row_profile["col36"];   $_37 = $row_profile["col37"];
    $_38 = $row_profile["col38"];
}
?>
<script>
    // Set the innerHTML in the paragraphs
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
    document.getElementById('gender').innerHTML = '<?php echo isset($gender) ? $gender : ""; ?>';

    document.getElementById('medical_treatment').value = '<?php echo isset($medical_treatment) ? ($medical_treatment) : ""; ?>';
    document.getElementById('major_operation').value = '<?php echo isset($major_operation) ? ($major_operation) : ""; ?>';
    document.getElementById('heart_ailment').value = '<?php echo isset($heart_ailment) ? ($heart_ailment) : ""; ?>';
    document.getElementById('highblood').value = '<?php echo isset($highblood) ? ($highblood) : ""; ?>';
    document.getElementById('diabetes').value = '<?php echo isset($diabetes) ? ($diabetes) : ""; ?>';
    document.getElementById('rheumatic_fever').value = '<?php echo isset($rheumatic_fever) ? ($rheumatic_fever) : ""; ?>';
    document.getElementById('lung_disease').value = '<?php echo isset($lung_disease) ? ($lung_disease) : ""; ?>';
    document.getElementById('liver_disease').value = '<?php echo isset($liver_disease) ? ($liver_disease) : ""; ?>';
    document.getElementById('weight_loss').value = '<?php echo isset($weight_loss) ? ($weight_loss) : ""; ?>';
    document.getElementById('medicine').value = '<?php echo isset($medicine) ? ($medicine) : ""; ?>';
    document.getElementById('medication').value = '<?php echo isset($medication) ? ($medication) : ""; ?>';
    document.getElementById('special_diet').value = '<?php echo isset($special_diet) ? ($special_diet) : ""; ?>';
    document.getElementById('climb_stairs').value = '<?php echo isset($climb_stairs) ? ($climb_stairs) : ""; ?>';
    document.getElementById('healing').value = '<?php echo isset($healing) ? ($healing) : ""; ?>';
    document.getElementById('general_health').value = '<?php echo isset($general_health) ? ($general_health) : ""; ?>';
    document.getElementById('pregnant').value = '<?php echo isset($pregnant) ? ($pregnant) : ""; ?>';
    document.getElementById('tooth_extraction').value = '<?php echo isset($tooth_extraction) ? ($tooth_extraction) : ""; ?>';

    // Set the values in the input fields
    document.getElementById('18').value = '<?php echo isset($_18) ? $_18 : ""; ?>';
    document.getElementById('17').value = '<?php echo isset($_17) ? $_17 : ""; ?>';
    document.getElementById('16').value = '<?php echo isset($_16) ? $_16 : ""; ?>';
    document.getElementById('15').value = '<?php echo isset($_15) ? $_15 : ""; ?>';
    document.getElementById('14').value = '<?php echo isset($_14) ? $_14 : ""; ?>';
    document.getElementById('13').value = '<?php echo isset($_13) ? $_13 : ""; ?>';
    document.getElementById('12').value = '<?php echo isset($_12) ? $_12 : ""; ?>';
    document.getElementById('11').value = '<?php echo isset($_11) ? $_11 : ""; ?>';
    document.getElementById('21').value = '<?php echo isset($_21) ? $_21 : ""; ?>';
    document.getElementById('22').value = '<?php echo isset($_22) ? $_22 : ""; ?>';
    document.getElementById('23').value = '<?php echo isset($_23) ? $_23 : ""; ?>';
    document.getElementById('24').value = '<?php echo isset($_24) ? $_24 : ""; ?>';
    document.getElementById('25').value = '<?php echo isset($_25) ? $_25 : ""; ?>';
    document.getElementById('26').value = '<?php echo isset($_26) ? $_26 : ""; ?>';
    document.getElementById('27').value = '<?php echo isset($_27) ? $_27 : ""; ?>';
    document.getElementById('28').value = '<?php echo isset($_28) ? $_28 : ""; ?>';
    document.getElementById('55').value = '<?php echo isset($_55) ? $_55 : ""; ?>';
    document.getElementById('54').value = '<?php echo isset($_54) ? $_54 : ""; ?>';
    document.getElementById('53').value = '<?php echo isset($_53) ? $_53 : ""; ?>';
    document.getElementById('52').value = '<?php echo isset($_52) ? $_52 : ""; ?>';
    document.getElementById('51').value = '<?php echo isset($_51) ? $_51 : ""; ?>';
    document.getElementById('61').value = '<?php echo isset($_61) ? $_61 : ""; ?>';
    document.getElementById('62').value = '<?php echo isset($_62) ? $_62 : ""; ?>';
    document.getElementById('63').value = '<?php echo isset($_63) ? $_63 : ""; ?>';
    document.getElementById('64').value = '<?php echo isset($_64) ? $_64 : ""; ?>';
    document.getElementById('65').value = '<?php echo isset($_65) ? $_65 : ""; ?>';
    document.getElementById('85').value = '<?php echo isset($_85) ? $_85 : ""; ?>';
    document.getElementById('84').value = '<?php echo isset($_84) ? $_84 : ""; ?>';
    document.getElementById('83').value = '<?php echo isset($_83) ? $_83 : ""; ?>';
    document.getElementById('82').value = '<?php echo isset($_82) ? $_82 : ""; ?>';
    document.getElementById('81').value = '<?php echo isset($_81) ? $_81 : ""; ?>';
    document.getElementById('71').value = '<?php echo isset($_71) ? $_71 : ""; ?>';
    document.getElementById('72').value = '<?php echo isset($_72) ? $_72 : ""; ?>';
    document.getElementById('73').value = '<?php echo isset($_73) ? $_73 : ""; ?>';
    document.getElementById('74').value = '<?php echo isset($_74) ? $_74 : ""; ?>';
    document.getElementById('75').value = '<?php echo isset($_75) ? $_75 : ""; ?>';
    document.getElementById('48').value = '<?php echo isset($_48) ? $_48 : ""; ?>';
    document.getElementById('47').value = '<?php echo isset($_47) ? $_47 : ""; ?>';
    document.getElementById('46').value = '<?php echo isset($_46) ? $_46 : ""; ?>';
    document.getElementById('45').value = '<?php echo isset($_45) ? $_45 : ""; ?>';
    document.getElementById('44').value = '<?php echo isset($_44) ? $_44 : ""; ?>';
    document.getElementById('43').value = '<?php echo isset($_43) ? $_43 : ""; ?>';
    document.getElementById('42').value = '<?php echo isset($_42) ? $_42 : ""; ?>';
    document.getElementById('41').value = '<?php echo isset($_41) ? $_41 : ""; ?>';
    document.getElementById('31').value = '<?php echo isset($_31) ? $_31 : ""; ?>';
    document.getElementById('32').value = '<?php echo isset($_32) ? $_32 : ""; ?>';
    document.getElementById('33').value = '<?php echo isset($_33) ? $_33 : ""; ?>';
    document.getElementById('34').value = '<?php echo isset($_34) ? $_34 : ""; ?>';
    document.getElementById('35').value = '<?php echo isset($_35) ? $_35 : ""; ?>';
    document.getElementById('36').value = '<?php echo isset($_36) ? $_36 : ""; ?>';
    document.getElementById('37').value = '<?php echo isset($_37) ? $_37 : ""; ?>';
    document.getElementById('38').value = '<?php echo isset($_38) ? $_38 : ""; ?>';
</script>
