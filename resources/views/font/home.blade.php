@extends('font.layout.app')
@section('title','GhuriFiri')
@section('content')
@if($setting_data->news_ticker_status ==1)
<div class="news-ticker-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="acme-news-ticker">
                    <div class="acme-news-ticker-label">Latest Post</div>
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($all_post as $data)
                              @php
                                  $i++
                              @endphp
                              @if ($i > $setting_data->news_tricker_total)
                              @break

                              @endif

                            <li><a href="{{ route('post_detail',$data->slug) }}">{{ $data->post_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="home-main mt-2">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-8 col-md-12 left">
                @php
                    $i = 0;
                @endphp
                @foreach ($all_post as $data)
                @php
                    $i++
                @endphp
                 @if($i>1)
                 @break
                 @endif

                <div class="inner">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('font_asset/uploads/'.$data->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $data->subCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('post_detail',$data->slug) }}">{{ $data->post_title }}</a></h2>
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
                    </div>
                </div>

                @endforeach
            </div>
            <div class="col-lg-4 col-md-12">
                @php
                $i = 0;
            @endphp
            @foreach ($all_post as $data)
            @php
            $i++
        @endphp
            @if ($i==1)
            @continue

            @endif

             @if($i>3)
             @break
             @endif
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('font_asset/uploads/'.$data->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $data->subCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('post_detail',$data->slug) }}">{{ $data->post_title }}</a></h2>
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
                                            $ts =  strtotime($data->created_at);
                                            $final_date = date('d M, Y',$ts);
                                            @endphp
                                             {{ $final_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@if($home_ad_data->above_search_status == 1)
<div class="ad-section-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($home_ad_data->above_search_url == '')
                <img src="{{ asset('font_asset/uploads/'.$home_ad_data->above_search_ad) }}" alt="">
                @else
                <a href="{{ $home_ad_data->above_search_url }}"><img src="{{ asset('font_asset/uploads/'.$home_ad_data->above_search_ad) }}" alt=""></a>
                @endif

            </div>
        </div>
    </div>
</div>
@endif
<div class="search-section">
    <div class="container">
        <div class="inner">
            <form action="{{ route('search_result') }}" method="post">
                @csrf
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="text_search" class="form-control" placeholder="Title or Description">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="category" id="category" class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($category as $data)


                            <option value="{{$data->id}}">{{ $data->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="sub_category" id="sub_category" class="form-select">
                            <option value="">Select SubCategory</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </div>
        </form>
        </div>
    </div>
</div>

<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">
@foreach ($sub_category_data as $data)
  @if (count($data->aPost) == 0)
@continue
  @endif



                    <!-- News Of Category -->
                    <div class="news-total-item">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h2>{{ $data->category_name }}</h2>
                            </div>
                            <div class="col-lg-6 col-md-12 see-all">
                                <a href="{{ route('cat_post',$data->id) }}" class="btn btn-primary btn-sm">See All Post</a>
                            </div>
                            <div class="col-md-12">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="row">
                           @foreach ($data->aPost as $post)

                            @if($loop->iteration==2)

                            @break
                             @endif
                            <div class="col-lg-6 col-md-12">

                                <div class="left-side">
                                    <div class="photo ">
                                        <img src="{{ asset('font_asset/uploads/'.$post->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ App\Models\SubCategory::where('id',$post->sub_category_id)->first()->sub_category_name }}</span>
                                    </div>
                                    <h3><a href="{{ route('post_detail',$post->slug) }}">{{ $post->post_title }}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            <a href="javascript:void;">@if($post->author_id == 0)
                                                <a href="javascript:void;">{{ App\Models\Admin::where('id',$post->admin_id)->first()->name }}</a>
                                                @else
                                                <a href="javascript:void;">{{ App\Models\Author::where('id',$post->author_id)->first()->name }}</a>
                                                @endif</a>
                                        </div>
                                        <div class="date">
                                            <a href="javascript:void;"> @php
                                                $ts =  strtotime($post->created_at);
                                                $final_date = date('d M, Y',$ts);
                                                @endphp
                                                 {{ $final_date }}</a>
                                        </div>
                                    </div>
                                    <p class="truncate">
                                       {{ $post->short_desc }}
                                    </p>
                                </div>
                            </div>
                            @endforeach




                            <div class="col-lg-6 col-md-12">


                                <div class="right-side">

                            @foreach ($data->aPost as $post)

                            @if($loop->iteration==1)

                            @continue
                             @endif
                             @if($loop->iteration==6)

                             @break
                             @endif

                                    <div class="right-side-item">
                                        <div class="left mt-2">
                                            <img src="{{ asset('font_asset/uploads/'.$post->post_photo) }}" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="category">
                                                <span class="badge bg-success">{{ App\Models\SubCategory::where('id',$post->sub_category_id)->first()->sub_category_name }}</span>
                                            </div>
                                            <h2><a href="{{ route('post_detail',$post->slug) }}">{{ $post->post_title }}</a></h2>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="javascript:void;">@if($post->author_id == 0)
                                                        <a href="javascript:void;">{{ App\Models\Admin::where('id',$post->admin_id)->first()->name }}</a>
                                                        @else
                                                        <a href="javascript:void;">{{ App\Models\Author::where('id',$post->author_id)->first()->name }}</a>
                                                        @endif</a>
                                                </div>
                                                <div class="date">
                                                    <a href="javascript:void;">@php
                                                        $ts =  strtotime($post->created_at);
                                                        $final_date = date('d M, Y',$ts);
                                                        @endphp
                                                         {{ $final_date }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>

                    @endforeach
                    <!-- // News Of Category -->



                    <!-- News Of Category -->

                    <!-- // News Of Category -->







                    <!-- // News Of Category -->





                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
               @include('font.layout.sidebar')
            </div>
        </div>
    </div>
</div>

@if($setting_data->video_status == '1')
<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-heading">
                    <h2>Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="video-carousel owl-carousel">
                  @foreach ($video as $data)
                       @if($loop->iteration > $setting_data->video_total)
                       @break
                         @endif
                    <div class="item">
                        <div class="video-thumb">
                            <img src="http://img.youtube.com/vi/{{ $data->video_id }}/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="http://www.youtube.com/watch?v={{ $data->video_id }}" class="video-button"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="video-caption">
                            <a href="javascript:void;">{{ $data->caption }}</a>
                        </div>
                        <div class="video-date">
                            <i class="fas fa-calendar-alt"></i>  @php
                            $ts =  strtotime($data->created_at);
                            $final_date = date('M d, Y',$ts);
                            @endphp
                             {{ $final_date }}
                        </div>
                    </div>
                    @endforeach




                </div>

            </div>
        </div>
    </div>
</div>
@endif

@if($home_ad_data->above_footer_status == 1)
<div class="ad-section-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($home_ad_data->above_footer_url == '')
                <img src="{{ asset('font_asset/uploads/'.$home_ad_data->above_footer_ad) }}" alt="">
                @else
                <a href="{{ $home_ad_data->above_footer_url }}"><img src="{{ asset('font_asset/uploads/'.$home_ad_data->above_footer_ad) }}" alt=""></a>
                @endif

            </div>
        </div>
    </div>
</div>
@endif

<script>
(function($){

  $(document).ready(function(){
     $("#category").on("change",function(){
    var category_id =   $("#category").val();
    if(category_id){
        $.ajax({
            type: "get",
            url: "{{ url('/sub_category_by_category/') }}" + '/' + category_id,

            success: function (response) {
            $("#sub_category").html(response.sub_category_data);
            },
            error:function(err){

            }
        });
    }
     });
  });

})(jQuery);
</script>
@endsection
