<?php
$Servername = "localhost";
$username = "root";
$password = "";
$database = "usama";

$conn = new mysqli($Servername, $username, $password, $database);
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
// $sql = "SELECT * FROM `student_data` WHERE 1";
// $result =  $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "ID:" . $row["id"] . " - name " . $row["name"] . " - email " . $row["email"] . " - contact " . $row["contact"] . "<br>";
//     }
// } else {
//     echo "0 result";
// }
