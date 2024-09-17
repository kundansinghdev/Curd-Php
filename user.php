<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO `crud` (`name`, `email`, `mobile`, `password`) VALUES ('$name', '$email', '$mobile', '$password')";
    
    $result = mysqli_query($con, $sql);
    
    if ($result) {
       // echo "Data inserted successfully";
       header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>CRUD Operation Form</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <!-- Name Input -->
            <h1 class="text-center">CRUD</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name" required>
            </div>

            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email"
                    required>
            </div>

            <!-- Mobile Input -->
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" id="mobile" placeholder="Enter your Mobile" name="mobile"
                    required>
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your Password"
                    name="password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>