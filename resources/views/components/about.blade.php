<section class="mj-bdy-section mj-bdy-section-parag">
	<div class="mj-bdy-container">
		<div class="mj-bdy-content mj-services-content">
			<div class="mj-inside-bdy row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 side-image-container">
					<img src="images/galaxy2000-heater.jpg" class="img-fluid">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 side-content-container">
					<h3>
						{{ $posts[0]->title ?? ''}}
					</h3>
					<p>
						{{ $posts[0]->description ?? ''}}
					</p>
					<a href="/about/{{ $posts[0]->slug ?? '' }}"> Read more  &gt;&gt; </a>
				</div>
			</div>
		</div>
		<div class="mj-inside-bdy row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 side-content-container">
				<h3>
					{{ $posts[1]->title ?? ''}}
				</h3>
				<p>
					{{ $posts[1]->description ?? ''}}
				</p>
				<a href="/about/{{ $posts[1]->slug ?? '' }}"> Read more  &gt;&gt; </a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 side-image-container">
				<img src="images/cleaning+service.jpeg" class="img-fluid">
			</div>
		</div>
	</div>
</section>