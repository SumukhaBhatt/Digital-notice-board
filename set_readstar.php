<?php
$q1=$_REQUEST["q"];
$q=explode("~",$q1);
$person=trim($q[0],"~");
$tp=trim($q[1],"~");
$co_no=trim($q[2],"~");
$check=trim($q[3],"~");
$r=$q[4];
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
{
	die();
}
else{
	if($r==1)
	{
		$sql="SELECT user_name,read".$co_no." FROM ".$tp;
	}
	else $sql="SELECT user_name, star".$co_no." FROM ".$tp;
	$res=$conn->query($sql);
	echo $sql;
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			if($row['user_name']==$person)
			{
				if($check==0 && $r==1)
				{
					$sql="UPDATE ".$tp." SET read".$co_no."=0"." WHERE user_name='".$person."'";
					$conn->query($sql);
					break;
				}
				else if($check==1 && $r==1)
				{
					$sql="UPDATE ".$tp." SET read".$co_no."=1"." WHERE user_name='".$person."'";
					$conn->query($sql);
					break;
				}
				else if($check==0 && $r==2)
				{
					$sql="UPDATE ".$tp." SET star".$co_no."=0"." WHERE user_name='".$person."'";
					$conn->query($sql);
					break;
				}
				else if($check==1 && $r==2)
				{
					$sql="UPDATE ".$tp." SET star".$co_no."=1"." WHERE user_name='".$person."'";
					echo $sql;
					$conn->query($sql);
					break;
				}
			}
		}
	}
}
?>
	