<?php
session_start();
$_SESSION['isloggedin']=1;
if($_SESSION['isloggedin']!=1)
{
    header("Location:index.php");
}
else{
require_once 'connection.php';



$query1="Select * FROM users";
$result1= mysqli_query($con, $query1);
$nbr= mysqli_num_rows($result1);

if($nbr==0)
{
  
  include("sideBar.php");
    echo '<h2>There is no Users Yet</h2>
    <a href ="insertuser.php" class="btn btn-primary" >Add New User</a>';
}
else
{
  include("sideBar.php");
?>

  

  <div id="users">
      <h2>Users</h2>
      <a href ="insertuser.php" class="btn btn-primary" >Add New User</a>
      <table class="table  mt-3 ">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>City</th>
            <th>Country</th>
            <th>ZipCode</th>
            <th>Phone</th>
            <th>Creation date</th>
            <th>Group ID</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="userTable">
          <!-- User rows will be populated here -->
     
    <?php
    for($i=0; $i<$nbr; $i++)
    {
        $row= mysqli_fetch_assoc($result1);
        echo"<tr>";
        echo "<td>$row[UserId]</td>";
        echo "<td>$row[UserFirstName]</td>";
        echo "<td>$row[UserLastName]</td>";
        echo "<td>$row[UserEmail]</td>";
        echo "<td>$row[UserPassword]</td>";
        echo "<td>$row[UserCity]</td>";
        echo "<td>$row[UserCountry]</td>";
        echo "<td>$row[UserZipCode]</td>";
        echo "<td>$row[UserPhone]</td>";
        echo "<td>$row[CreatedAt]</td>";
        echo "<td>$row[GroupId]</td>";
       
        echo'<td> <a href ="editusers.php?userId=' . $row['UserId'] . '"  class="btn btn-warning btn-sm" > Edit</td>';
        echo'<td><a href = "deleteUsers.php?userId='.$row['UserId'].'" class="btn btn-danger btn-sm">Delete</td>';
        
      
        echo"</tr>";
    }

}
}
?>
   <table>
   </tbody>
      </table>
    </div>

  
    </div>
