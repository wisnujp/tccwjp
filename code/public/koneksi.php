<?php
$host = "192.168.100.52:7603" ;
$user = "root" ;
$pass = "wisnu" ;
$db	  = "tcc" ;

$konek = mysqli_connect($host,$user,$pass,$db) ;

if(!$konek){
	 die("Connection failed: " . mysqli_connect_error());
}
/*
else{
	echo "Koneksi sukses <hr/>" ;
}
*/

?>
