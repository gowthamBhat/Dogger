<?php


try {
	$con = mysqli_connect('localhost', 'root', '', 'dogger');
} catch (MySQli_Sql_Exception $ex) {
	echo "connection Error:" . $ex;
}
session_start();

if (!isset($_SESSION['username'])) {
	header("location:login-pass.php");
} else {
	

	$uname = $_SESSION['username'];
	$petname = '';
	$petage = '';
	$breed = '';
	$price = '';
	$mobile = '';
	$address = '';


	$f = '';
	$note = '';
	$error = '';




	if (isset($_POST['submit'])) {


		$uname = 'gowth';

		$petname = $_POST['petname'];

		$petage = $_POST['petage'];

		$breed = $_POST['breed'];

		$price = $_POST['price'];

		$mobile = $_POST['mobile'];

		$address = $_POST['address'];

		$f = $_FILES['image'];

		$stamp =  date("Y-m-d h:i:sa"); //current time will be used to store the file updation time to database



		$errors = array();
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		//$file_ext=strtolower(end(explode('.',$_FILES['image']['name']))); 
		//error enountering in strtolower so disabled
		$file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
		$expensions = array("jpeg", "jpg", "png");








		if (empty($petname) || empty($petage) || empty($breed) || empty($price) || empty($mobile) || empty($address)) {


			$error = "<div class='error'> fields are empty </div>";
		} elseif ($petage > 50) {


			$error = 'pet age error';
		} elseif (!preg_match('/^[0-9]{10}+$/', $mobile)) {
			$error = 'mobile no not valid';
		} elseif (strlen($address) < 10) {

			$error = 'small address length';
		} else {



			if (in_array($file_ext, $expensions) === false) {
				$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
			}
			if ($file_size > 2097152) {
				$errors[] = 'File size must be excately 2 MB';
			}
			if (empty($errors) == true) {
				move_uploaded_file($file_tmp, "images/" . $file_name);

				$q = "INSERT INTO addpet(uname,petname,petage,breed,price,mobile,address,img,type,stamp) VALUES ('$uname','$petname','$petage','$breed','$price','$mobile','$address','$file_name','$file_type','$stamp')"; //or die ("query error". mysql_error($con)) ;

				$res = mysqli_query($con, $q);
				if (!$res) {
					$error = "<div class='error'> query failed </div>";
				} elseif ($res) {

					$petname = '';
					$petage = '';
					$breed = '';
					$price = '';
					$mobile = '';
					$address = '';
					$note = "<div class='note'> pet added successfully </div>";
				}
			} else {
				print_r($errors);
			}

			//echo "success";
		}
	}



?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add Pet</title>

		<link rel="shortcut icon" type="image/x-icon" href="../img/fav2.png" />
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/addpet.css">
	</head>

	<body>
		<?php echo " $error  ";
		echo " $note ";	?>

		<div class="nav">
			<div class="slide-nav">
				<span class="nav-user"><?php echo $uname; ?></span>

				<a class="nav-logout" href="log-out.php"><span class="btn btn-danger btn-sm">logout</span></a>
			</div>
		</div>
		<div class="title-main">

			<a href="http://localhost/dogger/index.html" id="hov">
				<p id="dogger">Dogger</p>
			</a>

		</div>

		<center>
			<div id="head">



				<form action="" method="POST" enctype="multipart/form-data">

					<table>

						<tr>

							<th>pet name</th>
							<td> <input type="text" name="petname" placeholder="Pet Name" value="<?php echo $petname; ?>" autofocus=""></td>

						</tr>

						<tr>
							<th>pet age</th>
							<td><input type="number" name="petage" placeholder="age" value="<?php echo $petage; ?>"></td>


						</tr>
						<tr>
							<th>Breed</th>
							<td><input type="text" name="breed" value="<?php echo $breed; ?>" placeholder="breed"></td>


						</tr>
						<tr>
							<th>Pet Price</th>
							<td><input type="number" name="price" value="<?php echo $price; ?>" placeholder="price"></td>


						</tr>
						<tr>
							<th>Owner mobile no</th>
							<td> <input type="number" name="mobile" value="<?php echo $mobile; ?>" placeholder="mobile No"></td>


						</tr>
						<tr>
							<th>address</th>
							<td><textarea name="address" id="address" cols="50" rows="3" value="<?php echo $address; ?>"></textarea></td>


						</tr>
						<tr>
							<th>Pet Photo</th>
							<td><input type="file" name="image" class="btn btn-dark btn-sm" required></td>


						</tr>
						<tr>
							<td><input type="submit" name="submit" class="btn btn-dark btn-sm"></td>
							<td> <input type="reset" name="reset" class="btn btn-dark btn-sm"></td>


						</tr>


					</table>

				</form>
		</center>
		</div>

	</body>

	</html>
<?php
} ?>