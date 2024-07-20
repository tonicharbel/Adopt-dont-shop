<?php

$servername = "localhost";  
$username = "root";  
$password = ""; 
$database = "adoptdontshop";  


try{
  $con = new mysqli($servername, $username, $password, $database);
  
} catch (mysqli_sql_exception){

  header("Location:../frontend/error.php");
  exit(); 
}

?>
