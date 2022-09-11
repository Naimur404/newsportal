@extends('admin.app')
@section('title','Top Advertisement')
@section('advertisement','active')
@section('top_advertisement','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Top Advertisement</h1>
        <div class="ml-auto">
            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>
        </div>
    </div>
    <div class="section-body">
        <form action="{{ route('top_ad_update') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                              <h3>Above Top Ad</h3>

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$data->top_ad) }}" alt="" style="width: 100%">
                            </div>
                            </div>




                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="top_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="top_ad_url" value="{{ $data->top_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                               <select class="form-control" name="top_ad_status">

                                <option value="1" @if ($data->top_ad_status == 1) selected

                                    @endif>Show</option>
                                    <option value="0" @if ($data->top_ad_status == 0) selected

                                        @endif>Hide</option>
                               </select>
                            </div>


                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
</section>
@endsection
