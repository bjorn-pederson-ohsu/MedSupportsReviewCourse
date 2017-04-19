<?php
	require("constants.php");
	function connect() {
		//include ('constants.php');
		global $pdo;
		try {
		$pdo = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USER, DB_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $e){
			$output = 'Unable to connect to the database server:'.$e;
			//include 'output.html.php';
			echo $output;
			exit();
		}
	}
	connect();
?>