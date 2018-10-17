@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>All Trashed Categories Table</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Categories</a>
            </li>
            <li class="active">Trashed Categories</li>
        </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success filterable" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> All Categories
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
                        @if($categories->count() > 0)
                            <?php $i=0; ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td><?php echo  $i ;?></td>
                                    <td><img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="60px" width="115px"></td>
                                    <td>{{ $category->name }}</td>
                                    <td style="width: 220px">
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('category.restore',['id'=> $category->id]) }}" class="btn btn-info">
                                                Restore</a>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('category.kill',['id'=> $category->id]) }}" class="btn  btn-danger">
                                                Delete</a>
                                        </div>

                                    </td>

                                </tr>
                                <?php $i++; ?>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Trashed Category </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop