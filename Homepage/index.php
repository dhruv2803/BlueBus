<?php
include_once '../db/dbh.inc.php';
session_start();



if(isset($_GET['error']))
{
    if($_GET['error']==='bookstat1')
    {
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>'.$_SESSION['username'].'!</strong> Cannot Book more than once!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Blue bus Ticket Booking Index page</title>

    <link rel="canonical" href="index.php">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tooplate-style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    -->
      <meta name="theme-color" content="#7952b3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Merriweather&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
  
    if(isset($_SESSION['username'])){
     echo'  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        <img class="container-img" src="bus_logo.PNG" height=50>
      <a class="navbar-brand" href="#" style="color:yellow;">BlueBus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color:white;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../account/myaccount.php" style="color:white;">My Account</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="../booking/book ticket.php" style="color:white;">Book Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact/contact.php" style="color:white;">Contact us</a>
          </li>
          <li class="nav-item">
              <div class="text-left">
                    <form action="../db/logout.inc.php" method="post">
                        <button type="submit" class="btn bg-dark" style="color:white;"  name="logos">Logout</button>
                    </form>
                </div>
            </li>

        </ul>
      </div>
    
  </nav>';

    }
    else
    {
    	echo'  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        <img class="container-img" src="bus_logo.PNG" height=50>
      <a class="navbar-brand" href="#" style="color:yellow;">BlueBus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color:white;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../signup/signup.php" style="color:white;">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/login.php" style="color:white;">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/login.php" style="color:white;">Book Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact/contact.php" style="color:white;">Contact us</a>
          </li>             
          
        </ul>
      </div>
    
  </nav>';
    }

    ?>



  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
  </ul>
    <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="bus-travel-11.jpg" width="1100" height="600" alt="Chicago">
          </div>
          <div class="carousel-item">
            <img src="bus-travel-21.jpg" width="1100" height="600" alt="New York">
          </div>
          <div class="carousel-item">
            <img src="bus-travel-41.jpg" width="1100" height="600" alt="Chicago">
          </div>
          
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
  </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <?php
  if(isset($_SESSION['username'])){
  echo'
      <section id="r-advantages-part" class="r-advantages-part my-5" >
      <div class="r-advantage-main-part" style="background-color:rgb(247, 233, 235);" >
          <div class="container fluid">
              <div class="advantage-head">
                  <span>Thank you for Signing yourself up with Bluebus.</span>
                  <h2>Take a look at <b>This</b></h2>
              </div>
              <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <a href="../account/myaccount.php">
                          <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon"> <img src="advantage-icon-1.png" alt=""> </div>
                          <div class="head animated pulse">My Accounts</div>
                          <div class="sub-text">View and edit your Personal Information.</div>
                      </div>
                  </a>
                  </div>
  
  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                             <a href="../booking/book ticket.php">
                      <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon"> <img src="advantage-icon-2.png" alt=""> </div>
                          <div class="head animated pulse" >Book Your Seat &amp; Track Bus</div>
                          <div class="sub-text">Find Source &amp; Destination Location &amp; Track Bus at any Time.</div>
                      </div>
                  </a>
                      
  
                  </div>
                  
  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <a href="../booking/book ticket.php">
                          <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon" style="color:#ffffff;"> <img src="advantage-icon-3.png" alt=""> </div>
                          <div class="head animated pulse">Know Your Location &amp; Decide</div>
                          <div class="sub-text">With the help of our map, know the location of nearest Bus stop.</div>
                      </div>
                  </a>
                  </div>
              </div>
              
          </div>';

  }
  else
  {
    echo'
    <section id="r-advantages-part" class="r-advantages-part my-5" >
      <div class="r-advantage-main-part" style="background-color:rgb(247, 233, 235);" >
          <div class="container fluid">
              <div class="advantage-head">
                  <span>With BlueBus, Book your bus seat with just three steps.</span>
                  <h2>Book your BUS <b>in THREE steps</b></h2>
              </div>
              <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <a href="../login/login.php">
                          <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon"> <img src="advantage-icon-1.png" alt=""> </div>
                          <div class="head animated pulse">Login &amp; Sign-up</div>
                          <div class="sub-text">Login &amp; Sign-up using g-mail.</div>
                      </div>
                  </a>
                  </div>
  
  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                             <a href="../login/login.php">
                      <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon"> <img src="advantage-icon-2.png" alt=""> </div>
                          <div class="head animated pulse" >Book Your Seat &amp; Track Bus</div>
                          <div class="sub-text">Find Source &amp; Destination Location &amp; Track Bus at any Time.</div>
                      </div>
                  </a>
                      
  
                  </div>
                  
  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <a href="../login/login.php">
                          <div class="r-advantages-box" style="background-color:#000033;">
                          <div class="icon" style="color:#ffffff;"> <img src="advantage-icon-3.png" alt=""> </div>
                          <div class="head animated pulse">Know Your Location &amp; Decide</div>
                          <div class="sub-text">With the help of our map, know the location of nearest Bus stop.</div>
                      </div>
                  </a>
                  </div>
              </div>
              
          </div>
         
      </div>
  </section>';

  }
  ?>

         
      </div>
  </section>
  <!-- FOOTER 
  <footer >
        <p ><a href="#" style="color:rgb(00, 00, 15);">Back to top</a></p>
    <p class="p-3 bg-dark text-white text-center" style="color:#000033;">&copy; 2021 BlueBus Company, Inc. &middot;</p>
</footer>-->

<footer> 
  
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="primary-button">
                  <a href="#" class="scroll-top">Back To Top</a>
              </div>
          </div>
        
          <div class="col-md-12">
              <p>© 2021 BlueBus Company, Inc. ·
         </p>
          </div>
      </div>
    
  </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/vendor/jquery-1.11.2.min.js'><\/script>")</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/datepicker.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  // navigation click actions 
  $('.scroll-link').on('click', function(event){
      event.preventDefault();
      var sectionID = $(this).attr("data-id");
      scrollToID('#' + sectionID, 750);
  });
  // scroll to top action
  $('.scroll-top').on('click', function(event) {
      event.preventDefault();
      $('html, body').animate({scrollTop:0}, 'slow');         
  });
  // mobile nav toggle
  $('#nav-toggle').on('click', function (event) {
      event.preventDefault();
      $('#main-nav').toggleClass("open");
  });
});
// scroll function
function scrollToID(id, speed){
  var offSet = 0;
  var targetOffset = $(id).offset().top - offSet;
  var mainNav = $('#main-nav');
  $('html,body').animate({scrollTop:targetOffset}, speed);
  if (mainNav.hasClass("open")) {
      mainNav.css("height", "1px").removeClass("in").addClass("collapse");
      mainNav.removeClass("open");
  }
}
if (typeof console === "undefined") {
  console = {
      log: function() { }
  };
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>
