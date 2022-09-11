@extends('admin.app')
@section('title','Privacy Page Content')
@section('pages','active')
@section('privacy','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Privacy Page</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_privacy_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Privacy Page</h3>






                            <div class="form-group mb-3">
                                <label>Privacy Page Title *</label>
                                <div>
                                    <input type="text" name="privacy_title" class="form-control" value="{{ $data->privacy_title }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Privacy Detail *</label>

                                <textarea name="privacy_detail" id="" cols="30" rows="10" class="form-control snote">{{ $data->privacy_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Privacy Page ?</label>
                               <select class="form-control" name="privacy_status">

                                <option value="1" @if($data->privacy_status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->privacy_status =='0')
                                        selected
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
