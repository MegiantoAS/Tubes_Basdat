<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<?php
include_once("connection.php");

?>
<?php
// Display selected user data based on id
// Getting id from url
$idcustomer = $_GET['idcustomer'];
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM customer WHERE idcustomer='$idcustomer'");

while ($user_data = mysqli_fetch_array($result)) {

    $idcustomer = $user_data['idcustomer'];
    $namacustomer = $user_data['namacustomer'];
    $alamat = $user_data['alamat'];
    $notelp = $user_data['notelp'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-content.css?v=1.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="sidenav">
        <a href="dashboard.php"><img src="images/Group 11.png"></a><br>
        <br><br><br><br><br>
        <label><a href="customer.php">Customer</a></label>
        <a href="pegawai.php">Pegawai</a>
        <a href="barang.php">Barang</a>
        <a href="cabang.php">Cabang</a>
        <a href="pembayaran.php">Pembayaran</a>
        <a onclick="return confirm('anda yakin ingin keluar?')" class="btn btn-danger mx-5 col-8" href="logout.php">Logout</a>
    </div>

    <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                   <ul class="navbar-nav ms-auto">
                        <li class="nav-item mt-2 ">
                            Hello,  <?php echo $_SESSION['namapegawai'] ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/iconprofile.png" width="30px"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="banner">
                <h1>Edit Data Customer</h1>
            </div>

            <form name="update_user" method="post" action="">
                <table class="table table-bordered w-50 mt-5">
                    <tbody>
                        <tr>
                            <td>Id customer</td>
                            <td><input type="text" name="idcustomer" value="<?php echo $idcustomer; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td><input type=" text" name="namacustomer" required="" value="<?php echo $namacustomer; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" required="" value="<?php echo $alamat; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nomor telpon</td>
                            <td><input type="text" name="notelp" required="" value="<?php echo $notelp; ?>"></td>
                        </tr>
                        <tr>
                            <td><a href="customer.php" class="btn btn-danger mb-3">Back</a></td> <input type="hidden" name="idcustomer" value=<?php echo $_GET['idcustomer']; ?>></td>

                            <td><input class="btn btn-success" type="submit" name="update" value="update"></td>
                        </tr>
                    </tbody>
                </table>

                <?php
                if (isset($_POST['update'])) {

                    $idcustomer = $_POST['idcustomer'];
                    $namacustomer = $_POST['namacustomer'];
                    $alamat = $_POST['alamat'];
                    $notelp = $_POST['notelp'];

                    // update user data
                    $result = mysqli_query($mysqli, "UPDATE `customer` SET `namacustomer`='$namacustomer',`alamat`='$alamat', `notelp`='$notelp' WHERE `idcustomer`='$idcustomer'");

                    // Redirect to homepage to display updated user in list
                    header("Location: customer.php");
                }
                ?>
        </div>

        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>