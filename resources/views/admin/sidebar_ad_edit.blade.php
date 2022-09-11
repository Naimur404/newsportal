@extends('admin.app')
@section('title','Update Sidebar Advertisement')
@section('advertisement','active')
@section('sidebar_advertisement','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Sidebar Advertisement</h1>
      
    </div>
    <div class="section-body">


        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-12">
                <form action="{{ route('sidebar_ad_update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Sidebar Ad</h3>



                              <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$data->sidebar_ad) }}" alt="" style="width: 20%">
                            </div>
                            </div>



                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="sidebar_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="sidebar_ad_url" value="{{ $data->sidebar_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                               <select class="form-control" name="sidebar_ad_location">

                                <option value="Top" @if ($data->sidebar_ad_location =='Top') selected

                                @endif>Top</option>
                                    <option value="Bottom"@if ($data->sidebar_ad_location =='Bottom') selected

                                        @endif>Bottom</option>
                               </select>
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
