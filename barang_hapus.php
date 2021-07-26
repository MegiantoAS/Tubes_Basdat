<?php
// include database connection file
include_once("connection.php");

// Get id from URL to delete that user
$idbarang = $_GET['idbarang'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM barang WHERE idbarang='$idbarang'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:barang.php");
