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
        $result = mysqli_query($mysqli, "SELECT * FROM barang where namabarang like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY namabarang ASC");
    }
    ?>
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
            <div class="row ms-auto">
                <div class="col">
                    <a class='btn btn-success' href="barang_tambah.php">Tambah</a>
                </div>
                <form class="form-inline method='GET'">
                    <div class="row">
                        <div class="col-2">
                            <input class="form-control mt-2" name="cari" type="search" placeholder="Cari Nama Barang" aria-label="Search">
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
                    <th width=150>ID Barang</th>
                    <th width=200>ID Customer</th>
                    <th width=250>Nama Barang</th>
                    <th width=100>Jumlah</th>
                    <th width=100>Berat</th>
                    <th width=200>Aksi</th>
                </tr>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <center><?= $user_data['idbarang'] ?></center>
                        </td>
                        <td>
                            <center><?= $user_data['idcustomer'] ?></center>
                        </td>
                        <td>
                            <center><?= $user_data['namabarang'] ?></center>
                        </td>
                        <td>
                            <center><?= $user_data['jumlahbarang'] ?></center>
                        </td>
                        <td>
                            <center><?= $user_data['beratbarang'] ?></center>
                        </td>
                        <td>
                            <center><a class='btn btn-success' href='barang_edit.php?idbarang=<?= $user_data['idbarang'] ?>'>Edit</a> |
                                <a class='btn btn-danger' href='barang_hapus.php?idbarang=<?= $user_data['idbarang'] ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a>
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