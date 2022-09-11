@extends('admin.app')
@section('title','Sent Mail To All')
@section('subscribers','active')
@section('email','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Send Email</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Send Email</h3>






                            <div class="form-group mb-3">
                                <label>SubJect *</label>
                                <div>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Message *</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control snote"></textarea>
                            </div>
                           


                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sent</button>
                </div>
            </form>
            </div>


        </div>


    </div>
</section>
@endsection
