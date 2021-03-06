@extends('backend.layouts.master')
@section('title')
    Brand | Be-Com
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Brand</h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="page-header-toolbar">
                    <div class="sort-wrapper">
                        <a class="btn btn-success" href="{{route('admin.brands.create')}}">Add New Brand</a>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $key=>$brand)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td>
                                    <img src="{{$brand->image}}" alt="" width="50px">
                                </td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td>
                                    @if($brand->status==1)
                                        <em class="badge badge-primary">Active</em>
                                    @else
                                        <em class="badge badge-danger">Inactive</em>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.brands.edit',$brand->id)}}"
                                       class="btn btn-success">Edit</a>

                                    <a href="#deleteModal{{$brand->id}}" data-toggle="modal"
                                       class="btn btn-danger">Delete</a>
                                {{--                                    <a href="#deleteModal{{$brand->id}}" data-toggle="modal"--}}
                                {{--                                       class="btn btn-danger">Delete</a>--}}
                                {{--Model Start--}}
                                {{--<a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>--}}
                                {{--</div>--}}

                                <!-- Modal HTML -->
                                    <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1"
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
                                                <form action="{{route('admin.brands.delete', $brand->id)}}"
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
