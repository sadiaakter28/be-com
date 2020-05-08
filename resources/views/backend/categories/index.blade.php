@extends('backend.layouts.master')
@section('title')
    Category | Be-Com
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Category</h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="page-header-toolbar">
                    <div class="sort-wrapper">
                        <a class="btn btn-success" href="{{route('admin.categories.create')}}">Add New Category</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Title Header Ends-->
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--                <h4 class="card-title">Hoverable Table</h4>--}}
                    {{--                <p class="card-description"> Add class </p>--}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Parent Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$category)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td>
                                    <img src="{{$category->image}}" alt="" width="50px">
                                </td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    @if($category->parent_id ==NULL)
                                        Primary Category
                                    @else{{$category->parent->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($category->status==1)
                                        <em class="badge badge-primary">Active</em>
                                    @else
                                        <em class="badge badge-danger">Inactive</em>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.categories.edit',$category->id)}}"
                                       class="btn btn-success">Edit</a>

                                    <a href="#deleteModal{{$category->id}}" data-toggle="modal"
                                       class="btn btn-danger">Delete</a>

                                <!-- Modal HTML -->
                                    <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                        Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('admin.categories.delete', $category->id)}}"
                                                      method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Model End--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
