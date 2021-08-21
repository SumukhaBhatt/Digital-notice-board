/*This is a java script file for  login page*/

function border_color()
{
	var b=["#ff0000","#00ff00","#0066ff","#ffff00"]
	var a=document.getElementById("division");
	a.style.borderTop="16px solid "+b[(i+4)%4];
	a.style.borderRight="16px solid "+b[(i+4+1)%4];
	a.style.borderBottom="16px solid "+b[(i+4+2)%4];
	a.style.borderLeft="16px solid "+b[(i+4+3)%4];
	i++;
}
var i=0;
//setInterval(border_color,1000);
/*
function verify() checks when the user press submit the button.
It will checks valid username and password by sending the user name and password to the php(server) with the help of AJAX.
The php file(login.php) return (this.response) is 1 then stu_notice.html opens else if it return 2 the notice_admin.html page opens else it is invalid u_name.
*/
function verify()
{
if(document.getElementsByName("user_name")[0].value.length>4 && document.getElementsByName("password")[0].value.length>5)
{
		if(document.getElementsByName("person")[0].checked)
	{
		var person=document.getElementsByName("person")[0].value;
	}
	else if(document.getElementsByName("person")[1].checked)
			var person=document.getElementsByName("person")[1].value;
	else var person=document.getElementsByName("person")[2].value;
	var xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	if(this.readyState==4  && this.status==200 && this.responseText==1)
	{
	//document.cookie=document.getElementsByName("user_name")[0].value+"="+person+";path=/notice_stu.html;";
	localStorage.setItem("name",document.getElementsByName("user_name")[0].value);
	localStorage.setItem("cat",person);
	location.href="/notice_stu.html";
	}
	else if(this.readyState==4  && this.status==200 && this.responseText==2)
	{
	location.href="/notice_admin.html";
	}
	else if(this.readyState==4  && this.status==200 && this.responseText==0)
		alert("user name and password dint match");
	}
	xmlhttp.open("GET","login.php?q="+document.getElementsByName("user_name")[0].value+"/"+document.getElementsByName("password")[0].value+"/"+person,true);
	xmlhttp.send();
}
else {
alert("invalid username and password");
document.getElementsByName("password")[0].value="";
document.getElementsByName("user_name")[0].value="";
}
}