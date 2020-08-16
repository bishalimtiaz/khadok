<?php
	require '../php/config.php';
	include 'sidenav.php';

	

	if(session_id()!=""){
		$username=$_SESSION['user'];
		$password=$_SESSION['pass'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Khadok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>


	<!--end of sidenav-->


<!--	<div id="main">
		<span id="opn" style="font-size: 30px;cursor: pointer;" onclick="openNav()">&#9776;open</span>
		<hr>
		<h2>Sidenav Push Example</h2>
  		<p>Click on the element below to open the side navigation menu, and push this content to the right.</p>
  		
		
	</div>

-->

	<div class="parallax">
		<span id="opn" style="position: fixed;" onclick="openNav()">&#9776;</span>

		<div class="logo">
			<h1>Khadok</h1>
			<h2>.&nbsp.&nbsp.&nbsp Grab The Best Foods</h2>
			
		</div>

	</div>

	<div id="navbar">
		<div style="height: 100%;width: 34%; float:left;">
			<a class="active" href="#home">Home</a>
		 	<a href="#news">Resturant</a>
		 	<a href="#contact">Food</a>
		</div>

		<input type="text" name="search" placeholder="Search..">
	</div>

	<!--end of parallax-->


	<!--javascript Here -->

	<div class="maicontent">
		<div class="resturant">
			<div class="contentHeading">Resturants</div>
		</div>

		<div class="food">
			<div class="contentHeading">Foods</div>
			<!-- 1-->
			<div class="foodContent">
				<div class="foodContentImage">
					<img src="../images/mexicanpizza.jpg">
				</div>
				<div class="foodContentName">
					Mexican Pizza
				</div>
				<div class="foodContentResturant">
					Resturant: Ghost Riderz
				</div>

				<div class="foodContentPrice">
					Price: 450 &#2547;
				</div>
				<div class="foodContentRating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span> &nbsp 8.3</span>
					
				</div>

				<div class="giveRate">Rate It</div>
				
			</div>

			<!-- 2-->

			<div class="foodContent">
				<div class="foodContentImage">
					<img src="../images/mexicanpizza.jpg">
				</div>
				<div class="foodContentName">
					Mexican Pizza
				</div>
				<div class="foodContentResturant">
					Resturant: Ghost Riderz
				</div>

				<div class="foodContentPrice">
					Price: 450 &#2547;
				</div>
				<div class="foodContentRating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span> &nbsp 8.3</span>
					
				</div>

				<div class="giveRate">Rate It</div>
				
			</div>

			<!-- 3-->

			<div class="foodContent">
				<div class="foodContentImage">
					<img src="../images/mexicanpizza.jpg">
				</div>
				<div class="foodContentName">
					Mexican Pizza
				</div>
				<div class="foodContentResturant">
					Resturant: Ghost Riderz
				</div>

				<div class="foodContentPrice">
					Price: 450 &#2547;
				</div>
				<div class="foodContentRating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span> &nbsp 8.3</span>
					
				</div>

				<div class="giveRate">Rate It</div>
				
			</div>

			<!-- 4-->

			<div class="foodContent">
				<div class="foodContentImage">
					<img src="../images/mexicanpizza.jpg">
				</div>
				<div class="foodContentName">
					Mexican Pizza
				</div>
				<div class="foodContentResturant">
					Resturant: Ghost Riderz
				</div>

				<div class="foodContentPrice">
					Price: 450 &#2547;
				</div>
				<div class="foodContentRating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span> &nbsp 8.3</span>
					
				</div>

				<div class="giveRate">Rate It</div>
				
			</div>

			<!-- end-->

		</div>

		<div class="offers">
			<div class="contentHeading">Offers</div>
		</div>
	</div>

	<footer>
		<h2>Developed by Bishal Imtiaz</h2>
	</footer>

	<script type="text/javascript">
		/**/

		/* for sticky nav*/

		window.onscroll = function() {myFunction()};

		var navbar=document.getElementById("navbar");
		var sticky=navbar.offsetTop;


		function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
            } 

            else {
                navbar.classList.remove("sticky");
            }
            
        }

        //for rating

	</script>

</body>
</html>