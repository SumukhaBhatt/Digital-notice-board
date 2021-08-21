<?php
{
	$u_name=$_POST["user_name"];
	$p1=$_POST["password1"];
	$qus=$_POST["question"];
	$ans=$_POST["answer"];
	$person=$_POST["person"];
	$st="NOTHING";
	echo $u_name .$p1 .$qus.$ans;
	$conn=new mysqli('localhost','root','','notice_board');
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	{
		$stmt=$conn->prepare("INSERT INTO ".$person. "(user_name,password,question,answer,not1,not2,not3,not4,not5) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssssss",$u_name,$p1,$qus,$ans,$st,$st,$st,$st,$st);
		$stmt->execute();
		$stmt->close();
		header("location:login_page.html");
	}
		//echo "alert('user name is exist')";
		//echo "</script>";
		//header("location:login_page.html");
		
$conn->close();
}
?>