@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>Edit Post</h1>
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
            <li class="active">Update {{ $post->name }}</li>
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
                            Update {{ $post->name }}
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding: 40px;">
                            <fieldset>
                                <form class="form-horizontal" action="{{ route('post.update',['id'=> $post->id]) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $post->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Class</label>
                                        <input type="text" name="class" class="form-control" value="{{ $post->class }}">
                                    </div>
                                <!--                 <div class="form-group">
                    <label for="ruling">Rulling</label>
                    @if($post->rulling == 0 )
                                    <input type="text" name="rulling" class="form-control" value="Haram">
@else
                                    <input type="text" name="rulling" class="form-control" value="Halal">
@endif
                                        </div> -->
                                    <div class="form-group">
                                        <label for="category">Select a Ruling</label>
                                        <select name="rulling" id="rulling" class="form-control">
                                            <option value="0"
                                                    @if( $post->rulling == 0 )
                                                    selected
                                                    @endif
                                            >Haram</option>
                                            <option value="1"
                                                    @if( $post->rulling == 1 )
                                                    selected
                                                    @endif
                                            >Halal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Select a Category</label>
                                        <select name="category_id" id="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        @if($post->category->id == $category->id)
                                                        selected
                                                        @endif

                                                >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured">Post Image</label>
                                        
                                        <input type="file" name="featured" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="reason">Reason</label>
                                        <textarea name="reason" id="reason" cols="5" rows="5" class="form-control">{{ $post->reason }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                        <textarea name="contents" id="contents" cols="5" rows="5" class="form-control">{{ $post->contents }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-success" type="submit">
                                                Store Post
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="{{ asset('summernote/dist/summernote.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#content').summernote();
        });
    </script>
@stop

