@extends('admin.layouts.app')

@section('content')
	<div class="row">
        @if(Session::has('message'))
            <div class="col-lg-12">
                <div class="alert alert-info">
                    {{ Session::get('message') }}
                </div>  
            </div>
        @endif
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
                    <h5>Edit Setings: {{ $setting->name }}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ action('Admin\SettingController@update', $setting->id) }}" method="post">
                		@csrf
                        @method('PUT')
                		<div class="row">
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="key">Key</label>
                                <input value="{{ $setting->key }}" type="text" name="key" id="key" placeholder="{{$setting->key}}" class="form-control">
	                			</div>
	                		</div>
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="key">Value</label>
                                <input value="{{ $setting->value }}" type="text" name="value" id="value" placeholder="{{$setting->value}}" class="form-control">
	                			</div>
	                		</div>
	                		<div class="col-md-12 col-sm-12 text-left">
	                			<div class="form-group">
	                				<button class="btn btn-primary">Update Settings</button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
	</div>

@endsection