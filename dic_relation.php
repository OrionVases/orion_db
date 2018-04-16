<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

$choice=$_GET['choice'];


	include 'lib/Client.class.php';
	include 'lib/Query.class.php';
	include 'lib/ResultSet.class.php';
	include 'lib/SimpleXMLResultSet.class.php';
	include 'lib/DOMResultSet.class.php';
	
	// these are the values the class will default to, so it is entirely possible to 
	// instantiate the class with no paramaters provided
	$connConfig1 = array(
		'protocol'=>'http',
		'user'=>'guest',
		'password'=>'guest',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
	
$conn1 = new \ExistDB\Client($connConfig1);
	  $hr_levels = <<<EOXQL
              xquery version "3.1";
declare default element namespace "https://www.w3schools.com";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};
for \$a in collection('/vases/dictionary')/vase
return(
if(\$a/vase_name=\$choice) then(

data(\$a/type/text()[normalize-space()])
)else()
)
EOXQL;

$stmt1 = $conn1->prepareQuery($hr_levels);
$stmt1->bindVariable('choice', $choice);
$hr_result_all=$stmt1->execute();
$hr_results = $hr_result_all->getAllResults();
//print_r($results);

?>
<datalist id="second-choice">
<?php
foreach($hr_results as $result) {
   		echo "<option>".$result."</option>";
}
	
?>
</datalist>
<div class="HerAssetTypelvl_2" id="HerAssetTypeIdlvl_2" >
			
					<p> Heritage Asset type second level</p>
					<input id="" type="text" name='HerAssetType_typelvl_2' list="second-choice"  placeholder="*type.." onChange="getthirdlevel('dic_relation2.php?choice1=<?php echo $choice;?>&choice2='+this.value)">
					<input type="text" name='HerAssetType_langlvl_2' list="language" placeholder=" language..">
							
		</div>
</body>
</html>