<?php
	session_start();
	if(!isset($_SESSION['noring'])){
		header("Location: index.php") ;
	}
	include("koneksi.php") ;
	
	$noring = $_POST['noring'] ;
	$jenis = $_POST['jenis'] ;
	$umur = $_POST['umur'] ;
	
	$sql_update = "UPDATE `hewan` SET `noring`='{$noring}',`jenis`='{$jenis}',`umur`='{$umur}' WHERE `noring`='{$noring}'" ;
	
	$query_update = mysqli_query($konek,$sql_update) ;
	
	if($query_update){
		echo '
		<script>
			alert("update daftar sukses");
			window.location = "index.php"
		</script>
		';
	
	}else{
		echo "Error: " . $sql_update . "<br>" . mysqli_error($konek);
	}
	
?>
