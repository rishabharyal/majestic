@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>Add a New City</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <form action="{{ action('Admin\CityController@store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 text-left">
                            <div class="form-group">
                                <button class="btn btn-primary">Add City</button>
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
                <h5>All Cities</h5>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $key=>$city)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $city->city }}</td>
                            <th>
                                <form action="{{ action('Admin\CityController@destroy', $city->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a title="Edit This City"
                                        href="{{ action('Admin\CityController@edit', $city->id) }}"
                                        class="btn btn-info">
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