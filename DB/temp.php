<?php
$serverName="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="temp";

$conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}
$user="aman";
$nop=1;
$pid[0]=0;
  			$sql="SELECT getbuscount();";
  			$result=mysqli_query($conn,$sql);

  			$row=mysqli_fetch_assoc($result);

  			print_r($row['getbuscount()']);

			   		
		
				