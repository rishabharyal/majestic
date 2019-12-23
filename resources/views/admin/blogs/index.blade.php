
@extends('admin.layouts.app')
@section('css')
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
<style>
    #form-container {
  width: 500px;
}

.row {
  margin-top: 15px;
}
.row.form-group {
  padding-left: 15px;
  padding-right: 15px;
}
.btn {
  margin-left: 15px;
}

.change-link {
  background-color: #000;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
  bottom: 0;
  color: #fff;
  opacity: 0.8;
  padding: 4px;
  position: absolute;
  text-align: center;
  width: 150px;
}
.change-link:hover {
  color: #fff;
  text-decoration: none;
}

img {
  width: 150px;
}

#editor-container {
  height: 130px;
}
  </style>
  
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Add a New Blog</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                <form action="{{action('Admin\BlogController@store')}}" enctype="multipart/form-data" method="POST">     
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                        <input name="description" id="description" type="hidden">
                                        <div id="editor-container">
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
                                    <button class="btn btn-primary">Add Blog</button>
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
                    <h5>Available Blogs</h5>
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
                            <th>Description</th>
                            <th>Frontend Visibility</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $key=>$blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ substr($blog->description ,0,40)}}...</td>
                                    <td>{{ $blog->frontend_visibility?'Yes':'No' }}</td>
                                    <th>
                                        <form action="{{ action('Admin\BlogController@destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a title="Edit This User" href="{{ action('Admin\BlogController@edit', $blog->id) }}" class="btn btn-info">
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> --}}
    <script>
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                ['bold', 'italic'],
                ['link', 'blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }]
                ]
            },
            placeholder: 'Write the blog description..',
            theme: 'snow'
        });
        let targetInput= $("#description");
        let targetDiv= document.getElementById("editor-container");
        quill.on('text-change',()=>{
            targetInput.val(targetDiv.children[0].innerHTML);
        })
    </script>
@endsection