<?php

session_start();
if (!(isset($_SESSION['user']) && isset($_SESSION['pass']))) {
    header('location:index.php');
    exit();
} else {
?>

<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus member
if ($module=='member' AND $act=='hapus'){
  mysqli_query($conn,"DELETE FROM member WHERE id_member='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input member
elseif ($module=='member' AND $act=='input'){
$password = md5($_POST['password']);
mysqli_query($conn,"INSERT INTO member (nama,email,jenis_kelamin,no_hp,tempat_lahir,tgl_lahir,alamat,password,show_pass) 
	           VALUES('$_POST[nama]','$_POST[email]','$_POST[jenis_kelamin]','$_POST[no_hp]','$_POST[tempat_lahir]','$_POST[tgl_lahir]','$_POST[alamat]','$password','$_POST[password]')");
header('location:../../index.php?module='.$module);
}

// Update member
elseif ($module=='member' AND $act=='update'){
  mysqli_query($conn,"UPDATE member SET
          nama = '$_POST[nama]', email = '$_POST[email]' ,jenis_kelamin = '$_POST[jenis_kelamin]',
          no_hp = '$_POST[no_hp]', tempat_lahir = '$_POST[tempat_lahir]',tgl_lahir = '$_POST[tgl_lahir]', alamat = '$_POST[alamat]' WHERE id_member = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>
<?php } ?>