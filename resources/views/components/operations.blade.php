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
						{!! $settings['address'] ?? '146 B Woodrow Av, Dianella, AU, 6059' !!}
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
						<a href="#" class="btn mg-btn-primary">
							{!! $settings['book'] ?? 'Book Majestic Services' !!}
						</a>
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
							<span> {!! $settings['monday-friday'] ?? '7:00 - 20:00' !!}</span>
						</div>
						<div class="col-12">
							<label> Saturday</label>
							<span> {!! $settings['saturday'] ?? '8:30 - 19:30' !!}</span>
						</div>
						<div class="col-12">
							<label> Sunday</label>
							<span> {!! $settings['sunday'] ?? 'Closed' !!}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>