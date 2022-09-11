@extends('admin.app')
@section('title','Add Category')
@section('news','active')
@section('category','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Category</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('category_store') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Ad Category</h3>






                            <div class="form-group mb-3">
                                <label>Category Name *</label>
                                <div>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Category Order *</label>
                                <input type="text" class="form-control" name="category_order" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu ?</label>
                               <select class="form-control" name="show_on_menu">

                                <option value="show">Show</option>
                                    <option value="hide">Hide</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Home Category ?</label>
                               <select class="form-control" name="is_home">

                                <option value="1">Show</option>
                                    <option value="0">Hide</option>
                               </select>
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
