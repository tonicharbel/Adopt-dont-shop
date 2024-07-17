<?php

include '../backend/connection.php';

session_start();

if(isset($_POST['submit'])){
  if($_POST['password'] === $_POST['cpassword']){
    $firstname = mysqli_real_escape_string($con, $_POST['fname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $pnb = mysqli_real_escape_string($con, $_POST['pnb']);
    $zcode = mysqli_real_escape_string($con, $_POST['zcode']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $country = mysqli_real_escape_string($con, $_POST['option1']);
    $city = mysqli_real_escape_string($con, $_POST['option2']);

    try {
      $select = mysqli_query($con, "SELECT * FROM users where UserEmail = '$email'");

      if(mysqli_num_rows($select) == 1){
        
        $_SESSION['alert_message'] = 'User already exists!';
        $_SESSION['alert_type'] = 'danger';
        
        header("Location: register.php");
        exit();
      }
      else{
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $insert = mysqli_query($con, "INSERT INTO users (UserFirstName, UserLastName, UserEmail, UserPassword, UserAddress, UserCity, UserCountry, UserZipCode, UserPhone) VALUES ('$firstname' ,'$lastname','$email' ,'$hashed_password' ,'$address' ,'$city' ,'$country' ,'$zcode' ,'$pnb')");
        
        $_SESSION['alert_message'] = 'Signup successful';
        $_SESSION['alert_type'] = 'success';
        
        header("Location: logIn.php");
        exit();
      }
    } catch (mysqli_sql_exception) {
        
        header("Location: error.php");
        exit();
    }
  }
  else{
    $_SESSION['alert_message'] = 'Passwords do not match!';
    $_SESSION['alert_type'] = 'danger';
    
    header("Location: register.php");
    exit();
  }
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
  <link rel="stylesheet" href="./css/register.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Bootstrap script -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="form-bg">
    <?php
    if (isset($_SESSION['alert_message'])) {
	    $alert_message = $_SESSION['alert_message'];
	    $alert_type = isset($_SESSION['alert_type']) ? $_SESSION['alert_type'] : 'info'; 
	    
	    echo "<div class='alert alert-$alert_type' style='margin-bottom:-0.05px;'>$alert_message</div>";
        
	    unset($_SESSION['alert_message']);
	    unset($_SESSION['alert_type']);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-8">
                <div class="form-container">
                    <h3 class="title">Register</h3>
                    <form method="POST" class="form-horizontal my-login-validation" novalidate="" action="register.php">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="fname" required autofocus>
                            <div class="invalid-feedback">
                                Enter Your First Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name"  name="lname" required autofocus>
                            <div class="invalid-feedback">
                                Enter Your Last Name
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Address" name="email" required autofocus> 
                            <div class="invalid-feedback" >
                                Email is invalid
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required data-eye>
                            <div class="invalid-feedback">
                                Password is required
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required data-eye>
                            <div class="invalid-feedback">
                                Password is required
                            </div>
                        </div>

                        <h4 class="sub-title">Personal Information</h4>
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="text" class="form-control" placeholder="Phone Number" name="pnb" required autofocus>
                            <div class="invalid-feedback">
                                Enter Your Zip Code
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" class="form-control" placeholder="Zip Code" name="zcode" required autofocus>
                            <div class="invalid-feedback">
                                Enter Your Zip Code
                            </div>
                        </div>

                        <div class="form-group"> <!-- style="width: 100%;" -->
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address" required autofocus>
                            <div class="invalid-feedback" >
                                Enter Your Address
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Country</label>
                            <select class="form-control" name="option1" id="option1">
                                <option value="france">France</option>
                                <option value="america">America</option>
                                <option value="lebanon">Lebanon</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="option2" id="option2">
                                <option value="paris">Paris</option>
                                <option value="new york">New York</option>
                                <option value="beirut">Beirut</option>
                            </select>
                        </div>

                        
                        <div class="check-terms">
                            <input type="checkbox" class="checkbox" required>
                            <span class="check-label">I agree to the terms</span>
                            <div class="invalid-feedback" >
                                Please agree to the terms and conditions
                            </div>
                        </div>
                        
                        
                        <span class="signin-link" style="display: inline !important; margin-left: 1%; margin-right: 22%;">Already have an account? Click here to <a href="logIn.php">Login</a></span>
                        <button type="submit" class="btn signup" name="submit">Create Account</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/my-login.js"></script>

</body>
</html>

<?php mysqli_close($con); ?>