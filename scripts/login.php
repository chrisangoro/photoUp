	<?php
		session_start();
		
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");

		if($_GET['logout']){
			session_unset();
			session_destroy();
			header('Location: ../index.php');
		}

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$encrypted_password = md5($password);
			$query = "SELECT * FROM users WHERE username ='$username' 
			AND password ='$encrypted_password'";
			$result = mysqli_query($connection,$query);
			$count = mysqli_num_rows($result);
			if($count == 1){
				$_SESSION['CurrentUser'] = $username;

				header('Location: http://sistemas.dis.eafit.edu.co/~flondon1/paginas/explore.php');
			}else{
				echo "Incorrect Username or Password";
			}
		}else{
		}

	?>