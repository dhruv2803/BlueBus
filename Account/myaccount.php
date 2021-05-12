<?php
include_once '../db/dbh.inc.php';
session_start();

if(!isset($_SESSION['username']))
{
    header("location: ../homepage/index.php?error=invalidaccess");
    exit();
}


?>

<!DOCTYPE html>
<head>
<title>
    My Account
</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<style>
    body{
    background-image: url('img/temp.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    color: #fff;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background-color: #323233;opacity:0.93;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 20px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: rgb(228,196,15);
}
.profile-head h6{
    color: rgb(244,120,15);
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #fff;
    margin-top: 5%;
}
.proile-rating span{
    color: rgb(228,196,15);
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:750;
    color:rgb(228,196,15);
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    color: #000;
    border-bottom:5px solid rgb(228,196,15);;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: rgb(228,196,15);
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: rgb(228,196,15);
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


/*table*/

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


</style>    
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        <img class="container-img" src="bus_logo.PNG" height=50>
      <a class="navbar-brand" href="#" style="color:yellow;font-size:25px;">BlueBus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../homepage/index.php" style="color:white;font-size:16px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../account/myaccount.php" style="color:white;">My Account</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="../booking/book ticket.php" style="color:white;font-size:16px;">Book Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact/contact.php" style="color:white;font-size:16px;">Contact Us</a>
          </li>
          <li class="nav-item">
              <div class="text-right" >
                    <form action="../db/logout.inc.php" method="post">
                        <button type="submit" class="btn bg-dark" style="color:white;font-size:18px;"   name="logos">Logout</button>
                    </form>
                </div>
            </li>

        </ul>
      </div>
    
  </nav>    
<div class="container emp-profile">
            <form method="post" action="../db/img.up.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">

                           

                            <?php

                            $id=$_SESSION['iduser'];
                            $sql="SELECT * FROM profileimg WHERE iduser='$id';";
                            $result=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);

                            if($row['pstatus']==0){
                                            echo"<img src='../upload/profile".$id.".jpg?".mt_rand()."' height=100/>";
                                    }else{
                                            echo"<img src='../upload/profiledef.jpg' />";
                                    }  

                        
                            ?>
                            <div class="file btn btn-lg btn-primary">
                                Upload Photo
                             <input type="file" name="file">

                            </div>
                            
                        </div>

                    </div>     
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php
                                            $user=$_SESSION['username'];
                                            $sql="SELECT * FROM users WHERE username='$user';";
                                            $result = mysqli_query($conn,$sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if($resultCheck > 0){
                                              while($row = mysqli_fetch_assoc($result)){

                                                mysqli_next_result($conn);
                                                $sql1="SELECT * FROM usertick;";
                                                $res=mysqli_query($conn,$sql1);
                                                $r1=mysqli_num_rows($res);
                                                echo $row['uname']."</h5>
                                    <h6>".$row['ucity'].'</h6><p class="proile-rating">Total Bookings: <span>'.$row['ubooknum'].'</span></p>
                                    <p class="proile-rating">Current Bookings: <span>'.$r1.'</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true" ">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="profile" aria-selected="false">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                           <button type="submit" class="btnn" name="submit">Change Photo</button>
                            <p>Address</p>
                            <a >'.$row['uaddress'].'</a><br/>
                            <p>Contact</p>
                            <a >'.$row['uphone'].'</a><br/>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['username'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['uname'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['uemail'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['uage'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['ugender'].'</p>
                                            </div>
                                        </div>
                            </div>                                    ';

                                }
                              }
                             ?>
                             <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="profile-tab">
                                <?php
                                $user=$_SESSION['username'];
                                $sql="SELECT * FROM userpass WHERE username='$user';";
                                $result=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_assoc($result);
                                $nop=mysqli_num_rows($result);

                                                           
                                if($nop>0){
                                    $pid=$row['pid'];
                                    $sql1="SELECT * FROM ticket WHERE pid='$pid';";
                                    $result1=mysqli_query($conn,$sql1);
                                    $row1=mysqli_fetch_assoc($result1);
                                    $busid=$row1['busid'];
                                    $sql3="SELECT * FROM buses WHERE busid='$busid';";
                                    $result3=mysqli_query($conn,$sql3);
                                    $row3=mysqli_fetch_assoc($result3);     

                                    echo ' <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$user.'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bus</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$row3['busname'].'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Source</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$row1['src'].'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$row1['dest'].'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Journey</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$row1['jdate'].'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Number of passengers</label>
                                            </div>
                                            <div class="col-md-6">
                                                '.$nop.'
                                            </div>
                                        </div>';}
                                        else
                                        {
                                            echo ' <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bus</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Source</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Journey</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Number of passengers</label>
                                            </div>
                                            <div class="col-md-6">
                                                NONE
                                            </div>
                                        </div>';
                                        }
                                




                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<div class="container">
  <h2>Passenger Details </h2>
  <ul class="responsive-table">
    <li class="heading">
      <div class="col md-1 ">Ticket No.</div>
      <div class="col md-1 " >Passenger Id</div>
      <div class="col md-1 ">Name</div>
      <div class="col md-1 ">Age</div>
      <div class="col md-1 ">Gender</div>
      <div class="col md-1 ">Seatno</div>
      <div class="col md-1 ">Action</div>
      
    </li>
    <?php
    $user=$_SESSION['username'];
    $sql="SELECT * FROM userpass WHERE username='$user' order by pid;";
    $result=mysqli_query($conn,$sql);
    $i=1;

    while($row=mysqli_fetch_assoc($result))
    {
        $pid=$row['pid'];
        $sql1="SELECT * FROM ticket WHERE pid='$pid' ;";
        $sql2="SELECT * FROM passenger WHERE pid='$pid';";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $date1=$row2['dob'];
        $year=date('Y');
        $date=explode('-',$date1);
        $y1=(int)$date[0];
        $age=$year-$y1;
   

        echo'<li class="table-row">
      <div class="col md-1 ">'.$row1['ticketid'].'</div>
      <div class="col md-1 " >'.$row1['pid'].'</div>
      <div class="col md-2 ">'.$row2['pname'].'</div>
      <div class="col md-2 ">'.$age.'</div>
      <div class="col md-2 ">'.$row2['pgender'].'</div>
      <div class="col md-1 ">'.$row1['seatno'].'</div>
      <div class="col md-1 "><form action="../db/cancel.inc.php" method="post"> <button type="submit" class="btnn" style="  min-width: 30px;
  height: 40px;
  background:-webkit-linear-gradient(rgb(228, 12, 15), rgb(250, 120, 67));" name="submit'.$i.'">Cancel</button></form></div>
      
    </li>';


    }
    $i=$i+1;

    ?>
  
  
  </ul>
</div>            
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>     
</body>
</html>




<!------ Include the above in your HEAD tag ---------->
