@extends('admin.app')
@section('title','Update Photo')

@section('photo','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Photo</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">


        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-12">
                <form action="{{ route('admin_photo_update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update Photo</h3>



                              <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$data->photo) }}" alt="" style="width: 20%">
                            </div>
                            </div>



                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="caption" value="{{ $data->caption }}">
                            </div>



                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
            <div class="col-3">
            </div>

        </div>

    </div>
</section>
@endsection
