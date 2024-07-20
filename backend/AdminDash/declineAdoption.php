<?php

include('../connection.php');


session_start();


if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

if (isset($_GET['AdoptId'])) {
    $adoptId = mysqli_real_escape_string($con, $_GET['AdoptId']);

    $query1 = "DELETE FROM adoptanimals WHERE AdoptId = '$adoptId'";
    mysqli_query($con, $query1);

    $query2 = "DELETE FROM adopts WHERE AdoptId = '$adoptId'";
    mysqli_query($con, $query2);

    mysqli_close($con);

    echo "<script>
            alert('Adoption request declined/deleted successfully.');
            window.location.href = 'adoptionrequest.php'; // Redirect to a desired page
          </script>";
          header("adoptionrequest.php");
} else {
    echo "<script>
            alert('No adoptId provided.');
            window.location.href = 'adoptionrequest.php'; 
          </script>";
          
}
?>
