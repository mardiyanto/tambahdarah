<title>member - Chirexs 1.0</title>
<?php

session_start();
if (!(isset($_SESSION['user']) && isset($_SESSION['pass']))) {
    header('location:index.php');
    exit();
} else {
?>
<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.nama_obat.value == "")
{
   alert("Nama  obat tidak boleh kosong !");
   text_form.nama_obat.focus();
   return (false);
}
if (text_form.dosis.value == "")
{
   alert("dosis obat  tidak boleh kosong !");
   text_form.dosis.focus();
   return (false);
}
if (text_form.waktu.value == "")
{
   alert("waktu pemakaian obat tidak boleh kosong !");
   text_form.waktu.focus();
   return (false);
}

if (text_form.durasi_hari.value == "")
{
   alert("durasi hari harus di isi");
   text_form.durasi_hari.focus();
   return (false);
}
return (true);
}
</script>
<?php
include "config/fungsi_alert.php";
$aksi="modul/tambahttd/aksi_ttd.php";
switch($_GET[act]){
	// Tampil member
  default:
  echo" <div class='row'>
  <div class='col-xs-12'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Data Aturan Pakai</h3><br><br>
        <a href='obat/tambahdata' class='btn btn-sm btn-default'>Tambah</a>

      </div><!-- /.box-header -->
      <div class='box-body table-responsive no-padding'>
        <table class='table table-hover'>
          <tr>
            <th>No</th>
            <th>nama obat</th>
            <th>aturan pakai</th>
            <th>waktu</th>
            <th>aksi</th>
          </tr>";
          $no=0;
          $hasil = mysqli_query($conn,"SELECT * FROM aturan_pemakaian_obat WHERE id_member='$_SESSION[id_member]'");
          while ($r=mysqli_fetch_array($hasil)){
            $no++;
         echo" <tr>
            <td>$no</td>
            <td>$r[nama_obat]</td>
            <td>$r[dosis]</td>
            <td>$r[waktu], $r[durasi_hari]</td>
            <td><a type='button' class='btn btn-success margin' href=obat/detailobat/$r[id_aturan]><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Lihat </a> &nbsp;
            <a type='button' class='btn btn-danger margin' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=obat&act=hapus&id=$r[id_aturan]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
            </td>
          </tr>";
          }
          echo"
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>";
  break;
  
  case "tambahdata":
    echo " 
    <form name=text_form method=POST action='$aksi?module=obat&act=input' onsubmit='return Blank_TextField_Validator()'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama Obat</td><td><input type='text' class='form-control' id='nama_obat' name='nama_obat' required></td></tr>
      <tr><td width=120>Dosis Obat</td><td><input type='text' class='form-control' id='dosis' name='dosis' required></td></tr>
      <tr><td width=120>Waktu Pemakaian:</td><td>  <input type='time' class='form-control' name='waktu' required></td></tr>
      <tr><td width=120>Durasi Pemakaian (hari):</td><td><input type='number' class='form-control' id='durasi_hari' name='durasi_hari' required></td></tr>
		  <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=member';\"></td></tr>
          </table></form>";
     break;

     case "detailobat":
        $edit=mysqli_query($conn,"SELECT * FROM aturan_pemakaian_obat WHERE id_aturan='$_GET[id]'");
        $r=mysqli_fetch_array($edit);
        echo "<table class='table'>
        <tr>
            <td>Nama Obat:</td>
            <td>$r[nama_obat]</td>
        </tr>
        <tr>
            <td>Dosis:</td>
            <td>$r[dosis]</td>
        </tr>
        <tr>
            <td>Waktu Pemakaian:</td>
            <td>$r[waktu]</td>
        </tr>
        <tr>
            <td>Durasi Pemakaian (hari):</td>
            <td>$r[durasi_hari]</td>
        </tr>
    </table>
    <a href='obat/editobat/$r[id_aturan]' class='btn btn-success'>Edit </a>";
    $status_jadwal = $r['jadwal'];
    if ($status_jadwal == 0) {
        echo"
        <a href='$aksi?module=obat&act=inputjadwal&id_aturan=$r[id_aturan]' class='btn btn-danger'>Buat Jadwal </a>
            ";
    } elseif ($status_jadwal == 1) {
        echo"
        <a href='obat/jadwalobat' class='btn btn-success'>Lihat Jadwal </a>
            ";
    } else {
        // Jika status tidak 0 atau 1, atur status_teks sesuai kebutuhan
        echo"
        <a class='btn btn-success'>gak tau </a>
            ";
    }

         break;
    
  case "editobat":
    $edit=mysqli_query($conn,"SELECT * FROM aturan_pemakaian_obat WHERE id_aturan='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	
    echo "<form name=text_form method=POST action='$aksi?module=obat&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id_aturan]'>
          <br><br><table class='table table-bordered'>
          <tr><td width=120>Nama Obat</td><td><input type='text' class='form-control' id='nama_obat' value='$r[nama_obat]' name='nama_obat' required></td></tr>
          <tr><td width=120>Dosis Obat</td><td><input type='text' class='form-control' id='dosis' value='$r[dosis]' name='dosis' required></td></tr>
          <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button value='Batal' onclick=\"window.location.href='?module=obat';\"></td></tr>
          </table></form>";
    break; 

    case "jadwalobat": 
        echo" <div class='row'>
  <div class='col-xs-12'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Jadwal Obat</h3><br><br>
      </div><!-- /.box-header -->
      <div class='box-body table-responsive no-padding'>
        <table class='table table-hover'>
          <tr>
            <th>No</th>
            <th>nama obat</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Status</th>
          </tr>";
          $no=0;
          $hasil = mysqli_query($conn,"SELECT * FROM jadwal_pemakaian_obat,aturan_pemakaian_obat 
          WHERE jadwal_pemakaian_obat.id_aturan=aturan_pemakaian_obat.id_aturan and aturan_pemakaian_obat.id_member='$_SESSION[id_member]'");
          while ($r=mysqli_fetch_array($hasil)){
            $no++;
            // Menentukan warna berdasarkan nilai status
if ($r['status'] == 'belum') {
    echo "<tr style='color: red;'>";
} elseif ($r['status'] == 'sudah') {
    echo "<tr style='color: green;'>";
} else {
    // Jika status tidak sesuai dengan yang diharapkan, biarkan warna default
    echo "<tr>";
}
         echo"
            <td>$no</td>
            <td>$r[nama_obat]</td>
            <td>$r[tanggal]</td>
            <td>$r[waktu]</td>

            <td>"; if ($r['status'] == 'belum') {
                echo " <a href='$aksi?module=obat&act=updatejadwal&id_jadwal=$r[id_jadwal]' class='btn btn-danger'>BELUM </a>";
            } elseif ($r['status'] == 'sudah') {
                echo " <a  class='btn btn-success'>SUDAH</a>";
            } else {
                // Jika status tidak sesuai dengan yang diharapkan, biarkan warna default
                echo "OK";
            }
            echo"
            </td>
          </tr>";
          }
          echo"
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>";
    break; 
}
?>
<?php } ?>
