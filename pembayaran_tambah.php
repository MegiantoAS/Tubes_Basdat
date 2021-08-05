<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<?php
include_once("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-content.css?v=1.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" language="javascript">
        function validasidata() {
            var idpembayaran = document.update_cabang.idpembayaran.value.trim();
            if (idpembayaran.length == 0) {
                alert("ID tidak boleh kosong.");
                document.update_cabang.idpembayaran.focus();
                return false;
            } else if (idpembayaran.length > 5) {
                alert("ID hanya boleh 3 karakter/digit.");
                document.update_cabang.idpembayaran.focus();
                return false;
            }
            var idbarang = document.update_cabang.idbarang.value.trim();
            if (idbarang.length == 0) {
                alert("Alamat tidak boleh kosong.");
                document.update_cabang.idbarang.focus();
                return false;
            }
            var idpegawai = document.update_cabang.idpegawai.value.trim();
            if (idpegawai.length == 0) {
                alert("Isi No Telepon Cabang");
                document.update_cabang.idpegawai.focus();
                return false;
            }
            var tglterima = document.update_cabang.tglterima.value.trim();
            if (tglterima.length == 0) {
                alert("Isi Jam Operasional Cabang");
                document.update_cabang.tglterima.focus();
                return false;
            }

        }
    </script>
</head>

<body>
    <div class="sidenav">
        <a href="dashboard.php"><img src="images/Group 11.png"></a><br>
        <br><br><br><br><br>
        <a href="customer.php">Customer</a>
        <a href="pegawai.php">Pegawai</a>
        <a href="barang.php">Barang</a>
        <a href="cabang.php">Cabang</a>
        <label><a href="pembayaran.php">Pembayaran</a></label>
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
                <h1>Tambah Pembayaran</h1>
            </div>
            <form name="update_cabang" method="post" action="" onsubmit="return validasidata()">
                <table class="table table-bordered w-50 mt-5 justify-content-center">
                    <tbody>
                    
                        <tr>
                            <td>Id Pembayaran</td>
                            <td><input type="text" name="idpembayaran"></td>
                        </tr>
                        <tr>
                            <td>Id Barang</td>
                            <td>
                                <select name="idbarang" required="">
                                    <option selected>~Pilih ID Barang~</option>
                                    <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY idbarang");
                                        while($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idbarang'] ?>"><?= $data['idbarang'] . " | " . $data['idbarang']   ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Id Pegawai</td>
                            <td>
                                <select name="idpegawai" required="">
                                    <option selected>~Pilih ID Pegawai~</option>
                                    <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY idpegawai");
                                        while($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idpegawai'] ?>"><?= $data['idpegawai'] . " | " . $data['idpegawai']   ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Terima</td>
                            <td><input type="date" name="tglterima"></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td><input type="text" name="totalharga"></td>
                        </tr>
                        <tr>
                            <td>Uang Muka</td>
                            <td><input type="text" name="uangmuka"></td>
                        </tr>
                        <tr>
                            <td><a href="cabang.php" class="btn btn-danger ">Back</a></td>
                            <td><input class="btn btn-success" type="submit" name="Submit" value="Add"></td>
                        </tr>
                    </tbody>
                </table>
                <?php

                // Check If form submitted, insert form data into users table.
                if (isset($_POST['Submit'])) {
                    $idpembayaran = $_POST['idpembayaran'];
                    $idbarang = $_POST['idbarang'];
                    $idpegawai = $_POST['idpegawai'];
                    $tglterima = $_POST['tglterima'];
                    $totalharga = $_POST['totalharga'];
                    $uangmuka = $_POST['uangmuka'];

                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO pembayaran(idpembayaran,idbarang,idpegawai,tglterima,totalharga,uangmuka) VALUES('$idpembayaran','$idbarang','$idpegawai', '$tglterima','$totalharga','$uangmuka')");

                    // Show message when user added
                    echo "Data pembayaran Sudah ditambahkan. <a href='pembayaran.php'>Lihat Pada Tabel pembayaran</a>";
                }
                ?>
        </div>
        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>