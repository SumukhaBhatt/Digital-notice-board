<?php
$array=$_REQUEST["q"];
$person=explode("~",$array)[0];
$cat=explode("~",$array)[1];
$pass=explode("~",$array)[2];
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
{
	die();
}
else
{
	$sql="UPDATE ".$cat." SET password='".$pass."'  WHERE user_name='".$person."'";
	echo $sql;
	if(!$conn->query($sql))
			{
				echo "error";
			}
			else echo "succes";
}
?>