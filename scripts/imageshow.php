<?php
	$directory = opendir("../images/");
	echo "<div class=\"container-fluid\">";
	echo "<ul class=\"row\">";

	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");

	$i=0;
	while(($file = readdir($directory)) != FALSE){
		if($file != "." && $file != ".." && $file != ".DS_Store"){
			$fileid = (int)strstr($file,'.',true);

			//Sacar el dueño de la imagen
			$query = "SELECT uploader FROM images WHERE id='$fileid'";
			if($resuser = mysqli_query($connection,$query)){
				$rowtempuser = mysqli_fetch_array($resuser,MYSQLI_BOTH);
				$rowuser = $rowtempuser[0];
			}else{
				echo "DB error user";
			}

			//Sacar el comentario de la iamgen
			$query2 = "SELECT info FROM images WHERE id='$fileid'";
			if($rescomment = mysqli_query($connection,$query2)){
				$rowtempcom = mysqli_fetch_array($rescomment,MYSQLI_BOTH);
				$rowcom = $rowtempcom[0];
			}else{
				echo "DB error comment";
			}

			//Sacar el nombre de la imagen
			$query3 ="SELECT name FROM images WHERE id='$fileid'";
			if($resname = mysqli_query($connection,$query3)){
				$rowtempname = mysqli_fetch_array($resname,MYSQLI_BOTH);
				$rowname = $rowtempname[0];
			}else{
				echo "DB error name";
			}

			echo "<li class=\"col-md-3 col-sm-3 col-xs-4\">";
			echo "<div class=\"imagen\">";
			echo "<a href=\"../images/$file\">";
			echo "<img class=\"img-responsive\" src='../images/$file'>";
			echo "</a>";
			echo "<h4 class=\"page-header\">";
			echo $rowname;
			echo "<br>";
			echo "<small>";
			echo $rowuser;
			echo "<br>";	
			echo $rowcom;
			echo "</small></h4>";
			echo "</div>";
			echo "</li>";

		}

	}
	echo "</ul>";
	echo "</div>";


	



?>