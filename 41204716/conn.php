<?php
// koneksi db =============================================
$online_version = 1;
if ($_SERVER['SERVER_NAME'] == "localhost") $online_version = 0;


if ($online_version) {

	die("Database Online MYSQL belum terdefnisi, lihat File Konfigurasi!");
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "db_secprog";
}else{
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "db_secprog";
}

$cn = new mysqli($db_server, $db_user, $db_pass, $db_name);
// koneksi db =============================================



// penanggalan =============================================
date_default_timezone_set("Asia/Jakarta");
$tanggal_skg = date("Y-m-d");
$tanggaljam_skg = date("Y-m-d H:i:sa");
$jam_skg = date("H:i:sa");
// penanggalan =============================================


$link_back = "<a href='javascript:history.go(-1)'>Kembali</a>";
$btn_back = "<a href='javascript:history.go(-1)'><button class='btn btn-primary'>Kembali</button></a>";




?>
