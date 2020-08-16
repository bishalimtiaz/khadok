
<?php
	require '../php/config.php';

	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/sidenav.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div id="mySidenav" class="sidenav">
		<div><a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav')">&times;</a></div> 

		<div id="first">
			<div id="myName" class="common">
				<h2 style="margin: 0;">
					<?php
						$select_query="select fullName from userinfo where userName='$username' AND password='$password'";
						$select_query_run=mysqli_query($con,$select_query);

						if (mysqli_num_rows($select_query_run) > 0){

							while($row = mysqli_fetch_assoc($select_query_run)){
								echo $row["fullName"];

						}

					}
					?>
				</h2>
			</div>

			<div class="imgcommon">
				<img src="../images/profile/<?php
						$select_query="select image from userinfo where userName='$username' AND password='$password'";
						$select_query_run=mysqli_query($con,$select_query);

						if (mysqli_num_rows($select_query_run) > 0){

							while($row = mysqli_fetch_assoc($select_query_run)){
								echo $row["image"];

						}

					}
					?>" alt="avatar" class="avatar">

				<div class="imgupload">
					<i class="fa fa-camera" onclick="upload()" style="cursor: pointer;"></i>
				</div>

			</div>

			

			<hr style="margin-right: 4%;margin-left: 4%;">

			<div class="common">
				<div class="infos"><i class="fa fa-home"></i>
					<?php
						$select_query="select Hometown from userinfo where userName='$username' AND password='$password'";
						$select_query_run=mysqli_query($con,$select_query);

						if (mysqli_num_rows($select_query_run) > 0){

							while($row = mysqli_fetch_assoc($select_query_run)){
								echo $row["Hometown"];

						}

					}
					?>

				</div>
				<div class="infos"><i class="fa fa-birthday-cake"></i>
					<?php
						$select_query="select Birthday from userinfo where userName='$username' AND password='$password'";
						$select_query_run=mysqli_query($con,$select_query);

						if (mysqli_num_rows($select_query_run) > 0){

							while($row = mysqli_fetch_assoc($select_query_run)){
								$date = $row["Birthday"];
								$date = strtotime($date);
								$date = date('d M,Y',$date);
								echo $date;

						}

					}
					?>
				</div>
			</div>
		</div> 
		<!--end of first posrtion of side nav-->

		<div id="second">
			
			<!-- <div class="infos" style="background-color: blue;"><i class="fa fa-heart"></i>Favourites</div>
			<div class="infos"><i class="fa fa-utensils"></i>My Resturant</div> -->
			<div class="infos" id="fav"><i class="fas fa-heart" id="myhrt"> </i><a href="fav.php">Favourites</a></div>
			<div class="infos" id="myres"><i class="fas fa-utensils"></i><a href="#" onclick="myresForm('ar')">My Resturant</a></div>
			<div class="infos" id="addResturant"><i class="fa fa-plus"></i><a href="addResturant.php">Add Your Resturant</a></div>
			
			
		</div>

		<div id="third">
			<div class="infos" id="pro"><i class="fas fa-edit"></i><a href="profile.php">Edit Profile</a></div>
			
		</div>

		<div id="third">
			<div class="infos" id="log"><i class="fas fa-power-off"></i><a href="#" onclick="logout()">Logout</a></div>
			
		</div>

		<!--uploading profile picture div-->

			<div id="pros" class="uploadProfile">
				<div><a href="javascript:void(0)" class="closebtn" onclick="closeNav('pros');">&times;</a></div>

				<form action="../php/upload.php" method="POST" enctype="multipart/form-data" >
					<input id="fl" type="file" name="file">
					<input id="sub" type="submit" name="submit" value="Upload Image">
					
				</form>
				
			</div>

	</div>


	<script type="text/javascript">
		function openNav(){

			document.getElementById("mySidenav").style.width="300px";
			document.getElementById("opn").style.display="none";
			/*document.getElementById("navbar").style.display="none";*/
		}

		function closeNav(elementId){

			if(elementId=="mySidenav"){
				document.getElementById("mySidenav").style.width="0";
				document.getElementById("opn").style.display="block";
				/*document.getElementById("navbar").style.display="block";*/
			}

			else if(elementId=="pros"){
				document.getElementById("pros").style.display="none";

			}

			

		}

		function upload(){
        	
        	document.getElementById("pros").style.display="block";
        }

        function myresForm(elementId){
        	document.getElementById(elementId).style.display="block";
        	document.getElementById("mySidenav").style.display="none";
        }

        function logout(){
        	var xhttp;

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

	      				/*alert(txt.trim());*/

	      				if (txt.trim()=="Logout Done") {
	      					window.location.replace("../html/Homepage2.php");
	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/logout.php", true);
	  			xhttp.send();
        }

	</script>


</body>
</html>