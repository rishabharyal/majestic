@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Add a New Service Item</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                	<form action="{{ action('Admin\ServiceController@store') }}" method="post">
                		@csrf
                		<div class="row">
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="key">Value</label>
	                				<input type="text" name="value" id="value" placeholder="" class="form-control">
	                			</div>
	                		</div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="postcode">Post Codes</label>
                                <select class="select2" name="postcodes[]" multiple="multiple" style='width:100%'>
                                    @foreach ($postcodes as $postcode)
                                        <option value="{{$postcode->id}}">{{$postcode->postcode}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="visibility" name="visibility">
                                      <label class="form-check-label" for="visibility">
                                        Frontend Visibility
                                      </label>
                                    </div>
                                  </div>
                            </div>
	                		<div class="col-md-12 col-sm-12 text-left">
	                			<div class="form-group">
	                				<button class="btn btn-primary">Add New Service</button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
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
                            <th>Value</th>
                            <th>Description</th>
                            <th>Visibility</th>
                            <th>Price</th>
                            <th>Postcodes</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $key=>$services)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $services->value }}</td>
                                    <td>{{ $services->description }}</td>
                                    <td>{{ $services->frontend_visibility?'Yes':'No' }}</td>
                                    <td>{{ $services->price }}</td>
                                    <td>
                                        @foreach ($services->postcodes as $postcode)
                                            {{$postcode->postcode  }}
                                        @endforeach
                                    </td>
                                    <th>
                                        <form action="{{ action('Admin\ServiceController@destroy', $services->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a title="Edit This key" href="{{ action('Admin\ServiceController@edit', $services->id) }}" class="btn btn-info">
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
@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop