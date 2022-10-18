<?php

$servername = "localhost";
$username = "root";
$password = "";
//$db_name = "useraccounts";

$database = "useraccounts";

$db = mysqli_connect($servername, 
$username, $password, $database);
//$db = new PDO('mysql:host=localhost;dbname=' .$db_name . ';charset=utf8',$db_user, $db_pass);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (!$db){
    die("sorry we failed to connect: ". mysqli_connect_error());
}
else{
//echo "connection was successful";
}

?>
