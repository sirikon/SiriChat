<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciar Sesión</title>
<style type="text/css">
#tablelogin {
	position: absolute;
	top: 0px;
	right: 50%;
	margin-right: -200px;
	background-image: url(login.png);
}
#login {
}
body {
	background-image: url(loginback.png);
	margin: 0px;
	padding: 0px;
	background-repeat: repeat-x;
	background-color: #D9DFF4;
}
#loginbox     {
	width: 250px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-image: url(input.png);
	height: 39px;
	background-repeat: no-repeat;
	background-position: center center;
}
#passbox {
	width: 250px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-image: url(input.png);
	height: 39px;
	background-repeat: no-repeat;
	background-position: center center;
}
#logininput       {
	width: 220px;
	height: 20px;
	margin-top: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-image: url(nothing.png);
}
#passinput {
	width: 220px;
	height: 20px;
	margin-top: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-image: url(nothing.png);
}
</style>
<script>
function limpiauser(){
	if(document.getElementById("logininput").value == "Usuario"){document.getElementById("logininput").value = ""}
	}
function limpiapass(){
	if(document.getElementById("passinput").value == "******"){document.getElementById("passinput").value = ""}
	}
</script>
</head>
<body>
<table id="tablelogin" width="400" height="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="150">&nbsp;</td>
  </tr>
  <tr>
   <td id="login" height="150"><center><form name="loginform" method="POST" action="loginsystem.php">
<div id="loginbox"><input type="text" name="login" id="logininput" onclick="limpiauser()" value="Usuario"></div>
<div id="passbox"><input type="password" name="pass" id="passinput" onclick="limpiapass()" value="******"></div>
<input type="submit" value="Entrar">
</form></center></td>
  </tr>
</table>


</body>
</html>