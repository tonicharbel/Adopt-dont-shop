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
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Add New User</h2>
    <form action="createUsers.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="UserFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="UserFirstName" name="UserFirstName" required>
        </div>
        <div class="mb-3">
            <label for="UserLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="UserLastName" name="UserLastName" required>
        </div>
        <div class="mb-3">
            <label for="UserEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="UserEmail" name="UserEmail" required>
        </div>
        <div class="mb-3">
            <label for="UserPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="UserPassword" name="UserPassword" required>
        </div>
        <div class="mb-3">
            <label for="UserCity" class="form-label">City</label>
            <input type="text" class="form-control" id="UserCity" name="UserCity" required>
        </div>
        <div class="mb-3">
            <label for="UserCountry" class="form-label">Country</label>
            <input type="text" class="form-control" id="UserCountry" name="UserCountry" required>
        </div>
        <div class="mb-3">
            <label for="UserZipCode" class="form-label">Zip Code</label>
            <input type="text" class="form-control" id="UserZipCode" name="UserZipCode" required>
        </div>
        <div class="mb-3">
            <label for="UserPhone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="UserPhone" name="UserPhone" required>
        </div>
        <div class="mb-3">
            <label for="GroupId" class="form-label">Group ID</label>
            <input type="text" class="form-control" id="GroupId" name="GroupId" required>
        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
