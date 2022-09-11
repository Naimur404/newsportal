@extends('font.layout.app')
@section('title','Video Gallery')
@section('content')
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Video Gallery</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="video-gallery">
                    <div class="row">
                        @foreach ($video as $data)


                        <div class="col-lg-3 col-md-4 col-6">
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
                                <i class="fas fa-calendar-alt"></i> @php
                                $ts =  strtotime($data->created_at);
                                $final_date = date('M d, Y',$ts);
                                @endphp
                                 {{ $final_date }}
                            </div>
                        </div>
                        @endforeach





                        <div class="col-md-12">
                          {{ $video->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
