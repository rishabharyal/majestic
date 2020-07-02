<section class="mj-bdy-section mj-benefits">
	<div class="mj-bdy-container">
		<div class="mj-bdy-content mj-services-content">
			<div class="mj-inside-bdy row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 mj-benefits-list">
					<label class='counter'>{!! $settings['places_cleaned'] ?? '826' !!}</label>
					<span>Places Cleaned</span>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 mj-benefits-list">
					<label class='counter'>{!! $settings['happy_clients'] ?? '798' !!}</label>
					<span>Happy Clients</span>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 mj-benefits-list">
					<label class='counter'>{!! $settings['people_working'] ?? '145' !!}</label>
					<span>People Working</span>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 mj-benefits-list">
					<label class='counter'>{!! $settings['completed_movings'] ?? '345' !!}</label>
					<span>Completed Movings</span>
				</div>
			</div>
		</div>
	</div>
</section>

@section('scripts')
<script>
	jQuery(document).ready(function($) {
		$('.counter').each(function () {
		//default starting point
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			// Speed of counter in ms, default animation style
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
		});
	});
</script>
@endsection
