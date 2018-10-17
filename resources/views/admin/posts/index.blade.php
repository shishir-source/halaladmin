@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>All Posts Table</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Posts</a>
            </li>
            <li class="active">All Posts</li>
        </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success filterable" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> All Posts
                        <a href="{{ route('post.create') }}" class="btn btn-danger pull-right" style="margin-top:-7px;">Add New</a>
                    </h3>
                    
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image </th>
                            <th>Name</th>
                            <th>Ruling</th>
                            <th>Category</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts->count() > 0)
                            <?php $i=1; ?>
                            @foreach($posts as $post)
                        <tr>
                            <td style=" width: 4%"><?php echo  $i ;?></td>
                            <td style=" width: 5%"><img src="{{ $post->featured }}" alt="{{ $post->name }}" height="50px" width="50px"></td>
                            <td>{{ $post->name }}</td>
                            <td style=" width: 10%">@if( $post->rulling == 0 )Haram
                                @elseif( $post->rulling == 1 ) Halal
                                @endif
                            </td>
                            <td style=" width: 10%">@foreach($categories as $category)
                                    @if($post->category->id == $category->id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td style="width: 220px">
                                <div class="col-lg-6 col-xs-12">
                                    <a href="{{ route('post.edit',['id'=> $post->id]) }}" class="btn btn-info">
                                        Edit</a>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <a href="{{ route('post.delete',['id'=> $post->id]) }}" class="btn  btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');" >
                                        Delete</a>
                                </div>

                            </td>

                        </tr>
                        <?php $i++; ?>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No published Post </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop