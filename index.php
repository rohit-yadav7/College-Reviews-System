<?php
date_default_timezone_set('Asia/Calcutta');
include 'dbh.inc.php';
include 'reviews.inc.php';
// include 'header.php';
session_start();


function make_query($conn)
{
 $query = "SELECT * FROM banner ORDER BY banner_id ASC";
 $result = mysqli_query($conn, $query);
 return $result;
}

function make_slide_indicators($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="Images/'.$row["banner_image"].'" alt="'.$row["banner_title"].'" />
   <div class="carousel-caption">
    <h3>'.$row["banner_title"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}


 ?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
<title>COLLEGE REVIEW SYSTEM</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/demo.css"> -->
    <!-- Font Awesome Icon -->
    <script src="https://kit.fontawesome.com/7eac9a21a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="CSS/style.css" >
    <link rel="stylesheet" type="text/css" href="CSS/footer.css" >
    <link rel="stylesheet" type="text/css" href="CSS/header.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="topnav">

        <?php
            if (isset($_SESSION['uid'])) {
            echo"  <form method='POST' action='".userLogout()."'>
              <a href='#'><button type='submit' name='logoutSubmit'>Logout</button></a>
              </form>";
            }
            else {
            echo"<a href='index.php'><b>Home</b></a>";
            echo"<a href='indexLogin.php'><b>LogIn</b></a>";
            echo"<a href='signUp1.php'><b>SignUp</b></a>";
              echo"<a href='test.php'><b>Admin</b></a>";

            }
      ?>

    <div class="college-container">
    <form action="search.php" method="POST">
  	<input type ="text" name="search" placeholder="search your college..">
  	<button type="submit" name= "submit-search">Search</button>
    </form>
    </div>
    </div>

    <br />
      <!-- <div class="container">
       <h2 align="center">How to Make Dynamic Bootstrap Carousel with PHP</h2>
       <br /> -->
       <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php echo make_slide_indicators($conn); ?>
        </ol>

        <div class="carousel-inner">
         <?php echo make_slides($conn); ?>
        </div>
        <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Next</span>
        </a>

       </div>
      <!-- </div> -->

    <footer class="footer">
  	    <div class="container">
  	 	  <div class="row">
          	 		  <!-- <div class="footer-col">
          	 			<h4>company</h4>
          	 		 	<ul>
          	 				<li><a href="#">about us</a></li>
          	 				<li><a href="#">our services</a></li>
          	 				<li><a href="#">privacy policy</a></li>

          	 		    </ul>
          	 	     </div> -->
              	 		<div class="footer-col">
              	 			<h4>get help</h4>
              	 			<ul>
              	 			<li><a href="#">FAQ</a></li
              	 			</ul>
              	 		</div>

                   <div class="footer-col">
                  <h4>follow us</h4>
                   <div class="social-links">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
          	 		    </div>
  	 	</div>
      </div>
  </footer>
</body>
</html>
