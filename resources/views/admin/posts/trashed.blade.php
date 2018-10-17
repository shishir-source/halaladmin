@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>All Trashed Posts Table</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Posts</a>
            </li>
            <li class="active">Trashed Posts</li>
        </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success filterable" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> All Posts
                    </h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image </th>
                            <th>Name</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts->count() > 0)
                            <?php $i=0; ?>
                            @foreach($posts as $post)
                                <tr>
                                    <td style=" width: 4%"><?php echo  $i ;?></td>
                                    <td style=" width: 5%"><img src="{{ $post->featured }}" alt="{{ $post->name }}" height="50px" width="90px"></td>
                                    <td>{{ $post->name }}</td>
                                    <td style="width: 220px">
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('post.restore',['id'=> $post->id]) }}" class="btn btn-info">
                                                Restore</a>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('post.kill',['id'=> $post->id]) }}" class="btn  btn-danger">
                                                Delete</a>
                                        </div>

                                    </td>

                                </tr>
                                <?php $i++; ?>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Trashed Post </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop