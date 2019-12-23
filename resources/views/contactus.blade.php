@extends('layouts.app')

@section('content')
	<section class="mj-bdy-section mj-banner-section">
		<div class="mj-bdy-container mj-">
			<div class="mj-header-content">
				<h1 class="mj-header">
					Contact Us
				</h1>
				<span>
					We would love to hear from you
				</span>
			</div>
		</div>
	</section>
	<section class="mj-bdy-section mj-bdy-section-operating">
		<div class="mj-bdy-container">
			<div class="mj-bdy-content mj-services-content">
				<div class="mj-inside-bdy row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mr-schedule mr-contact">
						<h4>
							<img src="images/map-marker-alt-solid.svg">
							Contact Us
						</h4>
						<p>
							146 B Woodrow Av, Dianella, AU, 6059
						</p>
						<!-- <div class="">
							<a href="#" class="btn mg-btn-primary">
								Book Online
							</a>
						</div> -->
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mr-schedule ">
						<h4>
							<img src="images/box-open-solid.svg">
							Majestic Services
						</h4>
						<p>
							Book majestic services
						</p>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mr-schedule">
						<h4>
							<img src="images/clock-regular.svg">
							Opening Hours
						</h4>
						<div class="row mr-schedule-info">
							<div class="col-12">
								<label> Monday - Friday</label>
								<span> 7:00 - 20:00</span>
							</div>
							<div class="col-12">
								<label> Saturday</label>
								<span> 8:30 - 19:30</span>
							</div>
							<div class="col-12">
								<label> Sunday</label>
								<span> Closed</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mj-bdy-section mr-alter-section">
		<div class="mj-bdy-container">
			<div class="mj-bdy-content mj-services-content">
				<div class="mj-header-content">
					<h1 class="mj-header">
						Send Message
					</h1>
					<span class="mj-span"> 
						Feel free to send us Message
					</span>
				</div>
				<div class="mj-inside-bdy row mj-sendmess-container ">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="name" placeholder="Name" class="mj-sendmess-name">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="email" name="email" placeholder="E-mail" class="mj-sendmess-email" >
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="phone" placeholder="Contact Number" class="mj-contact-contact" >
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="text" name="subject" placeholder="Subject" class="mj-contact-subj" >
					</div>
					<div class="col-12">
						<!-- <input type="text" name="phone" placeholder="Contact Number" class="mj-contact-contact" > -->
						<textarea class="mj-contact-contact" placeholder="Type Your Message"></textarea>
					</div>
					<div class="col-12">
						<a href="#" class="btn mg-btn-primary">Send Message</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mj-bdy-section mr-book-banner">
		<div class="mj-bdy-container">
			<div class="mj-bdy-content mj-services-content">
				<div class="mj-inside-bdy row">
					<div class="col-xs-12 col-6">
						<h2>Ready to book with us?</h2>
					</div>
					<div class="col-xs-12 col-6">
						<a href="#" class="btn mg-btn-primary">
							Book Online
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mj-bdy-section mr-map-banner">
		<div class="mj-map-container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.196962668055!2d115.87352131523328!3d-31.901245427063248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32b00d2c9333ad%3A0x257190a24615e770!2s146B%20Woodrow%20Ave%2C%20Dianella%20WA%206059%2C%20Australia!5e0!3m2!1sen!2snp!4v1573157972376!5m2!1sen!2snp" width="1800" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</section>
	<section class="mj-bdy-section mr-newsletter-section">
		<div class="mj-bdy-container">
			<div class="mj-bdy-content mj-services-content">
				<div class="mj-header-content">
					<h1 class="mj-header">
						Newsletter
					</h1>
					<span class="mj-span"> 
						Subscribe to majestic, So that we can keep  you posted.
					</span>
				</div>
				<div class="mj-inside-bdy row mj-newsletter-container">
					<div class="col-12">
						<input type="text" name="name" placeholder="Name" class="mj-newsletter-name">
					</div>
					<div class="col-12">
						<input type="email" name="name" placeholder="E-mail" class="mj-newsletter-email" >
					</div>
					<div class="col-12">
						<a href="#" class="btn mg-btn-primary">Subscribe</a>
					</div>
				</div>
			</div>
		</div>
    </section>
@stop