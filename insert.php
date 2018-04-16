<?php

// initialize a session
session_start();
include 'lang_select.php';
$current_lang= $_SESSION['lang'];
$usr_name=$_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

<meta charset="UTF-8">
<title>Vases Database</title>
<!--<meta charset="iso-8859-1">-->
<link rel="stylesheet" href="/styles/layout.css" type="text/css">
<link rel='stylesheet' type='text/css' href='http://www.x3dom.org/download/x3dom.css'></link> 



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
    cln.setAttribute("id",variable1+i);
 
    parentNode.insertBefore(cln,x.nextSibling);
    
    
}


</script>
<script>
jQuery(document).ready(function() {
 jQuery("[required]").after("<span class='required'>*</span>");
});
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
$instructions="When uploading files choose all the files at once.You must have an '.x3d' file and at least one '.jpg' file.
The fields with the asterisk are mandatory. Also you have to submit a thumbnail.";
?>
<div class="row1  bara">

 <header id="header" class="  clear ">
  <nav>
      <ul>
        <li><a href="index.php" onclick="showonlyone('Home');">Home</a></li>
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
		
		<li ><a href="retrieval.php" target="_blank">3D object retrieval</a> </li>
		<li class="last" ><a>insert entry</a> 
			<ul>
				<li><a href="upload.php" >Upload</a></li>
				<li><a href="?language=gr">manually</a></li>
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
	$instructions="Κατά το ανέβασμα αρχείων επιλέξτε τα όλα μαζί. Πρέπει να υπάρχει ένα '.x3d' αρχείο και τουλάχιστον
	ένα '.jpg' αρχείο. Τα πεδία με τον αστερίσκο είναι υποχρεωτικά. Επίσης πρέπει να βάλετε και ένα thumbnail.";
?>
<div class="row1  bara">

 <header id="header" class="  clear ">
  <nav>
      <ul>
        <li><a href="index.php" onclick="showonlyone('Home');">αρχική</a></li>
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
		
		<li ><a href="retrieval.php" target="_blank">Ανάκτηση 3Δ αγγείων</a></li>
		<li class="last" ><a>δημιουργία αρχείου</a> 
			<ul>
				<li><a href="upload.php" >ανεβάστε</a></li>
				<li><a href="?language=gr">χειροκείνητα</a></li>
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

?>
  <div id="error_msg"> <?php echo $instructions; ?></div>
  <div id="dplist" style="overflow-y: auto;">

<?php
  

	include 'datalists.php';
	include 'hrlist.php';
?>

