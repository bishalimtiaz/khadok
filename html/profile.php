<!DOCTYPE html>
<html>
<head>
	<title>KHADOK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
</head>
<body>
	<div class="addResturant">
		<img src="../images/chef.png" class="icon bounceIn animated">

		<div  class="divclose"><a href="javascript:void(0)" class="closebtn" onclick="closeNav('frf')">&times;</a></div>

		<form class="addForm" name="addResturantForm" enctype="multipart/form-data">
			<input type="text" name="hide" id="hdn" style="display: none;">

			<fieldset class="firstField" id="ff">

					<div id="ff2">User Name</div>
					<div id="ff3"><input type="text" name="unames" placeholder="Username"></div>

					<div id="ff4">Password</div>
					<div id="ff5"><input type="password" name="upass" placeholder="Password"></div>

					<div id="ff6"><input type="button" name="" value="Change" onclick="nextFirst('ff','uname')"></div>
				
			</fieldset>

			<fieldset class="secondField" id="sf">

					<div id="sf2">Full Name</div>
					<div id="sf3"><input type="text" name="fnames" placeholder="Fullname"></div>

					<div id="sf4">Password</div>
					<div id="sf5"><input type="password" name="fupass" placeholder="Password"></div>

					<div id="sf6"><input type="button" name="" value="Change" onclick="nextFirst('ff','fname')"></div>
				
			</fieldset>

			<fieldset class="thirdField" id="tf">

					<div id="tf2">Old Password</div>
					<div id="tf3"><input type="password" name="opass" placeholder="Old Password"></div>

					<div id="tf4">New password</div>
					<div id="tf5"><input type="password" name="nwpass" placeholder="New Password"></div>

					<div id="tf7">New password</div>
					<div id="tf8"><input type="password" name="cpass" placeholder="Confirm Password"></div>

					<div id="tf6"><input type="button" name="" value="Change" onclick="nextFirst('ff','chngps')"></div>
				
			</fieldset>

			<fieldset class="fourthField" id="frf">

					<div id="frf2"><span style="cursor: pointer;">Edit Profile</span></div>

					<div id="frf3"><span style="cursor: pointer;" onclick="setting('ff')">Change Username</span></div>
					
					<div id="frf4"><span style="cursor: pointer;" onclick="setting('tf')">Change Password</span></div>
				
					<div id="frf5"><span style="cursor: pointer;" onclick="setting('sf')">Change Fullname</span></div>
					
				
			</fieldset>
			
		</form>
		
	</div>

	<script type="text/javascript">

		function setting(elementId){
			document.getElementById(elementId).style.display="block";
			document.getElementById("frf").style.display="none";
			document.forms["addResturantForm"]["upass"].style.border="3px solid #555";
			document.forms["addResturantForm"]["fupass"].style.border="3px solid #555";
			document.forms["addResturantForm"]["cpass"].style.border="3px solid #555";

		}

		function closeNav(elementId){
			document.getElementById(elementId).style.display="block";
			document.getElementById("ff").style.display="none";
			document.getElementById("sf").style.display="none";
			document.getElementById("tf").style.display="none";

		}

		function nextFirst(elementId,types){

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


	      				if (txt.trim()=="Username updated Successfully") {
	      					alert(txt.trim());
	      					document.getElementById("frf").style.display="block";
							document.getElementById("ff").style.display="none";
							document.getElementById("sf").style.display="none";
							document.getElementById("tf").style.display="none";
							location.reload();
	      				}

	      				else if (txt.trim()=="Fullname updated Successfully") {

							alert(txt.trim());
							document.getElementById("frf").style.display="block";
							document.getElementById("ff").style.display="none";
							document.getElementById("sf").style.display="none";
							document.getElementById("tf").style.display="none"
	      				}

	      				else if ("Password updated Successfully"){
	      					alert(txt.trim());
	      					document.getElementById("frf").style.display="block";
							document.getElementById("ff").style.display="none";
							document.getElementById("sf").style.display="none";
							document.getElementById("tf").style.display="none"
							location.reload();
	      				}

	    			}
	  			};


			if (types=="uname") {
				var x=document.forms["addResturantForm"]["unames"].value;
				var y=document.forms["addResturantForm"]["upass"].value;
				var z="<?php echo $_SESSION['pass']; ?>"

				if (y!=z) {
					alert("Wrong Password");
					document.forms["addResturantForm"]["upass"].value="";
					document.forms["addResturantForm"]["upass"].style.border="3px solid red";
				}

				else{
					xhttp.open("POST", "../php/set.php?ups="+ y + "&unm=" + x +"&tp=" + types , true);
	  				xhttp.send();
				}

			}

			else if (types=="fname") {
				var x=document.forms["addResturantForm"]["fnames"].value;
				var y=document.forms["addResturantForm"]["fupass"].value;
				var z="<?php echo $_SESSION['pass']; ?>"

				if (y!=z) {
					alert("Wrong Password");
					document.forms["addResturantForm"]["fupass"].value="";
					document.forms["addResturantForm"]["fupass"].style.border="3px solid red";
				}

				else{
					xhttp.open("POST", "../php/set.php?ups="+ y + "&unm=" + x +"&tp=" + types , true);
	  				xhttp.send();
				}

			}


			else if (types=="chngps") {
				var x=document.forms["addResturantForm"]["opass"].value;
				var y=document.forms["addResturantForm"]["nwpass"].value;
				var z=document.forms["addResturantForm"]["cpass"].value;

				var p="<?php echo $_SESSION['pass']; ?>"

				if (x!=p) {
					alert("Wrong Password");
					document.forms["addResturantForm"]["opass"].value="";
					document.forms["addResturantForm"]["opass"].style.border="3px solid red";
				}

				else if (y!=z) {
					alert("New Password And Confirm Password Doesn't Match");
					document.forms["addResturantForm"]["cpass"].value="";
					document.forms["addResturantForm"]["opass"].style.border="3px solid #555";
					document.forms["addResturantForm"]["cpass"].style.border="3px solid red";
				}

				else{
					xhttp.open("POST", "../php/set.php?ups="+ x + "&nps=" + y +"&tp=" + types , true);
	  				xhttp.send();
				}

			}
		}

	</script>

</body>
</html>