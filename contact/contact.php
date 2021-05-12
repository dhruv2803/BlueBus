<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Blue bus Travel and Tour-Contect page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
       <!--  <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
 <?php
  
    if(isset($_SESSION['username'])){
     echo'  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
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
            <a class="nav-link" href="../account/myaccount.php" style="color:white;font-size:16px">My Account</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="../login/login.php" style="color:white;font-size:16px;">Book Ticket</a>
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
    
  </nav>';

    }
    else
    {
        echo'  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        <img class="container-img" src="bus_logo.PNG" height=50>
      <a class="navbar-brand" href="#" style="color:yellow;font-size:25px;">BlueBus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color:white; font-size:16px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../signup/signup.php" style="color:white;font-size:16px;">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/login.php" style="color:white;font-size:16px;">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/login.php" style="color:white;font-size:16px;">Book Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color:white;font-size:16px;">Contact us</a>
          </li>             
          
        </ul>
      </div>
    
  </nav>';
    }

    ?>

    <section class="page-heading" id="top" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <img src="bus_logo.PNG" alt="Blue Bus">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-direction-button">
                        <a href="../homepage/index.php"><i class="fa fa-home"></i>Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Leave us a message</h2>
                    </div>
                </div>
                <div class="col-md-12 col-md-offset-2" bgcolor="red">
                    <form id="contact" action="#" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Submit Your Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="#" class="scroll-top">Back To Top</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p>© 2021 BlueBus Company, Inc. ·
             </p>
                </div>
            </div>
        </div>
    </footer>


    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
</body>
</html>