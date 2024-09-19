<?php
include 'connect.php'; // Include database connection

// Check if the delete request is set in the URL
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid']; // Get the user ID to be deleted

    // Prepare SQL statement to delete the user
    $stmt = $con->prepare("DELETE FROM `crud` WHERE id=?");
    $stmt->bind_param("i", $id); // Bind the ID to the query

    // Execute the query and check if it's successful
    if ($stmt->execute()) {
        header('location:display.php'); // Redirect to the display page
    } else {
        echo "Error: " . $stmt->error; // Show an error if query fails
    }
    $stmt->close(); // Close the statement
}
?>
