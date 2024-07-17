<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Bootstrap script -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
   <!-- Bootstrap icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
</head>
<body>

    <!-- Navbar -->
    <?php include("header.php"); ?>
    
    <!-- About Section -->
  
    <div class="section">
        <div class="container">
            <div class="title">
                    <h1>About US</h1>
            </div>
            <div class="content">
                <div class="article">
                    <h3>Welcome to “Adopt Don’t Shop,” 
                        where we champion the cause of animal 
                        adoption over purchasing pets.
                    </h3>
                    <p>At Adopt Don’t Shop, we believe every animal deserves a loving home.
                        Our mission is to connect compassionate individuals with animals
                        in need through a dedicated platform for adoption. We strive 
                        to raise awareness about the importance of adopting pets
                        rather than shopping for them,
                        highlighting the positive impact of giving 
                        a second chance to shelter animals.
                    </p>
                    <div class="button">
                        <a href="readmore.php">Read More</a>
                    </div>
                </div>
            </div>
            <div class="image-section">
                <div class="slider">
                    <img src="images/a1.jpg" alt="Pet Adoption Picture" class="slider-image">
                    <img src="images/a2.jpg" alt="Pet Adoption Picture" class="slider-image">
                    <img src="images/a3.jpg" alt="Pet Adoption Picture" class="slider-image">
                    <img src="images/a4.jpg" alt="Pet Adoption Picture" class="slider-image">
                    <img src="images/a5.jpg" alt="Pet Adoption Picture" class="slider-image">
                </div>
            </div>
            <div class="social-media">
                <a href="#"><i class="fa fa-facebook-f"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php");?>

    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.getElementsByClassName("slider-image");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].style.opacity = 0; // Hide the images initially
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    slides[slideIndex - 1].style.transition = "opacity 1s"; // Add a smooth opacity transition
    slides[slideIndex - 1].style.opacity = 1; // Show the active image
    setTimeout(showSlides, 4000); // Change image every 4 seconds
}
    </script>
</body>
</html>
