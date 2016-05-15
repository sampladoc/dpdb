// JavaScript Document
$j().pageSet(function() {
	var php = 0, DB;
	$j("#Ttop").enhance({reflect:false, shadow:"spread5", border:25, percent:15, radius:false, rest:"darker+"})
	$j("#body").enhance({reflect:false, shadow:"spread5", border:25, percent:0, radius:false, rest:"darker+", inset:true})
	$j(".hrr0").enhance({reflect:false, shadow:"spread5", border:25, percent:20, radius:false, rest:"darker+"}).setStyle("height","30px").
	setStyle("margin-bottom","1px")
	var cok = localStorage.HOST;

	$j().ASYNCPOST("ajax_.php", {get_secure2:true, cookie:cok}, function(dats){
		if(dats[0].trim() == "YES"){
			setTimeout(function(){
				$j().ASYNCPOST("ajax_.php", {delete_credential:true}, function(dats){})
			},1000*60*15)
		function GET(v){

			//var em = $j("input").embedded()sdf[sdf.length - 1]
			var sdf = v.split("/");
			$j(".hrr-2").embed("viewing: <b>"+v+"</b>")
			DB = v
			$j().ASYNCPOST("ajax_.php", {database:v}, function(dat){

				if(v.indexOf(".php") == v.lastIndexOf(".php")){
					if(v.indexOf(".php") > 0){
						//alert(dat)
						var sp = dat[0].split("(*)")
						var sep = [], se = [], s = [];
						$j("#body").embed("")
						for(var i = 0; i < sp.length; i++){
							//alert(sp[i])
							sep = sp[i].split("-*")
							//alert(sep.length)
							for(var x = 0; x < sep.length; x++){
								se = sep[x].split(",*")
								if(i == 0){
								   $j("#body").affix("end","<div class='hrr1' id='"+x+"'></div>")
								   $j("#"+x).affix("end","<div class='hrr2' id='n"+i+"-"+x+"'></div>")
								   $j("#n"+i+"-"+x).affix("end","<div style='float:left; width:px; height:20px; margin:0px 3px 0px 5px; font-size:px;'>"+
								   se+"</div>");
								   $j("#n"+i+"-"+x).affix("end","<div style='float:right; width:20px; height:20px; margin:3px; background-size:20px 20px;cursor:pointer;'"+
									"class='cancel' title='Remove' data-e='e' data-n='"+se+"'> </div>");
								   $j("#n"+i+"-"+x).affix("end","<div style='float:right; width:20px; height:20px; margin:3px; background-size:20px 20px;cursor:pointer;'"+
									"class='edit' title='Edit' data-e='e' data-n='"+se+"'></div>");
									$j("#n"+i+"-"+x).affix("end","<div style='float:right; width:20px; height:20px; margin:3px; background-size:20px 20px;cursor:pointer;'"+
									"class='append' title='Append' data-e='e' data-n='"+se+"'></div>");
									$j("#n"+i+"-"+x).affix("end","<div style='float:right; width:px; height:20px; margin:8px 10px 3px 3px; font-size:12px;'"+
									" data-n='"+se+"'></div>");
								}


								var q = 0;
								for(var y = 0; y < se.length; y++){
									s = se[y].split(",")
									var mod = q % 11;

									if(i == 1){
										if(mod == 0){
										   $j("#"+x).affix("end","<div class='shell'></div>")
										}
									   $j("#n0-"+x+"[4]").embed(se.length+" Values")
									   $j("#"+x).affix("end","<div class='hrr3' id='"+i+"-"+x+"-"+y+"'></div>")
									   $j("#"+i+"-"+x+"-"+y).affix("end","<div class='hrr4' data-type='index' data-n='0-"+x+"'>"+s+"</div>")
									   q++
									}
									if(i == 2){
									   //alert("#"+i+"-"+x+"-"+y)
									   $j("#1-"+x+"-"+y).affix("end","<div class='hrr4i' data-typ='' data-n='0-"+x+"' data-m='"+x+"-"+y+"'>"+s+"</div>")
									}
								}
							}
						}
						$j(".hrr2").enhance({reflect:false, shadow:"spread5d", border:25, percent:25, radius:0, rest:"darker+"})
						$j("@data-e=e").after("mouseenter",function(){
							BUTTON_HOVER_($j(this))
						}).after("mouseleave",function(){
							BUTTON_HOVER_0($j(this))
						}).after("click",function(e){
							clicked2 = false
							e.stopPropagation()
							if($j(this).attribute("title") == "Remove"){
								var n = $j(this).attribute("data-n");
							   if (confirm("Are you sure you want to delete "+n+"?") == true) {
									  $j().ASYNCPOST("ajax_.php", {delete_array:n,D:DB}, function(dat){
										  //alert(dat)
										  GET(DB)
										  //DB = dat[0]
									  })
							   }
							}

							if($j(this).attribute("title") == "Edit"){
								var n = $j(this).attribute("data-n");
								$j("?edit1").embed("")
								$j("?edit1").embed(n.trim())
								$j("#t10").WINDOW(WOH,$j(this),function(){
									if(clicked2 == false){
										$j().ASYNCPOST("ajax_.php", $j("#t10").sequence({D:DB, edit_array_name:n}), function(dat){
											//alert(dat)
											GET(DB)
											clicked2 = true;
										})
									}
								})
							}
							if($j(this).attribute("title") == "Append"){
								var n = $j(this).attribute("data-n");
								//$j("?append").embed(n.trim())
								$j("#t11").WINDOW(WOH,$j(this),function(){
									if(clicked2 == false){
										$j().ASYNCPOST("ajax_.php", $j("#t11").sequence({D:DB, append_array:n}), function(dat){
											//alert(dat)
											GET(DB)
											clicked2 = true;
										})
									}
								})
							}
						})

						$j(".hrr3[a]").after("mouseenter",function(){
							BUTTON_HOVER_($j(this))
						}).after("mouseleave",function(){
							BUTTON_HOVER_0($j(this))
						}).after("click",function(e){
							clicked3 = false
							e.stopPropagation()
							$j("?val").embed("")
							$j("?edit_array").embed("")
							$j("?edit_type").embed("")
							$j("?eindex").embed("")
							$j("?edit").embed("")
							$j("?edit").embed($j(this).embedded())
							var n = $j(this).attribute("data-n");
							var va = $j(this).embedded()
							var nx = $j("#n"+n+"[0]").embedded()
							var idx = $j("#1-"+$j(this).attribute("data-m")+"[0]").embedded()
							var inx = $j(this).attribute("data-type")
							$j("?val").embed(va)
							$j("?edit_array").embed(nx)
							$j("?edit_type").embed(inx)
							$j("?eindex").embed(idx)

							//$new_test = array("0"=>"new/test1","1"=>"new/test1","2"=>"new/test1","3"=>"new/test1","4"=>"new/test1","5"=>"new/test1","6"=>"new/test1",);
							$j("#t1").WINDOW(WOH,$j(this),function(){
								if(clicked3 == false){
									$j().ASYNCPOST("ajax_.php", $j("#t1").sequence({D:DB}), function(dat){
										GET(DB)
										clicked3 = true;
									})
								}
							})
						})

					}else{
						var sp = dat[0].split("-*")
						var sep = []
						$j("#lbod").embed("")

						for(var i = 0; i < sp.length; i++){
							sep[i] = sp[i].split(",*")
							if(i == 0){
								se = sep[i].toString()
								se = se.split(",")
								if(se != " " && se != "" && se !== undefined){
									$j("#lbod").affix("end","<div class='hrr-1'>Data files</div>")
								}
								for(var x = 0; x < se.length; x++){
									if(se[x] != " " && se[x] != ""){
									   $j("#lbod").affix("end","<div style='cursor:pointer;' class='hrr-x'>"+se[x]+"</div>")
									}
								}
							}
							if(i == 1){
								se = sep[i].toString()
								se = se.split(",")
								if(se != " " && se != "" && se !== undefined){
									$j("#lbod").affix("end","<div class='hrr-1'>Databases</div>")
								}
								for(var x = 0; x < se.length; x++){
									if(se[x] != " " && se[x] != ""){
									   $j("#lbod").affix("end","<div style='cursor:pointer;' class='hrr-x'>"+se[x]+"</div>")
									}
								}
							}
						}
						$j(".hrr").enhance({reflect:false, shadow:"spread5", border:25, percent:20, radius:false, rest:"darker+"}).setStyle("height","30px")
						$j(".hrr-x").enhance({reflect:false, shadow:"spread5", border:25, percent:20, radius:false, rest:"darker+"}).setStyle("height","30px")
						$j(".hrr-x").after("mouseenter",function(){
							BUTTON_HOVER_($j(this))
						}).after("mouseleave",function(){
							BUTTON_HOVER_0($j(this))
						}).after("click",function(){
							var t = $j(this).embedded()
							var em = DB//$j("?database").embedded()
							//alert(em.indexOf(".php")+" > 0 && "+v.indexOf(".php")+" > 0")
							if(em.indexOf(".php") > 0){
								var vs = em.split("/")
								var dir
								for(var i = 0; i < vs.length - 1; i++){
									if(dir === undefined){
										dir = vs[i];
									}else{
										if(vs[i].indexOf(".php") == -1){
										   dir = dir+"/"+vs[i];
										}
									}
								}
								var nt = dir+"/"+t
							}else if(v.indexOf(".php") == -1){
								//alert(nt)
								var nt = em+"/"+t
							}else if(v.indexOf(".php") > 1 && t.indexOf(".php") > 1){
								var nt = em;
							}else{
								var nt = em;
							}

							$j("?database").embed(nt)
							GET(nt)
							//alert(t)
						})
					}
				}else{

				}


			})
		}

	//============================================================================================================================================
		$j("#top").affix("end","<input type='text' placeholder='Database' name='database'>")
		$j("#adddb").affix("end","<input type='text' placeholder='Create Database' name='adddb'>")

		$j("#t1").affix("end","<input type='text' placeholder='Edit' name='edit'>")
		$j("#t1").affix("end","<input type='hidden' placeholder='Edit' name='val'>")
		$j("#t1").affix("end","<input type='hidden' placeholder='Edit' name='edit_type'>")
		$j("#t1").affix("end","<input type='hidden' placeholder='Edit' name='eindex'>")
		$j("#t1").affix("end","<input type='hidden' placeholder='Edit' name='edit_array'>")
		$j("#t10").affix("end","<input type='text' placeholder='Edit' name='edit1'>")
		$j("#t11").affix("end","<input type='text' placeholder='Index' name='index'>")
		$j("#t11").affix("end","<input type='text' placeholder='Value' name='value'>")

		$j("#tx").affix("end","<input type='text' placeholder='Edit' name='editx'>")
		$j("#tx0").affix("end","<input type='text' placeholder='Edit' name='editx1'>")
		$j("#tx1").affix("end","<input type='text' placeholder='File Name' name='file'>")
		$j("#tx1").affix("end","<input type='text' placeholder='Array Name' name='array'>")
		$j("#tx1").affix("end","<input type='number' placeholder='How many values?' name='number' min='1' max='20'>")
		$j("#tx2").affix("end","<input type='text' placeholder='Create Database' name='adddb2'>")
		//$j("#tx1").affix("end","<input type='text' placeholder='Value' name='valuex'>")

		$j("input").setStyle("width","95%").setStyle("margin-left","2.5%").
		enhance({reflect:true, shadow:40, border:10, percent:5, radius:5, rest:"darker+", inset:true}).
		setStyle("padding-left","10px").setStyle("height","33px").setStyle("margin-top","5px")

	//=====================================================================================================================================
		var vir = 1;
		function STEP(vi){
			if(vi <= 20 && vir == vi){
				$j("#tx1").affix("end","<input type='text' placeholder='Index "+vi+"' name='indexx"+vi+"'>")
				$j("#tx1").affix("end","<input type='text' placeholder='Value "+vi+"' name='valuex"+vi+"'>")
				$j("?valuex"+vi).setStyle("width","45%").setStyle("margin-left","2.5%").
				enhance({reflect:true, shadow:40, border:10, percent:5, radius:5, rest:"darker+", inset:true}).
				setStyle("padding-left","10px").setStyle("height","30px").setStyle("margin-top","5px").setStyle("background","#c4e1f2")

				$j("?indexx"+vi).setStyle("width","45%").setStyle("margin-left","2.5%").
				enhance({reflect:true, shadow:40, border:10, percent:5, radius:5, rest:"darker+", inset:true}).
				setStyle("padding-left","10px").setStyle("height","30px").setStyle("margin-top","5px")
				var ts = $j("#tx1<1").trueStyle("height")
				ts = parseFloat(ts) + 35
				var ts0 = $j("#tx1<1").trueStyle("width")
				ts0 = parseFloat(ts0) * 2

				if(parseInt(vi) <= 10){
					$j("#tx1<1").setStyle("height",ts+"px")
				}else if(parseInt(vi) == 11){
					$j("#tx1<1").setStyle("width",ts0+"px")
					$j("#tx1").setStyle("width",ts0+"px")
					$j("@name=valuex%").setStyle("width","22%")
					$j("@name=indexx%").setStyle("width","22%")
					$j("#tx1").setStyle("height",(parseFloat($j("#tx1<1").trueStyle("height")) - 25)+"px")
				}else{
					$j("@name=valuex%").setStyle("width","22%")
					$j("@name=indexx%").setStyle("width","22%")
				}
				vir++

			}else if(vi <= 20 && vi < vir){
				var a = $j().sequence("array",$j("#tx1[a]"))
				var as = a[1].toString()
				var al = as.split(",").length
				//alert(as.split(",").length)
				if(al > 3){
					var nvi = vi + 1
					$j("#tx1["+(al - 1)+","+(al - 2)+"]").detach()
					vir--
				}
			}
		}
		$j("?number").after("change",function(e){
			var vi = $j(this).embedded()
			//setTimeout(function(){
			   STEP(vi)
			//},200)
		}).after("focusout",function(e){
			var vi = $j(this).embedded()
			//alert(vi+ " = "+ vir)
			if(vi > vir){
				for(var i = 1; i <= vi; i++){
					STEP(i)
				}
			}else{
				for(var i = vir; i >= vi; i--){
					STEP(i)
				}
			}
		})


	//=====================================================================================================================================

		$j("?database").after("keydown",function(e){
			if(e.which == 13){
				var v = $j(this).embedded()
				if(v != "" && v != " "){
				  var el = $j(this)
				  GET(v)
				}
			}
		})

	//==================================================================================================
	var clicked = false, clicked1 = false, clicked2 = false, clicked3 = false, clicked4 = false;
		$j("@data-e=e0").after("mouseenter",function(){
			BUTTON_HOVER_($j(this))
		}).after("mouseleave",function(){
			BUTTON_HOVER_0($j(this))
		}).after("click",function(e){
			//alert(DB)
			if(DB === undefined){
				DB = "../DPDB"
			}

			e.stopPropagation()
			if($j(this).attribute("title") == "Remove"){
				if(DB.trim() != "../DPDB" || DB.trim() != "DPDB"){
					 if (confirm("Are you sure you want to delete "+DB.trim()+"?") == true) {
							$j().ASYNCPOST("ajax_.php", {delete_database:true,D:DB}, function(dat){
								//alert(dat)
								var sdb = DB.split("/");
								var sd = 0;
								for(var i = 0; i < sdb.length - 1; i++){
									if(sd == 0){
										sd = sdb[i]
									}else{
									   sd = sd+"/"+sdb[i]
									}
								}
								//alert(sd)
								$j(".hrr-2").embed("")
								$j("?database").embed("")
								$j("#body").embed("")
								GET(sd)
								//DB = dat[0]
							})
					 }
				}
			}
			var db = DB.split("/")
			if($j(this).attribute("title") == "Edit Name"){
				if(DB.trim() != "../DPDB"){
					clicked = false;
					var d = db[db.length - 1].split(".")
					$j("?editx1").embed("")
					$j("?editx1").embed(d[0])
					$j("#tx0").WINDOW(WOH,$j(this),function(){
						if(clicked == false){
							$j().ASYNCPOST("ajax_.php", {edit_database:$j("?editx1").embedded(),D:DB}, function(dat){
								//alert(dat)
								$j("?database").embed(dat[0])
								DB = dat[0]
								GET(DB)
								clicked = true
							})
						}
					})
				}
			}
			if($j(this).attribute("title") == "Append File"){
				clicked1 = false;
				var n = $j(this).attribute("data-n");
				//$j("?append").embed(n.trim())
				//alert(DB)

				if(DB.search(".php") > 0){
					$j("?file").embed("")
					$j("?file").embed(DB)
					$j("?file").setStyle("opacity","0.5").disabled(true)
				}else{

				}
				$j("#tx1").WINDOW(WOH,$j(this),function(){
					if(clicked1 == false){
						$j().ASYNCPOST("ajax_.php", $j("#tx1").sequence({D:DB}), function(dat){
							//alert(dat)
							GET(DB)
							clicked1 = true;
						})
					}
				})
			}

			if($j(this).attribute("title") == "Add Database"){
				clicked4 = false
				function GETD0(v){
					$j("?adddb").embed("")
					 if (confirm("Are you sure you want to create "+v+"?") == true) {
						$j().ASYNCPOST("ajax_.php", {add_database:v}, function(dat){
							//alert(dat)
							GETDD()
							GET(DB)
						})
					 }
				}
				$j("#tx2").WINDOW(WOH,$j(this),function(){
					//alert($j("?adddb2").embedded())
					if(clicked4 == false){
					   GETD0(DB+"/"+$j("?adddb2").embedded())
					   clicked4 = true;
					}
				})
			}
		})

	//=================================================================================================
		function GETDD(){
			$j().ASYNCPOST("ajax_.php", {get_database2:true}, function(dat){
					var sp = dat[0].split("-*")
					var sep = [], se = [], s = [];
					$j("#body").embed("")
					for(var i = 0; i < sp.length; i++){
						if(sp[i] != " " && sp[i] != ""){
						   $j("#body").affix("end","<div style='margin:1.1% 1% 0% 1%; width:10%; cursor:pointer;' class='hrrx'>"+
						   sp[i]+"</div>")
						}
					}
					$j("#body[a]").enhance({reflect:false, shadow:"spread5d", border:25, percent:20, radius:5, rest:"darker+"}).setStyle("height","40px")
					$j("#body[a]").after("mouseenter",function(){
						BUTTON_HOVER_($j(this))
					}).after("mouseleave",function(){
						BUTTON_HOVER_0($j(this))
					}).after("click",function(){
						  var t = $j(this).embedded()
						  $j("?database").embed("")
						  $j("?database").embed(t)
						  GET(t)
						  //$j("#t2").OVERLAY("close")
						  $j("#t2").WINDOW("close")
					})
			})
		}

		$j(".hrr0").after("mouseenter",function(){
			BUTTON_HOVER_($j(this))
		}).after("mouseleave",function(){
			BUTTON_HOVER_0($j(this))
		}).after("click",function(e){
			//$j("#t2").OVERLAY()
			e.stopPropagation()
			/*
			$j("#t2").WINDOW(WOH,$j(this),function(){
				//$j("?edit").embedded()
			})
			*/
			GETDD()
		})

		function GETD(v){
			$j("?adddb").embed("")
			 if (confirm("Are you sure?") == true) {
				$j().ASYNCPOST("ajax_.php", {add_database:v}, function(dat){
					//alert(dat)
					GETDD()
				})
			 }
		}

		$j("?adddb").after("keydown",function(e){
			if(e.which == 13){
				var v = $j(this).embedded()
				if(v != "" && v != " "){
				  var el = $j(this)
				  GETD(v)
				}
			}
		}).setStyle("width","93.5%")

		}else{
		   $j().navTo("secure")
		}

	})

})
