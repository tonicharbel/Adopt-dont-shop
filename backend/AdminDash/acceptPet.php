<?php

if (isset($_GET['AnimalId'])) {

    $animalId = intval($_GET['AnimalId']); // Convert to integer to prevent SQL injection

    include('../connection.php');
   
  
    $sql = "UPDATE animalslists SET Visible = '1' WHERE AnimalId = $animalId";

  
    if ($con->query($sql) === TRUE) {
  
        header("Location: requestPet.php");
        exit();
    } else {
        echo "Error updating animal: " . $con->error;
    }


    $con->close();
} else {
    echo "No AnimalId provided in the URL.";
}
?>
