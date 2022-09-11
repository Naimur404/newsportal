@extends('admin.app')
@section('title','Author List')
@section('author','active')
@section('author_list','active')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_author_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $author)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($author->photo == NULL)
                                        <img src="{{ asset('admin_asset/uploads/default.png') }}" alt="" style="width: 80px">
                                          @else
                                          <img src="{{ asset('admin_asset/uploads/'.$author->photo) }}" alt="" style="width: 80px">
                                        @endif</td>
                                    <td> {{ $author->name }}</td>
                                    <td> {{ $author->email }}</td>


                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_author_edit',$author->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('admin_author_delete',$author->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
