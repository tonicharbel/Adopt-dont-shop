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
                    <a href="forgot.html" class="btn btn-primary">Adopt Now</a>
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
        <!-- Pet Listing Cards -->
        <div class="col-lg-3 col-md-6">
                <div class="card pet-card">
                    <img src="data:image/jpeg;base64,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" class="card-img-top" alt="Pet 1">
                    <div class="card-body">
                        <h5 class="card-title">Pet Name 1</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center">Adopt Me</a>
                    </div>
                </div>
            </div>
                 <!-- Pet Listing Cards -->
                 <div class="col-lg-3 col-md-6">
                <div class="card pet-card">
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIMYekocmLaU6IJGIC9CtRXOr5DQSC57LlYA&s"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card pet-card">
                 <img src="https://paradepets.com/.image/t_share/MTkxMzY1Nzg4Njc2NzI4NDE4/golden-retriever.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center">Adopt Me</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card pet-card">
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0gQnaMzL3UHAIbUCQi-DeExFsXLwH-N0MA&s"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center">Adopt Me</a>
                    </div>
                </div>
            </div>
        
    </div>
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



    
  <?php include("footer.php");?>

</body>
</html>
