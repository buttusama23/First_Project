<?php
include 'dataBase.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >

    <title>Document</title>
</head>
<body>
<div class="container mt-5">
<h2 class="mb-4">Users Table</h2>
<a href="edit.php" class="btn btn-success mb-4">add New User</a>
<table class="table table-bordered">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>School-Name</th>
<th>Registration No</th>
<th>Email</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Ensure this is the correct password for your MySQL user
    $database = "usama";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    //check connection

    if ($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
    }

    // Define the SQL query
    $sql = "SELECT * FROM student_data ";

    // Execute the query and get the result
    $result = $conn->query($sql);

    // Check if there are results and fetch data
    if ($result->num_rows > 0){
    // Output data of each row
    while ($row = $result->fetch_assoc()){
    echo '<tr>';
    echo'<td>' .$row["id"] . '</td>';
    echo'<td>' .$row["name"] . '</td>' ;
    echo'<td>' . $row["email"] . '</td>';
    echo'<td>' . $row["contact"] . '</td>';
    echo '<td><a href="update.php?id=' .$row["id"].'"class="btn btn-warning btn-sm">update</a>';
    echo '<td><a href="delete.php?id=' .$row["id"].'"class="btn btn-warning btn-sm"
    onclick = return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
    echo'</td>';
    
    echo '</tr>';
    }
    } else {
    echo '<tr><td colspan="4">No results found</td></tr>';
    }
    // Close the connection
    $conn->close();
    ?>
    </tbody>
    </table>
    </div>

</body>
</html>