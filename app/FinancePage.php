<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Finance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-light">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.html" class="logo">Finance</a></h1>
	        <ul class="list-unstyled components mb-5">
                <li>
	              <a href="https://www.ashesi.edu.gh/about.html">TimeTable</a>
	          </li>
	          <li>
	              <a href="https://www.ashesi.edu.gh/about.html">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Events Calendar</a>
                </li>
                <li>
                    <a href="#">Students Info</a>
                </li>
              </ul>
	          </li>
	        </ul>


	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <!-- <h2 class="mb-4">Billing System</h2> -->

		<div class="input-group">
            <form method="POST">
            <input type="text" name="id" class="text-input" placeholder="Search ID">
            <button class='btn btn-primary' name = 'search'>Search</button>

            </form>
		
		</div>
        <br>
        <?php
            require '../vendor/autoload.php';

            $client = new MongoDB\Client(
            "mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority"
            );
            $db1 = $client->Finance;
            $studfin_coll = $db1->Spring22;

            if(isset($_POST['search'])){
            $stID = $_POST['id'];

            $stud = $studfin_coll->FindOne(['stid' => $stID]);
            if($stud == null){
                echo "Student does not exist";
            }
            else{

            
        
            }
        }
            ?>
            <h1>Student Information</h1>
            <ul>
                
                <li> Name: <?php echo $stud->name; ?></li>
                <li> Major: <?php echo $stud->major; ?></li>
                <li> Year: <?php echo $stud->year; ?></li>
                <li> Payment Status: <?php if($stud->paymentstatus == true){
                    echo "Paid";
                }
                else{
                    echo "Not Paid";
                }; ?></li>
            
            </ul>

            <form method="POST">
                <input name = "Update" type="text" class="text-input" placeholder="Add Amount">
            </form>
      </div>
    <?php
require 'finance.php';

use MongoDB\Operation\FindOne;
use MongoDB\Client;

$client = new MongoDB\Client(
    "mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority"
);
$db1 = $client->Finance;
$studfin_coll = $db1->Spring22;

    if(isset($_POST['search'])){
        $stID = $_POST['id'];

        $stud = $studfin_coll->FindOne(['stid' => $stID]);
        
    }

    
?>

    <script src= "../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
	<script src="../assets/js/searchbar.js"></script>
  </body>
</html>