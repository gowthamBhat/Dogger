			<?php

			session_start();
			$petname = '';
			$petname = $_GET['petname'];


			$petname1=$petage1=$breed1=$address1=$price1=$mobile1=$file_name1="";


			if (!isset($_SESSION['username'])) {


				header('location:login.php');
			}


			try {
				$con = mysqli_connect('localhost', 'root', '', 'dogger');
			} catch (MySQli_Sql_Exception $ex) {
				echo "connection Error:" . $ex;
			}



			$uname = $_SESSION['username'];
			$search_empty = '';
			$searc_query_error = '';


			$q = "SELECT * FROM addpet WHERE petname='$petname'";
			$res = mysqli_query($con, $q);

			if ($res) {
				if (mysqli_num_rows($res) > 0) {

					$rows = mysqli_fetch_array($res);


					$uname = $_SESSION['username'];
					$petname1 = $rows['petname']; //petname to delete in database
					$petage1=  $rows['petage'];
					$breed1=     $rows['breed'] ;
					$address1=  $rows['address'];
					$price1=   $rows['price'];
					$mobile1=   $rows['mobile'] ;
					$file_name1= $rows['img'];



			?>




					<!DOCTYPE html>
					<html>

					<head>
						<title>adopt</title>
						<link rel="stylesheet" type="text/css" href="../css/adopt.css">
						<link rel="stylesheet" href="../css/bootstrap.min.css">
						<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" 
						rel="stylesheet">
					
					<style>
						body{
							background-image: url(<?php echo "'images/" . $rows['img'] . "'"; ?>);
							font-weight: bold;
							color: white;
							background-repeat: no-repeat;
							width: 100%;
							height: 730px;
							background-size: 100% 100%;



						}
					</style>
					</head>
					<body>
						<div id="ttl">
				<a href="market.php" id="anc">
					<p id="dogger">Dogger</p> </a>
						</div>

					<?php




					echo "<div id='info_bg'>";

					echo  "<div class='inner_info table-responsive'>";
					echo "<table class='etab'>";

					echo "<tr>
										<th class='thead-dark'>Pet Name :</th>
										<th class='thead-dark'>" . $petname1 . "</th>
									</tr>";

					echo "<tr>
										<td>pet age :</td>
										<td>" . $petage1 . "</td>
									</tr>";

					echo "<tr>
										<td>breed:</td>
										<td>" . $breed1 . "</td>
									</tr>";

					echo "<tr>
										<td>price :</td>
										<td>" . $price1 . "</td>
									</tr>";

					echo "<tr>
										<td>mobile :</td>
										<td>" . $mobile1 . "</td>
									</tr>";
					echo "<tr>
										<td>address :</td>
										<td>" . $address1 . "</td>
									</tr>";



					echo "</table>";
					echo "</div>";
					//echo "</div>";
					//echo "<div style='clear:both;'></div>";
				} else {
					$search_empty = "<div class='error-msg'>No puppies</div>";
				}
			} else {
				$searc_query_error = "<div class='error-msg' >query not executed : error</div>";
			}


			if (isset($_POST['adopt'])) {

				$query1 = "INSERT INTO sold(uname,petname,petage,breed,price,mobile,address,img) VALUES('$uname','$petname1','$petage1','$breed1','$price1','$mobile1','$address1','$file_name1')";

				$result1 = mysqli_query($con,$query1);

				if(!$result1)
				{
					echo "<script> alert('query failed-insert') </script> ;";
				}



				$query2 = "DELETE FROM addpet  WHERE petname='$petname1'";

				$result2 = mysqli_query($con,$query2);


				

				if(!$result2)
				{
					echo "<script> alert('query failed-del');";
				}
				else

					echo "<script> alert('puppy orderd'); </script>";
					echo "<script>  window.location.assign('http://localhost/dogger/user/market.php') </script>";

					//header("location:http://localhost/dogger/user/market.php");






			}


					?>






						</div>
		</div>
						<form action="" method="POST">
						<button class="btn btn-dark" name="adopt">Adopt</button>
						</form>
					</body>

					</html>