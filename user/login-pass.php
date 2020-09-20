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
				$error = "<div class='error'>Wrong Username/Password</div>";
			}
		}
	}


?>






	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="../js/jquery-3.5.1.min.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
		<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
        crossorigin="anonymous"></script> -->
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/regForm.css">
		<title>Document</title>
	</head>

	<body>
		<div class="wrapper">
			<?php

			echo $error;

			?>

			<h1>Dogger</h1>
			<p><strong>Log-in and be a Dogger</strong> </p>
			<form class="form" method="post" action="">

				<input type="text" class="name" name="name" value="<?php echo $name; ?>" autocomplete="off" placeholder="Name">
				<div>
					<p class="name-help">Please enter your name.</p>
				</div>
				<input type="password" class="email" name="passcode" value="<?php echo $passcode; ?>" placeholder="Password">
				<div>
					<p class="email-help">Please enter your password.</p>

				</div>
				<input type="submit" name="submit" class="submit" value="LogIn">
			</form>
		</div>
		<p class="optimize">
			Don't have an account? &nbsp <a href="sign-up.php" style="text-decoration: none;"><strong style="color:teal;"> SIGN UP</strong></a>
		</p>
		<script>
			$(".name").focus(function() {
				$(".name-help").slideDown(500);
			}).blur(function() {
				$(".name-help").slideUp(500);
			});

			$(".email").focus(function() {
				$(".email-help").slideDown(500);
			}).blur(function() {
				$(".email-help").slideUp(500);
			});
		</script>
	</body>

	</html>

<?php

}
?>