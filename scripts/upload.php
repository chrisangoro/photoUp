<?php
	session_start();
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");
	$imagename = $_POST['imgname'];
	$imagecomment = $_POST['comment'];
	$user = $_SESSION['CurrentUser'];

	$name = $_FILES["myfile"]["name"];
	$type = $_FILES["myfile"]["type"];
	$tempdir = $_FILES["myfile"]["tmp_name"];
	$error = $_FILES["myfile"]["error"];

	if($error > 0){
		die("Error uploading file");
	}else{
		if($type == "image/jpeg" || $type == "image/jpg" 
			|| $type == "image/png"){
			$query="INSERT INTO images (name, uploader, info) 
			VALUES ('$imagename','$user','$imagecomment')";
			if(mysqli_query($connection,$query)){
				//obtener el id de la imagen subida
				$maxidquery = "SELECT MAX(id) FROM images";
				$resultid = mysqli_query($connection,$maxidquery);
				$rowt = mysqli_fetch_array($resultid,MYSQLI_BOTH);
				$row = (string)$rowt[0];
				//mover la imagen al servidor en formato jpeg
				move_uploaded_file($tempdir, "../images/".$row.".jpeg");
				header('Location: ../paginas/explore.php'); 
				echo "Image uploaded!";
			}else{
				echo "Error uploading image";
			}
		}else{
			echo "Format not supported";
		}
	}


?>