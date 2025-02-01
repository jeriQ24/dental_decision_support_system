<?php
session_start();
include 'setup.php';
include 'studentmonitor.html';

// Function to sanitize user inputs
function sanitizeInput($conn, $input) {
    return $conn->real_escape_string($input);
}

$student_id = $_SESSION['student_id'];
$student_fname = $_SESSION['student_fname'];
$student_lname = $_SESSION['student_lname'];
$student_course = $_SESSION['student_course'];
$student_department = $_SESSION['student_department'];
$student_age = $_SESSION['student_age'];
$student_gender = $_SESSION['student_gender'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input fields
    $fruit_no_sugar = $_POST["fruit_no_sugar"];
    $fruit_with_sugar = $_POST["fruit_with_sugar"];
    $fruit_juice = $_POST["fruit_juice"];

    $vegjuice_no_sugar = $_POST["vegjuice_no_sugar"];
    $vegjuice_with_sugar = $_POST["vegjuice_with_sugar"];
    $fresh_veg = $_POST["fresh_veg"];
    $fresh_vegsugar = $_POST["fresh_vegsugar"];

    $rice_grain = $_POST["rice_grain"];
    $cracker_grain = $_POST["cracker_grain"];
    $pastry_grain = $_POST["pastry_grain"];

    $dairy_no_sugar = $_POST["dairy_no_sugar"];
    $dairy_cheese = $_POST["dairy_cheese"];
    $dairy_with_sugar = $_POST["dairy_with_sugar"];

    $protein_no_sugar = $_POST["protein_no_sugar"];
    $protein_with_sugar = $_POST["protein_with_sugar"];

    $oils_no_sugar = $_POST["oils_no_sugar"];
    $calorie_with_sugar = $_POST["calorie_with_sugar"];

    $added_sugar = $_POST["added_sugar"];

    $sugary_drinks = $_POST["sugary_drinks"];    
    $glass_of_water = $_POST["glass_of_water"];

    $currentDate = date("Y-m-d");

    //Calculate Fruit Score
    $resultFruits = $fruit_no_sugar + $fruit_with_sugar + $fruit_juice;
    if ($resultFruits >= 6){
        $risk_fruits = "Encourage consumption of whole fruits to support oral cleanliness, saliva production, and gum health, while limiting intake to avoid dental pain, increased risk of cavities, and negative impact on oral hygiene; consuming in moderation can help mitigate these risks.";
    } else if ($resultFruits >= 4 && $resultFruits < 6){
        $risk_fruits = "Enjoy whole fruits for oral health benefits like cleanliness, saliva production, and gum health. Limit sugary treats to prevent dental pain, cavities, and hygiene issues. Remember, moderation is key!";
    } else {
        $risk_fruits = "Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!";
    }
    //Calculate Vegetable Score
    $resultVeg = $vegjuice_no_sugar + $vegjuice_with_sugar + $fresh_veg + $fresh_vegsugar;
    if ($resultVeg >= 8) {
        $risk_veg = "Encourage consumption of fresh juice for oral cleanliness and overall health, but limit intake due to high sugar content contributing to dental pain and cavities."; 
    } else if ($resultVeg >=4 && $resultVeg < 8) {
        $risk_veg = "Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!";
    } else {
        $risk_veg = "Sip on fresh juice for a healthier smile, but dont go overboard on the sugar to keep those pearly whites shining!";
    }
 
    //Calculate Grains Score
    $resultGrain = $rice_grain + $cracker_grain + $pastry_grain;
    if ($resultGrain >= 6) {
        $risk_grain = "Its crucial to moderate carbohydrate intake and maintain proper oral hygiene to minimize plaque formation, reducing the risk of dental issues like cavities and gum disease."; 
    } else if ($resultGrain >=4 && $resultGrain < 6) {
        $risk_grain = "Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.";
    } else {
        $risk_grain = "For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.";
    }

    //Calculate Dairy Products Score
    $resultDairy = $dairy_no_sugar + $dairy_cheese + $dairy_with_sugar;
    if ($resultDairy >= 6) {
        $risk_dairy = "Encourage consumption of dairy products, which support oral hygiene, saliva production, and overall oral health, while moderating intake to minimize the risk of dental issues such as cavities and gum disease."; 
    } else if ($resultDairy >=4 && $resultDairy < 6) {
        $risk_dairy = "Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.";
    } else {
        $risk_dairy = "Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.";
    }

    //Calculate Protein Score
    $resultProtein = $protein_no_sugar +  $protein_with_sugar;
    if ($resultProtein >= 4) {
        $risk_protein = "Prioritize consuming foods rich in proteins to support oral health, but we must also be vigilant about added sugars, especially in processed protein products, to mitigate the risk of dental issues associated with excessive sugar intake."; 
    } else if ($resultProtein >=2 && $resultProtein < 4) {
        $risk_protein = "Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.";
    } else {
        $risk_protein = "Continue the consumption of protein-rich foods to enhance our oral health. Additionally, lets be mindful of added sugars, particularly in processed protein products, to uphold optimal dental hygiene and overall well-being.";
    }

    //Calculate Oils and Fats Score

    $resultOils = $oils_no_sugar +  $calorie_with_sugar;
    if ($resultOils >= 4) {
        $risk_oils = "You should be mindful of limiting your consumption of foods high in sugars and calories to reduce the risk of dental issues, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness."; 
    } else if ($resultOils >=2 && $resultOils < 4) {
        $risk_oils = "Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.";
    } else {
        $risk_oils = "Aim for a balanced approach to your dietary choices, including moderate consumption of foods high in sugars and calories to support your dental health, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.";
    }

    //Calculate added sugar
    $resultAddedSugar = $added_sugar;
    if ($resultAddedSugar >= 2) {
        $risk_added_sugar = "You should be mindful of minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness."; 
    } else if ($resultAddedSugar >=0 && $resultAddedSugar < 2) {
        $risk_added_sugar = "Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.";
    } else {
        $risk_added_sugar = "Aim for a balanced approach to your dietary choices, including minimizing consumption, as high sugar intake significantly increases the risk of dental problems, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.";
    }

    //Calculate drinks score
    $resultDrinks = $sugary_drinks + $glass_of_water;
    if ($resultDrinks >= 4) {
        $risk_drinks = "Minimize consumption to reduce the risk of dental problems associated with high sugar intake, while also considering incorporating oils into your diet, monitoring intake for overall wellness."; 
    } else if ($resultDrinks >=2 && $resultDrinks < 4) {
        $risk_drinks = "Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.";
    } else {
        $risk_drinks = "Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.";
    }
 

    // Calculate the total score
    $result = $fruit_no_sugar + $fruit_with_sugar + $fruit_juice + $vegjuice_no_sugar + $vegjuice_with_sugar + $fresh_veg + $fresh_vegsugar + $rice_grain + $cracker_grain + $pastry_grain + $dairy_no_sugar + $dairy_cheese + $dairy_with_sugar + $protein_no_sugar + $protein_with_sugar + $oils_no_sugar + $calorie_with_sugar + $added_sugar + $sugary_drinks + $glass_of_water;

    // Determine the risk level based on the result
    if ($result >= 48) {
        $risk_level = "High Risk";
    } else if ($result >= 17 && $result < 48) {
        $risk_level = "Moderate Risk";
    } else {
        $risk_level = "Low Risk";
    }

    // Escape the risk level
    $risk_level = $conn->real_escape_string($risk_level);
    $student_id = $conn->real_escape_string($student_id);

    $sqlCheckTime = "SELECT date FROM food_monitoring WHERE student_id = '$student_id' AND date = '$currentDate'";
    $resultCheckTime = $conn->query($sqlCheckTime);

    if ($resultCheckTime->num_rows > 0) {
        // Alert the user and exit
        echo '<script>alert("You have already taken food monitoring for today.");</script>';
        echo '<script>window.location.replace("studentdash.php");</script>';
    } else {
        // Insert data into the food_monitoring table
        $sql = "INSERT INTO food_monitoring (student_id, first_name, last_name, age, course, department, gender, fruit_no_sugar, fruit_with_sugar, 
        fruit_juice, vegjuice_no_sugar, vegjuice_with_sugar, fresh_veg, fresh_vegsugar, rice_grain, cracker_grain, 
        pastry_grain, dairy_no_sugar, dairy_cheese, dairy_with_sugar, protein_no_sugar, protein_with_sugar, oils_no_sugar, 
        calorie_with_sugar, added_sugar, sugary_drinks, glass_of_water,resultFruits, resultVeg, resultGrain, resultDairy,
        resultProtein, resultOils, resultAddedSugar, resultDrinks, result, total_results, date) 
        VALUES ('$student_id', '$student_fname', '$student_lname', '$student_age', '$student_course', '$student_department', '$student_gender', '$fruit_no_sugar', '$fruit_with_sugar', 
        '$fruit_juice', '$vegjuice_no_sugar', '$vegjuice_with_sugar', '$fresh_veg', '$fresh_vegsugar', '$rice_grain', '$cracker_grain', 
        '$pastry_grain', '$dairy_no_sugar', '$dairy_cheese', '$dairy_with_sugar', '$protein_no_sugar', '$protein_with_sugar', '$oils_no_sugar', 
        '$calorie_with_sugar', '$added_sugar', '$sugary_drinks', '$glass_of_water', '$risk_fruits', '$risk_veg', '$risk_grain', '$risk_dairy', '$risk_protein', 
        '$risk_oils', '$risk_added_sugar', '$risk_drinks', '$risk_level', '$result', '$currentDate')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Assessment data inserted successfully.");</script>';
            echo '<script>location.replace("studentdash.php");</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
