<?php
	require_once __DIR__ . '/db_config.php';
	require_once __DIR__ . '/model.php';
	
	$model = new Model();

	if (@$_GET['m'] && @$_GET['srv'] && @$_GET['rt']) {
		$route = $_GET['rt'];

		if (@$_GET['srv'] === 'SRVIAM'){ // To IAM JBoss Service

			if (@$_GET['m'] === 'p') { // For POST mtehod
				$data = json_decode(file_get_contents('php://input'), true);
				
				$result = $model->post_data($data, SRVIAM.$route);
				echo $result;

			} else if (@$_GET['m'] === 'g') { // For GET method
				$result = $model->get_data(SRVIAM.$route);
				echo json_encode($result);

			} else {			
				echo "No action found!";
			}
		} else if (@$_GET['srv'] === 'SRVMDM') { // To MDM JBoss Service
			# code...
			if (@$_GET['m'] === 'p') { // For POST method
				$data = json_decode(file_get_contents('php://input'), true);
				
				$result = $model->post_data($data, SRVMDM.$route);
				echo $result;

			} else if (@$_GET['m'] === 'g') { // For GET method
				$result = $model->get_data(SRVMDM.$route);
				echo json_encode($result);

			} else {			
				echo "No action found!";
			}
		} else if (@$_GET['srv'] === 'SRVSTC') { // To STC JBoss Service
			# code...
			if (@$_GET['m'] === 'p') { // For POST method
				$data = json_decode(file_get_contents('php://input'), true);
				
				$result = $model->post_data($data, SRVSTC.$route);
				echo $result;

			} else if (@$_GET['m'] === 'g') { // For GET method
				$result = $model->get_data(SRVSTC.$route);
				echo json_encode($result);

			} else {			
				echo "No action match found!";
			}
		} else if (@$_GET['srv'] === 'SRVAAM') { // To AAM JBoss Service
			# code...
			if (@$_GET['m'] === 'p') { // For POST method
				$data = json_decode(file_get_contents('php://input'), true);
				
				$result = $model->post_data($data, SRVAAM.$route);
				echo $result;

			} else if (@$_GET['m'] === 'g') { // For GET method
				$result = $model->get_data(SRVAAM.$route);
				echo json_encode($result);

			} else {			
				echo "No action match found!";
			}
		} else if (@$_GET['srv'] === 'SRVMCS') { // To MCS JBoss Service
			# code...
			if (@$_GET['m'] === 'p') { // For POST method
				$data = json_decode(file_get_contents('php://input'), true);//array("nik" => "15997004", "application" => "AAMA");
				
				$result = $model->post_data($data, SRVMCS.$route);
				echo $result;

			} else if (@$_GET['m'] === 'g') { // For GET method
				$result = $model->get_data(SRVMCS.$route);
				echo json_encode($result);

			} else {			
				echo "No action match found!";
			}
		} else {
			echo "No action match found!";
		}
	} else {
		echo "No param match found!";
	}

?>