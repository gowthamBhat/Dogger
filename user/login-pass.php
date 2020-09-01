<?php

$con = mysqli_connect('localhost', 'root', '', 'dogger');

session_start();

$name = "";
$passcode = "";
$error = '';


if (isset($_SESSION['username'])) {
	header("location:addpet.php");
} else {




	if (isset($_POST['submit'])) {


		$name = $_POST['name'];
		$passcode = $_POST['passcode'];

		if (empty($name)) {
			$error = "<div class='error'>Please Enter Username</div>";
		} else if (empty($passcode)) {
			$error = "<div class='error'>Please Enter Password</div>";
		} else {

			$q = "SELECT * FROM user WHERE uname='$name' AND passcode='$passcode'";

			$result = mysqli_query($con, $q);

			if (mysqli_num_rows($result) == 1) {
				$_SESSION['username'] = $name;
				header("location:addpet.php");
			} else {
				$error = "<div class='error-msg'>Wrong Username/Password</div>";
			}
		}
	}


?>


<!DOCTYPE html>
<html>

<head>

	<title>login page</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/fav2.png" />
	<style type="text/css">
		body {
			background-color: #c8c9af;
		}

		#login-main {

			margin-top: 250px;
		}
	</style>
  <link rel="stylesheet" href="../css/dogger.css">

</head>

<body>
	<center>
		<div id='login-main'>
			<?php
					echo $error;
					
					?>
			<form method="POST" action="">
				name &nbsp<input type="text" name="name" value="<?php echo $name; ?>">
				&nbsp &nbsp passcode &nbsp<input type="password" name="passcode" value="<?php echo $passcode; ?>" > <br />
				<br />
				<input type="submit" name="submit">
			</form>
		</div>

	</center>
</body>

</html>
<?php 

} 
?>