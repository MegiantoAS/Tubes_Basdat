<?php
include_once("connection.php");

?>
<?php
// Display selected user data based on id
// Getting id from url
$idcabang = $_GET['idcabang'];
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM cabang WHERE idcabang='$idcabang'");

while ($user_data = mysqli_fetch_array($result)) {
    $idcabang = $user_data['idcabang'];
    $alamatcabang = $user_data['alamatcabang'];
    $notelpcabang = $user_data['notelpcabang'];
    $jamoperasional = $user_data['jamoperasional'];
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
        <button type="button" class="btn btn-danger mx-5 col-8">Logout</button>
    </div>

    <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto">
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

            <form name="update_cabang" method="post" action="">
                <table class="table table-bordered w-50 mt-5">
                    <tbody>
                        <tr>
                            <td>Id Cabang</td>
                            <td><input type="text" name="idcabang" value="<?php echo $idcabang; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamatcabang" value="<?php echo $alamatcabang; ?>"></td>
                        </tr>
                        <tr>
                            <td>No Telp Cabang</td>
                            <td><input type="text" name="notelpcabang" value="<?php echo $notelpcabang; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jam Operasional</td>
                            <td><input type="text" name="jamoperasional" value="<?php echo $jamoperasional; ?>"></td>
                        </tr>
                        <tr>
                            <td><a href="cabang.php" class="btn btn-danger mb-3">Back</a></td> <input type="hidden" name="idcabang" value=<?php echo $_GET['idcabang']; ?>></td>

                            <td><input class="btn btn-success" type="submit" name="update" value="update"></td>
                        </tr>
                    </tbody>
                </table>

                <?php
                if (isset($_POST['update'])) {

                    $idcabang = $_POST['idcabang'];
                    $alamatcabang = $_POST['alamatcabang'];
                    $notelpcabang = $_POST['notelpcabang'];
                    $jamoperasional = $_POST['jamoperasional'];

                    // update user data
                    $result = mysqli_query($mysqli, "UPDATE `cabang` SET `alamatcabang`='$alamatcabang',`notelpcabang`='$notelpcabang', `jamoperasional`='$jamoperasional' WHERE `idcabang`='$idcabang'");

                    // Redirect to homepage to display updated user in list
                    header("Location: cabang.php");
                }
                ?>
        </div>

        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>