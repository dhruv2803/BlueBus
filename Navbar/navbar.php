
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    -->

    
    <!-- Custom styles for this template -->
    <!-- <link href="style.css" rel="stylesheet"> -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Merriweather&display=swap" rel="stylesheet">
	

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        <img class="container-img" src="bus_logo.PNG" >
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
            <a class="nav-link" href="../account/myaccount.php" style="color:white;font-size:16px;">My Account</a>
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
                        <button type="submit" class="btn bg-dark" style="color:white;font-size:16px;"   name="logos">Logout</button>
                    </form>
                </div>
            </li>

        </ul>
      </div>
    
  </nav>
</body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
</html>
