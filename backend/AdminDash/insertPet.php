<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}
include("sideBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Submission Form</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Pet Submission Form</h2>
    <form action="createpet.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="petName" class="form-label">Pet Name</label>
            <input type="text" class="form-control" id="petName" name = "petName" placeholder="Enter pet Name"required>
        </div>
        <div class="mb-3">
            <label for="petType" class="form-label">Pet Type With Breed</label>
            <input type="text" class="form-control" id="petType" name = "petType"placeholder="Enter pet Type"required>
        </div>
        <div class="mb-3">
            <label for="petAge" class="form-label">Pet Age</label>
            <input type="text" class="form-control" id="petAge" name = "petAge" placeholder="Enter pet Age"required>
        </div>
        <div class="mb-3">
            <label for="disease" class="form-label">Any Disease? If Yes, Specify</label>
            <input type="text" class="form-control" id="disease" placeholder="Enter disease if any"required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male"required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"required>
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Vaccinated</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="vaccine" id="vacc" value="vaccinated"required>
                <label class="form-check-label" for="vacc" >Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="vaccine" id="notvacc" value="notvaccinated"required>
                <label class="form-check-label" for="notvacc">No</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Neutered</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="neutered" value="neutered">
                <label class="form-check-label" for="neutered">Yes</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="petDescription" class="form-label">Description</label>
            <textarea class="form-control" id="petDescription" name = "petDescription" rows="3" placeholder="Enter pet description"required></textarea>
        </div>
        <div class="mb-3">
            <label for="petImage" class="form-label">Upload Image</label>
            <input type="file" class="form-control-file" id="petImage">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
