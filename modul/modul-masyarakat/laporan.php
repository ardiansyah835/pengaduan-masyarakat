<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('../../koneksi.php');
if (empty($_SESSION['username'])) {
    @header('location: ../modul-auth/');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    }
}

// Crud
if (isset($_POST['tambahPengaduan'])) {
    $isi_laporan = $_POST['isi_laporan'];
    $tgl = $_POST['tgl_pengaduan'];
    //Upload data
    $ekstensi_diperbolehkan = array('jpg', 'png', 'PNG');
    $foto = $_FILES['foto']['name'];
    print_r($foto);
    $x = explode(".", $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (!empty($foto)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '$foto', '0')";
            $r = mysqli_query($con, $q);
            if ($r) {
                move_uploaded_file($file_tmp, '../../assets/images/masyarakat/' . $foto);
            }
        }
    } else {
        $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '', '0')";
        $r = mysqli_query($con, $q);
    }
}

// hapus pengaduan
if (isset($_POST['hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    if ($id_pengaduan != '') {
        $q = "SELECT `foto` FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
        $r = mysqli_query($con, $q);
        $d = mysqli_fetch_object($r);
        unlink('../../assets/images/masyarakat/' . $d->foto);
    }
    $q = "DELETE FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
    $r = mysqli_query($con, $q);
}

// rubah status pengaduan
if (isset($_POST['proses_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];
    $q = "UPDATE `pengaduan` SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'";
    $r = mysqli_query($con, $q);
}
?>
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
				
				<a href="index.php" class="logo">
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
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
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
							<a href="laporan.php">
								<i class="nav-icon fas fa-info"></i>
								<p>Pengaduan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="tanggapan.php">
								<i class="nav-icon fas fa-reply"></i>
								<p>Tanggapan</p>
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
						<h4 class="page-title">Anda berada di menu pengaduan</h4>
					</div>
                    <div class="page-category"><h4>Buat pengaduan anda</h4></div>
                    <!-- Pengaduan start -->
					<div class="container-fluid" style="margin-left: -15px;">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title" style="margin-left: 18px;">Pengaduan</h3><br>
									<?php if ($_SESSION['level'] == 'masyarakat') { ?>

										<div class="card">
											<div class="card-header">
												<button data-toggle="modal" data-target="#modal-lg" class="btn" style="background: #1A2035; color: #fff;">buat pengaduan&nbsp;<i class="fa fa-pen"></i></button>
											</div>
										</div>

                            		<?php } ?>
                                	<div class="modal fade" id="modal-lg">
                                    	<div class="modal-dialog modal-lg" >
                                        	<div class="modal-content" style="background: #263253;">
                                            	<div class="modal-header" style="margin-left: 8px;">
                                                	Buat Pengaduan
                                            	</div>
                                            <div class="modal-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="nik" value="">
                                                    <div class="form-group">
                                                        <label for="isi_laporan">Isi Laporan</label>
                                                        <textarea name="isi_laporan" class="form-control" cols="30" rows="10" placeholder="Masukan pengaduan"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                                                        <input type="date" name="tgl_pengaduan" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    <input type="submit" name="tambahPengaduan" value="simpan" class="btn" style="margin-left: 11px; background: #1A2035; color: #fff;">
                                                </form>
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTablesNya" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Nik</th>
                                                <th>Isi Laporan</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>hapus</th>
                                                <th>proses Pengaduan</th>
                                            </tr>
                                        </thead>
                                        <?php  ?>
                                        <tbody>
                                            <?php
                                            if ($_SESSION['level'] == 'masyarakat') {
                                                $q = "SELECT * FROM `pengaduan` WHERE `nik` = $nik";
                                            } else {
                                                $q = "SELECT * FROM `pengaduan`";
                                            }
                                            $r = mysqli_query($con, $q);
                                            $no = 1;
                                            while ($d = mysqli_fetch_object($r)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d->tgl_pengaduan ?></td>
                                                    <td><?= $d->nik ?></td>
                                                    <td><?= $d->isi_laporan ?></td>
                                                    <td><?php if ($d->foto == '') {
                                                            echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/no-foto.png">';
                                                        } else {
                                                            echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/masyarakat/' . $d->foto . '">';
                                                        } ?></td>
                                                    <td><?= $d->status ?></td>
                                                    <td>
                                                        <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                                            <form action="" method="post"><input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>"><button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php if ($_SESSION['level'] == 'petugas') { ?>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>">
                                                                <select class="form-control" name="status">
                                                                    <option value="0"> 0 </option>
                                                                    <option value="proses"> proses </option>
                                                                    <option value="selesai"> selesai </option>
                                                                </select><br>
                                                                <button type="submit" name="proses_pengaduan" class="btn btn-success form-control">ubah</button>
                                                            </form>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <!-- /.content -->
            </div>
                    <!-- Pengaduan end -->
                    
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
	<!-- Data tables start -->
    <script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 2,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 2,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning" data-original-title="Remove"><i class="far fa-trash-alt" style="margin-left: 5.5px;"></i></button>  </div> </td>';
																																																								   
			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
	<!-- Data tables start -->
	
	<!-- Swal delete start -->
	<script>
		$('#alert_demo_8').click(function(e) {
					swal({
						icon: 'warning',
						title: 'Oops',
						text: "Apakah kamu ingin menghapusnya",
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'Tidak',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya, hapus sekarang',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
							swal("Data berhasil dihapus", {
								title: 'Selamat',
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
						} else {
							swal("Datamu masih tersimpan", {
								icon: 'error',
								title: 'Selamat',
								buttons : {
									confirm : {
										className: 'btn btn-danger'
									}
								}
							});
						}
					});
				})
	</script>
	<!-- Swal delete start -->
</body>
</html>