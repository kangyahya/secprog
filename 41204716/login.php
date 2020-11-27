<?php
# ===================================================
# SIGN IN WITH GOOGLE TUTORIAL
# ===================================================
# 1. DOWNLOAD FILE AWAL (PHP + SQL)
# 2. TEMPATKAN FILE PHP PADA FOLDER PROJECT
# 3. BUAT DATABASE MYSQL DAN IMPOR FILE SQLNYA
# 4. BUKA CONSOLE.DEVELOPERS.GOOGLE.COM
# 5. BUAT OPEN AUTHENTICATION (OAUTH)
# 6. BUAT CREDENTIALS
# 7. SIMPAN CLIENT-ID DAN CLIENT-SECRET
# 8. DOWNLOAD DAN INSTALL COMPOSER
# 9. JALANKAN COMPOSER, CHANGE KE DIRECTORI FOLDER PROJECT
# 10. DOWNLOAD GOOGLE_API VIA COMPOSER
# 
# ===================================================
# 11. DATA DARI GOOGLE
$client_id = "555052709247-vum374s14lhb8aac3c8s1t69kedjvs1j.apps.googleusercontent.com";
$client_secret = "uJZF05DohPLsg9RDdKHXCGSB";
$client_redirect = "http://localhost/ikmi/pmb2/index.php?p=daftar3";

# ===================================================
# 12. INISIALISASI VARIABEL AWAL
$login_button = "";
$pesan_error = "";
$img_button = "<img src='sign_in_with_google.png' width='400px'>";

$access_token = "";
$nama_depan = "";
$nama_belakang = "";
$user_email = "";
$user_image = "";
$user_gender = "";
$nama_lengkap = "";
$is_registered_email = 0;

# ===================================================
# 13. KITA PAKAI FILE-FILE GOOGLE API
require_once 'vendor/autoload.php';

# ===================================================
# 14. BUAT KONEKSI BARU GOOGLE API
$google_client = new Google_Client();

$google_client->setClientId($client_id);
$google_client->setClientSecret($client_secret);
$google_client->setRedirectUri($client_redirect);

# ===================================================
# 15. TENTUKAN SCOPE SESUAI DG OAUTH
$google_client->addScope('email');
$google_client->addScope('profile');



# ===================================================
# 16. JIKA KITA MENDAPAT DATA DARI GOOGLE VIA GET METHOD
if(isset($_GET["code"])){

	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	# ===================================================
	# 17. JIKA TOKEN ADA DAN TIDAK ERROR
	if(!isset($token['error'])){
		$google_client->setAccessToken($token['access_token']);
		$access_token = $token['access_token'];

		$google_service = new Google_Service_Oauth2($google_client);
		$data = $google_service->userinfo->get();

		if(!empty($data['given_name'])) $nama_depan = $data['given_name'];
		if(!empty($data['family_name'])) $nama_belakang = $data['family_name'];
		if(!empty($data['email'])) $user_email = $data['email'];
		if(!empty($data['gender'])) $user_gender = $data['gender'];
		if(!empty($data['picture'])) $user_image = $data['picture'];

		$nama_lengkap = "$nama_depan $nama_belakang";

		# ===================================================
		# 18. SET SESSION
		$_SESSION['access_token'] = $access_token;
		$_SESSION['user_email'] = $user_email;

		# ===================================================
		# 19. CEK APAKAH EMAIL SUDAH ADA DI TB_USER ?
		# DEBUG SEMENTARA: EMAIL BELUM ADA DI TB_USER
		$is_registered_email = 0; 

		# ===================================================
		# INSERT TB_USER IF EMAIL BELUM TERDAFTAR
		# OR UPDATE LOGIN_COUNT TB_USER IF EMAIL SUDAH ADA
		if ($is_registered_email) {
			# ===================================================
			# 20.A. UPDATE LOGIN_COUNT

		}else{
			# ===================================================
			# 20.B. INSERT NEW USER

		}



	}else{
		# ===================================================
		# 21. JIKA TOKEN ADA TAPI TERDAPAT ERROR
		$pesan_error= "<br>Token error : ".$token['error'];
	}
}


# ===================================================
# 22. TAMPILAN AWAL (KITA BELUM MENDAPAT DATA DARI GOOGLE VIA GET METHOD)
if(!isset($_SESSION['access_token'])) {
	$link_ke_google = $google_client->createAuthUrl();
	$login_button = "<a href='$link_ke_google'>$img_button</a>";
}


# ===================================================
# 23. OLAH PESAN_ERROR AGAR BERWARNA MERAH DAN BOLD
if ($pesan_error!="") $pesan_error = "<h3 style='color=red'><b>$pesan_error</b></h3>";

?>

<!-- OPTIONAL BOOTSTRAP DESAIN UNTUK TAMPILAN -->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container">

	<!-- 24. TAMPILKAN PESAN ERROR DISINI JIKA ADA -->
	<?=$pesan_error?>

	<h4 align="center">Silahkan login via Google !</h4>
	<br />
	<div class="panel panel-default">
		<?php
		# ===================================================
		# 25.A. JIKA LOGIN BUTTON TIDAK KOSONG -> TAMPILKAN LOGIN BUTTON
		if($login_button!=""){
			echo '<div align="center">'.$login_button . '</div>';


		}else{
		# ===================================================
		# 25.B. JIKA KOSONG -> TAMPILKAN EMBED WELCOME LOGIN

		?>

		<div class="panel-heading" align="center">Selamat Datang <?=$nama_lengkap?>!</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-5" align="center">
					<img src="<?=$user_image?>" class="img-responsive img-circle img-thumbnail"/>
					<p>Email Anda : <?=$user_email?></p>
					<a href="" class="btn btn-primary btn-block" onclick="return confirm('Anda menekan tombol Next.')">Next</a>
				</div>
			</div>
		</div>
	


		<!-- 26. JANGAN LUPA KURAWAL TUTUP UNTUK MENUTUP EMBED HTML -->
		<?php } ?>
	</div>
</div>