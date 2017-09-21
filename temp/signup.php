<?php
 $db = mysqli_connect('localhost','root','','users')
 or die('Error123 connecting to MySQL server.');
 
    // Error message
    $error = "";
    $c = 0;
    $c1 = 1;
    if (isset($_POST['new_username']) && isset($_POST['new_password']) && isset($_POST['new_email']) && $_POST['new_username'] != '' && $_POST['new_password'] != '' && $_POST['new_email'] !='') {
    	$uname  = $_POST['new_username'];
    	$passwd = $_POST['new_password'];
    	$email  = $_POST['new_email'];
    	
    	$queryuname = "SELECT username FROM userinfo WHERE username='$uname'";
    	$queryemail = "SELECT email FROM userinfo WHERE email='$email'";
    	
    	$count = 0;
    	$checkuname = mysqli_query($db,$queryuname);
    	$resultuname = mysqli_fetch_array($checkuname);
    	$countuname = mysqli_num_rows($checkuname);
    	
    	$checkemail = mysqli_query($db,$queryemail);
    	$resultemail = mysqli_fetch_array($checkemail);
    	$countemail = mysqli_num_rows($checkemail);
    	
    	if($countuname == 0 && $countemail == 0){
    	
    		$query1 = "INSERT INTO userinfo (username,password,email) VALUES ('$uname','$passwd','$email')";
    		$result = mysqli_query($db,$query1)or die('Error querying database.');	
   		$row = mysqli_fetch_array($result);	
   		header("Location: login.php");
    	}
    	else{
    		echo "<h1>Username or Email Exists!</h1>";
    	}
    }
    else{
        if($c != 0){
        	$error = "Please enter all Values!";
        	$c = $c + $c1;
        }
    	
    }
 
?>

<html >
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
      <link rel="stylesheet" href="css/style.css">
</head>


<body>
  <div class="login-page">
  <?php echo $error; ?>
  <div class="form">
    <form class="register-form" method="post" action="signup.php">
      <input type="text"     name="new_username" id="new_username" placeholder="New Username"/>
      <input type="password" name="new_password" id="new_password" placeholder="New Password"/>
      <input type="text"     name="new_email"    id="new_email"    placeholder="Email Id"/>
      <input type="submit" value="Create">
      <p class="message">Already registered? <a href="./login.php">Sign In</a></p>
    </form>
  </div>
</div>

</body>
</html>


