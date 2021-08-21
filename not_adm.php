<?php
$q=$_REQUEST["q"];
$res="";
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
{
	echo"erro";
	die();
}
else
{
	$sql="SELECT user_name FROM ".$q;
	$array=$conn->query($sql);
	if($array->num_rows>0)
	{
		while($row=$array->fetch_assoc())
		{
			$res=$res.$row["user_name"]."/";
		}
		echo trim($res,"/");
	}
	else echo "illa";
}
?>