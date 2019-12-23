@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
                    <h5>Edit Postcode: {{ $postcode->postcode }}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ action('Admin\PostcodeController@update', $postcode->id) }}" method="post">
                		@csrf
                        @method('PUT')
                		<div class="row">
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="name">Postcode</label>
	                				<input value="{{ $postcode->postcode }}" type="text" name="postcode" id="postcode" placeholder="" class="form-control">
	                			</div>
	                		</div>
	                		<div class="col-md-12 col-sm-12 text-left">
	                			<div class="form-group">
	                				<button class="btn btn-primary">Update Postcode</button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
	</div>

@endsection