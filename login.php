<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Login Secure Programming</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="login">
      <h3 class="text-center text-white pt-5">Login Form</h3>
      <!-- //Notifikasi -->
      <div class="text-center">
        <?php if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger" role="alert">
              Login Gagal, Username dan Password salah !!
            </div>
          <?php }elseif ($_GET['pesan'] == "logout") { ?>
            <div class="alert alert-warning" role="alert">
              Anda telah logout !!
            </div>
          <?php }elseif ($_GET['pesan'] == "belum_login") { ?>
            <div class="alert alert-info" role="alert">
              Anda harus login untuk mengakses halaman Dashboard !!
            </div>
          <?php } }?>
      </div>
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
              <form id="login-form" class="form" action="cek_login.php" method="post">
                <h3 class="text-center text-info">Login</h3>
                <div class="form-group">
                  <label for="username" class="text-info">Username:</label><br>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password" class="text-info">Username:</label><br>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" id="submit" class="btn btn-info btn-md" value="Login">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
