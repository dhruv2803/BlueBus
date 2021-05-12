<?php

include_once 'dbh.inc.php';
session_start();
$user=$_SESSION['username'];
$i=1;
$flag=0;
while($i<=5)
{
	if(isset($_POST['submit'.$i]))
	{
		$flag=1;
		$sql="SELECT * FROM userpass WHERE username='$user' ORDER BY pid;";
		$result=mysqli_query($conn,$sql);
		$nop=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		$j=1;

		while($j<$i)
		{
			$row=mysqli_fetch_assoc($result);
			$j=$j+1;
		}

		$pid=$row['pid'];
		
		if($nop>=1)
		{
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);

			$sql1="DELETE FROM passenger WHERE pid='$pid';";
			mysqli_query($conn,$sql1);

			$sql1="SELECT * FROM ticket WHERE pid='$pid';";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($result1);
			$busid=$row1['busid'];
			$tid=$row1['tid'];


			$sql1="DELETE FROM ticket WHERE pid='$pid';";
			mysqli_query($conn,$sql1);

			$sql1="SELECT * FROM buses WHERE busid='$busid';";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($result1);
			$seat=$row1['num_seats_av'];
			$seat=$seat+1;

			$sql1="UPDATE buses SET num_seats_av='$seat' WHERE busid='$busid';";
			mysqli_query($conn,$sql1);
			if($nop==1)
			{
				$sql1="DELETE FROM transactions WHERE tid='$tid';";
				mysqli_query($conn,$sql1);
				$_SESSION['bookstatus']=0;
			}
			header("location: ../account/myaccount.php?error=canceled");
			exit();			

		}
		else
		{
			header("location: ../account/myaccount.php?error=norowfound");
			exit();
		}
		break;
	}
$i=$i+1;
}
if($flag==0)
{
	header("location: ../account/myaccount.php?error=invalidaccess");
	exit();
}