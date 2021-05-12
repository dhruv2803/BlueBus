<?php
function emptyinputs( $fname,$gender,$age,$email,$username,$pwd,$pwdr,$tadd1,$pincode,$city,$state,$ccode,$phonen){
    $result;
    if(empty($fname)||empty($gender)||empty($age)||empty($email)||empty($username)||empty($pwd)||empty($pwdr)||empty($tadd1)||empty($pincode)||empty($city)||empty($state)||empty($ccode)||empty($phonen)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invaliduid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidemail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function pwdmatch($pwd,$pwdr){
    $result;
    if($pwd!==$pwdr){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function uidexist($conn,$username,$email){
    $sql="SELECT * FROM users WHERE username=? OR uemail = ? ;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup/signup.php?error=stmterror1");
        exit();        
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultdat = mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($resultdat))
    {
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}


function createuser($conn,$username,$pwd,$email,$name,$gender,$age,$city,$pincode,$phone,$address){
    $sql="INSERT INTO users (username,upwd,uemail,uname,ugender,uage,ucity,upincode,uphone,uaddress) VALUES (?,?,?,?,?,?,?,?,?,?) ;";
    mysqli_next_result($conn);
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup/signup.php?error=stmterror2");
        exit();        
    }

    $hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssssssss",$username,$hashedpwd,$email,$name,$gender,$age,$city,$pincode,$phone,$address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql="SELECT * FROM users WHERE username='$username';";
    $result= mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $userid=$row['iduser'];
            $sql="INSERT INTO profileimg(iduser,pstatus) VALUES ('$userid',1);";
            mysqli_query($conn,$sql);
        }
    }
    header("location: ../login/login.php?error=success");
    exit();

}

function login_user($conn,$username,$pwd){
    if($username==='admin')
    {
        if($pwd==='admin')
        {
            header("location: ../admin/admin.php");
            exit();
        }
    }

    $uidexist=uidexist($conn,$username,$username);

    if($uidexist===false)
    {
        header("location: ../login/login.php?error=uidinvalid");
        exit();
    }

    $pwdhash=$uidexist['upwd'];
    $checkpwd=password_verify($pwd, $pwdhash);

    if($checkpwd===false)
    {
        header("location: ../login/login.php?error=pwdinvalid");
        exit();
    }
    else if($checkpwd===true)
    {
        session_start();
        $_SESSION['iduser']=$uidexist['iduser'];
        $_SESSION['username']=$uidexist['username'];
        $_SESSION['upwd']=$uidexist['upwd'];

        $user=$uidexist['username'];
        mysqli_next_result($conn);
        $sql="SELECT * FROM userpass WHERE username='$user';";
        $result=mysqli_query($conn,$sql);
        $n=mysqli_num_rows($result);
        $_SESSION['bookstatus']=$n;


        header("location: ../homepage/index.php?error=success");
        exit();
    }

}