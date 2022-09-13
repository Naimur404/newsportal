@extends('font.layout.app')
@section('title',$cat->sub_category_name )
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Sub-Category:  {{ $cat->sub_category_name }} </h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $cat->sub_category_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">

                <div class="category-page">
                    <div class="row">
                        @if(count($cat_post))
                        @foreach ($cat_post as $data)





                        <div class="col-lg-6 col-md-12 col-6">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <img src="{{ asset('font_asset/uploads/'.$data->post_photo)}}" alt="">
                                </div>
                                <div class="category">
                                    <span class="badge bg-success">{{ $cat->sub_category_name }}</span>
                                </div>
                                <h3><a href="{{ route('post_detail',$data->slug) }}">{{ $data->post_title }}</a></h3>
                                <div class="date-user">
                                    <div class="user">
                                        @if($data->author_id == 0)
                                        <a href="javascript:void;">{{ App\Models\Admin::where('id',$data->admin_id)->first()->name }}</a>
                                        @else
                                        <a href="javascript:void;">{{ App\Models\Author::where('id',$data->author_id)->first()->name }}</a>
                                        @endif
                                    </div>
                                    <div class="date">
                                        <a href="javascript:void;">@php
                                            $ts =  strtotime($data->created_at);
                                            $final_date = date('d M, Y',$ts);
                                            @endphp
                                             {{ $final_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
@else
<span class="text-danger mt-5" style="font-size: 40px">No Post Found</span>
@endif







                        <div class="col-md-12">
                         {{ $cat_post->links() }}
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('font.layout.sidebar')
                 </div>
        </div>
    </div>
</div>
@endsection
