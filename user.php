<?php
include 'connect.php'; // Include the database connection

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Prepare the SQL query to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO `crud` (`name`, `email`, `mobile`, `password`) VALUES (?, ?, ?, ?)");
    
    // Bind the input parameters (s for string) to the query
    $stmt->bind_param("ssss", $name, $email, $mobile, $password);

    // Execute the query and check if it's successful
    if ($stmt->execute()) {
        // Redirect to the display page if successful
        header('location:display.php');
    } else {
        // Show an error message if the query fails
        die("Error: " . $stmt->error);
    }
    $stmt->close(); // Close the statement
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Add User</h2>
        <!-- Form to input user details -->
        <form method="POST">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="form-group mb-3">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" name="mobile" placeholder="Enter your Mobile" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</body>

</html>
