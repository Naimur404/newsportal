@extends('admin.app')
@section('title','Create Author')

@section('author','active')
@section('author_list','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Author</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_author_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('admin_author_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Create Author</h3>






                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <div>
                                    <input type="text" name="name"  class="form-control" value=""></input>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email *</label>
                                <div>
                                    <input type="email" name="email"  class="form-control" value=""></input>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Password *</label>
                                <div>
                                    <input type="password" name="password"  class="form-control"></input>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Retype Password *</label>
                                <div>
                                    <input type="password" name="retype_password"  class="form-control"></input>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="photo"  class="form-control"></input>
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
