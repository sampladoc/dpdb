<?php
require_once('../DPDB.php');

$DPDB = new phpDatabase;

$DPDB->directory = "charge";
$DPDB->database = "data";
$DPDB->level = 1;
//$DPDB->LISTD();
$A = $DPDB->return_;

//print_r($A[1]);
//$DPDB->set("array","hours");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="http://dynamicphpdatabase.com/images/favi.png">
<title>Secure login</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Tangerine|Play|Armata|Merriweather+Sans|Righteous|Exo|Coming+Soon|Monda|Architects+Daughter|Comfortaa|Hammersmith+One|Istok+Web|Bangers|Open+Sans);
#left{
   float:left;  width:15%; height:100%; background:;	
}
#left2{
   float:left; width:40px; height:100%; background:;	
}
#Ttop{
   float:left; width:100%; height:50px; background:#ccc; margin-bottom:4px;
}
#logo{
   float:left; width:10%; height:50px; background:url(../icons/logo.png); background-size:50px 50px; background-repeat: no-repeat; background-attachment:fixed;
   background-position: 4.5% 0%; 
}
#top{
   float:right; width:90%; height:50px; background:;	
}
#ltop{
   float:left; width:100%; height:px; background:;	
}
#lbod{
   float:left; width:100%; height:90%; background:; margin-top:5px;	
}
#body{
   float:left; width:100%; height:100%; background:; overflow-x:hidden; overflow-y:auto;	
}
.hrr-2{
  float:left;  margin:0.15% 0.15% 0px 0.15%;  text-align:center;  color:white;  font-family:play;  font-size:12px;  font-weight:200;  background:#333;
  padding-top:5px;  width:95%; padding-bottom:5px; word-wrap: break-word;
}
.hrr0{
  float:left;  margin:0.15% 0.15% 10px 0.15%;  text-align:center;  color:white;  font-family:play;  font-size:13px;  font-weight:600;  background:#2883b7;
  height:20px;  padding-top:5px;  padding-bottom:px;  cursor:pointer;  width:95%;
}
.hrr{
  float:left;  margin:0.5% 0.15% 0.15% 0.15%; text-align:center; color:white; font-family:play; font-size:13px; font-weight:600; background:#73b8e0; 
  height:20px; padding-top:5px; padding-bottom:px; width:95%;
}
.hrr1{
  float:left; margin:0.15% 0.15% 0.5% 0.15%; text-align:; color:white; font-family:play; font-size:15px; font-weight:600; background:#; height:px;
  padding-top:px; padding-bottom:0.5%; width:99%;
}
.hrr2{
  float:left; text-align:; color:white; font-family:play; font-size:18px; font-weight:600; background:#1b597d; height:; padding:0.2%; width:99%;
}
.hrr3{
  float:left; margin:0.15%; text-align:center; color:white; font-family:play; font-size:10px; font-weight:600; background:#; height:px;
  padding:0.1% 0.1% 0.1% 0.1%; width:8.5%;
}
.hrr4{
  float:left; margin:0.5% 0.0% 0.5% 0.5%; text-align:center; color:white; font-family:play; font-size:12px; font-weight:600; background:#999;
  height:px; padding:2%; cursor:pointer; width:95%; word-wrap: break-word;
}
.hrr4i{
  float:left; margin:0.5% 0.0% 1% 0.5%; text-align:center; color:black; font-family:play; font-size:12px; font-weight:600; background:#ccc; height:px;
  padding:2%; cursor:pointer; width:95%; word-wrap: break-word;
}
.cancel{
  background:url(../icons/cancel.png);
  background-size:30px 30px;	
}
#practice{
  background:url(../icons/practice.png);
  background-size:30px 30px;	
}
.shell{
   float:left;
   width:100%;
   background:;
   height:1px;	
}
#send{
	float:none;
	margin:20px auto 0px auto;
	text-align:center;
	background:#73b8e0;
	font-size:18px;
	font-weight:500;
	color:#FFF;
	cursor:pointer;
}
</style>

<script src="http://jlib.technology/code/J.0.0.0.js"></script>
<script src="http://dynamicphpdatabase.com/scripts/dpdb/globals.js"></script>
<script>
$j().pageSet(function() {
	$j().ASYNCPOST("../ajax_.php", {get_secure:true}, function(dat){
		var ran
		
		$j("input").setStyle("width","95%").setStyle("margin-left","2.5%").
		enhance({reflect:true, shadow:40, border:10, percent:5, radius:5, rest:"darker+", inset:true}).
		setStyle("padding-left","10px").setStyle("height","33px").setStyle("margin-top","5px")
		
		$j("#send").setStyle("width","95%").enhance({reflect:false, shadow:"spread5d", border:25, percent:20, radius:false, rest:"darker+"}).
		setStyle("height","33px").setStyle("margin-top","15px").setStyle("padding-top","5px").after("mouseenter",function(){
			BUTTON_HOVER_($j(this))
		}).after("mouseleave",function(){
			BUTTON_HOVER_0($j(this))
		}).after("click",function(e){
			ran = $j().randomized(16)			
			if(dat[0].trim() == "YES"){				
				$j().ASYNCPOST("../ajax_.php", $j("#body").sequence({check_secure:true}), function(dat1){
					if(dat1[0].trim() == "YES"){	
					   $j().navTo("../")
					}
				})
			}else{
				if($j("?password").embedded() == $j("?password2").embedded()){
					$j().ASYNCPOST("../ajax_.php", $j("#body").sequence({set_secure:true, fingerprint:ran}), function(dat2){
						$j().ASYNCPOST("../ajax_.php", $j("#body").sequence({check_secure:true}), function(dat3){
							if(dat1[0].trim() == "YES"){	
					            $j().navTo("../")
					        }
						})
					})
				}else{
					alert("Passwords don't match")
				}
			}
			
		})
	
	    if(dat[0].trim() == "YES"){
			$j("#body[2]").play("hide")
		}else{
			$j("#body[3]").embed("SAVE")
		}
	
		
	})
})
</script>
<link rel="stylesheet" type="text/css" href="../icons.css">		
</head>

<body style="margin:0px; padding:0px; font-family:play; overflow:auto; background:#030b10;">
  <div id="Ttop"><div id="logo"></div><div id="top"></div></div>
  <div id="body">
     <input type="text" placeholder="User" name="user" />
     <input type="password" placeholder="Password" name="password" />
     <input type="password" placeholder="Confirm Password" name="password2" />
     <div id="send">ENTER</div>
  </div>
  

</body >
</html>