<?php 
   require("config.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['username'])) 
        { echo "<script> alert('Please enter a username.')</script>"; } 
        if(empty($_POST['password'])) 
        { echo "<script> alert('Please enter a password.')</script>"; } 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { echo "<script> alert('Please enter a valid email.')</script>"; } 
    
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
        $query_params = array( ':username' => $_POST['username'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This username is already in use"); } 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
         
        // Add row to database 
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
         
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
?>
<!-- Author: Michael Milstead / Mode87.com
     for Untame.net
     Bootstrap Tutorial, 2013
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Teach Me How To Code</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="JS/bootstrap.js"></script>

  <!--  <link rel="stylesheet" type="text/css" href="CSS/reg.css">-->
    <link rel="stylesheet" type="text/css" href="CSS/code.css">
    <link rel="stylesheet" type="text/css" href="CSS/signup.css">
  <!--  <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">-->


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript">
    function pwCheck() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
</script>-->
</head>

    <body>
        <div id=everything>
            <div id=content-head>
                <div id=site-logo>
                    <div id=logo>
                        <a href="secret.php">
                            <img src="IMG/logo.png" />
                        </a>
                    </div>
                </div>

                <div id=login-button>
                    <a href="register.php"><button name="logout" style="width:150px; margin-left:0px; margin-top:12px;">Register!</button></a>
                    <button name="login" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
                </div>
            </div> <!-- END OF CONTENT HEADER -->
<br><br>
 <div class="fotu">
<div class="container">
      <div class="row" style="margin-bottom:50px;">
        <div class="col-md-5 col-md-offset-7">
            <form action="register.php" method="post" accept-charset="utf-8" class="form" role="form">
                <legend style="font-family:"helvetica",sans serif;">Sign Up</legend>
                <h4>Free yourself from data.</h4><br>
                <input style="border-radius:2px;" type="text" name="username" value="" class="form-control input-lg" placeholder="Username"  /><br><br>
                <input style="border-radius:2px;" type="text" name="email" value="" class="form-control input-lg" placeholder="E-mail"  /><br><br>
                <input style="border-radius:2px;" type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><br><br>
                <span class="help-block">By clicking "Sign up", you agree to our Terms of Service.</span><br>
                <input style="border-radius:2px;" class="btn btn-lg btn-primary btn-block signup-btn" type="submit" value="Sign Up for Teach Me How to Code!"></button>
            </form>          
          </div>
</div>  
</div>
</div>
</div>
    </body>
</html>