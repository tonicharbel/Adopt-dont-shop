<?php

include '../backend/connection.php';

session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    try {
        $query = "SELECT * FROM users WHERE UserEmail = '$email'";
        $result = mysqli_query($con, $query);
				
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['UserPassword'];
            
            if(password_verify($password, $hashed_password)){
                
                $_SESSION['user_id'] = $row['UserId'];
                $_SESSION['user_email'] = $row['UserEmail'];
                $_SESSION["user_name"] = $row['UserFirstName'].' '.$row['UserLastName'];
                $_SESSION['isloggedin']=1;

								if($row['GroupId'] == 0){
									header("Location: index.php");
                  exit();
								}
								else{
									
									header("Location: ../../../backend/AdminDash/UsersList.php");
                  exit();
								}
            }
            else{
								$_SESSION['alert_message'] = 'Incorrect password';
								$_SESSION['alert_type'] = 'danger';
																
								header("Location: logIn.php");
								exit();
            }
        }
        else{
						
						$_SESSION['alert_message'] = 'User not found';
						$_SESSION['alert_type'] = 'danger';
						
						header("Location: logIn.php");
						exit();
        }
    } catch (mysqli_sql_exception) {
        
				header("Location:../frontend/error.php");
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
  <link rel="stylesheet" href="./css/logIn.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Bootstrap script -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="my-login-page">
		<?php
		
    if (isset($_SESSION['alert_message'])) {
	    $alert_message = $_SESSION['alert_message'];
	    $alert_type = isset($_SESSION['alert_type']) ? $_SESSION['alert_type'] : 'info';

	    echo "<div class='alert alert-$alert_type' style='margin-bottom:-0.05px;'>$alert_message</div>";
	    
	    unset($_SESSION['alert_message']);
	    unset($_SESSION['alert_type']);
    }
		?>
	<section class="h-100" style="width: 100%; background-color: rgba(0,0,0,0.5);">

		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="" action="logIn.php">
								<div class="form-group">
									<label for="email" style="font-weight: bold; margin-bottom: 1%;">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus style="border-radius: 10px; color: #333;" placeholder="Your Email Address">
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div><br>

								<div class="form-group">
									<label for="password" style="font-weight: bold; margin-bottom: 1%;">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye style="border-radius: 10px; margin-bottom: 1%; color: #333;" placeholder="Your Password">
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
										<a href="forgot.html" class="float-right" style="margin-left: 63%; font-weight: bold;">
											Forgot Password?
										</a>
								</div><br>

								<div class="form-group">
									<div class="custom-checkbox custom-control" style="display: flex;">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input checkbox" required>
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div><br>

								<div class="form-group m-0">
									<button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 100%; font-weight: bold;">
										LOGIN
									</button>
								</div>
								<div class="mt-4 text-center" style="color: white;">
									Don't have an account? <a href="register.php" style="font-weight: bold;">Create One</a>
								</div>
								<div class="mt-4 text-center" style="color: white;">Back to <a href="index.php">Home</a></div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
  
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>

</body>
</html>

<?php mysqli_close($con); ?>