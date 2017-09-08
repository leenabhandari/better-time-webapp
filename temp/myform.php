
<META http-equiv="refresh" content="0;URL=index.php">


<?php
$db = mysqli_connect('localhost','root','','media')
 or die('Error connecting to MySQL server.');
if($_POST['formSubmit'] == "Submit")

{
$varName = $_POST['formName'];

$varSubject=$_POST['formSubject'];
$varDes=$_POST['formDes'];
$errorMessage = "";

  if(empty($_POST['formSubject']))
  {
    $errorMessage .= "<li>You forgot to enter a Subject!</li>";
  }

  if(empty($_POST['formName']))
  {
    $varName="";
  }
  if(!empty($errorMessage))
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  }
if($errorMessage != "")
{
  echo("<p>There was an error:</p>\n");
  echo("<ul>" . $errorMessage . "</ul>\n");
}
else
{

    $qry = "insert into post(name,subject,description) values('$varName','$varSubject','$varDes');";
    $result = mysqli_query($db,$qry);

}

}

?>
