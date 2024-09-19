<?php
include 'connect.php'; // Include database connection

$id = $_GET['updateid']; // Get the user ID from the URL

// Prepare SQL statement to fetch the current data for the user
$stmt = $con->prepare("SELECT * FROM `crud` WHERE id=?");
$stmt->bind_param("i", $id); // Bind the ID to the query
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result set
$row = $result->fetch_assoc(); // Fetch the data into an associative array

// Pre-populate form fields with current values
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    // Get updated data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Prepare SQL statement to update the user data
    $stmt = $con->prepare("UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);

    // Execute the query and check if it's successful
    if ($stmt->execute()) {
        header('location:display.php'); // Redirect to display page
    } else {
        die("Error: " . $stmt->error); // Show an error if query fails
    }
    $stmt->close(); // Close the statement
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Update User</h2>
        <!-- Form to update user details -->
        <form method="POST">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" name="mobile" value="<?php echo $mobile; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
