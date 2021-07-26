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
            var idcabang = document.update_cabang.idcabang.value.trim();
            if (idcabang.length == 0) {
                alert("ID tidak boleh kosong.");
                document.update_cabang.idcabang.focus();
                return false;
            } else if (idcabang.length > 3) {
                alert("ID hanya boleh 3 karakter/digit.");
                document.update_cabang.idcabang.focus();
                return false;
            }
            var alamatcabang = document.update_cabang.alamatcabang.value.trim();
            if (alamatcabang.length == 0) {
                alert("Alamat tidak boleh kosong.");
                document.update_cabang.alamatcabang.focus();
                return false;
            }
            var notelpcabang = document.update_cabang.notelpcabang.value.trim();
            if (notelpcabang.length == 0) {
                alert("Isi No Telepon Cabang");
                document.update_cabang.notelpcabang.focus();
                return false;
            }
            var jamoperasional = document.update_cabang.jamoperasional.value.trim();
            if (jamoperasional.length == 0) {
                alert("Isi Jam Operasional Cabang");
                document.update_cabang.jamoperasional.focus();
                return false;
            }

        }
    </script>
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
                <h1>Tambah Cabang</h1>
            </div>
            <form name="update_cabang" method="post" action="" onsubmit="return validasidata()">
                <table class="table table-bordered w-50 mt-5 justify-content-center">
                    <tbody>
                        <tr>
                            <td>Id Cabang</td>
                            <td><input type="text" name="idcabang"></td>
                        </tr>
                        <tr>
                            <td>Alamat Cabang</td>
                            <td><input type="text" name="alamatcabang"></td>
                        </tr>
                        <tr>
                            <td>No Telp Cabang</td>
                            <td><input type="text" name="notelpcabang"></td>
                        </tr>
                        <tr>
                            <td>Jam Operasional</td>
                            <td><input type="text" name="jamoperasional"></td>
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
                    $idcabang = $_POST['idcabang'];
                    $alamatcabang = $_POST['alamatcabang'];
                    $notelpcabang = $_POST['notelpcabang'];
                    $jamoperasional = $_POST['jamoperasional'];

                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO cabang(idcabang,alamatcabang,notelpcabang,jamoperasional) VALUES('$idcabang','$alamatcabang','$notelpcabang', '$jamoperasional')");

                    // Show message when user added
                    echo "Data Cabang Sudah ditambahkan. <a href='cabang.php'>Lihat Pada Tabel Cabang</a>";
                }
                ?>
        </div>
        <div class="text-footer">
            Copyright © 2021. MyLaundry. All RIght Reserved
        </div>
</body>
<html>