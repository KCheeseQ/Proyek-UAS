<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

	<title>cosmicgameshop.com | Game Store</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets-2/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets-2/') ?>assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?= base_url('assets-2/') ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets-2/') ?>assets/css/owl.css">

</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- Header -->
	<header class="">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<h2>Cosmic Game Shop<em></em></h2>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('Cosmic_Game_Shop/index') ?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url('Cosmic_Game_Shop/parentData') ?>">Products</a>
						</li>

						<!-- <li class="nav-item">
							<a class="nav-link" href="checkout.html">Checkout</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

							<div class="dropdown-menu">
								<a class="dropdown-item" href="about.html">About Us</a>
								<a class="dropdown-item" href="blog.html">Blog</a>
								<a class="dropdown-item" href="testimonials.html">Testimonials</a>
								<a class="dropdown-item" href="terms.html">Terms</a>
							</div>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('Cosmic_Game_Shop/location') ?>">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>


	<!-- Page Content -->
	<!-- Banner Starts Here -->
	<div class="heading-page header-text">
		<section class="page-heading">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-content">
							<h2>XBOX Accessories</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Banner Ends Here -->

	<!-- Add your Create Accessories For XBOX button here -->
	<a href="<?= base_url('Cosmic_Game_Shop/dataDetails_Parent_Accessories') ?>"></a>

	<section class="blog-posts grid-system">
		<div class="container">
			<div class="all-blog-posts">
				<h2 class="text-center">Featured Products</h2>
				<br>
				<div class="row">
					<?php foreach ($accessories_xbox as $us) : ?>
						<div class="col-md-4 col-sm-6">
							<div class="blog-post">
								<div class="blog-thumb">
									<img src="<?= base_url('assets/img/accessories_xbox/') . $us['image']; ?>">
								</div>
								<div class="down-content">
									<p><?= $us['description']; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<!-- <div class="col-lg-12">
					<ul class="social-icons">
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Behance</a></li>
						<li><a href="#">Linkedin</a></li>
					</ul>
				</div> -->
				<div class="col-lg-12">
					<div class="copyright-text">
						<p>Cosmic Game Shop</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url('assets-2/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets-2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Additional Scripts -->
	<script src="<?= base_url('assets-2/') ?>assets/js/custom.js"></script>
	<script src="<?= base_url('assets-2/') ?>assets/js/owl.js"></script>
	<script src="<?= base_url('assets-2/') ?>assets/js/slick.js"></script>
	<script src="<?= base_url('assets-2/') ?>assets/js/isotope.js"></script>
	<script src="<?= base_url('assets-2/') ?>assets/js/accordions.js"></script>

	<script language="text/Javascript">
		cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
		function clearField(t) { //declaring the array outside of the
			if (!cleared[t.id]) { // function makes it static and global
				cleared[t.id] = 1; // you could use true and false, but that's more typing
				t.value = ''; // with more chance of typos
				t.style.color = '#fff';
			}
		}
	</script>

</body>

</html>
