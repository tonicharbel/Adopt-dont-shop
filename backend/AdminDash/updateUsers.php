<?php
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['UserId']);
    $userFirstName = mysqli_real_escape_string($con, $_POST['UserFirstName']);
    $userLastName = mysqli_real_escape_string($con, $_POST['UserLastName']);
    $userEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $userPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $userCity = mysqli_real_escape_string($con, $_POST['UserCity']);
    $userCountry = mysqli_real_escape_string($con, $_POST['UserCountry']);
    $userZipCode = mysqli_real_escape_string($con, $_POST['UserZipCode']);
    $userPhone = mysqli_real_escape_string($con, $_POST['UserPhone']);
    $groupId = mysqli_real_escape_string($con, $_POST['GroupId']);

    $query = "UPDATE users SET 
        UserFirstName = '$userFirstName', 
        UserLastName = '$userLastName', 
        UserEmail = '$userEmail', 
        UserPassword = '$userPassword', 
        UserCity = '$userCity', 
        UserCountry = '$userCountry', 
        UserZipCode = '$userZipCode', 
        UserPhone = '$userPhone', 
        GroupId = '$groupId' 
        WHERE UserId = $userId";

    if (mysqli_query($con, $query)) {
        header("Location: userslist.php");
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
