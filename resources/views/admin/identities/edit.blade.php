@extends('admin.layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
				<h5>Edit: {{$identity->name}}</h5>
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="ibox-content">
			<form action="{{action('Admin\IdentityController@update',$identity->id)}}" enctype="multipart/form-data"
				method="POST">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="form-group">
							<label for="title">Title</label>
						<input type="text" name="title" id="title" placeholder="" class="form-control" value="{{$identity->title}}">
						</div>
					</div>
					<div class="col-md-12 col-sm-12 text-right">
						<div class="form-group">
							<button class="btn btn-primary">Update Identity</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

@endsection