
<?php
use MongoDB\Client;
require '../vendor/autoload.php';
session_start();
ob_start();
$error = "";
$checkpss="";
$client = new MongoDB\Client(
    'mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority'
);
$coll= $client->Users->StaffInfo;




if(isset($_POST["submit"])){
    $password= $_POST['password'];
    $id=$_POST['id'];
   $staff= $coll->findOne(["staffid"=>$id]);

   
  
   if ($staff->role=='registry') {
       echo("club");
       if(password_verify( $password, $staff->password)){
        echo('logged in');
        header('location:test.php');
       
    }
    else{
        echo"<script>alert('Id or password is incorrect')</script>";
    }
   }
   else{
    //  echo("null");
    $error= "No user found";
      
  }
}
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>MATT</title>
    <link href="signinstyle.css" rel="stylesheet" type="text/css">


</head>



<body style ="background-image: url('back.jpg'); background-size: cover; background-opacity:0.4;">

<div class="wrapper">
        <div class="logo">
            <img src="downloadlogo.png" alt="">
        </div>

        <div class="text-center mt-4 name" style="text-align: center; color: white; font-family: serif;">
           MATT
        </div>
        <br>
        <br>
        <form class="p-3 mt-3" action='' method= 'post'>
            <div class="form-field d-flex align-items-center " style="text-align:center;">
                <span class="far fa-user"></span>
                <input type="text" name="id" style="height: 6vh; border-radius: 10px; width: 30vh; text-align:center" id="userName" placeholder="ID" >
            </div>
            <br>
            <div class="form-field d-flex align-items-center" style="text-align:center;">
                <span class="fas fa-key"></span>
                <input type="password" name="password" style="height: 6vh; border-radius: 10px; width: 30vh;text-align:center" id="pwd" placeholder="Password">
            </div>

            <div class="container" style="text-align:center;">
                
                    <br>
                    <input type="submit" name="submit" class="signinbuttons" style=" width:15vh;height:5vh;border-radius: 10px;" value="Sign in">
                   
    

        </div>
        </form>
        
    </div>


   

            
    </body>
</html>
