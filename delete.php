
<?php
include 'dataBase.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM student_data WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record delete successfully";
  }else{
    echo "Error deleteing record:". $conn->error;
  }
  $conn->close();

  header("Location: read.php");
  exit();

} else{
    echo "No ID parameter provided";
}
?>