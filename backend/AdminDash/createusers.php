<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: index.php");
    exit();
}

include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userFirstName = mysqli_real_escape_string($con, $_POST['UserFirstName']);
    $userLastName = mysqli_real_escape_string($con, $_POST['UserLastName']);
    $userEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $userPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $userCity = mysqli_real_escape_string($con, $_POST['UserCity']);
    $userCountry = mysqli_real_escape_string($con, $_POST['UserCountry']);
    $userZipCode = mysqli_real_escape_string($con, $_POST['UserZipCode']);
    $userPhone = mysqli_real_escape_string($con, $_POST['UserPhone']);
    $groupId = mysqli_real_escape_string($con, $_POST['GroupId']);

    $query = "INSERT INTO users (UserFirstName, UserLastName, UserEmail, UserPassword, UserCity, UserCountry, UserZipCode, UserPhone, GroupId) VALUES ('$userFirstName', '$userLastName', '$userEmail', '$userPassword', '$userCity', '$userCountry', '$userZipCode', '$userPhone', '$groupId')";

    if (mysqli_query($con, $query)) {
        header("Location: userslist.php");
        exit();
    } else {
        echo "Error inserting user: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
