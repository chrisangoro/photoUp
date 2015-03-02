<html>
<head>
	<link href="estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
	session_start();

	if(isset($_SESSION['CurrentUser'])){
		echo "Welcome " . $_SESSION['CurrentUser']."<br>";
		echo "This are the pictures you have uploaded:";
		include 'profileimgshow.php';
	}else{
		echo "Not logged in";
	}
	?>
</body>
</html>