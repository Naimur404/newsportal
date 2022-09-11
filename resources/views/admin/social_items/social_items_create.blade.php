@extends('admin.app')
@section('title','Add Social Item')

@section('social','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Social Item</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_social_item_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_social_item_store') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Add Social Item</h3>






                            <div class="form-group mb-3">
                                <label>Social Icon Font Awsome Code *</label>
                                <div>
                                    <input name="code"  class="form-control"></input>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>URL *</label>
                                <div>
                                    <input name="url"  class="form-control"></input>
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
