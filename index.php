<?php
require_once('DPDB.php');

$DPDB = new phpDatabase;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="http://dynamicphpdatabase.com/images/favi.png">
<title>DPDB</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Tangerine|Play|Armata|Merriweather+Sans|Righteous|Exo|Coming+Soon|Monda|Architects+Daughter|Comfortaa|Hammersmith+One|Istok+Web|Bangers|Open+Sans);

</style>
<link rel="stylesheet" type="text/css" href="main0.css">
<link rel="stylesheet" type="text/css" href="icons.css">	
<script src="http://jlib.technology/code/J.0.0.0.js"></script>
<script src="http://dynamicphpdatabase.com/scripts/dpdb/globals.js"></script>
<script src="internal.js"></script>

	
</head>

<body style="margin:0px; padding:0px; font-family:play; overflow:auto;">
  <div id="Ttop">
      <div id="logo"></div>
      <div id="settings"></div>
      <div id="top"></div>
      
  </div>
  <div id="left2"> 
     <div style="float:left; width:30px; height:30px; margin:3px;cursor:pointer;" class="cancel" title="Remove" data-e="e0"></div>
     <div style="float:left; width:30px; height:30px; margin:3px;cursor:pointer;" class="edit" title="Edit Name" data-e="e0"></div>
     <div style="float:left; width:30px; height:30px; margin:3px;cursor:pointer;" class="append" title="Append File" data-e="e0"></div>
     <div style="float:left; width:30px; height:30px; margin:3px;cursor:pointer;" class="add" title="Add Database" data-e="e0"></div>
  </div>
  <div id="left"> 
     <div id="ltop">
       <div class='hrr-2'></div>
       <div class='hrr0'>View Databases</div>
     </div> 
     <div id="lbod"></div> 
  </div>
  <div id="body">
  </div>
  
<div id="t1" style="float:left; width:310px; height:40px; background:#030b10; display:none;">   
</div> 
<div id="t10" style="float:left; width:350px; height:40px; background:#030b10; display:none;">   
</div>
<div id="t11" style="float:left; width:350px; height:80px; background:#030b10; display:none;">   
</div>

<div id="tx" style="float:left; width:310px; height:40px; background:#030b10; display:none;">   
</div> 
<div id="tx0" style="float:left; width:350px; height:40px; background:#030b10; display:none;">   
</div>
<div id="tx1" style="float:left; width:350px; height:auto; background:#030b10; display:none; paddin-bottom:5px;">   
</div>
<div id="tx2" style="float:left; width:350px; height:40px; background:#212121; display:none;">   
</div>

<div id="t2" style="float:left; width:810px; height:400px; background:#030b10; display:none; ">
   <div style="float:left; width:100%; height:50px; margin:3px;" id="adddb" data-e="i"></div>
   <div style="float:left; width:95%; height:330px; margin:3px 0px 0px 2.5%; overflow-x:hidden; overflow-y:auto;" id="dbbd" data-e="i"></div>
</div>
</body >
</html>