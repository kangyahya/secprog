<?php
session_start();
if ($_SESSION['status']!='login') {
  header('location:login.php?pesan=belum_login');
}
include 'inc/constant.php';
include 'inc/connection.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}else {
  $page = '';
}
if (isset($_GET['op'])) {
  $op = $_GET['op'];
}else {
  $op = '';
}
if ($page == "") {
  if ($op == "") {
    $page = MODULE_PATH . 'dashboard/dashboard';
  }else {
    $page = $op;
  }
} else {
  if (preg_match('/_/i', $page)) {
    $modname = explode('_',$page);
    $page = MODULE_PATH . $modname[0]. '/' . $page;
  }else {
    $page = MODULE_PATH . $page. '/' . $page;
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard Secure Programming</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
      <a href="#" class="navbar-brand">Secure Programming</a>
      <div class="icon ml-auto">
        <h5>
          <a href="logout.php" class="text-white">Logout</a>
        </h5>
      </div>
    </nav>
    <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a href="?page=dashboard" class="nav-link active text-white">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-white">Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 p-5 pt-2">
        <?php
        if (!file_exists($page.'.php')) {
          echo "Module Tidak ditemukan";
        } else {
          include $page.'.php';
        }
         ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="dist/sweetalert.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
