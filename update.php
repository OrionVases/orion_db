<?php

// initialize a session
session_start();
$usr_name=$_SESSION['user_name'];
$id=$_POST['id'];
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
<script type="text/javascript">
function multiplyNode(variable1,variable2,variable3) {
    var i=document.getElementsByClassName(variable2).length ;
    var x=document.getElementById(variable1);
    var cln=x.cloneNode(true);
    var parentNode=document.getElementById(variable3);
    cln.setAttribute("id",i);
 
    parentNode.insertBefore(cln,x);
    
    
}
</script>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}	
	function getsecondlevel(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						var i=document.getElementsByClassName("HerAssetTypelvl_2").length -1 ;
						
						document.getElementById("HerAssetTypeIdlvl_2").innerHTML=req.responseText;
						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	function getthirdlevel(strURL) {		
		
		var req1 = getXMLHTTP();
		
		if (req1) {
			
			req1.onreadystatechange = function() {
				if (req1.readyState == 4) {
					// only if "OK"
					if (req1.status == 200) {
						
						document.getElementById("HerAssetTypeIdlvl_3").innerHTML=req1.responseText;
						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req1.statusText);
					}
				}				
			}			
			req1.open("GET", strURL, true);
			req1.send(null);
		}
				
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
<div class="row1  bara">
 <header id="header" class="  clear ">
  <nav>
      <ul>
        <li><a href="index.php" onclick="showonlyone('Home');">Home</a></li>
        <li><a  href="collections.php">Collection</a></li>
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
					<li><a href="my_coll.php" >My Collection</a></li>
				</ul>
			</li>
              
        <?php } ?>
        
        </li>
        <?php
        if(!isset($_SESSION['user_name'])){
        ?>
          <li class="last" ><a href="#" >Language</a> 
			 <ul >
				<li><a href="index.php?language=en" hreflang="en" >English</a></li>
				<li><a href="index.php?language=gr" hreflang="gr">Ελληνικά</a></li>
			</ul>
		</li>
        <?php
        }else{
        ?>
        <li ><a href="#" >Language</a> 
			 <ul >
				<li><a href="index.php?language=en" hreflang="en" >English</a></li>
				<li><a href="index.php?language=gr" hreflang="gr">Ελληνικά</a></li>
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

<!-- content -->
<div class="wrapper row2 ">

  <div id="container" class="clear">
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
$instructions="The fields with the asterisk are mandatory!";
?>
  <div id="error_msg"> <?php echo $instructions; ?> </div>
  <div id="dplist" style="overflow-y: auto;">

<?php
//get the id of the vase that was passed through the href in <a> tag



//echo $id;
// assign the user name at a var


	include 'datalists.php';
	include 'hrlist.php';
	
$connConfig1 = array(
		'protocol'=>'http',
		'user'=>'guest',
		'password'=>'guest',
		'host'=>'localhost',
		'port'=>'8080',
		'path'=>'/exist/xmlrpc/'
	);
	// alternatively, you can specify the URI as a whole in the form
	// $connConfig = array('uri'=>'http://user:password@host:port/path');
	
	$conn = new \ExistDB\Client($connConfig1);
	  $xql1 = <<<EOXQL
xquery version "3.1";

import module namespace util="http://exist-db.org/xquery/util";
declare default element namespace "http://www.carare.eu/carareSchema";
declare namespace map="http://www.w3.org/2005/xpath-functions/map";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};



let \$path:=concat("/db/vases/entries/",\$usr_name)
for \$a in collection(\$path)/carareWrap/carare[@id=\$id]

let \$entry_name:=util:document-name(\$a)
let \$dig_object:=data(\$a/digitalResource/object)
let \$dig_shownat:=data(\$a/digitalResource/isShownAt)

(:~ collection information :)
let \$coll_title:=local:assign("coll_title:",\$a/collectionInformation/title)
let \$coll_id:=local:assign("coll_id:",\$a/collectionInformation/id)
let \$coll_title_lang_attr:=local:assign("coll_title_lang_attr:",\$a/collectionInformation/title/@lang)
let \$coll_title_pref_attr:=local:assign("coll_title_pref_attr:",\$a/collectionInformation/title/@preferred)

let \$coll_source:=local:assign("coll_source:",\$a/collectionInformation/source)

let \$coll_contacts_name:=local:assign("coll_contacts_name:",\$a/collectionInformation/contacts/name)
let \$coll_contacts_role:=local:assign("coll_contacts_role:",\$a/collectionInformation/contacts/role)
let \$coll_contacts_org:=local:assign("coll_contacts_org:",\$a/collectionInformation/contacts/organization)

let \$coll_rights_copyrightCreditLine:=local:assign("coll_rights_copyrightCreditLine:",\$a/collectionInformation/rights/copyrightCreditLine)
let \$coll_rights_accessRights:=local:assign("coll_rights_accessRights:",\$a/collectionInformation/rights/accessRights)
let \$coll_rights_reproductionRights:=local:assign("coll_rights_reproductionRights:",\$a/collectionInformation/rights/reproductionRights)
let \$coll_rights_licence:=local:assign("coll_rights_licence:",\$a/collectionInformation/rights/licence)
let \$coll_rights_europeanaRights:=local:assign("coll_rights_europeanaRights:",\$a/collectionInformation/rights/europeanaRights)

let \$coll_lang:=local:assign("coll_lang:",\$a/collectionInformation/language)

let \$coll_creation_createdOn:=local:assign("coll_creation_createdOn:",\$a/collectionInformation/creation/createdOn)

let \$coll_keywords:=local:assign("coll_keywords:",\$a/collectionInformation/keywords)

let \$coll_coverage_temporal_timespan_startDate:=local:assign("coll_coverage_temporal_timespan_startDate:",\$a/collectionInformation/coverage/temporal/timeSpan/startDate)
let \$coll_coverage_temporal_timespan_endtDate:=local:assign("coll_coverage_temporal_timespan_endtDate:",\$a/collectionInformation/coverage/temporal/timeSpan/endDate)
let \$coll_coverage_temporal_periodName:=local:assign("coll_coverage_temporal_periodName:",\$a/collectionInformation/coverage/temporal/periodName)
let \$coll_coverage_temporal_displayDate:=local:assign("coll_coverage_temporal_displayDate:",\$a/collectionInformation/coverage/temporal/displayDate)
let \$coll_coverage_spatial_locationSet_namedLocation:=local:assign("coll_coverage_spatial_locationSet_namedLocation:",\$a/collectionInformation/coverage/spatial/locationSet/namedLocation)
let \$coll_coverage_spatial_geometry_spatialReferenceSystem:=local:assign("coll_coverage_spatial_geometry_spatialReferenceSystem:",\$a/collectionInformation/coverage/spatial/geometry/spatialReferenceSystem)
let \$coll_coverage_spatial_geometry_quickpoint_x:=local:assign("coll_coverage_spatial_geometry_quickpoint_x:",\$a/collectionInformation/coverage/spatial/geometry/quickpoint/x)
let \$coll_coverage_spatial_geometry_quickpoint_y:=local:assign("coll_coverage_spatial_geometry_quickpoint_y:",\$a/collectionInformation/coverage/spatial/geometry/quickpoint/y)
let \$coll_coverage_spatial_geometry_quickpoint_z:=local:assign("coll_coverage_spatial_geometry_quickpoint_z:",\$a/collectionInformation/coverage/spatial/geometry/quickpoint/z)
(:~ end of collection information :)

(:~ heritage asset identification :)
let \$hr_recordinf_source:=local:assign("hr_recordinf_source:",\$a/heritageAssetIdentification/recordInformation/source)
let \$hr_recordinf_country:=local:assign("hr_recordinf_country:",\$a/heritageAssetIdentification/recordInformation/country)
let \$hr_recordinf_creation_date:=local:assign("hr_recordinf_creation_date:",\$a/heritageAssetIdentification/creation/date)
let \$hr_recordinf_creation_contacts_name:=local:assign("hr_recordinf_creation_contacts_name:",\$a/heritageAssetIdentification/recordInformation/creation/contacts/name)
let \$hr_recordinf_creation_contacts_role:=local:assign("hr_recordinf_creation_contacts_role:",\$a/heritageAssetIdentification/recordInformation/creation/contacts/role)
let \$hr_recordinf_creation_contacts_org:=local:assign("hr_recordinf_creation_contacts_org:",\$a/heritageAssetIdentification/recordInformation/creation/contacts/organization)
let \$hr_recordinf_update_date:=local:assign("hr_recordinf_update_date:",\$a/heritageAssetIdentification/recordInformation/update/date)
let \$hr_recordinf_lang:=local:assign("hr_recordinf_lang:",\$a/heritageAssetIdentification/recordInformation/language)
let \$hr_recordinf_lang_attr:=local:assign("hr_recordinf_lang_attr:",\$a/heritageAssetIdentification/recordInformation/language/@lang)
let \$hr_recordinf_metadatarights:=local:assign("hr_recordinf_metadatarights:",\$a/heritageAssetIdentification/recordInformation/metadataRights)

let \$hr_appellation_name:=local:assign("hr_appellation_name:",\$a/heritageAssetIdentification/appellation/name)
let \$hr_appellation_name_lang_attr:=local:assign("hr_appellation_name_lang_attr:",\$a/heritageAssetIdentification/appellation/name/@lang)
let \$hr_appellation_name_pref_attr:=local:assign("hr_appellation_name_pref_attr:",\$a/heritageAssetIdentification/appellation/name/@preferred)

let \$hr_description:=local:assign("hr_description:",\$a/heritageAssetIdentification/description)
let \$hr_description_lang_attr:=local:assign("hr_description_lang_attr:",\$a/heritageAssetIdentification/description/@lang)
let \$hr_description_pref_attr:=local:assign("hr_description_pref_attr:",\$a/heritageAssetIdentification/description/@preferred)
let \$hr_description_type_attr:=local:assign("hr_description_type_attr:",\$a/heritageAssetIdentification/description/@type)

let \$hr_generaltype:=local:assign("hr_generaltype:",\$a/heritageAssetIdentification/generalType)

let \$hr_actors_id:=local:assign("hr_actors_id:",\$a/heritageAssetIdentification/actors/id)
let \$hr_actors_name:=local:assign("hr_actors_name:",\$a/heritageAssetIdentification/actors/name)
let \$hr_actors_actorType:=local:assign("hr_actors_name:",\$a/heritageAssetIdentification/actors/actorType)
let \$hr_actors_placeOfActivity:=local:assign("hr_actors_placeOfActivity:",\$a/heritageAssetIdentification/actors/placeOfActivity)

let \$hr_conditions_condition:=local:assign("hr_conditions_condition:",\$a/heritageAssetIdentification/conditions/condition)
let \$hr_conditions_condition_lang_attr:=local:assign("hr_conditions_condition_lang_attr:",\$a/heritageAssetIdentification/conditions/condition/@lang)

let \$hr_provenance:=local:assign("hr_provenance:",\$a/heritageAssetIdentification/provenance)
let \$hr_provenance_lang_attr:=local:assign("hr_provenance_lang_attr:",\$a/heritageAssetIdentification/provenance/@lang)

let \$hr_characters_heritageAssetType:=local:assign("hr_characters_heritageAssetType:",\$a/heritageAssetIdentification/characters/heritageAssetType)
let \$hr_characters_heritageAssetType_lang_attr:=local:assign("hr_characters_heritageAssetType_lang_attr:",\$a/heritageAssetIdentification/characters/heritageAssetType/@lang)
let \$hr_characters_heritageAssetType_namespace_attr:=local:assign("hr_characters_heritageAssetType_namespace_attr:",\$a/heritageAssetIdentification/characters/heritageAssetType/@namespace)

let \$hr_characters_temporal_timespan_startdate:=local:assign("hr_characters_temporal_timespan_startdate:",\$a/heritageAssetIdentification/characters/temporal/timeSpan/startDate)
let \$hr_characters_temporal_timespan_enddate:=local:assign("hr_characters_temporal_timespan_enddate:",\$a/heritageAssetIdentification/characters/temporal/timeSpan/endDate)

let \$hr_characters_temporal_periodname:=local:assign("hr_characters_temporal_periodname:",\$a/heritageAssetIdentification/characters/temporal/periodName)
let \$hr_characters_temporal_displaydate:=local:assign("hr_characters_temporal_displaydate:",\$a/heritageAssetIdentification/characters/temporal/displayDate)

let \$hr_characters_materials:=local:assign("hr_characters_materials:",\$a/heritageAssetIdentification/characters/materials)

let \$hr_characters_dimensions_measurementtype:=local:assign("hr_characters_dimensions_measurementtype:",\$a/heritageAssetIdentification/characters/dimensions/measurementType)
let \$hr_characters_dimensions_units:=local:assign("hr_characters_dimensions_units:",\$a/heritageAssetIdentification/characters/dimensions/units)
let \$hr_characters_dimensions_scale:=local:assign("hr_characters_dimensions_scale:",\$a/heritageAssetIdentification/characters/dimensions/scale)
let \$hr_characters_dimensions_value:=local:assign("hr_characters_dimensions_value:",\$a/heritageAssetIdentification/characters/dimensions/value)

let \$hr_spatial_locationset_namedlocation:=local:assign("hr_spatial_locationset_namedlocation:",\$a/heritageAssetIdentification/spatial/locationSet/namedLocation)
let \$hr_spatial_locationset_namedlocation_lang_attr:=local:assign("hr_spatial_locationset_namedlocation_lang_attr:",\$a/heritageAssetIdentification/spatial/locationSet/namedLocation/@lang)

let \$hr_spatial_geometry_quickpoint_x:=local:assign("hr_spatial_geometry_quickpoint_x:",\$a/heritageAssetIdentification/spatial/geometry/quickpoint/x)
let \$hr_spatial_geometry_quickpoint_y:=local:assign("hr_spatial_geometry_quickpoint_y:",\$a/heritageAssetIdentification/spatial/geometry/quickpoint/y)
let \$hr_spatial_geometry_quickpoint_z:=local:assign("hr_spatial_geometry_quickpoint_z:",\$a/heritageAssetIdentification/spatial/geometry/quickpoint/z)

let \$hr_publicationstatement_publisher:=local:assign("hr_publicationstatement_publisher:",\$a/heritageAssetIdentification/publicationStatement/publisher)
let \$hr_publicationstatement_place:=local:assign("hr_publicationstatement_place:",\$a/heritageAssetIdentification/publicationStatement/place)
let \$hr_publicationstatement_date:=local:assign("hr_publicationstatement_date:",\$a/heritageAssetIdentification/publicationStatement/date)

let \$hr_rights_copyrightCreditLine:=local:assign("hr_rights_copyrightCreditLine:",\$a/heritageAssetIdentification/rights/copyrightCreditLine)
let \$hr_rights_accessRights:=local:assign("hr_rights_accessRights:",\$a/heritageAssetIdentification/rights/accessRights)
let \$hr_rights_reproductionRights:=local:assign("hr_rights_reproductionRights:",\$a/heritageAssetIdentification/rightsreproductionRights)
let \$hr_rights_licence:=local:assign("hr_rights_licence:",\$a/heritageAssetIdentification/rights/licence)
let \$hr_rights_europeanaRights:=local:assign("hr_rights_europeanaRights:",\$a/heritageAssetIdentification/rights/europeanaRights)

let \$hr_references_type:=local:assign("hr_references_type:",\$a/heritageAssetIdentification/references/type)
let \$hr_references_publicationstatement_publisher:=local:assign("hr_references_publicationstatement_publisher:",\$a/heritageAssetIdentification/references/publicationStatement/publisher)
(:~ end of heritage asset identification :)

(:~ digital resource :)
let \$dig_recordinf_source:=local:assign("dig_recordinf_source:",\$a/digitalResource/recordInformation/source)
let \$dig_recordinf_country:=local:assign("dig_recordinf_country:",\$a/digitalResource/recordInformation/country)
let \$dig_recordinf_creation_date:=local:assign("dig_recordinf_creation_date:",\$a/digitalResource/creation/date)
let \$dig_recordinf_creation_contacts_name:=local:assign("dig_recordinf_creation_contacts_name:",\$a/digitalResource/recordInformation/creation/contacts/name)
let \$dig_recordinf_creation_contacts_role:=local:assign("dig_recordinf_creation_contacts_role:",\$a/digitalResource/recordInformation/creation/contacts/role)
let \$dig_recordinf_creation_contacts_org:=local:assign("dig_recordinf_creation_contacts_org:",\$a/digitalResource/recordInformation/creation/contacts/organization)
let \$dig_recordinf_update_date:=local:assign("dig_recordinf_update_date:",\$a/digitalResource/recordInformation/update/date)
let \$dig_recordinf_lang:=local:assign("dig_recordinf_lang:",\$a/digitalResource/recordInformation/language)
let \$dig_recordinf_metadatarights:=local:assign("dig_recordinf_metadatarights:",\$a/digitalResource/recordInformation/metadataRights)

let \$dig_appellation_name:=local:assign("dig_appellation_name:",\$a/digitalResource/appellation/name)
let \$dig_appellation_name_lang_attr:=local:assign("dig_appellation_name_lang_attr:",\$a/digitalResource/appellation/name/@lang)
let \$dig_appellation_name_pref_attr:=local:assign("dig_appellation_name_pref_attr:",\$a/digitalResource/appellation/name/@preferred)

let \$dig_description:=local:assign("dig_description:",\$a/digitalResource/description)
let \$dig_description_lang_attr:=local:assign("dig_description_lang_attr:",\$a/digitalResource/description/@lang)
let \$dig_description_pref_attr:=local:assign("dig_description_pref_attr:",\$a/digitalResource/description/@preferred)
let \$dig_description_type_attr:=local:assign("dig_description_type_attr:",\$a/digitalResource/description/@type)

