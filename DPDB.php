<?php
require("secure/helper.php");
$RAN = Helper::RANDOM(16);
define("DATABASE","config/databases");
define("FILE","database");
define("SECURE","config/secure");
define("SECURE_FILE","secure");
define("SECURE_F","fingerprint");
define("SECURE_TEMP","login_credentials");
define("SECURE_ARRAY","intdate");
define("SECURE_ARRAY2","IP");
define("SECURE_ARRAY3","HOST");
define("INTDATE",date("yzh"));
define("ADR",$_SERVER['REMOTE_ADDR']);
define("ADR2",$RAN);




class phpDatabase{
	  public $data, $file_name, $table, $directory, $database, $Array, $overwrite, $return_, $level;
	  public function set($var, $val){
		  if("dir" == $var){
		     $this->directory = $val;
		  }
		  if("array" == $var){
		     $this->Array = $val;
		  }
		  if("file" == $var){
		     $this->file_name = $val;
		  }
		  if("database" == $var){
		     $this->database = $val;
		  }
		  if("overwrite" == $var){
		     $this->overwrite = $val;
		  }
	  }
	  
	  public function get($var){
		  if("dir" == $var){
		     return $this->directory;
		  }
		  if("file" == $var){
		     return $this->file_name;
		  }
		  if("array" == $var){
		     return $this->Array;
		  }	
		  if("database" == $var){
		     return $this->database;
		  }
		  if("overwrite" == $var){
		     return $this->overwrite;
		  }	
		  if("return_" == $var){
		     return $this->return_;
		  }				  	  
	  }
	  
	  public function GETBACK(){
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  $in = false;
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  /*
		  if(require(dirname(__FILE__)."/$ndir$f_n.php")){
		     //include("$ndir$f_n.php");
			 require(dirname(__FILE__)."/$ndir$f_n.php");
		  }
		  //*/
		  //echo dirname(__FILE__)."/$ndir$f_n.php";
		  //echo "<br>$f_n<br>$column";
		  include("$ndir$f_n.php");
		  $Col = $$column;
		  //print_r($Col);
		  $this->return_ = $Col;
		  return $Col;
	  }
	  
	  
	  public function APPEND($val2,$val1){
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  $in = false;
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  $fun = "w";
		  if($val2 != NULL){
			  $fh = fopen("$ndir$f_n.php", 'r');
			  if($fh !== NULL){
				  $theData = fread($fh, filesize("$ndir$f_n.php"));
				  fclose($fh);
			  }
			  $theData = trim($theData);	  
			  $pos = stripos($theData,"$$column = array(");
			  $pos2 = stripos($theData,"$");
			  $pos3 = stripos($theData,"?>");
			  $theData = trim($theData);
			  if($pos > 0){
				 //If table already found append data
				 $theData = substr($theData,$pos2,-8);
				 $theData = trim($theData);
				 $exp = explode(");",$theData);
				 include("$ndir$f_n.php");
				 //require(dirname(__FILE__)."/$ndir$f_n.php");
				 $Col = $$column;
				 for($j = 0; $j < count($exp); $j++){
					 if(strstr(trim($exp[$j]),"$$column = array(") != NULL){
						 $ak = array_keys($Col);
						 $t = "$$column = array(";
						 for($i = count($ak) - 1; $i >= 0; $i--){
							 $u = "\"".$ak[$i]."\"=>\"".$Col[$ak[$i]]."\",".$u;
						 }
						 if($val1 == NULL){
						    $v = "\"".count($Col)."\"=>\"".$val2."\",";
						 }else{
							 $v = "\"".$val2."\"=>\"".$val1."\",";
						 }
						 $temp = $t.$u.$v;
						
						 $exp[$j] = "\n \t ".trim($temp);
					 }
				 }
				 
				 $ch = implode(");",$exp);
				 if($index == NULL){
				   //$ch = substr($ch,1);
				 }
				 $ch = trim($ch);
				 if((strlen("$ch") - strripos("$ch",");")) > 2){
					$ch = $ch.");";
				 }
				 //*write updated file
				 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
				 $txt = "<?php \n";
				 fwrite($myfile, $txt);
				 $txt = "\t $ch";
				 fwrite($myfile, $txt);
				 $txt = "\n//DPDB?>";
				 fwrite($myfile, $txt);
			  }
			  if($myfile !== NULL){
		         fclose($myfile);
			  }
		  }
	  }
	  
