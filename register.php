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

	include 'lib/Client.class.php';
	include 'lib/Query.class.php';
	include 'lib/ResultSet.class.php';
	include 'lib/SimpleXMLResultSet.class.php';
	include 'lib/DOMResultSet.class.php';
	
	$connConfig = array(
		'protocol'=>'http',
		'user'=>'admin',
		'password'=>'welcome2AHK',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
	
	if($current_lang==en){
		
		$empty="You haven't inserted anything in the form!Click <a href='session.php'>here</a> to go back to the login page";
		$all_good="Your account has been created!Click <a href='index.php'>here</a> to go back to the home page";
		$same="This username already exists!Click <a href='session.php'>here</a> to go back to the login page";
		$diff_pw="ERROR: your password doesnt match!Click <a href='session.php'>here</a> to go back to the login page";
			
	}elseif($current_lang==gr){
		$empty="Η φόρμα συμπλήρωσης είναι κενή!Πατήστε <a href='session.php'>εδώ</a> για να επιστρέψετε";
		$all_good="Ο λογαριασμός δημιουργήθηκε!Πατήστε <a href='index.php'>εδώ</a> για να επιστρέψετε";
		$same="Το όνομα χρήστη ήδη υπάρχει!Πατήστε <a href='session.php'>εδώ</a> για να επιστρέψετε";
		$diff_pw="Οι κωδικοί δεν ταιριάζουν !Πατήστε <a href='session.php'>εδώ</a> για να επιστρέψετε";

	}
	
	
//check if form is empty
if (!isset($_SESSION['user_name'])&&!isset($_POST['new_user_name'])&&!isset($_POST['new_pw'])&&!isset($_POST['retype_new_pw'])&&!isset($_POST['new_user_mail'])){
	
	?>
	<div id="usr_form">
		<form>
			<?php echo $empty; ?>
		</form>
	</div>
<?php
	}
if (!isset($_SESSION['user_name'])&&isset($_POST['new_user_name'])&&isset($_POST['new_pw'])&&isset($_POST['retype_new_pw'])&&isset($_POST['new_user_mail'])){
	if (empty($_POST['new_user_name']) || empty($_POST['new_pw']) || empty($_POST['new_user_mail'])||empty($_POST['retype_new_pw'])){
	?>
	<div id="usr_form">
		<form>
			<?php echo $empty; ?>
		</form>
	</div>
<?php
	}
	//if not empty and both password instances match
	else if(!empty($_POST['new_user_name'])&&!empty($_POST['new_pw'])&&!empty($_POST['new_user_mail'])&& $_POST['new_pw']==$_POST['retype_new_pw']){
		$new_name=$_POST['new_user_name'];
		$new_mail=$_POST['new_user_mail'];
		$new_pw=$_POST['new_pw'];
		$conn = new \ExistDB\Client($connConfig);
	  $xql = <<<EOXQL
	   xquery version "3.1";
	   import module namespace xmldb="http://exist-db.org/xquery/xmldb";
	   import module namespace sn="http://exist-db.org/xquery/securitymanager";
	              let \$not_empty:='not empty'
	    let \$loop:=(
			if (not(xmldb:exists-user(\$new_name))) then(
				let \$a:=collection('/db/vases/credentials')/users
	            (:let \$group:=xmldb:create-group(\$new_name,'admin') :)
	            let \$collection:=xmldb:create-collection('/db/vases/entries/',\$new_name)
	            let \$new_acc:= sn:create-account(\$new_name,\$new_pw,\$new_name)
	            (:let \$path:='/db/vases/'.\$new_name'/' :)
	            let \$t:=sn:chgrp(\$collection,\$new_name)
	            let \$owner:=sn:chown(\$collection,\$new_name)
	            let \$cred:=update insert <user><name>{\$new_name}</name><pw>{\$new_pw}</pw><mail>{\$new_mail}</mail></user> into \$a
             return
				\$not_empty)
			else()
	)
	     return \$loop
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('new_name', $new_name);
$stmt->bindVariable('new_mail', $new_mail);
$stmt->bindVariable('new_pw', $new_pw);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();
//check if user alredy exists
if (!empty($results)){		
?>
	<div id="usr_form">
		<form>
			<?php 
				
			        
			        
				$path = getcwd()."/data/uploads/$new_name";
				//echo $path;
				mkdir($path, 0777);
				chmod ($path,0775);
				echo $all_good; ?>
		</form>
	</div>
<?php
}else{ 
?>
	<div id="usr_form">
		<form>
			<?php echo $same; ?>
		</form>
	</div>
<?php

}
	}else{
?>
	<div id="usr_form">
		<form>
			<?php echo $diff_pw; ?>
		</form>
	</div>
<?php
	}
}

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