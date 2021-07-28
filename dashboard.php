<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<?php
include_once("connection.php");

// get count customer
$result = $mysqli->query("SELECT COUNT(*) as `total` FROM `customer`");
$dataCustomer = mysqli_fetch_assoc($result);

// get count pegawai
$result = $mysqli->query("SELECT COUNT(*) as `total` FROM `pegawai`");
$dataPegawai = mysqli_fetch_assoc($result);

// get count barang
$result = $mysqli->query("SELECT COUNT(*) as `total` FROM `barang`");
$dataBarang = mysqli_fetch_assoc($result);

// get count cabang
$result = $mysqli->query("SELECT COUNT(*) as `total` FROM `cabang`");
$dataCabang = mysqli_fetch_assoc($result);

// get count pembayaran
$result = $mysqli->query("SELECT COUNT(*) as `total` FROM `pembayaran`");
$dataPembayaran = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard.css?v=2.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MyLaundry | Dashboard</title>
</head>

<body>
    <div class="sidenav">
        <a href="dashboard.php"><img src="images/Group 11.png"></a><br>
        <br><br><br><br><br>
        <a href="customer.php">Customer</a>
        <a href="pegawai.php">Pegawai</a>
        <a href="barang.php">Barang</a>
        <a href="cabang.php">Cabang</a>
        <a href="pembayaran.php">Pembayaran</a>
        <label><a href="logout.php" type="button" class="btn btn-danger mx-5 col-8">Logout</a></label>
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

        <div class="box1">
            <p>
                Hello, <?php echo $_SESSION['namapegawai'] ?><br><img src="images/box1.png" width="300px">
                <a href="backup-data.php">
                    <button type="button" class="btn btn-success col-10">Backup Data</button>
                </a>
            </p>
        </div>
        <div class="box2">
            <p>Terdapat</p><label><br><?php echo $dataCustomer['total']; ?></label>
            <p><br>Orang Customer</p>
        </div>
        <div class="box3">
            <p>Terdapat</p><label><br><?php echo $dataPegawai['total']; ?></label>
            <p><br>Orang Pegawai</p>
        </div>
        <div class="box4">
            <p>Terdapat</p><label><br><?php echo $dataBarang['total']; ?></label>
            <p><br>Data Barang</p>
        </div>
        <div class="box5">
            <p>Terdapat</p><label><br><?php echo $dataCabang['total']; ?></label>
            <p><br>Data Cabang</p>
        </div>
        <div class="box6">
            <p>Terdapat</p><label><br><?php echo $dataPembayaran['total']; ?></label>
            <p><br>Data Pembayaran</p>
        </div>
    </div>
    <div class="text-footer">
        Copyright © 2021. MyLaundry. All RIght Reserved
    </div>
</body>

</html>