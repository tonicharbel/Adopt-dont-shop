<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../../frontend/index.php");
    exit();
}


include('../connection.php');


$query = "SELECT adopts.*, adoptanimals.animalid
          FROM adopts
          JOIN adoptanimals ON adopts.adoptid = adoptanimals.adoptid
          WHERE adopts.AdoptStatus != 'rejected'";

$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) == 0) {
    include("sideBar.php");
    echo '<h2>There Are No  Adoption Pets request</h2>';
    
} else {

    include("sideBar.php");
?>

    <style>
       
        table {
            margin-top: 20px;
        }
        .status-pending {
            color: orange;
        }
        .status-approved {
            color: green;
        }
        .status-rejected {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Adoption Requests</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Adopt ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Animal ID</th>
                <th scope="col">Adopt Date</th>
                <th scope="col">Adopt Status</th>
                <th scope="col">Delivery</th>
                <th scope="col">Created At</th>
               
            </tr>
        </thead>
        <tbody id="adoption-requests">
        <?php
            
                while ($row = mysqli_fetch_assoc($result)) {
                   // print_r($row);
                ?>
        <tr>
          <td><?php echo $row['AdoptId']; ?></td>
          <td><?php echo $row['UserId']; ?></td>
          <td><?php echo $row['animalid']; ?></td>
          <td><?php echo $row['AdoptDate']; ?></td>
          <td><?php echo $row['AdoptStatus']; ?></td>
          <td><?php echo $row['Delivery']; ?></td>
          <td><?php echo $row['CreatedAt']; ?></td>
         
          <td class="btn-options">
            <a href="declinepet.php?animalId=<?php echo $row['AdoptId']; ?>" class="btn btn-primary">Detail</a>
            <a href="acceptPet.php?AnimalId=<?php echo $row['AdoptId'];?>" class="btn btn-success">Accept</a>
            <a href="declinepet.php?AnimalId=<?php echo $row['AdoptId'];?>"  class="btn btn-danger">Decline</a>
          </td>
        </tr>
       
    <?php  } 
    
    ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
<?php
}
?>
