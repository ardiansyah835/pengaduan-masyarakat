<?php
include('../../koneksi.php');
if (isset($_POST['simpan'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $q = mysqli_query($con, "INSERT INTO `masyarakat` (nik, nama, username, password, telp, verifikasi) VALUES ('$nik', '$nama', '$username', '$password', '$telp', 0)");
    if($q){
        echo '<div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        Registrasi Berhasil Tunggu verifikasi oleh admin
        </div>';
    } else {
        echo 'gagal';
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="../..template_admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <title>SISPEMAS</title>
</head>
<body>
    <form action="" method="post">
    <div class="container" style="margin-top: 100px; margin-left: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-success">
                            <label for="" style="color: #fff;"><i class="fas fa-user-plus text-white"></i>  Register menu</label>
                        </div>

                        <div class="form-group">
                            <label for="">Nik</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan nama" required>
                        </div>

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" required>
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" required>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" required>
                        </div>

                        <div class="form-group">
                            <label for="">Telp</label>
                            <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan nomer" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" style="margin-top: 15px;" class="btn btn-login form-control btn-outline-success" id="reg" name="simpan">Register</button>		
                        </div>
                    </div>
                </div>

                
                <div class="text-center" style="margin-top: 15px;">
                    Sudah punya akun? <a href="index.php" style="color: black;">silahkan login</a>
                </div>

            </div>
        </div>
    </div>
    </form>

    <script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Sweet Alert -->
	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
</body>
</html>