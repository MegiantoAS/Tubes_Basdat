<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-2">

                </div>
            </div>
            <img class="label" src="./images/Group 11.png">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 ">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(./images/login.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <h2 class="m-0 text-custom">LOGIN</h2>
                                    <img class="labelog mb-3" src="./images/Group 11.png">
                                </div>
                            </div>
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "Gagal login data tidak ditemukan!") {
                                    echo "Login gagal! dan password salah";
                                } elseif ($_GET['pesan'] == "logout") {
                                    echo "Anda Berhasil logout";
                                } elseif ($_GET['pesan'] == "belum_login") {
                                    echo "Anda Harus daftar";
                                }
                            }
                            ?>
                            <form method="POST" action="login.php" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="Id_penjual">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="admin" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="pass">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="admin" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="TblLogin" value="Login" class="form-control btn btn-primary submit px-3">Login</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>