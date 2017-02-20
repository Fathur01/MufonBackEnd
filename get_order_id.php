<?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();

$input = json_decode(file_get_contents('php://input'), true);
$inserted_id = $input['inserted_id'];

$url = SRVAAM . 'getApplicantOrderId';

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$json_response = curl_exec($curl);

curl_close($curl);

$json_object = json_decode($json_response);
$order_id = $json_object->seq[0];

$result = mysql_query("UPDATE mkt_order SET orderID = '$order_id' WHERE id = $inserted_id");

if ($result) {
	$response["success"] = 1;
	$response["message"] = "Dedup successfully updated.";
	$response["order_id"] = $order_id;
} 
else {
	$response["success"] = 0;
	$response["message"] = "An error occurred.";
}

echo json_encode($response);
?>