	  public function CHANGE($val1, $val2, $index){
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  $in = false;
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  $fun = "w";
		  if($val2 == NULL){
			 $val2 = 0;  
		  }
		  if($val1 != NULL){
		  $fh = fopen("$ndir$f_n.php", 'r');
		  $theData = fread($fh, filesize("$ndir$f_n.php"));
		  fclose($fh);
		  $theData = trim($theData);	  
		  $pos = stripos($theData,"$$column = array(");
		  $pos2 = stripos($theData,"$");
		  $pos3 = stripos($theData,"?>");
		  $theData = trim($theData);
		  if($pos > 0){
			 //If table already found append data
			 $theData = substr($theData,$pos2,-8);
			 $theData = trim($theData);
			 $exp = explode(");",$theData);
			 include("$ndir$f_n.php");
			 //require(dirname(__FILE__)."/$ndir$f_n.php");
			 $Col = $$column;
			 
			 for($j = 0; $j < count($exp); $j++){
				 if(strstr(trim($exp[$j]),"$$column = array(") != NULL){
					 //change values that match, without consideration for index
					 if($index == "value"){
					    $temp = str_replace("=>\"$val1\"","=>\"$val2\"",$exp[$j]);
					 }elseif($index == NULL){
						 //change value that matches a specific index
						 if(strstr($exp[$j],"\"$val1\"=>") != NULL || strstr($exp[$j],"\"$val1\" =>") != NULL){
							 $Col[$val1] = $val2;
							 $ak = array_keys($Col);
							 $t = "$$column = array(";
							 for($i = count($ak) - 1; $i >= 0; $i--){
								 $u = "\"".$ak[$i]."\"=>\"".$Col[$ak[$i]]."\",".$u;
							 }
							 $temp = $t.$u;
						 }
					 }elseif($index == "index"){
						//change index
					    $temp = str_replace("\"$val1\"=>","\"$val2\"=>",$exp[$j]);
					 }
					 $exp[$j] = "\n \t ".trim($temp);
				 }
			 }
			 print_r($exp);
			 if($exp[1] != NULL){
				 $ch = implode(");",$exp);
				 $ch = trim($ch);
				 if((strlen("$ch") - strripos("$ch",");")) > 2){
					$ch = $ch.");";
				 }
				 if(strstr(trim($ch),"););") != NULL){
					 $ch = str_replace("););",");",$ch);
				 }
				 //*write updated file
				 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
				 $txt = "<?php \n";
				 fwrite($myfile, $txt);
				 $txt = "\t $ch";
				 fwrite($myfile, $txt);
				 $txt = "\n//DPDB?>";
				 fwrite($myfile, $txt);
			 }else{
				 //*write updated file
				 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
				 $txt = "<?php \n";
				 fwrite($myfile, $txt);
				 $txt = "\t $theData";
				 fwrite($myfile, $txt);
				 $txt = "\n//DPDB?>";
				 fwrite($myfile, $txt);
			 }
			 //*/
		  }
		  fclose($myfile);
		  }
	  }
	  
	  public static function CHANGEARRAY($ARRAY){
		  $val = $ARRAY["new"];
		  $ndir = $ARRAY["database"]."/";
		  $f_n = $ARRAY["file"];
		  $column = $ARRAY["old"];
		  $fun = "w";
		  //echo "$val - $ndir - $f_n - $column<br>";
		  $fh = fopen("$ndir$f_n.php", 'r');
		  $theData = fread($fh, filesize("$ndir$f_n.php"));
		  fclose($fh);
		  $theData = trim($theData);	  
		  $pos = stripos($theData,"$$column = array(");
		  $pos2 = stripos($theData,"$");
		  $theData = trim($theData);
		  //echo "$ndir$f_n.php<br>$theData<br>$$column = array(<br>";
		  if($pos > 0){			 
			 $theData = substr($theData,$pos2,-8);
			 $theData = trim($theData);
			 $exp = explode(");",$theData);
			 
			 for($j = 0; $j < count($exp); $j++){
				 if(strstr(trim($exp[$j]),"$$column = array(") != NULL){					 
					 $exp[$j] = str_replace("$$column","$$val",$exp[$j]);
				 }
				 //echo $exp[$j]."<br>";
			 }
			 //print_r($exp);
			 $ch = implode(");",$exp);
			 $ch = trim($ch);
			 if(strstr(trim($ch),"););") != NULL){
				 $ch = str_replace("););",");",$ch);
			 }
			 if((strlen("$ch") - strripos("$ch",");")) > 2){
				$ch = $ch.");";
			 }
			 //*		 
			 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
			 $txt = "<?php \n";
			 fwrite($myfile, $txt);
			 $txt = "\t $ch";
			 fwrite($myfile, $txt);
			 $txt = "\n//DPDB?>";
			 fwrite($myfile, $txt);
			 //*/
		  }
		  fclose($myfile);		  
	  }
	  