<div id="choose_section">
  <ul>
        <li class="first" ><a href="javascript:showonlyone('coll_inf');"  >Collection Information</a></li>
        <li><a  href="javascript:showonlyone('her_asset');" >Heritage Asset Ident.</a></li>
        <li><a href="javascript:showonlyone('digital_res');">Digital Resourse</a></li>
  </ul> 
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype = "multipart/form-data">
<fieldset>
<div class="newboxes" id="coll_inf">
  <div id="dsp">
	<div class="collInf_Name" id="collInf_NameId">
		
				<p> Collection Name</p>
				<input type="text" name='ci_name[]' placeholder="*collection name.." >
				<input type="text" name="CN_langauage[]" list="language" placeholder="language attribute">
				<input type="text" name="CN_id" list="" placeholder="*collection id" >
				<input type="text" name="CN_preferred[]" list="preferred" placeholder="preferred attribute">
				<button type="button" onclick="javascript:multiplyNode('collInf_NameId','collInf_Name','dsp');">repeat element</button>
			
	</div>
	<div class="collInf_source" id="collInf_sourceId">
		
				<p> Source</p>
				<input type="text" name="collInf_source_source"   list='source'   placeholder="source">
				<input type="text" name="collInf_source_language" list="language" placeholder="language attribute">
			
	</div>
	<div class="collInf_contacts" id="collInf_contactsId">
		
				<p>Contacts </p>
				<input type="text" list="names" name="contacts_name[]" placeholder="name..">
				<input type="text" list="roles" name="Contacts_role[]" placeholder="role..">
				<input type="text" list="org"   name="Contacts_org[]" placeholder="organization..">
				<button type="button" onclick="javascript:multiplyNode('collInf_contactsId','collInf_contacts','dsp');">repeat element</button>
			
	</div>
	<div class="collInf_rights" id="collInf_rightsId">
		
				<p>Rights </p>
				<input type="text" list="rights" 		  name="collInf_copyCreditLine"     placeholder="Copyright Credit Line..">
				<input type="text" list="rights"		  name="collInf_AccessRights"       placeholder="Access Rights..">
				<input type="text" list="rights"		  name="collInf_ReproductionRights" placeholder="Reproduction Rights..">
				<input type="text" list="EuropeanaRights" name="collInf_EuroRights"         placeholder="Europeana Rights">     
			
	</div>
	<div class="collInf_language" id="collInf_languageId">
		
				<p>Languages </p>
				<input type="text" list="language" name="CI_lang[]" placeholder="Language..">
				<button type="button" onclick="javascript:multiplyNode('collInf_languageId','collInf_language','dsp');">repeat element</button>
			
	</div>
	<div class="collInf_createdOn" id="collInf_createdOnId">
		
				<p>Created On </p>
				<input type="text" list="modernDates" name="CI_createdOn" placeholder="created on..">
			
	</div>
  
	<div class="collInf_keywords" id="collInf_keywordsId">
		
				<p>keywords </p>
					<input type="text" list="keywords" name="CIKeywords" placeholder="keywords..">
			
	</div>
	<div class="collInf_temporal" id="collInf_temporalId">
		
				<p>Temporal </p>
				<input type="text" list="ancientTime" name="collInf_startDate"  placeholder="start date..">
				<input type="text" list="ancientTime" name="collInf_endDate"    placeholder="end date..">
				<input type="text" list="DispDate"    name="collInf_DispDate"   placeholder="Display date..">
				<input type="text" list="PerName"     name="collInf_PeriodName" placeholder="Period Name..">
			
	</div>
    <div class="collInf_spatial" id="collInf_spatialId">
		
				<p>Spatial </p>
				<input type="text"  name="collInf_LocationSet"list="locationSet"  placeholder="location of collection..">
				<input type="text"  name="collInf_SpatialReferenceSystem" list="" placeholder="reference system..">
				<input type="text"  name="collInf_x" placeholder="latitude..">
				<input type="text"  name="collInf_y" placeholder="longitude..">
				<input type="text"  name="collInf_z" placeholder="altitude..">
			
	</div>
  </div>
</div>
  
