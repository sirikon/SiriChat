<?php
include("cypher.php");
include("databaseconnect.php");
session_start();
	$queEmp = "SELECT * FROM users WHERE user='".$_POST['login']."'";
	$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
	$resultados = mysql_fetch_array($resEmp);
	$totEmp = mysql_num_rows($resEmp);
		if ($resultados['pass'] == $_POST['pass'])
		{
			$newcode = NewCode();
			$_SESSION['code'] = $newcode;
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['userid'] = $resultados['ID'];
			$newcodetosql = "UPDATE users SET code='$newcode' WHERE user='".$_POST['login']."'";
			$loggeasql = "UPDATE users SET logged='yes' WHERE user='".$_POST['login']."'";
			mysql_query($loggeasql, $conexion) or die(mysql_error());
			mysql_query($newcodetosql, $conexion) or die(mysql_error());
			mysql_query("UPDATE users SET lastlogin='".date("Y-m-d H:i:s")."' WHERE user='".$_POST['login']."'", $conexion) or die(mysql_error());
			header ("Location: index.php"); 
		}else{echo "Valiente tontaco";}
?>