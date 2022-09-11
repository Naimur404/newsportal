@extends('admin.app')
@section('title','Online Poll')
@section('poll','active')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_online_poll_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Questions</th>
                                    <th>Yes Vote</th>
                                    <th>No Vote</th>
                                    <th>No Comment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($online_poll_data as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {!! $data->poll !!}</td>
                                    <td>{{ $data->yes_vote }}</td>
                                    <td>{{ $data->no_vote }}</td>
                                    <td>{{ $data->no_comment_vote }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_online_poll_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('admin_online_poll_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