let \$dig_actors_id:=local:assign("dig_actors_id:",\$a/digitalResource/actors/id)
let \$dig_actors_name:=local:assign("dig_actors_name:",\$a/digitalResource/actors/name)
let \$dig_actors_actorType:=local:assign("dig_actors_actorType:",\$a/digitalResource/actors/actorType)
let \$dig_actors_placeOfActivity:=local:assign("dig_actors_placeOfActivity:",\$a/digitalResource/actors/placeOfActivity)

let \$dig_type:=local:assign("dig_type:",\$a/digitalResource/type)

let \$dig_format:=local:assign("dig_format:",\$a/digitalResource/format)
let \$dig_format_lang_attr:=local:assign("dig_format_lang_attr:",\$a/digitalResource/format/@lang)

let \$dig_rights_copyrightCreditLine:=local:assign("dig_rights_copyrightCreditLine:",\$a/digitalResource/rights/copyrightCreditLine)
let \$dig_rights_accessRights:=local:assign("dig_rights_accessRights:",\$a/digitalResource/rights/accessRights)
let \$dig_rights_reproductionRights:=local:assign("dig_rights_reproductionRights:",\$a/digitalResource/rightsreproductionRights)
let \$dig_rights_licence:=local:assign("dig_rights_licence:",\$a/digitalResource/rights/licence)
let \$dig_rights_europeanaRights:=local:assign("dig_rights_europeanaRights:",\$a/digitalResource/rights/europeanaRights)
(:~ end of digital resource :)


return (\$entry_name,
\$dig_object,
\$dig_shownat,


\$coll_title,
\$coll_id,
\$coll_title_lang_attr,
\$coll_title_pref_attr,

\$coll_source,

\$coll_contacts_name,
\$coll_contacts_role,
\$coll_contacts_org,

\$coll_rights_copyrightCreditLine,
\$coll_rights_accessRights,
\$coll_rights_reproductionRights,
\$coll_rights_licence,
\$coll_rights_europeanaRights,

\$coll_lang,

\$coll_creation_createdOn,

\$coll_keywords,

\$coll_coverage_temporal_timespan_startDate,
\$coll_coverage_temporal_timespan_endtDate,
\$coll_coverage_temporal_periodName,
\$coll_coverage_temporal_displayDate,
\$coll_coverage_spatial_locationSet_namedLocation,
\$coll_coverage_spatial_geometry_spatialReferenceSystem,
\$coll_coverage_spatial_geometry_quickpoint_x,
\$coll_coverage_spatial_geometry_quickpoint_y,
\$coll_coverage_spatial_geometry_quickpoint_z,
(:~ end of collection information :)

(:~ heritage asset identification :)
\$hr_recordinf_source,
\$hr_recordinf_country,
\$hr_recordinf_creation_date,
\$hr_recordinf_creation_contacts_name,
\$hr_recordinf_creation_contacts_role,
\$hr_recordinf_creation_contacts_org,
\$hr_recordinf_update_date,
\$hr_recordinf_lang,
\$hr_recordinf_lang_attr,
\$hr_recordinf_metadatarights,

\$hr_appellation_name,
\$hr_appellation_name_lang_attr,
\$hr_appellation_name_pref_attr,

\$hr_description,
\$hr_description_lang_attr,
\$hr_description_pref_attr,
\$hr_description_type_attr,

\$hr_generaltype,

\$hr_actors_id,
\$hr_actors_name,
\$hr_actors_actorType,
\$hr_actors_placeOfActivity,

\$hr_conditions_condition,
\$hr_conditions_condition_lang_attr,

\$hr_provenance,
\$hr_provenance_lang_attr,

\$hr_characters_heritageAssetType,
\$hr_characters_heritageAssetType_lang_attr,
\$hr_characters_heritageAssetType_namespace_attr,

\$hr_characters_temporal_timespan_startdate,
\$hr_characters_temporal_timespan_enddate,

\$hr_characters_temporal_periodname,
\$hr_characters_temporal_displaydate,

\$hr_characters_materials,

\$hr_characters_dimensions_measurementtype,
\$hr_characters_dimensions_units,
\$hr_characters_dimensions_scale,
\$hr_characters_dimensions_value,

\$hr_spatial_locationset_namedlocation,
\$hr_spatial_locationset_namedlocation_lang_attr,

\$hr_spatial_geometry_quickpoint_x,
\$hr_spatial_geometry_quickpoint_y,
\$hr_spatial_geometry_quickpoint_z,

\$hr_publicationstatement_publisher,
\$hr_publicationstatement_place,
\$hr_publicationstatement_date,

\$hr_rights_copyrightCreditLine,
\$hr_rights_accessRights,
\$hr_rights_reproductionRights,
\$hr_rights_licence,
\$hr_rights_europeanaRights,

\$hr_references_type,
\$hr_references_publicationstatement_publisher,
(:~ end of heritage asset identification :)

(:~ digital resource :)
\$dig_recordinf_source,
\$dig_recordinf_country,
\$dig_recordinf_creation_date,
\$dig_recordinf_creation_contacts_name,
\$dig_recordinf_creation_contacts_role,
\$dig_recordinf_creation_contacts_org,
\$dig_recordinf_update_date,
\$dig_recordinf_lang,

\$dig_recordinf_metadatarights,

\$dig_appellation_name,
\$dig_appellation_name_lang_attr,
\$dig_appellation_name_pref_attr,

\$dig_description,
\$dig_description_lang_attr,
\$dig_description_pref_attr,
\$dig_description_type_attr,

\$dig_actors_id,
\$dig_actors_name,
\$dig_actors_actorType,
\$dig_actors_placeOfActivity,

\$dig_type,

\$dig_format,
\$dig_format_lang_attr,

\$dig_rights_copyrightCreditLine,
\$dig_rights_accessRights,
\$dig_rights_reproductionRights,
\$dig_rights_licence,
\$dig_rights_europeanaRights
(:~ end of digital resource :))

EOXQL;

$stmt1 = $conn->prepareQuery($xql1);
$stmt1->bindVariable('id', $id);
$stmt1->bindVariable('usr_name', $usr_name);
$resultPool1=$stmt1->execute();
$results1 = $resultPool1->getAllResults();
//print_r($results1);

$entry_name=$results1[0];
$digital_res_objectURI=$results1[1];
$digital_res_ShownAtURI=$results1[2];


$coll_title_loop=0;
$coll_title_lang_attr_loop=0;
$coll_title_pref_attr_loop=0;
$coll_source_loop=0;
$coll_contacts_name_loop=0;
$coll_contacts_role_loop=0;
$coll_contacts_org_loop=0;
$coll_rights_copyrightCreditLine_loop=0;
$coll_rights_accessRights_loop=0;
$coll_rights_reproductionRights_loop=0;
$coll_rights_licence_loop=0;
$coll_rights_europeanaRights_loop=0;
$coll_lang_loop=0;
$coll_creation_createdOn_loop=0;
$coll_keywords_loop=0;
$coll_coverage_temporal_timespan_startDate_loop=0;
$coll_coverage_temporal_timespan_endtDate_loop=0;
$coll_coverage_temporal_periodName_loop=0;
$coll_coverage_temporal_displayDate_loop=0;
$coll_coverage_spatial_locationSet_namedLocation_loop=0;
$coll_coverage_spatial_geometry_spatialReferenceSystem_loop=0;
$coll_coverage_spatial_geometry_quickpoint_x_loop=0;
$coll_coverage_spatial_geometry_quickpoint_y_loop=0;
$coll_coverage_spatial_geometry_quickpoint_z_loop=0;

$hr_recordinf_source_loop=0;
$hr_recordinf_country_loop=0;
$hr_recordinf_creation_date_loop=0;
$hr_recordinf_creation_contacts_name_loop=0;
$hr_recordinf_creation_contacts_role_loop=0;
$hr_recordinf_creation_contacts_org_loop=0;
$hr_recordinf_update_date_loop=0;
$hr_recordinf_lang_loop=0;
$hr_recordinf_lang_attr_loop=0;
$hr_recordinf_metadatarights_loop=0;
$hr_appellation_name_loop=0;
$hr_appellation_name_lang_attr_loop=0;
$hr_appellation_name_pref_attr_loop=0;
$hr_description_loop=0;
$hr_description_lang_attr_loop=0;
$hr_description_pref_attr_loop=0;
$hr_description_type_attr_loop=0;
$hr_generaltype_loop=0;
$hr_actors_id_loop=0;
$hr_actors_name_loop=0;
$hr_actors_actorType_loop=0;
$hr_actors_placeOfActivity_loop=0;
$hr_conditions_condition_loop=0;
$hr_conditions_condition_lang_attr_loop=0;
$hr_provenance_loop=0;
$hr_provenance_lang_attr_loop=0;
$hr_characters_heritageAssetType_loop=0;
$hr_characters_heritageAssetType_lang_attr_loop=0;
$hr_characters_heritageAssetType_namespace_attr_loop=0;
$hr_characters_temporal_timespan_startdate_loop=0;
$hr_characters_temporal_timespan_enddate_loop=0;
$hr_characters_temporal_periodname_loop=0;
$hr_characters_temporal_displaydate_loop=0;
$hr_characters_materials_loop=0;
$hr_characters_dimensions_measurementtype_loop=0;
$hr_characters_dimensions_units_loop=0;
$hr_characters_dimensions_scale_loop=0;
$hr_characters_dimensions_value_loop=0;
$hr_spatial_locationset_namedlocation_loop=0;
$hr_spatial_locationset_namedlocation_lang_attr_loop=0;
$hr_spatial_geometry_quickpoint_x_loop=0;
$hr_spatial_geometry_quickpoint_y_loop=0;
$hr_spatial_geometry_quickpoint_z_loop=0;
$hr_publicationstatement_publisher_loop=0;
$hr_publicationstatement_place_loop=0;
$hr_publicationstatement_date_loop=0;
$hr_rights_copyrightCreditLine_loop=0;
$hr_rights_accessRights_loop=0;
$hr_rights_reproductionRights_loop=0;
$hr_rights_licence_loop=0;
$hr_rights_europeanaRights_loop=0;
$hr_references_type_loop=0;
$hr_references_publicationstatement_publisher_loop=0;

$dig_recordinf_source_loop=0;
$dig_recordinf_country_loop=0;
$dig_recordinf_creation_date_loop=0;
$dig_recordinf_creation_contacts_name_loop=0;
$dig_recordinf_creation_contacts_role_loop=0;
$dig_recordinf_creation_contacts_org_loop=0;
$dig_recordinf_update_date_loop=0;
$dig_recordinf_lang_loop=0;

$dig_recordinf_metadatarights_loop=0;
$dig_appellation_name_loop=0;
$dig_appellation_name_lang_attr_loop=0;
$dig_appellation_name_pref_attr_loop=0;
$dig_description_loop=0;
$dig_description_lang_attr_loop=0;
$dig_description_pref_attr_loop=0;
$dig_description_type_attr_loop=0;
$dig_actors_id_loop=0;
$dig_actors_name_loop=0;
$dig_actors_actorType_loop=0;
$dig_actors_placeOfActivity_loop=0;
$dig_type_loop=0;
$dig_format_loop=0;
$dig_format_lang_attr_loop=0;
$dig_rights_copyrightCreditLine_loop=0;
$dig_rights_accessRights_loop=0;
$dig_rights_reproductionRights_loop=0;
$dig_rights_licence_loop=0;
$dig_rights_europeanaRights_loop=0;

$coll_title=array();
$coll_title_lang_attr=array();
$coll_title_pref_attr=array();
$coll_source=array();
$coll_contacts_name=array();
$coll_contacts_role=array();
$coll_contacts_org=array();
$coll_rights_copyrightCreditLine=array();
$coll_rights_accessRights=array();
$coll_rights_reproductionRights=array();
$coll_rights_licence=array();
$coll_rights_europeanaRights=array();
$coll_lang=array();
$coll_creation_createdOn=array();
$coll_keywords=array();
$coll_coverage_temporal_timespan_startDate=array();
$coll_coverage_temporal_timespan_endtDate=array();
$coll_coverage_temporal_periodName=array();
$coll_coverage_temporal_displayDate=array();
$coll_coverage_spatial_locationSet_namedLocation=array();
$coll_coverage_spatial_geometry_spatialReferenceSystem=array();
$coll_coverage_spatial_geometry_quickpoint_x=array();
$coll_coverage_spatial_geometry_quickpoint_y=array();
$coll_coverage_spatial_geometry_quickpoint_z=array();

$hr_recordinf_source=array();
$hr_recordinf_country=array();
$hr_recordinf_creation_date=array();
$hr_recordinf_creation_contacts_name=array();
$hr_recordinf_creation_contacts_role=array();
$hr_recordinf_creation_contacts_org=array();
$hr_recordinf_update_date=array();
$hr_recordinf_lang=array();
$hr_recordinf_lang_attr=array();
$hr_recordinf_metadatarights=array();
$hr_appellation_name=array();
$hr_appellation_name_lang_attr=array();
$hr_appellation_name_pref_attr=array();
$hr_description=array();
$hr_description_lang_attr=array();
$hr_description_pref_attr=array();
$hr_description_type_attr=array();
$hr_generaltype=array();
$hr_actors_id=array();
$hr_actors_name=array();
$hr_actors_actorType=array();
$hr_actors_placeOfActivity=array();
$hr_conditions_condition=array();
$hr_conditions_condition_lang_attr=array();
$hr_provenance=array();
$hr_provenance_lang_attr=array();
$hr_characters_heritageAssetType=array();
$hr_characters_heritageAssetType_lang_attr=array();
$hr_characters_heritageAssetType_namespace_attr=array();
$hr_characters_temporal_timespan_startdate=array();
$hr_characters_temporal_timespan_enddate=array();
$hr_characters_temporal_periodname=array();
$hr_characters_temporal_displaydate=array();
$hr_characters_materials=array();
$hr_characters_dimensions_measurementtype=array();
$hr_characters_dimensions_units=array();
$hr_characters_dimensions_scale=array();
$hr_characters_dimensions_value=array();
$hr_spatial_locationset_namedlocation=array();
$hr_spatial_locationset_namedlocation_lang_attr=array();
$hr_spatial_geometry_quickpoint_x=array();
$hr_spatial_geometry_quickpoint_y=array();
$hr_spatial_geometry_quickpoint_z=array();
$hr_publicationstatement_publisher=array();
$hr_publicationstatement_place=array();
$hr_publicationstatement_date=array();
$hr_rights_copyrightCreditLine=array();
$hr_rights_accessRights=array();
$hr_rights_reproductionRights=array();
$hr_rights_licence=array();
$hr_rights_europeanaRights=array();
$hr_references_type=array();
$hr_references_publicationstatement_publisher=array();

$dig_recordinf_source=array();
$dig_recordinf_country=array();
$dig_recordinf_creation_date=array();
$dig_recordinf_creation_contacts_name=array();
$dig_recordinf_creation_contacts_role=array();
$dig_recordinf_creation_contacts_org=array();
$dig_recordinf_update_date=array();
$dig_recordinf_lang=array();

$dig_recordinf_metadatarights=array();
$dig_appellation_name=array();
$dig_appellation_name_lang_attr=array();
$dig_appellation_name_pref_attr=array();
$dig_description=array();
$dig_description_lang_attr=array();
$dig_description_pref_attr=array();
$dig_description_type_attr=array();
$dig_actors_id=array();
$dig_actors_name=array();
$dig_actors_actorType=array();
$dig_actors_placeOfActivity=array();
$dig_type=array();
$dig_format=array();
$dig_format_lang_attr=array();
$dig_rights_copyrightCreditLine=array();
$dig_rights_accessRights=array();
$dig_rights_reproductionRights=array();
$dig_rights_licence=array();
$dig_rights_europeanaRights=array();

