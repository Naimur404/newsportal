@extends('author.layout.author_app')
@section('title','Add Post')
@section('news','active')
@section('post','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Post</h1>
        <div class="ml-auto">
            <a href="{{ route('author_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </div>
    </div>
    <div class="section-body">

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('author_post_store') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            <div class="form-group mb-3">
                                <label>Post Title *</label>
                                <input type="text" class="form-control" name="post_title" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Post Photo *</label>
                                <div>
                                    <input type="file" name="post_photo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Short Desc *</label>
                                <textarea name="short_desc" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Desc *</label>
                                <textarea name="post_desc" class="form-control snote" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select Category *</label>
                               <select class="form-control" name="sub_category_id">
                                         @foreach ($sub_category as $data)
                                         <option value="{{ $data->id }}">{{ $data->sub_category_name }} ({{ $data->rCategory->category_name }})

                                        </option>
                                         @endforeach


                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Share ?</label>
                               <select class="form-control" name="is_share">

                                <option value="1">Yes</option>
                                    <option value="0">No</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is comment ?</label>
                               <select class="form-control" name="is_comment">

                                <option value="1">Yes</option>
                                    <option value="0">No</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show On Home Category ?</label>
                               <select class="form-control" name="is_home">

                                <option value="1">Show</option>
                                    <option value="0">Hide</option>
                               </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tags *</label>
                                <input type="text" class="form-control" name="tags" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Want to send this to subscriber ?</label>
                               <select class="form-control" name="subscriber_send_option">

                                <option value="1">Yes</option>
                                    <option value="0">No</option>
                               </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</section>
@endsection
