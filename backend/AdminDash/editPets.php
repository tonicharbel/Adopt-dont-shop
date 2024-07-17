<?php
session_start();

if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
} else {
    include('../connection.php');

    if (isset($_GET['AnimalId'])) {
        $animalId = intval($_GET['AnimalId']);

        $query = "SELECT * FROM animalslists WHERE AnimalId = $animalId";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $animal = mysqli_fetch_assoc($result);
        } else {
            echo "Animal not found!";
            exit();
        }
    } else {
        echo "No AnimalId provided in the URL.";
        exit();
    }

    include("sideBar.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Animal Information</h2>
    <form action="updatePets.php" method="post" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="AnimalId" value="<?php echo $animal['AnimalId']; ?>">
        <div class="mb-3">
            <label for="AnimalName" class="form-label">Animal Name</label>
            <input type="text" class="form-control" id="AnimalName" name="AnimalName" value="<?php echo $animal['AnimalName']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="AnimalDescription" class="form-label">Description</label>
            <textarea class="form-control" id="AnimalDescription" name="AnimalDescription" rows="3" required><?php echo $animal['AnimalDescription']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="AnimalAge" class="form-label">Age</label>
            <input type="text" class="form-control" id="AnimalAge" name="AnimalAge" value="<?php echo $animal['AnimalAge']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Disease" class="form-label">Disease</label>
            <input type="text" class="form-control" id="Disease" name="Disease" value="<?php echo $animal['Disease']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Gender" id="male" value="male" <?php echo ($animal['Gender'] == 'male') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Gender" id="female" value="female" <?php echo ($animal['Gender'] == 'female') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Vaccinated</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Vaccinated" id="vacc" value="1" <?php echo ($animal['Vaccinated'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="vacc">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Vaccinated" id="notvacc" value="0" <?php echo ($animal['Vaccinated'] == 0) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="notvacc">No</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Neutered</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="Neutered" name="Neutered" value="1" <?php echo ($animal['Neutered'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="Neutered">Yes</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="AnimalImage" class="form-label">Upload Image</label>
            <input type="file" class="form-control-file" id="AnimalImage" name="AnimalImage">
        </div>
        <button type="submit" class="btn btn-primary">Update Animal</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
