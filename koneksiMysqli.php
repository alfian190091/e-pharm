<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "apotek";


$conn = new mysqli($hostname,$username,$password,$database);

if ($conn -> connect_error) {
	die("Database tidak terkoneksi".$conn -> connect_error);
}
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row; 
	}
	return $rows;
}
?>