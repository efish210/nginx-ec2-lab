<?php
session_start();
include("functions.php");
if(!isset($_GET['page']))
	$page="home";
else
	$page=$_GET['page'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>
<?php
	$page = $_GET['page'] ?? 'home';
	echo "Ethan's ".ucfirst($page)." page";
?>
	
</title> 
	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/css/style.css">

	
</head>


	<!-- Modernizr JS -->
	<script src="assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="index.php"><img src="assets/images/logo.png" alt="Ethan's Website logo"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<?php
						include("navigation.php");
					?>
				</ul>
			</nav>
			
			<div class="fh5co-footer">
				
			</div>

		</aside>

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Welcome to <span>Ethan's Website</span></h2>
				
			</div>
			
				<div class="fh5co-narrow-content">
				<div class="row">
					<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
						<!--About me was here -->
				
						<!--text was here-->
						<?php
							
							$dblink=db_connect("cms");
							$sql="Select * from `pages` where `location`='$page'";
							$results=$dblink->query($sql) or
								die("Something went wrong with $sql<br>".$dblink->error);
							$data=$results->fetch_array(MYSQLI_ASSOC);
							if(!$data)
								echo '<p class="fh5co-lead">Page not found.</p>';
							elseif(str_contains($data['data'],'<?php'))
							  	eval('?>'.$data['data']);
							else
								echo $data['data'];
							
						?>
					</div>
					
					<!-- Might use later: 2 tables to the right of the text
					<div class="col-md-7 col-md-push-1">
						<div class="row">
							<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
							</div>
							<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
							</div>
						</div>
					</div>
					-->
					
				</div>
			</div>
		</div>
		
			
			
			
	
	</div>

	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="assets/js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="assets/js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="assets/js/main.js"></script>

	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
