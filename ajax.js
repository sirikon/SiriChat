window.setInterval("Msgs()", 500)

function start(){
	Msgs();
	}

function firstScroll(){
	var target = document.getElementById('chatbox');
	target.scrollTop = target.scrollHeight;
	}

function scrollDown() {
var target = document.getElementById('chatbox');
if (target.scrollTop >= target.scrollHeight) {
target.scrollTop = target.scrollHeight;
}}

function newAjax()
{ 
	var xmlhttp=false; 
	try 
	{ 
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
}

function newMsg()
{
	var msg = document.getElementById("msg").value;
	var username = document.getElementById("username").value;
	var ajax = newAjax();
	var zona = document.getElementById("chatbox");
	zona.innerHTML = zona.innerHTML + username + ": " + msg.replace(/(<([^>]+)>)/ig,"") + "<br>";
	firstScroll();
	document.getElementById("msg").value = "";
	ajax.open("GET", "newmsg.php?msg="+msg, true);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();

	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			zona.innerHTML = ajax.responseText;
			firstScroll();
		}
	}
}

function Msgs()
{
	var target = document.getElementById('chatbox');
	var isOnBot = target.scrollTop + target.offsetHeight >= target.scrollHeight;
	var ajax = newAjax();
	var zona = document.getElementById("chatbox");
	ajax.open("GET", "msgs.php", true);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();

	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			zona.innerHTML = ajax.responseText;
			if (isOnBot) {
				target.scrollTop = target.scrollHeight;
				}
		}
	}
}