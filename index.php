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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript" src="ajax.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SiriChat</title>
        <style type="text/css">
            #chatbox {
                    height: 500px;
                    width: 300px;
                    border: 1px solid #000;
                    margin: 0px;
                    padding: 5px;
                    overflow: auto;
            }
        </style>
    </head>
    <body onload="start();">
        <div id="chatbox"></div>
        <form action="#" onsubmit="newMsg()">
            <input type="text" id="msg" />
            <input type="submit" value="Enviar" />
            <input type="hidden" id="username" value="<?php echo $_SESSION['login'] ?>" />
        </form>
    </body>
</html>