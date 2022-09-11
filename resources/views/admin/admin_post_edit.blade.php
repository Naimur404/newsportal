@extends('admin.app')
@section('title','Edit Post')
@section('news','active')
@section('post','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Post</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_post_update',$post_data->id) }}" method="post" enctype="multipart/form-data">
                             @csrf
                            <div class="form-group mb-3">
                                <label>Post Title *</label>
                                <input type="text" class="form-control" name="post_title" value="{{ $post_data->post_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('font_asset/uploads/'.$post_data->post_photo) }}" alt="" style="width: 20%">
                            </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Photo *</label>
                                <div>
                                    <input type="file" name="post_photo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Short Desc *</label>
                                <textarea name="short_desc" class="form-control" cols="30" rows="10">{{ $post_data->short_desc }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Desc *</label>
                                <textarea name="post_desc" class="form-control snote" cols="30" rows="10">{{ $post_data->post_desc }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Category *</label>
                               <select class="form-control select2" name="sub_category_id">
                                         @foreach ($sub_category as $data)

                                         <option value="{{ $data->id }}" @if ($post_data->sub_category_id == $data->id) selected

                                         @endif>{{ $data->sub_category_name }} ({{ $data->rCategory->category_name }})</option>

                                         @endforeach


                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Share ?</label>
                               <select class="form-control" name="is_share">

                                <option value="1" @if ($post_data->is_share == '1') selected

                                @endif>Yes</option>
                                    <option value="0" @if ($post_data->is_share == '0') selected

                                        @endif>No</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is comment ?</label>
                               <select class="form-control" name="is_comment">

                                <option value="1" @if ($post_data->is_comment == '1') selected

                                    @endif>Yes</option>
                                    <option value="0" @if ($post_data->is_share == '0') selected

                                        @endif>No</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Home Category ?</label>
                               <select class="form-control" name="is_home">

                                <option value="1" @if ($post_data->is_home =='1') selected

                                @endif>Show</option>
                                    <option value="0"@if ($post_data->is_home =='0') selected

                                        @endif>Hide</option>
                               </select>
                            </div>

                            @if(!empty($tags))
                            <div class="form-group mb-3">
                                <label>Existing Tags </label>
                                <table class="table table-bordered">

                                     @foreach ($tags as $data)
                                     <tr>
                                       <td>{{ $data->tag_name }}</td>
                                       <td>
                                        <a href="{{ route('admin_post_tag_delete',[$data->id,$post_data->id]) }} " class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                       </td>
                                       </tr>
                                     @endforeach

                                       </table>
                            </div>
                            @endif
                            <div class="form-group mb-3">
                                <label>Tags *</label>
                                <input type="text" class="form-control" name="tags" value="">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</section>
@endsection
