<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>منظمة الرعاية الطبية - السجل الطوعي الطبي</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="منظمة الرعاية الطبية - السجل الطوعي الطبي" />
	<meta name="keywords" content="منظمة الرعاية الطبية - السجل الطوعي الطبي" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,700&amp;subset=arabic" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/animate.css') }}">
	<!-- Icomoon Icon Fonts -->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/icomoon.css') }}">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/simple-line-icons.css') }}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/crew/css/owl.theme.default.min.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/crew/css/bootstrap-rtl.css') }}">
	<!-- 
	Default Theme Style 
	You can change the style.css (default color purple) to one of these styles
	
	1. pink.css
	2. blue.css
	3. turquoise.css
	4. orange.css
	5. lightblue.css
	6. brown.css
	7. green.css

	-->
	<link rel="stylesheet" href="{{ asset('assets/crew/css/style-rtl.css') }}">
	@yield('css')

	<!-- Modernizr JS -->
	<script src="{{ asset('assets/crew/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ asset('assets/crew/js/respond.min.js') }}"></script>
	<![endif]-->

	</head>
	<body>
	<header role="banner" id="fh5co-header">
			<!-- <div class="container">
				<img src="{{ asset('assets/crew/images/header-logo.jpg') }}" width="400" />
			</div> -->
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-primary">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		          	<a class="navbar-brand" href="{{request()->root()}}"></a> 
					<img class="brand-slogan" src="{{ asset('assets/crew/images/header-logo.jpg') }}" width="340" />
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
					<?php $pages = App\Page::where('parent_id',0)->get(); ?>
					@foreach($pages as $page)
						<li><a href="{{$page->getLink()}}"><span>{{$page->title}}</span></a></li>
					@endforeach
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>

	@section('content')
		<div id="slider" data-section="home" dir="ltr">
			<div class="owl-carousel owl-carousel-fullwidth">
				<!-- You may change the background color here. -->
				<div class="item" style="background: #352f44;">
					<div class="container" style="position: relative;">
						<div class="row">
							<div class="col-md-7 col-sm-7">
								<div class="fh5co-owl-text-wrap">
									<div class="fh5co-owl-text">
										<h1 class="fh5co-lead to-animate">Case Study Title</h1>
										<h2 class="fh5co-sub-lead to-animate">100% Free Fully Responsive HTML5 Bootstrap Template. Crafted with love by the fine folks at <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></h3>
										<p class="to-animate-2"><a href="#" class="btn btn-primary btn-lg">View Case Study</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-md-push-1 col-sm-4 col-sm-push-1 iphone-image">
								<div class="iphone to-animate-2"><img src="{{ asset('assets/crew/images/iphone-2.png') }}" alt="Free HTML5 Template by FREEHTML5.co"></div>
							</div>

						</div>
					</div>
				</div>
				<!-- You may change the background color here.  -->
				<div class="item" style="background: #38569f;">
					<div class="container" style="position: relative;">
						<div class="row">
							<div class="col-md-7 col-md-push-1 col-md-push-5 col-sm-7 col-sm-push-1 col-sm-push-5">
								<div class="fh5co-owl-text-wrap">
									<div class="fh5co-owl-text">
										<h1 class="fh5co-lead to-animate">Case Study Title</h1>
										<h2 class="fh5co-sub-lead to-animate">100% Free Fully Responsive HTML5 Bootstrap Template. Crafted with love by the fine folks at <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></h3>
										<p class="to-animate-2"><a href="#" class="btn btn-primary btn-lg">View Case Study</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-md-pull-7 col-sm-4 col-sm-pull-7 iphone-image">
								<div class="iphone to-animate-2"><img src="{{ asset('assets/crew/images/iphone-1.png') }}" alt="Free HTML5 Template by FREEHTML5.co"></div>
							</div>

						</div>
					</div>
				</div>

				<div class="item" style="background-image:url(images/slide_5.jpg)">
					<div class="overlay"></div>
					<div class="container" style="position: relative;">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center">
								<div class="fh5co-owl-text-wrap">
									<div class="fh5co-owl-text">
										<h1 class="fh5co-lead to-animate">Grab it now for free!</h1>
										<h2 class="fh5co-sub-lead to-animate">100% Free Fully Responsive HTML5 Bootstrap Template. Crafted with love by the fine folks at <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></h3>
										<p class="to-animate-2"><a href="http://freehtml5.co/" target="_blank" class="btn btn-primary btn-lg">Download This Template</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div id="fh5co-about-us" data-section="about">
			<div class="container">
				<div class="row row-bottom-padded-lg" id="about-us">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">About Us</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 to-animate">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
					<div class="col-md-8 to-animate">
						<img src="{{ asset('assets/crew/images/img_1.jpg') }}" class="img-responsive img-rounded" alt="Free HTML5 Template">
					</div>
					<div class="col-md-4 to-animate">
						<h2>How we got started</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
						<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day.</p>
						<p><a href="#" class="btn btn-primary">Meet the team</a></p>
					</div>
				</div>
				<div class="row" id="team">
					<div class="col-md-12 section-heading text-center to-animate">
						<h2>Team</h2>
					</div>
					<div class="col-md-12">
						<div class="row row-bottom-padded-lg">
							<div class="col-md-4 text-center to-animate">
								<div class="person">
									<img src="{{ asset('assets/crew/images/person2.jpg') }}" class="img-responsive img-rounded" alt="Person">
									<h3 class="name">John Doe</h3>
									<div class="position">Web Developer</div>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
									<ul class="social social-circle">
										<li><a href="#"><i class="icon-twitter"></i></a></li>
										<li><a href="#"><i class="icon-linkedin"></i></a></li>
										<li><a href="#"><i class="icon-instagram"></i></a></li>
										<li><a href="#"><i class="icon-github"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-4 text-center to-animate">
								<div class="person">
									<img src="{{ asset('assets/crew/images/person3.jpg') }}" class="img-responsive img-rounded" alt="Person">
									<h3 class="name">Rob Smith</h3>
									<div class="position">Web Designer</div>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
									<ul class="social social-circle">
										<li><a href="#"><i class="icon-twitter"></i></a></li>
										<li><a href="#"><i class="icon-linkedin"></i></a></li>
										<li><a href="#"><i class="icon-instagram"></i></a></li>
										<li><a href="#"><i class="icon-dribbble"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-4 text-center to-animate">
								<div class="person">
									<img src="{{ asset('assets/crew/images/person4.jpg') }}" class="img-responsive img-rounded" alt="Person">
									<h3 class="name">John Doe</h3>
									<div class="position">Photographer</div>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
									<ul class="social social-circle">
										<li><a href="#"><i class="icon-twitter"></i></a></li>
										<li><a href="#"><i class="icon-linkedin"></i></a></li>
										<li><a href="#"><i class="icon-instagram"></i></a></li>
										<li><a href="#"><i class="icon-github"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-our-services" data-section="services">
			<div class="container">
				<div class="row row-bottom-padded-sm">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Our Services</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 to-animate">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="box to-animate">
							<div class="icon colored-1"><span><i class="icon-mustache"></i></span></div>
							<h3>100% free</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box to-animate">
							<div class="icon colored-4"><span><i class="icon-heart"></i></span></div>
							<h3>Made with love</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box to-animate">
							<div class="icon colored-2"><span><i class="icon-screen-desktop"></i></span></div>
							<h3>Fully responsive</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
						<div class="box to-animate">
							<div class="icon colored-5"><span><i class="icon-rocket"></i></span></div>
							<h3>Fast &amp; light</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box to-animate">
							<div class="icon colored-3"><span><i class="icon-eye"></i></span></div>
							<h3>Retina-ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box to-animate">
							<div class="icon colored-6"><span><i class="icon-user"></i></span></div>
							<h3>For creative like you!</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="fh5co-features" data-section="features">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="single-animate animate-features-1">Features</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 single-animate animate-features-2">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-bottom-padded-sm">
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-present"></i></div>
						<div class="fh5co-desc">
							<h3>100% Free</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>	
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-eye"></i></div>
						<div class="fh5co-desc">
							<h3>Retina Ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-crop"></i></div>
						<div class="fh5co-desc">
							<h3>Fully Responsive</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-speedometer"></i></div>
						<div class="fh5co-desc">
							<h3>Lightweight</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>	
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-heart"></i></div>
						<div class="fh5co-desc">
							<h3>Made with Love</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
						<div class="fh5co-icon"><i class="icon-umbrella"></i></div>
						<div class="fh5co-desc">
							<h3>Eco Friendly</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 single-animate animate-features-3">
						<a href="#" class="btn btn-primary btn-block">Learn More</a>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-testimonials" data-section="testimonials">		
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Happy Clients Says...</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext to-animate">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="box-testimony to-animate">
							<blockquote>
								<span class="quote"><span><i class="icon-quote-left"></i></span></span>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
							<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
						</div>
						
					</div>
					<div class="col-md-4">
						<div class="box-testimony to-animate">
							<blockquote>
								<span class="quote"><span><i class="icon-quote-left"></i></span></span>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
							</blockquote>
							<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
						</div>
						
						
					</div>
					<div class="col-md-4">
						<div class="box-testimony to-animate">
							<blockquote>
								<span class="quote"><span><i class="icon-quote-left"></i></span></span>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
							<p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-pricing" data-section="pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="single-animate animate-pricing-1">Pricing</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext single-animate animate-pricing-2">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Starter</h2>
							<div class="price"><sup class="currency">$</sup>7<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>10 projects</li>
								<li>20 Pages</li>
								<li>20 Emails</li>
								<li>100 Images</li>
							</ul>
							<a href="#" class="btn btn-default btn-sm">Get started</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Regular</h2>
							<div class="price"><sup class="currency">$</sup>19<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>15 projects</li>
								<li>40 Pages</li>
								<li>40 Emails</li>
								<li>200 Images</li>
							</ul>
							<a href="#" class="btn btn-default btn-sm">Get started</a>
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 to-animate">
						<div class="price-box popular">
							<div class="popular-text">Best value</div>
							<h2 class="pricing-plan">Plus</h2>
							<div class="price"><sup class="currency">$</sup>79<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>Unlimitted projects</li>
								<li>100 Pages</li>
								<li>100 Emails</li>
								<li>700 Images</li>
							</ul>
							<a href="#" class="btn btn-primary btn-sm">Get started</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan">Enterprise</h2>
							<div class="price"><sup class="currency">$</sup>125<small>/mo</small></div>
							<p>Basic customer support for small business</p>
							<hr>
							<ul class="pricing-info">
								<li>Unlimitted projects</li>
								<li>Unlimitted Pages</li>
								<li>Unlimitted Emails</li>
								<li>Unlimitted Images</li>
							</ul>
							<a href="#" class="btn btn-default btn-sm">Get started</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div id="fh5co-press" data-section="press">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="single-animate animate-press-1">Press Releases</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext single-animate animate-press-2">
								<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<!-- Press Item -->
						<div class="fh5co-press-item to-animate">
							<div class="fh5co-press-img" style="background-image: url(images/img_7.jpg)">
							</div>
							<div class="fh5co-press-text">
								<h3 class="h2 fh5co-press-title">Simplicity <span class="fh5co-border"></span></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eius quos similique suscipit dolorem cumque vitae qui molestias illo accusantium...</p>
								<p><a href="#" class="btn btn-primary btn-sm">Learn more</a></p>
							</div>
						</div>
						<!-- Press Item -->
					</div>

					<div class="col-md-6">
						<!-- Press Item -->
						<div class="fh5co-press-item to-animate">
							<div class="fh5co-press-img" style="background-image: url(images/img_8.jpg)">
							</div>
							<div class="fh5co-press-text">
								<h3 class="h2 fh5co-press-title">Versatile <span class="fh5co-border"></span></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eius quos similique suscipit dolorem cumque vitae qui molestias illo accusantium...</p>
								<p><a href="#" class="btn btn-primary btn-sm">Learn more</a></p>
							</div>
						</div>
						<!-- Press Item -->
					</div>
					
					<div class="col-md-6">
						<!-- Press Item -->
						<div class="fh5co-press-item to-animate">
							<div class="fh5co-press-img" style="background-image: url(images/img_9.jpg);">
							</div>
							<div class="fh5co-press-text">
								<h3 class="h2 fh5co-press-title">Aesthetic <span class="fh5co-border"></span></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eius quos similique suscipit dolorem cumque vitae qui molestias illo accusantium...</p>
								<p><a href="#" class="btn btn-primary btn-sm">Learn more</a></p>
							</div>
						</div>
						<!-- Press Item -->
					</div>

					<div class="col-md-6">
						<!-- Press Item -->
						<div class="fh5co-press-item to-animate">
							<div class="fh5co-press-img" style="background-image: url(images/img_10.jpg);">
							</div>
							<div class="fh5co-press-text">
								<h3 class="h2 fh5co-press-title">Creative <span class="fh5co-border"></span></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eius quos similique suscipit dolorem cumque vitae qui molestias illo accusantium...</p>
								<p><a href="#" class="btn btn-primary btn-sm">Learn more</a></p>
							</div>
						</div>
						<!-- Press Item -->
					</div>

				</div>
			</div>
		</div>
	@show

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12">
					<p class="copyright text-center">&copy; 2017 منظمة الرعاية الطبية. جميع الحقوق محفوظة.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="social social-circle">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-youtube"></i></a></li>
						<li><a href="#"><i class="icon-pinterest"></i></a></li>
						<li><a href="#"><i class="icon-linkedin"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- jQuery -->
	<script src="{{ asset('assets/crew/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('assets/crew/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('assets/crew/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('assets/crew/js/jquery.waypoints.min.js') }}"></script>
	<!-- Owl Carousel -->
	<script src="{{ asset('assets/crew/js/owl.carousel.min.js') }}"></script>

	<!-- Main JS (Do not remove) -->
	<script src="{{ asset('assets/crew/js/main.js') }}"></script>



	@section('scripts')
	@show

	</body>
</html>
