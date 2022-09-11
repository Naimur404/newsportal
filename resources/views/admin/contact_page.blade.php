@extends('admin.app')
@section('title','Contact Page Content')
@section('pages','active')
@section('contact','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Contact Page Content</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_contact_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update contact Page Content</h3>






                            <div class="form-group mb-3">
                                <label>Contact Page Title *</label>
                                <div>
                                    <input type="text" name="contact_title" class="form-control" value="{{ $data->contact_title }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Contact Detail *</label>

                                <textarea name="contact_detail"  cols="30" rows="10" class="form-control snote">{{ $data->contact_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Contact Map Iframe Code</label>
                                <textarea name="contact_map"  cols="30" rows="10" class="form-control" style="height: 120px;">{{ $data->contact_map }}</textarea>


                            </div>
                            <div class="form-group mb-3">
                                <label>Contact Page ?</label>
                               <select class="form-control" name="contact_status">

                                <option value="1" @if($data->contact_status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->contact_status =='0') selected

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
