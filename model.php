<?php
	class Model{

		function __construct(){
			
		}

		function post_data($data, $route){
			$url = $route;
	 		$ch = curl_init($url);
			$data = json_encode($data);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			return $result;
		}

		function get_data($route){
			@$json = file_get_contents($route);
			$result = json_decode($json);
			return $result;
		}
	}