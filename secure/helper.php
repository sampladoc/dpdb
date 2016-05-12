<?php
class Helper{
	  public static function RANDOM($COMP){
		   function doit($COMP){
		        $S = '';
				if(is_numeric($COMP)){
				   $L = $COMP;
				}else{
					$L = strlen($COMP);
					
				}
				
				function char($s,$comp){
					if($comp != $s){
						$n = rand(0,62);
						if(strlen($s) > 1){
						   if($n < 10) return $n; //1-10
						   if($n < 36) return chr($n + 55); //A-Z
						   if($n < 62) return chr($n + 61); //a-z				   
						}else{
							if($n < 26) return chr($n + 65); //A-Z
						    if($n < 32) return chr($n + 59); //a-z	
							if($n < 58) return $n; //a-z		
						}
					}else{
						$s = "";
						char($s,$comp);
					}
				}
				
				while(strlen($S) < $L){
						$S .= char($S,$COMP);
				}
				
				if(strstr($s,"undefined") == NULL){									  
			        return $S;
				}else{
				   return false;	
				}
		   }
		   $S = doit($COMP);
		   while($S == false){
			   $S = doit($COMP);   
		   }
		     
		   return $S;
	   }
}

?>