	  public function DELETEARRAY(){
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  $fun = "w";
		  
		  $fh = fopen("$ndir$f_n.php", 'r');
		  $theData = fread($fh, filesize("$ndir$f_n.php"));
		  fclose($fh);
		  $theData = trim($theData);	  
		  $pos = stripos($theData,"$$column = array(");
		  $pos2 = stripos($theData,"$");
		  $theData = trim($theData);
		  
		  if($pos > 0){
			 
			 $theData = substr($theData,$pos2,-8);
			 $theData = trim($theData);
			 $exp = explode(");",$theData);
			 
			 for($j = 0; $j < count($exp); $j++){
				 if(strstr(trim($exp[$j]),"$$column = array(") != NULL){
					 //$exp[$j] = NULL;
					 array_splice($exp,$j,1);
				 }
			 }
			 //print_r($exp);
			 $ch = implode(");",$exp);
			 $ch = trim($ch);
			 if(strstr(trim($ch),"););") != NULL){
				 $ch = str_replace("););",");",$ch);
			 }
			 if((strlen("$ch") - strripos("$ch",");")) > 2){
				$ch = $ch.");";
			 }
			 //*
			 
			 
			 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
			 $txt = "<?php \n";
			 fwrite($myfile, $txt);
			 $txt = "\t $ch";
			 fwrite($myfile, $txt);
			 $txt = "\n//DPDB?>";
			 fwrite($myfile, $txt);
			 //*/
		  }
		  fclose($myfile);
		  
	  }
	  
	  public function LISTDIR(){
		  if($this->level == NULL || $this->level == 0){
			 $ldir = $this->directory."/";
		  }else{
			 $ldir = $this->directory."/".$this->database."/";
		  }
		  
	      if (is_dir($ldir)){
			 if ($dh = opendir($ldir)){
			     $x = 0;
			     $i = 0;
				 while (($file = readdir($dh)) !== false){
					  if($file != ".." && $file != "."){
						  $exp = explode(".",$file);
						  if(count($exp) > 1 && $exp[count($exp) - 1] == "php"){ 
							 $fh = fopen("$ldir$file", 'r');
		                     $theData = fread($fh, filesize("$ldir$file"));
		                     fclose($fh);
							 if(strrpos($theData,"//DPDB?>") == (strlen(trim($theData)) - 8)){
							 //if(substr_count($theData,"//DPDB") > 0){
								 $fl[$x] = trim($file);
								 $x++;
							 }
							 //if(count($exp) == 1){
						  }elseif(is_dir("$ldir/$file")){
							//	  echo is_dir($db);
							  
							  $fd[$i] = $file;
							  $i++;
						  }
					  }
				 }
				 closedir($dh);
			  }
			}
			$fl = array_unique($fl);
			$this->return_ = array($fl,$fd);
			return array($fl,$fd);
	  }
	  
