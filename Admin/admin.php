<?php
session_start();
// $serverName="localhost";
// $dBUsername="root";
// $dBPassword="";
// $dBName="temp";

// $conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

// if(!$conn){
//     die("Connection failed : ".mysqli_connect_error());
// }
include_once '../db/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Control</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/tooplate-style.css">
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   <style >
 
 body{
 	    background-image: url('img/temp.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
 
 }  	
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {}
.responsive-table  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
.responsive-table  .heading {
    background-color: #323233;
    opacity: 0.87;
    color: rgb(228,196,15);
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
.responsive-table  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
    color:#000;
  }
.responsive-table  .col-1 {
    flex-basis: 10%;
  }
.responsive-table  .col-2 {
    flex-basis: 40%;
  }
.responsive-table  .col-3 {
    flex-basis: 25%;
  }
.responsive-table  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
.responsive-table    .table-header {
      display: none;
    }
.responsive-table    .table-row{
      
    }
.responsive-table    li {
      display: block;
    }
.responsive-table    .col {
      
      flex-basis: 100%;
      
    }
.responsive-table    .col {
      display: flex;
      padding: 10px 0;
  
     &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }



/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #323233;
  width: 20%;
  height: 100%;
  min-height:780px; 
}

/* Style the buttons inside the tab */
.tab button {
  display: block;

  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #473732;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #434332;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  background: #323233;
  opacity: 0.96;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: 100%;
  min-height: 780px;
  max-height:780px;
  overflow-y: auto; 
}

.btnn
{

  padding: 0 10px;
  min-width: 150px;
  height: 40px;
  background:-webkit-linear-gradient(rgb(228, 192, 15), rgb(250, 120, 67));
  border-radius: 25px;
  font-family: Poppins-Regular;
  font-size: 16px;
  font-weight: 800;
  color: #fff;

}

   </style>

</head>
<body>
	<header style="background:#323233;color: rgb(226,198,15); padding: 10px;">
		<center><h1 >Admin Panel</h1></center>
	</header>
	<section style="margin:10px;">
		
			
				
<div class="tab" >
  <button class="tablinks" onclick="openCity(event, 'bus')" id="defaultOpen" style="  color:rgb(228,196,15);font-size: 24px;"><b>Bus</b></button>
  <button class="tablinks" onclick="openCity(event, 'bstop')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Bustops</b></button>
  <button class="tablinks" onclick="openCity(event, 'bsche')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Bus-Stop-Halt</b></button>
  <button class="tablinks" onclick="openCity(event, 'bpath')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Path</b></button>
  <button class="tablinks" onclick="openCity(event, 'users')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Users</b></button>
  <button class="tablinks" onclick="openCity(event, 'ticks')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Tickets</b></button>
 <button class="tablinks" onclick="openCity(event, 'passenger')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Passenger</b></button>
 <button class="tablinks" onclick="openCity(event, 'stats')" style="  color:rgb(228,196,15);font-size: 24px;"><b>Statistic</b></button>
 <form action="../db/logout.inc.php" method="POST">
 	<button class="tablink" name="submit" type="submit" style="  color:rgb(228,196,15);font-size: 24px;"><b>Logout</b></button>
 </form>
</div>

		
	
	<div class="tabcontent" id="bus">
					
		<div class="container" >
		  <h2 style="color: rgb(228,196,15);">Bus Details  </h2>
		  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>Busid</b></div>
			      <div class="col md-1 " ><b>Bus Name</b></div>
			      <div class="col md-1 "><b>Seats Available</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			      
			    </li>
			   
			   	<?php

			   		$sql="CALL getbus();";
			   		$result=mysqli_query($conn,$sql);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['busid'].'</div>
			      <div class="col md-1 " >'.$row['busname'].'</div>
			      <div class="col md-2 ">'.$row['num_seats_av'].'</div>
			      <div class="col md-1 "><form action="../db/del.inc.php?action=bus" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="bus'.$i.'">Delete</button></form></div>
				</li>';
				$i=$i+1;
				}
				
				
			   	?>
			     
			</ul>
      
		</div>
	</div>
      
		      

		  
		  

