<?php

// initialize a session
session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
?>
<!DOCTYPE html>
<html lang="en" >
<head>

<meta charset="UTF-8">
<title>Vases Database</title>
<!--<meta charset="iso-8859-1">-->
<link rel="stylesheet" href="/styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<script type="text/javascript">
function showonlyone(thechosenone) {
     $('.newboxes').each(function(index) {
          if ($(this).attr("id") == thechosenone) {
               $(this).show();
          }
          else {
               $(this).hide();
          }
     });
}
	</script>
	
<style>
</style>
<?php header('Content-Type:text/html;charset=UTF-8');
?>
</head>
<body>

<!--header-->
<?php
include 'header.php';
?>
<!-- content -->
<div class="wrapper row2 ">

  <div id="container" class="clear" >

<?php

	include '/var/www/html/lib/Client.class.php';
	include '/var/www/html/lib/Query.class.php';
	include '/var/www/html/lib/ResultSet.class.php';
	include '/var/www/html/lib/SimpleXMLResultSet.class.php';
	include '/var/www/html/lib/DOMResultSet.class.php';
	
	if($current_lang==en){
		
		$p="Log In";
		$usr_holder="insert your username";
		$pw_holder="insert your password";
		$type_usr="type your username";
		$type_mail="type your e-mail, eg somebody@example.com";
		$type_pw="type your password";
		$retype_pw="retype your password";
		$cred_error="your credentials were wrong! Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to go back to the login screen";
		$empty_name="ERROR: Please enter your name! Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to go back to the login screen";
		$empty_pw="ERROR: Please enter your password!Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to go back to the login screen";
		$all_good="Welcome back, " . $_SESSION['user_name'] . ". This session was activated " . round((time() - $_SESSION['start']) / 60) . " minute(s) ago. Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to refresh the page.";
	
	}elseif($current_lang==gr){
		
		$p="Σύνδεση";
		$usr_holder="εισαγωγή ονόματος χρήστη";
		$pw_holder="εισαγωγή κωδικού";
		$type_usr="εισαγωγή ονόματος χρήστη";
		$type_mail="εισάγετε το e-mail σας, π.χ somebody@example.com";
		$type_pw="εισαγωγή κωδικού";
		$retype_pw="επανεισαγωγή κωδικού";
		$cred_error="Τα στοιχεία ήταν λάθος! Πατήστε <a href=" . $_SERVER['PHP_SELF'] . ">εδώ</a> για να επιστρέψετε";
		$empty_name="ERROR: Βάλτε το όνομά σας! Πατήστε <a href=" . $_SERVER['PHP_SELF'] . ">εδώ</a> για να επιστρέψετε";
		$empty_pw="ERROR: Βάλτε τον κωδικό σας!Πατήστε <a href=" . $_SERVER['PHP_SELF'] . ">εδώ</a> για να επιστρέψετε";
		$all_good="Welcome back, " . $_SESSION['user_name'] . ". This session was activated " . round((time() - $_SESSION['start']) / 60) . " minute(s) ago. Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to refresh the page.";
		
	}
	
	
	
   if (!isset($_SESSION['user_name']) && !isset($_POST['user_name']) && !isset($_POST['pw'])) {

    // if no data, print the form

?>
<div id="usr_form">
	<p><?php echo $p ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

        <input type="text" name="user_name" placeholder="<?php echo $usr_holder ?>" >

        
		
		<input type="password" name="pw" placeholder="<?php echo $pw_holder ?>">

        <input type="submit" name="submit" value="log in" id="sf_submit">

    </form>
	
	<p>Or create account</p>
	<form action="register.php" method="post">

        <input type="text" name="new_user_name" placeholder="<?php echo $type_usr ?>" >

        <input type="text" name="new_user_mail" placeholder="<?php echo $type_mail ?>" >
		
		<input type="password" name="new_pw" placeholder="<?php echo $type_pw ?>">
		
		<input type="password" name="retype_new_pw" placeholder="<?php echo $retype_pw ?>">

        <input type="submit"  value="create account" id="sf_submit">

    </form>
	
	
</div>

<?php

}

else if (!isset($_SESSION['user_name']) && isset($_POST['user_name']) && isset($_POST['pw'])) {

    // if a session does not exist but the form has been submitted

    // check to see if the form has all required values

    // create a new session
	
	$connConfig = array(
		'protocol'=>'http',
		'user'=>'guest',
		'password'=>'guest',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);

    if (!empty($_POST['user_name']) && !empty($_POST['pw'])) {
    
    $conn = new \ExistDB\Client($connConfig);
	  $xql = <<<EOXQL
	   xquery version "3.1";
	   import module namespace xmldb="http://exist-db.org/xquery/xmldb";
	   import module namespace sn="http://exist-db.org/xquery/securitymanager";
	   for \$a in collection('/db/vases/credentials')/users
	   return (
	   
	   if(xmldb:exists-user(\$user_name)) then(
	   
	  data(\$a/user/pw)
	  )else()
	  )
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('user_name', $_POST['user_name']);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();

if(!empty($results)){
foreach($results as $result){
     if($result==htmlspecialchars($_POST['pw'])){
     
     
     $_SESSION['user_name'] = htmlspecialchars($_POST['user_name']);
     $_SESSION['pw'] = htmlspecialchars($_POST['pw']);

     $_SESSION['start'] = time();
     header("Location: index.php");
     ?>

     
<?php
     }else{
?>
     <div id="usr_form">
    <form >

<?php

     echo $cred_error;

?>
    </form>
</div>

<?php 
     
     }

	
}
        

    }else{
?>
     <div id="usr_form">
    <form >

<?php

     echo $cred_error;

?>
    </form>
</div>

<?php 
     
     }

    }else if (empty($_POST['user_name'])){
?>
<div id="usr_form">
    <form>

<?php 

echo $empty_name;

?>
    </form>
</div>
        
<?php 
    }
	
	else if (empty($_POST['pw'])){
?>
<div id="usr_form">
    <form >

<?php 

  echo $empty_pw;
  
?>
    </form>
</div>
	
<?php 	
	}

}
   //to be removed,from here
else if (isset($_SESSION['user_name']) && isset($_SESSION['pw'])) {

    // if a previous session exists

    // calculate elapsed time since session start and now

    echo "Welcome back, " . $_SESSION['user_name'] . ". This session was activated " . round((time() - $_SESSION['start']) / 60) . " minute(s) ago. Click <a href=" . $_SERVER['PHP_SELF'] . ">here</a> to refresh the page.";

}
 //to here
 
 //create new user


?>

  
  
  </div>
</div>
<!-- Footer -->
<div  class="wrapper row3 " >
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </footer>
</div>

</body>
</html>
