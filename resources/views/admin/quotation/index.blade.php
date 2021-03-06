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
                                    <option {{ $request->get('type') == 'EOL' ? 'selected' : '' }} value="EOL">EOL</option>
                                    <option {{ $request->get('type') == 'Regular' ? 'selected' : '' }} value="Regular">Regular Cleaning</option>
                                </select>
                            </div>
                        </div>
						@foreach ($identities as $index=>$identity)
							<div class="col-md-1 col-sm-12">
	                            <div class="form-group">
									<label for="{{$identity->id}}">{{$identity->title}}</label>
									<input type="number" min="0" value="{{ $request->search[$index] ?? (($index == 2 || $index ==3) ? 1 : 0) }}" name="search[{{$index}}]" id="{{$identity->title}}" class="form-control">
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
					@if($cleanings->count())
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
											@foreach($cleaning->prices as $price)
												@if($price->quantity)
													<tr>
														<td>{{ $price->identity->title }}</td>
														<td>{{ $price->quantity }}</td>
													</tr>
												@endif
											@endforeach
										</table>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-danger">
							No search results found for the given combination.
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	
@endsection