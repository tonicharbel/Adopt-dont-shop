<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');


if (isset($_GET['AdoptId'])) {

    $adoptId = mysqli_real_escape_string($con, $_GET['AdoptId']);

    $query = "UPDATE adopts SET AdoptStatus = 'accepted' WHERE AdoptId = '$adoptId'";

   
    if (mysqli_query($con, $query)) {
       
        echo "<script>alert('Adoption request accepted successfully.'); window.location.href = 'adoptionrequest.php';</script>";
    } else {
       
        echo "<script>alert('Error updating adoption request: " . mysqli_error($con) . "'); window.location.href = 'track.php';</script>";
    }

    
    mysqli_close($con);
} else {
   
    echo "<script>alert('No AdoptId provided.'); window.location.href = 'track.php';</script>";
}
?>
