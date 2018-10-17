@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>Edit Pages</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Page</a>
            </li>
            <li class="active">{{ $name }} page</li>
        </ol>
    </section>
    <!--section ends-->

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
    
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <!--row starts-->
            <div class="col-md-8 col-md-offset-2">
                <!--lg-6 starts-->
                <!--basic form starts-->
                <div class="panel panel-primary" id="hidepanel1">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit {{ $name }} page
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding: 40px;">
                            <fieldset>
                                @if($name == "about")
                                <form class="form-horizontal" action="{{ Route('about.update') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="about" value="about">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $about[0]->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="header">Header</label>
                                        <input type="text" name="header" class="form-control" value="{{ $about[0]->header }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subheader">Sub Header</label>
                                        <input type="text" name="subheader" class="form-control" value="{{ $about[0]->subheader }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Add Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea name="body" class="form-control">{{ $about[0]->body }}</textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                                @elseif($name == "source")
                                <form class="form-horizontal" action="{{ Route('source.update') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="source" value="source">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $source[0]->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="header">Header</label>
                                        <input type="text" name="header" class="form-control" value="{{ $source[0]->header }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subheader">Sub Header</label>
                                        <input type="text" name="subheader" class="form-control" value="{{ $source[0]->subheader }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Add Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea name="body" class="form-control">{{ $source[0]->body }}</textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                @elseif($name == "feature")
                                <form class="form-horizontal" action="{{ Route('feature.update') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="feature" value="feature">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $feature[0]->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="header">Header</label>
                                        <input type="text" name="header" class="form-control" value="{{ $feature[0]->header }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subheader">Sub Header</label>
                                        <input type="text" name="subheader" class="form-control" value="{{ $feature[0]->subheader }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Add Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea name="body" class="form-control">{{ $feature[0]->body }}</textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                @endif

                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('styles')
    <link href="{{ asset('summernote/dist/summernote.css') }}" rel="stylesheet">
@stop

@section('scripts')
    <script src="{{ asset('public') }}/vendors/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="{{ asset('public') }}/vendors/ckeditor/js/ckeditor.js" type="text/javascript"></script>
    <script src="{{ asset('public') }}/vendors/ckeditor/js/jquery.js" type="text/javascript"></script>
    <script src="{{ asset('public') }}/vendors/ckeditor/js/config.js" type="text/javascript"></script>
    <script src="{{ asset('public') }}/js/pages/editor1.js" type="text/javascript"></script>
    <script src="{{ asset('summernote/dist/summernote.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#content').summernote();
        });
    </script>
@stop

