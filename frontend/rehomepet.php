<?php

session_start();

include '../backend/connection.php';

if($_SESSION['user_id']){
if(isset($_POST['submit'])){
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $ptwb = mysqli_real_escape_string($con, $_POST['ptwb']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $vaccine = mysqli_real_escape_string($con, $_POST['vaccine']);
    $neut = mysqli_real_escape_string($con, $_POST['neut']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);
    $image = basename($_FILES["image"]["name"]);
    //$loc = mysqli_real_escape_string($con, $_POST['loc']);

    try {

        $select1 = mysqli_query($con, "SELECT * FROM animalslists where AnimalName = '$pname' And AnimalDescription = '$desc' And AnimalImage = '$image' And AnimalAge = '$age' And Disease = '$disease' And Gender = '$gender' And Vaccinated = '$vaccine' And Neutered = '$neut'");

        if(mysqli_num_rows($select1) == 1){

            echo "<script>alert('Pet already exists!');</script>";
            //$_SESSION['alert_message'] = 'Pet already exists!';
            //$_SESSION['alert_type'] = 'danger';
        
            //header("Location: register.php");
            exit();
        }
        else{
        
                $insert1 = mysqli_query($con, "INSERT INTO animalslists (AnimalName, AnimalDescription , AnimalImage, AnimalAge, Disease, Gender, Vaccinated, Neutered) VALUES ('$pname' ,'$desc','$image' ,'$age' ,'$disease' ,'$gender' ,'$vaccine' ,'$neut')");

                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        //echo ";
                        echo "<script>alert('The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.');</script>";
                        
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                $select2 = mysqli_query($con, "SELECT * FROM categories where CategoryType = '$ptwb'");

                if(mysqli_num_rows($select2) == 0){
                    $insert2 = mysqli_query($con, "INSERT INTO categories (CategoryType) VALUES ('$ptwb')");
                }

                echo "<script>alert('Pet successful');</script>";
                //$_SESSION['alert_message'] = 'Pet successful';
                //$_SESSION['alert_type'] = 'success';
                
                //header("Location: logIn.php");
                exit();
            }

        } catch (mysqli_sql_exception) {
        header("Location: error.php");
        exit();
    }
}
}
else{
    header("Location: logIn.php");
    exit();
}

mysqli_close($con);
?>

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

<body class="custom-body-bg text-white">
<?php include("header.php");?>
<div class="wallpaper">
<div class="container">
    <div class="form-container mt-5 pet-form-container" style="max-width: 800px; margin-bottom: 5%;">
        <h2 class="text-center mb-4">Pet Submission Form</h2>
        <form method="post" action="rehomepet.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petName">Pet Name</label>
                        <input type="text" name="pname" class="form-control" id="petName" placeholder="Enter pet Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petType">Pet Type With Breed</label>
                        <input type="text" name="ptwb" class="form-control" id="petType" placeholder="Enter pet Type" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petAge">Pet Age</label>
                        <input type="text" name="age" class="form-control" id="petAge" placeholder="Enter pet Age" required>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disease">Any Disease? If Yes, Specify</label>
                        <input type="text" name="disease" class="form-control" id="disease" placeholder="Enter disease if any" required>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vaccinated</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vaccine" id="vacc" value="vaccinated" required>
                            <label class="form-check-label" for="vacc">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vaccine" id="notvacc" value="notvaccinated" required>
                            <label class="form-check-label" for="notvacc">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Neutered</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="neut" type="checkbox" id="neutered" value="neutered" required>
                            <label class="form-check-label" for="neutered">Yes</label>
                        </div>
                    </div>
                </div>
             
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petDescription">Description</label>
                        <textarea class="form-control" name="desc" id="petDescription" rows="3" placeholder="Enter pet description" style="resize: none;" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="petImage">Upload Image</label>
                        <input type="file" name="image" class="form-control-file" id="petImage" required>
                    </div>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
</div>
    <!-- Footer -->
    <?php include("footer.php");?>


    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>


