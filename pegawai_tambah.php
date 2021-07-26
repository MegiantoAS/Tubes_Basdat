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
            var idpegawai = document.update_user.idpegawai.value.trim();
            if (idpegawai.length == 0) {
                alert("ID tidak boleh kosong.");
                document.update_user.idpegawai.focus();
                return false;
            }
            var namapegawai = document.update_user.namapegawai.value.trim();
            if (namapegawai.length == 0) {
                alert("Isi Nama Pegawai");
                document.update_user.namapegawai.focus();
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
                <h1>Tambah Pegawai</h1>
            </div>
            <form name="update_user" method="post" action="" onsubmit="return validasidata()">
                <table class="table table-bordered w-50 mt-5 justify-content-center">
                    <tbody>
                        <tr>
                            <td>Id Pegawai</td>
                            <td><input type="text" name="idpegawai"></td>
                        </tr>
                        <tr>
                            <td>Id Cabang</td>
                            <td>
                                <select name="idcabang" required="">
                                    <option selected>~Pilih ID Cabang~</option>
                                    <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM cabang ORDER BY idcabang");
                                        while($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idcabang'] ?>"><?= $data['idcabang'] . " | " . $data['idcabang']   ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td><input type="text" name="namapegawai"></td>
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
                    $idpegawai = $_POST['idpegawai'];
                    $idcabang = $_POST['idcabang'];
                    $namapegawai = $_POST['namapegawai'];

                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO pegawai(idpegawai,idcabang,namapegawai) VALUES('$idpegawai','$idcabang','$namapegawai')");

                    // Show message when user added
                    echo "Data Pegawai Sudah ditambahkan. <a href='pegawai.php'>Lihat Pada Tabel Pegawai</a>";
                }
                ?>
        </div>
    </div>
    <div class="text-footer">
        Copyright © 2021. MyLaundry. All RIght Reserved
    </div>
</body>
<html>