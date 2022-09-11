<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\OnlinePoll;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SidebarAdvertisement;
use App\Models\SocialItem;
use App\Models\TopAdvertisement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()

    {
        Paginator::useBootstrap()
;       $top_ad_data = TopAdvertisement::where('id',1)->first();
       $sidebar_top_ad= SidebarAdvertisement::where('sidebar_ad_location','Top')->get();
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location','Bottom')->get();
        $categories = Category::with('ssCat')->where('show_on_menu','show')->orderBy('category_order','asc')->get();
        $recent_post = Post::with('subCategory')->where('is_home',0)->orderBy('id','desc')->take(4)->get();
        $page_data = Page::where('id',1)->first();
        $popular_post = Post::with('subCategory')->orderBy('visitors','desc')->take(4)->get();
        $online_poll = OnlinePoll::orderBy('id','desc')->first();
        $social_data = SocialItem::get();
        $setting = Setting::first();
       view()->share('global_top_ad_data',$top_ad_data);
       view()->share('global_sidebar_top_ad',$sidebar_top_ad);
       view()->share('global_sidebar_bottom_ad',$sidebar_bottom_ad);
       view()->share('global_categories',$categories);
       view()->share('global_recent_post',$recent_post);
       view()->share('global_popular_post',$popular_post);
       view()->share('global_page_data',$page_data);
       view()->share('global_online_poll',$online_poll);
       view()->share('global_social_item',$social_data);
       view()->share('global_setting',$setting);
    }
}
