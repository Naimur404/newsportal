@extends('admin.app')
@section('title','Add Category')
@section('news','active')
@section('sub_category','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Category</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('sub_category_store') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Ad Category</h3>






                            <div class="form-group mb-3">
                                <label>Sub Category Name *</label>
                                <div>
                                    <input type="text" name="sub_category_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Sub Category Order *</label>
                                <input type="text" class="form-control" name="sub_category_order" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Category Name</label>
                               <select class="form-control" name="category_id">
                                <option value="">Select</option>
                                   @foreach ($category as $data)


                                <option value="{{ $data->id }}">{{ $data->category_name }}</option>

                                    @endforeach
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu ?</label>
                               <select class="form-control" name="show_on_menu">

                                <option value="show">Show</option>
                                    <option value="hide">Hide</option>
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
