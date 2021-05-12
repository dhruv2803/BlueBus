<?php
session_start();
include_once '../db/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


</head>
<body>


	<div class="limiter" >
	
		<div class="container-login100" style="background-image: url(images/temp.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(images/bg-1.jpg);">
					<span class="login100-form-title-1">
						Transact
					</span>
				</div>
				<div style="background-color: #323233;opacity:0.93;">
    <?php
if (isset($_SESSION['username'])){

	while(1)
	{
		$tid="TR".mt_rand();
		$sql="SELECT * FROM transactions WHERE tid='$tid';";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)===0)
		{
			break;
		}
		
	}
	$src=$_SESSION['src'];
	$dest=$_SESSION['dest'];
	$jdate=$_SESSION['jdate'];
	$busid=$_SESSION['busid'];

	$sql="SELECT * FROM paths WHERE src='$src' and dest='$dest';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$fare=$row['distance']*4;
	$nop=$_SESSION['nop'];


	$tdate=date('Y-m-d');
	$ttime=date('H-i-sa');
  echo '<div class="row">
  			<div class="col-md-6" >
  				<a style="font-size:20px;color:#fff;margin: 10px 50px 5px;">Transaction Id<a>
  			</div>
			
			<div class="col-md-6" >
  				<a style="font-size:20px;color:rgb(228,196,15);">'.$tid.'<a>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-6" >
  				<a style="font-size:20px;color:#fff;margin: 10px 50px 5px;">Transaction Date<a>
  			</div>
			
			<div class="col-md-6" >
  				<a style="font-size:20px;color:rgb(228,196,15);">'.$tdate.'<a>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-6" >
  				<a style="font-size:20px;color:#fff;margin: 10px 50px 5px;">Transaction Time<a>
  			</div>
			
			<div class="col-md-3" >
  				<a style="font-size:20px;color:rgb(228,196,15);">'.$ttime.'<a>
  			</div>
  		</div>		
  		<div class="row">
  			<div class="col-md-6" >
  				<a style="font-size:20px;color:#fff;margin: 10px 50px 5px;"> Total Fare<a>
  			</div>
			
			<div class="col-md-3" >
  				<a style="font-size:20px;color:rgb(228,196,15);">'.$fare*$nop.'<a>
  			</div>
  		</div>
  		<form class="login100-form validate-form" style="opacity:0.87;" action="'.$_SERVER["PHP_SELF"].'" method="post">
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Pay and Book
						</button>
					</div>  			

  		</form>
			</div>
			</div>
		</div>
	</div>';

	if(isset($_POST['submit']))
	{
		$user=$_SESSION['username'];

		mysqli_next_result($conn);
		$sql="INSERT INTO transactions VALUES('$tid','$tdate','$ttime');";
		mysqli_query($conn,$sql);		
		$flag=0;

		mysqli_next_result($conn);
		$sql="SELECT * FROM userpass WHERE username='$user';";
		$result=mysqli_query($conn,$sql);
		$nop=mysqli_num_rows($result);
		$i=1;
		$pid[0]="";
		while($i<=$nop)
		{
			$row=mysqli_fetch_assoc($result);
			$pid[$i]=$row['pid'];
			$i=$i+1;
		}
		$i=1;
		while($i<=$nop)
		{
			$p=$pid[$i];

			$ticketid="";
			$sno=1;
		
			while(1)
			{
				mysqli_next_result($conn);
				$ticketid="TK".mt_rand(100000,999999);
				$sql="SELECT * FROM ticket WHERE ticketid='$ticketid';";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)===0)
				{
					break;
				}
			}
			while(1)
			{
				mysqli_next_result($conn);
				$sno=mt_rand(1,40);
				$sql="SELECT * FROM ticket WHERE seatno='$sno' AND busid='$busid';";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)===0)
				{
					break;
				}
			}

			mysqli_next_result($conn);	
			$sql="INSERT INTO ticket(ticketid,tid,pid,seatno,src,dest,jdate,busid,fare) VALUES(?,?,?,?,?,?,?,?,?);";
			$stmt=mysqli_stmt_init($conn);
			$i=$i+1;
		    if(!mysqli_stmt_prepare($stmt,$sql)){
		        header("location: ../homepage/index.php?error=stmterror".$i);
		        exit();        
		    }
		    mysqli_stmt_bind_param($stmt,"sssssssss",$ticketid,$tid,$p,$sno,$src,$dest,$jdate,$busid,$fare);
		    mysqli_stmt_execute($stmt);
		    mysqli_stmt_close($stmt);
			$i=$i+1;
			$flag=1;

		}

		if($flag===1)
		{
			$_SESSION['bookstatus']=1;
		echo "<script>window.location.href='../homepage/index.php?error=success';</script>";
    	exit;			
		}


	}
}
else {
  
      header("location: ../homepage/index.php?error=invalidaccess");
      exit();
    

  
}
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 	

</body>
</html>