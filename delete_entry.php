<?php

// initialize a session

session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
$usr_name=$_SESSION['user_name'];
$id=htmlspecialchars($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/styles/layout.css" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
</head>
<body>

<?php
  if(!isset($_SESSION['user_name'])){
?>
<!--header-->
<div class="row1  wrapper"  >
  <header id="header" class="  clear ">
    <div id="hgroup">
      <h1><a  href="#">Vases Database</a></h1>
      <h2>DUTH</h2>
    </div>
    <form action="search.php" method="get">
      <fieldset>
        <legend>Search:</legend>
        <input type="text" name='search' placeholder="search the database...">
        <input type="submit" id="sf_submit"  value="submit">
      </fieldset>
    </form>
  </header>
 <!-- <div class="mini-container"> -->
</div>

<!-- h mpara -->
<?php
if($current_lang==en){
?>
<div class="row1  bara">

 <header id="header" class="  clear ">
  <nav>
      <ul>
        <li><a href="index.php?lang=<?php echo $current_lang; ?>" onclick="showonlyone('Home');">Home</a></li>
        <li><a  href="collections.php?lang=<?php echo $current_lang; ?>">Collection</a></li>
       <!-- <li><a href="#" onclick="javascript:showonlyone('About');">About</a></li> -->
        <li> 
        
        <?php
        
             if(!isset($_SESSION['user_name'])){
           
        ?>
              
              <a href="session.php">Sign In</a>
        
        <?php
         
         }else{
        
        ?>
              
              
			  <li><a><?php echo $_SESSION['user_name']; ?></a> 
				<ul >
					<li><a href="sign_out.php" >Sign Out</a></li>
					<li><a href="my_coll?lang=<?php echo $current_lang; ?>" >My Collection</a></li>
				</ul>
			</li>
              
        <?php } ?>
        
        </li>
        <?php
        if(!isset($_SESSION['user_name'])){
        ?>
          <li class="last" ><a href="#" >Language</a> 
			 <ul >
				<li><a href="index.php?language=en" >English</a></li>
				<li><a href="index.php?language=gr">ΕΛΛΗΝΙΚΑ</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="index.php?language=en" >English</a></li>
				<li><a href="index.php?language=gr">ΕΛΛΗΝΙΚΑ</a></li>
			</ul>
		</li>
		
		
		<li class="last" ><a>insert entry</a> 
			<ul>
				<li><a href="upload.php" >Upload</a></li>
				<li><a href="insert.php">manually</a></li>
			</ul>	 
		</li>
        <?php
        }
        ?>
        
      </ul>
    </nav>
</header>
</div>
<?php
}elseif($current_lang=gr){
?>
<div class="row1  bara">

 <header id="header" class="  clear ">
  <nav>
      <ul>
        <li><a href="index.php?lang=<?php echo $current_lang;?>" onclick="showonlyone('Home');">αρχικη</a></li>
        <li><a  href="collections.php?lang=<?php echo $current_lang; ?>">συλλογη</a></li>
       <!-- <li><a href="#" onclick="javascript:showonlyone('About');">About</a></li> -->
        <li> 
        
        <?php
        
             if(!isset($_SESSION['user_name'])){
           
        ?>
              
              <a href="session.php">εισοδος</a>
        
        <?php
         
         }else{
        
        ?>
              
              
			  <li><a><?php echo $_SESSION['user_name']; ?></a> 
				<ul >
					<li><a href="sign_out.php" >εξοδος</a></li>
					<li><a href="my_coll?lang=<?php echo $current_lang; ?>" >η συλλογη μου</a></li>
				</ul>
			</li>
              
        <?php } ?>
        
        </li>
        <?php
        if(!isset($_SESSION['user_name'])){
        ?>
          <li class="last" ><a href="#" >γλωσσα</a> 
			 <ul >
				<li><a href="index.php?language=en" >English</a></li>
				<li><a href="index.php?language=gr">ΕΛΛΗΝΙΚΑ</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >γλωσσα</a> 
			 <ul >
				<li><a href="index.php?language=en" >English</a></li>
				<li><a href="index.php?language=gr">ΕΛΛΗΝΙΚΑ</a></li>
			</ul>
		</li>
		
		
		<li class="last" ><a>δημιουργια αρχειου</a> 
			<ul>
				<li><a href="upload.php" >ανεβαστε</a></li>
				<li><a href="insert.php">χειροκεινητα</a></li>
			</ul>	 
		</li>
        <?php
        }
        ?>
        
      </ul>
    </nav>
</header>
</div>
<?php
}
?>
<div class="wrapper row2 ">

  <div id="container" class="clear" >
  
  <div id="notAllow">
  <a>
<?php
  echo "You are not authorized for this action!";
?>
  </a>
  </div>
  </div>
  </div>
  <div  class="wrapper row3 ">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </footer>
</div>
<?php
  }else{
	include 'lib/Client.class.php';
	include 'lib/Query.class.php';
	include 'lib/ResultSet.class.php';
	include 'lib/SimpleXMLResultSet.class.php';
	include 'lib/DOMResultSet.class.php';
	
	// these are the values the class will default to, so it is entirely possible to 
	// instantiate the class with no paramaters provided
	$connConfig = array(
		'protocol'=>'http',
		'user'=>$usr_name,
		'password'=>$_SESSION['pw'],
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	); 
	  
	  
	 $conn = new \ExistDB\Client($connConfig);
	  $xql = <<<EOXQL
	xquery version "3.1";
declare default element namespace "http://www.carare.eu/carareSchema";
import module namespace xmldb="http://exist-db.org/xquery/xmldb";
import module namespace util="http://exist-db.org/xquery/util";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

let \$path:=concat("/db/vases/entries/",\$usr_name)
for \$a in collection(\$path)/carareWrap/carare[@id=\$id]

let \$entry_name:=util:document-name(\$a)
let \$remove := xmldb:remove(\$path,\$entry_name)
return  (\$remove)
  
EOXQL;
$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('id', $id);
$stmt->bindVariable('usr_name', $usr_name);
echo "all good";
$resultPool=$stmt->execute();
$results=$resultPool->getAllResults();
//print_r($results);

?>
<script type="text/javascript">
window.location = "my_coll.php" 
</script>

<?php	  
}
?>

</body>
</html>