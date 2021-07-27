<?php
include_once("connection.php");
// Display selected user data based on id
// Getting id from url
$idbarang = $_GET['idbarang'];
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE idbarang='$idbarang'");

while ($user_data = mysqli_fetch_array($result)) {

    $idbarang = $user_data['idbarang'];
    $idcustomer = $user_data['idcustomer'];
    $namabarang = $user_data['namabarang'];
    $jumlahbarang = $user_data['jumlahbarang'];
    $beratbarang = $user_data['beratbarang'];
}
?>

<?php
if (isset($_POST['update'])) {

    $idbarang = $_POST['idbarang'];
    $idcustomer = $_POST['idcustomer'];
    $namabarang = $_POST['namabarang'];
    $jumlahbarang = $_POST['jumlahbarang'];
    $beratbarang = $_POST['beratbarang'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE `barang` SET `idcustomer`='$idcustomer',`namabarang`='$namabarang', `jumlahbarang`='$jumlahbarang', `beratbarang`='$beratbarang' WHERE `idbarang`='$idbarang'");

    // Redirect to homepage to display updated user in list
    header("Location: barang.php");
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
            <div id="banner">
                <h1>Edit Data Barang</h1>
            </div>

            <form name="update_barang" method="post" action="">
                <table class="table table-bordered w-50 mt-5">
                    <tbody>
                        <tr>
                            <td>Id Barang</td>
                            <td><input type="text" name="idbarang" value="<?php echo $idbarang; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Id Customer</td>
                            <td>
                                <select name="idcustomer" required="">
                                    <option selected>~Pilih ID Customer~</option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM customer ORDER BY idcustomer");
                                    while ($data = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?= $data['idcustomer'] ?>" <?php if ($data['idcustomer'] == $idcustomer) echo "selected"
                                                                                    ?>><?= $data['idcustomer'] ?></option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" name="namabarang" required="" value="<?php echo $namabarang ?>"></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td><input type="text" name="jumlahbarang" required="" value="<?php echo $jumlahbarang ?>"></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td><input type="text" name="beratbarang" required="" value="<?php echo $beratbarang ?>"></td>
                        </tr>
                        <tr>
                            <td><a href="barang.php" class="btn btn-danger mb-3">Back</a></td> <input type="hidden" name="idbarang" value=<?php echo $_GET['idbarang']; ?>></td>

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