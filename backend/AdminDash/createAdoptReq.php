<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: index.php");
    exit();
}

include('../connection.php');

if (isset($_GET['userId']) && isset($_GET['AnimalId'])) {
   $userID = mysqli_real_escape_string($con, $_POST['UserID']);
   $animalID = mysqli_real_escape_string($con, $_POST['AnimalID']);
     //$userID=6; just testing it
    // $animalID =14; just testing it
    $query = "INSERT INTO adopts (userid, adoptdate, adoptstatus)
              VALUES ($userID, NOW(), 'pending')";
    
    if (mysqli_query($con, $query)) {
        $adoptid = mysqli_insert_id($con); // Get the adoptid of the newly inserted adoption request
        $query2 = "INSERT INTO adoptanimals (adoptid, animalid)
                   VALUES ($adoptid, $animalID)";

        if (mysqli_query($con, $query2)) {
            header("Location: petslist.php");
            exit();
            
        } else {
            echo "Error inserting adoptanimal record: " . mysqli_error($con);
        }
    } else {
        echo "Error inserting adopts record: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
