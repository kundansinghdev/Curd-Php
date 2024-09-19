<?php
include 'connect.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <!-- Button to add a new user -->
        <button class="btn btn-success mb-3">
            <a href="user.php" class="text-white text-decoration-none">Add User</a>
        </button>

        <!-- Table to display users -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Actions</th> <!-- Update and Delete actions -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Prepare a SQL statement to fetch all users
                $stmt = $con->prepare("SELECT * FROM `crud`");
                $stmt->execute(); // Execute the statement
                $result = $stmt->get_result(); // Get the result set
                
                // Loop through the result set and display each row in the table
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['mobile']}</td>
                        <td>{$row['password']}</td>
                        <td>
                            <a href='update.php?updateid={$row['id']}' class='btn btn-primary btn-sm'>Update</a>
                            <a href='delete.php?deleteid={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
                $stmt->close(); // Close the statement
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
