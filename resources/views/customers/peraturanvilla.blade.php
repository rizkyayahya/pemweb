<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="csss/tiny-slider.css">
	<link rel="stylesheet" href="csss/aos.css">
	<link rel="stylesheet" href="csss/style.css">

	<title>VILLA &mdash; BANDUNG </title>
	<style>
	.review-image {
    width: 100%;
    height: auto;
    border-radius: 15px;
	}
	.green-box {
        background-color: #055555; /* Warna hijau */
        padding: 50px;
		width: 115%;
		margin-left: -15%;
		border-radius: 30px;                        
      	box-shadow: 0 8px 10px 10px rgba(0, 0, 0, 0.1);
    }

    .green-box p {
        color: white;
		font-size: 18px;
    }

	.grean-box {
        background-color: #055555; /* Warna hijau */
        padding: 50px;
		width: 115%;
		margin-left: 8%;
		border-radius: 30px;                        
      	box-shadow: 0 8px 10px 10px rgba(0, 0, 0, 0.1);
    }

    .grean-box p {
        color: white;
		font-size: 18px;
    }
	
	.left-align {
    text-align: left;
	}
	</style>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<a href="index" class="logo m-0 float-start">Villa Bandung.</a>

					<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
					<li class="active"><a href="{{ route('customers.index')}}">Kembali</a></li>
					</ul>

					<a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
						<span></span>
					</a>

				</div>
			</div>
		</div>
	</nav>

	<div class="hero">


		<div class="hero-slide">
			<div class="img overlay" style="background-image: url('images/hero_bg_001.jpg')"></div>
			<div class="img overlay" style="background-image: url('images/hero_bg_002.jpg')"></div>
			<div class="img overlay" style="background-image: url('images/hero_bg_003.jpg')"></div>
		</div>

		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-9 text-center">
					<h1 class="heading" data-aos="fade-up">Temukan tempat menginap di Villabandung.com</h1>
					<form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
						<input type="text" class="form-control px-4" placeholder="Lembang, Ciwidey, Pangalengan">
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<div class="section section-4 bg-light">
		<div class="container">
			<div class="row justify-content-center  text-center mb-5">
				<div class="col-lg-5">
					<h3 class="font-weight-bold heading text-primary mb-4" id="peraturan"style="text-align:left">Peraturan Villa Lembang</h3>
					<div class="green-box">
					@foreach($peraturans as $peraturan)
					<p class="left-align">•  {{ $peraturan->isi }}</p>
					@endforeach	
					</div>
				</div>

				<div class="col-lg-5">
				<h3 class="font-weight-bold heading text-primary mb-4" id="peraturan" style="text-align:right">Peraturan Villa Dago</h3>
					<div class="grean-box">
					@foreach($peraturandagos as $peraturandago)
					<p class="left-align">•  {{ $peraturandago->isi }}</p>
					@endforeach
					</div>
				</div>
				
			</div>
		</div>
	</div>
    
	<div class="site-footer">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3>Contact</h3>
						<address>Jl. Permata Permai XII No. 44, Cisaranten Kulon Arcamanik Bandung</address>
						<ul class="list-unstyled links">
							<li><a href="tel://11234567890">+62(022)-456-7890</a></li>
							<li><a href="tel://11234567890">+62 85462548526</a></li>
							<li><a href="mailto:info@mydomain.com">info@viladibandung.com</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3>Links</h3>
						<ul class="list-unstyled links">
							<ul class="list-unstyled links">
								<li><a href="https://www.tokopedia.com/villabandungamethys">Tokopedia</a></li>
								<li><a href="https://shopee.co.id/jiwaramadhan">Shopee</a></li>
								<li><a href="https://www.facebook.com/amethystdago/">Facebook</a></li>
								<li><a href="https://www.airbnb.co.id/users/show/186407489">airbnb</a></li>
							</ul>
						</ul>
						<ul class="list-unstyled social">
							<li><a href="https://www.facebook.com/amethystdago/"><span class="icon-facebook"></span></a></li>
							<li><a href="https://www.pinterest.com/adagoresort/"><span class="icon-pinterest"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->


			<div class="row mt-5">
				<div class="col-12 text-center">
					<!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; by <a href=" ">Allin.studio</a> <!-- License information: https://untree.co/license/ -->
            </p>

          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->


    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
	@include('sweetalert::alert')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
  </html>
