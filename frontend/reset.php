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
    <section class="h-100" style="width: 100%; background-color: rgba(0,0,0,0.5);">
      <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
          <div class="card-wrapper" style="margin-top: -10%;">

            <div class="card fat">
              <div class="card-body">
                <h4 class="card-title">Reset Password</h4>
                <form method="POST" class="my-login-validation" novalidate="" action="update_password.php">
                  <div class="form-group">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <label for="new-password" style="font-weight: bold; margin-bottom: 1%;">New Password</label>
                    <input id="new-password" type="password" class="form-control" name="password" required autofocus data-eye style="border-radius: 10px; color: #333;" placeholder="Your New Password">
                    <div class="invalid-feedback">
                      Password is required
                    </div>
                    <div class="form-text text-muted" style="color: white !important; margin-top: 2%; margin-bottom: 3%;">
                      Make sure your password is strong and easy to remember
                    </div>
                  </div>
  
                  <div class="form-group m-0">
                    <button type="submit" class="btn btn-primary btn-block" style="width: 100%; font-weight: bold;">
                      Reset Password
                    </button>
                  </div>
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
