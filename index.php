<?php 
    require("config.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                username = :username 
        "; 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 

        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $row;  
            header("Location: secret.php"); 
            die("Redirecting to: secret.php"); 
        } 
        else{ 
            print("Login Failed."); 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?> 
<!doctype html>
<html lang="en">
<head>

    <title>Teach Me How To Code</title>
 <!--   <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="CSS/code.css">
 <!--   <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">-->
</head>

<body>
  <div id=everything>
    <div id=content-head>
      <div id=site-logo>
      	<div id="logo">
        	<a href="index.php"><img src="IMG/logo.png" /></a>
        </div>
      </div>

              <!-- ON-CLICK LOG IN POP UP -->

      <div id=login-button>
      		<a href="register.php"><button name="logout" style="width:150px; margin-left:0px; margin-top:12px;">Register!</button></a>
          	<button name="login" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
      </div>

      <div id="id01" class="modal">
        <form class="modal-content animate" action="index.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
               <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
          </div>

          <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo $submitted_username; ?>" required>

            <br><br>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="" required>

            <br><br>

            <button name="login" type="submit" value="Login">Login</button>
            <input type="checkbox" checked="checked"> Remember me
          </div>

          <div class="container" style="background-color:#f1f1f1 ">
            <span class="psw"><a href="#">Forgot password?</a></span>

<!--               <a href="register.php"><button type="button" onclick="document.getElementById('id01').style.display='none'" class="signupbtn">Don't have an account? Sign Up!</button></a>-->

          </div>
        </form>
      </div><!-- END OF ON CLICK LOG IN POP UP -->

    </div> <!-- END OF CONTENT HEADER -->

    <div id="main-content">
      <div id="gif">
        <div id="bitch">
          <img src="IMG/braincode.jpg" width="500px" height="500px">
        </div>
      
      <br><br><br><br><br><br><br><br>
      
        <div id="text-fam">
          <img src="IMG/text-main.png">
        </div>
      </div>
    </div>

</body>
</html>