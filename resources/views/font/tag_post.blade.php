@extends('font.layout.app')
@section('title',$tag_name.'Tag Post' )
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h2>All Post Of:  {{ $tag_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tag</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Post Of:  {{ $tag_name }}</li>
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

                        @foreach ($all_post as $data)
                         @if(!in_array($data->id,$all_post_id))
                            @continue
                           @endif


                        <div class="col-lg-6 col-md-12 col-6">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <img src="{{ asset('font_asset/uploads/'.$data->post_photo)}}" alt="">
                                </div>
                                <div class="category">
                                    @php
                                        $sub_cat = \App\Models\SubCategory::where('id',$data->sub_category_id)->first();
                                    @endphp
                                    <a href="{{ route('sub_cat',$sub_cat->id) }}"><span class="badge bg-success">{{ $sub_cat->sub_category_name }}</span></a>
                                </div>
                                <h3><a href="{{ route('post_detail',$data->id) }}">{{ $data->post_title }}</h3>
                                <div class="date-user">
                                    <div class="user">
                                        @if($data->author_id == 0)
                                        <a href="">{{ App\Models\Admin::where('id',$data->admin_id)->first()->name }}</a>
                                        @else
                                        <a href="">{{ App\Models\Author::where('id',$data->author_id)->first()->name }}</a>
                                        @endif
                                    </div>
                                    <div class="date">
                                        <a href="">@php
                                            $ts =  strtotime($data->created_at);
                                            $final_date = date('d M, Y',$ts);
                                            @endphp
                                             {{ $final_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach








                        {{-- <div class="col-md-12">
                         {{ $all_post->links() }}
                        </div> --}}

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
