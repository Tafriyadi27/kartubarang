<?php
session_start();
if (!isset($_SESSION["id"]))
	header("Location: views/login/index.php");
?>
<?php include_once('function.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Barang/testing</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="library/autonumeric/autoNumeric.js"></script>
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}
	</style>
	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<?php
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$halaman = 10;
		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
		$total = $db->query("SELECT * FROM kartu_barang");
		$pages = ceil($total->num_rows / $halaman);
		$sql = "SELECT * FROM kartu_barang LIMIT $mulai, $halaman";
		$res = $db->query($sql);
		if ($res) {
	?>
			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									<h2>Kartu Barang</h2>
								</div>
								<div class="col-sm-6">
									<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Barang</span></a>
									<a href="index.php" class="btn btn-danger"><span>LogOut</span></a>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col" class="col-tanggal">Tanggal</th>
									<th scope="col" class="col-masuk">Masuk</th>
									<th scope="col" class="col-keluar">Keluar</th>
									<th scope="col" class="col-sisa">Sisa</th>
									<th scope="col" class="col-keterangan">Keterangan</th>
									<th scope="col" class="col-keterangan">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = $mulai + 1;
								while ($data = $res->fetch_assoc()) {
									$tanggal = $data['tanggal'];
									$formattanggal = date('d-m-Y', strtotime($tanggal));
								?>
									<tr>
										<th class="align-middle"><?= $no ?></th>
										<td class="align-middle"><?= $formattanggal ?></td>
										<td class="align-middle"><?= $data['masuk'] ?></td>
										<td class="align-middle"><?= $data['keluar'] ?></td>
										<td class="align-middle"><?= $data['sisa'] ?></td>
										<td class="align-middle"><?= $data['keterangan'] ?></td>
										<td>
											<a href="views/pages/ProductEdit.php?id=<?= urlencode(openssl_encrypt(
																						$data['no'],
																						'aes-128-cbc',
																						$_SESSION["passphrase"],
																						0,
																						$_SESSION["iv"]
																					)) ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
											<a href="views/pages/ProductConfirmDelete.php?id=<?= urlencode(openssl_encrypt(
																									$data['no'],
																									'aes-128-cbc',
																									$_SESSION["passphrase"],
																									0,
																									$_SESSION["iv"]
																								)) ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
										</td>
									</tr>
								<?php
									$no++;
								}
								?>
							</tbody>
						</table>
						<?php echo $db->error; ?>
						<?php for ($i = 1; $i <= $pages; $i++) { ?>
							<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

						<?php }

						?>
					</div>
				</div>
		<?php
			$res->free();
		} else
			echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
	} else
		echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
		?>
		<!-- Tambah Data Modal -->
		<div id="addEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="./views/pages/ProductSave.php">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
							<!-- Tanggal-->
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Tanggal</label>
								<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo date('d-m-Y'); ?>" readonly />
							</div>

							<!-- Masuk -->
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Masuk</label>
								<input type="text" class="form-control" name="masuk" value="" required />
							</div>

							<!-- Keluar-->
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Keluar</label>
								<input type="text" class="form-control" name="keluar" value="" required />
							</div>

							<!-- Keterangan-->
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Keterangan</label>
								<input type="text" class="form-control" name="keterangan" id="exampleInputEmail1" aria-describedby="emailHelp" required />
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-primary" name="TblSimpan" value="Tambah Data"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Save Data Modal -->
		<div id="savedata" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<?php
					if (isset($_POST["TblSimpan"])) {
						$db = dbConnect();
						if ($db->connect_errno == 0) {
							// Bersihkan data
							$tanggal  = $db->escape_string($_POST["tanggal"]);
							$masuk       = $db->escape_string($_POST["masuk"]);
							$keluar        = $db->escape_string($_POST["keluar"]);
							$keterangan = $db->escape_string($_POST["keterangan"]);
							$masuktoint = (int)$masuk;
							$keluartoint = (int)$keluar;
							$sisa = $masuktoint - $keluartoint;
							// Susun query insert
							$sql = "INSERT INTO kartu_barang(tanggal,masuk,keluar,sisa,keterangan)
			  VALUES('$tanggal','$masuk','$keluar','$sisa','$keterangan')";
							// Eksekusi query insert
							$res = $db->query($sql);
							if ($res) {
								if ($db->affected_rows > 0) { // jika ada penambahan data
					?>
									<!--  <br>
                <br>
                <br>
                <br>
                <center>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card user-card-full">
                                                <div class="card-block">
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Data berhasil di simpan</h6>
                                  
                                                    <br>
                                                  
                                                    <a class="btn btn-primary" href="ProductData.php" role="button">Kembali Ke Menu Awal</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                    <div class="box">
                        <div style="color: white">Data berhasil disimpan.</div><br>
                        <a href="ProductData.php"><button>Kembali Ke Menu Awal</button></a>
                    </div>
                <?php
								}
							} else {
				?>
                <div class="box">
                    <div style="color: white">Data gagal disimpan karena adanya kesalahan dalam memasukan data. Silahkan Cek Kembali</div><br>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                </div> --!? -->

						<?php
							}
						} else
							echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
					}
						?>
				</div>
			</div>
		</div>

			</div>

</body>

</html>