<div class="tabcontent" id="bstop" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Bus Stops </h2>
  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>Stid</b></div>
			      <div class="col md-1 " ><b>Stop Name</b></div>
		
			      <div class="col md-1 "><b>Action</b></div>
			      
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getbstop();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['stid'].'</div>
			      <div class="col md-1 " >'.$row['stops'].'</div>
			      
			      <div class="col md-1 "><form action="../db/del.inc.php?action=bstop" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="bstop'.$i.'">Delete</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>



<div class="tabcontent" id="bsche" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Bus Schedule</h2>
  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>BusID</b></div>
			      <div class="col md-1 " ><b>Stop</b></div>
		
			      <div class="col md-1 "><b>Arrival Time</b></div>
			      <div class="col md-1 "><b>Departure Time</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getbsche();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['busid'].'</div>
			      			<div class="col md-1 " >'.$row['stops'].'</div>
			      			<div class="col md-1 " >'.$row['ar_time'].'</div>
			      			<div class="col md-1 " >'.$row['dep_time'].'</div>

			      <div class="col md-1 "><form action="../db/del.inc.php?action=bsche" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="bsche'.$i.'">Delete</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>




<div class="tabcontent" id="bpath" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Paths</h2>
  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>Source</b></div>
			      <div class="col md-1 " ><b>Destination</b></div>		
			      <div class="col md-1 "><b>Distance</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getbpath();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['src'].'</div>
			      			<div class="col md-1 " >'.$row['dest'].'</div>
			      			<div class="col md-1 " >'.$row['distance'].'</div>

			      <div class="col md-1 "><form action="../db/del.inc.php?action=bpath" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="bpath'.$i.'">Delete</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>





<div class="tabcontent" id="users" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Users</h2>
  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>ID user</b></div>
			      <div class="col md-1 " ><b>Username</b></div>		
			      <div class="col md-1 "><b>Name</b></div>
			      <div class="col md-1 "><b>Age</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getuser();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['iduser'].'</div>
			      			<div class="col md-1 " >'.$row['username'].'</div>
			      			<div class="col md-1 " >'.$row['uname'].'</div>
			      			<div class="col md-1 " >'.$row['uage'].'</div>

			      <div class="col md-1 "><form action="../db/del.inc.php?action=users" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="users'.$i.'">Delete</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>



<div class="tabcontent" id="ticks" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Tickets</h2>
  <ul class="responsive-table">
			    <li class="heading">
			      <div class="col md-1 "><b>Ticket ID</b></div>
			      <div class="col md-1 " ><b>Passenger ID</b></div>
			      <div class="col md-1 "><b>Source</b></div>
			      <div class="col md-1 "><b>Destination</b></div>
			      <div class="col md-1 "><b>Journey Date</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getticks();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['ticketid'].'</div>
			      			<div class="col md-1 " >'.$row['pid'].'</div>
			      			<div class="col md-1 " >'.$row['src'].'</div>
			      			<div class="col md-1 " >'.$row['dest'].'</div>
			      			<div class="col md-1 " >'.$row['jdate'].'</div>

			      <div class="col md-1 "><form action="../db/del.inc.php?action=ticks" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="ticks'.$i.'">Cancel</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>


