@extends('author.layout.author_app')
@section('title','Show Author Post')
@section('news','active')
@section('post','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('author_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th> SubCategory</th>
                                    <th>category</th>
                                    <th>Author Name</th>


                                    <th>Post Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td> {{ $data->post_title }}</td>
                                    <td><img src="{{ asset('font_asset/uploads/'.$data->post_photo) }}" alt="" style="width: 80px"></td>
                                    <td>{{ $data->subCategory->sub_category_name }}</td>
                                    <td>{{ $data->subCategory->rCategory->category_name }} </td>
                                    <td>@if ($data->author_id !=0)
                                        {{ Auth::guard('author')->user()->name }}
                                       @endif</td>
                                 
                                    <td>{{ $data->created_at }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('author_post_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('author_post_delete',$data->id) }}" class="btn btn-danger mt-1" onClick="return confirm('Are you sure?');">Delete</a>
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
