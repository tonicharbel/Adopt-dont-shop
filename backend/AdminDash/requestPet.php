<?php
session_start();


if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}


include('../connection.php');


$query = "SELECT * FROM animalslists WHERE Visible = 0";

$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) == 0) {
   
    include("sideBar.php");
    echo '<h2>There Are No Pets Requests</h2>
    <a href="insertpet.php" class="btn btn-primary" >Add New Pets</a>';
} else {
    
    include("sideBar.php");
?>


  <style>
   
    @media (max-width: 768px) {
      .table-responsive {
        overflow-x: auto;
      }
    }

    .btn-options {
      display: flex;
      justify-content: space-between;
    }

    .btn-options button {
      flex-grow: 1;
      margin-right: 5px;
    }
  </style>

<div class="container mt-5">
  <h2>Requested Pets to Approve</h2>
  <a href="insertpet.php"class="btn btn-primary">Insert Pet</a>
  <div class="table-responsive">
    <table class="table table-bordered mt-3 text-center">
      <thead>
        <tr>
          <th>Animal Name</th>
          <th>Description</th>
          <th>Options</th>
        </tr>
      </thead>
      
      <tbody>
        <!--  dynamic data from my database -->
        <?php
                
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <tr>
          <td><?php echo $row['AnimalName']; ?></td>
          <td><?php echo $row['AnimalDescription']; ?></td>
          <td class="btn-options">
            <a href="detailpet.php?AnimalId=<?php echo $row['AnimalId']; ?>" class="btn btn-primary">Detail</a>
            <a href="acceptPet.php?AnimalId=<?php echo $row['AnimalId'];?>" class="btn btn-success">Accept</a>
            <a href="declinepet.php?AnimalId=<?php echo $row['AnimalId'];?>"  class="btn btn-danger">Decline</a>
          </td>
        </tr>
       
    <?php  } 
    
    ?>
        <!-- End of  data -->
      </tbody>
    </table>
  </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>