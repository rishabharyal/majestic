@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
                    <h5>Edit Service: {{ $service->service }}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ action('Admin\ServiceController@update', $service->id) }}" method="post">
                		@csrf
                        @method('PUT')
                		<div class="row">
	                		<div class="col-md-3 col-sm-12">
	                			<div class="form-group">
	                				<label for="key">Value</label>
                                <input value = '{{$service->value}}' type="text" name="value" id="value" placeholder="" class="form-control">
	                			</div>
	                		</div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input value = '{{$service->description}}' type="text" name="description" id="description" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input value = '{{$service->price}}' type="number" name="price" id="price" placeholder="" class="form-control">
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-12">
                                <label for="postcode">Post Codes</label>
                                <select class="select2" name="postcodes[]" multiple="multiple" style='width:100%'>
                                    @foreach ($postcodes as $postcode)
                                        <option value="{{$postcode->id}}" {{ in_array($postcode->id,$selectedPostcodes) ? 'Selected':''}} >{{$postcode->postcode}}</option>         
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input  {{$service->frontend_visibility? 'checked': ''}} class="form-check-input" type="checkbox" id="visibility" name="visibility">
                                      <label class="form-check-label" for="visibility">
                                        Frontend Visibility
                                      </label>
                                    </div>
                                  </div>
                            </div>
	                		<div class="col-md-12 col-sm-12 text-left">
	                			<div class="form-group">
	                				<button class="btn btn-primary">Update the Service</button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
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