<div  class="newboxes" id="her_asset" style="display:none;">
  <div id="dsp1">
	<div class="recordInformation" id="recordInformationId">
		
				<p> Record Information</p>
				<!--<input type="text" name='RI_id' placeholder="id..">-->
				<input type="text" name="RI_source" list="source" placeholder="source..">
				<input type="text" name="RI_createdDate" list="modernDates" placeholder="date of creation..">
				<input type="text" name="RI_country" list="country" placeholder="country..">
				<input type="text" name="RI_update" list="modernDates" placeholder="updated on..">
				<input type="text" name="RI_lang" list="language" placeholder="language..">
				<input type="text" name="RI_metadataRights" list="rights" placeholder="metadata rights..">
			
		<div class="RI_contacts" id="RI_contactsId">
			<p3>Contacts<p3>
			
					<input type="text" list="contacts_name" name="RIcontacts_name[]" placeholder="name..">
					<input type="text" list="Contacts_role" name="RIContacts_role[]" placeholder="role..">
					<input type="text" list="Contacts_org"  name="RIContacts_org[]"  placeholder="organization..">
					<button type="button" onclick="javascript:multiplyNode('RI_contactsId','RI_contacts','recordInformationId');">repeat element</button>
				
		</div>
	</div>
	
	<div class="HerAssetAppellation" id="HerAssetAppellationId">
		
				<p> Appellation</p>
				<input type="text" name='HerAssetAppelationName[]' placeholder="*name..">
				<input type="text" name="HerAssetAppelationLang[]" list="language" placeholder="language..">
				<input type="text" name="HerAssetAppelationPreffered[]" list="preferred" placeholder="preferred attribute..">
				<!--to id tha dimiourgeitai automata-->
				<button type="button" onclick="javascript:multiplyNode('HerAssetAppellationId','HerAssetAppellation','dsp1');">repeat element</button>
			
	</div>
	
	<div class="HerAssetDescription" id="HerAssetDescriptionId">
		
				<p> Description</p>
				<input type="text" name='HerAssetDescriptionElement[]' placeholder="description..">
				<input type="text" name="HerAssetDescriptionLang[]" list="language" placeholder="language..">
				<input type="text" name="HerAssetDescriptionPreffered[]" list="preferred" placeholder="preferred attribute..">
				<input type="text" name="HerAssetDescriptionType[]" list="" placeholder="type..">
				
				<button type="button" onclick="javascript:multiplyNode('HerAssetDescriptionId','HerAssetDescription','dsp1');">repeat element</button>
			
	</div>
	
	<div class="HerAssetGeneralType" id="HerAssetGeneralTypeId">
		
				<p> General Type</p>
				<input type="text" name='HerAsset_genType' list="general_type" placeholder="general type..">	 
			
	</div>
	
	<div class="HerAssetActors" id="HerAssetActorsId">
		
				<p> Actors</p>
				<input type="text" name='HerAssetActors_Id[]' list="" placeholder=" id..">
				<input type="text" name='HerAssetActors_Name[]' list="names" placeholder="name..">
				<input type="text" name='HerAssetActors_ActorType[]' list="roles" placeholder="actor type..">
				<input type="text" name='HerAssetActors_PlaceOfActivity[]' list="" placeholder="place of activity..">
				<button type="button" onclick="javascript:multiplyNode('HerAssetActorsId','HerAssetActors','dsp1');">repeat element</button>
			
	</div>
	<div class="HerAssetCondition" id="HerAssetConditionId">
		
				<p> Conditions </p>
				<input type="text" name='HerAssetCondition_condition' list="" placeholder=" condition..">
				<input type="text" name='HerAssetCondition_Date' list="modernDates" placeholder="Date of condition..">
			
	</div>
	<div class="HerAssetProvenance" id="HerAssetProvenanceId">
		
				<p> Provenance </p>
				<input type="text" name='HerAssetProvenance_provenance' list="provenance" placeholder=" provenance..">
				<input type="text" name='HerAssetProvenance_lang' list="language" placeholder=" language..">
			
	</div>
	<div class="HerAssetCharacters" id="HerAssetCharactersId">
		<p> Characters </p>
		<div class="HerAssetTypelvl_1" id="HerAssetTypeIdlvl_1">
			
					<p> Heritage Asset type first level</p>
					<input type="text" id="HerAssetType_typelvl_1" name='HerAssetType_typelvl_1' list="first-choice" placeholder="*type.." onChange="getsecondlevel('dic_relation.php?choice='+this.value)">
					<input type="text" name='HerAssetType_langlvl_1' list="language" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_1','HerAssetTypelvl_1','HerAssetCharactersId');">repeat element</button>-->
				
		</div>
		
		<div class="HerAssetTypelvl_2" id="HerAssetTypeIdlvl_2">
			
					<p> Heritage Asset type second level</p>
					<input id="" type="text" name='HerAssetType_typelvl_2'  placeholder="*type.." onChange="getthirdlevel('dic_relation2.php?choice2='+this.value'&choice1='document.getElementById('HerAssetTypeval').value)">
					<input type="text" name='HerAssetType_langlvl_2' list="language" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_2','HerAssetTypelvl_2','HerAssetCharactersId');">repeat element</button>-->
				
		</div>
		<div class="HerAssetTypelvl_3" id="HerAssetTypeIdlvl_3">
			
					<p> Heritage Asset type third level</p>
					<input type="text" name='HerAssetType_typelvl_3' list="" placeholder="*type..">
					<input type="text" name='HerAssetType_langlvl_3' list="language" placeholder=" language..">
					<!--<button type="button" onclick="javascript:multiplyNode('HerAssetTypeIdlvl_3','HerAssetTypelvl_3','HerAssetCharactersId');">repeat element</button>-->
				
		</div>
		<div class="HerAssetTemporal" id="HerAssetTemporalId">
			
					<p> Temporal </p>
					<input type="text" list="ancientTime" name="HerAssetTemporal_startDate"  placeholder="start date..">
					<input type="text" list="ancientTime" name="HerAssetTemporal_endDate"    placeholder="end date..">
					<input type="text" list="DispDate"    name="HerAssetTemporal_DispDate"   placeholder="Display date..">
					<input type="text" list="PerName"     name="HerAssetTemporal_PeriodName" placeholder="Period Name..">

		</div>
		<div class="HerAssetMaterials" id="HerAssetMaterialsId">
			
					<p> Materials </p>
					<input type="text" list="material" name="HerAssetMaterials_material" placeholder="materials..">
					<input type="text" list="language"  name="HerAssetMaterials_lang"     placeholder="language..">
				
		</div>
		<div class="HerAssetDimensions" id="HerAssetDimensionsId">
			
					<p> Dimensions </p>
					<input type="text" list=""  name="HerAssetDimensions_measurementType[]" placeholder="measurement type..">
					<input type="text" list="units"  name="HerAssetDimensions_units[]"     placeholder="units..">
					<input type="text" list=""  name="HerAssetDimensions_scale[]"     placeholder="scale..">
					<input type="text" list=""  name="HerAssetDimensions_value[]"     placeholder="value..">
					<button type="button" onclick="javascript:multiplyNode('HerAssetDimensionsId','HerAssetDimensions','HerAssetCharactersId');">repeat element</button>
				
		</div>
	</div>
	<div class="HerAssetSpatial" id="HerAssetSpatialId">
		
				<p>Spatial </p>
				<input type="text"  name="HerAsset_LocationSet"list="locationSet"  placeholder="location of collection..">
				<input type="text"  name="HerAsset_SpatialReferenceSystem" list="" placeholder="reference system..">
				<input type="text"  name="HerAsset_x" placeholder="latitude..">
				<input type="text"  name="HerAsset_y" placeholder="longitude..">
				<input type="text"  name="HerAsset_z" placeholder="altitude..">
			
	</div>
	<div class="HerAssetPublicationStatement" id="HerAssetPublicationStatementId">
		
				<p>Publication Statement </p>
				<input type="text"  name="HerAssetPublicationStatement_publisher"list="locationSet"  placeholder="publisher..">
				<input type="text"  name="HerAssetPublicationStatement_place"    list="provenance"   placeholder="place..">
				<input type="text"  name="HerAssetPublicationStatement_date"     list="modernDates"  placeholder="date..">
			
	</div>
	<div class="HerAsset_rights" id="HerAsset_rightsId">
		
				<p>Rights </p>
				<input type="text" list="rights" 		  name="HerAsset_copyCreditLine"     placeholder="Copyright Credit Line..">
				<input type="text" list="rights"		  name="HerAsset_AccessRights"       placeholder="Access Rights..">
				<input type="text" list="rights"		  name="HerAsset_ReproductionRights" placeholder="Reproduction Rights..">
				<input type="text" list="EuropeanaRights" name="HerAsset_EuroRights"         placeholder="Europeana Rights">     
			
	</div>
	<div class="HerAsset_references" id="HerAsset_referencesId">
		
				<p>References </p>
				<input type="text" list="" name="HerAsset_references_type"      placeholder="type..">
				<input type="text" list="" name="HerAsset_references_publisher" placeholder="publisher..">  
			
	</div>
  </div>
