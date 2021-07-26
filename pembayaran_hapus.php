<?php
// include database connection file
include_once("connection.php");

// Get id from URL to delete that user
$idpembayaran = $_GET['idpembayaran'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM pembayaran WHERE idpembayaran='$idpembayaran'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pembayaran.php");
