<?php
include_once '../db/dbh.inc.php';
if(isset($_POST['submit']))
{

	$src=$_POST['from'];
	$dest=$_POST['to'];

	$temp=$_POST['departure'];
	$temp1=explode('/', $temp);
	$temp=$temp1[1]."-".$temp1[0]."-".$temp1[2];
	$date=date('Y-m-d',strtotime(str_replace('/', '-', $temp)));
	$currdate=date('Y-m-d');

	
	echo'<script>alert("'.strtotime(str_replace('/', '-', $temp)).'")</script>';
	if($currdate<$date)
	{
	$nop=$_POST['nump'];
	session_start();
	$_SESSION['src']=$src;
	$_SESSION['dest']=$dest;
	$_SESSION['jdate']=$date;
	$_SESSION['nop']=$nop;
	$sql="SELECT * FROM busstop WHERE stid='$src';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$sn=$row['val'];

	$sql="SELECT * FROM busstop WHERE stid='$dest';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$tn=$row['val'];
	
	$way=$tn-$sn;
	if($way<0)
	{
		$way=1;
	}
	else if($way>0)
	{
		$way=0;
	}
	else
	{
		echo'<script>alert("Source and Destination cannot be Same!")</script>';
		header("location: ../booking/book%20ticket.php?error=pathinvalid");
		exit();	
	}
	$_SESSION['way']=$way;

	$sql="SELECT B1.* FROM bschedule B1,bschedule B2 WHERE (B1.BUSID=B2.BUSID AND B1.WAY='$way' AND B2.WAY='$way' AND B1.STOPS='$src' AND B2.STOPS='$dest') ORDER BY dep_time;";
	$result=mysqli_query($conn,$sql);
	$flag=0;
	$busid="B01";
	while($row=mysqli_fetch_assoc($result))
		{
			$busid=$row['busid'];
			$sql="SELECT * FROM buses WHERE busid='$busid';";
			echo'<script>alert("'.$busid.'")</script>';
			$result1=mysqli_query($conn,$sql);
			$row1=mysqli_fetch_assoc($result1);
			
			if($row1['num_seats_av']>=$nop)
			{
				$newnum=$row1['num_seats_av']-$nop;
				$sql1="UPDATE buses SET num_seats_av='$newnum' WHERE busid='$busid'";
				mysqli_query($conn,$sql1);

				$user=$_SESSION['username'];
				$sql1="SELECT * FROM users WHERE username='$user';";
				$result2=mysqli_query($conn,$sql1);
				$row2=mysqli_fetch_assoc($result2);
				$numb=$row2['ubooknum'];
				$numb=$numb+$nop;

				$sql1="UPDATE users SET ubooknum='$numb' WHERE username='$user';";
				mysqli_query($conn,$sql1);

				

				$flag=1;
				break;
			}		
		}
		if($flag===0)
		{
			echo'<script>alert("Number of seats not available!")</script>';
			header("location: ../booking/book%20ticket.php?error=noseat");
			exit();
		}
		$_SESSION['busid']=$busid;


	header("location: ../booking/book%20ticket1.php?error=success");
	exit();	
	}
	else
	{
	header("location: ../booking/book%20ticket.php?error=invaliddate");
	echo'<script>alert('.$currdate.')</script>';
	exit();		
	}


}
else
{
	header("location: ../booking/book%20ticket.php?error=invalidaccess");
	
	exit();
}