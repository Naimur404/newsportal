@extends('admin.app')
@section('title','FAQ Page Content')
@section('pages','active')
@section('faq','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update FAQ Page Content</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_faq_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update FAQ Page</h3>






                            <div class="form-group mb-3">
                                <label>FAQ Title *</label>
                                <div>
                                    <input type="text" name="faq_title" class="form-control" value="{{ $data->faq_title }}">
                                </div>
                            </div>




                            <div class="form-group mb-3">
                                <label>Faq Detail *</label>

                                <textarea name="faq_detail" id="" cols="30" rows="10" class="form-control snote">{{ $data->faq_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Faq Page ?</label>
                               <select class="form-control" name="faq_status">

                                <option value="1" @if($data->faq_status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->faq_status =='0') Selected

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
