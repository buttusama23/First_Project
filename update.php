<?php
include "dataBase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $id = $_POST['id'];

    $sql = "UPDATE student_data SET name='$name',email='$email',contact='$contact' WHERE id=$id";

    if($conn->query($sql) === TRUE) {
        echo "New recorded updated successfully";
    } else {
        echo "Error updating" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: read.php");
    exit();
}else {
    if(!isset($_GET['id'])){
        echo "NO ID parameter provided";
        exit();
    }

    $id = $_GET['id'];
    $sql = "SELECT *FROM student_data WHERE id=$id";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $name =$row['name'];
        $email =$row['email'];
        $contact =$row['contact'];
    }else{
        echo"No record found";
        $conn->close();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >

    <title>Update User</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update User</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" required>
            </div>
            <div class="form-group">
                <label for="contact">contact</label>
                <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact;?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="read.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html> 