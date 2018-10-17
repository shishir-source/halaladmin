@extends('layouts.app') 

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>Create Post</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Posts</a>
            </li>
            <li class="active">Create Post</li>
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
                            Create Post
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding: 40px;">
               
               
                                <form class="form-horizontal" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <fieldset>

                                    <div class="form-group">
                                        <label for="names">Name</label>
                                        <input type="text" name="names" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Class</label>
                                        <input type="text" name="class" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="rulling">Select a Ruling</label>
                                        <select name="rulling" id="rulling" class="form-control">

                                            <option value="0"
                                            >Haram</option>
                                            <option value="1"
                                            >Halal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Select a Category</label>
                                        <select name="category_id" id="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured">Post Image</label></br>
                                        <label class="text-danger">Recommended Size 920x920px</label>
                                        <input type="file" name="featured" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="reason">Reason</label>
                                        <textarea name="reason" id="reason" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="contents">Description</label>
                                        <textarea name="contents" id="contents" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit" name="submit">
                                                Store Post
                                            </button>
                                        </div>
                                    </div>
                                    </fieldset>
                                </form>
                            
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
<script src="{{ asset('summernote/dist/summernote.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#content').summernote();
    });
</script>
@stop
