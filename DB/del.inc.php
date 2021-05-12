<?php
session_start();
/* for testing purpose*/

// $serverName="localhost";
// $dBUsername="root";
// $dBPassword="";
// $dBName="temp";

// $conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

// if(!$conn){
//     die("Connection failed : ".mysqli_connect_error());
// }


include_once '../db/dbh.inc.php';


$ch=$_GET['action'];

if($ch=='bus')
{
	$sql="CALL getbus();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['bus'.$i]))
		{
			mysqli_next_result($conn);
			$busid=$row['busid'];
			echo $busid." ";

			$sql1="SELECT * FROM ticket WHERE busid='$busid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			print_r($result1);
			$row1=mysqli_fetch_assoc($result1);

			$pid=$row1['pid'];
			$tid=$row1['tid'];
			$tic=$row1['ticketid'];

			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL deltran('$tid');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delbscheb('$busid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			$sql1="CALL delbus('$busid');";
			mysqli_query($conn,$sql1);

			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}
}
else if($ch=='bstop')
{

	$sql="CALL getbstop();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['bstop'.$i]))
		{
			mysqli_next_result($conn);
			$stid=$row['stid'];
			echo $stid." ";

			$sql1="SELECT * FROM ticket WHERE src='$stid' or dest='$stid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			print_r($result1);
			while($row1=mysqli_fetch_assoc($result1))
			{
			$pid=$row1['pid'];
			$tid=$row1['tid'];
			$tic=$row1['ticketid'];

			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL deltran('$tid');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			}



			mysqli_next_result($conn);
			$sql1="CALL delbsches('$stid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			$sql1="CALL delbstop('$stid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			
			$sql1="CALL delpathS('$stid','$stid');";
			mysqli_query($conn,$sql1);

			header("location: ../admin/admin.php?error=success");
			exit();
			
		}
		$i=$i+1;
	}
}
else if($ch=='bsche')
{
	$sql="CALL getbsche();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['bsche'.$i]))
		{
			mysqli_next_result($conn);
			$stid=$row['stops'];
			echo $stid." ";

			$sql1="SELECT * FROM ticket WHERE src='$stid' or dest='$stid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			print_r($result1);
			while($row1=mysqli_fetch_assoc($result1))
			{
			$pid=$row1['pid'];
			$tid=$row1['tid'];
			$tic=$row1['ticketid'];

			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL deltran('$tid');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			}



			mysqli_next_result($conn);
			$sql1="CALL delbsches('$stid');";
			mysqli_query($conn,$sql1);


			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}
}

else if($ch=='bpath')
{
	$sql="CALL getbpath();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['bpath'.$i]))
		{
			mysqli_next_result($conn);
			$src=$row['src'];
			$dest=$row['dest'];

			echo $stid." ";

			$sql1="SELECT * FROM ticket WHERE src='$src' and dest='$dest';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			print_r($result1);
			while($row1=mysqli_fetch_assoc($result1))
			{
			$pid=$row1['pid'];
			$tid=$row1['tid'];
			$tic=$row1['ticketid'];

			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL deltran('$tid');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			}

			mysqli_next_result($conn);
			$sql2="SELECT * FROM busstop WHERE stid='$src';";
			$result2=mysqli_query($conn,$sql);
			$row2=mysqli_fetch_assoc($result);
			$sn=$row2['val'];
			mysqli_next_result($conn);
			$sql2="SELECT * FROM busstop WHERE stid='$dest';";
			$result2=mysqli_query($conn,$sql);
			$row2=mysqli_fetch_assoc($result);
			$tn=$row2['val'];
			
			$way=$tn-$sn;
			if($way<0)
			{
				$way=1;
			}
			else if($way>0)
			{
				$way=0;
			}

			mysqli_next_result($conn);
			$sql1="DELETE FROM  bschedule WHERE (way='$way')and(stops='$src' OR stops='$dest');";
			mysqli_query($conn,$sql1);

			mysqli_next_result($conn);
			$sql1="CALL delbpatha('$src','$dest');";
			mysqli_query($conn,$sql1);

			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}	
}
else if($ch=='users')
{
	$sql="CALL getuser();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['users'.$i]))
		{

			$user=$row['username'];
			mysqli_next_result($conn);
			$sql1="SELECT * FROM userpass WHERE username='$user';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$nop=mysqli_num_rows($result1);

			while($row1=mysqli_fetch_assoc($result1))
			{
			$pid=$row1['pid'];

			mysqli_next_result($conn);
			$sql1="SELECT * FROM ticket WHERE pid='$pid';";
			$res2=mysqli_query($conn,$sql1);
			$row2=mysqli_fetch_assoc($res2);
			$tid=$row2['tid'];
			$tic=$row2['ticketid'];
			

			if($nop==1)
			{
				mysqli_next_result($conn);
				$sql1="CALL deltran('$tid');";
				mysqli_query($conn,$sql1);
			}



			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			}

			mysqli_next_result($conn);
			$sql1="CALL deluser('$user');";
			mysqli_query($conn,$sql1);	

			

			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}	
}
else if($ch=='ticks')
{
	$sql="CALL getticks();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['ticks'.$i]))
		{

			$tic=$row['ticketid'];
			$pid=$row['pid'];
			$tid=$row['tid'];

			mysqli_next_result($conn);
			$sql1="SELECT * FROM userpass WHERE pid='$pid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$row1=mysqli_fetch_assoc($result1);
			$user=$row1['username'];

			mysqli_next_result($conn);
			$sql1="SELECT * FROM userpass WHERE username='$user';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$nop=mysqli_num_rows($result1);

			if($nop==1)
			{
				mysqli_next_result($conn);
				$sql1="CALL deltran('$tid');";
				mysqli_query($conn,$sql1);
			}


			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			

			

			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}	
}
else if($ch=='pass')
{

	$sql="CALL getpass();";
	$result=mysqli_query($conn,$sql);
	$i=1;
	while($row=mysqli_fetch_assoc($result))
	{
		if(isset($_POST['pass'.$i]))
		{

			// 
			$pid=$row['pid'];
			// 

			mysqli_next_result($conn);
			$sql1="SELECT * FROM userpass WHERE pid='$pid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$row1=mysqli_fetch_assoc($result1);
			$user=$row1['username'];

			mysqli_next_result($conn);
			$sql1="SELECT * FROM userpass WHERE username='$user';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$nop=mysqli_num_rows($result1);
			
			mysqli_next_result($conn);
			$sql1="SELECT * FROM ticket WHERE pid='$pid';";
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$row1=mysqli_fetch_assoc($result1);
			
			$tid=$row['tid'];
			$tic=$row['ticketid'];
			
			if($nop==1)
			{
				mysqli_next_result($conn);
				$sql1="CALL deltran('$tid');";
				mysqli_query($conn,$sql1);
			}


			mysqli_next_result($conn);
			$sql1="DELETE FROM userpass WHERE pid='$pid';";
			mysqli_query($conn,$sql1);
			
			mysqli_next_result($conn);
			$sql1="CALL delpass('$pid');";
			mysqli_query($conn,$sql1);


			mysqli_next_result($conn);
			$sql1="CALL delticks('$tic');";
			mysqli_query($conn,$sql1);				
			

			

			header("location: ../admin/admin.php?error=success");
			exit();
		}
		$i=$i+1;
	}	
	
}
else
{
	header("../admin/admin.php?error=nop");
	exit();
}

