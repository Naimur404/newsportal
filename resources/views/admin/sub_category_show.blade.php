@extends('admin.app')
@section('title','Show Sub Category')
@section('news','active')
@section('sub_category','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_sub_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Sub Category Name</th>
                                    <th>Category Name</th>
                                    <th>Show On Menu</th>
                                    <th>Show On Home</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_category as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $data->sub_category_name }}</td>
                                    <td> {{ $data->rCategory->category_name }}</td>
                                    <td>{{ $data->show_on_menu }}</td>
                                    <td>@if($data->show_on_home == '1')
                                    Show
                                    @else
                                    Hide
                                    @endif
                                </td>
                                    <td>{{ $data->sub_category_order }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('sub_category_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('sub_category_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
