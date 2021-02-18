<?php

define('DBHOST', '127.0.0.1');
define('DBUSER', 'postgres');
define('DBNAME', 'postgres');
define('DBPASS', '@arikcs@');

$DBHOST = DBHOST;
$DBUSER = DBUSER;
$DBNAME = DBNAME;
$DBPASS = DBPASS;
$conn = new PDO("pgsql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);

if(isset($_GET['inf'])){
    phpinfo();
}elseif(isset($_GET['query'])){
  $query = str_replace('%20', ' ', $_GET['query']);
  $gas = $conn->query($query);
  if($gas){
    echo 'ok';
  }else{
    echo 'err';
  }
}else{
  exit;
}

?>
