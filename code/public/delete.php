<?php
	session_start();
	include("koneksi.php") ;
	
	$id_nilai = $_GET['noring'] ;
	
	$sql_delete = "DELETE FROM `hewan` where `no`='{$id_nilai}'" ;
	
	$query_delete = mysqli_query($konek,$sql_delete) ; ;
	
	if($query_delete){
		echo '
			<script>
				alert("Hapus data berhasil");
				window.location = "index.php"
			</script>
		';
	}else{
		echo "Error: " . $sql_delete . "<br>" . mysqli_error($konek);
	}
?>