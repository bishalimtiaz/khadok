<?php
	require '../php/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>KHADOK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/homepage2.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	
</head>
<body>
	<input type="text" name="hide" id="hdn" style="display: none;">

	<?php
		if ($_SESSION["opt"]=="food") {
	 ?>
	 <div class="food" id="ofrf">
		<div class="menu">
			<h1 class="rName">Menu</h1>
		</div>

		<figure>
			<?php
				/*$rd=$_COOKIE["rid"];
				$count=0;*/
				$src=$_SESSION["src"];
				$select_query="select * from food where foodName like '%$src%';";
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

	<?php
	}

?>


<?php
	if ($_SESSION["opt"]=="resturant") {
?>

<div class="resturants" id="rrrd" >
		<div class="menu">
			<h1 class="rName">Resturants</h1>
		</div>

		<figure>
			<?php
				$src=$_SESSION["src"];
				$select_query="select * from resturant where resturantName like '%$src%';";
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

	<?php
}

?>

<script type="text/javascript">

		var fname="";

		var offerid=""

		var foodid="";

		var resturantid="";
		var myResturantId="";

		var offerdiv;

		var fooddiv;

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
			
			


			fooddiv=x;
			foodid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

			resturantid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

			/*alert(foodid);*/

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
</script>

</body>
</html>