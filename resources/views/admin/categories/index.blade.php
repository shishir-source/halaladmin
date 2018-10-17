@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>All Categories Table</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#">Categories</a>
            </li>
            <li class="active">All Categories</li>
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
                    <table class="table table-striped table-bordered" id="table2" data-toggle="dataTable" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Editing</th>
                        </tr>
                        </thead>
                        <tbody>
                 
                        @if($categories->count() > 0)
                            <?php $i=1;?>
                             {{ csrf_field() }}
                            @foreach($categories as $category)
                                <tr>
                                    <td><?php echo  $i ;?></td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="60px" width="115px"></td>
                                    <td style="width: 220px">
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('category.edit',['id'=> $category->id]) }}" class="btn btn-info">
                                                Edit</a>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <a href="{{ route('category.delete',['id'=> $category->id]) }}" data-id="{{ $category->id }}" class="btn  btn-danger form-delete"  onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete</a>
                                        </div>

                                    </td>

                                </tr>
                                <?php $i++; ?>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No published Category </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary " id="delete-btn" >Delete
                <span class="hidden id"></span>
                
                </button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@stop