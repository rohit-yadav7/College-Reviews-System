<?php
date_default_timezone_set('Asia/Calcutta');
include 'dbh.inc.php';
include 'reviews.inc.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="CSS/colleges.css">
  </head>
  <body>
    <div class="topnav">
        <?php

                      $name =  mysqli_real_escape_string($conn, $_GET['name']);
                      $sql ="SELECT * FROM colleges WHERE collegeName='$name'";
                      $result= mysqli_query($conn,$sql);
                      $queryResult= mysqli_num_rows($result);
                      if($queryResult > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo"<h1 >Welcome to ".$row['collegeName']."</h1><br>";

                        }
                      }
            if (isset($_SESSION['uid'])) {

            echo" <form method='POST' action='".userLogout()."'>

              <a href='#'><button type='submit' name='logoutSubmit'>Logout</button></a>
              </form>";
            }

            else {
            echo"<a href='index.php'><b>Home</b></a>";
            echo"<a href='indexLogin.php?name=$_GET[name]&picture=$_GET[picture]'><b>LogIn</b></a>";
            echo"<a href='signUp1.php?name=$_GET[name]&picture=$_GET[picture]'><b>SignUp</b></a>";


            }


      ?>

    </div>
    <div >
           <?php

                                 $picture=  mysqli_real_escape_string($conn, $_GET['picture']);
                                 $sql4 ="SELECT * FROM colleges WHERE image='$picture'";
                                 $result4= mysqli_query($conn,$sql4);
                                 $queryResult4= mysqli_num_rows($result4);
                                 if($queryResult4 > 0){
                                   while($row4 = mysqli_fetch_assoc($result4)){
                                       echo "<img src='Images/".$row4['image']."' style='width:100%;height:500px'><br>";
                                   }
                                 }
            ?>
          </div>


     <?php
             if (isset($_SESSION['uid']) && ($name==$_SESSION['collegeName'])) {
               echo " <form method='POST' action='".setReviews($conn)."'>
           	    <input type='hidden' name='uid' value='".$_SESSION['uid']."'>
           	    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <input type='hidden' name='collegeName' value ='".$_SESSION['collegeName']."'>
           	    <textarea name='message' placeholder='Give Your Review'></textarea><br>
                  <button type='submit' name='ReviewSubmit'>submit</button>
                 </form>";
             }else {
               echo "<h2>you need to be logged in to give review!</h2>
               <br><br>";
             }

             // $name =  mysqli_real_escape_string($conn, $_GET['name']);
             // $sql3 ="SELECT * FROM colleges WHERE collegeName='$name'";
             // $result3= mysqli_query($conn,$sql3);
             // $queryResult3= mysqli_num_rows($result3);
             // if($queryResult3 > 0){
             //   while($row3 = mysqli_fetch_assoc($result3)){
             //       // echo"<h1 >Welcome to ".$row3['collegeName']."</h1><br>"
             //   }
             // }

             $sql ="SELECT * FROM reviews";
             $result=$conn->query($sql);
             while ($row=$result->fetch_assoc()) {
               $uid=$row['uid'];
               $sql2 ="SELECT * FROM user WHERE uid='$uid'";
               $result2=$conn->query($sql2);
               if ($row2=$result2->fetch_assoc()) {

                   if(strcmp($name,$row['collegeName'])==0) {
                   echo "<div class='review-box'><p>";
                   echo $row2['uname']."<br>";
                   echo $row2['collegeName']."<br>";
                   echo $row['date']."<br><br>";
                   echo nl2br($row['message']);
                   echo "</p>";
                     }



                 if (isset($_SESSION['uid'])) {
                   if ($_SESSION['uid']==$row2['uid']) {
                     echo" <form class='delete-form' method='POST' action ='".deleteReview($conn)."' >
                        <input type='hidden' name='rid' value='".$row['rid']."' >
                        <button type='submit' name='ReviewDelete'>Delete</button>
                      </form>
                       <form class='edit-form' method='POST' action ='editReview.php?name=$_GET[name]&picture=$_GET[picture]' >
                         <input type='hidden' name='rid' value='".$row['rid']."' >
                         <input type='hidden' name='uid' value='".$row['uid']."' >
                         <input type='hidden' name='date' value='".$row['date']."' >
                         <input type='hidden' name='message' value='".$row['message']."' >
                       <button  >Edit</button>
                       </form>";
                   }
                 }

                echo" </div>";
               }

             }
       ?>

  </body>
</html>
