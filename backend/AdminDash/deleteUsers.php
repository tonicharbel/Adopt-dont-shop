<?php

if (isset($_GET['userId'])) {
    
    $userId = intval($_GET['userId']); 


    include('../connection.php');
   
    $sql = "DELETE FROM users WHERE UserId = $userId  ";

    if ($con->query($sql) === TRUE) {
      
        header("Location: userslist.php");
        exit(); 
    } else {
        echo "Error deleting user: " . $con->error;
    }

    $con->close();
} else {
    echo "No userId provided in the URL.";
}
?>
