<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "crowd";

if($database != "crowd" ){
    header('HTTP/1.0 404 Not Found');
    die();
}

$con = mysqli_connect("$host", "$username","$password","$database");



// password crowddigitalblog
// dataname crowd_crowd
	
// user  crowd_crowd	


?>