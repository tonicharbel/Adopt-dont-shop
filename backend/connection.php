<?php
$dsn = "mysql:host=localhost;dbname=";
$dbusername="root";
$dbpassword="";

try{
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  echo "connected to database";
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "connection failed ".$e->getMessage();
}

?>
