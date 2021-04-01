<?php
 
session_start();

$user=$_SESSION['email'];

if($user)
{
	//if user is logged in

}
else

{
	die("You must be logged in to change password");

}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>PASSWORD RESET</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
	</head>
	<body>
		<div class="reset">
			<form action="process_changepasswords.php" method="post">
					<h1 style ="text-align: center">Change Password </h1>
				</div>
			</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<form method="post" method="">
					<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Current Password" autocomplete="off">
					<br>
					<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="New Password" autocomplete="off">
					<br>
					<input type="password" class="input-lg form-control" name="password3" id="password3" placeholder="Repeat Password" autocomplete="off">

					<br>
					<input type="submit" name="submit" id="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
				</form>
			</div>
		</div>
</div>
</body>
</html>