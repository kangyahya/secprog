<?php 

if (!isset($nim)) die("Error #7h7h5g5g4 NIM belum didefinisikan.");
$s = "SELECT * from tb_ijta where nim = '$nim'";
$q = mysqli_query($cn,$s) or die("GetLoginData#cbb54ac6 ".mysqli_error($cn));

if (mysqli_num_rows($q) == 1) {
  $d = mysqli_fetch_array($q);

  $nim = $d['nim'];
  $nama_mahasiswa = $d['nama_mahasiswa'];
  $sex = $d['sex'];
  $pin = $d['pin'];
  $nirl = $d['nirl'];
  $qrcode = $d['qrcode'];
  $pict = $d['pict'];
  $temtala = $d['temtala'];
  $temtala_eng = $d['temtala_eng'];
  $nik = $d['nik'];
  $sk_lulus = $d['sk_lulus'];
  $mk1 = $d['mk1'];
  $mk2 = $d['mk2'];
  $mk3 = $d['mk3'];
  $mk4 = $d['mk4'];
  $mk5 = $d['mk5'];
  $mk6 = $d['mk6'];
  $mk7 = $d['mk7'];
  $mk8 = $d['mk8'];
  $mk9 = $d['mk9'];
  $mk10 = $d['mk10'];
  $mk11 = $d['mk11'];
  $mk12 = $d['mk12'];
  $mk13 = $d['mk13'];
  $mk14 = $d['mk14'];
  $mk15 = $d['mk15'];
  $mk16 = $d['mk16'];
  $mk17 = $d['mk17'];
  $mk18 = $d['mk18'];
  $mk19 = $d['mk19'];
  $mk20 = $d['mk20'];
  $mk21 = $d['mk21'];
  $mk22 = $d['mk22'];
  $mk23 = $d['mk23'];
  $mk24 = $d['mk24'];
  $mk25 = $d['mk25'];
  $mk26 = $d['mk26'];
  $mk27 = $d['mk27'];
  $mk28 = $d['mk28'];
  $mk29 = $d['mk29'];
  $mk30 = $d['mk30'];
  $mk31 = $d['mk31'];
  $mk32 = $d['mk32'];
  $mk33 = $d['mk33'];
  $mk34 = $d['mk34'];
  $mk35 = $d['mk35'];
  $mk36 = $d['mk36'];
  $mk37 = $d['mk37'];
  $mk38 = $d['mk38'];
  $mk39 = $d['mk39'];
  $mk40 = $d['mk40'];
  $mk41 = $d['mk41'];
  $mk42 = $d['mk42'];
  $mk43 = $d['mk43'];
  $mk44 = $d['mk44'];
  $mk45 = $d['mk45'];
  $ipk = $d['ipk'];
  $judul = $d['judul'];
  $judul_eng = $d['judul_eng'];
  $tgl_lulus = $d['tgl_lulus'];
  $tgl_lulus_eng = $d['tgl_lulus_eng'];
  $tgl_ttd = $d['tgl_ttd'];
  $tgl_ttd_eng = $d['tgl_ttd_eng'];
  $no_skpi = $d['no_skpi'];
  $bln_skpi = $d['bln_skpi'];
  $thn_skpi = $d['thn_skpi'];
  $s1 = $d['s1'];
  $s2 = $d['s2'];
  $s3 = $d['s3'];
  $s4 = $d['s4'];
  $s5 = $d['s5'];
  $s6 = $d['s6'];
  $s7 = $d['s7'];
  $s8 = $d['s8'];
  $s9 = $d['s9'];
  $s10 = $d['s10'];
  $p1 = $d['p1'];
  $p1_ing = $d['p1_ing'];
  $p2 = $d['p2'];
  $p2_ing = $d['p2_ing'];
  $p3 = $d['p3'];
  $p3_ing = $d['p3_ing'];
  $p4 = $d['p4'];
  $p4_ing = $d['p4_ing'];
  $p5 = $d['p5'];
  $p5_ing = $d['p5_ing'];
  $qe5 = $d['qe5'];
  $prodi = $d['prodi'];
  $tahun_angkatan = $d['tahun_angkatan'];
  $no_akred = $d['no_akred'];
  $jenjang = $d['jenjang'];
  $jenjang_eng = $d['jenjang_eng'];
}

switch ($prodi) {
  case 'TI':$program_studi="Teknik Informatika"; $program_studi_eng="Informatics Engineering";break;
  case 'KA':$program_studi="Komputerisasi Akuntansi"; $program_studi_eng="Computerized Accounting";break;
  case 'MI':$program_studi="Manajemen Informatika"; $program_studi_eng="Informatics Management";break;
  case 'RPL':$program_studi="Rekayasa Perangkat Lunak"; $program_studi_eng="Software Engineering";break;
  case 'SI':$program_studi="Sistem Informasi"; $program_studi_eng="Information Systems";break;
  default:$program_studi="Belum terdefinisi. lihat user_var.php"; $program_studi_eng="???";break;
}

$gelar = "Ahli Madya Komputer (A.Md.Kom)";
if (trim(strtolower($jenjang))=="strata i") $gelar = "Sarjana Komputer (S.Kom)";

?>