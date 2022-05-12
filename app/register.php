<?php


require 'CourseRegistration.php';

if (isset($_GET['Code'])) {
    $Code = $_GET['Code'];
 }



$enrolled = enroll($stID,$Code,$course_lst,$course_coll,$studfin_coll);

echo $enrolled;




//header("Location: CourseRegistration.php");
//exit();
?>