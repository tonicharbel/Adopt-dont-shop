<?php
include("../backend/connection.php");

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Link to Roboto font -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Css styles -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Bootstrap script -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    th{
        width: 14%;
    }
  </style>
</head>
<body>
    
<?php include("header.php");?>

<header class="bg-custom-list text-white text-center py-1">
    <h1>Available Pets for Adoption</h1>
</header>

<div class="container mt-4">
    <form class="row" id="searchForm" method="post" action="petList.php">
        <div class="col-md-4 mb-2">
            <input type="text" class="form-control" id="searchInput" name="searchName" placeholder="Search by name...">
        </div>
        <div class="col-md-3 mb-3">
            <select class="form-control" id="categorySelect" name="category">
                <option value="">All</option>
                <option value="Cat">Cat</option>
                <option value="Dog">Dog</option>
            </select>
            
        </div>
        <div class="col-md-2 mb-3">
            <input type="number" class="form-control" id="minAgeInput" name="minAge" placeholder="Min Age">
        </div>
        <div class="col-md-2 mb-3">
            <input type="number" class="form-control" id="maxAgeInput" name="maxAge" placeholder="Max Age">
        </div>
        <div class="col-md-1 mb-3">
            <button type="submit" name="search" class="custom-btn" >Search</button>
        </div>
    </form>

</div>

<?php

    if(isset($_POST["search"])){
        
        $searchName = $_POST['searchName'];
        $category = $_POST['category'];
        $minAge = $_POST['minAge'];
        $maxAge = $_POST['maxAge'];


        if(isset($searchName) && !empty($searchName) || isset($category) && !empty($category) || isset($minAge) && !empty($minAge) || isset($maxAge) && !empty($maxAge)){

            $query = "SELECT * FROM animalslists, animalscategories, categories 
          WHERE animalslists.AnimalId = animalscategories.AnimalId 
          AND animalscategories.CategoryId = categories.CategoryId";


            if (!empty($searchName)) {
                $query .= " AND AnimalName LIKE '%$searchName%'";
            }

            if (!empty($category)) {
                $query.= " AND CategoryType = '$category'";
            }

            if (!empty($minAge)) {
                $query.= " AND AnimalAge >= '$minAge'";
            }

            if (!empty($maxAge)) {
                $query.= " AND AnimalAge <= '$maxAge'";
            }

        }else{
            $query = "SELECT * FROM `animalslists`";
        }
    }else{
        $query = "SELECT * FROM `animalslists`";
    }
?>


<div class="container">

<div class="row">
    <?php
    try {
        $select_petinfo = mysqli_query($con, $query);

        if (mysqli_num_rows($select_petinfo) > 0) {
            
            while ($fetch_petinfo = mysqli_fetch_assoc($select_petinfo)) {
                if($fetch_petinfo['Visible']==1){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card pet-card">
                        <img src="images/<?php echo $fetch_petinfo['AnimalImage']; ?>" class="card-img-top" alt="<?php echo $fetch_petinfo['AnimalName']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_petinfo['AnimalName']; ?></h5>
                            <p class="card-text"><?php // echo $fetch_petinfo['AnimalDescription']; ?></p>
                            <a href="../backend/AdminDash/createAdoptReq.php?AnimalId=<?php echo $fetch_petinfo['AnimalId']; ?>&userId=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary btn-center adopt-btn" data-bs-toggle="modal" data-bs-target="#petModal<?php echo $fetch_petinfo['AnimalId']; ?>">Adopt Me</a>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                    continue;
                }
            }
        } else {
            echo "<blockquote>No pets found.</blockquote><br><br><br><br><br><br><br><br><br><br>";
        }
    } catch (mysqli_sql_exception) {
        header("Location: error.php");
        exit(); 
    }
    ?>
</div>

<?php
try {
    $select_petinfo = mysqli_query($con, $query);
    
    if (mysqli_num_rows($select_petinfo) > 0) {
        while ($fetch_petinfo = mysqli_fetch_assoc($select_petinfo)) {
            ?>
            <!-- Modal -->
            <div class="modal fade" id="petModal<?php echo $fetch_petinfo['AnimalId']; ?>" tabindex="-1" aria-labelledby="petModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="petModalLabel"><?php echo $fetch_petinfo['AnimalName']; ?> Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="images/<?php echo $fetch_petinfo['AnimalImage']; ?>" class="rounded mx-auto d-block" alt="Pet Image">
                            <table>
                                <tr><th>Pet Name :&nbsp;</th><td><?php echo ($fetch_petinfo['AnimalName'])? $fetch_petinfo['AnimalName'] : "empty"; ?></td></tr>
                                <tr><th>Pet Age :&nbsp;</th><td><?php  echo ($fetch_petinfo['AnimalAge'])? $fetch_petinfo['AnimalAge'] : "empty"; ?></td></tr>
                                <tr><th>Gender :&nbsp;</th><td><?php echo ($fetch_petinfo['Gender'])? $fetch_petinfo['Gender'] : "empty"; ?></td></tr>
                                <tr><th>Vaccinated :&nbsp;</th><td><?php echo ($fetch_petinfo['Vaccinated'])? "Yes" : "No"; ?></td></tr>

                                <tr><th>Neutered :&nbsp;</th><td><?php echo ($fetch_petinfo['Neutered'])? "Yes" : "No"; ?></td></tr>
                                <tr></tr>
                                <tr><th width="10%" valign="top">Description :&nbsp;</th><td><?php echo ($fetch_petinfo['AnimalDescription'])? $fetch_petinfo['AnimalDescription'] : "empty"; ?></td></tr>
                                <tr><th>Disease :&nbsp;</th><td><?php echo ($fetch_petinfo['Disease'])? $fetch_petinfo['Disease'] : "empty"; ?></td></tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            <a href="../backend/AdminDash/createAdoptReq.php?AnimalId=<?php echo $fetch_petinfo['AnimalId']; ?>&userId=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary">Adopt Now!</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
} catch (mysqli_sql_exception) {
    header("Location: error.php");
    exit(); 
}
?>

</div>



<?php include("footer.php");?>

<?php


mysqli_close($con);

?>

</body>
</html>