	   public function LISTARRAYS(){		   
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  $in = false;
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  $fun = "w";
		  $fh = fopen("$ndir$f_n.php", 'r');
		  $theData = fread($fh, filesize("$ndir$f_n.php"));
		  fclose($fh);
		  $theData = trim($theData);	  
		  $theData = substr($theData,0,-8);
		  $theData = substr($theData,5);
		  $exp = explode("= array(",$theData);
		 
		  for($i = 0; $i < count($exp); $i++){
			 $exp2 = explode(");",$exp[$i]);
			 $exp3 = explode("=>",$exp2[0]);
			 if(count($exp2) == 2 && trim($exp2[1]) != NULL && trim($exp2[1]) != " "){
				$nm[$i] = substr(trim($exp2[1]),1); 
			 }elseif($exp2[0] != NULL && substr_count($exp2[0], "=>") == 0){
				 $nm[$i] = substr(trim($exp2[0]),1);
			 }
			 //*
			 if(count($exp3) >= 2 && trim($exp3[1]) != NULL && trim($exp3[1]) != " "){
				$vl[$i] = substr(trim($exp3[1]),1,-2); 
			 }elseif($exp3[0] != NULL && substr_count($exp3[0], "=>") == 0){
				 //$vl[$i] = substr(trim($exp3[0]),1);
			 }
			 //*/
			 
		  }
		  include("$ndir$f_n.php");
		  /*
		  if(require(dirname(__FILE__)."/$ndir$f_n.php")){
		     //include("$ndir$f_n.php");
			 require(dirname(__FILE__)."/$ndir$f_n.php");
		  }
		  */
		  
		  for($i = 0; $i < count($nm); $i++){
			  $column = $nm[$i];
			  $Col = $$column;
			  $M[$nm[$i]] = $Col;
		  }
		  
		  $this->return_ = array($nm, $M);		  
		  fclose($myfile);
		  return array($nm, $M);
		  
	  }
	  
	  
	  public function ADD($ARRAY1,$ARRAY2){	  
		  if($this->directory != NULL){
		     $dir = $this->directory."/";
		  }else{
			$dir == "";  
		  }
		  $in = false;
		  if($this->database != NULL){
		     $ndir = "$dir".$this->database."/";
		  }else{
			  $ndir = $dir;
		  }
		  $f_n = $this->file_name;
		  $column = $this->Array;
		  $x = 1;
		  //Checks to see if the directory already exists
		  if(!is_dir($ndir)){
			 $exp = explode("/",$ndir);
			 for($i = 0; $i < count($exp); $i++){
				 if($exp[$i] != NULL){
					 if($d == NULL){
						$d = $exp[$i];
					 }else{
						$d = $d."/".$exp[$i];
					 }
					 mkdir("$d");
				 }
			 }
		  }
		  //Checks the number of folders already present
		  if (is_dir($ndir)){
			if ($dh = opendir($ndir)){
			  while (($file = readdir($dh)) !== false){
				if($file != ".." && $file != "."){
					$x++;
				}
			  }
			  closedir($dh);
			}
		  }
		  //reads the file to see if data is to be appended		  
		  $fh = fopen("$ndir$f_n.php", 'r');
		  if($fh != NULL){
		     $theData = fread($fh, filesize("$ndir$f_n.php"));
			 fclose($fh);
		  }
		  
		  
		  $pos = stripos($theData,"$$column = array(");
		  $fun = "w";
		  if($this->overwrite != true){
			  if($theData != NULL){
				  $theData = trim($theData);
				  
				  if($pos >= 0 && $pos != NULL){
					 //If table already found append data
					 $theData = substr($theData,0,-8);					 
				  }else{
					 //if not found write new data
					 $theData = substr($theData,0,-8);
					 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!");
					 fwrite($myfile, $theData);
					 $fun = "a";
					 $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!");
					 $txt = "  $$column = array(";
					 fwrite($myfile, $txt);
				  }			  
			  }else{
				  //if this is a new file
				  $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
				  $txt = "<?php \n";
				  fwrite($myfile, $txt);
				  $txt = "  $$column = array(";
				  fwrite($myfile, $txt);
			  }
		  }else{
			  $myfile = fopen("$ndir$f_n.php", "$fun") or die("Unable to open file!"); 
			  $txt = "<?php \n";
			  fwrite($myfile, $txt);
			  $txt = "  $$column = array(";
			  fwrite($myfile, $txt);
		  }
		  //Begins to write file
		  if($ARRAY2 == NULL){
			  $ARRAY = $ARRAY1;
		  }else{
			  $ARRAY = $ARRAY2;
		  }
		  for($i = 0; $i < count($ARRAY); $i++){
			  if($ARRAY2 == NULL){
				  $I = $i;
			  }else{
				  $I = $ARRAY1[$i];
			  }
			 $v = "\"$I\"=>\"".$ARRAY[$i]."\", ";
			 if($myfile !== NULL){	
			    fwrite($myfile, trim($v));
			 }
		  }
		  $txt = ");\n";
		  if($myfile !== NULL){
		     fwrite($myfile, $txt);
		  }
		 
		  $txt = "//DPDB?> \n";
		  if($myfile !== NULL){
			 fwrite($myfile, $txt);
			 fclose($myfile);
		  }
	  }
	  
	  public static function TRUNCATE($ndir) {
		  if (!is_dir($ndir)){
			  unlink($ndir);
		  }elseif (is_dir($ndir)){	
			if ($dh = opendir($ndir)){
			  while (($file = readdir($dh)) !== false){
				if($file != ".." && $file != "."){										
					if (is_dir($ndir."/".$file)) {
						self::TRUNCATE($ndir."/".$file);
					}else{
						unlink($ndir."/".$file);
					}
				}
			  }
			  closedir($dh);
			}
		  }
		  rmdir($ndir);
    }
	
	public static function NAMEDATABASE($odir,$ndir) {	
	    rename($odir,$ndir);
	}
	  
}
?>