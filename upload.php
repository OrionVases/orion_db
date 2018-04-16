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
	
<style>
#usr_form a{
	
color:#000000;	
	
}

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
				<li><a href="?language=en" >English</a></li>
				<li><a href="?language=gr">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="?language=en" >English</a></li>
				<li><a href="?language=gr">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li><a href="retrieval.php" target="_blank">3D object retrieval</a></li>
		<li class="last" ><a>insert entry</a> 
			<ul>
				<li><a href="?lang=<?php echo $current_lang; ?>" >Upload</a></li>
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
				<li><a href="?language=en" >English</a></li>
				<li><a href="?language=gr">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >γλώσσα</a> 
			 <ul >
				<li><a href="?language=en" >English</a></li>
				<li><a href="?language=gr">Ελληνικά</a></li>
			</ul>
		</li>
		
		<li ><a href="retrieval.php" target="_blank">Ανάκτηση 3Δ αγγείων</a>
		<li class="last" ><a>δημιουργία αρχείου</a> 
			<ul>
				<li><a href="?lang=<?php echo $current_lang; ?>" >ανεβάστε</a></li>
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

<div class="wrapper row2 " >

  <div id="container" class="clear" >
    <!-- content body -->
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
<div id="usr_form" style="height:30em">
  <form action = "" method = "POST" enctype = "multipart/form-data">
         
		 <a>3D files</a>
		 <input type = 'file' name = 'file[]' id="file_submit" multiple />
		 <a>XML file</a>
		<input  type = 'file' name = 'xmlfile' id="file_submit"  />	
		<a>Thumbnail</a>
		<input  type = 'file' name = 'screenshot' id="file_submit"  />	
         <input type = "submit" name="ok" id="sf_submit"/>
					
  </form>
    
<?php

