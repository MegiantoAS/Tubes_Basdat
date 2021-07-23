<?php
// include database connection file
include_once("connection.php");

// Get id from URL to delete that user
$idcabang = $_GET['idcabang'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM cabang WHERE idcabang='$idcabang'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:cabang.php");
