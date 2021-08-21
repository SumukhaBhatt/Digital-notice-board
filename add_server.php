<?php
$array1=$_REQUEST["q"];
$ar=explode(":",$array1);
$not=$ar[1]."!".date("M,d,Y h:i:s A");
//echo $ar[0]."thats it";
$array=explode("-",$ar[0]);
$conn=new mysqli("localhost","root","","notice_board");
if($conn->error)
{
	die();
}
else
{
	$sql="SELECT user_name,read1,not1,read2,not2,read3,not3,read4,not4,read5,not5,star1,star2,star3,star4,star5 FROM student";
	$res=$conn->query($sql);
	if($res->num_rows>0)
	{	$i=0;
		$person=explode("/",$array[0]);
		while($row=$res->fetch_assoc())
		{ if(trim($person[$i],"/")==$row['user_name'])
			{
				//echo $person[$i];
			$sql=$sql="UPDATE student"." SET read5=".$row['read4'].",read4=".$row['read3'].",read3=".$row['read2'].",read2=".$row['read1'].",read1=1".
			",star5=".$row['star4'].",star4=".$row['star3'].",star3=".$row['star2'].",star2=".$row['star1'].",star1=0".
				",not5='".$row['not4']."',not4='".$row['not3']."',not3='".$row['not2']."',not2='".$row['not1']."',not1='".$not."' WHERE user_name='".$row['user_name']."'";
			if(!$conn->query($sql))
			{
				echo $conn->error;
			}
			$i=$i+1;
			}
		}
		echo "message is sent";
	}
	else echo"Nothing is in server";
	
	$sql="SELECT user_name,read1,not1,read2,not2,read3,not3,read4,not4,read5,not5,star1,star2,star3,star4,star5 FROM teacher";
	$res=$conn->query($sql);
	if($res->num_rows>0)
	{	$i=0;
		$person=explode("/",$array[1]);
		while($row=$res->fetch_assoc())
		{ if(trim($person[$i],"/")==$row['user_name'])
			{
				echo "hi i enter";
			$sql="UPDATE teacher"." SET read5=".$row['read4'].",read4=".$row['read3'].",read3=".$row['read2'].",read2=".$row['read1'].",read1=1".
			",star5=".$row['star4'].",star4=".$row['star3'].",star3=".$row['star2'].",star2=".$row['star1'].",star1=0".
				",not5='".$row['not4']."',not4='".$row['not3']."',not3='".$row['not2']."',not2='".$row['not1']."',not1='".$not."' WHERE user_name='".$row['user_name']."'";
			if($conn->query($sql))
				echo $conn->error;
			$i=$i+1;
			}
		}
		echo "message is sent";
	}
	else echo"Nothing is in server";

}				
	
?>