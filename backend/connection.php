<?php
$dsn = "mysql:host=localhost;dbname=";
$dbusername="root";
$dbpassword="";

try{
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  echo "connected to database";
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "select * from users";
  $statement = $pdo->prepare($query);
  $statement->execute();
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    echo $row['id']." ".$row['username']." ".$row['pwd']." ".$row['email'];
    echo '<br>';
  }
}catch(PDOException $e){
  echo "connection failed ".$e->getMessage();
}

?>
