<?php
	session_start();
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");

	//obtener el id de la ultima imagen subida
	$maxidquery = "SELECT MAX(id) FROM images";
	$resultid = mysqli_query($connection,$maxidquery);
	$rowt = mysqli_fetch_array($resultid,MYSQLI_BOTH);
	$row = (int)$rowt[0];

	$i=0;
	while($i <= $row){
		if(isset($_POST[$i])){
			$querydelete = "DELETE FROM images WHERE id=$i";
			$file = "../images/".$i.".jpeg";
			if(unlink($file)){
				if(mysqli_query($connection,$querydelete)){
					echo "Image Deleted!";
				}
			}else{
				echo "It couldn't be deleted";
			}
			
		}
		$i++;
	}
?>