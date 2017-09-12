<?php

    $db = mysqli_connect('localhost','Atharva','qwertyui','users')
    or die('Error123 connecting to MySQL server.');
 
    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,
    
    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: success.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
    	$uname  = $_POST['username'];
    	$passwd = $_POST['password'];
    	$query1 = "Select * from userinfo where username='$uname' and password='$passwd'";
    	$result = mysqli_query($db,$query1)or die('Error querying database.');	
   	$row = mysqli_fetch_array($result);		
   	$username = $row['username'];
    	$password = $row['password'];
    	
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: success.php');
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    }
?>

<html>
    <head>
        <title>Login Page</title>
    </head>
    
    <body>
        <!-- Output error message if any -->
        <?php echo $error; ?>
        
        <!-- form for login -->
        <form method="post" action="index1.php">
            <label for="username">Username:</label><br/>
            <input type="text" name="username" id="username"><br/>
            <label for="password">Password:</label><br/>
            <input type="password" name="password" id="password"><br/>
            <input type="submit" value="Log In!">
        </form>
    </body>
</html>