</div>
  
   <div class="newboxes" id="digital_res" style="display:none;">
	<div id="dsp2">
		<div class="digital_res_recordInformation" id="digital_res_recordInformationId">
			
					<p> Record Information</p>
					<!--<input type="text" name='digital_res_id' placeholder="id..">-->
					<input type="text" name="digital_res_source" list="source" placeholder="source..">
					<input type="text" name="digital_res_createdDate" list="modernDates" placeholder="date of creation..">
					<input type="text" name="digital_res_country" list="country" placeholder="country..">
					<input type="text" name="digital_res_update" list="modernDates" placeholder="updated on..">
					<input type="text" name="digital_res_lang" list="language" placeholder="language..">
					<input type="text" name="digital_res_metadataRights" list="rights" placeholder="metadata rights..">
				
			<div class="digital_res_contacts" id="digital_res_contactsId">
				<p3>Contacts<p3>
					
							<input type="text" list="contacts_name" name="digital_res_name[]" placeholder="name..">
							<input type="text" list="Contacts_role" name="digital_res_role[]" placeholder="role..">
							<input type="text" list="Contacts_org"  name="digital_res_org[]"  placeholder="organization..">
							<button type="button" onclick="javascript:multiplyNode('digital_res_contactsId','digital_res_contacts','digital_res_recordInformationId');">repeat element</button>
						
			</div>
		</div>
		<div class="digital_res_Appellation" id="digital_res_AppellationId">
			
					<p> Appellation</p>
					<input type="text" name='digital_res_AppelationName[]'      placeholder="*name..">
					<input type="text" name="digital_res_AppelationLang[]"      list="language" placeholder="language..">
					<input type="text" name="digital_res_AppelationPreffered[]" list="preferred" placeholder="preferred attribute..">
					<!--to id tha dimiourgeitai automata-->
					<button type="button" onclick="javascript:multiplyNode('digital_res_AppellationId','digital_res_Appellation','dsp2');">repeat element</button>
				
		</div>
		<div class="digital_res_Description" id="digital_res_DescriptionId">
			
					<p> Description</p>
					<input type="text" name='digital_res_DescriptionElement[]'   placeholder="description..">
					<input type="text" name="digital_res_DescriptionLang[]"      list="language" placeholder="language..">
					<input type="text" name="digital_res_DescriptionPreffered[]" list="preferred" placeholder="preferred attribute..">
					<input type="text" name="digital_res_DescriptionType[]"      list="" placeholder="type..">
				
					<button type="button" onclick="javascript:multiplyNode('digital_res_DescriptionId','digital_res_Description','dsp2');">repeat element</button>
				
		</div>
		<div class="digital_res_Actors" id="digital_res_ActorsId">
			
					<p> Actors</p>
					<input type="text" name='digital_res_Actors_Id[]' list="" placeholder=" id..">
					<input type="text" name='digital_res_Actors_Name[]' list="names" placeholder="name..">
					<input type="text" name='digital_res_Actors_ActorType[]' list="roles" placeholder="actor type..">
					<input type="text" name='digital_res_Actors_PlaceOfActivity[]' list="" placeholder="place of activity..">
					<button type="button" onclick="javascript:multiplyNode('digital_res_ActorsId','digital_res_Actors','dsp2');">repeat element</button>
				
		</div>
		<div class="digital_res_Type" id="digital_res_TypeId">
			
					<p> Type</p>
					<input type="text" name='digital_res_TypeElement' list="digital_type" placeholder="digital type..">	 
				
		</div>
		<div class="digital_res_Format" id="digital_res_FormatId">
			
					<p> Format</p>
					<input type="text" name='digital_res_FormatElement' list="" placeholder="format..">	
					<input type="text" name='digital_res_FormatLang' list="language" placeholder="language..">	
						<!-- na valw list me ta formats-->
				
		</div>
		<div class="digital_res_rights" id="digital_res_rightsId">
			
					<p>Rights </p>
					<input type="text" list="rights" 		  name="digital_res_copyCreditLine"     placeholder="Copyright Credit Line..">
					<input type="text" list="rights"		  name="digital_res_AccessRights"       placeholder="Access Rights..">
					<input type="text" list="rights"		  name="digital_res_ReproductionRights" placeholder="Reproduction Rights..">
					<input type="text" list="EuropeanaRights" name="digital_res_EuroRights"         placeholder="Europeana Rights">     
				
		</div>	
	</div>
	</div>
  
  
 <!-- upload files  -->
  
  <div id="usr_form" style="height:12em;">
  
		<a>3D files</a>
		 <input type = 'file' name = 'file[]' id="file_submit" multiple />
		<a>Thumbnail</a>
		<input  type = 'file' name = 'screenshot' id="file_submit"  />		
 </div>
 
