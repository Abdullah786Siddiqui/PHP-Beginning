<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "school_management_system";

$conn = new mysqli($host,$username,$password,$database);
if($conn->connect_error){
  die('Connection Failed');
}



?>