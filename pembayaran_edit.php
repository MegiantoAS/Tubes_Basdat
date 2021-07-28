<?php
include_once("connection.php");

?>
<?php
// Display selected user data based on id
// Getting id from url
$idpembayaran = $_GET['idpembayaran'];
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM pembayaran WHERE idpembayaran='$idpembayaran'");

while ($user_data = mysqli_fetch_array($result)) {

    $idpembayaran = $user_data['idpembayaran'];
    $idbarang = $user_data['idbarang'];
    $idpegawai = $user_data['idpegawai'];
    $tglterima = $user_data['tglterima'];
    $totalharga = $user_data['totalharga'];
    $uangmuka = $user_data['uangmuka'];
}
?>

<?php
if (isset($_POST['update'])) {

    $idpembayaran = $_POST['idpembayaran'];
    $idbarang = $_POST['idbarang'];
    $idpegawai = $_POST['idpegawai'];
    $tglterima = $_POST['tglterima'];
    $totalharga = $_POST['totalharga'];
    $uangmuka = $_POST['uangmuka'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE `pembayaran` SET `idbarang`='$idbarang',`idpegawai`='$idpegawai', `tglterima`='$tglterima', `totalharga`='$totalharga', `uangmuka`='$uangmuka' WHERE `idpembayaran`='$idpembayaran'");

    // Redirect to homepage to display updated user in list
    header("Location: pembayaran.php");
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
                            Hello,
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
                <h1>Edit Data pembayaran</h1>
            </div>

            <form name="update_user" method="post" action="">
                <table class="table table-bordered w-50 mt-5">
                    <tbody>
                        <tr>
                            <td>Id pembayaran</td>
                            <td><input type="text" name="idpembayaran" value="<?php echo $idpembayaran; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Id barang</td>
                            <td>
                                <select name="idbarang" required="">
                                    <option selected>~Pilih ID Barang~</option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY idbarang");
                                    while ($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idbarang'] ?>" <?php
                                                                                    if ($data['idbarang'] == $idbarang)
                                                                                        echo "selected"
                                                                                    ?>><?= $data['idbarang'] ?></option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Id pegawai</td>
                            <td>
                                <select name="idpegawai" required="">
                                    <option selected>~Pilih ID Pegawai~</option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY idpegawai");
                                    while ($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idpegawai'] ?>" <?php
                                                                                    if ($data['idpegawai'] == $idpegawai)
                                                                                        echo "selected"
                                                                                    ?>><?= $data['idpegawai'] ?></option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>tgl terima</td>
                            <td><input type="text" name="tglterima" required="" value="<?php echo $tglterima; ?>"></td>
                        </tr>
                        <tr>
                            <td>total harga</td>
                            <td><input type="text" name="totalharga" required="" value="<?php echo $totalharga; ?>"></td>
                        </tr>
                        <tr>
                            <td>tgl terima</td>
                            <td><input type="text" name="uangmuka" required="" value="<?php echo $uangmuka; ?>"></td>
                        </tr>
                        <tr>
                            <td><a href="pembayaran.php" class="btn btn-danger mb-3">Back</a></td> <input type="hidden" name="idpembayaran" value=<?php echo $_GET['idpembayaran']; ?>></td>

                            <td><input class="btn btn-success" type="submit" name="update" value="update"></td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>