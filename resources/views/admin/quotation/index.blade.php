@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div>
				<form action="{{ action('Admin\SearchController@index') }}" method="get"
					enctype="multipart/form-data">
					@csrf
					<div class="row" id="parent">
						<div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" placeholder="Select type">
                                    <option value="EOL">EOL</option>
                                    <option value="Regular">Regular Cleaning</option>
                                </select>
                            </div>
                        </div>
						{{-- <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="identities">Identities</label>
                                <select style="width:100%" class="form-control select2" name="identities[]" multiple="multiple">
                                    @foreach ($intities as $intity)
                                    <option value="{{ $intity->id }}">{{ $intity->title }}</option>
                                    @endforeach
								</select>
                            </div>
                        </div> --}}
						@foreach ($identities as $index=>$identity)
						<div class="col-md-1 col-sm-12">
                            <div class="form-group">
							<label for="{{$identity->id}}">{{$identity->title}}</label>
							<input type="number" min="0" value="0" name="search[{{$index}}]" id="{{$identity->title}}" class="form-control">
                            </div>
                        </div>
						@endforeach
						<div class="col-md-12 col-sm-12 text-left" id="submit">
							<div class="form-group">
								<button class="btn btn-primary">Search Item</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
                <h5>Search Results</h5>
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
								<th>Type</th>
								<th>Code</th>
								<th>Total Hours</th>
								<th>Price Per Hour</th>
								<th>Total Price</th>
								<th>Rooms</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cleanings as $key=>$cleaning)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{$cleaning->type}}</td>
								<td>{{$cleaning->code}}</td>
								<td>{{$cleaning->total_hours}}</td>
								<td>{{$cleaning->price_per_hour}}</td>
								<td>{{$cleaning->total_price}}</td>
								<td>
									<table class="table table-striped table-sm">
										{{ dd($cleaning->prices) }}
										@foreach($cleaning->prices as $price)
											<tr>
												<td>{{ $price->identity->name }}</td>
												<td>{{ $price->quantity }}</td>
											</tr>
										@endforeach
									</table>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
	
				</div>
			</div>
		</div>
	</div>
	
@endsection