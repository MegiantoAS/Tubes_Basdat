<?php
include_once("connection.php");

?>
<?php
// Display selected user data based on id
// Getting id from url
$idpegawai = $_GET['idpegawai'];
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE idpegawai='$idpegawai'");

while ($user_data = mysqli_fetch_array($result)) {

    $idpegawai = $user_data['idpegawai'];
    $idcabang = $user_data['idcabang'];
    $namapegawai = $user_data['namapegawai'];
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
        <a href="customer.php">Customer</a>
        <label><a href="pegawai.php">Pegawai</a></label>
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
                <h1>Edit Data Pegawai</h1>
            </div>

            <form name="update_pegawai" method="post" action="">
                <table class="table table-bordered w-50 mt-5">
                    <tbody>
                        <tr>
                            <td>Id Pegawai</td>
                            <td><input type="text" name="idpegawai" value="<?php echo $idpegawai; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Id Cabang</td>
                            <td>
                                <select name="idcabang" required="">
                                    <option selected>~Pilih ID Cabang~</option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM cabang ORDER BY idcabang");
                                    while ($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idcabang'] ?>" <?php
                                                                                    if ($data['idcabang'] == $idcabang)
                                                                                        echo "selected"
                                                                                    ?>><?= $data['idcabang'] ?></option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td><input type="text" name="namapegawai" required="" value="<?php echo $namapegawai; ?>"></td>
                        </tr>
                        <tr>
                            <td><a href="pegawai.php" class="btn btn-danger mb-3">Back</a></td> <input type="hidden" name="idpegawai" value=<?php echo $_GET['idpegawai']; ?>></td>

                            <td><input class="btn btn-success" type="submit" name="update" value="update"></td>
                        </tr>
                    </tbody>
                </table>

                <?php
                if (isset($_POST['update'])) {

                    $idpegawai = $_POST['idpegawai'];
                    $idcabang = $_POST['idcabang'];
                    $namapegawai = $_POST['namapegawai'];

                    // update user data
                    $result = mysqli_query($mysqli, "UPDATE `pegawai` SET `idcabang`='$idcabang',`namapegawai`='$namapegawai' WHERE `idpegawai`='$idpegawai'");

                    // Redirect to homepage to display updated user in list
                    header("Location: pegawai.php");
                }
                ?>
        </div>

        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>