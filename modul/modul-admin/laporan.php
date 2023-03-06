<!-- style="background: #263253;" -->
<!-- style="background: #1A2035;" -->
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
									Ardiansyah
								<span class="user-level">Masyarakat</span>
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
							<a href="logout.php">
								<i class="nav-icon fas fa-lock"></i>
								<p>Close</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES ('12345', 'petugas', 'petugas', MD5('petugas'), '12345', 'petugas');
		INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES ('54321', 'admin', 'admin', MD5('admin'), '54321', 'admin');
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Anda berada di menu pengaduan</h4>
					</div>
                    <div class="page-category"><h4>Buat pengaduan anda</h4></div>
                    <div class="col-md-12" style="margin-left: -15px;">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Buat pengaduan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fas fa-edit"></i>
											  Add report
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content" style="background: #263253;">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold" style="font-weight: 900;"><b>New</b></span> 
														<span class="fw-light" style="font-weight: 900;"><b>report</b></span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small" style="font-weight: 900;"><b>Create a new report</b></p>
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default" style="background: #1A2035;">
																	<label>Nama</label>
																	<input id="addName" type="text" class="form-control" placeholder="Masukan nama">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default" style="background: #1A2035;">
																	<label>pengaduan</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="Masukan pengaduan">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Isi laporan</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="Masukan isi laporan">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default" style="background: #1A2035;">
																	<label>Gambar</label>
																	<input id="addPosition" type="file" class="form-control" placeholder="Masukan pengaduan">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button  type="button" id="addRowButton" class="btn btn-secondary">Add</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Name</th>
													<th>Pengaduan</th>
													<th>Isi laporan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
											<tr>
													<td>Ardiansyah</td>
													<td>Bencana alam</td>
													<td>Terjadi banjir di daerah papua setinggi 120cm, semua penduduk perlu di evakuasi</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
																<i class="fa fa-edit"></i>
															</button>
															<!-- <button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" id="alert_demo_7" data-original-title="Remove">
																<i class="far fa-trash-alt"></i>
															</button> -->
															<button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" id="alert_demo_8" data-original-title="Remove">
																<i class="far fa-trash-alt"></i>
															</button>		
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
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