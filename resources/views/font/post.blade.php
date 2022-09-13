@extends('font.layout.app')
@section('title',$post->post_title)
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post->post_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cat_post',$post->mCategory->id)}}">{{ $post->mCategory->category_name }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sub_cat',$post->subCategory->id) }}">{{ $post->subCategory->sub_category_name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->post_title  }}</li>
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
                <div class="featured-photo mt-2">
                    <img src="{{ asset('font_asset/uploads/'.$post->post_photo) }}" style="height: 15%;" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        @if($post->author_id == 0)
                                        <a href="">{{ App\Models\Admin::where('id',$post->admin_id)->first()->name }}</a>
                                        @else
                                        <a href="">{{ App\Models\Author::where('id',$post->author_id)->first()->name }}</a>
                                        @endif
                    </div>
                    <div class="item">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('sub_cat',$post->subCategory->id) }}">{{ $post->subCategory->sub_category_name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                        $ts =  strtotime($post->created_at);
                        $final_date = date('d F, Y',$ts);
                        @endphp
                         {{ $final_date }}
                    </div>
                    <div class="item">
                        <b><i class="fas fa-eye"></i></b>
                        {{ $post->visitors }}
                    </div>
                </div>
                <div class="main-text">
                 {!! $post->post_desc !!}
                </div>
                <div class="tag-section">
                    <h2>Tags</h2>
                    <div class="tag-section-content">
                        @foreach ($tags as $data)
                        <a href="{{ route('tag_post',$data->tag_name) }}"><span class="badge bg-success">{{ $data->tag_name }}</span></a>
                        @endforeach


                    </div>
                </div>
                @if ($post->is_share == 1)
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
                @endif
                @if ($post->is_comment == 1)
                  {!! $global_setting->disqus !!}

                @endif

                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>Related Post</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">
                        @if (count($related_post) > 2 )


                        @foreach ($related_post as $data)
                           @if ($data->id == $post->id)
                           @continue

                           @endif

                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('font_asset/uploads/'.$data->post_photo) }}" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">{{ $data->subCategory->sub_category_name }}</span>
                            </div>
                            <h3><a href="javascript:void;">{{ $data->post_title }}</a></h3>
                            <div class="date-user">
                                <div class="user">
                                    @if($data->author_id == 0)
                                        <a href="javascript:void;">{{ App\Models\Admin::where('id',$data->admin_id)->first()->name }}</a>
                                        @else
                                        <a href="javascript:void;">{{ App\Models\Author::where('id',$data->author_id)->first()->name }}</a>
                                        @endif
                                </div>
                                <div class="date">
                                    <a href="javascript:void;"> @php
                                        $ts =  strtotime($post->created_at);
                                        $final_date = date('d F, Y',$ts);
                                        @endphp
                                         {{ $final_date }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span class="text-danger mt-5" style="font-size: 40px;">No Post Found</span>
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
           @include('font.layout.sidebar')
            </div>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-631f867f7169d122"></script>

@endsection
