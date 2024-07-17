<?php

include '../backend/connection.php';

session_start();

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pnb = mysqli_real_escape_string($con, $_POST['phone']);
    $msg = mysqli_real_escape_string($con, $_POST['message']);
    $id = mysqli_real_escape_string($con, $_SESSION['user_id']);

    try {
        
        $insert = mysqli_query($con, "INSERT INTO contactus (	UserId, Message, PhoneNumber, Email, UserName) VALUES ('$id', '$msg', '$pnb', '$email' ,'$username')");
        
        $_SESSION['alert_message'] = 'message has sent';
        $_SESSION['alert_type'] = 'success';
        
        header("Location: contact.php");
        exit();
    } catch (mysqli_sql_exception) {
      
      header("Location: error.php");
      exit();
    }
  }
  
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page </title>
    
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
    

    <link rel="stylesheet" href="css/contact.css" />

    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>

  </head>
  </head>
  <body style="background-color: #fafafa;">

  <?php
    if (isset($_SESSION['alert_message'])) {
	    $alert_message = $_SESSION['alert_message'];
	    $alert_type = isset($_SESSION['alert_type']) ? $_SESSION['alert_type'] : 'info';

	    echo "<div class='alert alert-$alert_type' style='margin-bottom:-0.05px;'>$alert_message</div>";

	    unset($_SESSION['alert_message']);
	    unset($_SESSION['alert_type']);
    }
		?>
    
    <!-- Navbar--> 
    <?php include("header.php"); ?>
    
    <div class="space" style="margin-top: 8%;"></div>
    <div class="container_" style="position: static;">
      <!-- <span class="big-circle"></span> -->
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Fill up the form and our team will get back to you within 24 hours
          </p>

          <div class="info">
            <div class="information">
                <i class="fa fa-phone"></i>
              <a href="tel:+96100000000">+961 00 000000</a>
            </div>
            <div class="information">
                <i class="fa fa-envelope"></i>
              <a href="mailto:email@gmail.com">email@gmail.com</a>
            </div>
            <div class="information">
                <i class="fa fa-globe"></i>
              <a href="#">site.com</a>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fa fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form class="forms" action="contact.php" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" placeholder="Username" required />
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" placeholder="Email" required />
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" placeholder="Phone Number" required />
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input" placeholder="Message" required ></textarea>
            </div>
            <input type="submit" name="submit" value="Send" class="btn_" />
          </form>
        </div>
      </div>
    </div>
    <div class="space" style="margin-top: 8%;"></div>


    <!-- Footer -->
    <?php include("footer.php");?>

  </body>
</html>