<div class="tabcontent" id="passenger" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Passengers</h2>
  <ul class="responsive-table">
			    <li class="heading">
			    
			      <div class="col md-1 " ><b>Passenger ID</b></div>
			      <div class="col md-1 "><b>Name</b></div>
			      <div class="col md-1 "><b>D.O.B</b></div>
			      <div class="col md-1 "><b>Gender</b></div>
			      <div class="col md-1 "><b>Contact</b></div>
			      <div class="col md-1 "><b>Action</b></div>
			    </li>
   				<?php
   					mysqli_next_result($conn);

			   		$sql1="CALL getpass();";
			   		$result1=mysqli_query($conn,$sql1);
			   		$i=1;
					while($row=mysqli_fetch_assoc($result1))
						{
							echo'<li class="table-row">
							<div class="col md-1 ">'.$row['pid'].'</div>
			      			<div class="col md-1 " >'.$row['pname'].'</div>
			      			<div class="col md-1 " >'.$row['dob'].'</div>
			      			<div class="col md-1 " >'.$row['pgender'].'</div>
			      			<div class="col md-1 " >'.$row['pphone'].'</div>

			      <div class="col md-1 "><form action="../db.del.inc.php?action=pass" method="post"> <button type="submit" class="btnn" style="  min-width: 100px;
				  height: 40px;
				  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="pass'.$i.'">Cancel</button></form></div>
				</li>
				  ';
				  $i=$i+1;
						}

				
			   	?>
  </ul>

</div>
</div>

<div class="tabcontent" id="stats" >
<div class="container" >
  <h2 style="color: rgb(228,196,15);">Statistics</h2>
  <div class="row">
  	
  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">Total Bus Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php
  			mysqli_next_result($conn);
  			$sql="SELECT getbuscount();";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $row['getbuscount()'];
  		?>
  	</div>
  </div>
<br>
  <div class="row">

  	  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">Seats Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php
  			$sql1="CALL getbus();";
  			mysqli_next_result($conn);
  			$res=mysqli_query($conn,$sql1);
  			while($row1=mysqli_fetch_assoc($res))
  			{
  				$bid=$row1['busid'];
  			mysqli_next_result($conn);
  			$sql="SELECT getseatsav('$bid');";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $bid."-".$row["getseatsav('$bid')"]."<br>";
  			}

  		?>
  	</div>
  </div>
  <br>
    <div class="row">

  	  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">Stops Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php

  			mysqli_next_result($conn);
  			$sql="SELECT getnumstop();";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $row["getnumstop()"]."<br>";


  		?>
  	</div>
  </div>

<br>
    <div class="row">

  	  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">User Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php

  			mysqli_next_result($conn);
  			$sql="SELECT getnumuser();";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $row["getnumuser()"]."<br>";


  		?>
  	</div>
  </div>
  <br>
    <div class="row">

  	  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">Passenger Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php

  			mysqli_next_result($conn);
  			$sql="SELECT getnumpass();";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $row["getnumpass()"]."<br>";


  		?>
  	</div>
  </div>
  <br>
    <div class="row">

  	  	<div class="col md-6">
  		<label style="color:rgb(228,196,15);font-size: 20px;">Tickets Count</label>
  	</div>
  	  <div class="col md-6" style="color:#fff;font-size:20px;">
  		<?php

  			mysqli_next_result($conn);
  			$sql="SELECT getnumticks();";
  			$result=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_assoc($result);
  			echo $row["getnumticks()"]."<br>";


  		?>
  	</div>
  </div>

   <br>
    <div class="row">

        <div class="col md-6">
      <label style="color:rgb(228,196,15);font-size: 20px;">Profile Image Set Number : </label>
    </div>
      <div class="col md-6" style="color:#fff;font-size:20px;">
      <?php

        mysqli_next_result($conn);
        $sql="SELECT count(*) from imgset;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        echo $row["count(*)"]."<br>";


      ?>
    </div>
  </div>

     <br>
    <div class="row">

        <div class="col md-6">
      <label style="color:rgb(228,196,15);font-size: 20px;">Total Bookings Made : </label>
    </div>
      <div class="col md-6" style="color:#fff;font-size:20px;">
      <?php

        mysqli_next_result($conn);
        $sql="SELECT sum(ubooknum)as books from totbooks;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        echo $row["books"]."<br>";


      ?>
    </div>
  </div>
</div>
</div>


	</section>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>