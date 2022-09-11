@extends('admin.app')
@section('title','Disclaimer Page Content')
@section('pages','active')
@section('dis','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Disclaimer Page Content</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_disclaim_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update Disclaimer Page Content</h3>






                            <div class="form-group mb-3">
                                <label>Disclaimer Page Title *</label>
                                <div>
                                    <input type="text" name="disclaim_title" class="form-control" value="{{ $data->disclaim_title }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Disclaimer Detail *</label>

                                <textarea name="disclaim_detail" id="" cols="30" rows="10" class="form-control snote">{{ $data->disclaim_detail }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Disclaimer Page ?</label>
                               <select class="form-control" name="disclaim_status">

                                <option value="1" @if($data->disclaim__status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->disclaim_status =='0') selected

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
