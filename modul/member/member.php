<title>member - Chirexs 1.0</title>
<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
} else {

include "config/fungsi_alert.php";
$aksi="modul/member/aksi_member.php";
switch($_GET[act]){
	// Tampil member
  default:
  echo" <div class='row'>
  <div class='col-xs-12'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Responsive Hover Table</h3><br><br>
        <a href='member/tambahdata' class='btn btn-sm btn-default'>Tambah</a>
        <div class='box-tools'>
          <div class='input-group' style='width: 150px;'>
            <input type='text' name='table_search' class='form-control input-sm pull-right' placeholder='Search'>
            <div class='input-group-btn'>
             
              <button class='btn btn-sm btn-default'><i class='fa fa-search'></i></button>
            </div>
          </div>
        </div>
      </div><!-- /.box-header -->
      <div class='box-body table-responsive no-padding'>
        <table class='table table-hover'>
          <tr>
            <th>No</th>
            <th>nama</th>
            <th>email</th>
          </tr>";
          $hasil = mysqli_query($conn,"SELECT * FROM member");
          while ($r=mysqli_fetch_array($hasil)){
         echo" <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>11-7-2014</td>
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
    echo "<form name=text_form method=POST action='$aksi?module=member&act=input' onsubmit='return Blank_TextField_Validator()'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama</td><td><input type=text autocomplete='off' placeholder='Masukkan nama...' class='form-control' name='nama' size=30></td></tr>
		  <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=member';\"></td></tr>
          </table></form>";
     break;
    
  case "editmember":
    $edit=mysqli_query($conn,"SELECT * FROM member WHERE kode_member='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	
    echo "<form name=text_form method=POST action='$aksi?module=member&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[kode_member]'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama member</td><td><input autocomplete='off' type=text class='form-control' name='nama_member' size=30 value=\"$r[nama_member]\"></td></tr>
          <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button value='Batal' onclick=\"window.location.href='?module=member';\"></td></tr>
          </table></form>";
    break;  
}
?>
<?php } ?>