$count=0;
$count1=0;
$current_usr_pw=$_SESSION['pw'];
$dummy=$_SESSION['user_name'];
$dummy_xml=$dummy."/";
$path = getcwd()."/data/uploads/$dummy";
$expensions= array("jpeg","jpg","png","gif","x3d"); 
$expensions_thumb= array("jpeg","jpg","png","gif"); 
$expensions_xml= array("xml"); 
$files = glob($path."/*" ,GLOB_ONLYDIR);
$filecount_unrefined = count($files) + 1;
$filecount=sprintf("%04d",$filecount_unrefined);
$upload_path=$path."/entry".$filecount;
$error_var=0;
$errors= array();
$thumbnail_name=null;
//$xmlfile_name=null;
$object_name=null;
$entry_name="/entry".sprintf("%04d",$filecount);
$entry_name_xml="entry".sprintf("%04d",$filecount).".xml";
$id="$dummy-ent".$filecount;
//echo $dummy_xml;
//echo $entry_name_xml;
$xml_path=$upload_path."/entry".sprintf("%04d",$filecount).".xml";
 if (isset($_POST['ok'])) {

 //thumbnail check
$thumbnail=$_FILES['screenshot']['name']; 
$thumbnail_ext=strtolower(end(explode('.',$thumbnail)));
if((in_array($thumbnail_ext,$expensions_thumb)=== false) || empty($thumbnail)){
    
	$error_var=1;		
	$thumb_error='thumbnail file extension is not permitted or the field is empty!';
}else{
	
	$thumbnail_name="/data/uploads/$dummy/entry$filecount/".$thumbnail;
}
//xml check
$xmlfile=$_FILES['xmlfile']['name']; 	
$xmlfile_ext=strtolower(end(explode('.',$xmlfile))); 
if((in_array($xmlfile_ext,$expensions_xml)=== false) || empty($xmlfile)){
    
	$error_var=1;		
	$xml_error='xml file extension is not permitted or the field is empty!';
}else{
		
	$doc= new DOMDocument();
	$doc->load($_FILES['xmlfile']['tmp_name']);
	$is_valid_xml = $doc->schemaValidate('carare-v2.0.4.xsd');
	
	if ($is_valid_xml == false) {
       
	   $error_var=1;
       $xml_error='Your XML is not valid!';
	}	
}

//3d files check
if(!empty($_FILES['file']['name'])){
foreach($_FILES['file']['name'] as $filename){
	$file_ext=strtolower(end(explode('.',$filename)));
	$file_name = $_FILES['file']['tmp_name'][$count1];
	
	if(in_array($file_ext,$expensions)=== false){
        $error_var=1;
		$errors[]= 'extension not allowed.';
      }
	
	if($file_size > 83886080) {
         $errors[]='File size must be exactly 80 MB';
		 $error_var=1;		
      }
	if($file_ext==="x3d"){
        $object_name="/data/uploads/$dummy/entry$filecount/".$filename;		
      }
	$count1++;
}
}else{
$error_3d='the 3d field is empty!';
}

if (($error_var==0)&&($object_name!=null)){
mkdir($upload_path, 0777);
chmod($upload_path,0775);

foreach($_FILES['file']['name'] as $filename){
   if(isset($filename)){
      
      $file_name = $_FILES['file']['tmp_name'][$count];
      $file_size = $_FILES['file']['tmp_name']['size'];
      //$file_tmp = $_FILES['3dFile']['tmp_name'];
      $file_type = $_FILES['file']['tmp_name']['type'];
      $count++;
		 
      move_uploaded_file($file_name,$upload_path."/$filename");
	  chmod($upload_path."/$filename",0775);
         

   }
}
$cara=$doc->getElementsByTagName('carare')->item(0);
$cara->setAttribute('id', $id);
$hrel=$doc->getElementsByTagName('heritageAssetIdentification')->item(0);
$hrri=$hrel->getElementsByTagName('recordInformation')->item(0);
$riid=$hrri->getElementsByTagName('id')->item(0)->nodeValue=$id;

$hrap=$hrel->getElementsByTagName('appellation')->item(0);
$apid=$hrap->getElementsByTagName('id')->item(0)->nodeValue=$id;

$ht=$doc->getElementsByTagName('digitalResource')->item(0);
$digri=$ht->getElementsByTagName('recordInformation')->item(0);
$digriid=$digri->getElementsByTagName('id')->item(0)->nodeValue=$id;

$digap=$ht->getElementsByTagName('appellation')->item(0);
$digapid=$digap->getElementsByTagName('id')->item(0)->nodeValue=$id;

$fff=$ht->getElementsByTagName('isShownAt')->item(0)->nodeValue=$object_name;
$ggg=$ht->getElementsByTagName('object')->item(0)->nodeValue=$thumbnail_name;
$doc->save($xml_path);
chmod($xml_path,0775);

$rsl=file_get_contents($xml_path);
//echo $xml_path;
//echo $rsl;
	include 'lib/Client.class.php';
	include 'lib/Query.class.php';
	include 'lib/ResultSet.class.php';
	include 'lib/SimpleXMLResultSet.class.php';
	include 'lib/DOMResultSet.class.php';
	
	// these are the values the class will default to, so it is entirely possible to 
	// instantiate the class with no paramaters provided
	$connConfig = array(
		'protocol'=>'http',
		'user'=>$dummy,
		'password'=>$current_usr_pw,
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
//$doc->save($entry_name);
$conn = new \ExistDB\Client($connConfig);
$xql = <<<EOXQL
              xquery version "3.1";
import module namespace xmldb="http://exist-db.org/xquery/xmldb";


let \$login:= xmldb:login("/db","admin","welcome2AHK")
return(

	xmldb:store(concat("/db/vases/entries/",\$usr_name),\$entry_name,\$rsl))


EOXQL;
$stmt = $conn->prepareQuery($xql);
//echo "ok";


$stmt->bindVariable('usr_name', $dummy_xml);
$stmt->bindVariable('entry_name', $entry_name_xml);
$stmt->bindVariable('rsl', $rsl);
$resultPool=$stmt->execute();
//echo "ok1";
$results = $resultPool->getAllResults();


$thumb_name_plz=$_FILES['screenshot']['tmp_name'];
move_uploaded_file($thumb_name_plz,$upload_path."/$thumbnail");
chmod($upload_path."/$thumbnail",0775);

echo "Success!";
?>
<script type="text/javascript">
window.location = "index.php" 
</script>
<?php
}else{	
?>	
<div id="error_msg" ><?php foreach($errors as $y){
echo $y;
}
echo $thumb_error;
echo $xml_error;
?>
</div>
<?php
}

}
?>
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
