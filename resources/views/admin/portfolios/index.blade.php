@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>Add a New Portfolio</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: none;">
                <form action="{{ action('Admin\PortfolioController@store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" id="designation" placeholder=""
                                    class="form-control">
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
                                <label>Images</label>
                                <div class="custom-file">
                                    <input id="images" type="file" name="image" class="custom-file-input"
                                        accept="image/x-png,image/gif,image/jpeg">
                                    <label for="images" class="custom-file-label">Choose Images</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 text-left">
                            <div class="form-group">
                                <button class="btn btn-primary">Add Portfolio</button>
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
                <h5>All Portfolios</h5>
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $key=>$portfolio)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $portfolio->name }}</td>
                            <td>{{ $portfolio->designation }}</td>
                            <td>{{ $portfolio->description }}</td>
                            <td>
                                @if($portfolio->hasMedia('default'))
                                <a href="{{ $portfolio->firstMedia('default')->getUrl()}}" target="_new"><img
                                        src="{{ $portfolio->firstMedia('default')->getUrl()}}"
                                        alt="{{ $portfolio->value }}" style="width:40px;height:auto;"></a>
                                @endif
                            </td>
                            <th>
                                <form action="{{ action('Admin\PortfolioController@destroy', $portfolio->id) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a title="Edit This Portfolio"
                                        href="{{ action('Admin\PortfolioController@edit', $portfolio->id) }}"
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
<script>
    $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
}); 
</script>
@endsection