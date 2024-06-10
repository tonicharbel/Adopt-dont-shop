<?php
session_start();
$_SESSION['isLoggedin']=1;
// Check if the user is logged in
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] != 1) {
    header("Location: index.php");
    exit();
}


require_once 'connection.php';


$query = "SELECT * FROM animalslists WHERE Visible = 1";
$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) == 0) {
    include("sideBar.php");
    echo '<h2>There Are No  Available Pets for Adoption</h2>
    <button class="btn btn-primary" onclick=" ">Add New Pets</button>';
    
} else {

    include("sideBar.php");
?>
<h2>Pet List</h2>
<div class="container">
    <div class="row">
    
        <div class="col-lg-9"> 
            <div class="row">
                <?php
                // fetching for each pet and display the  details
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
               <div class="col-lg-4 col-md-6 col-sm-12 mb-4"> 
    <div class="card pet-card">
        <img src="images/<?php echo $row['AnimalImage']; ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="Pet Image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['AnimalName']; ?></h5>
            <p class="card-text"><?php echo $row['AnimalDescription']; ?></p>
            <a href="editpet.php?AnimalId=<?php echo $row['AnimalId']; ?>" class="btn btn-warning btn-center adopt-btn">Edit</a>
            <a href="declinePet.php?AnimalId=<?php echo $row['AnimalId']; ?>&src=petlist" class="btn btn-danger btn-center adopt-btn">Delete</a>
        </div>
    </div>
</div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
