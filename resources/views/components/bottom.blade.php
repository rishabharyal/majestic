<footer class="mj-footer">
	<div class="mj-footer-container ">
		<div class="mj-footer-bdy row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ft-logo">
				<img src="/images/logo.png">
				<div class="ft-socialmedia row">
					<a href="{!! $settings['facebook_url'] ?? 'https://facebook.com' !!}">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="{!! $settings['twitter_url'] ?? 'https://twitter.com' !!}">
						<i class="fa fa-twitter"></i>
					</a>
					<a href="{!! $settings['instagram_url'] ?? 'https://instagram.com' !!}">
						<i class="fa fa-instagram"></i>
					</a>
					<a href="{!! $settings['google_plus_url'] ?? 'https://plus.google.com' !!}">
						<i class="fa fa-google-plus-g"></i>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ft-link">
				<h4>Information</h4>
				<div class="row ft-link-container">
					<div class="col-xs-12 col-6">
						<a href="#">
							Home
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Choose City
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Services
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							About
						</a>
						 
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Blog
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Testimonials
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Login
						</a>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#">
							Sign Up
						</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ft-link">
				<h4>Contact Us</h4>
				<div class="row ft-contact-container">
					<div class="col-12">
						<label>Phone: <span> {!! $settings['phone'] ?? '+61406297396' !!}</span></label>
					</div>
					<div class="col-12">
						<label>Email: <span> {!! $settings['contact_email'] ?? 'sujanshrestha2044@gmail.com' !!}</span></label>
					</div>
					<div class="col-12">
						<label>Location: <span> {!! $settings['location'] ?? '146 B Woodrow Av, Dianella, AU, 6059' !!} </span></label>
					</div>

				</div>
			</div>
			<div class="col-12 mj-footerbottom">
				<span>
					Majestic Cleaning Pros © 2019 All rights reserved.
					Developed and maintained by <a href="https://alphatech.com" class="mj-develp-a">{!! $settings['alphatech'] ?? 'Alphatech' !!}</a>
				</span>
				<div class="mj-develp-info">						
				<a href="/privacy"> Privacy Policy </a>
				<a href="/terms">Terms and Conditions</a>
				</div>
			</div>
		</div>
	</div>
</footer>