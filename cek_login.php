<?php
include 'inc/connection.php';
session_start();

foreach ($_POST as $key => $value) {  $_POST[$key] = mysqli_real_escape_string($connect, $value); }
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM admin WHERE username='{$username}' and password = '{$password}'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
  $_SESSION['username'] = $username;
  $_SESSION['status'] = 'login';
  header('location:index.php?page=dashboard');
}else {
  header('location:login.php?pesan=gagal');
}
 ?>
