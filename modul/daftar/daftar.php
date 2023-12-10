<title>daftar - Chirexs 1.0</title>
<?php
session_start();
?>
<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.nama.value == "")
{
   alert("Nama  tidak boleh kosong !");
   text_form.nama.focus();
   return (false);
}
if (text_form.email.value == "")
{
   alert("email  tidak boleh kosong !");
   text_form.email.focus();
   return (false);
}
if (text_form.no_hp.value == "")
{
   alert("HP  tidak boleh kosong !");
   text_form.no_hp.focus();
   return (false);
}

if (text_form.alamat.value == "")
{
   alert("alamat harus di isi");
   text_form.alamat.focus();
   return (false);
}
if (text_form.tempat_lahir.value == "")
{
   alert("tempat lahir harus di isi");
   text_form.tempat_lahir.focus();
   return (false);
}
if (text_form.tgl_lahir.value == "")
{
   alert("tanggal lahir harus di isi");
   text_form.tgl_lahir.focus();
   return (false);
}
if (text_form.password.value == "")
{
   alert("Password Wajib di ISI");
   text_form.password.focus();
   return (false);
}
return (true);
}
</script>
<?php
include "config/fungsi_alert.php";
$aksi="modul/daftar/aksi_daftar.php";
switch($_GET[act]){
	// Tampil daftar
  default:
  echo" Pendaftaran berhasil silahkan <a href='formlogin'>login</a> ";
  break;
  
  case "tambahdata":
    echo " 
    <form name=text_form method=POST action='$aksi?module=daftar&act=input' onsubmit='return Blank_TextField_Validator()'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama Lengkap</td><td><input type=text autocomplete='off' placeholder='Masukkan nama...' class='form-control' name='nama' size=30></td></tr>
      <tr><td width=120>Email address</td><td><input type='email' class='form-control'  name='email' placeholder='email'></td></tr>
      <tr><td width=120>Jenis Kelamin</td><td>         <select class='form-control select2' name='jenis_kelamin' style='width: 100%;'>
      <option selected='selected' >---Pilih Jenis Kelamin---</option>
      <option value='Laki-Laki'>Laki-Laki</option>
      <option value='Perempuan'>Perempuan</option>
    </select></td></tr>
      <tr><td width=120>Nomor Hp</td><td> <input type='number' class='form-control'  name='no_hp' placeholder='no hp'></td></tr>
      <tr><td width=120>Tempat Lahir</td><td><input type='text' class='form-control'  name='tempat_lahir' placeholder='Tempat Lahir'></td></tr>
      <tr><td width=120>Tanggal Lahir</td><td><input type='date' class='form-control'  name='tgl_lahir' placeholder='Tanggal Lahir'></td></tr>
      <tr><td width=120>Alamat</td><td><input type='text' class='form-control'  name='alamat' placeholder='Alamat Lengkap'></td></tr>
      <tr><td width=120>Pasword</td><td><input type='password' class='form-control'  name='password' placeholder='Password login'></td></tr>
		  <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='index.php';\"></td></tr>
          </table></form>";
     break;
    
  case "editdaftar":
    $edit=mysqli_query($conn,"SELECT * FROM member WHERE id_daftar='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	
    echo "<form name=text_form method=POST action='$aksi?module=daftar&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id_daftar]'>
          <br><br><table class='table table-bordered'>
          <tr><td width=120>Nama Lengkap</td><td><input type=text autocomplete='off' placeholder='Masukkan nama...' class='form-control' name='nama' value='$r[nama]' size=30></td></tr>
          <tr><td width=120>Email address</td><td><input type='email' class='form-control'  name='email' value='$r[email]' placeholder='email'></td></tr>
          <tr><td width=120>Jenis Kelamin</td><td>         <select class='form-control select2' name='jenis_kelamin' style='width: 100%;'>
          <option selected='selected' value='$r[jenis_kelamin]'>$r[jenis_kelamin]</option>
          <option value='Laki-Laki'>Laki-Laki</option>
          <option value='Perempuan'>Perempuan</option>
        </select></td></tr>
          <tr><td width=120>Nomor Hp</td><td> <input type='number' class='form-control'  name='no_hp' value='$r[no_hp]' placeholder='no hp'></td></tr>
          <tr><td width=120>Tempat Lahir</td><td><input type='text' class='form-control'  name='tempat_lahir' value='$r[email]' placeholder='Tempat Lahir'></td></tr>
          <tr><td width=120>Tanggal Lahir</td><td><input type='date' class='form-control'  name='tgl_lahir' value='$r[tgl_lahir]' placeholder='Tanggal Lahir'></td></tr>
          <tr><td width=120>Alamat</td><td><input type='text' class='form-control'  name='alamat' value='$r[alamat]' placeholder='Alamat Lengkap'></td></tr>
          <tr><td width=120>Pasword</td><td><input type='text' class='form-control'  name='password' value='$r[show_pass]' placeholder='Password login'></td></tr>
          <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button value='Batal' onclick=\"window.location.href='?module=daftar';\"></td></tr>
          </table></form>";
    break;  
}
?>

