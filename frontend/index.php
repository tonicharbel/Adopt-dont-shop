<?php

include ("../backend/connection.php");

session_start();


if(isset($_SESSION['user_id'])) {
    
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adopt don't shop</title>
  <!-- Google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Link to Roboto font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Css styles -->
  <link rel="stylesheet" href="./css/home.css">
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

  <!-- Navbar -->
  <?php include("header.php"); ?>
 
  <div class="banner">
        <div>
            <h1>Love, Care for Your Pet</h1>
            <p>At our website, we aim to provide a loving home for pets in need. Whether you're looking to adopt a new furry friend or rehome your pet, we're here to help.</p>
        </div>
    </div>
 
    


<div class="adopt-rehome-section"> 
    <div class="container"> 
        <h2>Adopt or Rehome a Pet</h2>  
        <div class="row">  
            <div class="col-md-6"> 
                <div class="adoption-option"> 
                    <i class="fa fa-paw fa-4x"></i> 
                    <h3>Adopt a Pet</h3> 
                    <p>Find your new furry friend and give them a loving home.</p> 
                    <a href="petlist.php" class="btn btn-primary">Adopt Now</a> 
                </div> 
            </div> 
            <div class="col-md-6"> 
                <div class="adoption-option"> 
                    <i class="fa fa-home fa-4x"></i> 
                    <h3>Rehome Your Pet</h3> 
                    <p>If circumstances change, we can help find a new home for your pet.</p> 
                    <a href="rehomepet.php" class="btn btn-primary">Rehome Now</a> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
 
 
 
 
 
 
 
<div class="pets-section"> 
    <div class="container"> 
      <h2>Pets Ready for Adoption</h2> 
      <div class="row"> 
    <?php
    try {
        $select_petinfo = mysqli_query($con, "SELECT * FROM `animalslists`");

        
        for ($i = 0; $i < 4; $i++) {
            if ($fetch_petinfo = mysqli_fetch_assoc($select_petinfo)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card pet-card">
                        <img src="images/<?php echo $fetch_petinfo['AnimalImage']; ?>" class="card-img-top" alt="<?php echo $fetch_petinfo['AnimalName']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_petinfo['AnimalName']; ?></h5>
                            <p class="card-text"><?php //echo $fetch_petinfo['AnimalDescription']; ?></p>
                            <a href="#" class="btn btn-primary btn-center adopt-btn" data-bs-toggle="modal" data-bs-target="#petModal<?php echo $fetch_petinfo['AnimalId']; ?>">Adopt Me</a>
                        </div>
                    </div> 
                </div> 
                <?php
            } else {
                break;
            }
        }
    } catch (Exception $e) {
        
        header("Location: error.php");
        exit();
    }
    ?>
</div>

<?php
try {
    
    mysqli_data_seek($select_petinfo, 0);
    
    for ($i = 0; $i < 4; $i++) {
        if ($fetch_petinfo = mysqli_fetch_assoc($select_petinfo)) {
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
                            <a href="../backend/AdminDash/createAdoptReq.php?AnimalId=<?php echo $fetch_petinfo['AnimalId']; ?>&userId=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-primary">Adopt Now!</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            break;
        }
    }
} catch (Exception $e) {
    
    header("Location: error.php");
    exit();
}
?>

    </div>
</div>









    <div class="benefits-section">
    <div class="container">
        <h2>Benefits of Adopting from Us</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="benefit-item">
                    <i class="fa fa-heart fa-4x"></i>
                    <h3>Compassionate Care</h3>
                    <p>Our pets receive compassionate care from dedicated volunteers.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-item">
                    <i class="fa fa-paw fa-4x"></i>
                    <h3>Lifetime Support</h3>
                    <p>We provide lifetime support for you and your new furry friend.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-item">
                    <i class="fa fa-smile-o fa-4x"></i>
                    <h3>Happy Families</h3>
                    <p>Join our community of happy families who have adopted from us.</p>
                </div>
            </div>

           




        </div>
    </div>
</div>

    <!-- Footer -->
    <?php include("footer.php");?>

</body>
</html>

<?php mysqli_close($con); ?>
