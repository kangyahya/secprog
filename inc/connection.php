<?php
$connect = new mysqli('localhost','root','','db_secprog');
if (mysqli_connect_errno()) {
  echo "Failed to Connect Mysql ".mysqli_connect_error();
}
?>
