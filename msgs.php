<?php
include("databaseconnect.php");
session_start();
	$queSesion = "SELECT * FROM users WHERE user='".$_SESSION['login']."'";
	$resSesion = mysql_query($queSesion, $conexion) or die(mysql_error());
	$resSesionarray = mysql_fetch_array($resSesion);
	$totSesion = mysql_num_rows($resSesion);
	if(!($resSesionarray['logged'] == "yes"))
	{
		$_SESSION['login'] = NULL;$_SESSION['code'] == NULL;header("Location: login.php");
		}
	if(!($_SESSION['code'] == $resSesionarray['code']))
	{
		$_SESSION['login'] = NULL;$_SESSION['code'] == NULL;header("Location: login.php");
		}
?>
<?php
$queMsgs = "SELECT * FROM msgs ORDER BY fechahora ASC";
$resMsgs = mysql_query($queMsgs, $conexion) or die(mysql_error());
$resMsgsArray = mysql_fetch_array($resMsgs);
$totMsgs = mysql_num_rows($resMsgs);
if ($totMsgs> 0) {
   while ($rowMsgs = mysql_fetch_assoc($resMsgs)) {
      echo $rowMsgs['user'].": ".$rowMsgs['msg']."<br>";
   }
}
?>