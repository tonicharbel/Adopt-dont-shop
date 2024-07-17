<?php
session_start();

// Check if the user is logged in
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

// Include the database connection file
include('../connection.php');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if AnimalId is set in the URL
if (isset($_GET['AnimalId'])) {
    // Get the AnimalId from the URL and convert it to an integer
    $animalId = intval($_GET['AnimalId']);

    // Fetch animal details
    $queryAnimal = "SELECT AnimalId, AnimalName, AnimalDescription, isAvailable, AnimalImage, CreatedAt, AnimalAge, Disease, Gender, Vaccinated, Neutered FROM animalslists WHERE AnimalId = $animalId";
    $resultAnimal = mysqli_query($con, $queryAnimal);

    // Check if the query was successful and if there are any results
    if ($resultAnimal && mysqli_num_rows($resultAnimal) > 0) {
        $animalDetails = mysqli_fetch_assoc($resultAnimal);
    } else {
        echo "Animal details not found!";
        exit();
    }
} else {
    echo "No AnimalId provided in the URL.";
    exit();
}

// Include the sidebar if needed
include("sideBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Light grey */
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e6f7ff; /* Light blue */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Pet Details</h2>
    <div class="card mt-4">
        <div class="card-header">
            <h3>Pet Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Pet ID</th>
                    <td><?php echo htmlspecialchars($animalDetails['AnimalId']); ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($animalDetails['AnimalName']); ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo htmlspecialchars($animalDetails['AnimalDescription']); ?></td>
                </tr>
                <tr>
                    <th>Available</th>
                    <td><?php echo $animalDetails['isAvailable'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td><?php echo htmlspecialchars($animalDetails['CreatedAt']); ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?php echo htmlspecialchars($animalDetails['AnimalAge']); ?></td>
                </tr>
                <tr>
                    <th>Disease</th>
                    <td><?php echo htmlspecialchars($animalDetails['Disease']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo ucfirst(htmlspecialchars($animalDetails['Gender'])); ?></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td><?php echo $animalDetails['Vaccinated'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <tr>
                    <th>Neutered</th>
                    <td><?php echo $animalDetails['Neutered'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <?php if ($animalDetails['AnimalImage']) { ?>
                <tr>
                    <th>Image</th>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($animalDetails['AnimalImage']); ?>" alt="Pet Image" class="img-fluid"></td>
                </tr>
                <?php } ?>
             
                   
            </table>
            <a href="acceptPet.php?AnimalId=<?php echo $row['AnimalId'];?>" class="btn btn-success">Accept</a>
            <a href="declinepet.php?AnimalId=<?php echo $row['AnimalId'];?>"  class="btn btn-danger">Decline</a>
                
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
