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
                        <a href="{{route('brands.create')}}">Add New Brand</a>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Jacob</td>
                        <td>Photoshop</td>
                        <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                        </td>
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i>
                        </td>
                        <td>
                            <label class="badge badge-warning">In progress</label>
                        </td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Premier</td>
                        <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i>
                        </td>
                        <td>
                            <label class="badge badge-info">Fixed</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Peter</td>
                        <td>After effects</td>
                        <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i>
                        </td>
                        <td>
                            <label class="badge badge-success">Completed</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i>
                        </td>
                        <td>
                            <label class="badge badge-warning">In progress</label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('js')

@endpush
