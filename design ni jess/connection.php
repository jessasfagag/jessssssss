<?php
$conn = mysqli_connect("localhost", "root", "", "uploadfile");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
