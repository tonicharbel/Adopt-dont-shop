<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location: ../../../../frontend/index.php");
    exit();
}

include('../backend/connection.php');


$userID = $_SESSION['user_id'];


$query = "
    SELECT 
        a.AdoptId, 
        a.AdoptDate, 
        a.AdoptStatus, 
        an.AnimalName, 
        an.AnimalDescription, 
        an.CreatedAt, 
        an.AnimalAge, 
        an.Gender
    FROM 
        adopts a
    JOIN 
        adoptanimals aa ON a.AdoptId = aa.AdoptId
    JOIN 
        animalslists an ON aa.AnimalId = an.AnimalId
    WHERE 
        a.UserId = '$userID'
";


$result = mysqli_query($con, $query);


if (!$result) {
    die("Error retrieving data: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Adoption Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .section {
            margin-bottom: 30px;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-header {
            background-color: #00007B;
            color: white;
            font-size: 1.25rem;
        }
        .table td, .table th {
            padding: 1rem;
        }
        .table-responsive {
            margin-top: 15px;
        }
        .status-pending {
            background-color: #d4edda; 
            color: #155724; 
            font-weight: bold;
        }
        .status-accepted {
            background-color: #cce5ff; 
            color: #004085; 
            font-weight: bold;
        }
        .status-column {
            font-weight: bold;
            text-align: center;
        }
        .status-column .badge {
            padding: 0.5em 1em;
            font-size: 1em;
            border-radius: 0.25em;
        }
        .status-pending-badge {
            background-color: #d4edda; 
            color: #155724; 
        }
        
        .status-accepted-badge {
            background-color: #cce5ff; 
            color: #004085; 
        }
       
        .info-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f9f9f9;
        }
        .info-box h3 {
            margin-top: 0;
            font-size: 1.25rem;
        }
        .info-box p {
            margin: 0;
            font-size: 1rem;
        }
        .info-box.pending {
            border-color: #28a745; 
            background-color: #d4edda;
        }
        .info-box.accepted {
            border-color: #007bff; 
            background-color: #cce5ff;
        }
        .info-box.declined {
            border-color: #dc3545; 
            background-color: #f8d7da;
        }
        .header {
            margin: 30px 0;
            font-size: 1.5rem;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
    </style>
    
</head>
<body>
<div class="container mt-5">
    <div class="section">
        <div class="card">
            <div class="card-header">
                Track My Adoption Requests
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Adopt ID</th>
                                <th>Adopt Date</th>
                                <th>Animal Name</th>
                                <th>Animal Description</th>
                                <th>Created At</th>
                                <th>Animal Age</th>
                                <th>Gender</th>
                                <th class="status-column">Adopt Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $statusClass = '';
                                $statusBadgeClass = '';
                                if ($row['AdoptStatus'] == 'pending') {
                                    $statusClass = 'status-pending';
                                    $statusBadgeClass = 'status-pending-badge';
                                } elseif ($row['AdoptStatus'] == 'accepted') {
                                    $statusClass = 'status-accepted';
                                    $statusBadgeClass = 'status-accepted-badge';
                                }

                                echo "<tr>
                                        <td>{$row['AdoptId']}</td>
                                        <td>{$row['AdoptDate']}</td>
                                        <td>{$row['AnimalName']}</td>
                                        <td>{$row['AnimalDescription']}</td>
                                        <td>{$row['CreatedAt']}</td>
                                        <td>{$row['AnimalAge']}</td>
                                        <td>{$row['Gender']}</td>
                                        <td class='status-column'>
                                            <span class='badge {$statusBadgeClass}'>{$row['AdoptStatus']}</span>
                                        </td>
                                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="header">
        What Does Adoption Status Mean?
    </div>

    <div class="info-box pending">
        <h3>Pending Status</h3>
        <p>If the adoption status is "Pending," it indicates that your request has been successfully submitted and is currently under review by our team. We are diligently evaluating your request.</p>
    </div>
   
    <div class="info-box accepted">
        <h3>Accepted Status</h3>
        <p>If your request is "Accepted," congratulations! Your adoption request has been approved. You are welcome to visit us and pick up your new companion.</p>
    </div>

    <div class="info-box declined">
        <h3>Declined Status</h3>
        <p>If your request Doesn't exists here , we regret to inform you that your request was not successful. This may be due to the pet's unavailability or another party adopting the pet.</p>
    </div>
    
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php

mysqli_close($con);
?>
