@extends('admin.app')
@section('title','Update Sub Category')
@section('news','active')
@section('category','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Category</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i>View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <form action="{{ route('sub_category_update',$sub_cat_data->id) }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-body">

                              <h3>Update Category</h3>






                              <div class="form-group mb-3">
                                <label>Sub Category Name *</label>
                                <div>
                                    <input type="text" name="sub_category_name" class="form-control" value="{{ $sub_cat_data->sub_category_name }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Sub Category Order *</label>
                                <input type="text" class="form-control" name="sub_category_order" value="{{ $sub_cat_data->sub_category_order }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Category Name</label>
                               <select class="form-control" name="category_id">

                                   @foreach ($category as $data)


                                <option value="{{ $data->id }}"@if ($sub_cat_data->category_id == $data->id) selected

                                    @endif>{{ $data->category_name }}</option>

                                    @endforeach
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Menu ?</label>
                               <select class="form-control" name="show_on_menu">

                                <option value="show" @if ($sub_cat_data->show_on_menu =='show') selected

                                @endif>Show</option>
                                    <option value="hide"@if ($sub_cat_data->show_on_menu =='hide') selected

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
