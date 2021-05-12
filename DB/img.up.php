<?php
session_start();
include_once '../db/dbh.inc.php';
$id=$_SESSION['iduser'];

if(isset($_POST['submit'])){
	$file =$_FILES['file'];
	$filename=$_FILES['file']['name'];
	$filetmpname=$_FILES['file']['tmp_name'];
	$filesize=$_FILES['file']['size'];
	$fileError=$_FILES['file']['error'];
	$filetype=$_FILES['file']['type'];

	$fileext=explode(('.'), $filename);
	$fileactext=strtolower(end($fileext));

	$allowed =array('jpg','jpeg','png');

	if (in_array($fileactext, $allowed))
	{
		if($fileError===0)
		{
			if($filesize<5000000){
				 $filenewname="profile".$id.".".$fileactext;
				 $filedest='../upload/'.$filenewname;
				 move_uploaded_file($filetmpname,$filedest);
				 $sql="UPDATE profileimg SET pstatus =0 WHERE iduser='$id';";
				 $result=mysqli_query($conn,$sql);
				 header("location: ../account/myaccount.php?error=success");
				 exit();

			}
			else{
				echo'<script>alert("File size should be less than 3mb!")</script>';
				header("location: ../account/myaccount.php?error=size");
				exit();
			}

		}
		else
		{
			echo'<script>alert("Unknown error occured")</script>';
			header("location: ../account/myaccount.php?error=Unknown");
			exit();
		}

	}
	else
	{
		 echo'<script>alert("Invalid File Extension Used")</script>';
		 header("location: ../account/myaccount.php?error=extension");
		 exit();
	}
}