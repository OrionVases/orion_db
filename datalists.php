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
		'user'=>$usr_name,
		'password'=>$_SESSION['pw'],
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

for \$a in collection('/db/vases/entries')/infos

return(
            <source>{"source",data(fn:distinct-values(\$a/source))}</source>,
            <rights>{"rights",fn:distinct-values(\$a/rights)}</rights>,
            <keywords>{"keywords",fn:distinct-values(\$a/keywords)}</keywords>,
            
            if(fn:exists(\$a/organization)) then(
              <organization>{"organization",fn:distinct-values(\$a/organization)}</organization>)else(),
            
            <ancientTime>{"ancientTime",fn:distinct-values(\$a/ancientTime)}</ancientTime>,
            
            if(fn:exists(\$a/modernTime)) then(
             <modernTime>{"modernTime",fn:distinct-values(\$a/modernTime)}</modernTime>)else(),
             
            <country>{"country",fn:distinct-values(\$a/country)}</country>,
            <language>{"language",fn:distinct-values(\$a/language)}</language>,
            
            if(fn:exists(\$a/names)) then(
            <names>{"names",fn:distinct-values(\$a/names)}</names>)else(),
            
            if(fn:exists(\$a/roles)) then(
            <roles>{"roles",fn:distinct-values(\$a/roles)}</roles>)else(),
            
            if (fn:exists(\$a/licence)) then(
            <licence>{"licence",fn:distinct-values(\$a/licence)}</licence>)else(),
            
             if (fn:exists(\$a/locationSet)) then(
            <locationSet>{"locationSet",fn:distinct-values(\$a/locationSet)}</locationSet>)else(),
			
			if (fn:exists(\$a/periodName)) then(
            <periodName>{"periodName",fn:distinct-values(\$a/periodName)}</periodName>)else(),
			
			if (fn:exists(\$a/materials)) then(
            <materials>{"materials",fn:distinct-values(\$a/materials)}</materials>)else(),
			
			if (fn:exists(\$a/file_name)) then(
            <file_name>{"file_name",fn:distinct-values(\$a/file_name)}</file_name>)else(),
			
			if (fn:exists(\$a/displayDate)) then(
            <displayDate>{"displayDate",fn:distinct-values(\$a/displayDate)}</displayDate>)else()
            
        )


EOXQL;

$stmt = $conn->prepareQuery($xql);
//$stmt->bindVariable('priceDefinedByBindVariableMethod', 3);
$resultPool=$stmt->execute();
$results = $resultPool->getAllResults();
//$res_loop=0;
$sour_loop=0;
$righ_loop=0;
$key_loop=0;
$org_loop=0;
$anc_loop=0;
$md_loop=0;
$lang_loop=0;
$names_loop=0;
$roles_loop=0;
$licence_loop=0;
$locationSet_loop=0;
$periodName_loop=0;
$displayDate_loop=0;
$country_loop=0;
$provenance_loop=0;
$material_loop=0;
$file_name_loop=0;

$source=array();
$rights=array();
$keywords=array();
$organization=array();
$ancientTime=array();
$modernTime=array();
$language=array();
$names=array();
$roles=array();
$licence=array();
$locationSet=array();
$periodName=array();
$displayDate=array();
$country=array();
$provenance=array();
$material=array();
$file_name=array();

