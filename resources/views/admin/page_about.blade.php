@extends('admin.app')
@section('title','About Page Content')
@section('pages','active')
@section('about','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update About Page Content</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_about_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update About Page</h3>






                            <div class="form-group mb-3">
                                <label>About Name *</label>
                                <div>
                                    <input type="text" name="about_title" class="form-control" value="{{ $data->about_title }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>About Detail *</label>

                                <textarea name="about_detail" id="" cols="30" rows="10" class="form-control snote">{{ $data->about_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu?</label>
                               <select class="form-control" name="about_status">

                                <option value="1" @if($data->about_status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->about_status =='0') selected

                                    @endif>Hide</option>
                               </select>
                            </div>



                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>


        </div>


    </div>
</section>
@endsection
