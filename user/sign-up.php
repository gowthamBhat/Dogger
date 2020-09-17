<?php

$con = mysqli_connect('localhost', 'root', '', 'dogger');

session_start();

$name = "";
$passcode = "";
$error = '';
$email = "";


if (isset($_SESSION['username'])) {
    header("location:market.php");
} else {




    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $name = $_POST['name'];
        $passcode = $_POST['passcode'];

        function username_exists($username, $con)
        {
            $res = mysqli_query($con, "SELECT * FROM user WHERE uname='$username'");
            if ($res) {
                if (mysqli_num_rows($res) > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        function email_exists($email, $con)
        {
            $res = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
            if ($res) {
                if (mysqli_num_rows($res) > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }


        if (empty($name)) {
            $error = "<div class='error'>Please Enter Username</div>";
        } else if (username_exists($name, $con)) {

            $error = "<div class='error'> Username Not Available try different one</div>";
        } else if (empty($passcode)) {
            $error = "<div class='error'>Please Enter Password</div>";
        } else if (empty($email)) {
            $error = "<div class='error'>Please Enter email</div>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "<div class='error'>Enter Valid Email Address</div>";
        } else if (email_exists($email, $con)) {

            $error = "<div class='error'>Email Already Used,Try Diffrent One</div>";
        } else {


            $q = "INSERT INTO `user`(`uname`, `email`,`passcode`) 
                VALUES ('$name','$email','$passcode')";

            $result = mysqli_query($con, $q);

            if ($result) {
                $_SESSION['username'] = $name;
                header("location:market.php");
            } else {
                $error = "<div class='error'>Something went wrong</div>";
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
        <div class="wrapper-signUp">
            <?php

            echo $error;

            ?>

            <div id="message" class="error" style="display:none"></div>

            <h1>Dogger</h1>
            <p><strong>Log-in and be a Dogger</strong> </p>

            <form class="form" method="post" action="" id="form">
                <div id="passwordMessage" class="AjaxResponse"></div>
                <div id="nameMessage" class="AjaxResponse"></div>
                <div id="emailMessage" class="AjaxResponse"></div>


                <input type="text" class="name" name="name" value="<?php echo $name; ?>" autocomplete="off" placeholder="Name">

                <div>
                    <p class="name-help">Please enter your name.</p>
                </div>

                <input type="email" class="email" name="email" value="<?php echo $email; ?>" autocomplete="off" placeholder="Email">
                <div>
                    <p class="email-help">Please enter your Email.</p>
                </div>

                <input type="password" class="password" name="passcode" value="<?php echo $passcode; ?>" placeholder="Password">
                <div>
                </div>

                <input type="submit" name="submit" class="submit" id="submit" value="Sign-Up">
            </form>

        </div>
        <p class="optimize">
            have an account? &nbsp <a href="login.php" style="text-decoration: none;"><strong style="color:teal;"> Login</strong></a>
        </p>
        <script>
            $(document).ready(function() {
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
                        $(".password").focus(function() {
                            $(".password-help").slideDown(500);
                        }).blur(function() {
                            $(".password-help").slideUp(500);
                        });


                        //     $('#submit').on('click', function(event) {
                        //         event.preventDefault();
                        //         $.ajax({
                        //             type: "post",
                        //             url: "signUpAjax.php",
                        //             data: $('#form').serialize(),
                        //             dataType: "text",
                        //             success: function(response) {


                        //                 $('#nameMessage').html(response.messageUser);
                        //                 $('#emailMessage').html(response.messageEmail);
                        //                 $('#passwordMessage').html(response.messagepassword);

                        //             }
                        //         });
                        //     });
                        // });
        </script>
    </body>

    </html>

<?php

}
?>