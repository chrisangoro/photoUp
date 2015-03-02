<?php
	session_start();
	include 'registerlogic.php';
?>
<!DOCTYPE html>
<html>
	<body>
		<form method="post" action="">
			<label>Enter your Username:</label><br>
			<input id="username" name="username" placeholder="Username" type="text">
			<br>
			<label>Enter your Password:</label><br>
			<input id="password" name="password" placeholder="********" type="password">
			<br>
			<label>Repeat you Password:</label><br>
			<input id="password2" name="password2" placeholder="********" type="password">
			<br>
			<label>Enter your Email:</label><br>
			<input id="email" name="email" placeholder="email" type="text">
			<br>
			<input name="submit" type="submit" value="Register">
			<br>
			<a href='index.php'>Regresar</a>
		</form>
	</body>
</html>