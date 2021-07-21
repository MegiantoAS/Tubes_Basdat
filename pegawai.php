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
            $result = mysqli_query($mysqli, "SELECT * FROM pegawai where namapegawai like'%".$cari."%'");
           
        }else {
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
            <a class='btn btn-success mt-5' href="#">Tambah</a>
            <form class="form-inline col-sm-2 method='GET'">
                <input class="form-control mr-sm-2" name="cari"  type="search" placeholder="Cari Nama Pegawai" aria-label="Search">
                <button class="btn-sm btn-outline-success my-2 my-sm-0" type="submit" action="">Cari</button>
            </form>

            <table class="table table-bordered text-center">
                <br></br>
                <tr>
                <th width=150>ID Pegawai</th> <th width=150>Id Cabang</th> <th width=300>Nama Pegawai</th> <th width=200>Aksi</th>
                </tr>
                <?php  
                    while($user_data = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td><center>".$user_data['idpegawai']."</center></td>";
                        echo "<td><center>".$user_data['idcabang']."</center></td>";
                        echo "<td>".$user_data['namapegawai']."</td>";
                        
                        echo "<td><center><a class='btn btn-success' href='#?idpegawai=$user_data[idpegawai]'>Edit</a> |
                         <a class='btn btn-danger' href='#?idpegawai=$user_data[idpegawai]'>Delete</a></td></tr>";        
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