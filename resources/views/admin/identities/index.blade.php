@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>Add a New Identity</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <form action="{{action('Admin\IdentityController@store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="" class="form-control">
                            </div>
                        </div>
                       
                        <div class="col-md-12 col-sm-12 text-left">
                            <div class="form-group">
                                <button class="btn btn-primary">Add Identity</button>
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
                <h5>Available Identities</h5>
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
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($identities as $key=>$identity)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $identity->title }}</td>
                            
                            <th>
                                <form action="{{ action('Admin\IdentityController@destroy',$identity->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a title="Edit This Identity"
                                        href="{{ action('Admin\IdentityController@edit',$identity->id) }}"
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