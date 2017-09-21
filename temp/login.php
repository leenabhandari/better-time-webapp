<?php
 $db = mysqli_connect('localhost','root','','users')
 or die('Error123 connecting to MySQL server.');
 
 // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,
    
    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    /*if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: index.php');
    } */
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
	
	
	
    if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username']!='' && $_POST['password'] != '') {
    	$uname  = $_POST['username'];
    	$passwd = $_POST['password'];
    	$query1 = "SELECT * FROM userinfo WHERE username='$uname' AND password='$passwd'";
    	$result = mysqli_query($db,$query1)or die('Error querying database.');	
   	$row = mysqli_fetch_array($result);		
   	$username = $row['username'];
    	$password = $row['password'];
    	
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: index.php');
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    }
    else{
    	
    }
 
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  

	  
<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
  
</head>

<body>

<header id="header">
				<div class="inner">
					<div class="content">
						<h1>Better Time</h1>
						<h2>This project aims at tackling with 'Food Adulteration'. So go ahead and make India a better place to live in.. </h2>
						<form class="login-form" method="post" action="login.php">
      <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="Password"/>
      <input type="submit" value="Login">
      <p class="message">Not registered? <a href="./signup.php">Create an account</a></p>
    </form>
						<a href="#" class="button big alt"><span>Sign up</span></a>
					</div>
					<a href="#" class="button hidden"><span>Let's Go</span></a>
				</div>
			</header>
  <div class="login-page">
  <?php echo $error; ?>
  
  
  <div class="form">
    <form class="login-form" method="post" action="login.php">
      <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="Password"/>
      <input type="submit" value="Login">
      <p class="message">Not registered? <a href="./signup.php">Create an account</a></p>
    </form>
  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>
