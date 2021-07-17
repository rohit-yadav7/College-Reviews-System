<?php
	include 'header.php';
?>
<h1>Search Your colleges Here..</h1>

<div class="topnav">
  
  <a href="#about"><b>About</b></a>
  <a href="#contact"><b>Contact</b></a>
  <div class="college-container">

    <form action="search.php" method="POST">
	<input type ="text" name="search" placeholder="search your college..">
	<button type="submit" name= "submit-search">Search</button>

</form>	
  </div>
</div>













<!--<div class ="college-container">
	<?php

	$sql = "select * from colleges";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);

	if($queryResults > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<div class='college-box'>
			<h3>".$row['a_name']."</h3>


			</div>";

		}

	}
	?>-->


</div>


</body>
	</html>