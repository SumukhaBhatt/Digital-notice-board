<?php
$q = $_REQUEST["q"];
$array=explode("/",$q);
$q=$array[0];
$p=$array[1];
$person=$array[2];
$count=1;
if($person=="admin")
{
	if($q=="sumukha" && $p=="pes@282")
	{
		echo 2;
	}
}
else
{
	$conn=new mysqli("localhost","root","","notice_board");
	if($conn->error)
		die();
	else{
		$sql="SELECT user_name,password FROM ".$person;
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				if($row["user_name"]==$q)
				{	if($row["password"]==$p)
					{
						$count=0;
						$conn->close();
						echo 1;
						break;
					}
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
}
?>