foreach ($results1 as $result){

if(strpos($result,'coll_title:')!==false){
$coll_title[$coll_title_loop]=$result;
$coll_title[$coll_title_loop]=str_replace('coll_title:',"",$coll_title[$coll_title_loop]);
$coll_title_loop++;
}
if(strpos($result,'coll_id:')!==false){
$coll_id=$result;
$coll_id=str_replace('coll_id:',"",$coll_id);
}
elseif(strpos($result,'coll_title_lang_attr:')!==false){
$coll_title_lang_attr[$coll_title_lang_attr_loop]=$result;
$coll_title_lang_attr[$coll_title_lang_attr_loop]=str_replace('coll_title_lang_attr:',"",$coll_title_lang_attr[$coll_title_lang_attr_loop]);
$coll_title_lang_attr_loop++;}
elseif(strpos($result,'coll_title_pref_attr:')!==false){
$coll_title_pref_attr[$coll_title_pref_attr_loop]=$result;
$coll_title_pref_attr[$coll_title_pref_attr_loop]=str_replace('coll_title_pref_attr:',"",$coll_title_pref_attr[$coll_title_pref_attr_loop]);
$coll_title_pref_attr_loop++;
}
elseif(strpos($result,'coll_source:')!==false){
$coll_source[$coll_source_loop]=$result;
$coll_source[$coll_source_loop]=str_replace('coll_source:',"",$coll_source[$coll_source_loop]);
$coll_source_loop++;
}
elseif(strpos($result,'coll_contacts_name:')!==false){
$coll_contacts_name[$coll_contacts_name_loop]=$result;
$coll_contacts_name[$coll_contacts_name_loop]=str_replace('coll_contacts_name:',"",$coll_contacts_name[$coll_contacts_name_loop]);
$coll_contacts_name_loop++;
}
elseif(strpos($result,'coll_contacts_role:')!==false){
$coll_contacts_role[$coll_contacts_role_loop]=$result;
$coll_contacts_role[$coll_contacts_role_loop]=str_replace('coll_contacts_role:',"",$coll_contacts_role[$coll_contacts_role_loop]);
$coll_contacts_role_loop++;
}
elseif(strpos($result,'coll_contacts_org:')!==false){
$coll_contacts_org[$coll_contacts_org_loop]=$result;
$coll_contacts_org[$coll_contacts_role_loop]=str_replace('coll_contacts_role:',"",$coll_contacts_org[$coll_contacts_org_loop]);
$coll_contacts_org_loop++;
}
elseif(strpos($result,'coll_rights_copyrightCreditLine:')!==false){
$coll_rights_copyrightCreditLine[$coll_rights_copyrightCreditLine_loop]=$result;
$coll_rights_copyrightCreditLine[$coll_rights_copyrightCreditLine_loop]=str_replace('coll_rights_copyrightCreditLine:',"",$coll_rights_copyrightCreditLine[$coll_rights_copyrightCreditLine_loop]);
$coll_rights_copyrightCreditLine_loop++;
}
elseif(strpos($result,'coll_rights_accessRights:')!==false){
$coll_rights_accessRights[$coll_rights_accessRights_loop]=$result;
$coll_rights_accessRights[$coll_rights_accessRights_loop]=str_replace('coll_rights_accessRights:',"",$coll_rights_accessRights[$coll_rights_accessRights_loop]);
$coll_rights_accessRights_loop++;
}
elseif(strpos($result,'coll_rights_reproductionRights:')!==false){
$coll_rights_reproductionRights[$coll_rights_reproductionRights_loop]=$result;
$coll_rights_reproductionRights[$coll_rights_reproductionRights_loop]=str_replace('coll_rights_reproductionRights:',"",$coll_rights_reproductionRights[$coll_rights_reproductionRights_loop]);
$coll_rights_reproductionRights_loop++;
}
elseif(strpos($result,'coll_rights_licence:')!==false){
$coll_rights_licence[$coll_rights_licence_loop]=$result;
$coll_rights_licence[$coll_rights_licence_loop]=str_replace('coll_rights_licence:',"",$coll_rights_licence[$coll_rights_licence_loop]);
$coll_rights_licence_loop++;
}
elseif(strpos($result,'coll_rights_europeanaRights:')!==false){
$coll_rights_europeanaRights[$coll_rights_europeanaRights_loop]=$result;
$coll_rights_europeanaRights[$coll_rights_europeanaRights_loop]=str_replace('coll_rights_europeanaRights:',"",$coll_rights_europeanaRights[$coll_rights_europeanaRights_loop]);
$coll_rights_europeanaRights_loop++;
}
elseif(strpos($result,'coll_lang:')!==false){
$coll_lang[$coll_lang_loop]=$result;
$coll_lang[$coll_lang_loop]=str_replace('coll_lang:',"",$coll_lang[$coll_lang_loop]);
$coll_lang_loop++;
}
elseif(strpos($result,'coll_creation_createdOn:')!==false){
$coll_creation_createdOn[$coll_creation_createdOn_loop]=$result;
$coll_creation_createdOn[$coll_creation_createdOn_loop]=str_replace('coll_creation_createdOn:',"",$coll_creation_createdOn[$coll_creation_createdOn_loop]);
$coll_creation_createdOn_loop++;
}
elseif(strpos($result,'coll_keywords:')!==false){
$coll_keywords[$coll_keywords_loop]=$result;
$coll_keywords[$coll_keywords_loop]=str_replace('coll_keywords:',"",$coll_keywords[$coll_keywords_loop]);
$coll_keywords_loop++;
}
elseif(strpos($result,'coll_coverage_temporal_timespan_startDate:')!==false){
$coll_coverage_temporal_timespan_startDate[$coll_coverage_temporal_timespan_startDate_loop]=$result;
$coll_coverage_temporal_timespan_startDate[$coll_coverage_temporal_timespan_startDate_loop]=str_replace('coll_coverage_temporal_timespan_startDate:',"",$coll_coverage_temporal_timespan_startDate[$coll_coverage_temporal_timespan_startDate_loop]);
$coll_coverage_temporal_timespan_startDate_loop++;
}
elseif(strpos($result,'coll_coverage_temporal_timespan_endtDate:')!==false){
$coll_coverage_temporal_timespan_endtDate[$coll_coverage_temporal_timespan_endtDate_loop]=$result;
$coll_coverage_temporal_timespan_endtDate[$coll_coverage_temporal_timespan_endtDate_loop]=str_replace('coll_coverage_temporal_timespan_endtDate:',"",$coll_coverage_temporal_timespan_endtDate[$coll_coverage_temporal_timespan_endtDate_loop]);
$coll_coverage_temporal_timespan_endtDate_loop++; 
}
elseif(strpos($result,'coll_coverage_temporal_periodName:')!==false){
$coll_coverage_temporal_periodName[$coll_coverage_temporal_periodName_loop]=$result;
$coll_coverage_temporal_periodName[$coll_coverage_temporal_periodName_loop]=str_replace('coll_coverage_temporal_periodName:',"",$coll_coverage_temporal_periodName[$coll_coverage_temporal_periodName_loop]);
$coll_coverage_temporal_periodName_loop++;
}
elseif(strpos($result,'coll_coverage_temporal_displayDate:')!==false){
$coll_coverage_temporal_displayDate[$coll_coverage_temporal_displayDate_loop]=$result;
$coll_coverage_temporal_displayDate[$coll_coverage_temporal_displayDate_loop]=str_replace('coll_coverage_temporal_displayDate:',"",$coll_coverage_temporal_displayDate[$coll_coverage_temporal_displayDate_loop]);
$coll_coverage_temporal_displayDate_loop++;
}
elseif(strpos($result,'coll_coverage_spatial_locationSet_namedLocation:')!==false){
$coll_coverage_spatial_locationSet_namedLocation[$coll_coverage_spatial_locationSet_namedLocation_loop]=$result;
$coll_coverage_spatial_locationSet_namedLocation[$coll_coverage_spatial_locationSet_namedLocation_loop]=str_replace('coll_coverage_spatial_locationSet_namedLocation:',"",$coll_coverage_spatial_locationSet_namedLocation[$coll_coverage_spatial_locationSet_namedLocation_loop]);
$coll_coverage_spatial_locationSet_namedLocation_loop++;
}
elseif(strpos($result,'coll_coverage_spatial_geometry_spatialReferenceSystem:')!==false){
$coll_coverage_spatial_geometry_spatialReferenceSystem[$coll_coverage_spatial_geometry_spatialReferenceSystem_loop]=$result;
$coll_coverage_spatial_geometry_spatialReferenceSystem[$coll_coverage_spatial_geometry_spatialReferenceSystem_loop]=str_replace('coll_coverage_spatial_geometry_spatialReferenceSystem:',"",$coll_coverage_spatial_geometry_spatialReferenceSystem[$coll_coverage_spatial_geometry_spatialReferenceSystem_loop]);
$coll_coverage_spatial_geometry_spatialReferenceSystem_loop++;
}
elseif(strpos($result,'coll_coverage_spatial_geometry_quickpoint_x:')!==false){
$coll_coverage_spatial_geometry_quickpoint_x[$coll_coverage_spatial_geometry_quickpoint_x_loop]=$result;
$coll_coverage_spatial_geometry_quickpoint_x[$coll_coverage_spatial_geometry_quickpoint_x_loop]=str_replace('coll_coverage_spatial_geometry_quickpoint_x:',"",$coll_coverage_spatial_geometry_quickpoint_x[$coll_coverage_spatial_geometry_quickpoint_x_loop]);
$coll_coverage_spatial_geometry_quickpoint_x_loop++;
}
elseif(strpos($result,'coll_coverage_spatial_geometry_quickpoint_y:')!==false){
$coll_coverage_spatial_geometry_quickpoint_y[$coll_coverage_spatial_geometry_quickpoint_y_loop]=$result;
$coll_coverage_spatial_geometry_quickpoint_y[$coll_coverage_spatial_geometry_quickpoint_y_loop]=str_replace('coll_coverage_spatial_geometry_quickpoint_y:',"",$coll_coverage_spatial_geometry_quickpoint_y[$coll_coverage_spatial_geometry_quickpoint_y_loop]);
$coll_coverage_spatial_geometry_quickpoint_y_loop++;
}
elseif(strpos($result,'coll_coverage_spatial_geometry_quickpoint_z:')!==false){
$coll_coverage_spatial_geometry_quickpoint_z[$coll_coverage_spatial_geometry_quickpoint_z_loop]=$result;
$coll_coverage_spatial_geometry_quickpoint_z[$coll_coverage_spatial_geometry_quickpoint_z_loop]=str_replace('coll_coverage_spatial_geometry_quickpoint_z:',"",$coll_coverage_spatial_geometry_quickpoint_z[$coll_coverage_spatial_geometry_quickpoint_z_loop]);
$coll_coverage_spatial_geometry_quickpoint_z_loop++;
}

elseif(strpos($result,'hr_recordinf_source:')!==false){
$hr_recordinf_source[$hr_recordinf_source_loop]=$result;
$hr_recordinf_source[$hr_recordinf_source_loop]=str_replace('hr_recordinf_source:',"",$hr_recordinf_source[$hr_recordinf_source_loop]);
$hr_recordinf_source_loop++;
}
elseif(strpos($result,'hr_recordinf_country:')!==false){
$hr_recordinf_country[$hr_recordinf_country_loop]=$result;
$hr_recordinf_country[$hr_recordinf_country_loop]=str_replace('hr_recordinf_country:',"",$hr_recordinf_country[$hr_recordinf_country_loop]);
$hr_recordinf_country_loop++;
}
elseif(strpos($result,'hr_recordinf_creation_date:')!==false){
$hr_recordinf_creation_date[$hr_recordinf_creation_date_loop]=$result;
$hr_recordinf_creation_date[$hr_recordinf_creation_date_loop]=str_replace('hr_recordinf_creation_date:',"",$hr_recordinf_creation_date[$hr_recordinf_creation_date_loop]);
$hr_recordinf_creation_date_loop++;
}
elseif(strpos($result,'hr_recordinf_creation_contacts_name:')!==false){
$hr_recordinf_creation_contacts_name[$hr_recordinf_creation_contacts_name_loop]=$result;
$hr_recordinf_creation_contacts_name[$hr_recordinf_creation_contacts_name_loop]=str_replace('hr_recordinf_creation_contacts_name:',"",$hr_recordinf_creation_contacts_name[$hr_recordinf_creation_contacts_name_loop]);
$hr_recordinf_creation_contacts_name_loop++;
}
elseif(strpos($result,'hr_recordinf_creation_contacts_role:')!==false){
$hr_recordinf_creation_contacts_role[$hr_recordinf_creation_contacts_role_loop]=$result;
$hr_recordinf_creation_contacts_role[$hr_recordinf_creation_contacts_role_loop]=str_replace('hr_recordinf_creation_contacts_role:',"",$hr_recordinf_creation_contacts_role[$hr_recordinf_creation_contacts_role_loop]);
$hr_recordinf_creation_contacts_role_loop++;
}
elseif(strpos($result,'hr_recordinf_creation_contacts_org:')!==false){
$hr_recordinf_creation_contacts_org[$hr_recordinf_creation_contacts_org_loop]=$result;
$hr_recordinf_creation_contacts_org[$hr_recordinf_creation_contacts_org_loop]=str_replace('hr_recordinf_creation_contacts_org:',"",$hr_recordinf_creation_contacts_org[$hr_recordinf_creation_contacts_org_loop]);
$hr_recordinf_creation_contacts_org_loop++;
}
elseif(strpos($result,'hr_recordinf_update_date:')!==false){
$hr_recordinf_update_date[$hr_recordinf_update_date_loop]=$result;
$hr_recordinf_update_date[$hr_recordinf_update_date_loop]=str_replace('hr_recordinf_update_date:',"",$hr_recordinf_update_date[$hr_recordinf_update_date_loop]);
$hr_recordinf_update_date_loop++;
}
elseif(strpos($result,'hr_recordinf_lang:')!==false){
$hr_recordinf_lang[$hr_recordinf_lang_loop]=$result;
$hr_recordinf_lang[$hr_recordinf_lang_loop]=str_replace('hr_recordinf_lang:',"",$hr_recordinf_lang[$hr_recordinf_lang_loop]);
$hr_recordinf_lang_loop++;
}
elseif(strpos($result,'hr_recordinf_lang_attr:')!==false){
$hr_recordinf_lang_attr[$hr_recordinf_lang_attr_loop]=$result;
$hr_recordinf_lang_attr[$hr_recordinf_lang_attr_loop]=str_replace('hr_recordinf_lang_attr:',"",$hr_recordinf_lang_attr[$hr_recordinf_lang_attr_loop]);
$hr_recordinf_lang_attr_loop++;
}
elseif(strpos($result,'hr_recordinf_metadatarights:')!==false){
$hr_recordinf_metadatarights[$hr_recordinf_metadatarights_loop]=$result;
$hr_recordinf_metadatarights[$hr_recordinf_metadatarights_loop]=str_replace('hr_recordinf_metadatarights:',"",$hr_recordinf_metadatarights[$hr_recordinf_metadatarights_loop]);
$hr_recordinf_metadatarights++;
}
elseif(strpos($result,'hr_appellation_name:')!==false){
$hr_appellation_name[$hr_appellation_name_loop]=$result;
$hr_appellation_name[$hr_appellation_name_loop]=str_replace('hr_appellation_name:',"",$hr_appellation_name[$hr_appellation_name_loop]);
$hr_appellation_name_loop++;
}
elseif(strpos($result,'hr_appellation_name_lang_attr:')!==false){
$hr_appellation_name_lang_attr[$hr_appellation_name_lang_attr_loop]=$result;
$hr_appellation_name_lang_attr[$hr_appellation_name_lang_attr_loop]=str_replace('hr_appellation_name_lang_attr:',"",$hr_appellation_name_lang_attr[$hr_appellation_name_lang_attr_loop]);
$hr_appellation_name_lang_attr_loop++;
}
elseif(strpos($result,'hr_appellation_name_pref_attr:')!==false){
$hr_appellation_name_pref_attr[$hr_appellation_name_pref_attr_loop]=$result;
$hr_appellation_name_pref_attr[$hr_appellation_name_pref_attr_loop]=str_replace('hr_appellation_name_pref_attr:',"",$hr_appellation_name_pref_attr[$hr_appellation_name_pref_attr_loop]);
$hr_appellation_name_pref_attr_loop++;
}
elseif(strpos($result,'hr_description:')!==false){
$hr_description[$hr_description_loop]=$result;
$hr_description[$hr_description_loop]=str_replace('hr_description:',"",$hr_description[$hr_description_loop]);
$hr_description_loop++;
}
elseif(strpos($result,'hr_description_lang_attr:')!==false){
$hr_description_lang_attr[$hr_description_lang_attr_loop]=$result;
$hr_description_lang_attr[$hr_description_lang_attr_loop]=str_replace('hr_description_lang_attr:',"",$hr_description_lang_attr[$hr_description_lang_attr_loop]);
$hr_description_lang_attr_loop++;
}
elseif(strpos($result,'hr_description_pref_attr:')!==false){
$hr_description_pref_attr[$hr_description_pref_attr_loop]=$result;
$hr_description_pref_attr[$hr_description_pref_attr_loop]=str_replace('hr_description_pref_attr:',"",$hr_description_pref_attr[$hr_description_pref_attr_loop]);
$hr_description_pref_attr_loop++;
}
elseif(strpos($result,'hr_description_type_attr:')!==false){
$hr_description_type_attr[$hr_description_type_attr_loop]=$result;
$hr_description_type_attr[$hr_description_type_attr_loop]=str_replace('hr_description_type_attr:',"",$hr_description_type_attr[$hr_description_type_attr_loop]);
$hr_description_type_attr_loop++;
}
elseif(strpos($result,'hr_generaltype:')!==false){
$hr_generaltype[$hr_generaltype_loop]=$result;
$hr_generaltype[$hr_generaltype_loop]=str_replace('hr_generaltype:',"",$hr_generaltype[$hr_generaltype_loop]);
$hr_generaltype_loop++;
}
elseif(strpos($result,'hr_actors_id:')!==false){
$hr_actors_id[$hr_actors_id_loop]=$result;
$hr_actors_id[$hr_actors_id_loop]=str_replace('hr_actors_id:',"",$hr_actors_id[$hr_actors_id_loop]);
$hr_actors_id_loop++;
}
elseif(strpos($result,'hr_actors_name:')!==false){
$hr_actors_name[$hr_actors_name_loop]=$result;
$hr_actors_name[$hr_actors_name_loop]=str_replace('hr_actors_name:',"",$hr_actors_name[$hr_actors_name_loop]);
$hr_actors_name_loop++;
}
elseif(strpos($result,'hr_actors_actorType:')!==false){
$hr_actors_actorType[$hr_actors_actorType_loop]=$result;
$hr_actors_actorType[$hr_actors_actorType_loop]=str_replace('hr_actors_actorType:',"",$hr_actors_actorType[$hr_actors_actorType_loop]);
$hr_actors_actorType_loop++;
}
elseif(strpos($result,'hr_actors_placeOfActivity:')!==false){
$hr_actors_placeOfActivity[$hr_actors_placeOfActivity_loop]=$result;
$hr_actors_placeOfActivity[$hr_actors_placeOfActivity_loop]=str_replace('hr_actors_placeOfActivity:',"",$hr_actors_placeOfActivity[$hr_actors_placeOfActivity_loop]);
$hr_actors_placeOfActivity_loop++;
}
elseif(strpos($result,'hr_conditions_condition:')!==false){
$hr_conditions_condition[$hr_conditions_condition_loop]=$result;
$hr_conditions_condition[$hr_conditions_condition_loop]=str_replace('hr_conditions_condition:',"",$hr_conditions_condition[$hr_conditions_condition_loop]);
$hr_conditions_condition_loop++;
}
elseif(strpos($result,'hr_conditions_condition_lang_attr:')!==false){
$hr_conditions_condition_lang_attr[$hr_conditions_condition_lang_attr_loop]=$result;
$hr_conditions_condition_lang_attr[$hr_conditions_condition_lang_attr_loop]=str_replace('hr_conditions_condition_lang_attr:',"",$hr_conditions_condition_lang_attr[$hr_conditions_condition_lang_attr_loop]);
$hr_conditions_condition_lang_attr_loop++;
}
elseif(strpos($result,'hr_provenance:')!==false){
$hr_provenance[$hr_provenance_loop]=$result;
$hr_provenance[$hr_provenance_loop]=str_replace('hr_provenance:',"",$hr_provenance[$hr_provenance_loop]);
$hr_provenance_loop++;
}
elseif(strpos($result,'hr_provenance_lang_attr:')!==false){
$hr_provenance_lang_attr[$hr_provenance_lang_attr_loop]=$result;
$hr_provenance_lang_attr[$hr_provenance_lang_attr_loop]=str_replace('hr_provenance_lang_attr:',"",$hr_provenance_lang_attr[$hr_provenance_lang_attr_loop]);
$hr_provenance_lang_attr_loop++;
}
elseif(strpos($result,'hr_characters_heritageAssetType:')!==false){
$hr_characters_heritageAssetType[$hr_characters_heritageAssetType_loop]=$result;
$hr_characters_heritageAssetType[$hr_characters_heritageAssetType_loop]=str_replace('hr_characters_heritageAssetType:',"",$hr_characters_heritageAssetType[$hr_characters_heritageAssetType_loop]);
$hr_characters_heritageAssetType_loop++;
}
elseif(strpos($result,'hr_characters_heritageAssetType_lang_attr:')!==false){
$hr_characters_heritageAssetType_lang_attr[$hr_characters_heritageAssetType_lang_attr_loop]=$result;
$hr_characters_heritageAssetType_lang_attr[$hr_characters_heritageAssetType_lang_attr_loop]=str_replace('hr_characters_heritageAssetType_lang_attr:',"",$hr_characters_heritageAssetType_lang_attr[$hr_characters_heritageAssetType_lang_attr_loop]);
$hr_characters_heritageAssetType_lang_attr_loop++;
}
elseif(strpos($result,'hr_characters_heritageAssetType_namespace_attr:')!==false){
$hr_characters_heritageAssetType_namespace_attr[$hr_characters_heritageAssetType_namespace_attr_loop]=$result;
$hr_characters_heritageAssetType_namespace_attr[$hr_characters_heritageAssetType_namespace_attr_loop]=str_replace('hr_characters_heritageAssetType_namespace_attr:',"",$hr_characters_heritageAssetType_namespace_attr[$hr_characters_heritageAssetType_namespace_attr_loop]);
$hr_characters_heritageAssetType_namespace_attr_loop++;
}
elseif(strpos($result,'hr_characters_temporal_timespan_startdate:')!==false){
$hr_characters_temporal_timespan_startdate[$hr_characters_temporal_timespan_startdate_loop]=$result;
$hr_characters_temporal_timespan_startdate[$hr_characters_temporal_timespan_startdate_loop]=str_replace('hr_characters_temporal_timespan_startdate:',"",$hr_characters_temporal_timespan_startdate[$hr_characters_temporal_timespan_startdate_loop]);
$hr_characters_temporal_timespan_startdate_loop++;
}
elseif(strpos($result,'hr_characters_temporal_timespan_enddate:')!==false){
$hr_characters_temporal_timespan_enddate[$hr_characters_temporal_timespan_enddate_loop]=$result;
$hr_characters_temporal_timespan_enddate[$hr_characters_temporal_timespan_enddate_loop]=str_replace('hr_characters_temporal_timespan_enddate:',"",$hr_characters_temporal_timespan_enddate[$hr_characters_temporal_timespan_enddate_loop]);
$hr_characters_temporal_timespan_enddate_loop++;
}
elseif(strpos($result,'hr_characters_temporal_periodname:')!==false){
$hr_characters_temporal_periodname[$hr_characters_temporal_periodname_loop]=$result;
$hr_characters_temporal_periodname[$hr_characters_temporal_periodname_loop]=str_replace('hr_characters_temporal_periodname:',"",$hr_characters_temporal_periodname[$hr_characters_temporal_periodname_loop]);
$hr_characters_temporal_periodname_loop++;
}
elseif(strpos($result,'hr_characters_temporal_displaydate:')!==false){
$hr_characters_temporal_displaydate[$hr_characters_temporal_displaydate_loop]=$result;
$hr_characters_temporal_displaydate[$hr_characters_temporal_displaydate_loop]=str_replace('hr_characters_temporal_displaydate:',"",$hr_characters_temporal_displaydate[$hr_characters_temporal_displaydate_loop]);
$hr_characters_temporal_displaydate_loop++;
}
elseif(strpos($result,'hr_characters_materials:')!==false){
$hr_characters_materials[$hr_characters_materials_loop]=$result;
$hr_characters_materials[$hr_characters_materials_loop]=str_replace('hr_characters_materials:',"",$hr_characters_materials[$hr_characters_materials_loop]);
$hr_characters_materials_loop++;
}
elseif(strpos($result,'hr_characters_dimensions_measurementtype:')!==false){
$hr_characters_dimensions_measurementtype[$hr_characters_dimensions_measurementtype_loop]=$result;
$hr_characters_dimensions_measurementtype[$hr_characters_dimensions_measurementtype_loop]=str_replace('hr_characters_dimensions_measurementtype:',"",$hr_characters_dimensions_measurementtype[$hr_characters_dimensions_measurementtype_loop]);
$hr_characters_dimensions_measurementtype_loop++;
}
elseif(strpos($result,'hr_characters_dimensions_units:')!==false){
$hr_characters_dimensions_units[$hr_characters_dimensions_units_loop]=$result;
$hr_characters_dimensions_units[$hr_characters_dimensions_units_loop]=str_replace('hr_characters_dimensions_units:',"",$hr_characters_dimensions_units[$hr_characters_dimensions_units_loop]);
$hr_characters_dimensions_units_loop++;
}
elseif(strpos($result,'hr_characters_dimensions_scale:')!==false){
$hr_characters_dimensions_scale[$hr_characters_dimensions_scale_loop]=$result;
$hr_characters_dimensions_scale[$hr_characters_dimensions_scale_loop]=str_replace('hr_characters_dimensions_scale:',"",$hr_characters_dimensions_scale[$hr_characters_dimensions_scale_loop]);
$hr_characters_dimensions_scale_loop++;
}
elseif(strpos($result,'hr_characters_dimensions_value:')!==false){
$hr_characters_dimensions_value[$hr_characters_dimensions_value_loop]=$result;
$hr_characters_dimensions_value[$hr_characters_dimensions_value_loop]=str_replace('hr_characters_dimensions_value:',"",$hr_characters_dimensions_value[$hr_characters_dimensions_value_loop]);
$hr_characters_dimensions_value_loop++;
}
elseif(strpos($result,'hr_spatial_locationset_namedlocation:')!==false){
$hr_spatial_locationset_namedlocation[$hr_spatial_locationset_namedlocation_loop]=$result;
$hr_spatial_locationset_namedlocation[$hr_spatial_locationset_namedlocation_loop]=str_replace('hr_spatial_locationset_namedlocation:',"",$hr_spatial_locationset_namedlocation[$hr_spatial_locationset_namedlocation_loop]);
$hr_spatial_locationset_namedlocation_loop++;
}
elseif(strpos($result,'hr_spatial_locationset_namedlocation_lang_attr:')!==false){
$hr_spatial_locationset_namedlocation_lang_attr[$hr_spatial_locationset_namedlocation_lang_attr_loop]=$result;
$hr_spatial_locationset_namedlocation_lang_attr[$hr_spatial_locationset_namedlocation_lang_attr_loop]=str_replace('hr_spatial_locationset_namedlocation_lang_attr:',"",$hr_spatial_locationset_namedlocation_lang_attr[$hr_spatial_locationset_namedlocation_lang_attr_loop]);
$hr_spatial_locationset_namedlocation_lang_attr_loop++;
}
elseif(strpos($result,'hr_spatial_geometry_quickpoint_x:')!==false){
$hr_spatial_geometry_quickpoint_x[$hr_spatial_geometry_quickpoint_x_loop]=$result;
$hr_spatial_geometry_quickpoint_x[$hr_spatial_geometry_quickpoint_x_loop]=str_replace('hr_spatial_geometry_quickpoint_x:',"",$hr_spatial_geometry_quickpoint_x[$hr_spatial_geometry_quickpoint_x_loop]);
$hr_spatial_geometry_quickpoint_x_loop++;
}
elseif(strpos($result,'hr_spatial_geometry_quickpoint_z:')!==false){
$hr_spatial_geometry_quickpoint_z[$hr_spatial_geometry_quickpoint_z_loop]=$result;
$hr_spatial_geometry_quickpoint_z[$hr_spatial_geometry_quickpoint_z_loop]=str_replace('hr_spatial_geometry_quickpoint_z:',"",$hr_spatial_geometry_quickpoint_z[$hr_spatial_geometry_quickpoint_z_loop]);
$hr_spatial_geometry_quickpoint_z_loop++;
}
elseif(strpos($result,'hr_publicationstatement_publisher:')!==false){
$hr_publicationstatement_publisher[$hr_publicationstatement_publisher_loop]=$result;
$hr_publicationstatement_publisher[$hr_publicationstatement_publisher_loop]=str_replace('hr_publicationstatement_publisher:',"",$hr_publicationstatement_publisher[$hr_publicationstatement_publisher_loop]);
$hr_publicationstatement_publisher_loop++;
}
elseif(strpos($result,'hr_publicationstatement_place:')!==false){
$hr_publicationstatement_place[$hr_publicationstatement_place_loop]=$result;
$hr_publicationstatement_place[$hr_publicationstatement_place_loop]=str_replace('hr_publicationstatement_place:',"",$hr_publicationstatement_place[$hr_publicationstatement_place_loop]);
$hr_publicationstatement_place_loop++;
}
elseif(strpos($result,'hr_publicationstatement_date:')!==false){
$hr_publicationstatement_date[$hr_publicationstatement_date_loop]=$result;
$hr_publicationstatement_date[$hr_publicationstatement_date_loop]=str_replace('hr_publicationstatement_date:',"",$hr_publicationstatement_date[$hr_publicationstatement_date_loop]);
$hr_publicationstatement_date_loop++;
}
elseif(strpos($result,'hr_rights_copyrightCreditLine:')!==false){
$hr_rights_copyrightCreditLine[$hr_rights_copyrightCreditLine_loop]=$result;
$hr_rights_copyrightCreditLine[$hr_rights_copyrightCreditLine_loop]=str_replace('hr_rights_copyrightCreditLine:',"",$hr_rights_copyrightCreditLine[$hr_rights_copyrightCreditLine_loop]);
$hr_rights_copyrightCreditLine_loop++;
}
elseif(strpos($result,'hr_rights_accessRights:')!==false){
$hr_rights_accessRights[$hr_rights_accessRights_loop]=$result;
$hr_rights_accessRights[$hr_rights_accessRights_loop]=str_replace('hr_rights_accessRights:',"",$hr_rights_accessRights[$hr_rights_accessRights_loop]);
$hr_rights_accessRights_loop++;
}
elseif(strpos($result,'hr_rights_reproductionRights:')!==false){
$hr_rights_reproductionRights[$hr_rights_reproductionRights_loop]=$result;
$hr_rights_reproductionRights[$hr_rights_reproductionRights_loop]=str_replace('hr_rights_reproductionRights:',"",$hr_rights_reproductionRights[$hr_rights_reproductionRights_loop]);
$hr_rights_reproductionRights_loop++;
}
elseif(strpos($result,'hr_rights_licence:')!==false){
$hr_rights_licence[$hr_rights_licence_loop]=$result;
$hr_rights_licence[$hr_rights_licence_loop]=str_replace('hr_rights_licence:',"",$hr_rights_licence[$hr_rights_licence_loop]);
$hr_rights_licence_loop++;
}
elseif(strpos($result,'hr_rights_europeanaRights:')!==false){
$hr_rights_europeanaRights[$hr_rights_europeanaRights_loop]=$result;
$hr_rights_europeanaRights[$hr_rights_europeanaRights_loop]=str_replace('hr_rights_europeanaRights:',"",$hr_rights_europeanaRights[$hr_rights_europeanaRights_loop]);
$hr_rights_europeanaRights_loop++;
}
elseif(strpos($result,'hr_references_type:')!==false){
$hr_references_type[$hr_references_type_loop]=$result;
$hr_references_type[$hr_references_type_loop]=str_replace('hr_references_type:',"",$hr_references_type[$hr_references_type_loop]);
$hr_references_type_loop++;
}
elseif(strpos($result,'hr_references_publicationstatement_publisher:')!==false){
$hr_references_publicationstatement_publisher[$hr_references_publicationstatement_publisher_loop]=$result;
$hr_references_publicationstatement_publisher[$hr_references_publicationstatement_publisher_loop]=str_replace('hr_references_publicationstatement_publisher:',"",$hr_references_publicationstatement_publisher[$hr_references_publicationstatement_publisher_loop]);
$hr_references_publicationstatement_publisher_loop++;
}

elseif(strpos($result,'dig_recordinf_source:')!==false){
$dig_recordinf_source[$dig_recordinf_source_loop]=$result;
$dig_recordinf_source[$dig_recordinf_source_loop]=str_replace('hr_spatial_geometry_quickpoint_y:',"",$dig_recordinf_source[$dig_recordinf_source_loop]);
$dig_recordinf_source_loop++;
}
elseif(strpos($result,'dig_recordinf_country:')!==false){
$dig_recordinf_country[$dig_recordinf_country_loop]=$result;
$dig_recordinf_country[$dig_recordinf_country_loop]=str_replace('dig_recordinf_country:',"",$dig_recordinf_country[$dig_recordinf_country_loop]);
$dig_recordinf_country_loop++;
}
elseif(strpos($result,'dig_recordinf_creation_date:')!==false){
$dig_recordinf_creation_date[$dig_recordinf_creation_date_loop]=$result;
$dig_recordinf_creation_date[$dig_recordinf_creation_date_loop]=str_replace('dig_recordinf_creation_date:',"",$dig_recordinf_creation_date[$dig_recordinf_creation_date_loop]);
$dig_recordinf_creation_date_loop++;
}
elseif(strpos($result,'dig_recordinf_creation_contacts_name:')!==false){
$dig_recordinf_creation_contacts_name[$dig_recordinf_creation_contacts_name_loop]=$result;
$dig_recordinf_creation_contacts_name[$dig_recordinf_creation_contacts_name_loop]=str_replace('dig_recordinf_creation_contacts_name:',"",$dig_recordinf_creation_contacts_name[$dig_recordinf_creation_contacts_name_loop]);
$dig_recordinf_creation_contacts_name_loop++;
}
elseif(strpos($result,'dig_recordinf_creation_contacts_role:')!==false){
$dig_recordinf_creation_contacts_role[$dig_recordinf_creation_contacts_role_loop]=$result;
$dig_recordinf_creation_contacts_role[$dig_recordinf_creation_contacts_role_loop]=str_replace('dig_recordinf_creation_contacts_role:',"",$dig_recordinf_creation_contacts_role[$dig_recordinf_creation_contacts_role_loop]);
$dig_recordinf_creation_contacts_role_loop++;
}
elseif(strpos($result,'dig_recordinf_creation_contacts_org:')!==false){
$dig_recordinf_creation_contacts_org[$dig_recordinf_creation_contacts_org_loop]=$result;
$dig_recordinf_creation_contacts_org[$dig_recordinf_creation_contacts_org_loop]=str_replace('dig_recordinf_creation_contacts_org:',"",$dig_recordinf_creation_contacts_org[$dig_recordinf_creation_contacts_org_loop]);
$dig_recordinf_creation_contacts_org_loop++;
}
elseif(strpos($result,'dig_recordinf_update_date:')!==false){
$dig_recordinf_update_date[$dig_recordinf_update_date_loop]=$result;
$dig_recordinf_update_date[$dig_recordinf_update_date_loop]=str_replace('dig_recordinf_update_date:',"",$dig_recordinf_update_date[$dig_recordinf_update_date_loop]);
$dig_recordinf_update_date_loop++;
}
elseif(strpos($result,'dig_recordinf_lang:')!==false){
$dig_recordinf_lang[$dig_recordinf_lang_loop]=$result;
$dig_recordinf_lang[$dig_recordinf_lang_loop]=str_replace('dig_recordinf_lang:',"",$dig_recordinf_lang[$dig_recordinf_lang_loop]);
$dig_recordinf_lang_loop++;
}
elseif(strpos($result,'dig_recordinf_metadatarights:')!==false){
$dig_recordinf_metadatarights[$dig_recordinf_metadatarights_loop]=$result;
$dig_recordinf_metadatarights[$dig_recordinf_metadatarights_loop]=str_replace('dig_recordinf_metadatarights:',"",$dig_recordinf_metadatarights[$dig_recordinf_metadatarights_loop]);
$dig_recordinf_metadatarights_loop++;
}
elseif(strpos($result,'dig_appellation_name:')!==false){
$dig_appellation_name[$dig_appellation_name_loop]=$result;
$dig_appellation_name[$dig_appellation_name_loop]=str_replace('dig_appellation_name:',"",$dig_appellation_name[$dig_appellation_name_loop]);
$dig_appellation_name_loop++;
}
elseif(strpos($result,'dig_appellation_name_lang_attr:')!==false){
$dig_appellation_name_lang_attr[$dig_appellation_name_lang_attr_loop]=$result;
$dig_appellation_name_lang_attr[$dig_appellation_name_lang_attr_loop]=str_replace('dig_appellation_name_lang_attr:',"",$dig_appellation_name_lang_attr[$dig_appellation_name_lang_attr_loop]);
$dig_appellation_name_lang_attr_loop++;
}
elseif(strpos($result,'dig_appellation_name_pref_attr:')!==false){
$dig_appellation_name_pref_attr[$dig_appellation_name_pref_attr_loop]=$result;
$dig_appellation_name_pref_attr[$dig_appellation_name_pref_attr_loop]=str_replace('dig_appellation_name_pref_attr:',"",$dig_appellation_name_pref_attr[$dig_appellation_name_pref_attr_loop]);
$dig_appellation_name_pref_attr_loop++;
}
elseif(strpos($result,'dig_description:')!==false){
$dig_description[$dig_description_loop]=$result;
$dig_description[$dig_description_loop]=str_replace('dig_description:',"",$dig_description[$dig_description_loop]);
$dig_description_loop++;
}
elseif(strpos($result,'dig_description_lang_attr:')!==false){
$dig_description_lang_attr[$dig_description_lang_attr_loop]=$result;
$dig_description_lang_attr[$dig_description_lang_attr_loop]=str_replace('dig_description_lang_attr:',"",$dig_description_lang_attr[$dig_description_lang_attr_loop]);
$dig_description_lang_attr_loop++;
}
elseif(strpos($result,'dig_description_pref_attr:')!==false){
$dig_description_pref_attr[$dig_description_pref_attr_loop]=$result;
$dig_description_pref_attr[$dig_description_pref_attr_loop]=str_replace('dig_description_pref_attr:',"",$dig_description_pref_attr[$dig_description_pref_attr_loop]);
$dig_description_pref_attr_loop++;
}
elseif(strpos($result,'dig_description_type_attr:')!==false){
$dig_description_type_attr[$dig_description_type_attr_loop]=$result;
$dig_description_type_attr[$dig_description_type_attr_loop]=str_replace('dig_description_type_attr:',"",$dig_description_type_attr[$dig_description_type_attr_loop]);
$dig_description_type_attr_loop++;
}
elseif(strpos($result,'dig_actors_id:')!==false){
$dig_actors_id[$dig_actors_id_loop]=$result;
$dig_actors_id[$dig_actors_id_loop]=str_replace('dig_actors_id:',"",$dig_actors_id[$dig_actors_id_loop]);
$dig_actors_id_loop++;
}
elseif(strpos($result,'dig_actors_name:')!==false){
$dig_actors_name[$dig_actors_name_loop]=$result;
$dig_actors_name[$dig_actors_name_loop]=str_replace('dig_actors_name:',"",$dig_actors_name[$dig_actors_name_loop]);
$dig_actors_name_loop++;
}
elseif(strpos($result,'dig_actors_actorType:')!==false){
$dig_actors_actorType[$dig_actors_actorType_loop]=$result;
$dig_actors_actorType[$dig_actors_actorType_loop]=str_replace('dig_actors_actorType:',"",$dig_actors_actorType[$dig_actors_actorType_loop]);
$dig_actors_actorType_loop++;
}
elseif(strpos($result,'dig_actors_placeOfActivity:')!==false){
$dig_actors_placeOfActivity[$dig_actors_placeOfActivity_loop]=$result;
$dig_actors_placeOfActivity[$dig_actors_placeOfActivity_loop]=str_replace('dig_actors_placeOfActivity:',"",$dig_actors_placeOfActivity[$dig_actors_placeOfActivity_loop]);
$dig_actors_placeOfActivity_loop++;
}
elseif(strpos($result,'dig_type:')!==false){
$dig_type[$dig_type_loop]=$result;
$dig_type[$dig_type_loop]=str_replace('dig_type:',"",$dig_type[$dig_type_loop]);
$dig_type_loop++;
}
elseif(strpos($result,'dig_format:')!==false){
$dig_format[$dig_format_loop]=$result;
$dig_format[$dig_format_loop]=str_replace('dig_format:',"",$dig_format[$dig_format_loop]);
$dig_format_loop++;
}
elseif(strpos($result,'dig_format_lang_attr:')!==false){
$dig_format_lang_attr[$dig_format_lang_attr_loop]=$result;
$dig_format_lang_attr[$dig_format_lang_attr_loop]=str_replace('dig_format_lang_attr:',"",$dig_format_lang_attr[$dig_format_lang_attr_loop]);
$dig_format_lang_attr_loop++;
}
elseif(strpos($result,'dig_rights_copyrightCreditLine:')!==false){
$dig_rights_copyrightCreditLine[$dig_rights_copyrightCreditLine_loop]=$result;
$dig_rights_copyrightCreditLine[$dig_rights_copyrightCreditLine_loop]=str_replace('dig_rights_copyrightCreditLine:',"",$dig_rights_copyrightCreditLine[$dig_rights_copyrightCreditLine_loop]);
$dig_rights_copyrightCreditLine_loop++;
}
elseif(strpos($result,'dig_rights_accessRights:')!==false){
$dig_rights_accessRights[$dig_rights_accessRights_loop]=$result;
$dig_rights_accessRights[$dig_rights_accessRights_loop]=str_replace('dig_rights_accessRights:',"",$dig_rights_accessRights[$dig_rights_accessRights_loop]);
$dig_rights_accessRights_loop++;
}
elseif(strpos($result,'dig_rights_reproductionRights:')!==false){
$dig_rights_reproductionRights[$dig_rights_reproductionRights_loop]=$result;
$dig_rights_reproductionRights[$dig_rights_reproductionRights_loop]=str_replace('dig_rights_reproductionRights:',"",$dig_rights_reproductionRights[$dig_rights_reproductionRights_loop]);
$dig_rights_reproductionRights_loop++;
}
elseif(strpos($result,'dig_rights_licence:')!==false){
$dig_rights_licence[$dig_rights_licence_loop]=$result;
$dig_rights_licence[$dig_rights_licence_loop]=str_replace('dig_rights_licence:',"",$dig_rights_licence[$dig_rights_licence_loop]);
$dig_rights_licence_loop++;
}
elseif(strpos($result,'dig_rights_europeanaRights:')!==false){
$dig_rights_europeanaRights[$dig_rights_europeanaRights_loop]=$result;
$dig_rights_europeanaRights[$dig_rights_europeanaRights_loop]=str_replace('dig_rights_europeanaRights:',"",$dig_rights_europeanaRights[$dig_rights_europeanaRights_loop]);
$dig_rights_europeanaRights_loop++;
}
}
/* print_r($hr_characters_dimensions_measurementtype);
print_r($hr_characters_dimensions_units);
print_r($hr_characters_dimensions_scale);
print_r($hr_characters_dimensions_value); */
//print_r($hr_description);
?>