<!-- end of file upload -->
  <input type="submit" id="sf_submit" name="entry_submit" value="create entry">
</fieldset>
</form>
<?php
   } //end of else
?>

 
</div> <!--end of dplist-->
<?php

//check if the required fields in the form have been filled
if (!empty($_FILES['file']['name'])&& !empty($_FILES['screenshot']['name']) && isset($_POST['entry_submit']) 
	&&(isset ($_POST['ci_name']) && !empty($_POST['ci_name']))
	&&(isset ($_POST['CN_id']) && !empty($_POST['CN_id'])) 
	&&(isset ($_POST['HerAssetAppelationName']) && !empty($_POST['HerAssetAppelationName']))
	&&(isset ($_POST['digital_res_AppelationName']) && !empty($_POST['digital_res_AppelationName']))
	&&(isset ($_POST['HerAssetType_typelvl_1']) && !empty($_POST['HerAssetType_typelvl_1'])) 
	&&(isset ($_POST['HerAssetType_typelvl_2']) && !empty($_POST['HerAssetType_typelvl_2']))
	&&(isset ($_POST['HerAssetType_typelvl_3']) && !empty($_POST['HerAssetType_typelvl_3']))
	){
//assigning the imput values from the form to variables to be used at the xquery

//upload
$count=0;
//$dummy=$_SESSION['user_name'];
$path1 = getcwd()."/data/uploads/$usr_name";
$expensions= array("jpeg","jpg","png","gif","x3d"); 
$expensions1= array("jpeg","jpg","png","gif"); 
$files = glob($path1."/*" ,GLOB_ONLYDIR);
$filecount_unrefined = count($files) + 1;
$filecount=sprintf("%04d",$filecount_unrefined);
$upload_path=$path1."/entry".$filecount;
$error_var=0;
$errors=array();
$object_name=null;


$thumbnail=$_FILES['screenshot']['name']; 
$thumbnail_ext=strtolower(end(explode('.',$thumbnail)));
if(in_array($thumbnail_ext,$expensions1)=== false){
        $error_var=1;		
		$errors[0]= 'extension not allowed.';
      }else{$thumbnail_name="/data/uploads/$usr_name/entry$filecount/".$thumbnail;}
foreach($_FILES['file']['name'] as $filename){
	$file_size = $_FILES['file']['tmp_name']['size'];
	$file_ext=strtolower(end(explode('.',$filename)));
	if(in_array($file_ext,$expensions)=== false){
        $error_var=1;		
		$errors[]= 'extension not allowed.';
      }
	
	if($file_size > 83886080) {
         $errors[]='File size must be exactly 80 MB';
		 $error_var=1;		
      }
	
	//check for .x3d
	if($file_ext==="x3d"){
        $object_name="/data/uploads/$usr_name/entry$filecount/".$filename;		
      }
}


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


if(isset($dic_id) && !empty($dic_id)){

if (($error_var==0) && ($object_name!=null)){
mkdir($upload_path, 0777);
chmod($upload_path,0775);

foreach($_FILES['file']['name'] as $filename){
   if(isset($filename)){
      
      $file_name1 = $_FILES['file']['tmp_name'][$count];
      $file_size = $_FILES['file']['tmp_name']['size'];
      //$file_tmp = $_FILES['3dFile']['tmp_name'];
      $file_type = $_FILES['file']['tmp_name']['type'];
      $count++;
		 
         move_uploaded_file($file_name1,$upload_path."/$filename");
		 chmod($upload_path."/$filename",0775);
         
   }

    move_uploaded_file($_FILES['screenshot']['tmp_name'],$upload_path."/$thumbnail");
	chmod($upload_path."/$thumbnail",0775);
   }
}
 
if(empty($errors)){ 
$entry_name="entry".sprintf("%04d",$filecount);
$id="$usr_name-ent".$filecount;
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

//to be changed, now it's 3 diferrent unique fields
/* for($i=0;$i<count($_POST['HerAssetType_type']);$i++){
$HerAssetType_type[$i]=$_POST['HerAssetType_type'][$i];
$HerAssetType_lang[$i]=$_POST['HerAssetType_lang'][$i];
} */
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

$digital_res_objectURI=$object_name;
$digital_res_ShownAtURI=$_POST['digital_res_ShownAtURI'];

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
	xmldb:store(concat("/db/vases/entries/",\$usr_name),concat(\$entry_name,".xml"),\$rsl)
EOXQL;
$helping_variable = $conn1->prepareQuery($create_entry_xql);
foreach($_POST as $postVar){
	if(empty($postVar)){
		$postVar="";
	}	
}
$helping_variable->bindVariable('usr_name', $usr_name);
$helping_variable->bindVariable('entry_name', $entry_name);
$helping_variable->bindVariable('ci_name', $ci_name);
$helping_variable->bindVariable('carare_id', $id);
$helping_variable->bindVariable('CN_langauage', $CN_langauage);
$helping_variable->bindVariable('CN_preferred', $CN_preferred);
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
$helping_variable->bindVariable('digital_res_objectURI', $thumbnail_name);
$helping_variable->bindVariable('digital_res_ShownAtURI', $digital_res_objectURI);
$helping_variable->bindVariable('digital_res_copyCreditLine', $digital_res_copyCreditLine);
$helping_variable->bindVariable('digital_res_AccessRights', $digital_res_AccessRights);
$helping_variable->bindVariable('digital_res_ReproductionRights', $digital_res_ReproductionRights);
$helping_variable->bindVariable('digital_res_EuroRights', $digital_res_EuroRights);


echo "all good";
$executing_var=$helping_variable->execute();
//$entry_maker = $executing_var->getAllResults();

//execute the query to include the new values into the gather.xml
require_once("config.php");
$exec_gathering_script=REST_PATH . "/db/vases/entries/gatherV2.xql";
$execute_it=file_get_contents($exec_gathering_script);
?>
<!--after successfull incert, redirect to home page -->
<script type="text/javascript">
window.location = "index.php" 
</script>
<?php
}else{
?>	
<div id="error_msg" ><?php foreach($errors as $y){echo $y;}?></div>
<?php
}
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
