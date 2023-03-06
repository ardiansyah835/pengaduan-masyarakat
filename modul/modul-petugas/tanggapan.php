<?php
session_start();
include('../../koneksi.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    } else {
        $id_petugas = $_SESSION['id_petugas'];
    }
}
// tambah tanggapan
if (isset($_POST['tambah_tanggapan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $id_petugas = $_POST['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $q = "INSERT INTO `tanggapan` (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('','$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')";
    $r = mysqli_query($con, $q);
}
// hapus tanggapan
if (isset($_POST['hapusTanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    mysqli_query($con, "DELETE FROM `tanggapan` WHERE id_tanggapan = '$id_tanggapan'");
}
// update tanggapan
if (isset($_POST['ubahTanggapan'])) {
    $id_tanggapan =  $_POST['id_tanggapan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    mysqli_query($con, "UPDATE `tanggapan` SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE `id_tanggapan` = '$id_tanggapan'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../template_admin/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../template_admin/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../template_admin/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../template_admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../template_admin/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../template_admin/assets/css/demo.css">
</head>
<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="index.html" class="logo">
					<h3 style="margin-top: 20px; color: #fff;">SISPEMAS</h3>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../template_admin/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#" aria-expanded="true">
								<span>
									<!-- nama -->
									<b><?= $_SESSION['username'] ?></b>
									<!-- level -->
									<span class="user-level"><?= $_SESSION['level'] ?></span>
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
					<li class="nav-item">
							<a href="index.php">
								<i class="nav-icon fas fa-home"></i>
								<p>Home</p>
							</a>
							
						</li>
						<li class="nav-item">
							<a href="tanggapan.php">
								<i class="nav-icon fas fa-share"></i>
								<p>Tanggapan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="verifikasi.php">
								<i class="nav-icon fas fa-info"></i>
								<p>Verifikasi</p>
							</a>
							
						</li>
						<li class="nav-item">
							<a href="logout.php">
								<i class="nav-icon fas fa-lock"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Anda berada di menu tanggapan</h4>
					</div>
                    <div class="container-fluid">
                <div class="row">
                    <?php if($_SESSION['level'] !== 'masyarakat') { ?>
                    <div class="col-sm-3" style="padding:0.5%;">
                        <button data-toggle="modal" data-target="#modal-lg" class="btn" style="background: #263253; margin-left: -7px; color: #fff;"><i class="fa fa-pen"></i>&nbsp;tambah tanggapan</button>
                    </div>
                    <?php } ?> 
                </div>
                <div class="card" style="margin-left: -15px; margin-top: 25px;">
                    <div class="card-header">
                        Tabel Tanggapan <br>
                        <!-- modal start -->
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background: #263253;">
                                    <div class="modal-header">
                                        Tambah Tanggapan
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <label for="id_pengaduan"> Pilih Id Pengaduan</label>
                                            <select name="id_pengaduan" class="form-control">
                                                <?php
                                                $q = "SELECT * FROM pengaduan JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik";
                                                $r = mysqli_query($con, $q);
                                                while ($d = mysqli_fetch_object($r)) { ?>
                                                    <option value="<?= $d->id_pengaduan ?>"><?= $d->id_pengaduan . '|' . $d->nik . '|' . $d->nama ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            <label for="tgl_tanggapan">Tanggal</label>
                                            <input class="form-control" type="date" name="tgl_tanggapan">
                                            <label for="tanggapan">Beri Tanggapan</label>
                                            <textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"></textarea>
                                            <label for="id_petugas">ID Petugas</label>
                                            <input name="id_petugas" type="text" class="form-control" style="background: #1A2035;" value="<?= $id_petugas ?>" readonly>
                                            <br>
                                            <button name="tambah_tanggapan" type="submit" class="btn" style="background-color: #1A2035; color: #fff;">simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal ends -->
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pengaduan</th>
                                    <th>tanggal Tanggapan</th>
                                    <th>Isi Tanggapan</th>
                                    <th>Petugas</th>
                                    <th>hapus</th>
                                    <th>edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $q = "SELECT * FROM `tanggapan` JOIN `petugas` JOIN `pengaduan`
                             WHERE tanggapan.id_petugas = petugas.id_petugas 
                             AND tanggapan.id_pengaduan = pengaduan.id_pengaduan";
                                $r = mysqli_query($con, $q);
                                while ($d = mysqli_fetch_object($r)) { ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $d->id_pengaduan ?>
                                        </td>
                                        <td>
                                            <?= $d->tgl_tanggapan ?>
                                        </td>
                                        <td>
                                            <?= $d->tanggapan ?>
                                        </td>
                                        <td>
                                            <?= $d->nama_petugas ?>
                                        </td>
                                        <td>
                                            <?php if ($_SESSION['level'] != 'masyarakat') { ?>
                                                <form action="" method="post"><input type="hidden" name="id_tanggapan" value="<?= $d->id_tanggapan ?>"><button name="hapusTanggapan" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>&nbsp;hapus</button></form>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($_SESSION['level'] != 'masyarakat') { ?>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg<?= $d->id_pengaduan ?>" class="btn btn-success"><i class="fa fa-pen"></i>&nbsp;Edit</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-lg<?= $d->id_pengaduan ?>">
                                        <div class="modal-dialog modal-lg<?= $d->id_pengaduan ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Edit Pengaduan
                                                </div>
                                                <form action="" method="post">
                                                    <div class="modal-body">
                                                        <input class="form-control" name="id_tanggapan" type="hidden" value="<?= $d->id_tanggapan ?>">
                                                        <label for="id_pengaduan">ID Pengaduan</label><br>
                                                        <select class="form-control" name="id_pengaduan">
                                                            <?php
                                                            $result = mysqli_query($con, "SELECT * FROM `pengaduan` JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik");
                                                            while ($data = mysqli_fetch_object($result)) { ?>
                                                                <option value="<?= $data->id_pengaduan ?>" <?php if ($d->id_pengaduan == $data->id_pengaduan) {
                                                                                                                echo 'selected';
                                                                                                            } ?>><?= $data->id_pengaduan . '|' . $data->nik . '|' . $data->nama ?></option>
                                                            <?php } ?>
                                                        </select><br>
                                                        <label for="tgl_tanggapan">Tanggal Tanggapan</label>
                                                        <input class="form-control" name="tgl_tanggapan" class="form-control" type="date" name="" value="<?= $d->tgl_tanggapan ?>">
                                                        <label for="tanggapan">Tanggapan</label>
                                                        <textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"><?= $d->tanggapan ?></textarea>
                                                        <br>
                                                        <button name="ubahTanggapan" type="submit" class="btn btn-info">Update</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									Cookies
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2023, made with <i class="fa fa-heart heart text-danger"></i> by Ardiansyah
					</div>				
				</div>
			</footer>
		</div>
		
	</div>
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