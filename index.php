<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DPOTMH | Homepage</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css">
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">
		.carousel-inner img {
			width: 100%;
			margin: auto;
		}
		.carousel-caption h3 {
			color: #fff !important;
		}
		@media (max-width: 600px) {
			.carousel-caption {
				display: none;
			}
		}
		.carousel .item {
			height: 575px;
		}
		.item img {
			position: absolute;
			top: 0;
			left: 0;
			min-height: 575px;
		}
		footer {
			background-color: #2d2d30;
			color: #f5f5f5;
			padding: 32px;
		}
		footer a {
			color: #f5f5f5;
		}
		footer a:hover {
			color: #777;
			text-decoration: none;
		}
		.grey{
			background-color: rgb(236,236,236);
		}
		#services{
			padding-bottom: 50px;
		}
		#event1{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		#event2{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		#contact1{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		div.polaroid {
			width: 100%;
			background-color: white;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			margin-bottom: 25px;
		}
		div.container-text {
			text-align: left;
			padding: 10px 20px;
		}
		#polaroid-img{
			width: 250px;
			height: 300px;
		}
	</style>
	<style type="text/css">
		.navbar-brand>img {
			max-height: 100%;
			height: 100%;
			width: auto;
			margin: 0 auto;
		}
	</style>
	<style type="text/css">
		nav.navbar-findcond { background: #fff; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
		nav.navbar-findcond a { color: #f14444; }
		nav.navbar-findcond ul.navbar-nav a { color: #f14444; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
		nav.navbar-findcond ul.navbar-nav a:hover,
		nav.navbar-findcond ul.navbar-nav a:visited,
		nav.navbar-findcond ul.navbar-nav a:focus,
		nav.navbar-findcond ul.navbar-nav a:active { background: #fff; }
		nav.navbar-findcond ul.navbar-nav a:hover { border-color: #f14444; }
		nav.navbar-findcond li.divider { background: #ccc; }
		nav.navbar-findcond button.navbar-toggle { background: #f14444; border-radius: 2px; }
		nav.navbar-findcond button.navbar-toggle:hover { background: #999; }
		nav.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
		nav.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
		nav.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
		nav.navbar-findcond ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
		nav.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
		nav.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }
	</style>

	<link rel="icon"
     type="image/png"
     href="#">


</head>
<body>
	<div id="homepage"></div>
	<nav class="navbar navbar-findcond navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Dr. Pablo O. Torre Medical Hospital</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="#homepage">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="#services">Services <span class="sr-only">(current)</span></a></li>
					<li ><a href="#event1">Events <span class="sr-only">(current)</span></a></li>
					<li ><a href="#contact1">Contact Us <span class="sr-only">(current)</span></a></li>
					<?php
					if(isset($_SESSION['user_id'])){
						echo "<li class='dropdown'>
						<a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>".$_SESSION['user_fullname']." <span class='caret'></span></a>
						<ul class='dropdown-menu' role='menu'>";
							if($_SESSION['account_type'] == "ADM"){
								echo "<li><a href='hosp-admin/profile.php'>Profile</a></li>";
							}else if ($_SESSION['account_type'] == "PHR"){
								echo "<li><a href='hosp-staff/profile.php'>Profile</a></li>";
							}
							if($_SESSION['account_type'] == "ADM"){
								echo "<li><a href='hosp-admin/logout.php'>Logout</a></li>";
							}else if ($_SESSION['account_type'] == "PHR"){
								echo "<li><a href='hosp-staff/logout.php'>Logout</a></li>";
							}
							echo "</ul>";
							echo "</li>";
						}else{
							echo "<li><a href='login.php'>Login</a></li>";
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img  src="images/carousel/cimgone.jpg" width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">Dr. Pablo O. Torre Medical Hospital</h2>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/carousel/cimgtwo.jpg"  width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">Dr. Pablo O. Torre Medical Hospital</h2>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/carousel/cimgthree.jpg" width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">Dr. Pablo O. Torre Medical Hospital</h2>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/carousel/cimgfour.jpg" width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">Dr. Pablo O. Torre Medical Hospital</h2>
					</div>
				</div>
			</div>
		</div>
		<section id="services" class="content-1-5 content-block">
			<div class="container-fluid" style="background-image: url('https://image.freepik.com/free-vector/modern-abstract-background_1048-1003.jpg');">
				<h1 class="text-center polaroid" style="color: white;
				text-shadow: 2px 2px 4px #000000; margin-top: 50px">Our Services</h1>
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="polaroid">
								<img src="images/maternity.jpg" alt="img1" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Maternity</h4><br>
									<p >Many hospitals provide maternity care. Rooms are available that are all-inclusive where mothers can give birth, nurse their babies and spend a day two recovering from the delivery. Other hospitals utilize operating rooms for deliveries and nurseries for the newborns. Newborn intensive care facilities are available at most hospitals for babies born prematurely or with other serious medical conditions. Maternity hospitals also prepare for emergency deliveries and those with complications that require special care.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="polaroid">
								<img src="images/dentalcare.jpg" alt="img2" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Dental Care</h4><br>
									<p>We care for your smiles. Dental Care referes to the branch of the healing arts concerned with the teeth and associated structures of the oral cavity, including prevention, diagnosis, and treatment of disease and restoration of defective or missing teeth. Brush your teeth twice a day with fluoride toothpaste. Floss once a day. Visit your dentist regularly for a checkup and cleaning.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="polaroid">
								<img src="images/urinalysis.jpg" alt="img3" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Urinalysis</h4><br>
									<p>Urinalysis is a test that evaluates a sample of your urine. Urinalysis is used to detect and assess a wide range of disorders, such as urinary tract infection, kidney disease and diabetes.Urinalysis involves examining the appearance, concentration and content of urine. Abnormal urinalysis results may point to a disease or illness. For example, a urinary tract infection can make urine look cloudy instead of clear. Increased levels of protein in urine can be a sign of kidney disease.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="event1" class="content-1-5 content-block">
			<div class="container grey">
				<h1 class="text-left">Featured Events</h1>
				<div class="row">
					<div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12 pull-right">
						<div class="editContent">
							<h1>Breastfeeding Awareness Month and Mother Baby Friendly Hospital Initiative Week</h1>
						</div>
						<div class="editContent">
							<p class="lead"> B.R.E.A.S.T with guest speaker Dr. Maria Veronica Reloza Consultant Makati Medical Center Department of Pediatrics</p>
						</div>
						<div class="editContent">
							<p>hosted by Dr. Salve Regina S. Jesena</p>
						</div>
					</div>
					<div class="col-lg-5 col-md-6 col-sm-12 pull-left">
						<img class="img-responsive" src="images/babyday.jpg">
					</div>
				</div>
			</div>
		</section>
		<section id="event2" class="content-block content-1-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="editContent">
							<h2>DPOTMH Infectious Disease Treatment Center</h2>
						</div>
						<div class="editContent">
							<p class="lead">DPOTMH celebrates World Aids Day.</p>
						</div>
						<div class="editContent">
							<p> A night of fun run held from DPOTMH to Panaad Stadium.</p>
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<img class="img-rounded img-responsive" src="images/galeryme.jpg">
					</div>
				</div>
			</div>
		</section>
		<div class="item contact padding-top-0 padding-bottom-0 grey" id="contact1">
			<div class="wrapper grey">
				<div class="container">
					<div class="col-md-6 col-md-offset-1">
						<div class="editContent">
							<h2>Feel free to Contact Us:</h2>
							<p class="text-light margin-bottom-40">
								Consistent with our goals to serve the community, we commit to deliver a broad range of quality health care services, to heal and to restore to health individuals who have entrusted their care to us. We shall nurture a team of dedicated, well-trained and sensitive health professionals who adhere to the highest standards of competence and ethics and who take pride in being part of the DPOTMH Family. We shall continuously improve our services, facilities and equipment, ever mindful of our role to heal the whole person and to render this in the best possible way.
							</p>
						</div>
						<p>
							<b class="chead"><span class="fa fa-map-marker"></span>ADDRESS</b><br>
							<span class="editContent">
								B.S. Aquino Drive <br>
								Bacolod City, 6100 <br>
								Philippines <br>
							</span>
						</p>
						<p>
							<b class="chead"><span class="fa fa-phone"></span> PHONE</b><br>
							<span class="editContent">(034) 433-7331</span>
						</p>
						<p>
							<b class="chead"><span class="fa fa-fax"></span> FAX</b><br>
							<span class="editContent">(034) 434-5532</span>
						</p>
						<p>
							<b class="chead"><span class="fa fa-envelope"></span> WEBSITE</b><br>
							<a href="http://www.rivermedcenter.net/" class="editContent" target="_blank">http://www.rivermedcenter.net/</a>
						</p>
						<p>
							<b class="chead"><span class="fa fa-envelope"></span> EMAIL</b><br>
							<a href="#" class="editContent">clientrelations@rivermedcenter.net</a>
						</p>
					</div>
					<div class="col-md-5">
						<h3 class="margin-bottom-40 editContent">Send us your suggestions</h3>
						<form method="POST" action="sendmessage.php">
							<div class="form-group">
								<input  minlength=10 type="text" required="" class="form-control input-md" id="name" name="namae"  pattern="[a-zA-Z\s]{1,}" placeholder="Your Full Name *">
							</div>
							<div class="form-group">
								<input  minlength=10 type="email" required="" class="form-control input-md" id="email" name="email" placeholder="Your email address*">
							</div>
							<div class="form-group">
								<textarea maxlength="300" class="form-control" required="" rows="4" name="message" placeholder="Suggestions / inquiry..."></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-md btn-wide pull-right" name="submit"></input>
						</form>
					</div>
				</div>
			</div>
		</div>

		<footer class="text-center">
			<a class="up-arrow" href="#homepage" data-toggle="tooltip" title="TO TOP">
				<span class="glyphicon glyphicon-chevron-up"></span>
			</a><br><br>
			<strong>R.Borromeo &copy;<?php echo date("Y");?>. <br></strong> All rights reserved.
		</footer>
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			})
			$(function() {
				$('a[href*="#"]:not([href="#"])').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html, body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			});
		</script>
	</body>
	</html>