<div id="choose_section">
  <ul>
        <li class="first" ><a href="javascript:showonlyone('coll_inf');"  >Collection Information</a></li>
        <li><a  href="javascript:showonlyone('her_asset');" >Heritage Asset Ident.</a></li>
        <li><a href="javascript:showonlyone('digital_res');">Digital Resourse</a></li>
  </ul> 
</div>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<div class="newboxes" id="coll_inf">
  <div id="dsp">

  <?php

for($i=0;$i<count($coll_title);$i++){
	//echo count($coll_title);
?>
  <div class="collInf_Name" id="collInf_NameId">

				<p> Collection Name</p>
				<input type="text" name='ci_name[]' placeholder="collection name.." value="<?php echo$coll_title[$i];?>">
				<input type="text" name="CN_langauage[]" list="language" placeholder="language attribute" value="<?php echo$coll_title_lang_attr[$i];?>" >
				<input type="text" name="CN_id" list="" placeholder="*collection id" value="<?php echo $coll_id; ?>">
				<input type="text" name="CN_preferred[]" list="preferred" placeholder="preferred attribute" value="<?php echo$coll_title_pref_attr[$i];?>">
				<button type="button" onclick="javascript:multiplyNode('collInf_NameId','collInf_Name','dsp');">repeat element</button>
		
	</div>
<?php
}
?>	
	<div class="collInf_source" id="collInf_sourceId">
		
				<p> Source</p>
				<input type="text" name="collInf_source_source"   list='source'   placeholder="source"value="<?php echo$coll_source[0];?>">
				<input type="text" name="collInf_source_language" list="language" placeholder="language attribute">
			
	</div>
