<?php 
require 'coursereg.php';
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
  	<title>CourseReg</title>
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
		  		<h1><a href="newreg.php" class="logo">Enroll</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
              <a href="newreg.php">TimeTable</a>
	          </li>
	          <li>
	              <a href="https://www.ashesi.edu.gh/about.html">Ashesi</a>
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
              <li class="active">
              <a href="newreg.php">Logout</a>
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

        <h2 class="mb-4">Available Courses</h2>
        <div class="container">

<?php


  /* if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }*/


?>

<h2>Major Courses</h2>
<table class="table table-borderd">
   <tr>
      <th>Course Name</th>
      <th>Code</th>
      <th>Action</th>
   </tr>
<?php

        //To Test
        $stID = $_SESSION['ID'];    

      $student = $studfin_coll->findOne(["stid" => $stID]);
      $major = $student->major;
      $year  = $student->year;
      if($year == "2022"){
          $year = 8;
      }
      elseif($year == "2023"){
          $year = 6;
      }
      elseif($year == "2024"){
          $year = 3;
      }
      elseif($year == "2025"){
          $year = 1;
      }

      
      
      function reqfor($stID,$major){
         return 'required_for.'.$major;
      }
      $avalcourses = $course_coll->find([ reqfor($stID,$major) => $year]);
      //var_dump($avalcourses);


      foreach($avalcourses as $acourse) {
         echo "<tr>";
         echo "<td>".$acourse->course_title."</td>";
         echo "<td>".$acourse->_id."</td>";
         echo "<td>";
         echo "<a href='register.php?Code=".$acourse->_id."' class='btn btn-primary'>Enroll</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>


 <h3>Optional Courses</h3>
 <table class="table table-borderd">
   <tr>
      <th>Course Name</th>
      <th>Code</th>
      <th>Action</th>
   </tr>
<?php


        //To Test
        

      $student = $studfin_coll->findOne(["stid" => $stID]);
      $major = $student->major;
      $year  = $student->year;
      if($year == "2022"){
          $year = 8;
      }
      elseif($year == "2023"){
          $year = 6;
      }
      elseif($year == "2024"){
          $year = 3;
      }
      elseif($year == "2025"){
          $year = 1;
      }

      
      function elecfor($stID,$major){
         return 'option_for.'.$major;
      }

      //echo elecfor($stID,$major);
      $eleccourses = $course_coll->find([ elecfor($stID,$major) => $year]);

      //var_dump($avalcourses);


      foreach($eleccourses as $ecourse) {
         echo "<tr>";
         echo "<td>".$ecourse->course_title."</td>";
         echo "<td>".$ecourse->_id."</td>";
         echo "<td>";
         echo "<a href='register.php?Code=".$ecourse->_id."' class='btn btn-primary'>Enroll</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table> 
		
		</div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
	<script src="../assets/js/searchbar.js"></script>
  </body>
</html>