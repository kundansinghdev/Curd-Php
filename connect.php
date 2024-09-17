<?php
// Database connection parameters
$hname = 'localhost'; // Hostname of the MySQL server
$uname = 'root';      // MySQL username
$pass = '';           // MySQL password (empty for 'root' user)
$db = 'crudoperation'; // Name of the database

// Attempt to establish a connection to the database
$con = mysqli_connect($hname, $uname, $pass, $db);

// Check if the connection was successful
if (!$con) {
    // If the connection fails, echo an error message
    die("Connection failed: " . mysqli_connect_error());
}
?>
