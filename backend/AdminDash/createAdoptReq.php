<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

if (isset($_GET['userId']) && isset($_GET['AnimalId'])) {
    $userID = mysqli_real_escape_string($con, $_GET['userId']);
    $animalID = mysqli_real_escape_string($con, $_GET['AnimalId']);
    
    $query = "INSERT INTO adopts (userid, adoptdate, adoptstatus)
              VALUES ('$userID', NOW(), 'pending')";
    
    if (mysqli_query($con, $query)) {
        $adoptid = mysqli_insert_id($con); 

        $query2 = "INSERT INTO adoptanimals (adoptid, animalid)
                   VALUES ('$adoptid', '$animalID')";

        if (mysqli_query($con, $query2)) {
            header("Location: ../../frontend/track.php");
            exit();
        } else {
            echo "Error inserting adoptanimal record: " . mysqli_error($con);
        }
    } else {
        echo "Error inserting adopts record: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Required parameters are missing.";
}
?>
