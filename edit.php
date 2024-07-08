 <?php
    include 'dataBase.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];

        $sql = "INSERT INTO student_data( name, email, contact) VALUES ('$name','$email','$contact')";

        if ($conn->query($sql) === TRUE) {
            echo "New record create successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        header("Location: read.php");
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

     <title>Document</title>
 </head>

 <body>
     <div class="container mt-5">
         <h2 class="mb-4">Add New User</h2>
         <form action="edit.php" method="post">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" name="name" id="name" required>
             </div>
             <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" name="email" id="email" required>
             </div>
             <div class="form-group">
                 <label for="contact">Contact</label>
                 <input type="text" class="form-control" name="contact" id="contact" required>
             </div>
             <button type="submit" class="btn btn-primary">Add User</button>
             <a href="read.php" class="btn btn-secondary">Cancel</a>
         </form>

     </div>
 </body>

 </html>