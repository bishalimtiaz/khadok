<?php
	require '../php/config.php';
	include 'sidenav.php';


	if($_SESSION['logged_in']==1){
		$password=$_SESSION['pass'];
		$username=$_SESSION['user'];
	}
	
	
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Khadok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/homepage2.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<style type="text/css">
		#login{
			position: absolute;
			font-family: 'Pacifico', cursive;
			font-size: 2.4vw;
			border-radius: 50px;
			background-color: transparent;
			padding-left: 3%;
			padding-right: 3%;
			border: 3px solid #acacac;
			font-weight: bold;
			top: 6%;
			left: 80%;
			color: white;
		}

		#login:hover{
			background-color: white;
			color:purple;
			border-color: orange;
		}

	</style>
</head>
<body>

	<div class="parallax" id="bod">

		<?php 
			if($_SESSION['logged_in']==1){
		?>
		<span id="opn" style="position: fixed;" onclick="openNav()"><i class="fas fa-ellipsis-v" id="bar"></i></span>
		<div class="srch">
			<i class="fas fa-search" onclick="searchIcon()"></i>
			
		</div>

		<?php } ?>

		<?php 
			if($_SESSION['logged_in']==0){
		?>

		<button id="login" onclick="goLogin()">Login</button>

		<?php } ?>

		

		

		<div class="logo">
			<h1 class="rName">KHADOK</h1>
			
		</div>

		<div class="nav">
			<button id="nav1" onclick="initScroll('ofrf');return false;">Foods</button>
			<button id="nav2" onclick="initScroll('rrrd');return false;">Resturants</button>
			<button id="nav3" onclick="initScroll('ofrd');return false;">Offers</button>
		</div>
		<input type="text" name="hide" id="hdn" style="display: none;">

		<div class="addResturant" id="ar">
		<img src="../images/chef.png" class="icon bounceIn animated">
		<div  class="divclose"><a href="javascript:void(0)" class="closebtn" onclick="closeNavs('ar')">&times;</a></div>

		<form class="addForm" name="addResturantForm" enctype="multipart/form-data">

			<fieldset class="firstField" id="ff">

					<div id="ff2">Your Password</div>
					<div id="ff3"><input type="password" name="upass" placeholder="Password"></div>

					<div id="ff4">Enter Your Resturant Id</div>
					<div id="ff5"><input type="password" name="resid" placeholder="Resturant Id"></div>

					<div id="ff6"><input type="button" name="" value="Go" onclick="nextFirst('ff','myres')"></div>
				
			</fieldset>
			
		</form>
	</div>
		
	</div>

	<div class="srch2" id="sr">
			
			<form name="searchForm">
				<input type="radio" name="opt" id="rd1" value="food" onclick="selects()">

				<label for="rd1" id="lb1" style="font-weight: bold;font-size: 2.5vw;color: gray;">Food</label>

				<input type="radio" name="opt" id="rd2" value="resturant" onclick="selects()">

				<label for="rd2" id="lb2" style="font-weight: bold;font-size: 2.5vw;color: gray;">Resturant</label>

			<input type="text" name="search" placeholder="Search" style="display: block;" class="srchbox" onkeyup="showHint(this.value)" onkeypress="press(event)">

			
			</form>

			<div class="suggest" style="height: 380px;overflow-x: hidden;">
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
				<span class="txtHint" onclick="setvalue(this)"></span>
			</div>
			
		</div>

	<div class="food" id="ofrf">
		<div class="menu">
			<h1 class="rName">Menu</h1>
		</div>

		<figure>
			<?php
				/*$rd=$_COOKIE["rid"];
				$count=0;*/
				$select_query="select * from food order by foodRating desc;";
				$select_query_run=mysqli_query($con,$select_query);

					if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							$fn=$row["foodName"];
							$fc=$row["foodCategory"];
							$fimg=$row["food_image"];
							$fp=$row["price"];
							$fr=$row["foodRating"];
							$fd=$row["food_id"];
							$restid=$row["resturant_id"];

							$restnm="";


							?>
							<div class="foodItem" onmouseover="rateenter(this)" onmouseout="rateout(this)" >
								<img onmouseenter="mouseenter(this)" onmouseout="mouseOut(this)" src="../images/food/<?php echo $fimg; ?>" id="fmg">
								<i class="fa fa-heart" id="hrt" onmouseenter="mouseenterInfo(this)" onmouseout="mouseOutInfo(this)" style="display: none; font-size: 4vw;" onclick="fav()"></i>

								<h4 class="rfid" style="display: none;"><?php echo $restid; ?></h4>
								<h4 class="fid" style="display: none;"><?php echo $fd; ?></h4>

								<h4 class="fn" style="font-size: 1.2vw;">Name : <span><?php echo $fn; ?></span> </h4>
								<h4 class="cat">Category : <?php echo $fc; ?></h4>
								<?php
									$slct="select resturantName from resturant where resturant_id='$restid'";
									$slct_qry=mysqli_query($con,$slct);
									if (mysqli_num_rows($slct_qry) > 0){
										while($mrow = mysqli_fetch_assoc($slct_qry)){
											$restnm=$mrow["resturantName"];
										}
									}
								?>
								<h4 class="rtnm">Resturant : <?php echo $restnm; ?></h4>
								<h4 class="prc">Price :<span><?php echo $fp; ?></span> </h4>

								<h4 class="rtng">Rating : &nbsp<span><?php echo $fr; ?></</span>/10</h4>

								

								<fieldset class="rating" style="padding: 0;">


									    <input type="radio" id="star10" class="star10" name="rating" value="10" oninput="rate(this)"/>
									    <label class ="full" for="star10" ></label>

									    <input type="radio" id="star9half" class="star9half" name="rating" value="9.5" oninput="rate(this)"/>
									    <label class="half" for="star9half" ></label>

									    <input type="radio" id="star9" class="star9" name="rating" value="9" oninput="rate(this)"/>
									    <label class = "full" for="star9" ></label>

									    <input type="radio" id="star8half" class="star8half" name="rating" value="8.5" oninput="rate(this)"/>
									    <label class="half" for="star8half" ></label>

									    <input type="radio" id="star8" class="star8" name="rating" value="8" oninput="rate(this)"/>
									    <label class = "full" for="star8" ></label>

									    <input type="radio" id="star7half" class="star7half" name="rating" value="7.5"oninput="rate(this)"/>
									    <label class="half" for="star7half" ></label>

									    <input type="radio" id="star7" class="star7" name="rating" value="7" oninput="rate(this)"/>
									    <label class = "full" for="star7" ></label>

									    <input type="radio" id="star6half" class="star6half" name="rating" value="6.5" oninput="rate(this)" />
									    <label class="half" for="star6half" ></label>

									    <input type="radio" id="star6" class="star6" name="rating" value="6" oninput="rate(this)"/>
									    <label class = "full" for="star6" ></label>

									    <input type="radio" id="star5half" class="star5half" name="rating" value="5.5" oninput="rate(this)"/>
									    <label class="half" for="star5half" ></label>

									    <!-- hgjk -->

									    <input type="radio" id="star5" class="star5" name="rating" value="5" oninput="rate(this)"/>
									    <label class = "full" for="star5" ></label>

									    <input type="radio" id="star4half"  class="star4half" name="rating" value="4.5" oninput="rate(this)"/>
									    <label class="half" for="star4half" ></label>

									    <input type="radio" id="star4" class="star4" name="rating" value="4" oninput="rate(this)"/>
									    <label class = "full" for="star4" ></label>

									    <input type="radio" id="star3half" class="star3half" name="rating" value="3.5" oninput="rate(this)"/>
									    <label class="half" for="star3half" ></label>

									    <input type="radio" id="star3" class="star3" name="rating" value="3" oninput="rate(this)"/>
									    <label class = "full" for="star3" ></label>

									    <input type="radio" id="star2half" class="star2half" name="rating" value="2.5" oninput="rate(this)"/>
									    <label class="half" for="star2half" ></label>

									    <input type="radio" id="star2" class="star2" name="rating" value="2" oninput="rate(this)"/>
									    <label class = "full" for="star2" ></label>

									    <input type="radio" id="star1half" class="star1half" name="rating" value="1.5" oninput="rate(this)"/>
									    <label class="half" for="star1half" ></label>

									    <input type="radio" id="star1" class="star1" name="rating" value="1" oninput="rate(this)"/>
									    <label class = "full" for="star1" ></label>

									    <input type="radio" id="starhalf" class="starhalf" name="rating" value="0.5" oninput="rate(this)"/>
									    <label class="half" for="starhalf" ></label>

									</fieldset>

									
			
							</div>

				<?php	}

				}
			?>

		</figure>
		
	</div>

	<div class="resturants" id="rrrd" >
		<div class="menu">
			<h1 class="rName">Resturants</h1>
		</div>

		<figure>
			<?php
				
				$select_query="select * from resturant;";
				$select_query_run=mysqli_query($con,$select_query);

					if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							$resname=$row["resturantName"];
							$reslcn=$row["resturantLocation"];
							$resimg=$row["resturantLogo"];
							$respn=$row["phoneNumber"];
							$resid=$row["resturant_id"];

							?>

							<div class="resitem" onclick="gores(this)" onmouseover="resover(this)">
								<img  src="../images/resturant/<?php echo $resimg; ?>" id="fmg">
								<h4 class="fn" style="font-size: 1.2vw;"><span><?php echo $resname; ?></span> </h4>
								<h4 class="cat">Location : <?php echo $reslcn; ?></h4>
								<h4 class="rtnm">Contac No : <?php echo $respn; ?></h4>
								<h4 style="display: none;"><?php echo $resid; ?></h4>
							</div>

				<?php	}

				}
			?>
		</figure>
		
	</div>

	<div class="offer" id="ofrd">
		<div class="ofr">
			<h1 class="oName">Offers</h1>
		</div>
		<figure>
			<?php

				$select_query="select * from offer;";
				$select_query_run=mysqli_query($con,$select_query);
				if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							$ofd=$row["offerDate"];
							$ofid=$row["offer_id"];
							$oimg=$row["offer_image"];
							$otxt=$row["txt"];

							$ores=$row["resturant_id"];
							$ofrresname="";

							$select_res="select resturantName from resturant where resturant_id='$ores';";
							$select_res_run=mysqli_query($con,$select_res);


							if (mysqli_num_rows($select_res_run) > 0){

								while($rows = mysqli_fetch_assoc($select_res_run)){
									$ofrresname=$rows["resturantName"];
								}
						}		
			 ?>

			 <div class="offerItem">

				<img src="../images/offer/<?php echo $oimg; ?>">

				<h4 class="oid" style="display: none;"><?php echo $ofid; ?></h4>
				<h4 class="on" style="font-size: 1.2vw;"><?php echo $ofd; ?></h4>
				<h4 class="orr" style="font-size: 1.2vw;"><?php echo $ofrresname; ?></h4>

				<div class="ov">
					 <p class="oat"><?php echo $otxt; ?></p>
				</div>
				
			</div>

			<?php	}

				}
			?>

		</figure>
		
	</div>



	<script type="text/javascript">

		var fname="";

		var offerid=""

		var foodid="";

		var resturantid="";
		var myResturantId="";

		var offerdiv;

		var fooddiv;

		var marginY=0;
		var destination=0;
		var speed=15;
		var scroller=null;

		var sc=0;

		function press(event){
			var x = event.which || event.keyCode;
			if(x==13){

				var name=document.forms["searchForm"]["search"].value;
				var option=document.forms["searchForm"]["opt"].value;

				var xhttp;

				if (window.XMLHttpRequest) {

					xhttp = new XMLHttpRequest();
				} 

				 else {
					    
				    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}

				/*alert(types);*/

				xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText; */
	      				document.getElementById("hdn").value=this.responseText;
		      			var txt = document.getElementById("hdn").value;

	      				if(txt.trim()=="session set"){
	      					window.location.replace("../html/search.php");
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/srch.php?nm="+ name + "&opn=" + option , true);
	  			xhttp.send();
			}

		}

		function goLogin(){
			window.location.replace("../html/login.html");
		}

		

		
		function resover(x){
			myResturantId=x.lastElementChild.innerHTML;
		}

		function mouseenter(x) {
			x.style.filter = "contrast(20%)";
	   		x.nextElementSibling.style.display = "block";
		}

		function mouseOut(x) {
		    x.nextElementSibling.style.display = "none";
		    x.style.filter = "contrast(100%)";
		}

		function mouseenterInfo(y) {
	   		y.previousElementSibling.style.filter = "contrast(20%)";
	    	y.style.display = "block";
	    	y.style.color = "red";
		}

		function mouseOutInfo(y) {
			y.previousElementSibling.style.filter = "contrast(100%)";
			y.style.color = "silver";

		}

		function rateenter(x){

			/*x.style.backgroundColor="red";*/
			x.lastElementChild.style.display="block";
			

			fname=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.innerHTML;
			/*x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="inline-block";*/
			


			fooddiv=x;
			foodid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

			resturantid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

			/*alert(resturantid);*/

		}


		function gores(x){

			var logout="<?php echo $_SESSION['logged_in'] ?>"
			if (logout==1) {

				var xhttp;

				var types="gores";

				if (window.XMLHttpRequest) {

					xhttp = new XMLHttpRequest();
				} 

				 else {
					    
				    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}


				xhttp.onreadystatechange = function() {
		   				 if (this.readyState == 4 && this.status == 200) {
		      				document.getElementById("hdn").value=this.responseText;
		      				var txt = document.getElementById("hdn").value;


		      				if (txt.trim()=="Complete") {
		      					window.location.replace("../html/myResturant2.php");
		      				}

		    			}
		  			};

		  			xhttp.open("POST", "../php/false.php?tp="+ types + "&id=" + myResturantId , true);
		  			xhttp.send();
			}
			else{
				alert("You Must Log In To View This Resturant Foods And Offers");
			}
			
		}


		function rateout(x){
			x.lastElementChild.style.display="none";
			/*x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="none";*/
		}

		function rate(x){
			/*alert(x.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML);*/
			/*alert(fname);*/

			var logout="<?php echo $_SESSION['logged_in'] ?>"

			if (logout==1) {
				var rt= x.value;
				var rid= resturantid;
				var fn=fname;

				var xhttp;

				if (window.XMLHttpRequest) {

					xhttp = new XMLHttpRequest();
				} 

				 else {
					    
				    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}

				/*alert(rid);*/


				xhttp.onreadystatechange = function() {
		   				 if (this.readyState == 4 && this.status == 200) {
		      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
		      				document.getElementById("hdn").value=this.responseText;
		      				var txt = document.getElementById("hdn").value;


		      				if (txt.trim()=="You Already Rate This Food") {
		      					alert(txt.trim());
		      				}
		      				else if (txt.trim()>=0 && txt.trim()<=10){
		      					alert("Thank You For Rate It");
		      					

		      				}
		      				else{
		      					alert(txt.trim());
		      				}

		    			}
		  			};

		  			xhttp.open("POST", "../php/rate.php?id="+ rid + "&rt=" + rt + "&fn=" + fn , true);
		  			xhttp.send();
			}

			else{
				alert("You Must Log In To Rate This Food");
			}
		}

		function fav(){

			var logout="<?php echo $_SESSION['logged_in'] ?>"

			if(logout==1){
				var xhttp;

				if (window.XMLHttpRequest) {

					xhttp = new XMLHttpRequest();
				} 

				 else {
					    
				    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}



				xhttp.onreadystatechange = function() {
		   				 if (this.readyState == 4 && this.status == 200) {
		      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
		      				document.getElementById("hdn").value=this.responseText;
		      				var txt = document.getElementById("hdn").value;

		      				alert(txt.trim());

		    			}
		  			};

		  			xhttp.open("POST", "../php/favourite.php?fid="+ foodid , true);
		  			xhttp.send();
				}

				else{
					alert("You Must Log In To To Make Your Favourite List");
				}
			
		}

		function initScroll(elementId){
			destination=document.getElementById(elementId).offsetTop;
			//console.log(destination);
			scroller=setTimeout(function(){
				initScroll(elementId);
			},1);

			marginY=marginY+speed;

			if(marginY >=destination){
				clearTimeout(scroller);
			}

			window.scroll(0,marginY);

			window.onbeforeunload = function () {
			  window.scrollTo(0, 0);
			}
		}

		function closeNavs(elementId){
			document.getElementById(elementId).style.display="none";
			document.getElementById("mySidenav").style.display="block";
		}

		function nextFirst(elementId,types){
			var x = document.forms["addResturantForm"]["upass"].value;
			var y = document.forms["addResturantForm"]["resid"].value;
			var z="<?php echo $_SESSION['pass']; ?>"


			if(x!=z){
				document.forms["addResturantForm"]["upass"].value="";
				document.forms["addResturantForm"]["upass"].style.border="3px solid red";
				alert("Wrong Password");
			}

			else{

				var xhttp;

				if (window.XMLHttpRequest) {

					xhttp = new XMLHttpRequest();
				} 

				 else {
					    
				    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}

				xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
	      				document.getElementById("hdn").value=this.responseText;
	      				var txt = document.getElementById("hdn").value;


	      				if (txt.trim()=="Go To Your Resturant") {
	      					document.forms["addResturantForm"]["resid"].style.border="3px solid #555";
	      					window.location.href="../html/myResturant.php";
	      				}

	      				else if (txt.trim()=="Resturant Id Doesn't Match") {
	      					document.forms["addResturantForm"]["upass"].style.border="3px solid #555";
							document.forms["addResturantForm"]["resid"].style.border="3px solid red";
							document.forms["addResturantForm"]["resid"].value="";

							alert(txt.trim());
	      				}

	      				else{
	      					alert(txt.trim());
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/resturant.php?rid="+ y + "&uid=" + x +"&tp=" + types , true);
	  			xhttp.send();

			}
		}

		function searchIcon(){
			if(sc==0){
				document.getElementById("bod").style.filter="contrast(10%)";
				document.getElementById("bod").style.filter="brightness(10%)";
				document.getElementById("sr").style.display="block";
				sc=1;
			}

			else if(sc==1){
				document.getElementById("bod").style.filter="contrast(100%)";
				document.getElementById("bod").style.filter="brightness(100%)";
				document.getElementById("sr").style.display="none";
				sc=0;
			}
		}


		function showHint(str) {

			var x=document.forms["searchForm"]["opt"].value;
		  	var xhttp;
		 	if (str.length == 0) { 
		    	var z = document.getElementsByClassName("txtHint")
		    	z[0].innerHTML="";
		    	z[1].innerHTML="";
		    	z[2].innerHTML="";
		    	z[3].innerHTML="";
		    	z[4].innerHTML="";
		    	z[5].innerHTML="";
		    	z[6].innerHTML="";
		    	z[7].innerHTML="";
		    	z[8].innerHTML="";
		    	z[9].innerHTML="";
		    	return;
		  	}

		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var z = document.getElementsByClassName("txtHint")
		    	var res ="";
		    	res= this.responseText.split(",");
		    	z[0].innerHTML="";
		    	z[1].innerHTML="";
		    	z[2].innerHTML="";
		    	z[3].innerHTML="";
		    	z[4].innerHTML="";
		    	z[5].innerHTML="";
		    	z[6].innerHTML="";
		    	z[7].innerHTML="";
		    	z[8].innerHTML="";
		    	z[9].innerHTML="";

		      	for (var i = 0; i < res.length; i++) {

		      		if(i>9){
		      			break;
		      		}

		      		z[i].innerHTML =res[i] ;
		      		
		      	}
		    }
		  };
		  xhttp.open("POST", "../php/gethint.php?q="+str + "&sg=" + x, true);
		  xhttp.send();   
	}


	function selects(){
		var x=document.getElementById("rd1").checked;
		var y=document.getElementById("rd2").checked;

		if(x==true){
			document.getElementById("lb1").style.color="white";
		}

		else if(x==false){
			document.getElementById("lb1").style.color="gray";
		}

		if(y==true){
			document.getElementById("lb2").style.color="white";
		}

		else if(y==false){
			document.getElementById("lb2").style.color="gray";
		}
		
	}

	function setvalue(p){
		document.forms["searchForm"]["search"].value=p.innerHTML;

		document.forms["searchForm"]["search"].focus();
	}


	</script>

</body>
</html>