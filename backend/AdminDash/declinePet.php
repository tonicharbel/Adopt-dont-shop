<?php

if (isset($_GET['AnimalId'])) {
    
    $animalId = intval($_GET['AnimalId']); // Convert to integer to prevent SQL injection

include('../connection.php');
   
    $sql = "DELETE FROM animalslists WHERE AnimalId = $animalId";

    if ($con->query($sql) === TRUE) {

        if (isset($_GET['src']) && $_GET['src'] == "petlist") {
            header("Location: PetsList.php");
        } else {
            header("Location: requestPet.php");
        }
        exit(); 
    } else {
        echo "Error deleting animal: " . $con->error;
    }

    $con->close();
} else {
    echo "No AnimalId provided in the URL.";
}
?>
