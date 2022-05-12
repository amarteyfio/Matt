<?php
//This file contains the functions used for course registration
require '../vendor/autoload.php';
use MongoDB\Client;


$client = new MongoDB\Client(
    "mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority"
);

$db1 = $client->Finance;
$db2 = $client->CourseRegistration;
$db3 = $client->CourseRegistration;

$studfin_coll = $db1->Spring22;
$course_coll = $db2->Courses;
$course_lst = $db3->Spring22;


//Method to Check Payment 
function checkPay($stID,$studfin_coll){
 $studinfo = $studfin_coll->findOne(['stid' => $stID]);
 $paystat = $studinfo->paymentstatus;

 if($paystat == true){
     return true;
 }
 else{
     return false;
 }


}



//Method to check Prerequisites
function checkPreq($stID,$Code,$course_coll,$studfin_coll){
    //Studinfo(prerequisites)
    $studinfo = $studfin_coll->findOne(['stid' => $stID]);
    $prevcourses = iterator_to_array($studinfo['courses_taken']);
    //Course Details
    $coursedet = $course_coll->findOne(['_id' => $Code]);
    $preq = iterator_to_array($coursedet['prerequisites']);
    //$coursedet->prerequisites;
    $preqArray = iterator_to_array($preq[0]);

    if(empty($preqArray) == true){
        return true;
    }
    else{
    $cal = array_intersect($preqArray, $prevcourses);

    //Check if course has been taken
     if (array_intersect($preqArray, $prevcourses) === $preqArray) {
        return true;
    }
    else{
        return false;
    }
}

}

function enroll($stID,$Code,$course_lst,$course_coll,$studfin_coll){
    $pay = checkPay($stID,$studfin_coll);
    $pass = checkPreq($stID,$Code,$course_coll,$studfin_coll);

    if($pay == true){
        if($pass == true){
            $course = $course_lst->findOne(['code' => $Code]);
            $studarr = iterator_to_array($course['students']);

            if(in_array($stID,$studarr)){
                return "Already Enrolled";
            }
            else{
            array_push($studarr,$stID);
            $course_lst->updateOne(
                [ 'code' => $Code ],['$set' => ['students' => $studarr]]
             );
        
             return "Enrolled";
            }
        }
        else{
            return "You do not meet Prerequisites Course Requirements for this Course";
        }
        
    }
    else{
        return "Kindly sort out Fee payment before you can enroll";
    }
   
     
    
    
}





//$pay = checkPay("01132022",$studfin_coll);


//checkPreq("01242022","CS341",$course_coll,$studfin_coll);
enroll("00192025","ENGL112",$course_lst,$course_coll,$studfin_coll);




?>