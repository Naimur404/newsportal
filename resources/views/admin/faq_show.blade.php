@extends('admin.app')
@section('title','Manage Faq Content')

@section('faq_content','active')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_faq_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
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
                                    <th>Detail</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $data->faq_title }}</td>
                                    <td>{!! $data->faq_detail !!}</td>

                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_faq_edit',$data->id) }}" class="btn btn-primary" >Edit</a>
                                        <a href="{{ route('admin_faq_delete',$data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
