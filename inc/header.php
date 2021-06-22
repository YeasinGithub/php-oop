<?php include "config/config.php"; ?>
<?php include "lib/database.php"; ?>
<?php include "helpers/format.php"; ?>

<?php $db = new Database();
	  $fm = new Format();
 ?>

<html>
	<head>
		<title>Basic Website Design</title>
		<meta name="description" content="It is awebsite about education">
		<meta name="Keywords" content="ssc result, hsc result">
		<meta name="author" content="Yeasin">

		<link rel="stylesheet" href="fontawesome/css/all.min.css">
		<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:1500,
		pauseTime:4000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

	</head>
<body>
	<div class="header templete clear">
	<a href="index.php">
		<div class="logo">
			<?php 
				$query = "select * from title_slogan where id='1'";
				$blog_title = $db->select($query);
				if($blog_title){
					while($result = $blog_title->fetch_assoc()){

			?>

			<img src="images/logo.png" alt="logo">
			<h2>Website Title</h2>
			<p>Our website Description</p>
		<?php } } ?>
		</div>
		</a>
		<div class="social">
			<a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
			<a target="_blank" href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
			<a target="_blank" href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
			<a target="_blank" href="https://www.google.com"><i class="fab fa-google-plus"></i></a>
		</div>
		<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
	</div>
	<div class="navigation templete">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="about.php">Product</a>
				<ul>
					<li><a href="#">Product One</a></li>
					<li><a href="#">Product Two</a></li>
					<li><a href="#">Product Three</a></li>
					<li><a href="#">Product Four</a></li>
					<li><a href="#">Product Five</a></li>
				</ul>
			</li>
			<li><a href="about.php">Privacy</a></li>
			<li><a href="about.php">DMCA</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>