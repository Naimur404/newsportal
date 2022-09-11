@extends('font.layout.app')
@section('title',$data->disclaim_title)
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $data->privacy_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="route('home')">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $data->disclaim_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">

           {!! $data->disclaim_detail !!}
        </div>
    </div>
</div>
@endsection
