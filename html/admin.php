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

<style type="text/css">

	.so{
		float: right;
	}

</style>

<body>
	<div class="resturants" id="rrrd">
		<div class="menu">
			<h1 class="rName">Resturants</h1>
		</div>
		<input type="text" name="hide" id="hdn" style="display: none;">

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

							<div class="resitem"  onmouseover="over(this)" onmouseout="out(this)">
								<img  src="../images/resturant/<?php echo $resimg; ?>" id="fmg">
								<h4 class="fn" style="font-size: 1.2vw;"><span><?php echo $resname; ?></span> <i style="display: none;" class="so far fa-trash-alt" onclick="deletes('resDelete')"></i> </h4>
								<h4 class="cat">Location : <?php echo $reslcn; ?></h4>
								<h4 class="rtnm">Contac No : <?php echo $respn; ?></h4>
								<h4 style="display: none;"><?php echo $resid; ?></h4>
							</div>

				<?php	}

				}
			?>
		</figure>
		
	</div>

	<script type="text/javascript">

		var resturantId="";

		var resdiv="";
		
		function over(x){
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.lastElementChild.style.display="inline-block";
			resturantId=x.lastElementChild.innerHTML;
			resdiv=x;
		}

		function out(x){
			x.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling.lastElementChild.style.display="none";
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


	      				if (txt.trim()=="admin") {
	      					resdiv.style.display="none";
	      				}


	      				else{
	      					alert("Something Went Wrong");
	      					

	      				}

	    			}
	  			};

	  			xhttp.open("POST", "../php/delete.php?rid="+ resturantId + "&tp=" + types , true);
	  			xhttp.send();

		}

	</script>

</body>
</html>