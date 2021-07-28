<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-content.css?v=1.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
    include_once("connection.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($mysqli, "SELECT * FROM pegawai where namapegawai like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY namapegawai ASC");
    }
    ?>
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
            <div class="row ms-auto">
                <div class="col">
                    <a class='btn btn-success' href="pegawai_tambah.php">Tambah</a>
                </div>
                <form class="form-inline method='GET'">
                    <div class="row">
                        <div class="col-2">
                            <input class="form-control mt-2" name="cari" type="search" placeholder="Cari Nama Pegawai" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn-sm btn-outline-success" type="submit" action="">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <table class="table table-bordered text-center">
                <tr>
                    <th width=150>ID Pegawai</th>
                    <th width=150>Id Cabang</th>
                    <th width=300>Nama Pegawai</th>
                    <th width=200>Aksi</th>
                </tr>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <center><?= $user_data['idpegawai']; ?></center>
                        </td>
                        <td>
                            <center> <?= $user_data['idcabang']; ?></center>
                        </td>
                        <td>
                            <center><?= $user_data['namapegawai']; ?></center>
                        </td>
                        <td>
                            <center><a class='btn btn-success' href='pegawai_edit.php?idpegawai=<?= $user_data['idpegawai']; ?>'>Edit</a> |
                                <a class='btn btn-danger' href='pegawai_hapus.php?idpegawai=<?= $user_data['idpegawai']; ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>

    <div class="text-footer">
        Copyright © 2021. MyLaundry. All RIght Reserved
    </div>
</body>
<html>