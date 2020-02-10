<?php
  require_once('includes/database.inc.php');
  $pdo = getConnectionInfo();
  $maps = getAllMaps($pdo); 
?>
<!DOCTYPE HTML>

<html>
		<meta name="pinterest" content="nopin" />
	<head>
		<title>Background </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

			<style> 
					body {
						background-image:url(images/back2.jpg)
					}
					
			</style>


		<!-- Header -->
			<header id="header">
					<div class="logo"><a href="index.php">SYSC 4907</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
		
		<nav id="menu">
			<ul class="links">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Maps</a>
					<ul>
						<?php
							$count = 0;
							foreach ($maps as $map){
								$count++;
								echo("<li><a href='map.php?map=" . $count . "'>" . $map[0] . "</a></li>"); 
							}
						?>
					</ul>
				</li>
				<li><a href="background.php">Background</a></li>
				<li><a href="applications.php">Applications</a></li>
				<li><a href="about us.php">About Us</a></li>
			</ul>
			</nav>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
				<section class="wrapper">
					<div class="inner">

						<header class="align-center">
							<h1>Background</h1>
							<h5>Refer below for an in depth video explaining the design and implementation of IndoorView.</h5>
						</header>

						<!-- Content -->
						
						<div align="center"> 
						<iframe width="560" height="315" src="https://www.youtube.com/embed/veSYU6K2EIE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
											

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>


</html>