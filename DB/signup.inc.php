<?php
if(isset($_POST["submit"]))
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $pwdr=$_POST["pwd-repeat"];
    $tadd1=$_POST["address"];
    $tadd2=$_POST["additional"];
    $pincode=$_POST["pin"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $ccode=$_POST["code"];
    $phonen=$_POST["phone"];
    
    $name=$fname." ".$lname;
    $address=$tadd1.", ".$city.", ".$pincode.", ".$state;
    $phone=$ccode.$phonen;

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyinputs( $fname,$gender,$age,$email,$username,$pwd,$pwdr,$tadd1,$pincode,$city,$state,$ccode,$phonen)!==false){
        header("location: ../signup/signup.php?error=emptyinput");
        exit();
    }

    if(invaliduid($username)!==false)
    {
        header("location: ../signup/signup.php?error=invaliduid");
        exit();
    }

    if(invalidemail($email)!==false)
    {
        header("location: ../signup/signup.php?error=invalidemail");
        exit();
    }

    if(pwdmatch($pwd,$pwdr)!==false)
    {
        header("location: ../signup/signup.php?error=pwdnotmatch");
        exit();
    }

    if(uidexist($conn,$username,$email)!==false)
    {
        header("location: ../signup/signup.php?error=usernameoremailalreadyexits");
        exit();
    }

    createuser($conn,$username,$pwd,$email,$name,$gender,$age,$city,$pincode,$phone,$address);
    exit();


}
else{
    header("location: ../signup/signup.php");
    exit();
}