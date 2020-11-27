<?php
session_start();

include "conn.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>IJTA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/ijta.css">
	<script type="text/javascript" src="assets/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
</head>
<body>
	<div class="col-md-10" style="margin: 0 auto">
		<h1>Heelo World IJTA!</h1>
		<form method="get">
			Filter by NIM/Nama: <input type="text" name="filter_by">
			<button type="submit" name="btn_filter_by">Filter</button>
		</form>
		<table width="100%" class="table-hover table-bordered">
			<thead>
				<th><a href="?">NO</a></th>
				<th><a href="?order_by=tahun_angkatan">TAHUN</a></th>
				<th><a href="?order_by=prodi">PRODI</a></th>
				<th><a href="?order_by=nim">NIM</a></th>
				<th><a href="?order_by=nama_mahasiswa">NAMA MAHASISWA</a></th>
				<th>AKSI</th>
			</thead>


			<?php
			$order_by = "";
			if(isset($_GET['order_by']))$order_by = " order by " . $_GET['order_by'];

			$filter_by = " WHERE 1 ";
			if(isset($_GET['filter_by'])) {
				$filter_by = $_GET['filter_by'];
				$filter_by = " WHERE nim like '%$filter_by%' or nama_mahasiswa like '%$filter_by%' ";
			}


			$s = "SELECT
			tahun_angkatan,
			prodi,
			nim,
			nama_mahasiswa
			FROM p3_ijta
			$filter_by
			$order_by
			";
			$q = mysqli_query($cn,$s) or die("Error #cbb54ac6 Can't Get Data Table.");

			$i=0;
			while ($d = mysqli_fetch_array($q)) {
				$i++;
				$tahun_angkatan = $d['tahun_angkatan'];
				$prodi = $d['prodi'];
				$nim = $d['nim'];
				$nama_mahasiswa = $d['nama_mahasiswa'];
				echo "
				<tr>
					<td class='tdcenter'>$i</td>
					<td class='tdcenter'>$tahun_angkatan</td>
					<td class='tdcenter'>$prodi</td>
					<td class='tdcenter'>$nim</td>
					<td>$nama_mahasiswa</td>
					<td class='tdcenter'>
						<a href=cetak.php?nim=$nim target='_blank'>CETAK</a> |
						<a href='' onclick='return confirm(\"Fitur TAMBAH not ready.\")'>TAMBAH</a> |
						<a href='' onclick='return confirm(\"Fitur EDIT not ready.\")'>EDIT</a> |
						<a href='' onclick='return confirm(\"Fitur HAPUS not ready.\")'>HAPUS</a>
					</td>
				</tr>
				";
			}
			?>



		</table>

	</div>


</body>
</html>
