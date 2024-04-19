<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Submission Form</title>
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

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="custom-body-bg text-white" >
<?php include("header.php");?>
<div class="container">
    <div class="form-container mt-5 pet-form-container" style="max-width: 800px;">
        <h2 class="text-center mb-4">Pet Submission Form</h2>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petName">Pet Name</label>
                        <input type="text" class="form-control" id="petName" placeholder="Enter pet Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petType">Pet Type With Breed</label>
                        <input type="text" class="form-control" id="petType" placeholder="Enter pet Type">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petAge">Pet Age</label>
                        <input type="text" class="form-control" id="petAge" placeholder="Enter pet Age">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disease">Any Disease? If Yes, Specify</label>
                        <input type="text" class="form-control" id="disease" placeholder="Enter disease if any">
                    </div>
                </div>
              
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vaccinated</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vaccine" id="vacc" value="vaccinated">
                            <label class="form-check-label" for="vacc">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vaccine" id="notvacc" value="notvaccinated">
                            <label class="form-check-label" for="notvacc">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Neutered</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="neutered" value="neutered">
                            <label class="form-check-label" for="neutered">Yes</label>
                        </div>
                    </div>
                </div>
             
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petDescription">Description</label>
                        <textarea class="form-control" id="petDescription" rows="3" placeholder="Enter pet description"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petImage">Upload Image</label>
                        <input type="file" class="form-control-file" id="petImage">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-custom btn-block">Submit</button>
        </form>
    </div>
</div>


    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
