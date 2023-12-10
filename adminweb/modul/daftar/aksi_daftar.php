

<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Input daftar
if ($module=='daftar' AND $act=='input'){
$password = md5($_POST['password']);
mysqli_query($conn,"INSERT INTO member (nama,email,jenis_kelamin,no_hp,tempat_lahir,tgl_lahir,alamat,password,show_pass) 
	           VALUES('$_POST[nama]','$_POST[email]','$_POST[jenis_kelamin]','$_POST[no_hp]','$_POST[tempat_lahir]','$_POST[tgl_lahir]','$_POST[alamat]','$password','$_POST[password]')");
header('location:../../index.php?module='.$module);
}

// Update daftar
elseif ($module=='daftar' AND $act=='update'){
  mysqli_query($conn,"UPDATE member SET
          nama = '$_POST[nama]', email = '$_POST[email]' ,jenis_kelamin = '$_POST[jenis_kelamin]',
          no_hp = '$_POST[no_hp]', tempat_lahir = '$_POST[tempat_lahir]',tgl_lahir = '$_POST[tgl_lahir]', alamat = '$_POST[alamat]' WHERE id_daftar = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>
