<?php
  require_once('includes/database.inc.php');
  //cors();
  $pdo = getConnectionInfo();
  $map_name = getMapNameWithIndex($pdo, $_GET['map'])->fetchColumn(0);
  $imagepath = getImagePathWithIndex($pdo, $_GET['map'])->fetchColumn(0);
  $coords = getAllCoordsForMap($pdo, $map_name)->fetchAll();

?>

<!DOCTYPE HTML>

<html>

	<meta name="pinterest" content="nopin" />
	<head>
		<title>Indoor View</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			href="//fonts.googleapis.com/css?family=Lora|Open+Sans"
			rel="stylesheet"
			type="text/css"
		/>
		<link rel="stylesheet" href="assets/css/main.css" type="text/css"/>
		<link href="styles/style.css" rel="stylesheet" type="text/css" />
    	<script src="includes/jquery-3.4.1.min.js"></script>
    	<script src="includes/imageMapResizer.min.js"></script>
    	<script src="includes/jquery.maphilight.min.js"></script>
    	<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
	</head>
	<body class="subpage">

			<style> 
					body {
						background-image:url(images/bluewhite.jpg)
					}
					
			</style>

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="index.php">IndoorView</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
		
		<nav id="menu">

				
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Maps</a>
						<ul>
								<li><a href="map.php">Mackenzie L4</a></li>
								<li><a href="minto.html">Minto L7</a></li>
								<li><a href="tunnels.html">Tunnels</a></li>

						</ul>
					</li>
					<li><a href="background.html">Background</a></li>
					<li><a href="applications.html">Applications</a></li>
					<li><a href="about us.html">About Us</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">

								<span class="image right"><img src="images/IV.JPG" alt="" /></span><h1><?php echo $map_name ?></h1>

							</header>

							<div class="align-left">
								<h5>Click on different areas of the map to view a panoramic dispaly of the indoor space.</h5>						
							</div>
							
						<div class="row">
							<div class="column" id="image_map">
      							<map name="coord_map">
									<?php
									$index = 0;
									foreach($coords as $coord){
										echo("<area 
												href='javascript:newVrView(" . $index . ");'
												target='_self'
												shape='circle'
												coords='" . $coord[0] . "," . $coord[1] . ",2'
											/>");
										$index = $index + 1;
									}
									?>
								</map>
								<?php
									echo('<img src="'. $imagepath .'" usemap="#coord_map" />')
								?>
								</div>

								<div class="column" id="vrview"></div>
									<script>
									window.addEventListener("load", function(){
										onVrViewLoad(0);
									});
									var images = [];
									var image_count = <?php echo $index ?>;
									var i;
									for (i = 0; i < image_count; i++){
										var j = i + 1;
										images.push("images/" + "<?php echo $map_name ?>" + "/image" + j.toString() + ".jpg");
									}

									function onVrViewLoad(index) {
										var vrView = new VRView.Player("#vrview", {
										image: images[index],
										is_stereo: false,
										width: "100%",
										height: "100%"
										});
									}

									function newVrView(index){
										var vrview = document.getElementById("vrview");
										vrview.removeChild(vrview.childNodes[0]);
										onVrViewLoad(index);
									}
									</script>
							</div>
							<script>
								imageMapResize();
								$.fn.maphilight.defaults = {
								fill: true,
								fillColor: 'ff0000',
								fillOpacity: 0.2,
								stroke: true,
								strokeColor: 'ff0000',
								strokeOpacity: 1,
								strokeWidth: 1,
								fade: true,
								alwaysOn: true,
								neverOn: false,
								groupBy: false,
								wrapClass: true,
								shadow: false,
								shadowX: 0,
								shadowY: 0,
								shadowRadius: 6,
								shadowColor: '000000',
								shadowOpacity: 0.8,
								shadowPosition: 'outside',
								shadowFrom: false
								}
								$('img[usemap]').maphilight();
							</script>


							

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>