@extends('admin.app')
@section('title','Login Page Content')
@section('pages','active')
@section('login','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Login Page Content</h1>

    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_login_update',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update Login Page</h3>






                            <div class="form-group mb-3">
                                <label>Login Page Title *</label>
                                <div>
                                    <input type="text" name="login_title" class="form-control" value="{{ $data->about_title }}">
                                </div>
                            </div>




                            <div class="form-group mb-3">
                                <label>Login Page ?</label>
                               <select class="form-control" name="login_status">

                                <option value="1" @if($data->login_status =='1') selected @endif>Show</option>
                                    <option value="0" @if ($data->login_status =='0') selected

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
