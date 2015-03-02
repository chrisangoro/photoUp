<?php
	session_start();
	$connection = mysqli_connect("localhost","flondon1","flondon1","flondon1");
	if(isset($_POST['submitr'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];
		if($username==null || $password==null || $password2==null||
			$email==null){
			echo "Please fill all the fields";
		}else{
			if($password != $password2){
				echo "The passwords don't match";
			}else{
				$encrypted_password = md5($password);
				$query="INSERT INTO users (username, password, email) 
				VALUES ('$username', '$encrypted_password', '$email')";
				if(mysqli_query($connection,$query)){
					echo "You have register!";
				}else{
					echo "There was a problem with register, try again";
				}
			}
		}
	}
?>