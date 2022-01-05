<?php
include '../koneksi.php';
$No_Telp		= $_POST["No_Telp"];
$Nama_Mahasiswa	= $_POST["Nama_Mahasiswa"];
$Message 		= $_POST["Message"];

$sql = mysqli_query($konek, "INSERT INTO message(No_Telp, Nama_Mahasiswa, Message) VALUES ('$No_Telp', '$Nama_Mahasiswa', '$Message')");

if (isset($_POST['kirim'])) {
	$notelp = $_POST['No_Telp'];
	$message = $_POST['Message'];

	$userkey = 'jub164';
	$passkey = 'farhanhsb';

	function KirimSMS ($notelp, $message, $userkey, $passkey){
		$isi=urlencode($message);
		$hp=str_replace('+62', '0', $notelp);
		$hp=str_replace('', '', $hp);
		$hp=str_replace('.', '', $hp);
		$hp=str_replace(',', '', $hp);
		$ho=trim($hp);
		$url="https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$hp&pesan=$isi";
		$data=file_get_contents($url);
		if (preg_match('/success/', $data)) {
			$hasil='1';
		}else{
			$hasil='0';
		}
		return $hasil;
	}
	$kirim=KirimSMS($notelp, $message, $userkey, $passkey);
	if ($kirim=='1') {
		echo "<script language='javascript'>window.alert('SMS gagal terkirim, format nomor tidak sesuai'); window.location.href='message.php';</script>";
	}else{
		echo "<script language='javascript'>window.alert('SMS berhasil terkirim'); window.location.href='message.php';</script>";
	}
}
?>