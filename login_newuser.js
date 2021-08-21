/*This is a java script file for  new user page*/
function border_color()
{
	var b=["#ff0000","#00ff00","#0066ff","#ffff00"]
	var a=document.getElementById("division");
	a.style.borderTop="50px solid "+b[(i+4)%4];
	a.style.borderRight="16px solid "+b[(i+4+1)%4];
	a.style.borderBottom="16px solid "+b[(i+4+2)%4];
	a.style.borderLeft="16px solid "+b[(i+4+3)%4];
	i++;
}
var i=0;
//setInterval(border_color,1000);
/*
function validate checks -
1) two passwords(pass and confirm pass) are matching or not.
2) if user gives blank username.
3) password length should grater than 5.
4) must answer question.
*/
function validate()
{
	var u_name=document.getElementsByName("user_name")[0].value;
	var p1=document.getElementsByName("password1")[0].value;
	var p2=document.getElementsByName("password2")[0].value;
	var ans=document.getElementsByName("answer")[0].value;
	var letters = /^[A-Za-z" "]+$/;
	var qus=document.getElementsByName("question")[0].value;
	if(u_name.length>4)
	{
		if(p1==p2)
		{
			if(p1.length>5)
			{
				if(ans.length>0 && ans.match(letters))
				{
					 document.getElementById("form").submit();
				}
				else alert("please correctly fill the answer");
			}else alert("Password length should greater than 5");
		}else alert("Password should match");
	}else alert("User name should contein atlest 4 charecters");
}
/*
function check_username() checks if the user name is already exits in database by sending the user_name to database ("AJAX")
if it exist then display message as alerady exist"
*/
function check_username()
{
if(document.getElementsByName("person")[0].checked)//student or teacher
{
	var person=document.getElementsByName("person")[0].value;
}

else var person=document.getElementsByName("person")[1].value;
var xmlhttp= new XMLHttpRequest();
xmlhttp.onreadystatechange=function(){
if(this.readyState==4  && this.status==200 && this.responseText==1)
{
alert("user name is already exist");
document.getElementsByName("user_name")[0].value="";
}
}
xmlhttp.open("GET","check_newuer.php?q="+document.getElementsByName("user_name")[0].value+"/"+person,true);
xmlhttp.send();
}