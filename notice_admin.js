function change_title_color()
{	
	var col=["#b3ffb3","#ffffb3","#99ffff","#ff8080","#df9f9f","#ff99ff","#c6c6ec","#ffffcc","#b3b3ff","#cccccc"];
	var ti=document.getElementById("title");
	ti.style.color=col[(i)%10];
	i++;
}
function set_format(content)
{
	var array=content.split("/");
	for(var i=0;i<array.length;i++)
	{
		var ch1=document.createElement("input");
		ch1.type="checkbox";
		ch1.name="student";
		ch1.value=array[i];
		ch1.checked=true;
		document.body.appendChild(ch1);
		document.body.appendChild(document.createTextNode(array[i]));
		bocument.body.appendChild(document.createElement("br"));
	}
}
var i=0;
setInterval(change_title_color,5000);
/////////////////////////////////////////////////////////////////
var summary=["",""];
/*
add_server, it add the message(send message) to specified student or teacher by admin.
all the student name and teacher name are stored in the array cllad "summary"
i.e  summary=["sumukh/sai","bhasha/.."];
*/
function add_to_server()
{
	if(summary[0].length==0&&summary[1].length==0 || document.getElementById("message").value.length==0)
	alert("please select person or type the message");
	else{
	if(summary[0].length==0) summary[0]="not??_exist";
	var xml=new XMLHttpRequest();
	xml.onreadystatechange=function(){
	if(this.readyState==4 && this.status==200)
	{
	alert("Message is sent");
	document.getElementById("message").value="";
	}
	}
	xml.open("GET","add_server.php?q="+summary[0]+"-"+summary[1]+":"+document.getElementById("message").value.replace(/\n/g,"<br>"),true);
	xml.send();
	}
}
/*
get_value add the names of the student or teacher that admin want to sed the message to the string called out.
i.e out='karthik/sai swaroop/sumukh'..
*/
function get_value(bu,person_name)
{
	if(person_name=="student")
	var ref=0;
	else var ref=1;
	var out=summary[ref];
	var name=document.getElementsByName(person_name);
	var pname=document.getElementsByName(person_name+"p");
	var bname=document.getElementsByName(person_name+"b");
	for(var i=0;i<name.length;)
	{
	if(name[i].checked)
	{
		out=out+name[i].value+"/";
	}
	document.body.removeChild(name[0]);
	document.body.removeChild(pname[0]);
	document.body.removeChild(bname[0]);
	}
	document.body.removeChild(bu);
	summary[ref]=out;
}
/*
set_formate(content)
this function calls when the user clicks(checks) the student or teacher checkbox.
it will display the all the student or techer name which is stored in content and categary(student or person )stored in person_name . 
*/
function set_format(content,person_name)
{
	var array=content.split("/");
	for(var i=0;i<array.length;i++)
	{
		var ch1=document.createElement("input");
		ch1.type="checkbox";
		ch1.name=person_name;
		ch1.value=array[i];
		ch1.checked=true;
		var pa=document.createElement("span");
		pa.setAttribute("Name",person_name+"p");
		pa.textContent=array[i];
		var lbr=document.createElement("br");
		lbr.setAttribute("name",person_name+"b");
		document.body.appendChild(ch1);
		document.body.appendChild(pa);
		document.body.appendChild(lbr);
	}
	var ch1=document.createElement("input");
	ch1.type="button";
	ch1.id="b";
	ch1.value="select";
	ch1.setAttribute("onclick","get_value(this,'"+person_name+"')");
	document.body.appendChild(ch1);
}
//set_format("sumukha/preetham/yashraj/anish","student");
/* 
check(id) get all student names from server and the call the function set_format using not_admin.php
*/ 
function check(id)
{
	if(document.getElementById(id).checked)
	{
		var xml=new XMLHttpRequest();
		xml.onreadystatechange=function(){
		if(this.status==200 && this.readyState==4)
		{
		var content=this.responseText;
		set_format(content,id);
		}
		}
		xml.open("GET","not_adm.php?q="+id,true);
		xml.send();
	}else{
			if(document.getElementsByName(id+"p").length!=0)
			{
				alert("You can't unckeck the "+id);
				document.getElementById(id).checked=true;
			}
			else{
				if(id=="student")
						summary[0]="";
				else summary[1]="";
				}
		}
}