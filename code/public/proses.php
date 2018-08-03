<?php
	session_start();
	if(!isset($_SESSION['no'])){
		header("Location: koleksi.php") ;
	}
	include("koneksi.php") ;
	$query = "SELECT max(no) as maxKode FROM hewan";
	$hasil = mysqli_query($konek,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeRing = $data['maxKode'];
	 
	// mengambil angka atau bilangan dalam kode anggota terbesar,
	// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
	// misal 'BRG001', akan diambil '001'
	// setelah substring bilangan diambil lantas dicasting menjadi integer
	$noUrut = (int) substr($kodeRing, 3, 3);
	 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$noUrut++;
	 
	// membentuk kode anggota baru
	// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
	// misal sprintf("%03s", 12); maka akan dihasilkan '012'
	// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
	$char = "0";
	$kodeRing = $char . sprintf("%03s", $noUrut);


	$no = $kodeRing;
	$noring = $_POST['noring'] ;
	$jenis = $_POST['jenis'] ;
	$umur = $_POST['umur'] ;
	
	$sql_insert = "INSERT INTO `hewan`(`no`,`noring`, `jenis`, `umur`) VALUES ('{$no}','{$noring}','{$jenis}','{$umur}')" ;
	
	$query_insert = mysqli_query($konek,$sql_insert) ;
	
	if($query_insert){
		echo '
		<script>
			alert("tambah sukses");
			window.location = "koleksi.php"
		</script>
		';
	
	}else{
		echo "Error: " . $sql_insert . "<br>" . mysqli_error($konek);
	}
	
	
?>
