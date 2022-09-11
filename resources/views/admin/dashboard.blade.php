@extends('admin.app')
@section('title','Admin Dashboard')
@section('dashboard','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total News Categories</h4>
                 </div>
                    <div class="card-body">
                        {{ $category }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total SubCategory</h4>
                    </div>
                    <div class="card-body">
                        {{ $sub_cat }}
                    </div>
                </div>
            </div>
        </div>
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

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-image"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Photos</h4>
                    </div>
                    <div class="card-body">
                       {{ $photo }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-video""></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Videos</h4>
                    </div>
                    <div class="card-body">
                       {{ $video }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total FAQS</h4>
                    </div>
                    <div class="card-body">
                       {{ $faq }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                    <i class="fas fa-poll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Online Polls</h4>
                    </div>
                    <div class="card-body">
                       {{ $poll }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-light">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Subscriber</h4>
                    </div>
                    <div class="card-body">
                       {{ $subs }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