<?php
	//echo count($coll_contacts_name);
	if(empty($coll_contacts_name)){
?>
	<div class="collInf_contacts" id="collInf_contactsId">
		
				<p>Contacts </p>
				<input type="text" list="names" name="contacts_name[]" placeholder="name.." >
				<input type="text" list="roles" name="Contacts_role[]" placeholder="role.." >
				<input type="text" list="org"   name="Contacts_org[]" placeholder="organization.." >
				<button type="button" onclick="javascript:multiplyNode('collInf_contactsId','collInf_contacts','dsp');">repeat element</button>
			
	</div>
<?php
	}else{
	for($i=0;$i<count($coll_contacts_name);$i++){
?>
	
	
	<div class="collInf_contacts" id="collInf_contactsId">
		
				<p>Contacts </p>
				<input type="text" list="names" name="contacts_name[]" placeholder="name.." value="<?php echo$coll_contacts_name[$i];?>">
				<input type="text" list="roles" name="Contacts_role[]" placeholder="role.." value="<?php echo$coll_contacts_role[$i];?>">
				<input type="text" list="org"   name="Contacts_org[]" placeholder="organization.." value="<?php echo$coll_contacts_org_loop[$i];?>">
				<button type="button" onclick="javascript:multiplyNode('collInf_contactsId','collInf_contacts','dsp');">repeat element</button>
			
	</div>
<?php
	}
	}
	
?>
	<div class="collInf_rights" id="collInf_rightsId">
		
				<p>Rights </p>
				<input type="text" list="rights" 		  name="collInf_copyCreditLine"     placeholder="Copyright Credit Line.."value="<?php echo$coll_rights_copyrightCreditLine[0];?>">
				<input type="text" list="rights"		  name="collInf_AccessRights"       placeholder="Access Rights.."value="<?php echo$coll_rights_accessRights[0];?>">
				<input type="text" list="rights"		  name="collInf_ReproductionRights" placeholder="Reproduction Rights.."value="<?php echo$coll_rights_reproductionRights[0];?>">
				<input type="text" list="EuropeanaRights" name="collInf_EuroRights"         placeholder="Europeana Rights"value="<?php echo$coll_rights_europeanaRights[0];?>">     
			
	</div>
 <?php

for($i=0;$i<count($coll_lang);$i++){
	//echo count($coll_title);
?>
	<div class="collInf_language" id="collInf_languageId">
		
				<p>Languages </p>
				<input type="text" list="language" name="CI_lang[]" placeholder="Language.."value="<?php echo$coll_lang[$i];?>">
				<button type="button" onclick="javascript:multiplyNode('collInf_languageId','collInf_language','dsp');">repeat element</button>
			
	</div>
<?php
//print_r($coll_coverage_temporal_timespan_startDate);
}
?>
	<div class="collInf_createdOn" id="collInf_createdOnId">
		
				<p>Created On </p>
				<input type="text" list="modernDates" name="CI_createdOn" placeholder="created on.."value="<?php echo$coll_creation_createdOn[0];?>">
			
	</div>
  
	<div class="collInf_keywords" id="collInf_keywordsId">
		
				<p>keywords </p>
					<input type="text" list="keywords" name="CIKeywords" placeholder="keywords.."value="<?php echo htmlspecialchars($coll_keywords[0]);?>">
			
	</div>
	<div class="collInf_temporal" id="collInf_temporalId">
		
				<p>Temporal </p>
				<input type="text" list="ancientTime" name="collInf_startDate"  placeholder="start date.."value="<?php echo htmlspecialchars($coll_coverage_temporal_timespan_startDate[0]);?>">
				<input type="text" list="ancientTime" name="collInf_endDate"    placeholder="end date.."value="<?php echo htmlspecialchars($coll_coverage_temporal_timespan_endtDate[0]);?>">
				<input type="text" list="DispDate"    name="collInf_DispDate"   placeholder="Display date.."value="<?php echo htmlspecialchars($coll_coverage_temporal_displayDate[0]);?>">
				<input type="text" list="PerName"     name="collInf_PeriodName" placeholder="Period Name.."value="<?php echo htmlspecialchars($coll_coverage_temporal_periodName[0]);?>">
			
	</div>
    <div class="collInf_spatial" id="collInf_spatialId">
		
				<p>Spatial </p>
				<input type="text"  name="collInf_LocationSet"list="locationSet"  placeholder="location of collection.."value="<?php echo$coll_coverage_spatial_locationSet_namedLocation[0];?>">
				<input type="text"  name="collInf_SpatialReferenceSystem" list="" placeholder="reference system.."value="<?php echo$coll_coverage_spatial_geometry_spatialReferenceSystem[0];?>">
				<input type="text"  name="collInf_x" placeholder="latitude.."value="<?php echo$coll_coverage_spatial_geometry_quickpoint_x[0];?>">
				<input type="text"  name="collInf_y" placeholder="longitude.."value="<?php echo$coll_coverage_spatial_geometry_quickpoint_y[0];?>">
				<input type="text"  name="collInf_z" placeholder="altitude.."value="<?php echo$coll_coverage_spatial_geometry_quickpoint_z[0];?>">
			
	</div>
  </div>
</div>
  
<div  class="newboxes" id="her_asset" style="display:none;">
  <div id="dsp1">
	<div class="recordInformation" id="recordInformationId">
		
				<p> Record Information</p>
				
				<input type="text" name="RI_source" list="source" placeholder="source.." value="<?php echo$hr_recordinf_source[0];?>">
				<input type="text" name="RI_createdDate" list="modernDates" placeholder="date of creation.." value="<?php echo$hr_recordinf_creation_date[0];?>">
				<input type="text" name="RI_country" list="country" placeholder="country.." value="<?php echo$hr_recordinf_country[0];?>">
				<input type="text" name="RI_update" list="modernDates" placeholder="updated on.."value="<?php echo$hr_recordinf_update_date[0];?>">
				<input type="text" name="RI_lang" list="language" placeholder="language.."value="<?php echo$hr_recordinf_lang[0];?>">
				<input type="text" name="RI_metadataRights" list="rights" placeholder="metadata rights.."value="<?php echo$hr_recordinf_metadatarights[0];?>">
			
			
<?php
if(empty($hr_recordinf_creation_contacts_name)){

?>
		<div class="RI_contacts" id="RI_contactsId">
			<p3>Contacts<p3>
			
					<input type="text" list="contacts_name" name="RIcontacts_name[]" placeholder="name..">
					<input type="text" list="Contacts_role" name="RIContacts_role[]" placeholder="role..">
					<input type="text" list="Contacts_org"  name="RIContacts_org[]"  placeholder="organization..">
					<button type="button" onclick="javascript:multiplyNode('RI_contactsId','RI_contacts','recordInformationId');">repeat element</button>
				
		</div>
<?php
}else{
	for($i=0;$i<count($hr_recordinf_creation_contacts_name);$i++){
?>		
	<div class="RI_contacts" id="RI_contactsId">
			<p3>Contacts<p3>
			
					<input type="text" list="contacts_name" name="RIcontacts_name[]" placeholder="name.."value="<?php echo$hr_recordinf_creation_contacts_name[$i];?>">
					<input type="text" list="Contacts_role" name="RIContacts_role[]" placeholder="role.."value="<?php echo$hr_recordinf_creation_contacts_role[$i];?>">
					<input type="text" list="Contacts_org"  name="RIContacts_org[]"  placeholder="organization.."value="<?php echo$hr_recordinf_creation_contacts_org[$i];?>">
					<button type="button" onclick="javascript:multiplyNode('RI_contactsId','RI_contacts','recordInformationId');">repeat element</button>
				
	</div>
<?php
	}
}
?>	
	</div>
<?php
for($i=0;$i<count($hr_appellation_name);$i++){	
?>
	<div class="HerAssetAppellation" id="HerAssetAppellationId">
		
				<p> Appellation</p>
				<input type="text" name='HerAssetAppelationName[]' placeholder="name.."value="<?php echo$hr_appellation_name[$i];?>">
				<input type="text" name="HerAssetAppelationLang[]" list="language" placeholder="language.."value="<?php echo$hr_appellation_name_lang_attr[$i];?>">
				<input type="text" name="HerAssetAppelationPreffered[]" list="preferred" placeholder="preferred attribute.."value="<?php echo$hr_appellation_name_pref_attr[$i];?>">
				<!--to id tha dimiourgeitai automata-->
				<button type="button" onclick="javascript:multiplyNode('HerAssetAppellationId','HerAssetAppellation','dsp1');">repeat element</button>
			
	</div>
<?php
}

for ($i=0;$i<count($hr_description);$i++){
	
?>

	<div class="HerAssetDescription" id="HerAssetDescriptionId">
		
				<p> Description</p>
				<input type="text" name='HerAssetDescriptionElement[]' placeholder="description.." value='<?php echo htmlspecialchars($hr_description[$i]);?>'>
				<input type="text" name="HerAssetDescriptionLang[]" list="language" placeholder="language.."value="<?php echo$hr_description_lang_attr[$i];?>">
				<input type="text" name="HerAssetDescriptionPreffered[]" list="preferred" placeholder="preferred attribute.."value="<?php echo$hr_description_pref_attr[$i];?>">
				<input type="text" name="HerAssetDescriptionType[]" list="" placeholder="type.."value="<?php echo$hr_description_type_attr[$i];?>">
				
				<button type="button" onclick="javascript:multiplyNode('HerAssetDescriptionId','HerAssetDescription','dsp1');">repeat element</button>
			
	</div>
<?php
}
?>
	<div class="HerAssetGeneralType" id="HerAssetGeneralTypeId">
		
				<p> General Type</p>
				<input type="text" name='HerAsset_genType' list="general_type" placeholder="general type.."value="<?php echo$hr_generaltype[0];?>">	 
			
	</div>
