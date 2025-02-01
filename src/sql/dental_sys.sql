-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_sys_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `birthday`, `brgy`, `municipality`, `province`, `email`, `number`, `password`) VALUES
(1, 'Jericho', 'Quilas', '2001-01-01', 'Inangayan', 'Sta Barbara', 'Iloilo', 'jericho@gmail.com', 2147483647, 'zxcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `student_id`, `status`, `first_name`, `last_name`, `course`, `date`, `time`, `description`) VALUES
(23, '2020M0702', 'Done', 'Charles Agustin', 'Monreal', 'BSIS', '2024-02-17', '08:00:00.000000', 'Restoration'),
(24, '2022M0114', 'Done', 'Carter', 'Steel', 'BSN', '2024-03-28', '08:00:00.000000', 'Restoration'),
(25, '2022M0114', 'Rescheduled', 'Carter', 'Steel', 'BSN', '2024-03-19', '10:00:00.000000', 'Oral Prophylaxis'),
(26, '2022M0114', 'Declined', 'Carter', 'Steel', 'BSN', '2024-06-20', '13:00:00.000000', 'Restoration'),
(27, '2020M0702', 'Approved', 'Charles Agustin', 'Monreal', 'BSIS', '2024-03-20', '08:00:00.000000', 'Consultation'),
(28, '2020M0702', 'Declined', 'Charles Agustin', 'Monreal', 'BSIS', '2023-03-20', '09:00:00.000000', 'Consultation'),
(29, '2020M0992', 'Done', 'Frankie', 'Sustiguer', 'BSIS', '2024-03-20', '13:00:00.000000', 'Restoration'),
(30, '2020M902', 'Approved', 'Julian Dave', 'Sioting', 'BSIS', '2024-03-21', '09:00:00.000000', 'Tooth Extractions'),
(31, '2020M0702', 'Pending', 'Charles Agustin', 'Monreal', 'BSIS', '2024-04-16', '08:00:00.000000', 'Consultation'),
(32, '2020M0305', 'Approved', 'Jemelyn', 'Tesara', 'BSIS', '2024-05-20', '08:00:00.000000', 'Consultation');

-- --------------------------------------------------------

--
-- Table structure for table `dental_assessment`
--

CREATE TABLE `dental_assessment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `lips` int(100) NOT NULL,
  `dental_pain` int(100) NOT NULL,
  `natural_teeth` int(100) NOT NULL,
  `dentures` int(100) NOT NULL,
  `oral_cleanliness` int(100) NOT NULL,
  `saliva` int(100) NOT NULL,
  `tongue` int(100) NOT NULL,
  `gum_and_tissues` int(100) NOT NULL,
  `oral_hygiene` int(100) NOT NULL,
  `results` varchar(500) NOT NULL,
  `total_results` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dental_assessment`
--

INSERT INTO `dental_assessment` (`id`, `userid`, `student_id`, `first_name`, `last_name`, `course`, `department`, `age`, `gender`, `lips`, `dental_pain`, `natural_teeth`, `dentures`, `oral_cleanliness`, `saliva`, `tongue`, `gum_and_tissues`, `oral_hygiene`, `results`, `total_results`, `date`) VALUES
(45, 0, '2020M0105', 'Madison', 'Rivers', 'BECE', 'CON', '22', 'Female', 1, 2, 2, 1, 0, 0, 1, 2, 1, 'Moderate Oral Health Issues!', 10, '2024-02-22'),
(46, 0, '2022M0114', 'Carter', 'Steel', 'BSN', 'CON', '22', 'Female', 1, 0, 1, 1, 1, 0, 1, 1, 0, 'Addressing Oral Health Issues!', 6, '2024-03-15'),
(50, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Good Oral Health!', 1, '2024-03-10'),
(54, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Immediate Action Required!', 8, '2024-03-11'),
(55, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 2, 1, 1, 0, 0, 0, 0, 1, 'Addressing Oral Health Issues!', 5, '2024-03-13'),
(56, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 1, 0, 0, 0, 1, 0, 1, 2, 0, 'Addressing Oral Health Issues!', 5, '2024-03-14'),
(57, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 2, 2, 2, 2, 2, 2, 2, 2, 2, 'Immediate Action Required!', 18, '2024-03-16'),
(58, 0, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 1, 0, 1, 2, 2, 2, 1, 2, 'Immediate Action Required!', 11, '2024-03-17'),
(59, 0, '2024C0115', 'Emily ', 'Johnson', 'STEM', 'ILS', '20', 'Female', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Excellent Oral Hygiene!', 0, '2024-03-17'),
(60, 0, '2024F0327', 'Michael ', 'Carter', 'BDS', 'COD', '23', 'Male', 0, 1, 1, 0, 0, 1, 1, 1, 0, 'Addressing Oral Health Issues!', 5, '2024-03-17'),
(61, 0, '2024B0422', 'Jason ', 'Anderson', 'BECE', 'COE', '22', 'Male', 0, 1, 1, 0, 0, 0, 0, 0, 0, 'Watch for Changes!', 2, '2024-03-17'),
(62, 0, '2020M0305', 'Jemelyn', 'Tesara', 'BSIS', 'CICT', '18', 'Female', 0, 1, 1, 1, 1, 1, 1, 1, 0, 'Immediate Action Required!', 7, '2024-03-20'),
(64, 0, '2020M0992', 'Frankie', 'Sustiguer', 'BSIS', 'CICT', '22', 'Male', 0, 1, 0, 1, 1, 0, 1, 1, 0, 'Addressing Oral Health Issues!', 5, '2024-03-20'),
(65, 0, '2020M902', 'Julian Dave', 'Sioting', 'BSIS', 'CICT', '23', 'Male', 0, 1, 1, 1, 1, 1, 1, 1, 0, 'Immediate Action Required!', 7, '2024-03-20'),
(66, 0, '<br />\r\n<b>Warning</b>:  Undefined variable $student_id in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\ad', '<br />\r\n<b>Warning</b>:  Undefined variable $fname in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\adminst', '<br />\r\n<b>Warning</b>:  Undefined variable $lname in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\adminst', '<br />\r\n<b>Warning</b>:  Undefined variable $course in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\admins', '<br />\r\n<b>Warning</b>:  Undefined variable $depar', '<br />\r\n<b>Warning</b>:  Undefined variable $age in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\adminstud', '<br />\r\n<b>Warning</b>:  Undefined variable $gender in <b>C:\\xampp\\htdocs\\Dental_System_feb26\\admins', 0, 0, 1, 1, 0, 0, 0, 0, 0, 'Watch for Changes!', 2, '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `food_monitoring`
--

CREATE TABLE `food_monitoring` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `fruit_no_sugar` int(100) NOT NULL,
  `fruit_with_sugar` int(100) NOT NULL,
  `fruit_juice` int(100) NOT NULL,
  `vegjuice_no_sugar` int(100) NOT NULL,
  `vegjuice_with_sugar` int(100) NOT NULL,
  `fresh_veg` int(100) NOT NULL,
  `fresh_vegsugar` int(100) NOT NULL,
  `rice_grain` int(100) NOT NULL,
  `cracker_grain` int(100) NOT NULL,
  `pastry_grain` int(100) NOT NULL,
  `dairy_no_sugar` int(100) NOT NULL,
  `dairy_cheese` int(100) NOT NULL,
  `dairy_with_sugar` int(100) NOT NULL,
  `protein_no_sugar` int(100) NOT NULL,
  `protein_with_sugar` int(100) NOT NULL,
  `oils_no_sugar` int(100) NOT NULL,
  `calorie_with_sugar` int(100) NOT NULL,
  `added_sugar` int(100) NOT NULL,
  `sugary_drinks` int(100) NOT NULL,
  `glass_of_water` int(100) NOT NULL,
  `resultFruits` varchar(1000) NOT NULL,
  `resultVeg` varchar(1000) NOT NULL,
  `resultGrain` varchar(1000) NOT NULL,
  `resultDairy` varchar(1000) NOT NULL,
  `resultProtein` varchar(1000) NOT NULL,
  `resultOils` varchar(1000) NOT NULL,
  `resultAddedSugar` varchar(1000) NOT NULL,
  `resultDrinks` varchar(1000) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `total_results` int(100) NOT NULL,
  `recommendations` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_monitoring`
--

INSERT INTO `food_monitoring` (`id`, `student_id`, `first_name`, `last_name`, `course`, `department`, `age`, `gender`, `fruit_no_sugar`, `fruit_with_sugar`, `fruit_juice`, `vegjuice_no_sugar`, `vegjuice_with_sugar`, `fresh_veg`, `fresh_vegsugar`, `rice_grain`, `cracker_grain`, `pastry_grain`, `dairy_no_sugar`, `dairy_cheese`, `dairy_with_sugar`, `protein_no_sugar`, `protein_with_sugar`, `oils_no_sugar`, `calorie_with_sugar`, `added_sugar`, `sugary_drinks`, `glass_of_water`, `resultFruits`, `resultVeg`, `resultGrain`, `resultDairy`, `resultProtein`, `resultOils`, `resultAddedSugar`, `resultDrinks`, `result`, `total_results`, `recommendations`, `date`) VALUES
(49, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 2, 2, 2, 0, 0, 2, 2, 2, 0, 0, 2, 1, 1, 1, 1, 2, 2, 0, 0, 2, 'Encourage consumption of whole fruits to support oral cleanliness, saliva production, and gum health, while limiting intake to avoid dental pain, increased risk of cavities, and negative impact on oral hygiene; consuming in moderation can help mitigate these risks.', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'You should be mindful of limiting your consumption of foods high in sugars and calories to reduce the risk of dental issues, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 24, '', '2024-03-10'),
(50, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 20, '', '2024-03-11'),
(51, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 2, 1, 2, 0, 0, 2, 2, 0, 0, 0, 2, 2, 0, 2, 0, 0, 0, 0, 0, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Aim for a balanced approach to your dietary choices, including moderate consumption of foods high in sugars and calories to support your dental health, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Low Risk', 15, '', '2024-03-12'),
(52, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 2, 1, 2, 0, 0, 2, 2, 0, 0, 0, 2, 2, 0, 2, 0, 0, 0, 0, 0, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Aim for a balanced approach to your dietary choices, including moderate consumption of foods high in sugars and calories to support your dental health, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Low Risk', 15, '', '2024-03-13'),
(53, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 0, 2, 0, 2, 0, 0, 2, 2, 0, 0, 0, 2, 0, 0, 2, 0, 0, 0, 0, 0, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Aim for a balanced approach to your dietary choices, including moderate consumption of foods high in sugars and calories to support your dental health, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Low Risk', 12, '', '2024-03-14'),
(54, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 2, 0, 2, 0, 2, 2, 0, 0, 2, 2, 2, 0, 2, 2, 0, 2, 2, 2, 2, 2, 'Enjoy whole fruits for oral health benefits like cleanliness, saliva production, and gum health. Limit sugary treats to prevent dental pain, cavities, and hygiene issues. Remember, moderation is key!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'You should be mindful of limiting your consumption of foods high in sugars and calories to reduce the risk of dental issues, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'You should be mindful of minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'Minimize consumption to reduce the risk of dental problems associated with high sugar intake, while also considering incorporating oils into your diet, monitoring intake for overall wellness.', 'Moderate Risk', 28, '', '2024-03-15'),
(55, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'CICT', '22', 'Male', 2, 0, 0, 2, 2, 2, 0, 0, 2, 2, 2, 0, 2, 2, 0, 2, 2, 2, 2, 2, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'You should be mindful of limiting your consumption of foods high in sugars and calories to reduce the risk of dental issues, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'You should be mindful of minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'Minimize consumption to reduce the risk of dental problems associated with high sugar intake, while also considering incorporating oils into your diet, monitoring intake for overall wellness.', 'Moderate Risk', 28, '', '2024-03-16'),
(56, '2020M0105', 'Madison', 'Rivers', 'BECE', 'COE', '22', 'Female', 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 2, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 24, '', '2024-03-17'),
(57, '2024C0115', 'Emily ', 'Johnson', 'STEM', 'ILS', '20', 'Female', 0, 2, 1, 1, 1, 1, 1, 1, 2, 1, 0, 1, 1, 1, 2, 0, 1, 0, 0, 2, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Aim for a balanced approach to your dietary choices, including moderate consumption of foods high in sugars and calories to support your dental health, and consider incorporating oils into your diet as they dont directly affect dental health, promoting overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 19, '', '2024-03-17'),
(58, '2024F0327', 'Michael ', 'Carter', 'BDS', 'COD', '23', 'Male', 0, 1, 2, 0, 0, 2, 2, 2, 0, 0, 2, 2, 0, 2, 2, 2, 0, 0, 1, 2, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Promote consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining a balanced approach to intake to effectively manage dental health.', 'Prioritize consuming foods rich in proteins to support oral health, but we must also be vigilant about added sugars, especially in processed protein products, to mitigate the risk of dental issues associated with excessive sugar intake.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 22, '', '2024-03-17'),
(59, '2022M0114', 'Carter', 'Steel', 'BSN', 'CON', '22', 'Male', 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 2, 1, 1, 0, 0, 1, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Low Risk', 15, '', '2024-03-17'),
(60, '2024B0422', 'Jason ', 'Anderson', 'BECE', 'COE', '22', 'Male', 0, 0, 0, 2, 2, 0, 0, 0, 2, 2, 0, 0, 2, 0, 0, 0, 2, 2, 2, 0, 'Keep it fruity! Theyre smile boosters, keeping things fresh, saliva flowing, and gums happy. Ease off the sweets to sidestep toothaches, cavities, and dental troubles. Just a gentle nudge: keep it balanced and enjoy in small doses!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'Strive to balance carbohydrate consumption with regular oral hygiene practices to effectively manage the risk of plaque formation and uphold oral health.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Continue the consumption of protein-rich foods to enhance our oral health. Additionally, lets be mindful of added sugars, particularly in processed protein products, to uphold optimal dental hygiene and overall well-being.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'You should be mindful of minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Low Risk', 16, '', '2024-03-17'),
(61, '2020M0992', 'Frankie', 'Sustiguer', 'BSIS', 'CICT', '22', 'Male', 2, 1, 1, 1, 1, 1, 2, 2, 0, 1, 1, 0, 2, 0, 0, 1, 1, 2, 2, 0, 'Enjoy whole fruits for oral health benefits like cleanliness, saliva production, and gum health. Limit sugary treats to prevent dental pain, cavities, and hygiene issues. Remember, moderation is key!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Continue the consumption of protein-rich foods to enhance our oral health. Additionally, lets be mindful of added sugars, particularly in processed protein products, to uphold optimal dental hygiene and overall well-being.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'You should be mindful of minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while considering incorporating oils into your diet, as they dont directly impact dental health, but monitoring your intake for overall wellness.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 21, '', '2024-03-20'),
(62, '2020M902', 'Julian Dave', 'Sioting', 'BSIS', 'CICT', '23', 'Male', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Enjoy whole fruits for oral health benefits like cleanliness, saliva production, and gum health. Limit sugary treats to prevent dental pain, cavities, and hygiene issues. Remember, moderation is key!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Emphasize the importance of incorporating protein-rich foods into our diet for oral health benefits, while also advising caution regarding added sugars in processed protein products to maintain our dental wellness.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Prioritize minimizing consumption to mitigate the risk of dental problems from high sugar intake, and encourage regular consumption to support saliva production and overall oral health.', 'Moderate Risk', 21, '', '2024-03-20'),
(63, '2020M0305', 'Jemelyn', 'Tesara', 'BSIS', 'CICT', '18', 'Female', 2, 2, 2, 0, 0, 1, 2, 0, 0, 0, 1, 2, 0, 2, 2, 2, 0, 0, 0, 0, 'Encourage consumption of whole fruits to support oral cleanliness, saliva production, and gum health, while limiting intake to avoid dental pain, increased risk of cavities, and negative impact on oral hygiene; consuming in moderation can help mitigate these risks.', 'Sip on fresh juice for a healthier smile, but dont go overboard on the sugar to keep those pearly whites shining!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Prioritize consuming foods rich in proteins to support oral health, but we must also be vigilant about added sugars, especially in processed protein products, to mitigate the risk of dental issues associated with excessive sugar intake.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Moderate Risk', 18, '', '2024-05-01'),
(64, '2020M0992', 'Frankie', 'Sustiguer', 'BSIS', 'CICT', '22', 'Male', 2, 2, 0, 0, 0, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 1, 0, 'Enjoy whole fruits for oral health benefits like cleanliness, saliva production, and gum health. Limit sugary treats to prevent dental pain, cavities, and hygiene issues. Remember, moderation is key!', 'Enjoy fresh juice for oral health, but watch out for too much sugar to avoid dental issues!', 'For optimal oral health, continue moderate carbohydrate intake while adhering to diligent oral hygiene routines to minimize plaque formation and maintain overall dental wellness.', 'Continue to encourage consumption of dairy products to support oral hygiene, saliva production, and overall oral health, while maintaining moderate intake and adhering to diligent oral hygiene practices to sustain optimal dental well-being.', 'Continue the consumption of protein-rich foods to enhance our oral health. Additionally, lets be mindful of added sugars, particularly in processed protein products, to uphold optimal dental hygiene and overall well-being.', 'Its important for you to prioritize moderating your consumption of foods high in sugars and calories to safeguard your dental health, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Its important for you to prioritize minimizing your consumption, as high sugar intake significantly increases the risk of dental problems, while also considering including oils in your diet, recognizing their indirect impact on dental health but relevance to overall well-being.', 'Maintain a balanced approach by minimizing consumption to reduce the risk of dental problems linked to high sugar intake, while also encouraging regular consumption for hydration and incorporating oils into your diet for overall wellness.', 'Low Risk', 13, '', '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `medical_treatment` varchar(50) NOT NULL,
  `major_operation` varchar(50) NOT NULL,
  `heart_ailment` varchar(50) NOT NULL,
  `highblood` varchar(50) NOT NULL,
  `diabetes` varchar(50) NOT NULL,
  `rheumatic_fever` varchar(50) NOT NULL,
  `lung_disease` varchar(50) NOT NULL,
  `liver_disease` varchar(50) NOT NULL,
  `weight_loss` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `medication` varchar(50) NOT NULL,
  `special_diet` varchar(50) NOT NULL,
  `climb_stairs` varchar(50) NOT NULL,
  `healing` varchar(50) NOT NULL,
  `general_health` varchar(50) NOT NULL,
  `pregnant` varchar(50) NOT NULL,
  `tooth_extraction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `student_id`, `medical_treatment`, `major_operation`, `heart_ailment`, `highblood`, `diabetes`, `rheumatic_fever`, `lung_disease`, `liver_disease`, `weight_loss`, `medicine`, `medication`, `special_diet`, `climb_stairs`, `healing`, `general_health`, `pregnant`, `tooth_extraction`) VALUES
(18, '2020M0702', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(19, '2020M0702', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(20, '2020M0992', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `student_fname` varchar(50) DEFAULT NULL,
  `student_lname` varchar(50) DEFAULT NULL,
  `student_course` varchar(50) DEFAULT NULL,
  `col18` text DEFAULT NULL,
  `col17` text DEFAULT NULL,
  `col16` text DEFAULT NULL,
  `col15` text DEFAULT NULL,
  `col14` text DEFAULT NULL,
  `col13` text DEFAULT NULL,
  `col12` text DEFAULT NULL,
  `col11` text DEFAULT NULL,
  `col21` text DEFAULT NULL,
  `col22` text DEFAULT NULL,
  `col23` text DEFAULT NULL,
  `col24` text DEFAULT NULL,
  `col25` text DEFAULT NULL,
  `col26` text DEFAULT NULL,
  `col27` text DEFAULT NULL,
  `col28` text DEFAULT NULL,
  `col55` text DEFAULT NULL,
  `col54` text DEFAULT NULL,
  `col53` text DEFAULT NULL,
  `col52` text DEFAULT NULL,
  `col51` text DEFAULT NULL,
  `col61` text DEFAULT NULL,
  `col62` text DEFAULT NULL,
  `col63` text DEFAULT NULL,
  `col64` text DEFAULT NULL,
  `col65` text DEFAULT NULL,
  `col85` text DEFAULT NULL,
  `col84` text DEFAULT NULL,
  `col83` text DEFAULT NULL,
  `col82` text DEFAULT NULL,
  `col81` text DEFAULT NULL,
  `col71` text DEFAULT NULL,
  `col72` text DEFAULT NULL,
  `col73` text DEFAULT NULL,
  `col74` text DEFAULT NULL,
  `col75` text DEFAULT NULL,
  `col48` text DEFAULT NULL,
  `col47` text DEFAULT NULL,
  `col46` text DEFAULT NULL,
  `col45` text DEFAULT NULL,
  `col44` text DEFAULT NULL,
  `col43` text DEFAULT NULL,
  `col42` text DEFAULT NULL,
  `col41` text DEFAULT NULL,
  `col31` text DEFAULT NULL,
  `col32` text DEFAULT NULL,
  `col33` text DEFAULT NULL,
  `col34` text DEFAULT NULL,
  `col35` text DEFAULT NULL,
  `col36` text DEFAULT NULL,
  `col37` text DEFAULT NULL,
  `col38` text DEFAULT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`id`, `student_id`, `student_fname`, `student_lname`, `student_course`, `col18`, `col17`, `col16`, `col15`, `col14`, `col13`, `col12`, `col11`, `col21`, `col22`, `col23`, `col24`, `col25`, `col26`, `col27`, `col28`, `col55`, `col54`, `col53`, `col52`, `col51`, `col61`, `col62`, `col63`, `col64`, `col65`, `col85`, `col84`, `col83`, `col82`, `col81`, `col71`, `col72`, `col73`, `col74`, `col75`, `col48`, `col47`, `col46`, `col45`, `col44`, `col43`, `col42`, `col41`, `col31`, `col32`, `col33`, `col34`, `col35`, `col36`, `col37`, `col38`, `diagnosis`, `treatment`, `remarks`, `date`) VALUES
(80, '2020M0702', 'Charles Agustin', 'Monreal', 'BSIS', 'extracted', 'unerupted', 'Jacket crown', 'Jacket crown', 'poetic', 'missing', 'root fragment', 'poetic', 'missing', 'root fragment', 'poetic', 'light cure filling', 'sound', 'root fragment', 'Jacket crown', 'poetic', 'Jacket crown', 'poetic', 'poetic', 'amalgam filling', 'temporary filling', 'poetic', 'for extraction', 'caries', 'light cure filling', 'extracted', 'Jacket crown', 'Jacket crown', 'extracted', 'amalgam filling', 'missing', 'extracted', 'root fragment', 'root fragment', 'caries', 'extracted', 'poetic', 'poetic', 'amalgam filling', 'light cure filling', 'amalgam filling', 'amalgam filling', 'root fragment', 'poetic', 'poetic', 'extracted', 'Jacket crown', 'amalgam filling', 'Jacket crown', 'poetic', 'missing', 'root fragment', 'Cavities', 'Tooth Extraction', 'Brush your teeth daily', '2023-12-29'),
(82, '2020M0305', 'Jemelyn', 'Tesara', 'BSIS', 'poetic', 'poetic', 'Jacket crown', 'light cure filling', 'amalgam filling', 'temporary filling', 'temporary filling', 'Jacket crown', 'for extraction', 'temporary filling', 'missing', 'root fragment', 'extracted', 'light cure filling', 'amalgam filling', 'temporary filling', 'temporary filling', 'temporary filling', 'Jacket crown', 'root fragment', 'amalgam filling', 'caries', 'caries', 'caries', 'amalgam filling', 'Jacket crown', 'missing', 'root fragment', 'extracted', 'amalgam filling', 'Jacket crown', 'amalgam filling', 'amalgam filling', 'root fragment', 'poetic', 'extracted', 'temporary filling', 'Jacket crown', 'root fragment', 'unerupted', 'root fragment', 'root fragment', 'missing', 'root fragment', 'Jacket crown', 'extracted', 'root fragment', 'root fragment', 'missing', 'root fragment', 'root fragment', 'Jacket crown', 'Cavities', 'Cleaning', 'Brush your teeth daily', '2023-12-29'),
(87, '2020M0105', 'Madison', 'Rivers', 'BECE', 'sound', 'sound', 'sound', 'sound', 'caries', 'sound', 'for extraction', 'for extraction', 'sound', '', 'for extraction', 'for extraction', 'for extraction', 'for extraction', 'for extraction', 'sound', 'sound', 'amalgam filling', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'for extraction', 'root fragment', 'extracted', 'poetic', 'missing', 'root fragment', 'root fragment', 'extracted', 'extracted', 'unerupted', 'unerupted', 'missing', 'root fragment', 'missing', 'root fragment', 'poetic', 'root fragment', 'poetic', 'unerupted', 'extracted', 'light cure filling', 'poetic', 'root fragment', 'poetic', 'root fragment', 'root fragment', 'light cure filling', 'Cavities', 'Tooth Extraction', 'Brush Daily', '2024-03-17'),
(88, '2020M0992', 'Frankie', 'Sustiguer', 'BSIS', 'sound', 'sound', 'sound', 'caries', 'sound', 'caries', 'amalgam filling', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'sound', 'amalgam filling', 'missing', 'light cure filling', 'light cure filling', 'light cure filling', 'extracted', 'poetic', 'missing', 'root fragment', 'amalgam filling', 'caries', 'caries', 'sound', 'temporary filling', 'sound', 'Jacket crown', 'temporary filling', 'Jacket crown', 'missing', 'extracted', 'root fragment', 'root fragment', 'extracted', 'extracted', 'Jacket crown', 'poetic', 'poetic', 'poetic', 'root fragment', 'root fragment', 'poetic', 'missing', 'temporary filling', 'Jacket crown', 'Jacket crown', 'Cavities', 'Oral Prophylaxis', 'Brush your teeth daily', '2024-03-20'),
(89, '2020M902', 'Julian Dave', 'Sioting', 'BSIS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Cavities', 'Extraction', 'Brush your teeth daily', '2024-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `allergy` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `first_name`, `last_name`, `age`, `birthday`, `gender`, `brgy`, `municipality`, `province`, `email`, `number`, `department`, `course`, `allergy`, `password`, `regdate`) VALUES
(2, '2020M0702', 'Charles Agustin', 'Monreal', 22, '2001-08-11', 'Male', 'Baybay Sur', 'Miagao', 'Iloilo', 'charles@gmail.com', 2147483647, 'CICT', 'BSIS', 'None', 'zxcvbnm', '2020-03-12'),
(3, '2020M0305', 'Jemelyn', 'Tesara', 18, '2002-02-20', 'Female', 'Barosong', 'Tigbauan', 'Iloilo', 'jemelyn@gmail.com', 12345, 'CICT', 'BSIS', 'None', 'zxcvbnm', '2024-03-13'),
(7, '2020M0105', 'Madison', 'Rivers', 22, '2001-09-24', 'Female', 'Inangayan', 'Santa Barbara', 'Iloilo', 'madison@gmail.com', 2147483647, 'COE', 'BECE', 'Nona', 'zxcvbnm', '2022-03-09'),
(8, '2022M0114', 'Carter', 'Steel', 22, '2001-08-24', 'Male', 'Inangayan', 'Santa Barbara', 'Iloilo', 'cartersteel@gmail.com', 2147483647, 'CON', 'BSN', 'None', 'zxcvbnm', '2024-03-03'),
(11, '2024A0301', 'Madie', 'Smith', 22, '2001-05-05', 'Female', 'Inangayan', 'Santa Barbara', 'Iloilo', 'madie@gmail.com', 123123123, 'CON', 'BSN', 'None', 'zxcvbnm', '0000-00-00'),
(12, '2024B0422', 'Jason ', 'Anderson', 22, '2001-06-05', 'Male', 'Inangayan', '', 'Iloilo', 'jason@gmail.com', 123123123, 'COE', 'BECE', 'None', 'zxcvbnm', '0000-00-00'),
(13, '2024C0115', 'Emily ', 'Johnson', 20, '2003-04-04', 'Female', 'Inangayan', 'Santa Barbara', 'Iloilo', 'emily@gmail.com', 123123, 'ILS', 'STEM', 'None', 'zxcvbnm', '0000-00-00'),
(14, '2024D0723', 'Kevin ', 'Rodriguez', 21, '2002-05-20', 'Male', '', 'Santa Barbara', 'Iloilo', 'kevin@gmail.com', 123123123, 'ILS', 'ABM', 'None', 'zxcvbnm', '0000-00-00'),
(15, '2024E0520', 'Sarah ', 'Thompson', 23, '2001-01-20', 'Female', 'Dawis', 'Santa Barbara', 'Iloilo', 'sarah@gmail.com', 2147483647, 'COD', 'BDS', 'None', 'zxcvbnm', '0000-00-00'),
(16, '2024F0327', 'Michael ', 'Carter', 23, '2001-01-05', 'Male', 'Dawis', 'Santa Barbara', 'Iloilo', 'michael@gmail.com', 123123123, 'COD', 'BDS', 'None', 'zxcvbnm', '0000-00-00'),
(17, '2020M0992', 'Frankie', 'Sustiguer', 22, '2001-05-05', 'Male', 'Inangayan', 'Santa Barbara', 'Iloilo', 'frankie@gmail.com', 123123, 'CICT', 'BSIS', 'None', 'zxcvbnm', '0000-00-00'),
(18, '2020M902', 'Julian Dave', 'Sioting', 23, '2001-02-05', 'Male', 'Inangayan', 'Santa Barbara', 'Iloilo', 'julian@gmail.com', 2147483647, 'CICT', 'BSIS', 'None', 'zxcvbnm', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dental_assessment`
--
ALTER TABLE `dental_assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `food_monitoring`
--
ALTER TABLE `food_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `dental_assessment`
--
ALTER TABLE `dental_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `food_monitoring`
--
ALTER TABLE `food_monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
