<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Universitas Terbuka SUMUT</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
			        <li><a href="dosen.php"><i class="fa fa-user"></i><span>Dosen</span></a></li>
			        <li><a href="mahasiswa.php"><i class="fa fa-users"></i><span>Mahasiswa</span></a></li>
			        <li><a href="ruangan.php"><i class="fa fa-columns"></i><span>Ruangan</span></a></li>
			        <li><a href="matakuliah.php"><i class="fa fa-book"></i><span>Matakuliah</span></a></li>
			        <li><a href="jurusan.php"><i class="fa fa-university"></i><span>Jurusan</span></a></li>
			        <li><a href="jenjang.php"><i class="fa fa-graduation-cap"></i><span>Jenjang</span></a></li>
					<li><a href="jadwal.php"><i class="fa fa-calendar"></i><span>Jadwal</span></a></li>
					<li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
			        <li><a href="about.php"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Message
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-envelope"></i> Message</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                <a href="index.php"><button class="btn btn-success" type="button"><i class="fa fa-home"></i> Dashboard</button></a><br><br>
				<form action="proses_sms.php" method="post">
							<div class="form-group">
								<label>Nomor</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<select name="No_Telp" class="form-control" id="nomor">
										<option value="" selected>-- No Telpon --</option>
											<?php
												
												$querytelpon = mysqli_query($konek, "SELECT * FROM mahasiswa");
												if($querytelpon == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($telpon = mysqli_fetch_array($querytelpon)){
													echo "
														<option value='$telpon[No_Telp]'>$telpon[No_Telp]</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="Nama_Mahasiswa" class="form-control" id="nama">
											<option value="" selected>-- Nama Mahasiswa --</option>

										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Pesan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</div>
										<textarea class="form-control" name="Message">Nilai Anda Sudah Tersedia Silahkan Cek Secara Berkala, Terima Kasih<no-reply></textarea>
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit" name="kirim">
									Send
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
    </div><!-- /.content-wrapper -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function(){
    $('#nomor').change(function(){
    $('#nama').after('<span class="loading">Tunggu..sedang load data mahasiswa..</span>');
    $('#nama').load('carimahasiswa.php?No_Telp=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
    if(statusTxt=="success")
    $('.loading').remove();                  
    });
    return false;
    });
    });
    </script>

    <?php
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
