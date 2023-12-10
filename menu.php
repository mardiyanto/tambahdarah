<?php
$module = $_GET['module'];
?>
<li><a <?php if ($module == "") echo 'class="active"'; ?> href="./"><i class="fa fa-home"></i> <span>Beranda</span></a><li>
  <div class="container"></div>
  <?php
  if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
      ?>
   <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Profil</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="member/editmember/<?php echo"$_SESSION[id_member]"; ?>"><i class="fa fa-circle-o"></i>Data Diri</a></li>
                <li><a href="password"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
              </ul>
    </li> 
   <li class="treeview">
              <a href="#">
                <i class="fa fa-commenting-o"></i>
                <span>Edukasi</span>
                <span class="label label-primary pull-right">3</span>
              </a>
              <ul class="treeview-menu">
              <li><a href="keterangan"><i class="fa fa-commenting-o"></i> <span>Pengetahuan</span></a><li>
              <li><a href="ketpenyakit"><i class="fa fa-bug"></i> <span>Jenis Penyakit</span></a><li>
                <li><a href="diagnosa"><i class="fa fa-circle-o"></i> Input Diagnosa</a></li>
                <li><a href="riwayat"><i class="fa fa-circle-o"></i> Riwayat Diagnosa</a></li>
              </ul>
    </li>  
    <li class="treeview">
              <a href="#">
                <i class="fa fa-clock-o"></i>
                <span>Konsumsi TTD</span>
                <span class="label label-primary pull-right">2</span>
              </a>
              <ul class="treeview-menu">
              <li><a href="obat"><i class="fa fa-circle-o"></i> <span>Input Data</span></a><li>
              <li><a href="obat/jadwalobat"><i class="fa fa-circle-o"></i> Jadwal Konsumsi</a></li>
              </ul>
    </li>  
      <?php
  }else {
      ?>
   
    
      <div class="container"></div>
      <li><a <?php if ($module == "keterangan") echo 'class="active"'; ?> href="member/daftar/tambahdata"><i class="fa fa-commenting-o"></i> <span>Daftar</span></a><li>
      <div class="container"></div>
      <?php
  }
  ?>

  <div class="container"></div>