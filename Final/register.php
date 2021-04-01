<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="styling.css">
</head>
	<body>
		<div class="register">
		<h2 style="color: #fff;">Register</h2>
		<form action="process_register.php" method="post" enctype="multipart/form-data">

			<label for="identity">Full Names:</label>
			<input type="text" name="identity" id="identity"placeholder="Enter Full Names" required><br><br>

			<label for="mail">Email:</label>
			<input type="text" name="mail" id="mail"placeholder="Enter Email" required><br><br>

			<label for="pwd">Password:</label>
			<input type="password" name="pwd" id="pwd" placeholder="Create Password" required><br><br>

			<label for="res">City of Residence:</label>
			<input type="text" name="res" id="res" placeholder="Enter Residence" required><br><br>

			<label for="prof">Profile Photo:</label>
			<input type="file" name="prof" id="prof" required>

			<button type="submit" name="register">Register</button>
			<!--<a href="register.php"name="register">Register</a> <a href="login.php">Back</a>-->


		</form>
		
	</div>
</body>
</html>
