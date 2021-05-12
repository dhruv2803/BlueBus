<?php
session_start();
include_once '../db/dbh.inc.php';
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

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

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
                                <li><a href="http://facebook.com">Find us on <em>Facebook</em><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://youtube.com">Our <em>YouTube</em> Channel<i class="fa fa-youtube"></i></a></li>
                                <li><a href="http://instagram.com">Follow our <em>instagram</em><i class="fa fa-instagram"></i></a></li>
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
                                <h4>Please Fill in:</h4>
                                <form id="form-submit" action="../db/book2.inc.php" method="post">
                                    <?php
                                        $nop=$_SESSION['nop'];
                                        $i=1;

                                        while($i<=$nop)
                                        {
                                            echo'<div class="row">
                                            <a style="font-size:20px;color:#000;">Passenger '.$i.':</a>
                                            </div><br>
                                            <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="fname'.$i.'">First Name:</label>
                                                <input name="fname'.$i.'" type="text" class="form-control text" placeholder="Enter First Name" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="lname'.$i.'">Last Name:</label>
                                                <input name="lname'.$i.'" type="text" class="form-control text" placeholder="Enter Last Name" required>
                                            </fieldset>
                                        </div>
                                         <div class="col-md-6">
                                            <fieldset>
                                                <label for="gender'.$i.'">Gender:</label>
                                                <select required name="gender'.$i.'" >
                                                    <option value="">Select...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">other</option>
                                                </select>
                                            </fieldset>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="dob'.$i.'">Date of Birth:</label>
                                                <input name="dob'.$i.'" type="text" class="form-control date" placeholder="Select date..." required>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="code'.$i.'">Code:</label>
                                                <input name="code'.$i.'" type="code" class="form-control code" placeholder="Code +" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="phone'.$i.'">Phone:</label>
                                                <input name="phone'.$i.'" type="phone" class="form-control phone" placeholder="Phone Number" required>
                                            </fieldset>
                                        </div>                                        
                                    </div><br>';
                                            $i=$i+1;
                                        }

                                    ?>
                                    
                                    <div class="row">
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
</body>
</html>