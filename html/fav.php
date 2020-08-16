<?php
	require '../php/config.php';
	include 'sidenav.php';

	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>KHADOK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/fav.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>

	<div class="food" id="ofrf">
		<div class="menu">
			<h1 class="rName">My Favourites</h1>
		</div>
		<input type="text" name="hide" id="hdn" style="display: none;">

		<figure>
			<?php
				/*$rd=$_COOKIE["rid"];
				$count=0;*/
				$uid="";
				$fid="";
				$select_user="select user_id from userinfo where userName='$username' and password='$password';";
				$select_user_run=mysqli_query($con,$select_user);
				if (mysqli_num_rows($select_user_run) > 0){
					while($row = mysqli_fetch_assoc($select_user_run)){
						$uid=$row["user_id"];

					}
				}

				$select_querys="select food_id from favourite where user_id='$uid';";
				$select_query_run=mysqli_query($con,$select_querys);

					if (mysqli_num_rows($select_query_run) > 0){

						while($row = mysqli_fetch_assoc($select_query_run)){
							/**/
							$fid=$row["food_id"];

							$select_food="select * from food where food_id='$fid'";
							$select_food_run=mysqli_query($con,$select_food);

							if (mysqli_num_rows($select_food_run) > 0){

							while($rows = mysqli_fetch_assoc($select_food_run)){
									$fn=$rows["foodName"];
									$fc=$rows["foodCategory"];
									$fimg=$rows["food_image"];
									$fp=$rows["price"];
									$fr=$rows["foodRating"];
									$fd=$rows["food_id"];
									$restid=$rows["resturant_id"];

									$restnm="";

							?>

							<div class="foodItem" onmouseover="rateenter(this)" onmouseout="rateout(this)">
							<img src="../images/food/<?php echo $fimg; ?>" id="fmg">
							<h4 class="rfid" style="display: none;"><?php echo $restid; ?></h4>
							<h4 class="fid" style="display: none;"><?php echo $fd; ?></h4>

							<h4 class="fn" style="font-size: 1.2vw;">Name : <span><?php echo $fn; ?></span> <i style="display: none;" class="so far fa-trash-alt" onclick="deletes('favDelete')"></i></h4>
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
								
							</div>

							<?php	}
								}
							}

						}
			?>
		</figure>
		
	</div>


	<script type="text/javascript">
		var fdid="";
		var udid="<?php echo $uid; ?>";

		var fooddiv;


		function rateenter(x){
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="inline-block";
			fdid=x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
			fooddiv=x;

		}


		function rateout(x){
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.style.display="none";
		}

		function deletes(types){

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


	      				if (txt.trim()=="Food Successfully Removed From Your favourite List") {
	      					fooddiv.style.display="none";
	      					alert(txt.trim());
	      				}


	      				else{
	      					alert("Something Went Wrong");
	      					

	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/delete.php?uid="+ udid + "&foodid=" + fdid + "&tp=" + types , true);
	  				xhttp.send();

		}
	</script>

</body>
</html>