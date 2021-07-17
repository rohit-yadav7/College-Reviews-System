<?php
	include 'header.php';
?>

<!--
<h1>Welcome to the College!!!</h1></br></br></br>
<h2>Read all the information about college and the reviews given by the college students.</h2></br></br> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="CSS/searchPage.css">
	</head>
	<body>
		<h1>Search Page</h1>
		<div class ="test1">
		<?php

			if(isset($_POST['submit-search'])){

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				$sql = "select * from colleges where collegeName like'%$search%'";

				$result = mysqli_query($conn, $sql);

				$queryResult = mysqli_num_rows($result);

				echo "There are ".$queryResult." results!";

				if($queryResult > 0){
					while($row = mysqli_fetch_assoc($result)){

						echo "<a href='colleges.php?name=".$row['collegeName']."&picture=".$row['image']."'>

					<div class='test2'>
					<h3 >".$row['collegeName']."</h3>

					</div></a>";

					}
					// & picture = ".$row['image']."

				}else {

					echo "There is no college save with this name!";
				}
			}
		?>
		</div>

	</body>
</html>
