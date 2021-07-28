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
    <link rel="stylesheet" href="style-content.css?v=1.3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" language="javascript">
        function validasidata() {
            var idbarang = document.update_user.idbarang.value.trim();
            if (idbarang.length == 0) {
                alert("ID tidak boleh kosong.");
                document.update_user.idbarang.focus();
                return false;
            }
            var namabarang = document.update_user.namabarang.value.trim();
            if (namabarang.length == 0) {
                alert("Nama tidak boleh kosong.");
                document.update_user.namabarang.focus();
                return false;
            }
            var jumlahbarang = document.update_user.jumlahbarang.value.trim();
            if (jumlahbarang.length == 0) {
                alert("Isi Jumlah Barang");
                document.update_user.jumlahbarang.focus();
                return false;
            }
            var beratbarang = document.update_user.beratbarang.value.trim();
            if (beratbarang.length == 0) {
                alert("Isi Berat Barang");
                document.update_user.beratbarang.focus();
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
        <label><a href="barang.php">Barang</a></label>
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
                <h1>Tambah Barang</h1>
            </div>
            <form name="update_user" method="post" action="" onsubmit="return validasidata()">
                <table class="table table-bordered w-50 mt-5 justify-content-center">
                    <tbody>
                        <tr>
                            <td>Id Barang</td>
                            <td><input type="text" name="idbarang"></td>
                        </tr>
                        <tr>
                            <td>Id Customer</td>
                            <td>
                                <select name="idcustomer" required="">
                                    <option selected>~Pilih ID Customer~</option>
                                    <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM customer ORDER BY idcustomer");
                                        while($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idcustomer'] ?>"><?= $data['idcustomer'] . " | " . $data['idcustomer']   ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" name="namabarang"></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td><input type="text" name="jumlahbarang"></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td><input type="text" placeholder="Kg" name="beratbarang"></td>
                        </tr>
                        <tr>
                            <td><a href="barang.php" class="btn btn-danger ">Back</a></td>
                            <td><input class="btn btn-success" type="submit" name="Submit" value="Add"></td>
                        </tr>
                    </tbody>
                </table>
                <?php

                // Check If form submitted, insert form data into users table.
                if (isset($_POST['Submit'])) {
                    $idbarang = $_POST['idbarang'];
                    $idcustomer = $_POST['idcustomer'];
                    $namabarang = $_POST['namabarang'];
                    $jumlahbarang = $_POST['jumlahbarang'];
                    $beratbarang = $_POST['beratbarang'];

                    // Insert user data into table
                    $result = mysqli_query($mysqli, "INSERT INTO barang(idbarang,idcustomer,namabarang,jumlahbarang,beratbarang) VALUES('$idbarang','$idcustomer','$namabarang','$jumlahbarang', '$beratbarang')");

                    // Show message when user added
                    echo "Data Barang Sudah ditambahkan. <a href='barang.php'>Lihat Pada Tabel Barang</a>";
                }
                ?>
        </div>
    </div>
    <div class="text-footer">
        Copyright © 2021. MyLaundry. All RIght Reserved
    </div>
</body>
<html>