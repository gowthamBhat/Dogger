<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {

    $uname =  $_SESSION['username'];

    $con = mysqli_connect('localhost', 'root', '', 'dogger');

    if (!$con) {
        echo "con error" . mysqli_connect_error();
    }


    $q = "SELECT * FROM sold WHERE uname='$uname'";

    $res = mysqli_query($con, $q);

    if (!$res) {
        echo "query failed";
    }

    $num = mysqli_num_rows($res);

    if ($num == 0) {
        echo "<p class='note'>No Orders </p> ";
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/market.css">
        <title>My Orders</title>
    </head>

    <body>


        <?php

            while($row = mysqli_fetch_array($res))
            {

               // echo "<div class='order-box'>";

                //echo "<img class='card-img-top' src='images/" . $row['img'] . "' alt='Card image cap'> ";


               // echo "</div>";
               
            echo "<div class='card' style='width: 18rem;'> ";
            echo "<img class='card-img-top' src='images/" . $row['img'] . "' alt='Card image cap'> ";
            echo " <div class='card-body'> ";
            echo " <h5 class='card-title'>" . $row['petname'] . "</h5> ";
            echo " <p class='card-text'>Breed:" . $row['breed'] . "&nbsp &nbsp  Age:" . $row['petage'] . "</p> ";
           // echo "   <a href='adopt.php?petname=$petname' class='btn btn-primary'>Adopt</a> ";
            echo "Price:" . $row['price'] . "<br>";
          //  echo timeAgo($row['stamp']); //calling timeago function 

            echo "  </div> ";
            echo "  </div> ";


            }


        ?>


    </body>

    </html>

<?php
}
?>