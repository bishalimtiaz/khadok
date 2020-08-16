<?php
	require '../php/config.php';

	if(!isset($_COOKIE["rid"])){
		 header("Location: Homepage2.php");
    	exit;
	}
	
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Khadok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/myResturant.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">

</head>
<body id="myFrame">

	<div class="parallax">

		<?php
			if(isset($_COOKIE["rid"])){
		
				echo '<div class="dropdown" id="dd">
						<button id="nav4" >Edit</button>
						<div class="dropdown-content">
						    <p id="p1">Change Phone Number</p>
						    <p id="p2">Add Food Items</p>
						    <p id="p3">Give Offers</p>
						    <p id="p4">Change Resturant ID</p>
						 </div>

					</div>';

			}

		?>



		<div class="logo"><h1 class="rName">
			<?php
				$rd=$_COOKIE["rid"];
				$select_query="select resturantName from resturant where resturant_id='$rd';";
				$select_query_run=mysqli_query($con,$select_query);
				if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							echo $row["resturantName"];
						}
				}
			?>
		</h1></div>

		<div class="nav">
			<button id="nav1" onclick="goHome()">Home</button>
			<button id="nav2" onclick="initScroll('ofrf');return false;">Menu</button>
			<button id="nav3" onclick="initScroll('ofrd');return false;">Offers</button>
		</div>


			<!-- Form -->

		<div class="addResturant" id="ar">

		<img src="../images/chef.png" class="icon bounceIn animated">
		
		<div  class="divclose"><a href="javascript:void(0)" class="closebtn" onclick="closeNav('ar')">&times;</a></div>

		<form class="addForm" name="addResturantForm" enctype="multipart/form-data">
			<input type="text" name="hide" id="hdn" style="display: none;">

			<fieldset class="firstField" id="ff">

					<div id="ff2">Enter Resturant Id</div>
					<div id="ff3"><input type="password" name="mresPass" placeholder="Resturant ID"></div>

					<div id="ff4">Enter New Contact No</div>
					<div id="ff5"><input type="text" name="contact" placeholder="Phone No" maxlength="11"></div>

					<div id="ff6"><input type="button" name="" value="Add" onclick="nextFirst('ff','first')"></div>
				
			</fieldset>


			<fieldset id="sf" class="secondfield">

					<div id="sflogo">
						<img id="rimg" src="../images/resturant/fooditem.png">
					</div>

					<label id="sf10">Upload Photo
						<div id="sf3"><input type="file" name="fileo" id="fileo" oninput="loadfunc('fileo','rimg')"></div>
					</label>

					<!-- <div id="sf4">Location</div> -->
					<div id="sf5"><textarea name="offer" placeholder="Aa"></textarea> </div>

					<!-- <div id="sf6">Contact No.</div>
					<div id="sf7"><input type="text" name="phone" placeholder="Phone No." maxlength="11"></div> -->
					
					<div id="sf8">
						<input id="sf9" type="button" name="" value="Post" onclick="nextSecond('sf','second')">
					</div>
					
				</fieldset>



				<fieldset id="tf" class="thirdfield">
					<div id="tf2">Enter Old Resturant Id</div>
					<div id="tf3"><input type="password" name="myresPass" placeholder="Old Resturant ID"></div>

					<div id="tf4">Enter New Resturant Id</div>
					<div id="tf5"><input type="password" name="nresPass" placeholder=" New Resturant ID"></div>

					<div id="tf6">Confirm Resturant Id</div>
					<div id="tf7"><input type="password" name="cresPass" placeholder="Confim Resturant ID"></div>

					
					<div id="tf8" >
						
						<input id="tf9" type="button" name="" value="Change" onclick="nextThird('tf','third')">
					</div>
					
				</fieldset>


				<fieldset id="frf" class="fourthfield">

					<div id="frflogo">
						<img id="fimg" src="../images/food/fooditem.png">
					</div>

					<label id="frf10">Upload Food Image
						<div id="frf3"><input type="file" name="filef" id="filef" oninput="loadfunc('filef','fimg')"></div>
					</label>

					<div id="frf4">Food Name</div>
					<div id="frf5"><input type="text" name="foodName" placeholder="Food Name"></div>

					<div id="frf6">Food Category</div>
					<div id="frf7"><input type="text" name="foodCategory" placeholder="Food Category"></div>

					<div id="frf11">Price</div>
					<div id="frf12"><input type="text" name="price" placeholder="Price"></div>
					
					<div id="frf8">
						<!-- <input id="frf9" type="button" name="" value="Previous" onclick="Previous('sf')"> -->
						<input id="frf9" type="button" name="" value="Add" onclick="nextFourth('frf','fourth')">
					</div>
					
				</fieldset>
			
		</form>
		
	</div>

		
	</div>

	<div class="food" id="ofrf">
		<div class="menu">
			<h1 class="rName">Menu</h1>
		</div>
		<figure>
			
			<?php
				$rd=$_COOKIE["rid"];
				$count=0;
				$select_query="select * from food where resturant_id='$rd';";
				$select_query_run=mysqli_query($con,$select_query);

					if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							$fn=$row["foodName"];
							$fc=$row["foodCategory"];
							$fimg=$row["food_image"];
							$fp=$row["price"];
							$fr=$row["foodRating"];
							$fd=$row["food_id"];


							?>
							<div class="foodItem" onmouseover="rateenter(this)" onmouseout="rateout(this)">

								
								<?php 
									if (!isset($_COOKIE["rid"])) {
										# code...
								?>
								<img onmouseenter="mouseenter(this)" onmouseout="mouseOut(this)" src="../images/food/<?php echo $fimg; ?>" id="fmg">
								<i class="fa fa-heart" id="hrt" onmouseenter="mouseenterInfo(this)" onmouseout="mouseOutInfo(this)" style="display: none;"></i>
								<?php } ?>

								<?php
									if (isset($_COOKIE["rid"])) {
								 ?>

								 <img src="../images/food/<?php echo $fimg; ?>" id="fmg">
								 <?php } ?>

								 <h4 class="fid" style="display: none;"><?php echo $fd; ?></h4>

								<h4 class="fn" style="font-size: 1.2vw;">Name : <span><?php echo $fn; ?></span> <?php
									    if (isset($_COOKIE["rid"])) {
									 ?>
									     <i style="display: none;" class="so far fa-trash-alt" onclick="deletes('foodDelete')"></i>
									<?php } ?> </h4>

								<h4 class="cat">Category : <?php echo $fc; ?></h4>
								<h4 class="prc">Price :<span><?php echo $fp; ?></span> </h4>

								<h4 class="rtng">Rating : &nbsp<span><?php echo $fr; ?></</span>/10</h4>

								

								<fieldset class="rating">


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


		<!-- dfghj -->
	</div>


	<div class="offer" id="ofrd">
		<div class="ofr">
			<h1 class="oName">Offers</h1>
		</div>

		<figure>

			<?php

				$rd=$_COOKIE["rid"];
				$select_query="select * from offer where resturant_id='$rd';";
				$select_query_run=mysqli_query($con,$select_query);
				if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							$ofd=$row["offerDate"];
							$ofid=$row["offer_id"];
							$oimg=$row["offer_image"];
							$otxt=$row["txt"];
			 ?>

			<div class="offerItem" onmouseover="deleteenter(this)" onmouseout="deleteout(this)">

				<img src="../images/offer/<?php echo $oimg; ?>">

				<h4 class="oid" style="display: none;"><?php echo $ofid; ?></h4>
				<h4 class="on" style="font-size: 1.2vw;"><?php echo $ofd; 
				if (isset($_COOKIE["rid"])) { ?> <i class="far fa-trash-alt" onclick="deletes('offerDelete')"></i> <?php } ?> </h4>

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
		var offerdiv;
		var fooddiv;
		var marginY=0;
		var destination=0;
		var speed=15;
		var scroller=null;

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

		function goHome(){
			window.location.replace("../html/Homepage2.php");
		}

		function deleteenter(x){
			x.lastElementChild.previousElementSibling.firstElementChild.style.display="inline-block";
			offerid=x.lastElementChild.previousElementSibling.previousElementSibling.innerHTML;
			offerdiv=x;
		}

		function deleteout(x){
			x.lastElementChild.previousElementSibling.firstElementChild.style.display="none";
		}


		function rateenter(x){
			/*x.style.backgroundColor="red";*/
			x.lastElementChild.style.display="block";

			fname=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.innerHTML;
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="inline-block";

			fooddiv=x;
			foodid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

		}


		function rateout(x){
			x.lastElementChild.style.display="none";
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="none";
		}


		function deletes(types){

			var rid= "<?php echo $_COOKIE["rid"]; ?>"
			var xhttp;

			if (window.XMLHttpRequest) {

				xhttp = new XMLHttpRequest();
			} 

			 else {
				    
			    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if (txt.trim()=="Offer Successfully Deleted") {
	      					offerdiv.style.display="none";
	      				}

	      				else if (txt.trim()=="Food Successfully Deleted") {
	      					fooddiv.style.display="none";
	      				}

	      				else{
	      					alert("Something Went Wrong");
	      					

	      				}

	    			}
	  			};

	  			if (types=="offerDelete") {
	  				xhttp.open("POST", "../php/delete.php?id="+ rid + "&offerid=" + offerid + "&tp=" + types , true);
	  				xhttp.send();
	  			}

	  			else if (types=="foodDelete") {
	  				xhttp.open("POST", "../php/delete.php?id="+ rid + "&foodid=" + foodid + "&tp=" + types , true);
	  				xhttp.send();
	  			}

		}

		function rate(x){
			/*alert(x.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML);*/
			/*alert(fname);*/

			var rt= x.value;
			var rid= "<?php echo $_COOKIE["rid"]; ?>"
			var fn=fname;

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
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if (txt.trim()=="You Already Rate This Food") {
	      					alert(txt.trim());
	      				}
	      				else if (txt.trim()>=0 && txt.trim()<=10){
	      					alert("Thank You For Rate It");
	      					

	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/rate.php?id="+ rid + "&rt=" + rt + "&fn=" + fn , true);
	  			xhttp.send();
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

		document.getElementById("p1").addEventListener("click", editone);
		document.getElementById("p2").addEventListener("click", edittwo);
		document.getElementById("p3").addEventListener("click", editthree);
		document.getElementById("p4").addEventListener("click", edifour);

		function editone(){
			document.getElementById("ar").style.display="block";
			document.getElementById("ff").style.display="block";
			document.getElementById("frf").style.display="none";
			document.getElementById("sf").style.display="none";
			document.getElementById("tf").style.display="none";

			document.getElementById("dd").style.display="none";
		}

		function edittwo(){
			document.getElementById("ar").style.display="block";
			document.getElementById("ff").style.display="none";
			document.getElementById("frf").style.display="block";
			document.getElementById("sf").style.display="none";
			document.getElementById("tf").style.display="none";
			document.getElementById("dd").style.display="none";
		}

		function editthree(){
			document.getElementById("ar").style.display="block";
			document.getElementById("ff").style.display="none";
			document.getElementById("frf").style.display="none";
			document.getElementById("sf").style.display="block";
			document.getElementById("tf").style.display="none";
			document.getElementById("dd").style.display="none";
		}

		function edifour(){
			document.getElementById("ar").style.display="block";
			document.getElementById("ff").style.display="none";
			document.getElementById("frf").style.display="none";
			document.getElementById("sf").style.display="none";
			document.getElementById("tf").style.display="block";
			document.getElementById("dd").style.display="none";
		}


		var xhttp;

		if (window.XMLHttpRequest) {

			xhttp = new XMLHttpRequest();
		} 

		 else {
			    
		    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		function nextFirst(elementId,types){
			var x = document.forms["addResturantForm"]["mresPass"].value;
			var y = document.forms["addResturantForm"]["contact"].value;

			/**/
  			var ps= "<?php echo $_COOKIE["rid"]; ?>"

  			if(y==""){
  				alert("Please Insert A phone Number");
  				document.forms["addResturantForm"]["contact"].style.border="3px solid red";
  			}

  			else{
  				if(x!=ps){
  				alert("your Resturant Id Doesn't Match");
  				document.forms["addResturantForm"]["mresPass"].value="";
  				document.forms["addResturantForm"]["mresPass"].style.border="3px solid red";
  				document.forms["addResturantForm"]["contact"].style.border="3px solid #555"
  				/*document.forms["addResturantForm"]["cresPass"].style.border="3px solid #555";*/
  			}



  			else{
  				


				 xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if(txt.trim() == "not success"){
	      					alert(txt.trim());
	      				}


	      				else if(txt.trim() == "Contact Number Updated Successfully"){
	      					alert(txt.trim());
	      					document.getElementById("ar").style.display="none";
							document.getElementById("ff").style.display="none"
							document.getElementById("dd").style.display="block";
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/myrestu.php?id="+ x + "&pn=" + y + "&tp=" + types , true);
	  			xhttp.send();

	  			}
  			}

		}



		function loadfunc(elementId,sc){
			var y= "<?php echo $_COOKIE["rid"]; ?>"
			var file = document.getElementById(elementId).files[0];
			
			var nm = document.getElementById(elementId).name;
			/*alert(nm);*/
			var formdata = new FormData();

			formdata.append(elementId,file);

		

			xhttp.onreadystatechange = function() {
			 	if (this.readyState == 4 && this.status == 200) {

			 		document.forms["addResturantForm"]["hide"].value=this.responseText;
	      			var txt = document.forms["addResturantForm"]["hide"].value;
	      			if(txt.trim() == "Your file is too big"){
	      				alert(txt.trim());
	      			}

	      			else if(txt.trim() == "There was an error uploading your file"){
	      				alert(txt.trim());
	      			}

	      			else if(txt.trim() == "you cannot upload files of this type"){
	      				
	      				alert(txt.trim());
	      			}

	      			else{

	      				if (nm=="files") {
	      					var s="../images/resturant/" + txt.trim();
	      					document.getElementById(sc).src =s;
	      				}

	      				else if (nm=="filef") {
	      					var s="../images/food/" + txt.trim();
	      					document.getElementById(sc).src =s;
	      				}

	      				else if (nm=="fileo") {
	      					var s="../images/offer/" + txt.trim();
	      					document.getElementById(sc).src =s;
	      				}

	      			}
			 		
			 	}

			 };


  			xhttp.open("POST", "../php/resturant_image.php?id=" + y + "&nm=" +nm ,true);
	  		xhttp.send(formdata);

	  			
		}


		function nextFourth(elementId,types){
			var x = document.forms["addResturantForm"]["foodName"].value;
			var z = document.forms["addResturantForm"]["foodCategory"].value;
			var p = document.forms["addResturantForm"]["price"].value;
			var y= "<?php echo $_COOKIE["rid"]; ?>"
			/*var mr=document.getElementById("five").innerHTML;*/

			if (document.getElementById("filef").value=="") {
				alert("Please Choose An Image");
			}

			else if (x=="") {
				alert("Please Insert A food Name");
				document.forms["addResturantForm"]["foodName"].style.border="3px solid red";
			}

			else if (z=="") {
				alert("Please Insert A food Category");
				document.forms["addResturantForm"]["foodCategory"].style.border="3px solid red";
				document.forms["addResturantForm"]["foodName"].style.border="3px solid #555";
			}

			else if (p=="") {
				alert("Please Insert A food Price");
				document.forms["addResturantForm"]["price"].style.border="3px solid red";
				document.forms["addResturantForm"]["foodCategory"].style.border="3px solid #555";
			}


			else{
				xhttp.onreadystatechange = function() {
			 	if (this.readyState == 4 && this.status == 200) {
			 			document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;
	      				 if(txt.trim() == "yes"){

	      					alert("Food Item is Added Successfully");
	      					document.getElementById("ar").style.display="none";
							document.getElementById("frf").style.display="none";
							document.getElementById("dd").style.display="block";
	      				}

	      				else if(txt.trim() == "Your resturant already has this food item"){
	      					alert(txt.trim());
	      					document.forms["addResturantForm"]["foodName"].value="";
							document.forms["addResturantForm"]["foodCategory"].value="";
							document.forms["addResturantForm"]["price"].value="";
							document.forms["addResturantForm"]["foodName"].style.border="3px solid red";
							document.forms["addResturantForm"]["foodCategory"].style.border="3px solid red";
							document.forms["addResturantForm"]["price"].style.border="3px solid red";
							
	      				}

	      				else{
	      					alert(txt.trim());
	      				}

	      			}

			 };

  			xhttp.open("POST", "../php/myrestu.php?id=" + y + "&fn=" + x + "&fc=" + z + "&tp=" + types + "&fp=" + p,true);
	  		xhttp.send();
			}

		}


		function nextThird(elementId,types){
			var x = document.forms["addResturantForm"]["myresPass"].value;
			var y = document.forms["addResturantForm"]["nresPass"].value;
			var z = document.forms["addResturantForm"]["cresPass"].value;

			/**/
  			var ps= "<?php echo $_COOKIE["rid"]; ?>"

  			if (y=="") {
  				alert("Please Choose A New Resturant Id");
  				document.forms["addResturantForm"]["nresPass"].style.border="3px solid red";
  			}

  			else{
  				if(x!=ps){
  				alert("your Old Resturant Id Doesn't Match");
  				document.forms["addResturantForm"]["myresPass"].value="";
  				document.forms["addResturantForm"]["myresPass"].style.border="3px solid red";
  				document.forms["addResturantForm"]["nresPass"].style.border="3px solid #555";
  				/*document.forms["addResturantForm"]["cresPass"].style.border="3px solid #555";*/
  			}

  			else if (y!=z) {
  				alert("Resturant Id and Confirm Resturant Id Doesn't Match");
  				document.forms["addResturantForm"]["cresPass"].value="";
  				document.forms["addResturantForm"]["cresPass"].style.border="3px solid red";
  				document.forms["addResturantForm"]["myresPass"].style.border="3px solid #555";
  			}


  			else{
  				


				 xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if(txt.trim() == "not success"){
	      					alert(txt.trim());
	      				}


	      				else if(txt.trim() == "Resturant Id Updated Successfully"){
	      					alert(txt.trim());
	      					document.getElementById("ar").style.display="none";
							document.getElementById("tf").style.display="none"
							document.getElementById("dd").style.display="block";
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/myrestu.php?id="+ x + "&nid=" + y + "&tp=" + types , true);
	  			xhttp.send();

	  			}

  			}

		}

		function nextSecond(elementId,types){
			var x = document.forms["addResturantForm"]["offer"].value;
			var y= "<?php echo $_COOKIE["rid"]; ?>"
			/*var z = document.forms["addResturantForm"]["cresPass"].value;*/

			if (document.getElementById("fileo").value=="") {
				alert("Please Choose An Image");
			}

			else if (x=="") {
				alert("Please Write Something About Offer");
				document.forms["addResturantForm"]["offer"].style.border="3px solid red";
			}

  			else{
  				xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if(txt.trim() == "Something Went Wrong"){
	      					alert(txt.trim());
	      				}


	      				else if(txt.trim() == "Offer Is Given Successfully"){
	      					alert(txt.trim());
	      					document.getElementById("ar").style.display="none";
							document.getElementById("sf").style.display="none"
							document.getElementById("dd").style.display="none";
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/myrestu.php?of="+ x + "&id=" + y + "&tp=" + types , true);
	  			xhttp.send();
  			}
		}


		function closeNav(elementId){
			document.getElementById(elementId).style.display="none";
			document.getElementById("dd").style.display="block";
		}


	</script>

</body>
</html>