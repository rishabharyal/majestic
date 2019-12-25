<section class="mj-bdy-section mr-cleaning">
	<div class="mj-bdy-container">
		<div class="mj-bdy-content mj-services-content">
			<div class="mj-header-content">
				<h1 class="mj-header">
					Cleaning Services
				</h1>
				<span class="mj-span">
					Professional Cleaning Services for Home, Apartment and Office
				</span>
			</div>
			<div class="mj-inside-bdy row">
				@foreach ($services as $service)
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mj-lst">
					<div class="mj-ls-img">
						<img src="images/broom.png">
					</div>
					<div class="mj-lst-info">
						<label class="info-label">{{ $service->value }}</label>
						<span class="info-desc">
							{{ substr($service->description, 0, 75) }}...
						</span>
						<a href="/services/{{ $service->slug }}"> More info &gt;&gt;</a>
					</div>
				</div>
				@endforeach

				<div class="col-12">
					<a href="/services" class="btn mg-btn-primary">
						Show All
					</a>
				</div>
			</div>
		</div>
	</div>
</section>