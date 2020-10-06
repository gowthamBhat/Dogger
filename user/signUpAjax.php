<?php
$passcode =  $_POST['passcode'];
$name =  $_POST['name'];
$email =  $_POST['email'];


// echo $name."".$passcode."".$email;

// if (empty($name)) {
//    echo "Please Enter userName";
// } else if (empty($passcode)) {
//     echo "Please Enter Password";
// }
// else if (empty($email)) {
//     echo "Please Enter email";
// } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    echo "Enter Valid Email Address";
// } else {
// echo "all good";
// }
// if (empty($name)) {
//     echo "<div class='error'>Please Enter Username</div>";
// } else if (empty($passcode)) {
//     echo "<div class='error'>Please Enter Password</div>";
// }
// else if (empty($email)) {
//     echo "<div class='error'>Please Enter email</div>";
// } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "<div class='error'>Enter Valid Email Address</div>";
// } else {
//     echo "all good";

// }

if (empty($name)) {
    echo $messageUser = "Please Enter Username";
} 
if (empty($passcode)) {
   echo $messagePassword ="Please Enter Password";
}
 if (empty($email)) {
  echo  $messageEmail = "Please Enter email";
}
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo  $messageEmail = "Please Enter email";
} else{

    echo "all good";
}
?>