@extends('admin.app')
@section('title','Add Photo')
@section('photo','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Photo</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_photo_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Add Photo</h3>






                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Caption</label>
                                <input type="text" class="form-control" name="caption" value="">
                            </div>



                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>


        </div>


    </div>
</section>
@endsection
