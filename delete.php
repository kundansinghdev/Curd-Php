<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `crud` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
       // echo "Deleted successfully";
        header('location:display.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
