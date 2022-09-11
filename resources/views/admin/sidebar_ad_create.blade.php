@extends('admin.app')
@section('title','Create Sidebar Advertisement')
@section('advertisement','active')
@section('sidebar_advertisement','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Sidebar Advertisement</h1>
        <div class="ml-auto">
            <a href="{{ route('sidebar_ad_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('sidebar_ad_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Sidebar Ad</h3>






                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="sidebar_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="sidebar_ad_url" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                               <select class="form-control" name="sidebar_ad_location">

                                <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                               </select>
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
