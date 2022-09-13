<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <meta name="description" content="">
        <meta name="keywords" content="@foreach ($global_tag as $data){{ $data->tag_name }},
        @endforeach">

        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('font_asset/uploads/'.$global_setting->favicon) }}">

@include('font.layout.head')
<style>
    /* Social Button CSS */
    .share-btn {
        display: inline-block;
        color: #ffffff;
        border: none;
        padding: 0.5em;
        width: 4em;
        box-shadow: 0 2px 0 0 rgba(0,0,0,0.2);
        outline: none;
        text-align: center;
    }

    .share-btn:hover {
        color: #eeeeee;
    }

    .share-btn:active {
        position: relative;
        top: 2px;
        box-shadow: none;
        color: #e2e2e2;
        outline: none;
    }

    .twitter     { background-color: #55acee; }
    .google-plus { background-color: #dd4b39; }
    .facebook    { background-color: #3B5998; }
    .stumbleupon { background-color: #444444; }
    .reddit      { background-color: #FFA500; }
    .linkedin    { background-color: #4875B4; }
    .email       { background-color: #444444; }

    /* Código para botão com texto */
    .long-share-btn {
        display: inline-block;
        color: #ffffff;
        border: none;
        padding: 0.5em 1.5em;
        box-shadow: 0 2px 0 0 rgba(0,0,0,0.2);
        outline: none;
        text-align: center;
        text-transform: uppercase;
        font-family: sans-serif;
        font-weight: bold;
    }
    .long-share-btn:hover {
        color: #eeeeee;
    }
    .long-share-btn:active {
        position: relative;
        top: 2px;
        box-shadow: none;
        color: #e2e2e2;
        outline: none;
    }
    a.long-share-btn {
        text-decoration: none;
    }
    </style>
<style>
.website-menu,
.website-menu .bg-primary,
.acme-news-ticker-label,
.search-section button[type="submit"],
.home-content .left .news-total-item .see-all a,
.widget .poll button,
.video-content ,
.footer input[type="submit"],
.footer ul.social li a,
.nav-pills .nav-link.active,
.scroll-top,
.bg-website,
.page.item.active .page-link
{
  background: #{{ $global_setting->theme_color_1 }} !important;
}
.acme-news-ticker,
.page.item.active .page-link
{
    border-color: #{{ $global_setting->theme_color_1 }} !important;
}
.home-main .inner .text-inner .category span, .home-main .inner .text-inner .category span a,
.home-content .left .news-total-item .left-side .category span, .home-content .left .news-total-item .left-side .category span a,
.home-content .left .news-total-item .right-side-item .right .category span, .home-content .left .news-total-item .right-side-item .right .category span a,
.widget .news-item .right .category span, .widget .news-item .right .category span a,
.bg-success,
.related-news .item .category span, .related-news .item .category span a,
.category-page-post-item .category span,
.category-page-post-item .category span a



{
    background: #{{ $global_setting->theme_color_2 }} !important;
}

ul.my-news-ticker li a,
.home-content .left .news-total-item .left-side h3 a:hover,
.home-content .left .news-total-item .right-side-item .right h2 a:hover,
.home-content .left .news-total-item .left-side .date-user .user a:hover, .home-content .left .news-total-item .left-side .date-user .date a:hover,
.home-content .left .news-total-item .left-side .date-user .user a:hover, .home-content .left .news-total-item .left-side .date-user .date a:hover,
.widget .news-item .right .date-user .user a:hover, .widget .news-item .right .date-user .date a:hover,
.widget .news-item .right .date-user .user a:hover, .widget .news-item .right .date-user .date a:hover,
.nav-link:focus, .nav-link:hover,
.nav-pills .nav-link,
.video-carousel .owl-nav .owl-next,
.video-carousel .owl-nav .owl-prev,
li.breadcrumb-item a,
.category-page-post-item h3 a:hover,
.related-news .item h3 a:hover,
.related-news .item .date-user .user a:hover,
.related-news .item .date-user .date a:hover,
.accordion-button:not(.collapsed),
a:hover,
.login-form a,
ul.pagination .page-link





{
    color: #{{ $global_setting->theme_color_1 }} !important;
}
.nav-pills .nav-link.active,
.page.item.active .page-link,
.home-content .left .news-total-item .see-all a{
    color: #fff !important;
}


</style>
    </head>
    <body>
@include('font.layout.font_top')
@include('font.layout.heading')
@include('font.layout.navbar')
@yield('content')


@include('font.layout.footer')

        <div class="copyright">
            Copyright 2022, GhuriFiri. All Rights Reserved.
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <script src="{{ asset('font_asset/js/custom.js') }}"></script>
        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }

                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>

@if (session()->get('success'))

<script>
iziToast.success({
    title: '',
    position:'topRight',
    message: '{{ session()->get('success') }}',
});
</script>
@endif
@if (session()->get('error'))

<script>
iziToast.error({
    title: '',
    position:'center',
    message: '{{ session()->get('error') }}',
});
</script>
@endif

   </body>
</html>
