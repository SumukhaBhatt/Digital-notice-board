<?php
$q = $_REQUEST["q"];
$array=explode("/",$q);
$q=$array[0];
$person=$array[1];
$count=1;
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
	die();
else{
	$sql="SELECT user_name FROM ".$person;
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			if($row["user_name"]==$q)
			{
				$count=0;
				$conn->close();
				echo 1;
				break;
			}
		}
		if($count==1)
		{
			$conn->close();
			echo 0;
		}
	}
	else {$conn->close();
	echo 0;}
}
?>