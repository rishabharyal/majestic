@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
				<h5>Edit: {{$city->city}}</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form action="{{action('Admin\CityController@update',$city->id)}}" enctype="multipart/form-data"
					method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label for="city">Name</label>
								<input type="text" name="city" id="city" placeholder="{{$city->city}}"
									value="{{$city->city}}"" class=" form-control">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 text-right">
							<div class="form-group">
								<button class="btn btn-primary">Update city</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection