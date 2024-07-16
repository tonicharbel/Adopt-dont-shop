<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animalId = intval($_POST['AnimalId']);
    $animalName = mysqli_real_escape_string($con, $_POST['AnimalName']);
    $animalDescription = mysqli_real_escape_string($con, $_POST['AnimalDescription']);
    $animalAge = mysqli_real_escape_string($con, $_POST['AnimalAge']);
    $disease = mysqli_real_escape_string($con, $_POST['Disease']);
    $gender = mysqli_real_escape_string($con, $_POST['Gender']);
    $vaccinated = mysqli_real_escape_string($con, $_POST['Vaccinated']);
    $neutered = isset($_POST['Neutered']) ? 1 : 0;

    // If an image is uploaded, handle the image upload
    if (isset($_FILES['AnimalImage']) && $_FILES['AnimalImage']['error'] == 0) {
        $imageTmpPath = $_FILES['AnimalImage']['tmp_name'];
        $imageData = addslashes(file_get_contents($imageTmpPath));
        $query = "UPDATE animalslists SET 
            AnimalName = '$animalName', 
            AnimalDescription = '$animalDescription', 
            AnimalAge = '$animalAge', 
            Disease = '$disease', 
            Gender = '$gender', 
            Vaccinated = '$vaccinated', 
            Neutered = '$neutered', 
            AnimalImage = '$imageData' 
            WHERE AnimalId = $animalId";
    } else {
        $query = "UPDATE animalslists SET 
            AnimalName = '$animalName', 
            AnimalDescription = '$animalDescription', 
            AnimalAge = '$animalAge', 
            Disease = '$disease', 
            Gender = '$gender', 
            Vaccinated = '$vaccinated', 
            Neutered = '$neutered' 
            WHERE AnimalId = $animalId";
    }

    if (mysqli_query($con, $query)) {
        header("Location: petsList.php");
        exit();
    } else {
        echo "Error updating animal: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
