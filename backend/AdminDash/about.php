<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

// Include the database connection file
include('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adjust styles as needed */
        .dashboard-section {
            margin-bottom: 20px;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php include("sideBar.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="dashboard-section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User List</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Clicking on "User List" allows you to manage users. Functions include viewing, deleting, and editing user profiles.
                        </p>
                    </div>
                </div>
            </div>
            <div class="dashboard-section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pet List</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Navigate to "Pet List" to manage pets available for adoption. Functions include adding new pets, deleting existing ones, and editing pet details.
                        </p>
                    </div>
                </div>
            </div>
            <div class="dashboard-section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Developers</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Patrick</td>
                                    <td>Abi Ramia</td>
                                </tr>
                                <tr>
                                    <td>Toni</td>
                                    <td>Charbel</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pet Request List</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Access the "Pet Request List" to handle pet rehoming requests. View detailed information about each pet request and choose to accept or decline.
                        </p>
                    </div>
                </div>
            </div>
            <div class="dashboard-section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Adoption Pet Request </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Review adoption requests sent by users. Information displayed includes the date of request, user details, and pet information.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> All rights reserved, by Patrick and Toni</p>
    </div>
</footer>

<?php
// Close the database connection
mysqli_close($con);
?>
</body>
</html>
