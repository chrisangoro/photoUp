<?php
	session_start();
	include 'delete.php';

	
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");

	$user = $_SESSION['CurrentUser'];
	

	//obtener el id de la ultima imagen subida
	$maxidquery = "SELECT MAX(id) FROM images";
	$resultid = mysqli_query($connection,$maxidquery);
	$rowt = mysqli_fetch_array($resultid,MYSQLI_BOTH);
	$row = (int)$rowt[0];

	$i=0;
	$j=0;

	echo "<div class=\"container-fluid\">";
	echo "<ul class=\"row\">";
	while($i <= $row){
		$query = "SELECT id FROM images WHERE uploader ='$user' and id='$i'";
		if($res = mysqli_query($connection,$query)){
			$rowtemp = mysqli_fetch_array($res,MYSQLI_BOTH);
			$rowdef = (int)$rowtemp[0];

		}else{
			echo "no dio";
		}

		if($rowdef != 0){

			echo "<li class=\"col-xs-12 col-sm-3\">";
			echo "<div class=\"imagen\">";
			echo "<a href=\"../images/$rowdef.jpeg\">";
			echo "<img class=\"img-responsive\" src='../images/$rowdef.jpeg'>";
			echo "</a>";
			echo "<form action='' method=post>";
			echo "<input type='submit' name='$rowdef' value='Delete'>";
			echo "</form>";
			echo "</div>";
			echo "</li>";

		}

		$i++;	
	}
	echo "</ul>";
	echo "</div>";

	
?>