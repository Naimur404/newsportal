@extends('font.layout.app')
@section('title','Photo Gallery')
@section('content')
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Photo Gallery</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="photo-gallery">
                    <div class="row">
                        @foreach ($photo as $data)


                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="photo-thumb">
                                <img src="{{ asset('font_asset/uploads/'.$data->photo) }}"  alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="{{ asset('font_asset/uploads/'.$data->photo) }}" class="magnific"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo-caption">
                                <a href="">{{ $data->caption }}</a>
                            </div>
                            <div class="photo-date">
                                <i class="fas fa-calendar-alt"></i>  @php
                                $ts =  strtotime($data->created_at);
                                $final_date = date('d M, Y',$ts);
                                @endphp
                                 {{ $final_date }}
                            </div>
                        </div>
                        @endforeach








                        <div class="col-md-12">
                            {{ $photo->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
