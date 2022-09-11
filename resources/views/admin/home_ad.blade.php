@extends('admin.app')
@section('title','Home Advertisement')
@section('advertisement','active')
@section('home_advertisement','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Home Advertisement</h1>
        <div class="ml-auto">
            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>
        </div>
    </div>
    <div class="section-body">
        <form action="{{ route('home_ad_update') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                              <h3>Above Search Ad</h3>

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$data->above_search_ad) }}" alt="" style="width: 100%">
                            </div>
                            </div>




                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="above_search_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="above_search_url" value="{{ $data->above_search_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                               <select class="form-control" name="above_search_status">

                                <option value="1" @if ($data->above_search_status == 1) selected

                                    @endif>Show</option>
                                    <option value="0" @if ($data->above_search_status == 0) selected

                                        @endif>Hide</option>
                               </select>
                            </div>


                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">


                            <h3>Above Footer Ad</h3>

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$data->above_footer_ad) }}" alt="" style="width: 100%">
                            </div>
                            </div>


                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="above_footer_ad">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Text</label>
                                <input type="text" class="form-control" name="above_footer_url" value="{{ $data->above_footer_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                               <select class="form-control" name="above_footer_status">

                                <option value="1" @if ($data->above_footer_status == 1) selected

                                @endif>Show</option>
                                <option value="0" @if ($data->above_footer_status == 0) selected

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