<?php

if(empty($hr_actors_id)){
	
?>	
	<div class="HerAssetActors" id="HerAssetActorsId">
		
				<p> Actors</p>
				<input type="text" name='HerAssetActors_Id[]' list="" placeholder=" id..">
				<input type="text" name='HerAssetActors_Name[]' list="names" placeholder="name..">
				<input type="text" name='HerAssetActors_ActorType[]' list="roles" placeholder="actor type..">
				<input type="text" name='HerAssetActors_PlaceOfActivity[]' list="" placeholder="place of activity..">
				<button type="button" onclick="javascript:multiplyNode('HerAssetActorsId','HerAssetActors','dsp1');">repeat element</button>
			
	</div>
<?php
}else{
for ($i=0;$i<count($hr_actors_id);$i++){
?>
<div class="HerAssetActors" id="HerAssetActorsId">
		
				<p> Actors</p>
				<input type="text" name='HerAssetActors_Id[]' list="" placeholder=" id.."value="<?php echo$hr_actors_id[$i] ;?>">
				<input type="text" name='HerAssetActors_Name[]' list="names" placeholder="name.."value="<?php echo$hr_actors_name[$i] ;?>">
				<input type="text" name='HerAssetActors_ActorType[]' list="roles" placeholder="actor type.."value="<?php echo$hr_actors_actorType[$i] ;?>">
				<input type="text" name='HerAssetActors_PlaceOfActivity[]' list="" placeholder="place of activity.."value="<?php echo$hr_actors_placeOfActivity[$i] ;?>">
				<button type="button" onclick="javascript:multiplyNode('HerAssetActorsId','HerAssetActors','dsp1');">repeat element</button>
			
	</div>
<?php
}
}
?>
	<div class="HerAssetCondition" id="HerAssetConditionId">
		
				<p> Conditions </p>
				<input type="text" name='HerAssetCondition_condition' list="" placeholder=" condition.."value="<?php echo$hr_conditions_condition[0] ;?>">
				<input type="text" name='HerAssetCondition_Date' list="modernDates" placeholder="Date of condition..">
			
	</div>
	<div class="HerAssetProvenance" id="HerAssetProvenanceId">
		
				<p> Provenance </p>
				<input type="text" name='HerAssetProvenance_provenance' list="provenance" placeholder=" provenance.."value="<?php echo htmlspecialchars($hr_provenance[0]) ;?>">
				<input type="text" name='HerAssetProvenance_lang' list="language" placeholder=" language.."value="<?php echo$hr_provenance_lang_attr[0] ;?>">
			
	</div>
	<div class="HerAssetCharacters" id="HerAssetCharactersId">
		<p> Characters </p>

		<div class="HerAssetTypelvl_1" id="HerAssetTypeIdlvl_1">
			
					<p> Heritage Asset type first level</p>
					<input type="text" id="HerAssetType_typelvl_1" value="<?php echo htmlspecialchars($hr_characters_heritageAssetType[0]) ;?>" name='HerAssetType_typelvl_1' list="first-choice" placeholder="*type.." onChange="getsecondlevel('dic_relation.php?choice='+this.value)">
					<input type="text" name='HerAssetType_langlvl_1' value="<?php echo htmlspecialchars($hr_characters_heritageAssetType_lang_attr[0]) ;?>" list="language" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_1','HerAssetTypelvl_1','HerAssetCharactersId');">repeat element</button>-->
				
		</div>
		
		<div class="HerAssetTypelvl_2" id="HerAssetTypeIdlvl_2">
			
					<p> Heritage Asset type second level</p>
					<input id="" type="text" value="<?php echo htmlspecialchars($hr_characters_heritageAssetType[1]) ;?>" name='HerAssetType_typelvl_2'  placeholder="*type.." onChange="getthirdlevel('dic_relation2.php?choice2='+this.value'&choice1='document.getElementById('HerAssetTypeval').value)">
					<input type="text" name='HerAssetType_langlvl_2' list="language" value="<?php echo htmlspecialchars($hr_characters_heritageAssetType_lang_attr[1]) ;?>" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_2','HerAssetTypelvl_2','HerAssetCharactersId');">repeat element</button>-->
				
		</div>
		<div class="HerAssetTypelvl_3" id="HerAssetTypeIdlvl_3">
			
					<p> Heritage Asset type third level</p>
					<input type="text" value="<?php echo htmlspecialchars($hr_characters_heritageAssetType[2]) ;?>" name='HerAssetType_typelvl_3' list="" placeholder="*type..">
					<input type="text" name='HerAssetType_langlvl_3' list="language" value="<?php echo htmlspecialchars($hr_characters_heritageAssetType_lang_attr[2]) ;?>" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_3','HerAssetTypelvl_3','HerAssetCharactersId');">repeat element</button>-->
				
		</div>

		<div class="HerAssetTemporal" id="HerAssetTemporalId">
			
					<p> Temporal </p>
					<input type="text" list="ancientTime" name="HerAssetTemporal_startDate"  placeholder="start date.."value="<?php echo htmlspecialchars($hr_characters_temporal_timespan_startdate[0]) ;?>">
					<input type="text" list="ancientTime" name="HerAssetTemporal_endDate"    placeholder="end date.."value="<?php echo htmlspecialchars($hr_characters_temporal_timespan_enddate[0]) ;?>">
					<input type="text" list="DispDate"    name="HerAssetTemporal_DispDate"   placeholder="Display date.."value="<?php echo htmlspecialchars($hr_characters_temporal_displaydate[0]) ;?>">
					<input type="text" list="PerName"     name="HerAssetTemporal_PeriodName" placeholder="Period Name.."value="<?php echo htmlspecialchars($hr_characters_temporal_periodname[0]) ;?>">

		</div>
		<div class="HerAssetMaterials" id="HerAssetMaterialsId">
			
					<p> Materials </p>
					<input type="text" list="material" name="HerAssetMaterials_material" placeholder="materials.."value="<?php echo htmlspecialchars($hr_characters_materials[0]) ;?>">
					<input type="text" list="language"  name="HerAssetMaterials_lang"     placeholder="language..">
				
		</div>
<?php
for($i=0;$i<count($hr_characters_dimensions_measurementtype);$i++){
?>
		<div class="HerAssetDimensions" id="HerAssetDimensionsId">
			
					<p> Dimensions </p>
					<input type="text" list=""  name="HerAssetDimensions_measurementType[]" placeholder="measurement type.."value="<?php echo htmlspecialchars($hr_characters_dimensions_measurementtype[$i]) ;?>">
					<input type="text" list="units"  name="HerAssetDimensions_units[]"     placeholder="units.."value="<?php echo htmlspecialchars($hr_characters_dimensions_units[$i]) ;?>">
					<input type="text" list=""  name="HerAssetDimensions_scale[]"     placeholder="scale.."value="<?php echo htmlspecialchars($hr_characters_dimensions_scale[$i]) ;?>">
					<input type="text" list=""  name="HerAssetDimensions_value[]"     placeholder="value.."value="<?php echo htmlspecialchars($hr_characters_dimensions_value[$i]) ;?>">
					<button type="button" onclick="javascript:multiplyNode('HerAssetDimensionsId','HerAssetDimensions','HerAssetCharactersId');">repeat element</button>
				
		</div>
<?php
}
?>
	</div>
	<div class="HerAssetSpatial" id="HerAssetSpatialId">
		
				<p>Spatial </p>
				<input type="text"  name="HerAsset_LocationSet"list="locationSet"  placeholder="location of collection.."value="<?php echo htmlspecialchars($hr_spatial_locationset_namedlocation[0]) ;?>">
				<input type="text"  name="HerAsset_SpatialReferenceSystem" list="" placeholder="reference system..">
				<input type="text"  name="HerAsset_x" placeholder="latitude.."value="<?php echo htmlspecialchars($hr_spatial_geometry_quickpoint_x[0]) ;?>">
				<input type="text"  name="HerAsset_y" placeholder="longitude.."value="<?php echo htmlspecialchars($hr_spatial_geometry_quickpoint_y[0]) ;?>">
				<input type="text"  name="HerAsset_z" placeholder="altitude.."value="<?php echo htmlspecialchars($hr_spatial_geometry_quickpoint_z[0]) ;?>">
			
	</div>
	<div class="HerAssetPublicationStatement" id="HerAssetPublicationStatementId">
		
				<p>Publication Statement </p>
				<input type="text"  name="HerAssetPublicationStatement_publisher"list="locationSet"  placeholder="publisher.."value="<?php echo htmlspecialchars($hr_publicationstatement_publisher[0]) ;?>">
				<input type="text"  name="HerAssetPublicationStatement_place"    list="provenance"   placeholder="place.."value="<?php echo htmlspecialchars($hr_publicationstatement_place[0]) ;?>">
				<input type="text"  name="HerAssetPublicationStatement_date"     list="modernDates"  placeholder="date.."value="<?php echo htmlspecialchars($hr_publicationstatement_date[0]) ;?>">
			
	</div>
	<div class="HerAsset_rights" id="HerAsset_rightsId">
		
				<p>Rights </p>
				<input type="text" list="rights" 		  name="HerAsset_copyCreditLine"     placeholder="Copyright Credit Line.."value="<?php echo htmlspecialchars($hr_rights_copyrightCreditLine[0]) ;?>">
				<input type="text" list="rights"		  name="HerAsset_AccessRights"       placeholder="Access Rights.."value="<?php echo htmlspecialchars($hr_rights_accessRights[0]) ;?>">
				<input type="text" list="rights"		  name="HerAsset_ReproductionRights" placeholder="Reproduction Rights.."value="<?php echo htmlspecialchars($hr_rights_reproductionRights[0]) ;?>">
				<input type="text" list="EuropeanaRights" name="HerAsset_EuroRights"         placeholder="Europeana Rights"value="<?php echo htmlspecialchars($hr_rights_europeanaRights[0]) ;?>">     
			
	</div>
	<div class="HerAsset_references" id="HerAsset_referencesId">
		
				<p>References </p>
				<input type="text" list="" name="HerAsset_references_type"      placeholder="type.."value="<?php echo htmlspecialchars($hr_references_type[0]) ;?>">
				<input type="text" list="" name="HerAsset_references_publisher" placeholder="publisher.."value="<?php echo htmlspecialchars($hr_references_publicationstatement_publisher[0]) ;?>">  
			
	</div>
  </div>
</div>
  
   <div class="newboxes" id="digital_res" style="display:none;">
	<div id="dsp2">
		<div class="digital_res_recordInformation" id="digital_res_recordInformationId">
			
					<p> Record Information</p>
					
					<input type="text" name="digital_res_source" list="source" placeholder="source.."value="<?php echo htmlspecialchars($dig_recordinf_source[0]) ;?>">
					<input type="text" name="digital_res_createdDate" list="modernDates" placeholder="date of creation.."value="<?php echo htmlspecialchars($dig_recordinf_creation_date[0]) ;?>">
					<input type="text" name="digital_res_country" list="country" placeholder="country.."value="<?php echo htmlspecialchars($dig_recordinf_country[0]) ;?>">
					<input type="text" name="digital_res_update" list="modernDates" placeholder="updated on.."value="<?php echo htmlspecialchars($dig_recordinf_update_date[0]) ;?>">
					<input type="text" name="digital_res_lang" list="language" placeholder="language.."value="<?php echo htmlspecialchars($dig_recordinf_lang[0]) ;?>">
					<input type="text" name="digital_res_metadataRights" list="rights" placeholder="metadata rights.."value="<?php echo htmlspecialchars($dig_recordinf_metadatarights[0]) ;?>">

<?php
if(empty($dig_recordinf_creation_contacts_name)){

?>					
			<div class="digital_res_contacts" id="digital_res_contactsId">
				<p3>Contacts<p3>
					
							<input type="text" list="contacts_name" name="digital_res_name[]" placeholder="name..">
							<input type="text" list="Contacts_role" name="digital_res_role[]" placeholder="role..">
							<input type="text" list="Contacts_org"  name="digital_res_org[]"  placeholder="organization..">
							<button type="button" onclick="javascript:multiplyNode('digital_res_contactsId','digital_res_contacts','digital_res_recordInformationId');">repeat element</button>
						
			</div>
<?php
}else{
for($i=0;$i<count($dig_recordinf_creation_contacts_name);$i++){
?>
<div class="digital_res_contacts" id="digital_res_contactsId">
				<p3>Contacts<p3>
					
							<input type="text" list="contacts_name" name="digital_res_name[]" placeholder="name.."value="<?php echo htmlspecialchars($dig_recordinf_creation_contacts_name[$i]) ;?>">
							<input type="text" list="Contacts_role" name="digital_res_role[]" placeholder="role.."value="<?php echo htmlspecialchars($dig_recordinf_creation_contacts_role[$i]) ;?>">
							<input type="text" list="Contacts_org"  name="digital_res_org[]"  placeholder="organization.."value="<?php echo htmlspecialchars($dig_recordinf_creation_contacts_org[$i]) ;?>">
							<button type="button" onclick="javascript:multiplyNode('digital_res_contactsId','digital_res_contacts','digital_res_recordInformationId');">repeat element</button>
						
			</div>
<?php
}
}
?>
		</div>
<?php
for($i=0;$i<count($dig_appellation_name);$i++){
?>
		<div class="digital_res_Appellation" id="digital_res_AppellationId">
			
					<p> Appellation</p>
					<input type="text" name='digital_res_AppelationName[]'      placeholder="name.."value="<?php echo htmlspecialchars($dig_appellation_name[$i]) ;?>">
					<input type="text" name="digital_res_AppelationLang[]"      list="language" placeholder="language.."value="<?php echo htmlspecialchars($dig_appellation_name_lang_attr[$i]) ;?>">
					<input type="text" name="digital_res_AppelationPreffered[]" list="preferred" placeholder="preferred attribute.."value="<?php echo htmlspecialchars($dig_appellation_name_pref_attr[$i]) ;?>">
					<!--to id tha dimiourgeitai automata-->
					<button type="button" onclick="javascript:multiplyNode('digital_res_AppellationId','digital_res_Appellation','dsp2');">repeat element</button>
				
		</div>
<?php
}
if(empty($dig_description)){
?>
		<div class="digital_res_Description" id="digital_res_DescriptionId">
			
					<p> Description</p>
					<input type="text" name='digital_res_DescriptionElement[]'   placeholder="description..">
					<input type="text" name="digital_res_DescriptionLang[]"      list="language" placeholder="language..">
					<input type="text" name="digital_res_DescriptionPreffered[]" list="preferred" placeholder="preferred attribute..">
					<input type="text" name="digital_res_DescriptionType[]"      list="" placeholder="type..">
				
					<button type="button" onclick="javascript:multiplyNode('digital_res_DescriptionId','digital_res_Description','dsp2');">repeat element</button>
				
		</div>
<?php
}else{
for($i=0;$i<count($dig_description);$i++){
?>
	<div class="digital_res_Description" id="digital_res_DescriptionId">
			
					<p> Description</p>
					<input type="text" name='digital_res_DescriptionElement[]'   placeholder="description.."value="<?php echo htmlspecialchars($dig_description[$i]) ;?>">
					<input type="text" name="digital_res_DescriptionLang[]"      list="language" placeholder="language.."value="<?php echo htmlspecialchars($dig_description_lang_attr[$i]) ;?>">
					<input type="text" name="digital_res_DescriptionPreffered[]" list="preferred" placeholder="preferred attribute.."value="<?php echo htmlspecialchars($dig_description_pref_attr[$i]) ;?>">
					<input type="text" name="digital_res_DescriptionType[]"      list="" placeholder="type.."value="<?php echo htmlspecialchars($dig_description_type_attr[$i]) ;?>">
				
					<button type="button" onclick="javascript:multiplyNode('digital_res_DescriptionId','digital_res_Description','dsp2');">repeat element</button>
				
		</div>
<?php
}
}
if(empty($dig_actors_id)){
?>
		<div class="digital_res_Actors" id="digital_res_ActorsId">
			
					<p> Actors</p>
					<input type="text" name='digital_res_Actors_Id[]' list="" placeholder=" id..">
					<input type="text" name='digital_res_Actors_Name[]' list="names" placeholder="name..">
					<input type="text" name='digital_res_Actors_ActorType[]' list="roles" placeholder="actor type..">
					<input type="text" name='digital_res_Actors_PlaceOfActivity[]' list="" placeholder="place of activity..">
					<button type="button" onclick="javascript:multiplyNode('digital_res_ActorsId','digital_res_Actors','dsp2');">repeat element</button>
				
		</div>
<?php
}else{
	for($i=0;$i<count($dig_actors_id);$i++){
?>
		<div class="digital_res_Actors" id="digital_res_ActorsId">
			
					<p> Actors</p>
					<input type="text" name='digital_res_Actors_Id[]' list="" placeholder=" id.."value="<?php echo htmlspecialchars($dig_actors_id[$i]) ;?>">
					<input type="text" name='digital_res_Actors_Name[]' list="names" placeholder="name.."value="<?php echo htmlspecialchars($dig_actors_name[$i]) ;?>">
					<input type="text" name='digital_res_Actors_ActorType[]' list="roles" placeholder="actor type.."value="<?php echo htmlspecialchars($dig_actors_actorType[$i]) ;?>">
					<input type="text" name='digital_res_Actors_PlaceOfActivity[]' list="" placeholder="place of activity.."value="<?php echo htmlspecialchars($dig_actors_placeOfActivity[$i]) ;?>">
					<button type="button" onclick="javascript:multiplyNode('digital_res_ActorsId','digital_res_Actors','dsp2');">repeat element</button>
				
		</div>
<?php
	}
}
?>
		<div class="digital_res_Type" id="digital_res_TypeId">
			
					<p> Type</p>
					<input type="text" name='digital_res_TypeElement' list="digital_type" placeholder="digital type.."value="<?php echo htmlspecialchars($dig_type[0]) ;?>">	 
				
		</div>
		<div class="digital_res_Format" id="digital_res_FormatId">
			
					<p> Format</p>
					<input type="text" name='digital_res_FormatElement' list="" placeholder="format.."value="<?php echo htmlspecialchars($dig_format[0]) ;?>">	
					<input type="text" name='digital_res_FormatLang' list="language" placeholder="language.."value="<?php echo htmlspecialchars($dig_format_lang_attr[0]) ;?>">	
						<!-- na valw list me ta formats-->
				
		</div>
		
		<div class="digital_res_rights" id="digital_res_rightsId">
			
					<p>Rights </p>
					<input type="text" list="rights" 		  name="digital_res_copyCreditLine"     placeholder="Copyright Credit Line.."value="<?php echo htmlspecialchars($dig_rights_copyrightCreditLine[0]) ;?>">
					<input type="text" list="rights"		  name="digital_res_AccessRights"       placeholder="Access Rights.."value="<?php echo htmlspecialchars($dig_rights_accessRights[0]) ;?>">
					<input type="text" list="rights"		  name="digital_res_ReproductionRights" placeholder="Reproduction Rights.."value="<?php echo htmlspecialchars($dig_rights_reproductionRights[0]) ;?>">
					<input type="text" list="EuropeanaRights" name="digital_res_EuroRights"         placeholder="Europeana Rights"value="<?php echo htmlspecialchars($dig_rights_europeanaRights[0]) ;?>">     
				
		</div>	
	</div>
	</div>
  
  <input type="hidden" name='id' value="<?php echo $id; ?>" />
  <input type="submit" id="sf_submit" name="entry_submit" value="update entry">
