@extends('admin.app')
@section('title','Create Online Poll')

@section('poll','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Online Poll</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_online_poll_store') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Create Online Poll</h3>






                            <div class="form-group mb-3">
                                <label>Category Name *</label>
                                <div>
                                    <textarea name="poll" id="" cols="30" rows="10" class="form-control snote"></textarea>
                                </div>
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
