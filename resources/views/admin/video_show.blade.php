@extends('admin.app')
@section('title','Video Gallery')
@section('gallery','active')
@section('video','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_video_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Video</th>
                                    <th>Caption</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> <iframe width="300" height="150" src="https://www.youtube.com/embed/{{ $data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                    <td>{{ $data->caption }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_video_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('admin_video_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
