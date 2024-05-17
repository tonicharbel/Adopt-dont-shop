<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Link to Roboto font -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Css styles -->
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
    
<?php include("header.php");?>

<header class="bg-custom-list text-white text-center py-1">
    <h1>Available Pets for Adoption</h1>
</header>

<div class="container mt-4">
    <form class="row" id="searchForm">
        <div class="col-md-4 mb-2">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name...">
        </div>
        <div class="col-md-3 mb-3">
            <select class="form-control" id="categorySelect">
                <option value="">All</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <input type="number" class="form-control" id="minAgeInput" placeholder="Min Age">
        </div>
        <div class="col-md-2 mb-3">
            <input type="number" class="form-control" id="maxAgeInput" placeholder="Max Age">
        </div>
        <div class="col-md-1 mb-3">
            <button type="button" class="custom-btn" onclick="searchPets()">Search</button>
        </div>
    </form>

    <ul class="list-unstyled" id="searchResults">
        <!-- Search results will be displayed here -->
    </ul>
</div>

<script>
    function searchPets() {
        // Implement search functionality here
        // You can use JavaScript to fetch data from a backend API and populate the search results
        // For now, let's just display a message
        document.getElementById('searchResults').innerHTML = '<li>No pets found.</li>';
    }
</script>

<div class="container">
       
        <div class="row">
            <!-- Pet Listing Cards -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card" >
                    <img src="images/cat1.jpg" class="card-img-top" alt="Pet 1">
                    <div class="card-body">
                        <h5 class="card-title">Pet Name 1</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                    <img src="images/cat0.jpg" class="card-img-top" alt="Pet 2">
                    <div class="card-body">
                        <h5 class="card-title">Pet Name 2</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                    <img src="images/dog1.jpg" class="card-img-top" alt="Pet 2">
                    <div class="card-body">
                        <h5 class="card-title">Pet Name 3</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images/dog2jpg.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\dog3jpg.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\orangecat.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\cat3.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\cat4.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\golden-retriever.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card pet-card">
                 <img src="images\dog4.jpg"class="card-img-top" alt="Pet 2">
                <div class="card-body">
                        <h5 class="card-title">Pet Name 4</h5>
                        <p class="card-text">Description of the pet. Age, breed, etc.</p>
                        <a href="#" class="btn btn-primary btn-center adopt-btn">Adopt Me</a>
                    </div>
                </div>
            </div>
            <!-- Add more pet cards here -->
            
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<p></p>

<div class="home">
    

  </div>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to "Adopt Me" buttons
            var adoptButtons = document.querySelectorAll('.adopt-btn');
            adoptButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    // Retrieve pet details from the clicked card
                    var card = button.closest('.pet-card');
                    var petName = card.querySelector('.card-title').textContent;
                    var petDescription = card.querySelector('.card-text').textContent;
                    var petImageSrc = card.querySelector('.card-img-top').getAttribute('src');

                    // Encode pet details for URL
                    var encodedName = encodeURIComponent(petName);
                    var encodedDescription = encodeURIComponent(petDescription);
                    var encodedImageSrc = encodeURIComponent(petImageSrc);

                    // Construct URL with pet details as parameters
                    var url = 'individualpet.html?name=' + encodedName + '&description=' + encodedDescription + '&image=' + encodedImageSrc;

                    // Navigate to individualpet.html with pet details
                    window.location.href = url;
                });
            });
        });
    </script>

    <?php include("footer.php");?>

</body>
</html>