<?php

// initialize a session
session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
$id=$_GET['id'];
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
				<li><a href="?language=en&id=<?php echo $id; ?>" >English</a></li>
				<li><a href="?language=gr&id=<?php echo $id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="?language=en&id=<?php echo $id; ?>" >English</a></li>
				<li><a href="?language=gr&id=<?php echo $id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li ><a href="retrieval.php" target="_blank">3D object retrieval</a> </li>
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
				<li><a href="?language=en&id=<?php echo $id; ?>" >English</a></li>
				<li><a href="?language=gr&id=<?php echo $id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >γλώσσα</a> 
			 <ul >
				<li><a href="?language=en&id=<?php echo $id; ?>" >English</a></li>
				<li><a href="?language=gr&id=<?php echo $id; ?>">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li ><a href="retrieval.php" target="_blank">Ανάκτηση 3Δ αγγείων</a> </li>
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
  if(!isset($_SESSION['user_name'])){
?>
  <div id="notAllow">
  <a>
<?php
  echo "You are not authorized for this action!";
?>
  </a>
  </div>
<?php
  }else{
$usr_name=$_SESSION['user_name'];




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
declare default element namespace "http://www.carare.eu/carareSchema";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

for \$a in collection('/vases/entries')//carareWrap





 return
 if (\$a/carare[@id=\$id]) then(
 
local:assign("gr_name:",data(\$a/carare/heritageAssetIdentification/appellation/name[@lang="gr"])),
local:assign("en_name:",data(\$a/carare/heritageAssetIdentification/appellation/name[@lang="en"])),
 
local:assign("description:",data(\$a/carare/heritageAssetIdentification/description[@lang=\$current_lang])),

local:assign("displayDate:",data(\$a/carare/collectionInformation/coverage/temporal/displayDate)),
local:assign("startDate:",data(\$a/carare/collectionInformation/coverage/temporal/timeSpan/startDate)),
local:assign("endDate:",data(\$a/carare/collectionInformation/coverage/temporal/timeSpan/endDate)),

local:assign("keywords:",data(\$a/carare/collectionInformation/keywords)),

local:assign("source:",data(\$a/carare/collectionInformation/source)),
local:assign("copyrightCreditLine:",data(\$a/carare/collectionInformation/rights/copyrightCreditLine)),
local:assign("accessRights:",data(\$a/carare/collectionInformation/rights/accessRights)),
local:assign("reproductionRights:",data(\$a/carare/collectionInformation/rights/reproductionRights)),
local:assign("europeanaRights:",data(\$a/carare/collectionInformation/rights/europeanaRights)),
local:assign("metadataRights:",data(\$a/carare/heritageAssetIdentification/recordInformation/metadataRights)),

local:assign("her_asset:",data(\$a/carare/heritageAssetIdentification/characters/heritageAssetType[@lang=\$current_lang])),
fn:distinct-values(local:assign("her_asset_id:",data(\$a/carare/heritageAssetIdentification/characters/heritageAssetType/@namespace))),

local:assign("materials:",data(\$a/carare/heritageAssetIdentification/characters/materials)),

local:assign("country:",data(\$a/carare/heritageAssetIdentification/recordInformation/country)),
local:assign("provenance:",data(\$a/carare/heritageAssetIdentification/provenance)),

local:assign("type:",data(\$a/carare/heritageAssetIdentification/references/type)),
local:assign("publicationStatement:",data(\$a/carare/heritageAssetIdentification/references/publicationStatement)),

local:assign("isShownAt:",data(\$a/carare/digitalResource/isShownAt)),

local:assign("dimensions:",data(\$a/carare/heritageAssetIdentification/characters/dimensions))


) 
else ()
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('id', $id);
$stmt->bindVariable('current_lang', $current_lang);
$resultPool=$stmt->execute();
$results_unrifined = $resultPool->getAllResults();
$results=array_unique($results_unrifined);
//print_r( $results);

$gr_name=0;
$en_name=0;
$description=0;
$displayDate=0;
$startDate=0;
$endDate=0;
$keywords=0;
$source=0;
$copyrightCreditLine=0;
$accessRights=0;
$reproductionRights=0;
$europeanaRights=0;
$metadataRights=0;
$materials=0;
$country=0;
$provenance=0;
$type=0;
$publicationStatement=0;
$isShownAt=0;
$her_asset_loop=0;
$her_asset=array();
$her_asset_id=0;

foreach ($results as $result){

if(strpos($result,'gr_name:')!==false){
$gr_name=$result;
$gr_name=str_replace('gr_name:',"",$gr_name);
}
elseif(strpos($result,'en_name:')!==false){
$en_name=$result;
$en_name=str_replace('en_name:',"",$en_name);
}
elseif(strpos($result,'description:')!==false){
$description=$result;
$description=str_replace('description:',"",$description);
}
elseif(strpos($result,'displayDate:')!==false){
$displayDate=$result;
$displayDate=str_replace('displayDate:',"",$displayDate);
}
elseif(strpos($result,'startDate:')!==false){
$startDate=$result;
$startDate=str_replace('startDate:',"",$startDate);
}
elseif(strpos($result,'endDate:')!==false){
$endDate=$result;
$endDate=str_replace('endDate:',"",$endDate);
}
elseif(strpos($result,'keywords:')!==false){
$keywords=$result;
$keywords=str_replace('keywords:',"",$keywords);
}
elseif(strpos($result,'source:')!==false){
$source=$result;
$source=str_replace('source:',"",$source);
}
elseif(strpos($result,'copyrightCreditLine:')!==false){
$copyrightCreditLine=$result;
$copyrightCreditLine=str_replace('copyrightCreditLine:',"",$copyrightCreditLine);
}
elseif(strpos($result,'accessRights:')!==false){
$accessRights=$result;
$accessRights=str_replace('accessRights:',"",$accessRights);
}
elseif(strpos($result,'reproductionRights:')!==false){
$reproductionRights=$result;
$reproductionRights=str_replace('reproductionRights:',"",$reproductionRights);
}
elseif(strpos($result,'europeanaRights:')!==false){
$europeanaRights=$result;
$europeanaRights=str_replace('europeanaRights:',"",$europeanaRights);
}
elseif(strpos($result,'metadataRights:')!==false){
$metadataRights=$result;
$metadataRights=str_replace('metadataRights:',"",$metadataRights);
}
elseif(strpos($result,'materials:')!==false){
$materials=$result;
$materials=str_replace('materials:',"",$materials);
}
elseif(strpos($result,'country:')!==false){
$country=$result;
$country=str_replace('country:',"",$country);
}
elseif(strpos($result,'provenance:')!==false){
$provenance=$result;
$provenance=str_replace('provenance:',"",$provenance);
}
elseif(strpos($result,'type:')!==false){
$type=$result;
$type=str_replace('type:',"",$type);
}
elseif(strpos($result,'publicationStatement:')!==false){
$publicationStatement=$result;
$publicationStatement=str_replace('publicationStatement:',"",$publicationStatement);
}
elseif(strpos($result,'isShownAt:')!==false){
$isShownAt=$result;
$isShownAt=str_replace('isShownAt:',"",$isShownAt);
}
elseif(strpos($result,'her_asset:')!==false){
$her_asset[$her_asset_loop]=$result;
$her_asset[$her_asset_loop]=str_replace('her_asset:',"",$her_asset[$her_asset_loop]);
$her_asset_loop++;
}
elseif(strpos($result,'her_asset_id:')!==false){
$her_asset_id=$result;
$her_asset_id=str_replace('her_asset_id:',"",$her_asset_id);
}
}


if($current_lang==en){
?> 
   
   
   <h1 align="center"><?php echo $en_name;?></h1>
   <div id="instance">
     <div id="infos">
    <p>Description: <?php echo $description;?></p>
	<p>Heritage Asset Type:<a href="dictionary.php?dic_id=<?php echo $her_asset_id; ?>"><?php echo implode(",",$her_asset);?></a></p>
	
    <p>Timespan:<?php echo $displayDate;?>
		<div>from:<?php echo $startDate;?></div>
		<div>to:<?php echo $endDate;?></div>	
	</p>
	<p>Keywords:<?php echo $keywords;?></p>
	
	<p>Material:<?php echo $materials;?></p>
    
		
        <p>source:<?php echo $source;?></p>
        <p>copyrights credit line:<?php echo $copyrightCreditLine;?></p>
        <p>access rights:<?php echo $accessRights;?></p>
        <p>reproduction rights:<?php echo $reproductionRights;?></p>
        <p>Europeana rights:<?php echo $europeanaRights;?></p>
        <p>metadata rights:<?php echo $metadataRights;?></p>
		
	
	<p>Country:<?php echo $country;?></p>
	<p>Provenance:<?php echo $provenance;?></p>
	
    
        <p>References:<?php echo $publicationStatement;?></p>
        <p>Type:<?php echo $type; ?></p>
        </div>
<?php
}elseif($current_lang==gr){
?>    
<h1 align="center"><?php echo $gr_name;?></h1>
   <div id="instance">
     <div id="infos">
    <p>Περιγραφή: <?php echo $description;?></p>
	<p>Τύπος στοιχείου:<a href="dictionary.php?dic_id=<?php echo $her_asset_id; ?>"><?php echo implode(",",$her_asset);?></a></p>
    <p>Εποχή:<?php echo $displayDate;?>
		<div>Από:<?php echo $startDate;?></div>
		<div>Μέχρι:<?php echo $endDate;?></div>	
	</p>
	<p>Κλειδιά:<?php echo $keywords;?></p>
	
	<p>Υλικό:<?php echo $materials;?></p>
    
		
        <p>Πηγή:<?php echo $source;?></p>
        <p>Copyrights:<?php echo $copyrightCreditLine;?></p>
        <p>Δικαιώματα πρόσβασης:<?php echo $accessRights;?></p>
        <p>Δικαιώματα αναπαραγωγής:<?php echo $reproductionRights;?></p>
        <p>Δικαιώματα Europeana:<?php echo $europeanaRights;?></p>
        <p>Δικαιώματα μεταδεδομένων:<?php echo $metadataRights;?></p>
		
	
	<p>Χώρα:<?php echo $country;?></p>
	<p>Περιοχή:<?php echo $provenance;?></p>
	
    
        <p>Αναφορές:<?php echo $publicationStatement;?></p>
        <p>Τύπος:<?php echo $type; ?></p>
        </div>
<?php
}
?>
     <div id="threedrep" >
    
       <x3d width='354px' height='480px' > 
        <scene> 
        <inline url="<?php echo $isShownAt; ?>"> </inline>
        </shape> 			
    
        </scene> 
    </x3d>  

    
    </div>
  </div>
 
</div>
<?php
  }
  ?>
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


