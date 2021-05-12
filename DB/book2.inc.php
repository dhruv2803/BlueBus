<?php
include_once '../db/dbh.inc.php';
session_start();
$nop=$_SESSION['nop'];
if(isset($_POST['submit']))
{
	$i=1;
	while($i<=$nop)
	{
		$temp=$_POST['dob'.$i];
		$temp1=explode('/',$temp);
		$temp=$temp1[1]."-".$temp1[0]."-".$temp1[2];
		$date=date('Y-m-d',strtotime(str_replace('/', '-', $temp)));
		$currdate=date('Y-m-d');

		if($currdate>$date)
		{
			$fname=$_POST['fname'.$i];
			$lname=$_POST['lname'.$i];
			$gender=$_POST['gender'.$i];
			$code=$_POST['code'.$i];
			$tphone=$_POST['phone'.$i];

			$name=$fname." ".$lname;
			$phone=$code.$tphone;
			echo '<script>alert("'.$name.$phone.$date.'")</script>';
			$pid="PN";

			while(1)
			{
				$pid="PN".mt_rand(100000,999999);
				$sql="SELECT * FROM passenger WHERE pid='$pid';";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)===0)
				{
				    $sql="INSERT INTO passenger (pid,pname,dob,pgender,pphone) VALUES (?,?,?,?,?) ;";
				    $stmt=mysqli_stmt_init($conn);
				    if(!mysqli_stmt_prepare($stmt,$sql)){
				        header("location: ../booking/book%20ticket1.php?error=stmterror2");
				        exit();        
				    }

				    mysqli_stmt_bind_param($stmt,"sssss",$pid,$name,$date,$gender,$phone);
				    mysqli_stmt_execute($stmt);
				    mysqli_stmt_close($stmt);
					$user=$_SESSION['username'];
					$sql="INSERT INTO userpass(username,pid) VALUES('$user','$pid');";
					mysqli_query($conn,$sql);
				    break;
				}
				
			}
			$user=$_SESSION['username'];
			
			
	
		
		}else
	{
	header("location: ../booking/book%20ticket1.php?error=invaliddob");
	exit();
	}
	$i=$i+1;
	}
	header("location: ../Transac/transac.php?error=success");
	exit();

	}
else
{
	header("location: ../booking/book%20ticket1.php?error=invalidaccess");
	exit();
}