@extends('admin.app')
@section('title','Update FAQ Section Content')
@section('faq_content','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update FAQ Section Content</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_faq_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_faq_updated',$data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update FAQ Section Content</h3>



                              <div class="form-group mb-3">
                                <label>FAQ Title</label>
                                <input type="text" class="form-control" name="faq_title" value="{{ $data->faq_title }}">
                            </div>




                            <div class="form-group mb-3">
                                <label>FAQ Detail</label>
                                <textarea name="faq_detail" id="" cols="30" rows="10" class="form-control snote">{{ $data->faq_detail }}</textarea>
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
