@extends('admin.app')
@section('title','Settings')

@section('setting','active')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Setting</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                            Logo & Fevicon
                                        </a>
                                        <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                            Home Setting
                                        </a>
                                        <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                            Top Bar
                                        </a>
                                        <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                            Theme
                                        </a>
                                        <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="false">
                                            Google Analtyic
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                            <!-- Photo Item Start -->
                                            <div class="form-group mb-3">
                                                <label>
                                                    Existing Logo
                                                </label>
                                                <div>
                                                    <img src="{{ asset('font_asset/uploads/'.$data->logo) }}" alt="" class="w_200">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>
                                                    Change Favicon
                                                </label>
                                                <div>
                                                    <input type="file" name="logo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>
                                                    Existing Fevicon
                                                </label>
                                                <div>
                                                    <img src="{{ asset('font_asset/uploads/'.$data->favicon) }}" alt="" class="w_200">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>
                                                    Change Fevicon
                                                </label>
                                                <div>
                                                    <input type="file" name="favicon" class="form-control">
                                                </div>
                                            </div>
                                            <!-- Photo Item End -->
                                        </div>

                                        <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                            <!-- Text Item Start -->
                                            <div class="form-group mb-3">
                                                <label>News Tricker</label>
                                                <input type="text" class="form-control" name="news_tricker_total" value="{{ $data->news_tricker_total }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>News Tricker Status</label>
                                                <select name="news_ticker_status" class="form-control">
                                                    <option value="1" @if ($data->news_ticker_status == 1) Selected

                                                    @endif>Show</option>
                                                    <option value="0" @if ($data->news_ticker_status == 0) Selected

                                                        @endif>Hide</option>
                                                </select>
                                            </div>



<!-- Text Item Start -->
<div class="form-group mb-3">
    <label>Video Item Limit</label>
    <input type="text" class="form-control" name="video_total" value="{{ $data->video_total }}">
</div>
<div class="form-group mb-3">
    <label>Video Item Status</label>
    <select name="video_status" class="form-control">
        <option value="1" @if ($data->video_status == 1) Selected

        @endif>Show</option>
        <option value="0" @if ($data->video_status == 0) Selected

            @endif>Hide</option>
    </select>
</div>

                                    <!-- Text Item End -->
                                        </div>
                                        <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">

                                        <div class="form-group mb-3">
                                            <label>Top Bar Date Status</label>
                                            <select name="top_bar_date_status" class="form-control">
                                                <option value="1" @if ($data->top_bar_date_status == 1) Selected

                                                @endif>Show</option>
                                                <option value="0" @if ($data->top_bar_date_status == 0) Selected

                                                    @endif>Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Top Bar Email</label>
                                            <input type="text" class="form-control" name="top_bar_email" value="{{ $data->top_bar_email }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Top Bar Email Status</label>
                                            <select name="top_bar_email_status" class="form-control">
                                                <option value="1" @if ($data->top_bar_email_status == 1) Selected

                                                @endif>Show</option>
                                                <option value="0" @if ($data->top_bar_email_status == 0) Selected

                                                    @endif>Hide</option>
                                            </select>
                                        </div>
                                        </div>

                                       {{-- color start --}}
                                        <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">

                                            <div class="form-group mb-3">
                                                <label>Theme Color 1</label>
                                                <input type="text" class="form-control jscolor" name="theme_color_1" value="{{ $data->theme_color_1 }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Theme Color 2</label>
                                                <input type="text" class="form-control jscolor" name="theme_color_2" value="{{ $data->theme_color_2 }}">
                                            </div>

                                            </div>

                                            <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">


                                                <div class="form-group mb-3">
                                                    <label>Google Analytic Id</label>
                                                    <input type="text" class="form-control" name="analytic_id" value="{{ $data->analytic_id }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Analytic Id</label>
                                                    <select name="analytic_id_status" class="form-control">
                                                        <option value="1" @if ($data->analytic_id_status == 1) Active

                                                        @endif>Active</option>
                                                        <option value="0" @if ($data->analytic_id_status == 0) Selected

                                                            @endif>In Active</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Disqus Url</label>
                                                    <textarea type="text" class="form-control" name="disqus" >{{ $data->disqus }}</textarea>
                                                </div>
                                                </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt_30">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
