<?php 
include('../../koneksi.php');
if(isset($_POST['cek'])){
    $pilihan = $_POST['pilihan'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($pilihan == 'masyarakat'){
        $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password' AND verifikasi = 1");
        $r = mysqli_num_rows($q);
        if($r == 1){
            $d = mysqli_fetch_object($q);
            @session_start();
            $_SESSION['nik'] = $d->nik;
            $_SESSION['username'] = $d->username;
            $_SESSION['nama'] = $d->nama;
            $_SESSION['telp'] = $d->telp;
            $_SESSION['level'] = 'masyarakat';
            @header('location: ../modul-masyarakat/');
        } else {
            echo '<div class="alert alert-danger" role="alert">Apakah  <a href="register.php" class="alert-link">kamu sudah registrasi?</a>. jika sudah, periksa kembali data anda!! </div>';
            // echo '<div class="alert alert-danger" role="alert">Data salah atau belum di verifikasi</div>';
            //echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-white">Data salah atau belum di verifikasi</strong></div>';
        }
    } else if ($pilihan == 'petugas'){
        $q = mysqli_query($con, "SELECT * FROM `petugas` WHERE username = '$username' AND password = '$password'");
        $r = mysqli_num_rows($q);
        if ($r == 1){
            $d = mysqli_fetch_object($q);
            @session_start();
            $_SESSION['username'] = $d->username;
            $_SESSION['level'] = $d->level;
            $_SESSION['id_petugas'] = $d->id_petugas;
            @header('location:../../modul/modul-petugas/');
        }
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
    <title>SISPEMAS</title>
</head>
<body>
    <form action="" method="POST">
    <div class="container" style="margin-top: 100px; margin-left: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-warning">
                            <label for="" style="color: #fff;"><i class="fas fa-user text-white"></i>  Login menu</label>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password">
                        </div>

                        <label for="pilihan">Login sebagai</label>
                        <div class="form-group">
                            <select name="pilihan" class="form-control" id="pilihan">
                                <option value="masyarakat">masyarakat</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button name="cek" type="submit" style="margin-top: 15px; " class="btn btn-login form-control btn-outline-warning">Login</button>		
                        </div>
                    </div>
                </div>

                <div class="text-center form-group mb-0" style="margin-top: 15px;">
                    Belum punya akun? <a href="register.php" style="color: black;">daftar disini</a>
                </div>

            </div>
        </div>
    </div>
    </form>

    <!--   Core JS Files   -->
	<script src="../../template_admin/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../template_admin/assets/js/core/popper.min.js"></script>
	<script src="../../template_admin/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../template_admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../template_admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../template_admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../template_admin/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../template_admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../template_admin/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../template_admin/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../../template_admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../../template_admin/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../template_admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../template_admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../template_admin/assets/js/atlantis.min.js"></script>
</body>
</html>
                