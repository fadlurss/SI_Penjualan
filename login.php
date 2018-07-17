<?php
    include "admin/config.php";
    if(isset($_POST["submit"])){
        $username = htmlentities(strip_tags(trim($_POST["username"])));
        $password = htmlentities(strip_tags(trim($_POST["password"])));
        $pass = md5($password);
        $pesan_error = "";

        if(empty($username)){
            $pesan_error .= "Username tidak boleh kosong!";
        }
        if(empty($password)){
            $pesan_error .= "Password tidak boleh kosong";
        }

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$pass'";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) == 0 ) {
            $pesan_error .= "Username dan Password tidak sesuai";
        }

        if($pesan_error === ""){
            $_SESSION["username"] = "$username";
            echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
        }

    } else {
        $pesan_error = "";
        $username = "";
        $password = "";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login SI Penjualan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" enctype="multipart/form-data" method="post">
                    <span class="login100-form-title p-b-26">
                        Welcome
                    </span>
                    <span class="login100-form-title p-b-48">
                        SI Penjualan
                    </span>
                    <?php
                        if($pesan_error !== ""){
                            echo "<div class=\"error\">$pesan_error </div>";
                        }
                    ?>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" value="<?= $username ?>">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" value="<?= $password ?>">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Don’t have an account?
                        </span>
                        <a class="txt2" href="#">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
