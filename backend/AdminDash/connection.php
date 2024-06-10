<?php 
$hostname = 'localhost';
$database = 'adoptdontshop';
$username = 'root';
$password = '';
$con = mysqli_connect($hostname,$username,$password,$database);

if(mysqli_connect_errno()){
    echo"Failed to connect to my sql". mysqli_connect_error();
    
}




?>