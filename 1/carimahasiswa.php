<?php
include "../koneksi.php";

   $option = '<option value="">-- Nama Mahasiswa --</option>';
   
   $mahasiswa = isset($_GET['No_Telp']) ?  $_GET['No_Telp'] :'';
   $sql ="select NIM from mahasiswa where No_Telp='".$mahasiswa."'";
   if($res = $konek->query($sql)) {
      while ($row = $res->fetch_assoc()) {
        $nama=mysqli_fetch_array(mysqli_query($konek, "SELECT Nama_Mahasiswa FROM mahasiswa WHERE NIM='$row[NIM]'"));
	     $option .= "<option value='".$row['NIM']."'>".$nama['Nama_Mahasiswa']."</option>";
      }
   }
   echo $option;
?>