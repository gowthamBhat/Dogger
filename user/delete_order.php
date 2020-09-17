<?php

$con = mysqli_connect('localhost', 'root', '', 'dogger');
session_start();


if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {


    $id = $_GET['id'];

    // echo $_GET['id'];



    $delete_query_failed = '';

    $delete_no = '';


    /*

$delete_query="DELETE FROM `booking` WHERE `booking`.`id`='$id'";*/



    $delete_query = "DELETE FROM `sold` WHERE `id`='$id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {

        if (mysqli_affected_rows($con) > 0) {

            header("location:http://localhost/dogger/user/myorders.php");
        } else {
            $delete_no = "<div class='error'>Delete No Ticket</div>";
        }
    } else {
        $delete_query_failed = "<div class='error'>Delete Query error Failed</div>";
    }


?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Ticket Cancel Page</title>
        <style>
            .error {
                color: teal;
                border: teal;
                border-style: solid;
                font: 17px Open Sans;
                /* padding: auto 0; */
                text-align: center;
                padding-top: 20px;
                width: 410px;
                height: 50px;
            }
        </style>
    </head>

    <body>

        <?php

        echo $delete_query_failed;

        echo $delete_no;
        ?>


    </body>

    </html>

<?php
}

?>