<?php
session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];

	
	
	// these are the values the class will default to, so it is entirely possible to 
	// instantiate the class with no paramaters provided
	$connConfig2 = array(
		'protocol'=>'http',
		'user'=>'guest',
		'password'=>'guest',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
	
$conn2 = new \ExistDB\Client($connConfig2);
	  $xql2 = <<<EOXQL
              xquery version "3.1";
declare default element namespace "https://www.w3schools.com";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};

let \$loop:=for \$a in collection('/vases/dictionary')/vase
return(

data(\$a/vase_name/text()[normalize-space()])

)
return(fn:distinct-values(\$loop))
EOXQL;

$stmt2 = $conn2->prepareQuery($xql2);
//$stmt->bindVariable('priceDefinedByBindVariableMethod', 3);
$resultPool2=$stmt2->execute();
$firstlevel = $resultPool2->getAllResults();
//print_r($results);
	
?>

<datalist id="first-choice">
<?php
foreach($firstlevel as $result) {
   		echo "<option>".$result."</option>";
}
	
?>
</datalist>