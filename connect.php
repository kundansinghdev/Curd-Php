<?php
// Database connection parameters
$hname = 'localhost'; // Hostname (usually localhost)
$uname = 'root';      // Username (default for local server)
$pass = '';           // Password (empty for default root user)
$db = 'crudoperation'; // Database name to connect

// Create a new connection using MySQLi
$con = new mysqli($hname, $uname, $pass, $db);

// Check if the connection was successful
if ($con->connect_error) {
    // Display an error message and stop script if connection fails
    die("Connection failed: " . $con->connect_error);
}
?>
