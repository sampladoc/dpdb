<?php
include("DPDB.php");

$DPDB = new phpDatabase;

if(isset($_POST["database"])){
	$db = trim($_POST["database"]);
	$exp = explode("/",$db);
	$exp2 = explode(".",$db);
	
	if(count($exp) >= 2){
		for($i = 0; $i < count($exp) - 1; $i++){
			if($dir == NULL){
				$dir = $exp[$i];
			}else{
			    $dir = $dir."/".$exp[$i];
			}
		}
		
		if($exp2[count($exp2) - 1] == "php"){
			$file = $exp[count($exp) - 1];
			$theData = substr($file,0,-4);
			$file = $theData;
		}else{
		   $database = $exp[count($exp) - 1];
		}
	}else{
		$dir = trim($_POST["database"]);		
	}
	//*

	if($exp2[count($exp2) - 1] == "php"){
		$DPDB->directory = $dir;
		$DPDB->set("file",$file);
		$DPDB-> LISTARRAYS();		
		$A = $DPDB->return_;
		
		$K = $A[0];
		$V = $A[1];
		$imp = implode("-*",$K);	
		echo "$imp(*)";
		for($i = 0; $i < count($K); $i++){
			$V2 = $V[$K[$i]];
			$V2 = array_keys($V2);
			$imp = implode(",*",$V2);
			if($imp != "config" && $imp != "secure" && $imp != "icons"){
			   echo "$imp-*";
			}
		}
		echo "$imp(*)";
		for($i = 0; $i < count($K); $i++){
			$imp = implode(",*",$V[$K[$i]]);
			if($imp != "config" && $imp != "secure" && $imp != "icons"){
			   echo "$imp-*";
			}
		}
	}else{
		$DPDB->directory = $dir;
		$DPDB->database = $database;
		$DPDB->level = 1;
		$DPDB->LISTDIR();
		$A = $DPDB->return_;
		for($i = 0; $i < count($A[1]); $i++){
			if($A[1][$i] != "config" && $A[1][$i] != "secure" && $A[1][$i] != "icons"){
		       $B[$i] = $A[1][$i];
			}
		}
		$imp = implode(",*",$A[0]);
		echo "$imp-*";
		$imp = implode(",*",$B);
		echo "$imp-*";
	}
//*/		
}

if(isset($_POST["add_database"])){
	$db = trim($_POST["add_database"]);
	if(!is_dir($db)){
	   $db1 = str_replace("..","_","$db");
	   $exp = explode("/",$db);
	   for($i = 0; $i < count($exp); $i++){
		   if($exp[$i] != NULL){
			   if($d == NULL){
				  $d = $exp[$i];
				  $d1 = $exp[$i];
			   }else{
			      $d = $d."/".$exp[$i];
				  $d1 = $d1."_".$exp[$i];
			   }
			   mkdir("$d");
		   }
	   }
	   echo $d;
	}
}
	

if(isset($_POST["get_database"])){
	$db = trim($_POST["get_database"]);
	//*
	$DPDB->directory = DATABASE;
	$DPDB->set("file",FILE);
	$DPDB-> LISTARRAYS();	
	$A = $DPDB->return_;
	
	$K = $A[0];
	$V = $A[1];
	$imp = implode("-*",$K);	
	
	for($i = 0; $i < count($K); $i++){
		$V2 = $V[$K[$i]];
		$V2 = array_keys($V2);
		$imp = implode(",*",$V2);
	}
	
	for($i = 0; $i < count($K); $i++){
		$imp = implode(",*",$V[$K[$i]]);
		echo "$imp-*";
	}
	//*/
	
}

if(isset($_POST["get_database2"])){
	$db = trim($_POST["get_database2"]);
	$dr = dirname(__FILE__);
	$dr = substr("$dr",0,-5);
	
    $DPDB->directory = "$dr";
    $DPDB->level = 0;
    $array = $DPDB-> LISTDIR();
	
	$imp = implode("-*../",$array[1]);
	echo "../$imp-*";
	
	
}

if(isset($_POST["edit_database"])){
	$db = trim($_POST["edit_database"]);
	if(trim($db) != NULL && trim($_POST["D"]) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					if(count($exp) > 1){
					   $d = $d."/".$exp[$i];
					}
				 }
			 }
		}
		if(count($exp) > 1){
		   $nd = $d."/".$db;
		}else{
			$nd = $db;
		}
		$new = str_replace("/","_",$nd);
		$old = str_replace("/","_",trim($_POST["D"]));
		$old = str_replace("..","",$old);
		
		$DPDB->directory = DATABASE;
		$DPDB->set("file",FILE);	
		$DPDB->Array = "$old";
		$DPDB->CHANGE(trim($_POST["D"]),"$nd", "value");
		
		phpDatabase::CHANGEARRAY(array(
		   "database"=>DATABASE,
		   "file"=>"database",
		   "old"=>"$old",
		   "new"=>"$new"
		));
		if(strstr(trim($_POST["D"]),".php") != NULL){
			$nd = $nd.".php";
		}
		phpDatabase::NAMEDATABASE(trim($_POST["D"]),"$nd");
		echo $nd;
	}	
}

