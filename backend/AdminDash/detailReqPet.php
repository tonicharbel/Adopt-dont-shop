<?php 
session_start();
if($_SESSION['isLoggedin']!= 1){
    header("Location: ../../../../frontend/index.php");
    exit();
}else{
    include('../connection.php');
 
    if (isset($_GET['AnimalId'])) {
        $animalId = intval($_GET['AnimalId']);
        $query = "SELECT * FROM animalslists WHERE AnimalId = $animalId";
        $result = mysqli_query($con, $query);
    }
   



}





?>