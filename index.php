<?php

// initialize a session

session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

<meta charset="UTF-8">
<title>Vases Database</title>
<!--<meta charset="iso-8859-1">-->
<link rel="stylesheet" href="/styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
#text{padding:5px;margin-top:-48px; text-align:center; color:#979797;
background-color:#EEEEEE; text-align:center; height:37px;
}
#text:hover{color:#FF9900; background-color:#EEEEEE;}

.one_quarter{
	
	width:225px; 
	min-height:290px;
	
}

.one_quarter figure{
	display:block;
	height:240px;
	
	
}


.collapse{display:none}
.collapse.in{display:block;max-height: 200px;overflow: auto}tr.collapse.in{display:table-row}tbody.collapse.in{display:table-row-group}

.collapsing{position:relative;height:0;overflow:hidden;-webkit-transition-timing-function:ease;-o-transition-timing-function:ease;
transition-timing-function:ease;-webkit-transition-duration:.35s;
-o-transition-duration:.35s;transition-duration:.35s;
-webkit-transition-property:height,visibility;-o-transition-property:height,visibility;transition-property:height,visibility;}

#dess{text-transform:none;}
</style>
<?php header('Content-Type:text/html;charset=UTF-8');
?>
</head>
<body>


<?php
	include 'header.php';
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

$conn_dic_lvl1 = new \ExistDB\Client($connConfig);
	  $lvl1_xql = <<<EOXQL
              xquery version "3.1";
declare default element namespace "http://www.carare.eu/carareSchema";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

for \$a in collection('/vases/entries//')

return
data(\$a//heritageAssetIdentification/characters/heritageAssetType[@term="1"][@lang=\$current_lang])
EOXQL;
$stmt_lvl1 = $conn_dic_lvl1->prepareQuery($lvl1_xql);
$stmt_lvl1->bindVariable('current_lang', $current_lang);
$resultPool_lvl1=$stmt_lvl1->execute();
$results_lvl1_urefined = $resultPool_lvl1->getAllResults();
$results_lvl1=array_unique($results_lvl1_urefined);
//print_r($results_lvl1_urefined);
?>
<div class="wrapper row2 " >

  <div id="container" class="clear" >
    <!-- content body -->
    
    <div class="newboxes" id="Home" >
	
    <section id="shout">
      <p id="dess"><?php echo $description; ?></p>
    </section>
  
    <!-- main content -->
    <div id="homepage">
      <!-- services area -->

      <h1><?php echo $advanced_search_text; ?></h1>
	   <a href="#advanced_search" id="sf_submit"  data-toggle="collapse">Click to expand</a>
      <div id="advanced_search"class="collapse clear" style="  width:930px; padding:15px; font-size:16px; line-height:1.8em; color:#979797;   text-align:justify; p{margin:0; padding:0;max-height:50px;}">
      <form action="advanced.php">
<?php
foreach($results_lvl1 as $i){
?>
		<input type="checkbox" name="advanced[]" value="<?php echo $i; ?>"><?php echo $i;?>
<?php
}
?>		<div style="text-align:center;">
		<input type="submit" value="Submit">
		</div>
	  </form>
      </div>

<?php
       
    
 
	
	
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

let \$www:=
for \$qqq in collection ('/vases/entries/')/carareWrap
let \$s:=if(contains( util:document-name(\$qqq) ,'.xml')) then (
(
if(fn:exists(data(\$qqq//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$qqq//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data(\$qqq//heritageAssetIdentification/appellation/id)), 
fn:distinct-values(local:assign("her_asset:",data(\$qqq//heritageAssetIdentification/characters/heritageAssetType/@namespace))),
local:assign("object:",data(\$qqq//digitalResource/object))
)
)else()
order by xmldb:created("/db/vases/entries//",util:document-name(\$qqq))
return(
\$s
 )  
 return (subsequence(\$www,count(\$www)-15))
	  
	  
EOXQL;
$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('current_lang', $current_lang);
$resultPool=$stmt->execute();
$last_four = $resultPool->getAllResults();
//$last_four=array_slice($results,-12,12);

//print_r($last_four);
$lang_loop=0;
$id_loop=0;
$object_loop=0;
$her_asset_loop=0;

foreach ($last_four as $result){

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
//print_r($object);
	?>
      <h1><?php echo $bottom_header; ?></h1>
	  <section id="latest" class="last clear">
	<?php

	  for ($iteration=0;$iteration<4;$iteration++){
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

	  if ($iteration!=3){
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

}else{
?>
<article class="one_quarter lastbox">
		<?php
if(isset($_SESSION['user_name'])){
?>

		<a href="vase_instance.php?id=<?php echo $id[$iteration]; ?>">
<?php
}else{
?>
		<a href="dictionary.php?dic_id=<?php echo $her_asset[$iteration];?>&id=<?php echo $id[$iteration]; ?>">
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
}//end of for

?>
</section>
      <!-- / One Quarter -->
    </div>
    <!-- / content body -->
  </div>
  
  
  
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
