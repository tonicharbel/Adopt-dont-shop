<?php
session_start();

if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['AdoptId'])) {

    $adoptId = intval($_GET['AdoptId']);
    $queryAdopt = "SELECT AdoptId, AdoptStatus, Delivery, CreatedAt, UserId FROM adopts WHERE AdoptId = $adoptId";
    $resultAdopt = mysqli_query($con, $queryAdopt);

    if ($resultAdopt && mysqli_num_rows($resultAdopt) > 0) {
        $adoptDetails = mysqli_fetch_assoc($resultAdopt);
        $userId = $adoptDetails['UserId'];
        $queryUser = "SELECT UserFirstName, UserLastName, UserEmail, UserCity, UserCountry, UserZipCode, UserPhone FROM users WHERE UserId = $userId";
        $resultUser = mysqli_query($con, $queryUser);
        $userDetails = mysqli_fetch_assoc($resultUser);

        $queryAnimalId = "SELECT AnimalId FROM adoptanimals WHERE AdoptId = $adoptId";
        $resultAnimalId = mysqli_query($con, $queryAnimalId);
        if ($resultAnimalId && mysqli_num_rows($resultAnimalId) > 0) {
            $animalId = mysqli_fetch_assoc($resultAnimalId)['AnimalId'];

            $queryAnimal = "SELECT AnimalName, AnimalDescription, AnimalImage, AnimalAge, Disease, Gender, Vaccinated, Neutered FROM animalslists WHERE AnimalId = $animalId";
            $resultAnimal = mysqli_query($con, $queryAnimal);
            $animalDetails = mysqli_fetch_assoc($resultAnimal);

            $adoptDetails = array_merge($adoptDetails, $userDetails, $animalDetails);
        } else {
            echo "Animal details not found!";
            exit();
        }
    } else {
        echo "Details not found!";
        exit();
    }
} else {
    echo "No AdoptId provided in the URL.";
    exit();
}

include("sideBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Details</title>
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
    <h2 class="text-center">Adopt Details</h2>
    <div class="card mt-4">
        <div class="card-header">
            <h3>Pet Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($adoptDetails['AnimalName']); ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo htmlspecialchars($adoptDetails['AnimalDescription']); ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?php echo htmlspecialchars($adoptDetails['AnimalAge']); ?></td>
                </tr>
                <tr>
                    <th>Disease</th>
                    <td><?php echo htmlspecialchars($adoptDetails['Disease']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo ucfirst(htmlspecialchars($adoptDetails['Gender'])); ?></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td><?php echo $adoptDetails['Vaccinated'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <tr>
                    <th>Neutered</th>
                    <td><?php echo $adoptDetails['Neutered'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <?php if ($adoptDetails['AnimalImage']) { ?>
                <tr>
                    <th>Image</th>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($adoptDetails['AnimalImage']); ?>" alt="Pet Image" class="img-fluid"></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>User Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>First Name</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserFirstName']); ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserLastName']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserEmail']); ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserCity']); ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserCountry']); ?></td>
                </tr>
                <tr>
                    <th>Zip Code</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserZipCode']); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo htmlspecialchars($adoptDetails['UserPhone']); ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Adopt Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Adopt Status</th>
                    <td><?php echo ucfirst(htmlspecialchars($adoptDetails['AdoptStatus'])); ?></td>
                </tr>
                <tr>
                    <th>Delivery</th>
                    <td><?php echo $adoptDetails['Delivery'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td><?php echo htmlspecialchars($adoptDetails['CreatedAt']); ?></td>
                </tr>
            </table>

        </div>
       
    </div>
    <br>
    <a href="acceptAdoption.php?AdoptId=<?php echo $_GET['AdoptId'];?>" class="btn btn-success">Accept</a>
    <a href="declineAdoption.php?AdoptId=<?php echo $_GET['AdoptId'];?>"  class="btn btn-danger">Decline</a>
<br>
<br>
<br>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

mysqli_close($con);
?>
