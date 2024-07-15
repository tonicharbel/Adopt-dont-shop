<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: #00007B; 
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #00005B; 
}

.sidebar a:hover:not(.active) {
  background-color: #00006B;
}

div.content {
  
  margin-left: 270px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.profile-container {
            display: flex;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }
        .profile-container img {
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50px;
        }
        .profile-container h4 {
            color: white;
            margin-left: 10px; /* Adjust spacing between image and text */
        }
        .horizontal-line {
            border-top: 2px solid white;
            margin-top: 20px;
        }
</style>
</head>
<body>

<?php
// Get the current file name
$current_file = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
<div style="height:3%;"></div>
<div class="container mt-3">
        <div class="profile-container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0qOHX_y9WtYm5XU7RLbLBF74PAmzKe22WkQ&s" alt="Profile Picture">
            <h4><?php echo($_SESSION['user_name']) ?  $_SESSION['user_name'] : 'Admin'; ?></h4>
        </div>
        <hr class="horizontal-line">
    </div>

  
  <a class="<?= $current_file == 'userslist.php' ? 'active' : '' ?>" href="userslist.php">Users List</a>
  <a class="<?= $current_file == 'petslist.php' ? 'active' : '' ?>" href="petslist.php">Pets List</a>
  <a class="<?= $current_file == 'requestpet.php' ? 'active' : '' ?>" href="requestpet.php">Pets Request List</a>
  <a class="<?= $current_file == 'adoptionrequest.php' ? 'active' : '' ?>" href="adoptionrequest.php">Adoptions Pets Request </a>
  <a class="<?= $current_file == 'about.php' ? 'active' : '' ?>" href="about.php">About</a>
</div>

<div class="content">
  <!-- Content goes here -->
  <div style="height:3%;"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
