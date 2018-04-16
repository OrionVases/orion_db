<?php

// initialize a session
session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
$dic_id=$_GET['dic_id'];
$entry_id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

<meta charset="UTF-8">
<title>Vases Database</title>
<!--<meta charset="iso-8859-1">-->
<link rel="stylesheet" href="/styles/layout.css" type="text/css">
<link rel='stylesheet' type='text/css' href='http://www.x3dom.org/download/x3dom.css'></link> 

<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
  <script type='text/javascript' src='http://www.x3dom.org/download/x3dom.js'> </script> 
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

.dic_screen{
	margin-left:20em;
}
.dic_screen a{
	margin-left:4em;
	color:#979797;
	text-align:center;
}
 #dic_threedrep{
	 display:block;
	 width:354px;
	 height:480px;
	 float:right;
	 margin-top:-26em;
	 margin-left:9em;
}
</style>
<?php header('Content-Type:text/html;charset=UTF-8');
?>
</head>
<body>

<!--header-->
<div class="row1  wrapper"  >
  <header id="header" class="  clear ">
    <div id="hgroup">
      <h1><a  href="index.php">Vases Database</a></h1>
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
					<li><a href="my_coll.php?lang=<?php echo $current_lang; ?>" >My Collection</a></li>
				</ul>
			</li>
              
        <?php } ?>
        
        </li>
        <?php
        if(!isset($_SESSION['user_name'])){
        ?>
          <li class="last" ><a href="#" >Language</a> 
			 <ul >
				<li><a href="?language=en&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>" >English</a></li>
				<li><a href="?language=gr&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="?language=en&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>" >English</a></li>
				<li><a href="?language=gr&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li ><a href="retrieval.php" target="_blank">3D object retrieval</a> 
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
        <li><a href="index.php?lang=<?php echo $current_lang; ?>" onclick="showonlyone('Home');">αρχική</a></li>
        <li><a  href="collections.php?lang=<?php echo $current_lang; ?>">συλλογή</a></li>
       <!-- <li><a href="#" onclick="javascript:showonlyone('About');">About</a></li> -->
        <li> 
        
        <?php
        
             if(!isset($_SESSION['user_name'])){
           
        ?>
              
              <a href="session.php">είσοδος</a>
        
        <?php
         
         }else{
        
        ?>
              
              
			  <li><a><?php echo $_SESSION['user_name']; ?></a> 
				<ul >
					<li><a href="sign_out.php" >έξοδος</a></li>
					<li><a href="my_coll.php?lang=<?php echo $current_lang; ?>" >η συλλογή μου</a></li>
				</ul>
			</li>
              
        <?php } ?>
        
        </li>
        <?php
        if(!isset($_SESSION['user_name'])){
        ?>
          <li class="last" ><a href="#" >γλώσσα</a> 
			 <ul >
				<li><a href="?language=en&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>" >English</a></li>
				<li><a href="?language=gr&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >γλώσσα</a> 
			 <ul >
				<li><a href="?language=en&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>" >English</a></li>
				<li><a href="?language=gr&dic_id=<?php echo $dic_id; ?>&id=<?php echo $entry_id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li ><a href="retrieval.php" target="_blank">Ανάκτηση 3Δ αγγείων</a></li>
		<li class="last" ><a>δημιουργία αρχείου</a> 
			<ul>
				<li><a href="upload.php" >ανεβάστε</a></li>
				<li><a href="insert.php">χειροκείνητα</a></li>
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
<!-- content -->
<div class="wrapper row2 ">

  <div id="container" class="clear" >

<?php 



	include 'lib/Client.class.php';
	include 'lib/Query.class.php';
	include 'lib/ResultSet.class.php';
	include 'lib/SimpleXMLResultSet.class.php';
	include 'lib/DOMResultSet.class.php';
	
	// these are the values the class will default to, so it is entirely possible to 
	// instantiate the class with no paramaters provided
	$connConfig = array(
		'protocol'=>'http',
		'user'=>'guest',
		'password'=>'guest',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
	// alternatively, you can specify the URI as a whole in the form
	// $connConfig = array('uri'=>'http://user:password@host:port/path');
	
	$conn = new \ExistDB\Client($connConfig);
	  $xql = <<<EOXQL
              xquery version "3.1";
declare default element namespace "https://www.w3schools.com";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

for \$a in collection('/vases/dictionary')/vase





 return
 if (\$a/id=\$dic_id) then(
 
local:assign("general_type:",data(\$a/general_type[@lang=\$current_lang])),
local:assign("vase_name:",\$a/vase_name[@lang=\$current_lang]), 
local:assign("type:",data(\$a/type[@lang=\$current_lang]/text()[normalize-space()])),
local:assign("type_1:",data(\$a/type/type_1[@lang=\$current_lang])),
local:assign("use:",data(\$a/use[@lang=\$current_lang])),
local:assign("time_period:",data(\$a/time_period[@lang=\$current_lang])),
local:assign("description:",data(\$a/description[@lang=\$current_lang])),
local:assign("thumbnail:",data(\$a/thumbnail))
)
 
else ()
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('dic_id', $dic_id);
$stmt->bindVariable('current_lang', $current_lang);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();

//print_r( $results);

$general_type=0;
$vase_name=0;
$type=0;
$type_1=0;
$use=0;
$time_period=0;
$description=0;
$thumbnail=0;

foreach ($results as $result){

if(strpos($result,'general_type:')!==false){
$general_type=$result;
$general_type=str_replace('general_type:',"",$general_type);
}
elseif(strpos($result,'vase_name:')!==false){
$vase_name=$result;
$vase_name=str_replace('vase_name:',"",$vase_name);
}
elseif(strpos($result,'type:')!==false){
$type=$result;
$type=str_replace('type:',"",$type);
}
elseif(strpos($result,'type_1:')!==false){
$type_1=$result;
$type_1=str_replace('type_1:',"",$type_1);
}
elseif(strpos($result,'use:')!==false){
$use=$result;
$use=str_replace('use:',"",$use);
}
elseif(strpos($result,'time_period:')!==false){
$time_period=$result;
$time_period=str_replace('time_period:',"",$time_period);
}
elseif(strpos($result,'description:')!==false){
$description=$result;
$description=str_replace('description:',"",$description);
}
elseif(strpos($result,'thumbnail:')!==false){
$thumbnail=$result;
$thumbnail=str_replace('thumbnail:',"",$thumbnail);
}
}


if($current_lang==en){
$tag='Example vase of this category';
?> 
   
   
   
   <div id="instance">
     <div id="infos">
		<p>General Type: <?php echo $general_type;?></p>
	
		<p>Shape:<?php echo $vase_name;?></p>
	
		<p>Type of Ware:<?php echo $type?></p>
	
		<p>Sub-type of Ware :<?php echo $type_1;?></p>
	
		<p>Use:<?php echo $use;?></p>
   	
		<p>Chronology:<?php echo $time_period;?></p>
	
		<p>Description:<?php echo $description;?></p>
	
    
   
     </div>
	</div>
<?php
}elseif($current_lang==gr){
$tag='Παράδειγμα αγγείου αυτής της κατηγορίας';
?>    
<div id="instance">
     <div id="infos">
		<p>Γενική Κατηγορία: <?php echo $general_type;?></p>
	
		<p>Σχήμα:<?php echo $vase_name;?></p>
	
		<p>Τύπος:<?php echo $type?></p>
	
		<p>Υπο-τύπος :<?php echo $type_1;?></p>
	
		<p>Χρήση:<?php echo $use;?></p>
   	
		<p>Χρονολογία:<?php echo $time_period;?></p>
	
		<p>Περιγραφή:<?php echo $description;?></p>
	
    
   
     </div>
	</div>
<?php
}
?>
    <article class="dic_screen">
		<figure><img src="<?php if(!empty($thumbnail)){
			echo $thumbnail;
			}else{
			echo "images/demo/215x315.gif";
			}?>" width="215" height="315" alt="">
		</figure>
		<a><?php echo $tag; ?></a>
	</article>

<?php
if($entry_id!=null)
{


$conn1 = new \ExistDB\Client($connConfig);	
$xql = <<<EOXQL
              xquery version "3.1";
declare default element namespace "http://www.carare.eu/carareSchema";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

for \$a in collection('/vases/entries')//carareWrap
 return
if (\$a/carare[@id=\$id]) then(

data(\$a/carare/digitalResource/isShownAt)
)else()

EOXQL;
$stmt1 = $conn1->prepareQuery($xql);
$stmt1->bindVariable('id', $entry_id);
$resultPool=$stmt1->execute();
$entry_3d = $resultPool->getAllResults();
//echo implode(" ",$entry_3d);
?>
<div id="dic_threedrep" >
    
       <x3d width='354px' height='480px' > 
        <scene> 
        <inline url="<?php echo implode(" ",$entry_3d); ?>"> </inline>
        </shape> 			
    
        </scene> 
    </x3d>  

    
</div>
<?php
}
?> 

</div>
</div>
<!-- Footer -->
<div  class="wrapper row3 ">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </footer>
</div>

</body>
</html>


