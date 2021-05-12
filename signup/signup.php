<?php?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>

    <link rel="canonical" href="signup.php">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body class="form-v10">
    <?php
  
    if(isset($_SESSION['username'])){
          echo"<script>window.location.href='../homepage/index.php?error=invalidaccess';</script>";
     exit;


    }
 

    ?>
	<div class="page-content" style="	background-image: url('img/temp.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: 100% 100%;">
		<div class="form-v10-content">
			<form class="form-detail" action="../DB/signup.inc.php" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="fname" class="input-text" placeholder="First Name" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="lname"  class="input-text" placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-row">
						<select name="gender">
						    <option value="Gender">Gender</option>
						    <option value="Male">Male</option>
						    <option value="Female">Female</option>
						    <option value="Other">Other</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="" name="age" class="age"  placeholder="Age" required>
					</div>

					<div class="form-row">
						<input type="text" name="email"  class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<div class="form-row ">
						<input type="text" name="username"  class="input-text" placeholder="Username" required>
					</div>
					<div class="form-row ">
						<input type="password" name="pwd"  class="input-text" placeholder="Password" required>
					</div>
					<div class="form-row ">
						<input type="password" name="pwd-repeat"  class="input-text" placeholder="Confirm Password" required>
					</div>


				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="address" class="street"  placeholder="Address" required>
					</div>
					<div class="form-row">
						<input type="text" name="additional" class="additional"  placeholder="Additional Information" >
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="pin" class="zip"  placeholder="Pin Code" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="city"  class="input-text" placeholder="City" required>

						</div>
					</div>
					<div class="form-row">
						<select name="state">
						    <option value="State">State</option>
						    <option value="Maharashtra">Maharastra</option>
						    <option value="Gujarat">Gujarat</option>
						    <option value="Rajasthan">Rajasthan</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code"  placeholder="Code +" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="phone" class="phone"  placeholder="Phone Number" required>
						</div>
					</div>

					<div class="form-checkbox">
						<label class="container"><p>Already have an account? <a href="../login/login.php" class="text">Sign In!</a> </p>
						  	
						  	
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Sign Up">
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">

		function isinputnum(evt){
		  var ch=String.fromCharCode(evt.which);
		  if(!(/[0-9]/.test(ch))){
			evt.preventDefault();
			alert("Please enter only integers.");
		  }
		}
  
	  </script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>