<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<link rel="stylesheet" href="styling.css">
	</head>
	<body>
		<div class="login">
			<form action="process_login.php" method="post" class="ajax">
				<h2 style="color: white">Log In</h2>
				<p>
				<label for="mail">Email:</label>
				<input type="text" name="mail" id="mail"placeholder="Enter Email" required>
			</p>
			<p>
				<label for="pwd">Password:</label>
				<input type="password" name="pwd" id="pwd" placeholder="Enter Password" required>
			</p>
			<p>
				<button type="login" id="login"name="login"style="margin-right: 60px">LOGIN</button>
			</p>
			<p>
				DON'T HAVE AN ACCOUNT? 
				<a href="register.php">Register</a>Back</a>
			</p>
		</form>

	</body>
</html>