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
    function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed;
        $minutes    = round($time_elapsed / 60);
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400);
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640);
        $years      = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return "just now";
        }
        //Minutes
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        }
        //Days
        else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        }
        //Weeks
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        }
        //Months
        else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        }
        //Years
        else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }



    $q = "SELECT * FROM addpet WHERE uname='$uname'";

    $res = mysqli_query($con, $q);

    if (!$res) {
        echo "query failed";
    }

    $num = mysqli_num_rows($res);

    if ($num == 0) {
        echo "<center><p class='note'>No Pets </p></center> ";
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

        while ($row = mysqli_fetch_array($res)) {

            // echo "<div class='order-box'>";

            //echo "<img class='card-img-top' src='images/" . $row['img'] . "' alt='Card image cap'> ";


            // echo "</div>";

            echo "<div class='card' style='width: 18rem;'> ";
            echo "<img class='card-img-top' src='images/" . $row['img'] . "' alt='Card image cap'> ";
            echo " <div class='card-body'> ";
            echo " <h5 class='card-title'>" . $row['petname'] . "</h5> ";
            echo " <p class='card-text'>Breed:" . $row['breed'] . "&nbsp &nbsp  Age:" . $row['petage'] . "</p> ";
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-primary'>delete</a> ";
            echo "Price:" . $row['price'] . "<br>";
            echo timeAgo($row['stamp']); //calling timeago function 

            echo "  </div> ";
            echo "  </div> ";
        }
        // echo "   <a href='adopt.php?petname=$petname' class='btn btn-primary'>Adopt</a> ";
        // echo "  <button name=" . $row['id'] . " class='btn btn-primary'>Delete</button> ";
        ?>


    </body>

    </html>

<?php
}
?>