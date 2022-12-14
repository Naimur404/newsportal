@extends('author.layout.author_app')
@section('title','Author Dashboard')
@section('dashboard','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Author Dashboard</h1>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Post</h4>
                    </div>
                    <div class="card-body">
                        {{ $post }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
