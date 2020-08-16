<!DOCTYPE html>
<html>
<head>
	<title>Khadok</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/addResturant.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
</head>
<body onload="xmlLoc()">

	<div class="addResturant">

		<img src="../images/chef.png" class="icon bounceIn animated">
		
		<div  class="divclose"><a href="javascript:void(0)" class="closebtn" onclick="closeNav('Sign-frm')">&times;</a></div>

		<form class="addForm" name="addResturantForm" enctype="multipart/form-data">
			<input type="text" name="hide" id="hdn" style="display: none;">

			<fieldset class="firstField" id="ff">
					<div id="ff2">Your Password</div>
					<div id="ff3"><input type="password" name="pass" placeholder="Password"></div>
					<div id="ff4">Resturant Name</div>
					<div id="ff5"><input type="text" name="resturantName" placeholder="Resturant Name" required></div>
					<div id="ff6">Choose Resturant Id</div>
					<div id="ff7"><input type="password" name="resPass" placeholder="Resturant ID"></div>
					<div id="ff8">Confirm Resturant Id</div>
					<div id="ff9"><input type="password" name="cresPass" placeholder="Confirm Resturant Id"></div>
					<div id="ff10"><input type="button" name="" value="Next" onclick="nextFirst('ff','first')"></div>
				
			</fieldset>


			<fieldset id="sf" class="secondfield">
					
					<div id="sf2">Upload Resturant Logo</div>

					<div id="sflogo">
						<img id="rimg" src="../images/resturant/fooditem.png">
					</div>

					<label id="sf10">Upload Logo
						<div id="sf3"><input type="file" name="files" id="files" oninput="loadfunc('files','rimg')"></div>
					</label>

					<div id="sf4">Location</div>
					<!-- <div id="sf5"><input type="text" name="location" placeholder="Location"></div> -->
					<div id="sf5"><input type="text" list="locations" name="location" placeholder="Location"></div>
					<datalist id="locations">
					  <option value="">
					  <option value="">
					  <option value="">
					  <option value="">
					  <option value="">
					  <option value="">
					  <option value="">
					</datalist>

					<div id="sf6">Contact No.</div>
					<div id="sf7"><input type="text" name="phone" placeholder="Phone No." maxlength="11"></div>
					
					<div id="sf8">
						<input id="sf9" type="button" name="" value="Next" onclick="nextSecond('sf','second')">
					</div>
					
				</fieldset>



				<fieldset id="tf" class="thirdfield">
					<div id="tf2">Add atleast 5 food items to complete registration of your Resturant</div>

					
					<div id="tf8">
						<!-- <input id="sf9" type="button" name="" value="Previous" onclick="Previous('sf')"> -->
						<input id="tf9" type="button" name="" value="Next" onclick="nextThird('tf')">
					</div>
					
				</fieldset>


				<fieldset id="frf" class="fourthfield">
					<div id="frf2">Add <span id="five">Five</span> <span id="more">more</span> Food Item<span id="sitem">s</span> </div>

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
						<input id="frf9" type="button" name="" value="Next" onclick="nextFourth('frf','fourth')">
					</div>
					
				</fieldset>
			
		</form>
		
	</div>



	<!-- javascript and ajax is here -->

	<script type="text/javascript">


		var xhttp;

		if (window.XMLHttpRequest) {

			xhttp = new XMLHttpRequest();
			 } 

		 else {
			    
		    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			/*today*/
			function xmlLoc(){
				xhttp.onreadystatechange = function() {
			    	if (this.readyState == 4 && this.status == 200) {
			      	myLoc(this);
			    	}
		  		};
		  		xhttp.open("GET", "location.xml", true);
		  		xhttp.send();
			}

			function myLoc(xml){
				var i;
				var xmlDoc = xml.responseXML;

				var x = xmlDoc.getElementsByTagName("myloc");

				for (i = 0; i <x.length; i++) {
					document.getElementById("locations").options[i].value=x[i].getElementsByTagName("loc")[0].childNodes[0].nodeValue;
				}
			}


		/*Passed values ff*/
		function nextFirst(elementId,types){
			var x = document.forms["addResturantForm"]["pass"].value;
			var y = document.forms["addResturantForm"]["resPass"].value;
			var z = document.forms["addResturantForm"]["cresPass"].value;
			var p = document.forms["addResturantForm"]["resturantName"].value;

			if(p==""){
				alert("please Insert A Name");
				document.forms["addResturantForm"]["resturantName"].style.border="3px solid red";
			}
			else if(y==""){
				alert("please Choose A Resturant Id");

				document.forms["addResturantForm"]["resturantName"].style.border="3px solid #555";
				document.forms["addResturantForm"]["resPass"].style.border="3px solid red";
			}

			/**/
  			else{
  				var ps= "<?php echo $_SESSION['pass']; ?>"

  			if(x!=ps){
  				alert("Wrong Password");
  				document.forms["addResturantForm"]["pass"].value="";
  				document.forms["addResturantForm"]["pass"].style.border="3px solid red";
  				document.forms["addResturantForm"]["cresPass"].style.border="3px solid #555";
  			}

  			else if(y!=z){
  				alert("Resturant Id and Confirm Resturant Id must match");
  				document.forms["addResturantForm"]["cresPass"].value="";
  				document.forms["addResturantForm"]["cresPass"].style.border="3px solid red";
  				document.forms["addResturantForm"]["pass"].style.border="3px solid #555";
  			}


  			else{
  				


				 xhttp.onreadystatechange = function() {
	   				 if (this.readyState == 4 && this.status == 200) {
	      				/*document.getElementById("txtHint").innerHTML = this.responseText;*/
	      				document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;


	      				if(txt.trim() == "Resturant Id must be unique"){
	      					alert(txt.trim());
	      					document.forms["addResturantForm"]["cresPass"].value="";
  							document.forms["addResturantForm"]["cresPass"].style.border="3px solid red";
  							document.forms["addResturantForm"]["resPass"].value="";
  							document.forms["addResturantForm"]["resPass"].style.border="3px solid red";
	      				}


	      				else if(txt.trim() == "ok"){
	      					document.forms["addResturantForm"]["cresPass"].style.border="3px solid #555";
	      					document.forms["addResturantForm"]["resPass"].style.border="3px solid #555";
			  				document.forms["addResturantForm"]["pass"].style.border="3px solid #555";
			  				document.getElementById(elementId).style.display="none";
			  				document.getElementById("sf").style.display="block";
	      				}

	      				else{
	      					alert(txt.trim());
	      				}
	    			}
	  			};

	  			xhttp.open("POST", "../php/resturant.php?ps="+ x + "&id=" + y + "&nm=" + p + "&tp=" + types , true);
	  			xhttp.send();

	  			}
  			}

		}

		/*dfghjsdfghasdfghjasdfghj*/





		/*Passed value ff*/
		function loadfunc(elementId,sc){
			var y = document.forms["addResturantForm"]["resPass"].value;
			var file = document.getElementById(elementId).files[0];
			
			var nm = document.getElementById(elementId).name;
			/*alert(nm);*/
			var formdata = new FormData();

			formdata.append(elementId,file);

			


			/*xhttp.upload.addEventListener("progress",progressHandler,false);
			xhttp.addEventListener("load",completeHandler,false);
			xhttp.addEventListener("error",errorHandler,false);
			xhttp.addEventListener("abort",abortHandler,false);*/

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
	      			}
			 		
			 	}

			 };


  			xhttp.open("POST", "../php/resturant_image.php?id=" + y + "&nm=" +nm ,true);
	  		xhttp.send(formdata);

	  			
		}



		/*secondField next button*/

		function nextSecond(elementId,types){
			var x = document.forms["addResturantForm"]["location"].value;
			var z = document.forms["addResturantForm"]["phone"].value;
			var y = document.forms["addResturantForm"]["resPass"].value;
			/*var file = .files[0];*/

			if (document.getElementById("files").value=="") {

				alert("Please Choose An Image");
			}

			else if (x=="") {
				alert("Please Choose A Location");
				document.forms["addResturantForm"]["location"].style.border="3px solid red";
			}

			else if (z=="") {
				alert("Please Choose A Phone No");
				document.forms["addResturantForm"]["phone"].style.border="3px solid red";
				document.forms["addResturantForm"]["location"].style.border="3px solid #555";
			}


			else{

				xhttp.onreadystatechange = function() {
			 	if (this.readyState == 4 && this.status == 200) {
			 			document.forms["addResturantForm"]["hide"].value=this.responseText;
	      				var txt = document.forms["addResturantForm"]["hide"].value;
	      				 if(txt.trim() == "finish"){
	      				
	      					document.getElementById(elementId).style.display="none";
	      					document.getElementById("tf").style.display="block";
	      				}

	      			}

			 };

  			xhttp.open("POST", "../php/resturant.php?id=" + y + "&pn=" + z + "&lc=" + x + "&tp=" + types ,true);
	  		xhttp.send();
			}

		}


		/*Third field nexr button*/

		function nextThird(elementId){
			document.getElementById(elementId).style.display="none";
	      	document.getElementById("frf").style.display="block";
		}



		function nextFourth(elementId,types){
			var x = document.forms["addResturantForm"]["foodName"].value;
			var z = document.forms["addResturantForm"]["foodCategory"].value;
			var p = document.forms["addResturantForm"]["price"].value;
			var y = document.forms["addResturantForm"]["resPass"].value;
			var mr=document.getElementById("five").innerHTML;

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

	      				 	

	      				
	     
	      					document.forms["addResturantForm"]["foodName"].value="";
							document.forms["addResturantForm"]["foodCategory"].value="";
							document.forms["addResturantForm"]["price"].value="";
							document.forms["addResturantForm"]["foodName"].style.border="3px solid #555";
							document.forms["addResturantForm"]["foodCategory"].style.border="3px solid #555";
							document.forms["addResturantForm"]["price"].style.border="3px solid #555";
							document.getElementById("fimg").src ="../images/food/fooditem.png";

	      					

	      					if(mr=="Five"){
	      						document.getElementById("five").innerHTML="Four";
	      						document.getElementById("more").style.display="inline";

	      					}

	      					else if(mr=="Four"){
	      						
	      						document.getElementById("five").innerHTML="Three";
	      						document.getElementById("more").style.display="inline";

	      					}

	      					else if(mr=="Three"){
	      						document.getElementById("five").innerHTML="Two";
	      						document.getElementById("more").style.display="inline";

	      					}

	      					else if(mr=="Two"){
	      						document.getElementById("five").innerHTML="One";
	      						document.getElementById("more").style.display="inline";
	      						document.getElementById("sitem").style.display="none";
	      						document.getElementById("frf9").value="Finish";

	      					}

	      					else if(mr=="One"){
	      						
	      						
	      						window.location.href="../html/myResturant.php";

	      					}
	      				}

	      				else if(txt.trim() == "Your resturant already has this food item"){
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

  			xhttp.open("POST", "../php/resturant.php?id=" + y + "&fn=" + x + "&fc=" + z + "&tp=" + types + "&fp=" + p +"&mr=" + mr ,true);
	  		xhttp.send();
			}

		}
		

	</script>

</body>
</html>