<?php
	//checking if data has been entered
	if(isset( $_POST['data']) && !empty( $_POST['data']))
	{
		$data = $_POST['data'];
	} else {
		header('location: form.html');
		exit();
	}

	//setting up mysql details
	$sql_server = 'webtesting.database.windows.net';
	$sql_user = 'user';
	$sql_pwd = 'password';
	$sql_db = 'WebTestBase';

	//connecting to sql database
	try{
		$conn = new PDO("sqlsrv:server = tcp:webtesting.database.windows.net,1433; Database=WebTestBase","TestAdmin","Youngin214");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		print("Connection successful")
	}
	catch(PDOException $e){
		print("Error connecting to SQL Server.");
		die(print_r($e));
	}

	//$myslqi = new mysqli($sql_server, $sql_user, $sql_pwd, $sql_db) or die( $mysqli->error);

	//inserting details into table
	$insert = $conn->query("INSERT INTO table ('data') VALUE ('$data')");
	
	//$mysqli->query("INSERT INTO table ('data') VALUE ('$data')");
	
	//closing mysqli connection
	$conn->close;
?>