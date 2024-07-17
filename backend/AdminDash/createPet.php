<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileName = $_FILES["images"]["name"];
    $petName = mysqli_real_escape_string($con, $_POST['petName']);
    $petDescription = mysqli_real_escape_string($con, $_POST['petDescription']);
    $petAge = mysqli_real_escape_string($con, $_POST['petAge']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $vaccinated = mysqli_real_escape_string($con, $_POST['vaccine']);
    $neutered = isset($_POST['neutered']) ? 1 : 0;

if (isset($_FILES['petImage']) && $_FILES['petImage']['error'] == 0) {

    $imageTmpPath = $_FILES['petImage']['tmp_name'];
    $imageData = addslashes(file_get_contents($imageTmpPath)); 
} else {
    $imageData = null; 
}


    $query = "INSERT INTO animalslists (AnimalName, AnimalDescription, AnimalImage, AnimalAge, Disease, Gender, Vaccinated, Neutered) VALUES ('$petName', '$petDescription', '$imageData', '$petAge', '$disease', '$gender', '$vaccinated', '$neutered')";
    
    if (mysqli_query($con, $query)) {
        header("Location: petsList.php");
        exit();
    } else {
        echo "Error inserting pet: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
