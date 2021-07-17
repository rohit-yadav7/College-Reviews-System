<?php
include 'dbh.inc.php';
if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$college_desc = mysqli_real_escape_string($conn, $_POST['college_desc']);

  $collegeName = mysqli_real_escape_string($conn, $_POST['collegeName']);

  	// image file directory
  	$target = "Images/".basename($image);

  	$sql = "INSERT INTO colleges (image, college_desc,collegeName) VALUES ('$image', '$college_desc','$collegeName')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM colleges");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="test.css">
  </head>
  <body>
    <div id ="content">
	<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='Images/".$row['image']."' >";
      	echo "<p>".$row['collegeName']."</p>";
      echo "</div>";
    }
  ?>
      <form  action="test.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
          <input type="file" name="image" >
        </div>
        <div>
          <input type="text" name="collegeName" placeholder="enter college name">
        </div>
        <div>
          <textarea id ="text" name="college_desc" rows="4" cols="40" placeholder="Enter Description About College.."></textarea>
        </div>
        <div>
          <input type="submit" name="upload" value="Add College">
        </div>

      </form>

    </div>

  </body>
</html>