if(isset($_POST["delete_database"])){
	$db = trim($_POST["edit_database"]);
	if(trim($_POST["D"]) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 0; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					$d = $d."/".$exp[$i];
				 }
			 }
		}
		
		$nd = $d;//."/".$db;
		
		$new = str_replace("/","_",$nd);
		$old = str_replace("/","_",trim($_POST["D"]));
		$old = str_replace("..","",$old);
		
		phpDatabase::TRUNCATE($nd);
		
	}
	
}

if(isset($_POST["file"])){
	$fl = trim($_POST["file"]);
	$array = trim($_POST["array"]);
	$number = trim($_POST["number"]);
	for($i = 1; $i <= $number; $i++){
		if(trim($_POST["valuex$i"]) == NULL){
			$val[$i-1] = 0;
		}else{
		   $val[$i-1] = trim($_POST["valuex$i"]);
		}
		if(trim($_POST["indexx$i"]) == NULL){
			$ind[$i-1] = 0;
		}else{
		   $ind[$i-1] = $_POST["indexx$i"]; 
		}
	}
	
	$db = trim($_POST["D"]); 
	if(strstr(trim($_POST["D"]),".php") != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					$d = $d."/".$exp[$i];
				 }
			 }
		}
		$db = $d;
		$fl = explode(".php",$exp[count($exp) - 1]);
		$fl = $fl[0];
	}
	if($ind == NULL){
		$ind[0] = 0;
	}
	if($val == NULL){
		$val[0] = 0;
	}
	
	if($fl != NULL && $array != NULL){
		$DPDB->set("database",$db);
		$DPDB->set("file","$fl");
		$DPDB->set("array","$array");
		$DPDB->ADD($ind,$val);
	}	
}


if(isset($_POST["append_array"])){
	$db = trim($_POST["D"]);
	if(trim($db) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					$d = $d."/".$exp[$i];
				 }
			 }
		}
		$nd = $d;
		$a = $exp[count($exp) -1];
		$A = explode(".php",$a);
		$DPDB->directory = $nd;
		$DPDB->set("file",$A[0]);	
		$DPDB->Array = trim($_POST["append_array"]);
		$DPDB->GETBACK();
		$G = $DPDB->return_;
		if($G[trim($_POST["index"])] != trim($_POST["value"]) && $G[trim($_POST["index"])] == NULL){
		   $DPDB->APPEND(trim($_POST["index"]), trim($_POST["value"]));
		}
	}	
}

if(isset($_POST["edit_array_name"])){
	$db = trim($_POST["D"]);
	if(trim($db) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					if(count($exp) > 2){
					   $d = $d."/".$exp[$i];
					}
				 }
			 }
		}
		$nd = $d;
		//*
		$a = $exp[count($exp) -1];
		$A = explode(".php",$a);
		$DPDB->directory = $nd;
		$DPDB->set("file",$A[0]);	
		$DPDB->Array = trim($_POST["edit_array_name"]);
		$DPDB->GETBACK();
		$G = $DPDB->return_;
		if($G != NULL){
			phpDatabase::CHANGEARRAY(array(
			   "database"=>"$nd",
			   "file"=>$A[0],
			   "old"=>trim($_POST["edit_array_name"]),
			   "new"=>trim($_POST["edit1"])
			));
		}
		//*/
	}	
}


if(isset($_POST["delete_array"])){
	$db = trim($_POST["D"]);
	if(trim($db) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					$d = $d."/".$exp[$i];
				 }
			 }
		}
		$nd = $d;
		//*
		$a = $exp[count($exp) -1];
		$A = explode(".php",$a);
		$DPDB->directory = $nd;
		$DPDB->set("file",$A[0]);	
		$DPDB->Array = trim($_POST["delete_array"]);
		$DPDB->GETBACK();
		$G = $DPDB->return_;
		if($G != NULL){
			$DPDB->DELETEARRAY(trim($_POST["delete_array"]));
		}
		//*/
	}	
}

