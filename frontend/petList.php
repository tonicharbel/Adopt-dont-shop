
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
        <!-- <div class="col-md-2 mb-2">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name...">
              </div>
        -->
       
        <div class="col-md-2 mb-3">
            <select class="form-control" id="categorySelect" name="Pet Type">
                <option value="" disabled selected>Pet Type</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
            </select>
            
        </div>
        <div class="col-md-2 mb-3">
            <select class="form-control" id="categorySelect">
                <option value="" disabled selected>Breed</option>
                <option value="">Labrador Retriever</option>
                <option value="dog">Golden Retriever</option>
                <option value="dog">Rottweiler</option>
                <option value="dog">Husky</option>
                <option value="">Bichon </option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <select class="form-control" id="categorySelect">
                <option value="" disabled selected>Gender</option>
                <option value="cat">Male</option>
                <option value="dog">Female</option>
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
                        <h5 class="card-title">Pet Name 4

</h5>
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

<!-- Pet Details Modal -->
<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="petModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="petModalLabel">Pet Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modal-pet-image" src="" class="img-fluid" alt="Pet Image">
                <p id="modal-pet-name"></p>
                <p id="modal-pet-description"></p>
                <!-- Add more pet details here -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" >Adopt Now!</button>
           <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
            
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click event for adopt button
        $(".adopt-btn").click(function() {
            // Get the pet details from data attributes
            var petName = $(this).closest(".card").find(".card-title").text();
            var petDescription = $(this).closest(".card").find(".card-text").text();
            var petImage = $(this).closest(".card").find(".card-img-top").attr("src");

            // Populate modal with pet details
            $("#modal-pet-image").attr("src", petImage);
            $("#modal-pet-name").text("Name: " + petName);
            $("#modal-pet-description").text("Description: " + petDescription);

            // Show modal
            $("#petModal").modal("show");
        });
    });
</script>

    <?php include("footer.php");?>

</body>
</html>
