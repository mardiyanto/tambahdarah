<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
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
  mysqli_query($conn,"DELETE FROM member WHERE kode_member='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input member
elseif ($module=='member' AND $act=='input'){
$nama=$_POST[nama];
mysqli_query($conn,"INSERT INTO member(
			      nama) 
	                       VALUES(
				'$nama')");
header('location:../../index.php?module='.$module);
}

// Update member
elseif ($module=='member' AND $act=='update'){
$nama_member=$_POST[nama_member];
  mysqli_query($conn,"UPDATE member SET
					nama_member   = '$nama_member'
               WHERE kode_member       = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>
<?php } ?>