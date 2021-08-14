@extends('site.layouts.master')

@section('meta-title')
	@lang('site.contactUs') - 
@endsection

@section('meta-description')
	@lang('site.addressLine1')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
    <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.contactUs')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.welcome_6161')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.contactUs')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
	<div class="container">
		
		<div class="row">

			<!-- FORM -->
			{{-- <div class="col-md-8">

				<h3>@lang('site.contactUsHeader')</h3>
				
				<!--
					MESSAGES
					
						How it works?
						The form data is posted to php/contact.php where the fields are verified!
						php.contact.php will redirect back here and will add a hash to the end of the URL:
							#alert_success 		= email sent
							#alert_failed		= email not sent - internal server error (404 error or SMTP problem)
							#alert_mandatory	= email not sent - required fields empty
							Hashes are handled by assets/js/contact.js

						Form data: required to be an array. Example:
							contact[email][required]  WHERE: [email] = field name, [required] = only if this field is required (PHP will check this)
							Also, add `required` to input fields if is a mandatory field. 
							Example: <input required type="email" value="" class="form-control" name="contact[email][required]">

						PLEASE NOTE: IF YOU WANT TO ADD OR REMOVE FIELDS (EXCEPT CAPTCHA), JUST EDIT THE HTML CODE, NO NEED TO EDIT php/contact.php or javascript
									 ALL FIELDS ARE DETECTED DINAMICALY BY THE PHP

						WARNING! Do not change the `email` and `name`!
									contact[name][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
									contact[email][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
				-->

				<!-- Alert Success -->
				<div id="alert_success" class="alert alert-success mb-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thank You!</strong> Your message successfully sent!
				</div><!-- /Alert Success -->


				<!-- Alert Failed -->
				<div id="alert_failed" class="alert alert-danger mb-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>[SMTP] Error!</strong> Internal server error!
				</div><!-- /Alert Failed -->


				<!-- Alert Mandatory -->
				<div id="alert_mandatory" class="alert alert-danger mb-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Sorry!</strong> You need to complete all mandatory (*) fields!
				</div><!-- /Alert Mandatory -->


				<form action="php/contact.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<input type="hidden" name="action" value="contact_send" />

						<div class="row">
							<div class="col-md-4">
								<label for="contact:name">Full Name *</label>
								<input required type="text" value="" class="form-control" name="contact[name][required]" id="contact:name">
							</div>
							<div class="col-md-4">
								<label for="contact:email">E-mail Address *</label>
								<input required type="email" value="" class="form-control" name="contact[email][required]" id="contact:email">
							</div>
							<div class="col-md-4">
								<label for="contact:phone">Phone</label>
								<input type="text" value="" class="form-control" name="contact[phone]" id="contact:phone">
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label for="contact:subject">Subject *</label>
								<input required type="text" value="" class="form-control" name="contact[subject][required]" id="contact:subject">
							</div>
							<div class="col-md-4">
								<label for="contact_department">Department</label>
								<select class="form-control pointer" name="contact[department]">
									<option value="">--- Select ---</option>
									<option value="Marketing">Marketing</option>
									<option value="Webdesign">Webdesign</option>
									<option value="Architecture">Architecture</option>
								</select>
							</div>
						</div>
						<div class="clearfix">
							<label for="contact:message">Message *</label>
							<textarea required maxlength="10000" rows="8" class="form-control" name="contact[message]" id="contact:message"></textarea>
						</div>
						<div class="clearfix mt-30">
							<label for="contact:attachment">File Attachment</label>

							<!-- custom file upload -->
							<input class="custom-file-upload" type="file" id="file" name="contact[attachment]" id="contact:attachment" data-btn-text="Select a File" />
							<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>
						</div>










						<!-- 
							START: REMOVE IF RECAPTCHA NOT USED 
							+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						-->
						<div class="clearfix mt-30">

							<!-- 
								+ GET YOUR GOOGLE RECAPTCHA KEY
								https://www.google.com/recaptcha/admin#list


								+ PLEASE NOTE:
									data-sitekey="6LcK80cUAAAAAKhlScfnSHZxL9IIYQgbyTVa8BJ_"  IT'S WORKING ON STEPOFWEB.COM ONLY
									Create your own google api key:  https://www.google.com/recaptcha/admin#list
							-->
							<script src="https://www.google.com/recaptcha/api.js" async defer></script>
							<div class="g-recaptcha" data-sitekey="6LcK80cUAAAAAKhlScfnSHZxL9IIYQgbyTVa8BJ_"></div>

						</div>
						<!-- 
							+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
							END: REMOVE IF RECAPTCHA NOT USED 
						-->





					</fieldset>

					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SEND MESSAGE</button>
						</div>
					</div>
				</form>

			</div> --}}
			<!-- /FORM -->

			<div class="col-md-8">
				<h3 class="mb-sm mt-sm">@lang('site.location')</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d960.7141115868537!2d32.51813722913993!3d15.599316891029774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x168e8e126db7d1c1%3A0x4a96944150b4ae7e!2sAl-Faihaa%20Building!5e0!3m2!1sen!2s!4v1598130256015!5m2!1sen!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>



			<!-- INFO -->
			<div class="col-md-4">

				<h2>@lang('site.happyToServeYou') <i class="fa fa-smile-o" aria-hidden="true"></i></h2>

				<p>
					@lang('site.welcomeToCustomerServiceTxt')
				</p>

				<hr />

				<p>
					<span class="block"><strong><i class="fa fa-map-marker"></i> @lang('site.address'):</strong> @lang('site.addressLine1') </span>
					<span class="block"><strong><i class="fa fa-phone"></i> @lang('site.phone'):</strong> <a href="tel:@lang('site.addressPhone')" dir="ltr"> @lang('site.addressPhone') </a></span>
					{{-- <span class="block"><strong><i class="fa fa-whatsapp"></i> @lang('site.phone'):</strong> <a href="http://wa.com/@lang('site.addressPhone')" dir="ltr"> @lang('site.addressPhone') </a></span> --}}
					<span class="block"><strong><i class="fa fa-envelope"></i> @lang('site.email'):</strong> <a href="mailto:@lang('site.addressEmail')">@lang('site.addressEmail')</a></span>
				</p>

				<hr />

				<h4 class="font300">@lang('site.businessHours')</h4>
				<p>
					<span class="block">@lang('site.businessHoursLine1')</span>
					<span class="block">@lang('site.businessHoursLine2')</span>
				</p>

			</div>
			<!-- /INFO -->

		</div>

	</div>
</section>

@stop

@section('scripts')
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTQgPrZgWBnnT822P0FRfEq1T4e0PWGkM"></script> -->
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			// // Map Markers
			// var mapMarkers = [{
			// 	address: "السودان - الخرطوم - شارع علي عبد اللطيف",
			// 	html: "<strong>شركة الفيصل للأوراق المالية المحدودة</strong><br> عمارة الفيحاء - الطابق الثالث",
			// 	icon: {
			// 		image: "{{request()->root()}}/public/assets/porto/img/pin.png",
			// 		iconsize: [46, 46],
			// 		iconanchor: [12, 46]
			// 	},
			// 	popup: true
			// }];
			//
			// // Map Initial Location
			// var initLatitude = 15.551690;
			// var initLongitude = 32.551564;
			//
			// // Map Extended Settings
			// var mapSettings = {
			// 	controls: {
			// 		panControl: true,
			// 		zoomControl: true,
			// 		mapTypeControl: true,
			// 		scaleControl: true,
			// 		streetViewControl: true,
			// 		overviewMapControl: true
			// 	},
			// 	scrollwheel: false,
			// 	markers: mapMarkers,
			// 	latitude: initLatitude,
			// 	longitude: initLongitude,
			// 	zoom: 16
			// };
			//
			// var map = $('#googlemaps').gMap(mapSettings);
			//
			// // Map Center At
			// var mapCenterAt = function(options, e) {
			// 	e.preventDefault();
			// 	$('#googlemaps').gMap("centerAt", options);
			// }

		</script>

@stop
