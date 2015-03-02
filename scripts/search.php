<?php
	session_start();
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");
	echo "<div class=\"image\">";
	echo "<table class=tabla_imagenes>";
	if(isset($_POST['submits'])){
		$searchinput = $_POST['search'];

		//obtener el id de la ultima imagen subida
		$maxidquery = "SELECT MAX(id) FROM images";
		$resultid = mysqli_query($connection,$maxidquery);
		$rowt = mysqli_fetch_array($resultid,MYSQLI_BOTH);
		$row = (int)$rowt[0];

		$i=0;
		echo"<div class=image>";
		while($i <= $row){

			//Sacar el dueño de la imagen
			$query = "SELECT uploader FROM images WHERE id='$i'";
			if($resuser = mysqli_query($connection,$query)){
				$rowtempuser = mysqli_fetch_array($resuser,MYSQLI_BOTH);
				$rowuser = $rowtempuser[0];
			}else{
				echo "DB error user";
			}

			//Sacar el comentario de la imagen
			$query2 = "SELECT info FROM images WHERE id='$i'";
			if($rescomment = mysqli_query($connection,$query2)){
				$rowtempcom = mysqli_fetch_array($rescomment,MYSQLI_BOTH);
				$rowcom = $rowtempcom[0];
			}else{
				echo "DB error comment";
			}

			//Sacar el nombre de la imagen
			$query3 ="SELECT name FROM images WHERE id='$i'";
			if($resname = mysqli_query($connection,$query3)){
				$rowtempname = mysqli_fetch_array($resname,MYSQLI_BOTH);
				$rowname = $rowtempname[0];
			}else{
				echo "DB error name";
			}

			$query = "SELECT id FROM images WHERE name ='$searchinput' and id='$i'";
			if($res = mysqli_query($connection,$query)){
				$rowtemp = mysqli_fetch_array($res,MYSQLI_BOTH);
				$rowdef = (int)$rowtemp[0];
				if($rowdef !=0){
					echo "<img src='../images/$rowdef.jpeg'>";
					echo "<br>";
					echo "Image Name: ".$rowname."<br>";
					echo "Uploader: ".$rowuser."<br>";
					echo "Comment: ".$rowcom."<br>"; 
					echo "<a href='../paginas/gallery.php'>Return</a>";
				}
			}else{
				echo "no dio";
			}
			$i++;		
		}
		echo "</div>";
	}else{
		echo "Error";
	}
?>