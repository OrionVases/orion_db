<?php

// initialize a session

session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
function removeAccents($str) {
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
  return str_replace($a, $b, $str);
}
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="UTF-8">
<title>Vases Database</title>

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
#error_msg{
	
	color:#FF0000;
	text-align:center;
	margin-top:5px;
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
				<li><a href="?language=en&search=<?php echo $_GET['search']; ?>" >English</a></li>
				<li><a href="?language=gr&search=<?php echo $_GET['search']; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="?language=en&search=<?php echo $_GET['search']; ?>" >English</a></li>
				<li><a href="?language=gr&search=<?php echo $_GET['search']; ?>">Ελληνικά</a></li>
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
				<li><a href="?language=en&search=<?php echo $_GET['search']; ?>" >English</a></li>
				<li><a href="?language=gr&search=<?php echo $_GET['search']; ?>">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >γλώσσα</a> 
			 <ul >
				<li><a href="?language=en&search=<?php echo $_GET['search']; ?>" >English</a></li>
				<li><a href="?language=gr&search=<?php echo $_GET['search']; ?>">Ελληνικά</a></li>
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
<!-- main content -->
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
	

	if (isset ($_GET['search']) && !empty($_GET['search'])){
	$name=mb_strtolower(removeAccents($_GET['search']),'UTF-8');
	//echo $name;

	
	$conn = new \ExistDB\Client($connConfig);
	  $xql = <<<EOXQL
               xquery version "3.1";
declare default element namespace "http://www.carare.eu/carareSchema";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};
declare function local:strip-diacritics(\$string as item()*){
    
	for \$i in 1 to count(\$string)
    let \$stripped := fn:lower-case(translate(\$string[\$i],"άέίήώόύ","αειηωου"))
    return
        \$stripped
};


for \$a in collection('/vases/entries')//carareWrap
 return
if (\$a/carare[@id=\$name]) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))	
)
else if (fn:contains(local:strip-diacritics(\$a/carare/collectionInformation//*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)
else if (fn:contains(local:strip-diacritics(\$a/carare/collectionInformation//*/*/*/*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)
else if (fn:contains(local:strip-diacritics(\$a/carare/heritageAssetIdentification//text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)
else if (fn:contains(local:strip-diacritics(\$a/carare/heritageAssetIdentification//*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)
else if (fn:contains(local:strip-diacritics(\$a/carare/heritageAssetIdentification/characters/heritageAssetType/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)
else if (fn:contains(local:strip-diacritics(\$a/carare/heritageAssetIdentification//*/*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)      
else if (fn:contains(local:strip-diacritics(\$a/carare/heritageAssetIdentification//*/*/*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)        
else if (fn:contains(local:strip-diacritics(\$a/carare/digitalResource//text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)        
else if (fn:contains(local:strip-diacritics(\$a/carare/digitalResource/*/text()),\$name)) then(
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$a//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$a//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$a//digitalResource/object))
)         
        
        
else ()
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('name', $name);
$stmt->bindVariable('current_lang', $current_lang);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();

if (empty($results)){
?>
<div id="error_msg">nothing found.</div>
<?php
}else{
?>
<div  id="Collections">

 <div id="coll">
 <?php
$lang_loop=0;
$id_loop=0;
$object_loop=0;
$her_asset_loop=0;

foreach ($results as $result){

if(strpos($result,'lang:')!==false){
$lang[$lang_loop]=$result;
$lang[$lang_loop]=str_replace('lang:',"",$lang[$lang_loop]);
$lang_loop++;
}
elseif(strpos($result,'id:')!==false){
$id[$id_loop]=$result;
$id[$id_loop]=str_replace('id:',"",$id[$id_loop]);
$id_loop++;
}
elseif(strpos($result,'her_asset:')!==false){
$her_asset[$her_asset_loop]=$result;
$her_asset[$her_asset_loop]=str_replace('her_asset:',"",$her_asset[$her_asset_loop]);
$her_asset_loop++;
}
elseif(strpos($result,'object:')!==false){
$object[$object_loop]=$result;
$object[$object_loop]=str_replace('object:',"",$object[$object_loop]);
$object_loop++;
}
}

	for ($iteration=0;$iteration<count($id);$iteration++){
		$maxwidth = 215;
		$maxheight = 185;
		$image_ext=strtolower(end(explode('.',$object[$iteration])));
		if($image_ext==="png"){
		$img = imagecreatefrompng(substr($object[$iteration],1)); 
	}elseif(($image_ext==="jpg")||($image_ext==="jpeg") ){
		$img = imagecreatefromjpeg(substr($object[$iteration],1));
	}elseif($image_ext==="gif"){
		$img = imagecreatefromgif(substr($object[$iteration],1));
	}
	$width = imagesx($img); 
	$height = imagesy($img); 
	if ($height >= $width) 
	{   
		$ratio = $maxheight / $height;  
		$newheight = $maxheight;
		$newwidth = $width * $ratio; 
	}
	else 
	{
		$ratio = $maxwidth / $width;   
		$newwidth = $maxwidth;  
		$newheight = $height * $ratio;   
	}  
?>
   <article class="one_quarter">
<?php
	if(isset($_SESSION['user_name'])){
?>

		<a href="vase_instance.php?id=<?php echo $id[$iteration]; ?>">
<?php
}else{
?>
		<a href="dictionary.php?dic_id=<?php echo $her_asset[$iteration]; ?>&id=<?php echo $id[$iteration]; ?>">
<?php
}
?> 
		<figure>
	<img src="<?php if(!empty($object[$iteration])){
		   echo $object[$iteration];
		   }else{
		   echo "images/demo/215x315.gif";
		   }?>" width="<?php echo $newwidth; ?>" height="<?php echo $newheight; ?>" alt="">
			
			
			
			</figure>
			<div id="text">
			<abbr style="border:none;text-decoration:none;" title="<?php echo $lang[$iteration] ?>">
			<?php if (strlen($lang[$iteration])<=60){
				echo $lang[$iteration]; 
                               }else{
				echo substr($lang[$iteration],0,60);
								
				} ?> 
			</div>
			</a>
			</article>		
<?php
}
?>
  

</div>	
  
  
  </div>
<?php
}



}else{
?>
	<div id="error_msg">you didn't submit a keyword</div>
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