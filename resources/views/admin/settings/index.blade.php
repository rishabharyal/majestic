@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Add a New Setting Item</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                	<form action="{{ action('Admin\SettingController@store') }}" method="post">
                		@csrf
                		<div class="row">
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="key">Key</label>
	                				<input type="text" name="key" id="key" placeholder="" class="form-control">
	                			</div>
	                		</div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="text" name="value" id="value" placeholder="" class="form-control">
                                </div>
                            </div>
	                		<div class="col-md-12 col-sm-12 text-left">
	                			<div class="form-group">
	                				<button class="btn btn-primary">Add New Value</button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <div class="col-lg-12">
                <div class="alert alert-info">
                    {{ Session::get('message') }}
                </div>  
            </div>
        @endif
        <div class="col-lg-12">
        	<div class="ibox ">
                <div class="ibox-title">
                    <h5>All Settings</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>key</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $key=>$setting)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <th>
                                        <form action="{{ action('Admin\SettingController@destroy', $setting->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a title="Edit This key" href="{{ action('Admin\SettingController@edit', $setting->id) }}" class="btn btn-info">
                                                <span class="fa fa-edit"></span> Edit 
                                            </a>
                                            <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
	</div>

@endsection