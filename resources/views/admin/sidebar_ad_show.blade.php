@extends('admin.app')
@section('title','Show Sidebar Advertisement')
@section('advertisement','active')
@section('sidebar_advertisement','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('sidebar_ad_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Photo</th>
                                    <th>URL</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sidebar_ad_data as $data)


                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td> <img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt="" style="width: 80px"></td>
                                    <td>{{ $data->sidebar_ad_url }}</td>
                                    <td>{{ $data->sidebar_ad_location }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('sidebar_ad_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('sidebar_ad_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
