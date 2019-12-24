@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
				<h5>Edit: {{$portfolio->name}}</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form action="{{action('Admin\PortfolioController@update',$portfolio->id)}}"
					enctype="multipart/form-data" method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" placeholder="{{$portfolio->name}}"
									value="{{$portfolio->name}}"" class=" form-control">
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label for="designation">Designation</label>
								<input type="text" name="designation" id="designation"
									placeholder="{{$portfolio->designation}}"
									value="{{$portfolio->designation}}"" class=" form-control">
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" name="description" id="description"
									placeholder="{{$portfolio->description}}"
									value="{{$portfolio->description}}"" class=" form-control">
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label>Images</label>
								<div class="custom-file">
									<input id="images" type="file" name="image" class="custom-file-input">
									<label for="images" class="custom-file-label">Choose Images</label>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 text-left">
							<div class="form-group">
								<button class="btn btn-primary">Update Portfolio</button>
							</div>
						</div>
					</div>
				</form>
				@if($portfolio->hasMedia('default'))
				<form action="{{ action('Admin\PortfolioController@deleteMedia', $portfolio->id) }}" method="post">
					@csrf
					@method('delete')
					<div class="mail-box clearfix">
						<div class="mail-attachment">
							<div class="attachment">
								<div class="file-box">
									<div class="file">
										<a href="#">
											<span class="corner"></span>

											<div class="image">
												<a href="{{ $portfolio->firstMedia('default')->getUrl()}}"
													target="_new"><img
														src="{{ $portfolio->firstMedia('default')->getUrl()}}"
														alt="{{ $portfolio->value }}" class="img-fluid"></a>
											</div>
											<div class="file-name">
												<button class="btn btn-danger"> Delete image</button>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</form>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
@section('scripts')
<script>
	$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
}); 
</script>
@endsection