<section class="mj-bdy-section mj-bdy-blog">
	<div class="mj-bdy-container">
		<div class="mj-bdy-content mj-services-content">
			<div class="mj-header-content">
				<h1 class="mj-header">
					Our Blog
				</h1>
			</div>
			<div class="mj-inside-bdy row">
				@foreach($blogs as $blog)
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
						<a href="#"></a>
						<div class="mg-blog-card"><a href="#">
							<img src="images/Furniture.jpg" class="img-fluid">
							</a><div class="mg-blog-info"><a href="#">
								<h4>{{ $blog->title }}</h4>
								<span>
									{{ $blog->created_at->diffForHumans() }}
								</span>
								<p>
									{!! $blog->description !!}
								</p>
								</a><a href="#"> Read More  &gt;&gt; </a>
							</div>
						</div>
					</div>
				@endforeach
				<div class="col-12">
					<a href="/blogs" class="btn mg-btn-primary">
						All Blogs
					</a>
				</div>
			</div>
		</div>
	</div>
</section>