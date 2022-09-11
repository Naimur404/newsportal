
 <div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('font_asset/uploads/'.$global_setting->logo) }}" alt="">
                    </a>
                </div>
            </div>
            @if($global_top_ad_data->top_ad_status == 1)
            <div class="col-md-8">
                <div class="ad-section-1">
                    @if($global_top_ad_data->top_ad_url == '')
                <img src="{{ asset('font_asset/uploads/'.$global_top_ad_data->top_ad) }}" alt="">
                @else
                <a href="{{ $global_top_ad_data->top_ad_url }}"><img src="{{ asset('font_asset/uploads/'.$global_top_ad_data->top_ad) }}" alt=""></a>
                @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
