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
                <form action="{{ action('Admin\ServiceController@store') }}" method="post"
                    enctype="multipart/form-data">
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
                                <input type="text" name="description" id="description" placeholder=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="" class="form-control">
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
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="custom-file">
                                    <input id="images" type="file" name="image" class="custom-file-input"
                                        accept="image/x-png,image/gif,image/jpeg">
                                    <label for="images" class="custom-file-label">Choose Image</label>
                                </div>
                            </div>
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
                            <th>Image</th>
                            <th>Postcodes</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $key=>$service)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $service->value }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->frontend_visibility?'Yes':'No' }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                @if($service->hasMedia('default'))
                                <a href="{{ $service->firstMedia('default')->getUrl()}}" target="_new"><img
                                        src="{{ $service->firstMedia('default')->getUrl()}}" alt="{{ $service->value }}"
                                        style="width:40px;height:auto;"></a>
                                @endif
                            </td>
                            <td>
                                @foreach ($service->postcodes as $postcode)
                                {{$postcode->postcode  }}
                                @endforeach
                            </td>
                            <td>{{ $service->slug }}</td>
                            <th>
                                <form action="{{ action('Admin\ServiceController@destroy', $service->id) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a title="Edit This key"
                                        href="{{ action('Admin\ServiceController@edit', $service->id) }}"
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
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    $("#value").keyup((e)=>{
        $("#slug").val($("#value").val().trim().replace(/ /g,"-"))
    })
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    }); 
</script>
@stop