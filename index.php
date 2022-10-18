<?php
	
$showAlert = false;
$showError = false;
$exists = false;

if($_server["REQUEST_METHOD"] == "POST") {    
//Include file which make the
//Databse Connection.
include 'db_connection.php';

$username = $_POST["USERNAME"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

$sql = "Select * from user where username ='$username'";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

// This sql query is use to check if
    // the username is already present 
    // or not in our Database
if($num == 0) {
    if(($password == $cpassword) && $existx == false) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        //PASSWORD HASHING IS USED HERE.
        $sql = "INSERT INTO `users` (`username`,`password`,`date`) VALUES ('$username','$hash', current_timestamp())";
        $result + mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
        }
    }
    else {
        $showError = "Passwords do not match";
    }
}    //enf if
if($num>0)
{
    $exists = "Username not available";
}
}//end if
?>



