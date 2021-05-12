<?php
session_start();
include_once '../db/dbh.inc.php';


if($_SESSION['bookstatus']!==0)
{
    header("location: ../homepage/index.php?error=bookstat1");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    	<title>Blue bus Travel and Tour</title>
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
<?php include('../navbar/navbar.php');?>
<body class="book-ticket-body">  
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="left-side">
                        <div class="logo">
                            <img src="bus_logo.PNG" alt="Blue Bus">
                        </div>
                        <div class="tabs-content">
                            <h4>Choose Your Direction:</h4>
                            <ul class="social-links">
                                <li><a href="#">Find us on <em>Facebook</em><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#">Our <em>YouTube</em> Channel<i class="fa fa-youtube"></i></a></li>
                                <li><a href="#">Follow our <em>instagram</em><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="page-direction-button">
                            <a href="contact.html"><i class="fa fa-phone"></i>Contact Us Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form">
                                <h4>Check availability for direction:</h4>
                                <form id="form-submit" action="../db/book1.inc.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="from">From:</label>
                                                <select required name='from' >
                                                    <option value="">Select a location...</option>
                                                    <?php

                                                        $sql="SELECT * FROM busstop ORDER BY val;";
                                                        $result=mysqli_query($conn,$sql);
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                    ?>
                                                    
                                        
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="to">To:</label>
                                                <select required name='to' >
                                                    <option value="">Select a location...</option>
                                                    <?php
                                                        $sql="SELECT * FROM busstop ORDER BY val;";
                                                        $result=mysqli_query($conn,$sql);
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                        $row=mysqli_fetch_assoc($result);
                                                        echo'<option value="'.$row['stid'].'">'.$row['stops'].'</option>';
                                                    ?>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">Departure date:</label>
                                                <input name="departure" type="text" class="form-control date" id="deparure" placeholder="Select date..." required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="nump">Number of passenger:</label>
                                                <select required name='nump' >
                                                    <option value="">Select a Number...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>

                                                    
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn" name="submit">Proceed</button>
                                            </fieldset>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>


    <section class="services" style="margin: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item first-service">
                        <div class="service-icon"></div>
                        <h4>Easy Booking</h4>
                        <p>Just follow through pages and fill the details!Easy as that!</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-service">
                        <div class="service-icon"></div>
                        <h4>On Journey Payment</h4>
                        <p>No need to pay in advance. Pay on the journey itself!</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-service">
                        <div class="service-icon"></div>
                        <h4>Safe and luxious experience</h4>
                        <p>Have a ride like royalties with first class buses and facilities.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- 
    <section id="most-visited">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2><u>Most Visited Places</u></h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="owl-mostvisited" class="owl-carousel owl-theme">
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>Delhi</h4>
                                    <span>Temple</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Jammu</h4>
                                    <span>Heaven</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-03.jpg" alt="">
                                <div class="text-content">
                                    <h4>Maharashtra</h4>
                                    <span>City of pride</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-04.jpg" alt="">
                                <div class="text-content">
                                    <h4>Mumbai</h4>
                                    <span>Bollywood</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Gujarat</h4>
                                    <span>Surat</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>Gujarat</h4>
                                    <span>Ahemdabad</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-03.jpg" alt="">
                                <div class="text-content">
                                    <h4>UP</h4>
                                    <span>Ram Bhumi</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-04.jpg" alt="">
                                <div class="text-content">
                                    <h4>Tamilnadu</h4>
                                    <span>Joy</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>***</h4>
                                    <span>Pride</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Most Popular</h4>
                                    <span>Kerala</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
</body>
</html>