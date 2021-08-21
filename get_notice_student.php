<?php
$q=$_REQUEST["q"];
$q=explode(":",$q);
$person=trim($q[0],":");
$cat=$q[1];
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
{
	die();
}
else{
	$sql="SELECT user_name,read1,not1,read2,not2,read3,not3,read4,not4,read5,not5,star1,star2,star3,star4,star5 FROM ".$cat;
	$res=$conn->query($sql);
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			if($person == $row['user_name'])
			{
				echo $row['not1']."^".$row['not2']."^".$row['not3']."^".$row['not4']."^".$row['not5']."~".
				$row['read1']."^".$row['read2']."^".$row['read3']."^".$row['read4']."^".$row['read5']."~".
				$row['star1']."^".$row['star2']."^".$row['star3']."^".$row['star4']."^".$row['star5'];
			}
		}
	}
}$conn->close();
?>
		