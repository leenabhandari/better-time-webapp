<?php
//Step1
 $db = mysqli_connect('localhost','root','','media')
 or die('Error connecting to MySQL server.');
?>

<html>
	<head>
		<title>Better Time</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<div class="content">
						<h1>Better Time</h1>
						<h2>Loading...</h2>
						<a href="#" class="button big alt"><span>Let's Go</span></a>
					</div>
					<a href="#" class="button hidden"><span>Let's Go</span></a>
				</div>
			</header>
<div>

  <div style="text-align:center"  class="form1">
    <h1><br><br>Post a news</h1>
<form class="cf" action="myform.php" method="POST" >
  <div class="half left cf">
    <input type="text" id="input-name" placeholder="Name" name="formName">

    <input type="text" id="input-subject" placeholder="Title" name="formSubject">
  </div>
  <div class="half right cf">
    <textarea  type="text" id="input-message" placeholder="Link/Description" name="formDes"></textarea>
  </div>
  <input type="submit" value="Submit" id="input-submit" name="formSubmit">
</form>


  </div>


 <div id="main" style="text-align:center"  >
   <h3>News</h3>
     <form method="POST">
 <?php
$query = "SELECT * FROM post";
mysqli_query($db, $query) or die('Error querying database.');
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
$varcom=1000-$row['postID'];
$varcom1=2000-$row['postID'];
  $varid=$row['postID'];
$vardel=3000-$row['postID'];
 echo '<br><br><h5>Name: '.$row['name'].'</h5><br> <h4>Title: '.$row['subject'].'</h4><br>Description: ' . $row['description'] . '<br> ' . $row['agree'];
   ?>
   <div class="button-comtainer123">
   <form method="post">
     <div>
 <input type="submit" name="<?php echo $varid; ?>" value="Agree">
 </div>
 </form>
 <?php
 echo  $row['disagree'] ?>
 <form method="post">
   <div>
  <input type="submit" name="<?php echo $vardel; ?>" value="Disagree">
</div>
</form>
</div>
<form  method="post">
    <input type="text" placeholder="Comment" name="<?php echo $varcom1 ?>" >
    <input type="submit" name="<?php echo $varcom ?>" value="Submit" ><br>Comments:
</form>
  <?php

  $qry6="select des from comment where id=1000-'$varcom';";
  $res1=mysqli_query($db,$qry6);

  while($row1=mysqli_fetch_array($res1))
  {
      echo '<br>'.$row1['des'];
  }
echo '<hr>';
 if(isset($_POST[$varid])){
   $qry1="update post set agree=agree+1 where postID='$varid';";
   mysqli_query($db,$qry1);
   header("Refresh:0");
 }
 else if(isset($_POST[$vardel])){
   $qry2="update post set disagree=disagree+1 where postID=3000-'$vardel';";
   mysqli_query($db,$qry2);
   header("Refresh:0");
 }
 else if(isset($_POST[$varcom]))
 {
   $varcomment=$_POST[$varcom1];
   $varcomid=2000-$varcom1;
   $qrycom="insert into comment values('$varcomid','$varcomment');";
   mysqli_query($db,$qrycom);
   header("Refresh:0");
 }


}

mysqli_close($db);
?>
</form>
</div>
</div>
<<footer id="footer">
				<a href="#" class="info fa fa-info-circle"><span>About</span></a>
				<div class="inner">
					<div class="content">
						<h3>About 'Better time' project</h3>
						<p>There is a saying that goes, “Whoever controls the media, controls the mind.” When virality outweighs truth, you have fake news. We need tools for fact-checking and helping people decipher fact from fiction. We need to ensure the “freedom of the press” holds for those who are attempting to bring the truth to the public but end up getting bullied by people who abuse power. The greatest tool is Democracy. Therefore, this is a place to let everyone know your opinion. Just a simple UI to post a news with no log-in or sign-up. Just Click 'Agree' if you think it is true and 'Disagree' if you dont. Also, please feel free to leave a comment.</p>
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
