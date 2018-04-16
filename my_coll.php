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

	<script>
  function show(x) {
   document.getElementById(x).style.visibility="visible";
  }
  function hide(x) {
    document.getElementById(x).style.visibility="hidden";
  }
</script>
<script type='text/javascript'>
function popup(str){

if (window.confirm('are you sure you want to delete this file?')){
 var xx=str.id;
 console.log(xx);
 var xmlhttp = new XMLHttpRequest();	
/*  xmlhttp.open("GET", "vase_instance.php?id=" + str, true); */
/*  xmlhttp.send(); */
 window.location = "delete_entry.php?id=" + xx;	
}
};
</script>
<style>

.more_options{
	font-size:20px;
	color:#232323; 
	background-color:#232323;
	visibility:hidden; 
	z-index:30;
	display:inline-block;
	position:absolute;
}
.more_options nav ul li a{
	margin:auto;
	display:block;
	text-decoration:none;	
	color:#C0BAB6;
	background-color:#232323;
	cursor:pointer;
 }
.more_options nav li a:hover{
	color:#FF9900;
	background-color:#232323;
}
#myform {
	margin:auto;
	display:block;
	border:hidden;
	text-decoration:none;	
	color:#232323;
}
#myform #up_sub{
	margin:auto;
	display:block;
	text-decoration:none;	
	color:#C0BAB6;
	background-color:#232323;
	cursor:pointer;
	font-size:20px;
	border-width:0px;
	border:none;
}
#myform #up_sub:hover{
	color:#FF9900;
	background-color:#232323;

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
    <!-- content body -->
    <!--<section id="slider"><a href="#"><img src="images/demo/960x360.gif" alt=""></a></section>-->
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
?>
	
	
  
  <div  id="Collections">
  
   <?php
       
    $usr_name=$_SESSION['user_name'];
 
	include '/var/www/html/lib/Client.class.php';
	include '/var/www/html/lib/Query.class.php';
	include '/var/www/html/lib/ResultSet.class.php';
	include '/var/www/html/lib/SimpleXMLResultSet.class.php';
	include '/var/www/html/lib/DOMResultSet.class.php';
	
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
let \$path:=concat("/db/vases/entries/",\$usr_name)
for \$a in collection(\$path)/carareWrap

return  (
if(fn:exists(data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang]))) then( 
local:assign("lang:",data(\$a//heritageAssetIdentification/appellation/name[@lang=\$current_lang])))
else(local:assign("lang:","N/A")),
local:assign("id:",data( \$a//heritageAssetIdentification/appellation/id)), 
local:assign("object:",data(\$a//digitalResource/object))
)
EOXQL;

$stmt = $conn->prepareQuery($xql);
$stmt->bindVariable('usr_name',$usr_name);
$stmt->bindVariable('current_lang',$current_lang);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();

$lang_loop=0;
$id_loop=0;
$object_loop=0;

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
elseif(strpos($result,'object:')!==false){
$object[$object_loop]=$result;
$object[$object_loop]=str_replace('object:',"",$object[$object_loop]);
$object_loop++;
}
}

$counter=0;
?>

 <div id="coll">
 <?php
for($iteration=0;$iteration<count($id);$iteration++){
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
    <article class="one_quarter" onMouseOver="show('<?php echo $id[$iteration]; ?>')" onMouseOut="hide('<?php echo $id[$iteration]; ?>')">
	
	<div class="more_options" id="<?php echo $id[$iteration]; ?>" style="" >
	
	<nav>
	<ul>
	<li><a href="vase_instance.php?id=<?php echo $id[$iteration]; ?>">open</a></li>
	<li><form id="myform" action="update.php?id=<?php echo $id[$iteration]; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id[$iteration]; ?>" />
             <input id="up_sub"type="submit" value="update">
        </form></li>
	<li><a id="<?php echo $id[$iteration]; ?>" onClick="popup(this)">delete</a></li>	
	</ul>
	</nav>
	
	</div>
	<a href="vase_instance.php?id=<?php echo $id[$iteration]; ?>">
		<figure>
		<img src="<?php if(!empty($object[$iteration])){
		   echo $object[$iteration];
		   }else{
		   echo "images/demo/215x315.gif";
		   }?>" width="<?php echo $newwidth; ?>" height="<?php echo $newheight; ?>" alt="">	   
			
			
			
			
			</figure>
			<div> 
			<abbr style="border:none;text-decoration:none;" title="<?php echo htmlspecialchars($lang[$iteration]) ?>">
			<?php if (strlen($lang[$iteration])<=60){
				echo $lang[$iteration]; 
                               }else{
				echo substr($lang[$iteration],0,60);
								
				} ?> 
			</div>
			</a>
			</article>


		
<?php

$counter++;

}
?>
  

</div>	
  
  
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
