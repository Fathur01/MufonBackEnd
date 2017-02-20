<?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();

$input = json_decode(file_get_contents('php://input'), true);

$user_id = $input['user_id'];
$order_id = $input['order_id'];
$no_ktp = $input['no_ktp'];
$nama_nasabah = $input['nama_nasabah'];
$tgl_lahir = date("Y-m-d H:i:s", strtotime($input['tgl_lahir']));
$nama_ibu = $input['nama_ibu'];
$latitude = $input['latitude'];
$longitude = $input['longitude'];
$current_time = $input['current_time'];

if($input['tgl_lahir'] == '') {
	$tgl_lahir = "0000-00-00 00:00:00";
}

$result = mysql_query("INSERT INTO mkt_order (userID, noKTP, namaNasabah, tglLahir, namaIbu, latLok, longLok, sentTime, orderID)
VALUES('$user_id', '$no_ktp', '$nama_nasabah', '$tgl_lahir', '$nama_ibu', '$latitude', '$longitude', '$current_time', '$order_id')");

if ($result) {
	$response["success"] = 1;
	$response["message"] = "Dedup successfully created.";
	$response["inserted_id"] = mysql_insert_id();
} 
else {
	$response["success"] = 0;
	$response["message"] = "An error occurred.";
	$response["inserted_id"] = -1;
}

echo json_encode($response);
?>