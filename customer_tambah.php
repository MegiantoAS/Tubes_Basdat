<?php
include_once("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-content.css?v=1.3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" language="javascript">
        function validasidata() {
            var idbarang = document.update_user.Id_barang.value.trim();
            if (idbarang.length == 0) {
                alert("ID tidak boleh kosong.");
                document.update_user.Id_barang.focus();
                return false;
            }
            var namabarang = document.update_user.Nama_Barang.value.trim();
            if (namabarang.length == 0) {
                alert("Nama tidak boleh kosong.");
                document.update_user.Nama_Barang.focus();
                return false;
            }
            var alamat = document.update_user.alamat.value.trim();
            if (alamat.length == 0) {
                alert("Isi Alamat Anda");
                document.update_user.Nama_Barang.focus();
                return false;
            }
            var notelp = document.update_user.notelp.value.trim();
            if (notelp.length == 0) {
                alert("Isi No Telpon Anda");
                document.update_user.notelp.focus();
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
                <h1>Tambah Barang</h1>
            </div>
            <form name="update_user" method="post" action="" onsubmit="return validasidata()">
                <table class="table table-bordered w-50 mt-5 justify-content-center">
                    <tbody>
                        <tr>
                            <td>Id Customer</td>
                            <td><input type="text" name="idcustomer"></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td><input type="text" name="namacustomer"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat"></td>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td><input type="text" name="notelp"></td>
                        </tr>
                        <tr>
                            <td><a href="customer.php" class="btn btn-danger ">Back</a></td>
                            <td><input class="btn btn-success" type="submit" name="Submit" value="Add"></td>
                        </tr>
                    </tbody>
                </table>
                <?php

                // Check If form submitted, insert form data into users table.
                if (isset($_POST['Submit'])) {
                    $idcustomer = $_POST['idcustomer'];
                    $namacustomer = $_POST['namacustomer'];
                    $alamat = $_POST['alamat'];
                    $notelp = $_POST['notelp'];

                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO customer(idcustomer,namacustomer,alamat,notelp) VALUES('$idcustomer','$namacustomer','$alamat', '$notelp')");

                    // Show message when user added
                    echo "Data Customer Sudah ditambahkan. <a href='customer.php'>Lihat Pada Tabel Customer</a>";
                }
                ?>
        </div>
    </div>
    <div class="text-footer">
        Copyright © 2021. MyLaundry. All RIght Reserved
    </div>
</body>
<html>