foreach ($results as $result){
if(strpos($result,'source')!==false){
$source[$sour_loop]=$result;
$source[$sour_loop]=str_replace('source',"",$source[$sour_loop]);
$source[$sour_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$source[$sour_loop]);
$sour_loop++;
//$res_loop++;
}
elseif(strpos($result,'rights')!==false){
$rights[$righ_loop]=$result;
$rights[$righ_loop]=str_replace('rights',"",$rights[$righ_loop]);
$rights[$righ_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$rights[$righ_loop]);
$righ_loop++;}

elseif(strpos($result,'keywords')!==false){
$keywords[$key_loop]=$result;
$keywords[$key_loop]=str_replace('keywords',"",$keywords[$key_loop]);
$keywords[$key_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$keywords[$key_loop]);
$key_loop++;
}

elseif(strpos($result,'organization')!==false){
$organization[$org_loop]=$result;
$organization[$org_loop]=str_replace('organization',"",$organization[$org_loop]);
$organization[$org_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$organization[$org_loop]);
$org_loop++;
}

elseif(strpos($result,'ancientTime')!==false){
$ancientTime[$anc_loop]=$result;
$ancientTime[$anc_loop]=str_replace('ancientTime',"",$ancientTime[$anc_loop]);
$ancientTime[$anc_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$ancientTime[$anc_loop]);
$anc_loop++;
}

elseif(strpos($result,'modernTime')!==false){
$modernTime[$md_loop]=$result;
$modernTime[$md_loop]=str_replace('modernTime',"",$modernTime[$md_loop]);
$modernTime[$md_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$modernTime[$md_loop]);
$md_loop++;
}
/*elseif(strpos($result,'language')!==false){
$language[$lang_loop]=$result;
$lang_loop++;
} */
elseif(strpos($result,'names')!==false){
$names[$names_loop]=$result;
$names[$names_loop]=str_replace('names',"",$names[$names_loop]);
$names[$names_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$names[$names_loop]);
$names_loop++;
}
elseif(strpos($result,'roles')!==false){
$roles[$roles_loop]=$result;
$roles[$roles_loop]=str_replace('roles',"",$roles[$roles_loop]);
$roles[$roles_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$roles[$roles_loop]);
$roles_loop++;
}
elseif(strpos($result,'licence')!==false){
$licence[$licence_loop]=$result;
$licence[$licence_loop]=str_replace('licence',"",$licence[$licence_loop]);
$licence[$licence_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$licence[$licence_loop]);
$licence_loop++;
}
elseif(strpos($result,'locationSet')!==false){
$locationSet[$locationSet_loop]=$result;
$locationSet[$locationSet_loop]=str_replace('locationSet',"",$locationSet[$locationSet_loop]);
$locationSet[$locationSet_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$locationSet[$locationSet_loop]);
$locationSet_loop++;
}
elseif(strpos($result,'periodName')!==false){
$periodName[$periodName_loop]=$result;
$periodName[$periodName_loop]=str_replace('periodName',"",$periodName[$periodName_loop]);
$periodName[$periodName_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$periodName[$periodName_loop]);
$periodName_loop++;
}
elseif(strpos($result,'displayDate')!==false){
$displayDate[$displayDate_loop]=$result;
$displayDate[$displayDate_loop]=str_replace('displayDate',"",$displayDate[$displayDate_loop]);
$displayDate[$displayDate_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$displayDate[$displayDate_loop]);
$displayDate_loop++;
}
elseif(strpos($result,'country')!==false){
$country[$country_loop]=$result;
$country[$country_loop]=str_replace('country',"",$country[$country_loop]);
$country[$country_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$country[$country_loop]);
$country_loop++;
}
elseif(strpos($result,'provenance')!==false){
$provenance[$provenance_loop]=$result;
$provenance[$provenance_loop]=str_replace('provenance',"",$provenance[$provenance_loop]);
$provenance[$provenance_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$provenance[$provenance_loop]);
$provenance_loop++;
}
elseif(strpos($result,'materials')!==false){
$material[$material_loop]=$result;
$material[$material_loop]=str_replace('materials',"",$material[$material_loop]);
$material[$material_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$material[$material_loop]);
$material_loop++;
}
elseif(strpos($result,'file_name')!==false){
$file_name[$file_name_loop]=$result;
$file_name[$file_name_loop]=str_replace('file_name',"",$file_name[$file_name_loop]);
$file_name[$file_name_loop]=str_replace('< xmlns="http://www.carare.eu/carareSchema">',"",$file_name[$file_name_loop]);
$file_name_loop++;
}
//print_r($result);
}
$source_imp=implode(",",$source);
$rights_imp=implode(",",$rights);
$key_imp=implode(",",$keywords);
$ancient_imp=implode(",",$ancientTime);
$md_imp=implode(",",$modernTime);
$org_imp=implode(",",$organization);
$names_imp=implode(",",$names);
$roles_imp=implode(",",$roles);
$lic_imp=implode(",",$licence);
$locSet_imp=implode(",",$locationSet);
$periodName_imp=implode(",",$periodName);
$displayDate_imp=implode(",",$displayDate);
$country_imp=implode(",",$country);
$provenance_imp=implode(",",$provenance);
$material_imp=implode(",",$material);
$file_name_imp=implode(",",$file_name);