if(isset($_POST["edit_array"])){
	$db = trim($_POST["D"]);
	//echo $_POST["eindex"]." = ".$_POST["val"]." => ".$_POST["edit_type"];
	if(trim($db) != NULL){
		$exp = explode("/",trim($_POST["D"]));
		for($i = 0; $i < count($exp) - 1; $i++){
			 if($exp[$i] != NULL){
				 if($d == NULL){
					$d = $exp[$i];
				 }else{
					$d = $d."/".$exp[$i];
				 }
			 }
		}
		$nd = $d;
		
		//*
		$a = $exp[count($exp) -1];
		$A = explode(".php",$a);
		$DPDB->directory = $nd;
		$DPDB->set("file",$A[0]);	
		$DPDB->Array = trim($_POST["edit_array"]);
		$DPDB->GETBACK();
		$G = $DPDB->return_;
		if($G != NULL){			
			if(trim($_POST["edit_type"]) == NULL){
				$type = "";
				$DPDB->CHANGE(trim($_POST["eindex"]),trim($_POST["edit"]),$type);
			}else{
			   $type = trim($_POST["edit_type"]);
			   //$DPDB->CHANGE(trim($_POST["val"]),trim($_POST["edit"]),$type);	
			}
		}
		//*/
	}	
}


//==================================================================================================================================
if(isset($_POST["check_secure"])){
	$user = trim($_POST["user"]);
	$pass = trim($_POST["password"]);
	
	$DPDB->directory = SECURE;
	$DPDB->set("file",SECURE_FILE);	
	
	$DPDB->Array = SECURE_F;
	$DPDB->GETBACK();
	$F = $DPDB->return_;
	
	$DPDB->Array = "password";
	$DPDB->GETBACK();
	$P = $DPDB->return_;
	
	$DPDB->Array = "user";
	$DPDB->GETBACK();
	$U = $DPDB->return_;
	
	if($P[$pass] == NULL && $U[$pass] == NULL){
		echo "NO";
	}elseif($P[$pass] == $F[0] && $U[$user] == $F[0]){
		$DPDB->set("file",SECURE_TEMP);	
	    $DPDB->Array = SECURE_ARRAY;
		$DPDB->overwrite = true;
		$DPDB->ADD(array(0),array(INTDATE));
		$DPDB->overwrite = false;
		$DPDB->Array = SECURE_ARRAY2;
		$DPDB->ADD(array(0),array(ADR));
		$DPDB->Array = SECURE_ARRAY3;
		$DPDB->ADD(array(0),array(ADR2));
		setcookie("HOST", ADR2, time() + (86400 * 0.5), "/");	
		echo "YES";
	}else{
	    echo "NO";	
	}
}
if(isset($_POST["get_secure"])){	
	$DPDB->directory = SECURE;
	$DPDB->set("file",SECURE_FILE);	
	$DPDB->Array = SECURE_F;
	$DPDB->GETBACK();
	$F = $DPDB->return_;
	
	$DPDB->Array = "password";
	$DPDB->GETBACK();
	$P = array_values($DPDB->return_);
	
	$DPDB->Array = "user";
	$DPDB->GETBACK();
	$U = array_values($DPDB->return_);
	if($P[0] == NULL && $U[0] == NULL){
		echo "NO";
	}elseif($P[0] == $F[0] && $U[0] == $F[0]){
		echo "YES";
	}else{
	    echo "NO";	
	}
}

if(isset($_POST["get_secure2"])){
	$DPDB->directory = SECURE;	
	$DPDB->set("file",SECURE_TEMP);	
	$DPDB->Array = SECURE_ARRAY;
	$DPDB->GETBACK();
	$F = $DPDB->return_;
	
	$DPDB->Array = SECURE_ARRAY2;
	$DPDB->GETBACK();
	$F2 = $DPDB->return_;
	
	$DPDB->Array = SECURE_ARRAY3;
	$DPDB->GETBACK();
	$F3 = $DPDB->return_;
	
	if($F[0] == INTDATE && $F2[0] == ADR && $F3[0] == $_POST["cookie"]){
		echo "YES";
	}else{
	    echo "NO";	
	}
}

if(isset($_POST["set_secure"])){
	$user = trim($_POST["user"]);
	$pass = trim($_POST["password"]);
	$finger = trim($_POST[SECURE_F]);
	$DPDB->directory = SECURE;
	$DPDB->set("file",SECURE_FILE);	
	$DPDB->Array = "password";
	$DPDB->ADD(array($pass),array($finger));
	$DPDB->Array = "user";
	$DPDB->ADD(array($user),array($finger));
	$DPDB->Array = SECURE_F;
	$DPDB->ADD(array(0),array($finger));
}

if(isset($_POST["delete_credentials"])){
	$DPDB->directory = SECURE;	
	$DPDB->set("file",SECURE_TEMP);	
	$DPDB->Array = SECURE_ARRAY;
	$DPDB->DELETEARRAY(SECURE_ARRAY);
}


?>