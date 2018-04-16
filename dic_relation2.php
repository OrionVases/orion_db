<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

$choice1=$_GET['choice1'];
$choice2=$_GET['choice2'];

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
if((\$a/vase_name=\$choice1) and (\$a/type/text()[normalize-space()]=\$choice2) ) then(

data(\$a/type/type_1/text()[normalize-space()])
)else()


)
EOXQL;

$stmt1 = $conn1->prepareQuery($hr_levels);
$stmt1->bindVariable('choice2', $choice2);
$stmt1->bindVariable('choice1', $choice1);
$hr_result_all=$stmt1->execute();
$hr_results = $hr_result_all->getAllResults();
print_r($results);

?>
<datalist id="third-choice">
<?php
foreach($hr_results as $result) {
   		echo "<option>".$result."</option>";
}
	
?>
</datalist>
<div class="HerAssetTypelvl_3" id="HerAssetTypeIdlvl_3">
			
					<p> Heritage Asset type third level</p>
					<input id="" type="text" name='HerAssetType_typelvl_3' list="third-choice"  placeholder="*type..">
					<input type="text" name='HerAssetType_langlvl_3' list="language" placeholder=" language..">
					
				
		</div>
</body>
</html>