</fieldset>
</form>
<?php

//print_r ($file_name); 
}  //end of else
?>

 
</div> <!--end of dplist-->
<?php
  
//check if the required fields in the form have been filled
if(isset($_POST['entry_submit']) && (isset ($_POST['ci_name']) && !empty($_POST['ci_name'])) 
&&(isset ($_POST['CN_id']) && !empty($_POST['CN_id']))
&&(isset ($_POST['HerAssetAppelationName']) && !empty($_POST['HerAssetAppelationName']))
&&(isset ($_POST['digital_res_AppelationName']) && !empty($_POST['digital_res_AppelationName']))
&&(isset ($_POST['HerAssetType_typelvl_1']) && !empty($_POST['HerAssetType_typelvl_1'])) 
&&(isset ($_POST['HerAssetType_typelvl_2']) && !empty($_POST['HerAssetType_typelvl_2']))
&&(isset ($_POST['HerAssetType_typelvl_3']) && !empty($_POST['HerAssetType_typelvl_3']))
){

//assigning the imput values from the form to variables to be used at the xquery

//collection information
for($i=0;$i<count($_POST['ci_name']);$i++){
$ci_name[$i]=str_replace('&',"&amp;",$_POST['ci_name'][$i]);
$CN_langauage[$i]=$_POST['CN_langauage'][$i];
$CN_preferred[$i]=$_POST['CN_preferred'][$i];
}
$CN_id=$_POST['CN_id'];
$collInf_source_source=str_replace('&',"&amp;",$_POST['collInf_source_source']);
$collInf_source_language=$_POST['collInf_source_language'];

for($i=0;$i<count($_POST['contacts_name']);$i++){
$contacts_name[$i]=str_replace('&',"&amp;",$_POST['contacts_name'][$i]);
$Contacts_role[$i]=str_replace('&',"&amp;",$_POST['Contacts_role'][$i]);
$Contacts_org[$i]=str_replace('&',"&amp;",$_POST['Contacts_org'][$i]);
}
$collInf_copyCreditLine=str_replace('&',"&amp;",$_POST['collInf_copyCreditLine']);
$collInf_AccessRights=str_replace('&',"&amp;",$_POST['collInf_AccessRights']);
$collInf_ReproductionRights=str_replace('&',"&amp;",$_POST['collInf_ReproductionRights']);
$collInf_EuroRights=str_replace('&',"&amp;",$_POST['collInf_EuroRights']);

for($i=0;$i<count($_POST['CI_lang']);$i++){
$CI_lang[$i]=$_POST['CI_lang'][$i];
}
$CI_createdOn=$_POST['CI_createdOn'];
$CIKeywords=str_replace('&',"&amp;",$_POST['CIKeywords']);
$collInf_startDate=$_POST['collInf_startDate'];
$collInf_endDate=$_POST['collInf_endDate'];
$collInf_DispDate=str_replace('&',"&amp;",$_POST['collInf_DispDate']);
$collInf_PeriodName=str_replace('&',"&amp;",$_POST['collInf_PeriodName']);
$collInf_LocationSet=str_replace('&',"&amp;",$_POST['collInf_LocationSet']);
$collInf_SpatialReferenceSystem=$_POST['collInf_SpatialReferenceSystem'];
$collInf_x=$_POST['collInf_x'];
$collInf_y=$_POST['collInf_y'];
$collInf_z=$_POST['collInf_z'];
//heritage asset identification
$RI_source=$_POST['RI_source'];
$RI_createdDate=$_POST['RI_createdDate'];
$RI_country=$_POST['RI_country'];
$RI_update=$_POST['RI_update'];
$RI_lang=$_POST['RI_lang'];
$RI_metadataRights=str_replace('&',"&amp;",$_POST['RI_metadataRights']);

for($i=0;$i<count($_POST['RIcontacts_name']);$i++){
$RIcontacts_name[$i]=str_replace('&',"&amp;",$_POST['RIcontacts_name'][$i]);
$RIContacts_role[$i]=str_replace('&',"&amp;",$_POST['RIContacts_role'][$i]);
$RIContacts_org[$i]=str_replace('&',"&amp;",$_POST['RIContacts_org'][$i]);
}
for($i=0;$i<count($_POST['HerAssetAppelationName']);$i++){
$HerAssetAppelationName[$i]=str_replace('&',"&amp;",$_POST['HerAssetAppelationName'][$i]);
$HerAssetAppelationLang[$i]=str_replace('&',"&amp;",$_POST['HerAssetAppelationLang'][$i]);
$HerAssetAppelationPreffered[$i]=str_replace('&',"&amp;",$_POST['HerAssetAppelationPreffered'][$i]);
}
for($i=0;$i<count($_POST['HerAssetDescriptionElement']);$i++){
$HerAssetDescriptionElement[$i]=str_replace('&',"&amp;",$_POST['HerAssetDescriptionElement'][$i]);
$HerAssetDescriptionLang[$i]=str_replace('&',"&amp;",$_POST['HerAssetDescriptionLang'][$i]);
$HerAssetDescriptionPreffered[$i]=str_replace('&',"&amp;",$_POST['HerAssetDescriptionPreffered'][$i]);
$HerAssetDescriptionType[$i]=str_replace('&',"&amp;",$_POST['HerAssetDescriptionType'][$i]);
 }
$HerAsset_genType=$_POST['HerAsset_genType'];

for($i=0;$i<count($_POST['HerAssetActors_Id']);$i++){
$HerAssetActors_Id[$i]=$_POST['HerAssetActors_Id'][$i];
$HerAssetActors_Name[$i]=str_replace('&',"&amp;",$_POST['HerAssetActors_Name'][$i]);
$HerAssetActors_ActorType[$i]=str_replace('&',"&amp;",$_POST['HerAssetActors_ActorType'][$i]);
$HerAssetActors_PlaceOfActivity[$i]=str_replace('&',"&amp;",$_POST['HerAssetActors_PlaceOfActivity'][$i]);
}
$HerAssetCondition_condition=$_POST['HerAssetCondition_condition'];
$HerAssetCondition_Date=$_POST['HerAssetCondition_Date'];
$HerAssetProvenance_provenance=str_replace('&',"&amp;",$_POST['HerAssetProvenance_provenance']);
$HerAssetProvenance_lang=$_POST['HerAssetProvenance_lang'];

//hr_type new and get the id
$hrasset_lvl1=$_POST['HerAssetType_typelvl_1'];
$hrasset_lvl2=$_POST['HerAssetType_typelvl_2'];
$hrasset_lvl3=$_POST['HerAssetType_typelvl_3'];
$hrasset_lvl1_lang=$_POST['HerAssetType_langlvl_1'];
$hrasset_lvl2_lang=$_POST['HerAssetType_langlvl_2'];
$hrasset_lvl3_lang=$_POST['HerAssetType_langlvl_3']; 

$conn_dic_id = new \ExistDB\Client($connConfig);
$get_dic_id = <<<EOXQL
              xquery version "3.1";
declare default element namespace "https://www.w3schools.com";
declare function local:assign(\$str,\$po)
      {
   for \$i in \$po
   return concat(\$str,\$i)
};
for \$a in collection('/vases/dictionary')/vase
return(
if((\$a/vase_name=\$hrasset_lvl1) and (\$a/type/text()[normalize-space()]=\$hrasset_lvl2) and (\$a/type/type_1/text()[normalize-space()])=\$hrasset_lvl3) then(

data(\$a/id)
)else()
)
EOXQL;
$stmtdic_id = $conn_dic_id->prepareQuery($get_dic_id);
$stmtdic_id->bindVariable('hrasset_lvl1', $hrasset_lvl1);
$stmtdic_id->bindVariable('hrasset_lvl2', $hrasset_lvl2);
$stmtdic_id->bindVariable('hrasset_lvl3', $hrasset_lvl3);
$dic_id_result_all=$stmtdic_id->execute();
$dic_id_results_urefined = $dic_id_result_all->getAllResults();
$dic_id_results = array_unique($dic_id_results_urefined);
$dic_id=implode("",$dic_id_results);
//end of getting the dictionary id

$HerAssetTemporal_startDate=$_POST['HerAssetTemporal_startDate'];
$HerAssetTemporal_endDate=$_POST['HerAssetTemporal_endDate'];
$HerAssetTemporal_DispDate=str_replace('&',"&amp;",$_POST['HerAssetTemporal_DispDate']);
$HerAssetTemporal_PeriodName=str_replace('&',"&amp;",$_POST['HerAssetTemporal_PeriodName']);
$HerAssetMaterials_material=str_replace('&',"&amp;",$_POST['HerAssetMaterials_material']);
$HerAssetMaterials_lang=$_POST['HerAssetMaterials_lang'];

for($i=0;$i<count($_POST['HerAssetDimensions_measurementType']);$i++){
$HerAssetDimensions_measurementType[$i]=$_POST['HerAssetDimensions_measurementType'][$i];
$HerAssetDimensions_units[$i]=$_POST['HerAssetDimensions_units'][$i];
$HerAssetDimensions_scale[$i]=$_POST['HerAssetDimensions_scale'][$i];
$HerAssetDimensions_value[$i]=$_POST['HerAssetDimensions_value'][$i];
 }
$HerAsset_LocationSet=$_POST['HerAsset_LocationSet'];
$HerAsset_SpatialReferenceSystem=$_POST['HerAsset_SpatialReferenceSystem'];
$HerAsset_x=$_POST['HerAsset_x'];
$HerAsset_y=$_POST['HerAsset_y'];
$HerAsset_z=$_POST['HerAsset_z'];
$HerAssetPublicationStatement_publisher=str_replace('&',"&amp;",$_POST['HerAssetPublicationStatement_publisher']);
$HerAssetPublicationStatement_place=$_POST['HerAssetPublicationStatement_place'];
$HerAssetPublicationStatement_date=$_POST['HerAssetPublicationStatement_date'];
$HerAsset_copyCreditLine=str_replace('&',"&amp;",$_POST['HerAsset_copyCreditLine']);
$HerAsset_AccessRights=str_replace('&',"&amp;",$_POST['HerAsset_AccessRights']);
$HerAsset_ReproductionRights=str_replace('&',"&amp;",$_POST['HerAsset_ReproductionRights']);
$HerAsset_EuroRights=str_replace('&',"&amp;",$_POST['HerAsset_EuroRights']);
$HerAsset_references_type=str_replace('&',"&amp;",$_POST['HerAsset_references_type']);
$HerAsset_references_publisher=str_replace('&',"&amp;",$_POST['HerAsset_references_publisher']);
//digital resource
echo $HerAsset_references_publisher;

$digital_res_source=str_replace('&',"&amp;",$_POST['digital_res_source']);
$digital_res_createdDate=$_POST['digital_res_createdDate'];
$digital_res_country=$_POST['digital_res_country'];
$digital_res_update=$_POST['digital_res_update'];
$digital_res_lang=$_POST['digital_res_lang'];
$digital_res_metadataRights=str_replace('&',"&amp;",$_POST['digital_res_metadataRights']);
for($i=0;$i<count($_POST['digital_res_name']);$i++){
$digital_res_name[$i]=str_replace('&',"&amp;",$_POST['digital_res_name'][$i]);
$digital_res_role[$i]=str_replace('&',"&amp;",$_POST['digital_res_role'][$i]);
$digital_res_org[$i]=str_replace('&',"&amp;",$_POST['digital_res_org'][$i]);
 }
for($i=0;$i<count($_POST['digital_res_AppelationName']);$i++){
$digital_res_AppelationName[$i]=str_replace('&',"&amp;",$_POST['digital_res_AppelationName'][$i]);
$digital_res_AppelationLang[$i]=str_replace('&',"&amp;",$_POST['digital_res_AppelationLang'][$i]);
$digital_res_AppelationPreffered[$i]=str_replace('&',"&amp;",$_POST['digital_res_AppelationPreffered'][$i]);
}
for($i=0;$i<count($_POST['digital_res_DescriptionElement']);$i++){
$digital_res_DescriptionElement[$i]=str_replace('&',"&amp;",$_POST['digital_res_DescriptionElement'][$i]);
$digital_res_DescriptionLang[$i]=$_POST['digital_res_DescriptionLang'][$i];
$digital_res_DescriptionPreffered[$i]=$_POST['digital_res_DescriptionPreffered'][$i];
$digital_res_DescriptionType[$i]=$_POST['digital_res_DescriptionType'][$i];
}
for($i=0;$i<count($_POST['digital_res_Actors_Id']);$i++){
$digital_res_Actors_Id[$i]=str_replace('&',"&amp;",$_POST['digital_res_Actors_Id'][$i]);
$digital_res_Actors_Name[$i]=str_replace('&',"&amp;",$_POST['digital_res_Actors_Name'][$i]);
$digital_res_Actors_ActorType[$i]=str_replace('&',"&amp;",$_POST['digital_res_Actors_ActorType'][$i]);
$digital_res_Actors_PlaceOfActivity[$i]=str_replace('&',"&amp;",$_POST['digital_res_Actors_PlaceOfActivity'][$i]);
}
$digital_res_TypeElement=$_POST['digital_res_TypeElement'];
$digital_res_FormatElement=$_POST['digital_res_FormatElement'];
$digital_res_FormatLang=$_POST['digital_res_FormatLang'];

$digital_res_copyCreditLine=str_replace('&',"&amp;",$_POST['digital_res_copyCreditLine']);
$digital_res_AccessRights=str_replace('&',"&amp;",$_POST['digital_res_AccessRights']);
$digital_res_ReproductionRights=str_replace('&',"&amp;",$_POST['digital_res_ReproductionRights']);
$digital_res_EuroRights=str_replace('&',"&amp;",$_POST['digital_res_EuroRights']);

if(isset($dic_id) && !empty($dic_id)){

$conn1 = new \ExistDB\Client($connConfig);
$create_entry_xql = <<<EOXQL
              xquery version "3.1";

declare default element namespace "http://www.carare.eu/carareSchema";
import module namespace xmldb="http://exist-db.org/xquery/xmldb";

(:~creation of a new vase entry :)
let \$rsl :=(
document{
    
	element carareWrap{
    element carare{attribute id {\$carare_id},
					element collectionInformation{
								element id{\$CN_id},
				
				for \$i in 1 to count(\$ci_name)
				return(
				element title{attribute preferred {\$CN_preferred[\$i]},attribute lang {\$CN_langauage[\$i]},
				\$ci_name[\$i]}),
				
				
				element source{attribute lang {\$collInf_source_language},\$collInf_source_source},
				
				for \$i in 1 to count(\$contacts_name)
				return(
				element contacts{
					element name{\$contacts_name[\$i]},
					element role{\$Contacts_role[\$i]},
					element organization{\$Contacts_org[\$i]}
				}),
				element rights{
					element copyrightCreditLine{\$collInf_copyCreditLine},
					element accessRights{\$collInf_AccessRights},
					element reproductionRights{\$collInf_ReproductionRights},
					element europeanaRights{\$collInf_EuroRights}	
				},
				
				for \$i in 1 to count(\$CI_lang)
				return(
				element language{\$CI_lang[\$i]}),
				element creation{
					element createdOn{\$CI_createdOn}
				},
				element keywords{\$CIKeywords},
				element coverage{
					element temporal{
						element timeSpan{
							element startDate{\$collInf_startDate},
							element endDate{\$collInf_endDate}
						},
						element periodName{\$collInf_PeriodName},
						element displayDate{\$collInf_DispDate}
					},
					element spatial{
						element locationSet{
							element namedLocation{\$collInf_LocationSet}
						},
						element geometry{
							element spatialReferenceSystem{\$collInf_SpatialReferenceSystem},
							element quickpoint{
								element x{\$collInf_x},
								element y{\$collInf_y},
								element z{\$collInf_z}
							}
						}
					}
				}
				
			},
			(:~start of heritage asset identification element:)
			element heritageAssetIdentification{
				element recordInformation{
					element id{\$RI_id},
					element source{\$RI_source},
					element country{\$RI_country},
					element creation{
						element date{\$RI_createdDate},
						
						for \$i in 1 to count(\$RIcontacts_name)
				return(
						element contacts{
							element name{\$RIcontacts_name[\$i]},
							element role{\$RIContacts_role[\$i]},
							element organization{\$RIContacts_org[\$i]}
						})
					},
					element update{
						element date{\$RI_update}
					},
					element language{\$RI_lang},
					element metadataRights{\$RI_metadataRights}
				},
				
				element appellation{
					
					for \$i in 1 to count(\$HerAssetAppelationName)
						return(
					element name{attribute preferred{\$HerAssetAppelationPreffered[\$i]},attribute lang{\$HerAssetAppelationLang[\$i]},
					\$HerAssetAppelationName[\$i]					
					}),
					element id{\$RI_id}
				},
				
				for \$i in 1 to count(\$HerAssetDescriptionElement)
						return(
				element description{attribute lang{\$HerAssetDescriptionLang[\$i]},
				attribute preferred {\$HerAssetDescriptionPreffered[\$i]},
				attribute type{\$HerAssetDescriptionType[\$i]}, 
				\$HerAssetDescriptionElement[\$i]
				}),
				element generalType{\$HerAsset_genType},
				
				for \$i in 1 to count(\$HerAssetActors_Id)
						return(
				element actors{
					element id{\$HerAssetActors_Id[\$i]},
					element name{\$HerAssetActors_Name[\$i]},
					element actorType{\$HerAssetActors_ActorType[\$i]},
					element placeOfActivity{\$HerAssetActors_PlaceOfActivity[\$i]}
				}),
				element conditions{
					element condition{\$HerAssetCondition_condition},
					element conditionDate{\$HerAssetCondition_Date}
				},
				element provenance{attribute lang{\$HerAssetProvenance_lang}, \$HerAssetProvenance_provenance},
				element characters{
					

					element heritageAssetType{attribute lang{\$HerAssetType_langlvl_1},attribute term{"1"},attribute namespace{\$dic_id}, \$HerAssetType_typelvl_1},
					element heritageAssetType{attribute lang{\$HerAssetType_langlvl_2},attribute term{"2"},attribute namespace{\$dic_id}, \$HerAssetType_typelvl_2},
					element heritageAssetType{attribute lang{\$HerAssetType_langlvl_3},attribute term{"3"},attribute namespace{\$dic_id}, \$HerAssetType_typelvl_3},
					
					element temporal{
						element timeSpan{
							element startDate{\$HerAssetTemporal_startDate},
							element endDate{\$HerAssetTemporal_endDate}
						},
						element periodName{\$HerAssetTemporal_PeriodName},
						element displayDate{\$HerAssetTemporal_DispDate}
					},
					element materials{attribute lang{\$HerAssetMaterials_lang}, \$HerAssetMaterials_material},
					
					for \$i in 1 to count(\$HerAssetDimensions_measurementType)
						return(
	element dimensions{
		element measurementType{\$HerAssetDimensions_measurementType[\$i]},
		element units{\$HerAssetDimensions_units[\$i]},
		element scale{\$HerAssetDimensions_scale[\$i]},
		element value{\$HerAssetDimensions_value[\$i]}
	})
				},
				element spatial{
					element locationSet{
						element namedLocation{\$HerAsset_LocationSet}
					},
					element geometry{
						element spatialReferenceSystem{\$HerAsset_SpatialReferenceSystem},
						element quickpoint{
							element x{\$HerAsset_x},
							element y{\$HerAsset_y},
							element z{\$HerAsset_z}
						}
					}
				},
				element publicationStatement{
					element publisher{\$HerAssetPublicationStatement_publisher},
					element place{\$HerAssetPublicationStatement_place},
					element date{\$HerAssetPublicationStatement_date}
				},
				element rights{
					element copyrightCreditLine{\$HerAsset_copyCreditLine},
					element accessRights{\$HerAsset_AccessRights},
					element reproductionRights{\$HerAsset_ReproductionRights},
					element europeanaRights{\$HerAsset_EuroRights}	
				},
				element references{
					element type{\$HerAsset_references_type},
					element publicationStatement{
						element publisher{\$HerAsset_references_publisher}
					}
				}
			},
			(:~start of digital resource element element:)
			element digitalResource{
				element recordInformation{
					element id{\$digital_res_id},
					element source{\$digital_res_source},
					element country{\$digital_res_country},
					element creation{
						element date{\$digital_res_createdDate},
						
						for \$i in 1 to count(\$digital_res_name)
						return(
						element contacts{
							element name{\$digital_res_name[\$i]},
							element role{\$digital_res_role[\$i]},
							element organization{\$digital_res_org[\$i]}
						})
					},
					element update{
						element date{\$digital_res_update}
					},
					element language{\$digital_res_lang},
					element metadataRights{\$digital_res_metadataRights}
				},
				element appellation{
					
					for \$i in 1 to count(\$digital_res_AppelationName)
						return(
					element name{attribute lang{\$digital_res_AppelationLang[\$i]}, 
						attribute preferred{\$digital_res_AppelationPreffered[\$i]}, \$digital_res_AppelationName[\$i]}),
					element id{(:~tha ginetai automata:)}
				},
				
				for \$i in 1 to count(\$digital_res_DescriptionElement)
						return(
				element description{attribute lang{\$digital_res_DescriptionLang[\$i]}, 
					attribute preferred {\$digital_res_DescriptionPreffered[\$i]},
					attribute type{\$digital_res_DescriptionType[\$i]}, \$digital_res_DescriptionElement[\$i]
				}),
				
				for \$i in 1 to count(\$digital_res_Actors_Id)
						return(
				element actors{
					element id{\$digital_res_Actors_Id[\$i]},
					element name{\$digital_res_Actors_Name[\$i]},
					element actorType{\$digital_res_Actors_ActorType[\$i]},
					element placeOfActivity{\$digital_res_Actors_PlaceOfActivity[\$i]}
				}),
				element type{\$digital_res_TypeElement},
				element format{attribute lang{\$digital_res_FormatLang}, \$digital_res_FormatElement},
				element object{\$digital_res_objectURI},
				element isShownAt{\$digital_res_ShownAtURI},
				element rights{
					element copyrightCreditLine{\$digital_res_copyCreditLine},
					element accessRights{\$digital_res_AccessRights},
					element reproductionRights{\$digital_res_ReproductionRights},
					element europeanaRights{\$digital_res_EuroRights}	
				}
			}
		
		
  
}
}
}
)

(:~ store the new entry into the database :)

let \$login:= xmldb:login("/db","admin","welcome2AHK")
return
	xmldb:store(concat("/db/vases/entries/",\$usr_name),\$entry_name,\$rsl)
EOXQL;


$helping_variable = $conn1->prepareQuery($create_entry_xql);


$helping_variable->bindVariable('usr_name', $usr_name);
$helping_variable->bindVariable('entry_name', $entry_name);
$helping_variable->bindVariable('ci_name', $ci_name);
$helping_variable->bindVariable('CN_langauage', $CN_langauage);
$helping_variable->bindVariable('CN_preferred', $CN_preferred);
$helping_variable->bindVariable('carare_id', $id);
$helping_variable->bindVariable('CN_id', $CN_id);
$helping_variable->bindVariable('collInf_source_source', $collInf_source_source);
$helping_variable->bindVariable('collInf_source_language', $collInf_source_language);
$helping_variable->bindVariable('contacts_name', $contacts_name);
$helping_variable->bindVariable('Contacts_role', $Contacts_role);
$helping_variable->bindVariable('Contacts_org', $Contacts_org);
$helping_variable->bindVariable('collInf_copyCreditLine', $collInf_copyCreditLine);
$helping_variable->bindVariable('collInf_AccessRights', $collInf_AccessRights);
$helping_variable->bindVariable('collInf_ReproductionRights', $collInf_ReproductionRights);
$helping_variable->bindVariable('collInf_EuroRights', $collInf_EuroRights);
$helping_variable->bindVariable('CI_lang', $CI_lang);
$helping_variable->bindVariable('CI_createdOn', $CI_createdOn);
$helping_variable->bindVariable('CIKeywords', $CIKeywords);
$helping_variable->bindVariable('collInf_startDate', $collInf_startDate);
$helping_variable->bindVariable('collInf_endDate', $collInf_endDate);
$helping_variable->bindVariable('collInf_DispDate', $collInf_DispDate);
$helping_variable->bindVariable('collInf_PeriodName', $collInf_PeriodName);
$helping_variable->bindVariable('collInf_LocationSet', $collInf_LocationSet);
$helping_variable->bindVariable('collInf_SpatialReferenceSystem', $collInf_SpatialReferenceSystem);
$helping_variable->bindVariable('collInf_x', $collInf_x);
$helping_variable->bindVariable('collInf_y', $collInf_y);
$helping_variable->bindVariable('collInf_z', $collInf_z);
$helping_variable->bindVariable('RI_id', $id);
$helping_variable->bindVariable('RI_source', $RI_source);
$helping_variable->bindVariable('RI_createdDate', $RI_createdDate);
$helping_variable->bindVariable('RI_country', $RI_country);
$helping_variable->bindVariable('RI_update', $RI_update);
$helping_variable->bindVariable('RI_lang', $RI_lang);
$helping_variable->bindVariable('RI_metadataRights', $RI_metadataRights);
$helping_variable->bindVariable('RIcontacts_name', $RIcontacts_name);
$helping_variable->bindVariable('RIContacts_role', $RIContacts_role);
$helping_variable->bindVariable('RIContacts_org', $RIContacts_org);
$helping_variable->bindVariable('HerAssetAppelationName', $HerAssetAppelationName);
$helping_variable->bindVariable('HerAssetAppelationLang', $HerAssetAppelationLang);
$helping_variable->bindVariable('HerAssetAppelationPreffered', $HerAssetAppelationPreffered);
$helping_variable->bindVariable('HerAssetDescriptionElement', $HerAssetDescriptionElement);
$helping_variable->bindVariable('HerAssetDescriptionLang', $HerAssetDescriptionLang);
$helping_variable->bindVariable('HerAssetDescriptionPreffered', $HerAssetDescriptionPreffered);
$helping_variable->bindVariable('HerAssetDescriptionType', $HerAssetDescriptionType);
$helping_variable->bindVariable('HerAsset_genType', $HerAsset_genType);
$helping_variable->bindVariable('HerAssetActors_Id', $HerAssetActors_Id);
$helping_variable->bindVariable('HerAssetActors_Name', $HerAssetActors_Name);
$helping_variable->bindVariable('HerAssetActors_ActorType', $HerAssetActors_ActorType);
$helping_variable->bindVariable('HerAssetActors_PlaceOfActivity', $HerAssetActors_PlaceOfActivity);
$helping_variable->bindVariable('HerAssetCondition_condition', $HerAssetCondition_condition);
$helping_variable->bindVariable('HerAssetCondition_Date', $HerAssetCondition_Date);
$helping_variable->bindVariable('HerAssetProvenance_provenance', $HerAssetProvenance_provenance);
$helping_variable->bindVariable('HerAssetProvenance_lang', $HerAssetProvenance_lang);

$helping_variable->bindVariable('HerAssetType_typelvl_1', $hrasset_lvl1);
$helping_variable->bindVariable('HerAssetType_typelvl_2', $hrasset_lvl2);
$helping_variable->bindVariable('HerAssetType_typelvl_3', $hrasset_lvl3);
$helping_variable->bindVariable('HerAssetType_langlvl_1', $hrasset_lvl1_lang);
$helping_variable->bindVariable('HerAssetType_langlvl_2', $hrasset_lvl2_lang);
$helping_variable->bindVariable('HerAssetType_langlvl_3', $hrasset_lvl3_lang);
$helping_variable->bindVariable('dic_id', $dic_id);

$helping_variable->bindVariable('HerAssetTemporal_startDate', $HerAssetTemporal_startDate);
$helping_variable->bindVariable('HerAssetTemporal_endDate', $HerAssetTemporal_endDate);
$helping_variable->bindVariable('HerAssetTemporal_DispDate', $HerAssetTemporal_DispDate);
$helping_variable->bindVariable('HerAssetTemporal_PeriodName', $HerAssetTemporal_PeriodName);
$helping_variable->bindVariable('HerAssetMaterials_material', $HerAssetMaterials_material);
$helping_variable->bindVariable('HerAssetMaterials_lang', $HerAssetMaterials_lang);
$helping_variable->bindVariable('HerAssetDimensions_measurementType', $HerAssetDimensions_measurementType);
$helping_variable->bindVariable('HerAssetDimensions_units', $HerAssetDimensions_units);
$helping_variable->bindVariable('HerAssetDimensions_scale', $HerAssetDimensions_scale);
$helping_variable->bindVariable('HerAssetDimensions_value', $HerAssetDimensions_value);
$helping_variable->bindVariable('HerAsset_LocationSet', $HerAsset_LocationSet);
$helping_variable->bindVariable('HerAsset_SpatialReferenceSystem', $HerAsset_SpatialReferenceSystem);
$helping_variable->bindVariable('HerAsset_x', $HerAsset_x);
$helping_variable->bindVariable('HerAsset_y', $HerAsset_y);
$helping_variable->bindVariable('HerAsset_z', $HerAsset_z);
$helping_variable->bindVariable('HerAssetPublicationStatement_publisher', $HerAssetPublicationStatement_publisher);
$helping_variable->bindVariable('HerAssetPublicationStatement_place', $HerAssetPublicationStatement_place);
$helping_variable->bindVariable('HerAssetPublicationStatement_date', $HerAssetPublicationStatement_date);
$helping_variable->bindVariable('HerAsset_copyCreditLine', $HerAsset_copyCreditLine);
$helping_variable->bindVariable('HerAsset_AccessRights', $HerAsset_AccessRights);
$helping_variable->bindVariable('HerAsset_ReproductionRights', $HerAsset_ReproductionRights);
$helping_variable->bindVariable('HerAsset_EuroRights', $HerAsset_EuroRights);
$helping_variable->bindVariable('HerAsset_references_type', $HerAsset_references_type);
$helping_variable->bindVariable('HerAsset_references_publisher', $HerAsset_references_publisher);
$helping_variable->bindVariable('digital_res_id', $id);
$helping_variable->bindVariable('digital_res_source', $digital_res_source);
$helping_variable->bindVariable('digital_res_createdDate', $digital_res_createdDate);
$helping_variable->bindVariable('digital_res_country', $digital_res_country);
$helping_variable->bindVariable('digital_res_update', $digital_res_update);
$helping_variable->bindVariable('digital_res_lang', $digital_res_lang);
$helping_variable->bindVariable('digital_res_metadataRights', $digital_res_metadataRights);
$helping_variable->bindVariable('digital_res_name', $digital_res_name);
$helping_variable->bindVariable('digital_res_role', $digital_res_role);
$helping_variable->bindVariable('digital_res_org', $digital_res_org);
$helping_variable->bindVariable('digital_res_AppelationName', $digital_res_AppelationName);
$helping_variable->bindVariable('digital_res_AppelationLang', $digital_res_AppelationLang);
$helping_variable->bindVariable('digital_res_AppelationPreffered', $digital_res_AppelationPreffered);
$helping_variable->bindVariable('digital_res_DescriptionElement', $digital_res_DescriptionElement);
$helping_variable->bindVariable('digital_res_DescriptionLang', $digital_res_DescriptionLang);
$helping_variable->bindVariable('digital_res_DescriptionPreffered', $digital_res_DescriptionPreffered);
$helping_variable->bindVariable('digital_res_DescriptionType', $digital_res_DescriptionType);
$helping_variable->bindVariable('digital_res_Actors_Id', $digital_res_Actors_Id);
$helping_variable->bindVariable('digital_res_Actors_Name', $digital_res_Actors_Name);
$helping_variable->bindVariable('digital_res_Actors_ActorType', $digital_res_Actors_ActorType);
$helping_variable->bindVariable('digital_res_Actors_PlaceOfActivity', $digital_res_Actors_PlaceOfActivity);
$helping_variable->bindVariable('digital_res_TypeElement', $digital_res_TypeElement);
$helping_variable->bindVariable('digital_res_FormatElement', $digital_res_FormatElement);
$helping_variable->bindVariable('digital_res_FormatLang', $digital_res_FormatLang);
$helping_variable->bindVariable('digital_res_objectURI', $digital_res_objectURI);
$helping_variable->bindVariable('digital_res_ShownAtURI', $digital_res_ShownAtURI);
$helping_variable->bindVariable('digital_res_copyCreditLine', $digital_res_copyCreditLine);
$helping_variable->bindVariable('digital_res_AccessRights', $digital_res_AccessRights);
$helping_variable->bindVariable('digital_res_ReproductionRights', $digital_res_ReproductionRights);
$helping_variable->bindVariable('digital_res_EuroRights', $digital_res_EuroRights);


echo "vars binded";
$executing_var=$helping_variable->execute();
//$entry_maker = $executing_var->getAllResults();
echo "all good";
//execute the query to include the new values into the gather.xml
require_once("config.php");
$exec_gathering_script=REST_PATH . "/db/vases/entries/gatherV2.xql";
$execute_it=file_get_contents($exec_gathering_script);
?>
<!--after successfull incert, redirect to home page -->
<script type="text/javascript">
window.location = "my_coll.php" 
</script>
<?php

}else{
?>	
<div id="error_msg" ><?php	echo "You din't choose the heritage asset type correctly!";?></div>	
<?php
}	  
}else{
?>	
<div id="error_msg" ><?php	echo "you haven't filled some of the mandatory inputs";?></div>
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