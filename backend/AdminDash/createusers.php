<?php
session_start();
// Error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['UserFirstName']) || !isset($_POST['UserLastName']) || !isset($_POST['UserEmail'])|| !isset($_POST['UserPassword'])|| !isset($_POST['UserEmail'])|| !isset($_POST['UserCity'])|| !isset($_POST['UserCountry'])|| !isset($_POST['UserZipCode'])|| !isset($_POST['UserPhone'])|| !isset($_POST['GroupId'])|| !isset($_POST['UserAddress'])) {
        echo "Missing required fields.";
        exit();
    }
    $userFirstName = mysqli_real_escape_string($con, $_POST['UserFirstName']);
    $userLastName = mysqli_real_escape_string($con, $_POST['UserLastName']);
    $userEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $userPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $userAddress = mysqli_real_escape_string($con, $_POST['UserAddress']);
    $userCity = mysqli_real_escape_string($con, $_POST['UserCity']);
    $userCountry = mysqli_real_escape_string($con, $_POST['UserCountry']);
    $userZipCode = mysqli_real_escape_string($con, $_POST['UserZipCode']);
    $userPhone = mysqli_real_escape_string($con, $_POST['UserPhone']);
    $groupId = mysqli_real_escape_string($con, $_POST['GroupId']);

    $query = "INSERT INTO users (UserFirstName, UserLastName, UserEmail, UserPassword,UserAddress, UserCity, UserCountry, UserZipCode, UserPhone, GroupId) VALUES ('$userFirstName', '$userLastName', '$userEmail', '$userPassword','$userAddress', '$userCity', '$userCountry', '$userZipCode', '$userPhone', '$groupId')";

    if (mysqli_query($con, $query)) {
        header("Location: userslist.php");
        exit();
    } else {
        echo "Error inserting user: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