$source=array_unique(explode(",",$source_imp));
$rights=array_filter(array_unique(explode(",",$rights_imp)));
$keywords=array_filter(array_unique(explode(",",$key_imp)));
$ancientTime=array_unique(explode(",",$ancient_imp));
$organization=array_unique(explode(",",$org_imp));
$names=array_unique(explode(",",$names_imp));
$roles=array_unique(explode(",",$roles_imp));
$licence=array_unique(explode(",",$source_imp));
$modernTime=array_unique(explode(",",$md_imp));
$locationSet=array_unique(explode(",",$locSet_imp));
$periodName=array_unique(explode(",",$periodName_imp));
$displayDate=array_unique(explode(",",$displayDate_imp));
$country=array_unique(explode(",",$country_imp));
$provenance=array_unique(explode(",",$provenance_imp));
$material=array_unique(explode(",",$material_imp));
$file_name=array_unique(explode(",",$file_name_imp));

//print_r($file_name);
//echo $source_imp,$rights_imp,$key_imp,$ancient_imp;
?>

<!--datalists-->

		<datalist id="provenance">
<?php 
          foreach ($provenance as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		
		<datalist id="material">
<?php 
          foreach ($material as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		
		<datalist id="names">
<?php 
          foreach ($names as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
         
		<datalist id="roles">
<?php 
          foreach ($roles as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
        
		<datalist id="org">
<?php 
          foreach ($organization as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>

		<datalist id="language">
         <option> gr</option>
         <option> en</option>
         <option> ger</option>
         <option> fr</option>
         <option> rus</option>
         <option> it</option>
        </datalist>
		
		<datalist id="preferred">
         <option> true</option>
         <option> false</option>
        </datalist>
		
		<datalist id="source">
<?php 
          foreach ($source as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		
		<datalist id="rights">
<?php 
          foreach ($rights as $i){
?>
            <option><?php echo $i; ?></option>

<?php 
}
?>
        </datalist>

		<datalist id="EuropeanaRights">
         <option> Creative Commons - Attribution (BY)</option>
         <option> Creative Commons - Attribution, ShareAlike (BY-SA)</option>
		 <option> Creative Commons - Attribution, No Derivatives (BY-ND)</option>
		 <option> Creative Commons - Attribution, Non-Commercial (BY-NC)</option>
		 <option> Creative Commons - Attribution, Non-Commercial, ShareAlike (BY-NC-SA)</option>
		 <option>"Creative Commons - Attribution, Non-Commercial, No Derivatives (BY-NC-ND)</option>
		 <option> Free access_no re_use</option>
		 <option> Paid access_no re_use</option>
		 <option> Orphan work</option>
		 <option> Unknown</option>
		 <option> The Public Domain Mark (PDM)</option>
		 <option> Out of copyright - non commercial re-use (OOC-NC)</option>
		 <option> The Creative Commons CC0 1.0 Universal Public Domain Dedication (CC0)</option>
        </datalist>
		
		<datalist id="units">
         <option> meters</option>
         <option> centimeters</option>
		 <option> millimiters</option>
        </datalist>
		
		<datalist id="modernDates">

<?php
          foreach ($modernTime as $i){
?>
             <option><?php echo $i; ?></option>
<?php 
				}
?>
        </datalist>
		
		<datalist id="keywords">
<?php 
          foreach ($keywords as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		
		<datalist id="ancientTime">
<?php 
          foreach ($ancientTime as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		 
		<datalist id="DispDate">
<?php 
             foreach ($displayDate as $i){
?>
              <option><?php echo $i; ?></option>
<?php 
				}
?>
        </datalist>
		 
		<datalist id="PerName">
<?php 
             foreach ($periodName as $i){
?>
			<option><?php echo $i; ?></option>
<?php 
				}
?>
        </datalist>
		
		<datalist id="locationSet">
<?php 
          foreach ($locationSet as $i){
?>
         <option><?php echo $i; ?></option>
<?php 
         }
?>
        </datalist>
		
		<datalist id="country">
<?php 
           foreach ($country as $i){
?>
           <option><?php echo $i; ?></option>
<?php 
				}
?>
		</datalist>
		
		<datalist id="general_type">
			<option>Monument</option>
			<option>Artefact</option>
			<option>Text</option>
			<option>Image</option>
			<option>Sound</option>
			<option>Movie</option>
			<option>3D</option>
		</datalist>
		
		<datalist id="digital_type">
			<option>Text</option>
			<option>Image</option>
			<option>Sound</option>
			<option>Movie</option>
			<option>3D</option>
		</datalist>
<!-- End of Datalists-->		 

