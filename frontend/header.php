<nav class="navbar navbar-expand-lg custom-bg-color"> 
  <div class="container-fluid"> 
    <a class="navbar-brand" href="#">Adopt Don't Shop</a> 
    <button class="navbar-toggler custom-navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a> 
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="petlist.php">Browse Available Animals</a></li>
            <li><a class="dropdown-item" href="rehomepet.php">Rehome Your Pet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Your Selected Companion</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="about.php" aria-disabled="true">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contact.php" aria-disabled="true">Contact Us</a>
        </li>
        
      </ul>
      
      <!-- Login/SignUp icon -->
      <div class="d-flex">
      <?php
            if(!isset($_SESSION['user_id'])){
              echo '<a class="nav-link" href="login.php">';
              echo'<button type="button" class="btn btn-primary" style="margin-right:15px;">Log In</button>';
              echo'</a>';
            }else{

              ?>
              <div class="btn-group">
              <i class="bi bi-person-circle " style="color:white; font-size:30px; margin-right:15px;" data-bs-toggle="dropdown" aria-expanded="false"></i>
              
              <ul class="dropdown-menu dropdown-menu-end" style="max-height: 400px; overflow-y: auto; overflow-x: auto; width: 300px;">
              <li><div class="dropdown-item" ><i class="bi bi-person-circle " style="font-size:50px; margin-right:15px; margin-left:40%;"></i></div></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" aria-readonly></a></li>
              <li><div class="dropdown-item" style="text-align: center;"><?php echo $_SESSION['user_name']; ?></div></li>
              <li><div class="dropdown-item" style="text-align: center;"><?php echo $_SESSION['user_email']; ?></div></li>
              <li><a class="dropdown-item" href="#" aria-readonly></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="track.php" style="text-align: center;">Track My Adoption Request</a></li>
        <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php" style="color: #EA0101; text-align: center;"><i class="bi bi-box-arrow-right" style="margin-right:5px;"></i>Log out</a></li>
              </ul>
              </div>

              <?php
              
            } 
            ?>
      </div>
      
    </div>
  </div>
</nav> 
