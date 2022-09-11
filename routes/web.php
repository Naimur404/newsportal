<?php

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeConyroller;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfile;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\SocialItemController;
use App\Http\Controllers\Font\AboutController;
use App\Http\Controllers\Font\HomeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Author\AuhtorHomeController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Font\ArchiveController;
use App\Http\Controllers\Font\CategoryPostController;
use App\Http\Controllers\Font\ContactController;
use App\Http\Controllers\Font\DisclaimController;
use App\Http\Controllers\Font\FaqController;
use App\Http\Controllers\Font\LoginController;
use App\Http\Controllers\Font\PhotoGalleryController;
use App\Http\Controllers\Font\PollController;
use App\Http\Controllers\Font\PostController;
use App\Http\Controllers\Font\PrivacyController;
use App\Http\Controllers\Font\SubscriberController;
use App\Http\Controllers\Font\TagController;
use App\Http\Controllers\Font\TermsController;
use App\Http\Controllers\Font\VideoGalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/post/{id}',[PostController::class,'detail'])->name('post_detail');
Route::get('/post/category/{id}',[CategoryPostController::class,'index'])->name('cat_post');
Route::get('/post/sub_category/{id}',[CategoryPostController::class,'sub_cat'])->name('sub_cat');
Route::get('/photo_gallery',[PhotoGalleryController::class,'photo_gallery'])->name('photo_gallery');
Route::get('/video_gallery',[VideoGalleryController::class,'video_gallery'])->name('video_gallery');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/faq',[FaqController::class,'index'])->name('faq');
Route::get('/terms&conditions',[TermsController::class,'index'])->name('terms');
Route::get('/disclaimer',[DisclaimController::class,'index'])->name('disclaim');


Route::get('/login',[LoginController::class,'index'])->name('author_login');
Route::post('/author/login-submit',[LoginController::class,'login'])->name('author_login_submit');
Route::middleware(['author:author'])->group(function () {

    Route::get('/author/dashboard',[AuhtorHomeController::class,'home'])->name('author_home');
    Route::get('/auhtor/logout',[LoginController::class,'auhtor_logout'])->name('author_logout');

    Route::get('/author/edit_profile',[AuthorProfileController::class,'index'])->name('author_edit_profile');
    Route::post('/author/edit_profile_submit',[AuthorProfileController::class,'edit_profile_submit'])->name('author_edit_profile_submit');


    Route::get('/author/post/create',[AuthorPostController::class,'create'])->name('author_post_create');
    Route::get('/author/post/show',[AuthorPostController::class,'show'])->name('author_post_show');
    Route::post('/author/post/store',[AuthorPostController::class,'post_store'])->name('author_post_store');
    Route::get('/author/post/edit/{id}',[AuthorPostController::class,'post_edit'])->name('author_post_edit');
    Route::post('/author/post/update/{id}',[AuthorPostController::class,'post_update'])->name('author_post_update');
    Route::get('/author/post/delete/{id}',[AuthorPostController::class,'post_delete'])->name('author_post_delete');
    Route::get('/author/post/tag/delete/{id}/{pid}',[AuthorPostController::class,'post_tag_delete'])->name('author_post_tag_delete');

});


Route::get('/author/forget_password',[LoginController::class,'forget_password'])->name('author.forget_password');

Route::post('/author/forget_passowrd_submit',[LoginController::class,'forget_pass_submit'])->name('author.forget_pass_submit');
Route::get('/author/reset_password/{token}/{email}',[LoginController::class,'reset_password'])->name('author.reset_password');
Route::post('/author/reset_password_submit',[LoginController::class,'reset_password_submit'])->name('author.reset_password_submit');



Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/subscriber',[SubscriberController::class,'index'])->name('subscriber');
Route::get('/subscriber/verify/{token}',[SubscriberController::class,'verify'])->name('subscriber_verify');
Route::post('/poll_submit/{id}',[PollController::class,'poll_submit'])->name('poll_submit');
Route::get('/old_poll_result',[PollController::class,'old_poll_result'])->name('old_poll_result');

Route::post('/archive_post',[ArchiveController::class,'archive_post'])->name('archive_post');
Route::get('/archive_post/{month}/{year}',[ArchiveController::class,'archive_post_all'])->name('archive_post_all');

Route::get('/tag_post/{tag_name}',[TagController::class,'show'])->name('tag_post');

Route::get('/sub_category_by_category/{id}',[HomeController::class,'sub_category'])->name('sub_category_by_category');

Route::post('/search_result',[HomeController::class,'search_result'])->name('search_result');

Route::post('/contact/send_email',[ContactController::class,'send_email'])->name('contact_submit');
Route::get('/privacy',[PrivacyController::class,'index'])->name('privacy');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
Route::post('/admin/login-submit',[AdminLoginController::class,'login'])->name('admin_login_submit');
Route::get('/admin/forget_password',[AdminLoginController::class,'forget_password'])->name('admin.forget_password');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');
Route::post('/admin/forget_passowrd_submit',[AdminLoginController::class,'forget_pass_submit'])->name('admin.forget_pass_submit');
Route::get('/admin/reset_password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin.reset_password');
Route::post('/admin/reset_password_submit',[AdminLoginController::class,'reset_password_submit'])->name('admin.reset_password_submit');
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminHomeConyroller::class,'index'])->name('admin.dashboard');
    Route::get('/admin/edit_profile',[AdminProfile::class,'index'])->name('admin.edit_profile');
    Route::post('/admin/edit_profile_submit',[AdminProfile::class,'edit_profile_submit'])->name('admin.edit_profile_submit');
    Route::get('/admin/home_ad',[AdminAdvertisementController::class,'home_ad_show'])->name('home_ad_show');
    Route::post('/admin/home_ad_update',[AdminAdvertisementController::class,'home_ad_update'])->name('home_ad_update');
    Route::get('/admin/top_ad',[AdminAdvertisementController::class,'top_ad_show'])->name('top_ad_show');
    Route::post('/admin/top_ad_update',[AdminAdvertisementController::class,'top_ad_update'])->name('top_ad_update');
    Route::get('/admin/sidebar_ad_show',[AdminAdvertisementController::class,'sidebar_ad_show'])->name('sidebar_ad_show');
    Route::get('/admin/sidebar_ad_create',[AdminAdvertisementController::class,'sidebar_ad_create'])->name('sidebar_ad_create');
    Route::post('/admin/sidebar_ad_submit',[AdminAdvertisementController::class,'sidebar_ad_submit'])->name('sidebar_ad_submit');
    Route::get('/admin/sidebar_ad_edit/{id}',[AdminAdvertisementController::class,'sidebar_ad_edit'])->name('sidebar_ad_edit');
    Route::post('/admin/sidebar_ad_update/{id}',[AdminAdvertisementController::class,'sidebar_ad_update'])->name('sidebar_ad_update');
    Route::get('/admin/sidebar_ad_delete/{id}',[AdminAdvertisementController::class,'sidebar_ad_delete'])->name('sidebar_ad_delete');
    Route::get('/admin/category/create',[AdminCategoryController::class,'create'])->name('admin_category_create');
    Route::get('/admin/category/show',[AdminCategoryController::class,'show'])->name('admin_category_show');
    Route::post('/admin/category/store',[AdminCategoryController::class,'category_store'])->name('category_store');
    Route::get('/admin/category/edit/{id}',[AdminCategoryController::class,'category_edit'])->name('category_edit');
    Route::post('/admin/category/update/{id}',[AdminCategoryController::class,'category_update'])->name('category_update');
    Route::get('/admin/category/delete/{id}',[AdminCategoryController::class,'category_delete'])->name('category_delete');


    Route::get('/admin/sub_category/create',[SubCategoryController::class,'create'])->name('admin_sub_category_create');
    Route::get('/admin/sub_category/show',[SubCategoryController::class,'show'])->name('admin_sub_category_show');
    Route::post('/admin/sub_category/store',[SubCategoryController::class,'sub_category_store'])->name('sub_category_store');
    Route::get('/admin/sub_category/edit/{id}',[SubCategoryController::class,'sub_category_edit'])->name('sub_category_edit');
    Route::post('/admin/sub_category/update/{id}',[SubCategoryController::class,'sub_category_update'])->name('sub_category_update');
    Route::get('/admin/sub_category/delete/{id}',[SubCategoryController::class,'sub_category_delete'])->name('sub_category_delete');


    Route::get('/admin/post/create',[AdminPostController::class,'create'])->name('admin_post_create');
    Route::get('/admin/post/show',[AdminPostController::class,'show'])->name('admin_post_show');
    Route::post('/admin/post/store',[AdminPostController::class,'post_store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{id}',[AdminPostController::class,'post_edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{id}',[AdminPostController::class,'post_update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{id}',[AdminPostController::class,'post_delete'])->name('admin_post_delete');
    Route::get('/admin/post/tag/delete/{id}/{pid}',[AdminPostController::class,'post_tag_delete'])->name('admin_post_tag_delete');

    Route::get('/admin/setting',[AdminSettingController::class,'setting'])->name('admin_setting');
    Route::post('/admin/setting/update',[AdminSettingController::class,'update'])->name('admin_setting_update');


    Route::get('/admin/photo/create',[PhotoController::class,'create'])->name('admin_photo_create');
    Route::get('/admin/photo/show',[PhotoController::class,'show'])->name('admin_photo_show');
    Route::post('/admin/photo/store',[PhotoController::class,'photo_store'])->name('admin_photo_store');
    Route::get('/admin/photo/edit/{id}',[PhotoController::class,'photo_edit'])->name('admin_photo_edit');
    Route::post('/admin/photo/update/{id}',[PhotoController::class,'photo_update'])->name('admin_photo_update');
    Route::get('/admin/photo/delete/{id}',[PhotoController::class,'photo_delete'])->name('admin_photo_delete');


    Route::get('/admin/video/create',[AdminVideoController::class,'create'])->name('admin_video_create');
    Route::get('/admin/video/show',[AdminVideoController::class,'show'])->name('admin_video_show');
    Route::post('/admin/video/store',[AdminVideoController::class,'video_store'])->name('admin_video_store');
    Route::get('/admin/video/edit/{id}',[AdminVideoController::class,'video_edit'])->name('admin_video_edit');
    Route::post('/admin/video/update/{id}',[AdminVideoController::class,'video_update'])->name('admin_video_update');
    Route::get('/admin/video/delete/{id}',[AdminVideoController::class,'video_delete'])->name('admin_video_delete');


    Route::post('/admin/page_about/update/{id}',[AdminPageController::class,'about_update'])->name('admin_about_update');
    Route::get('/admin/page/about',[AdminPageController::class,'about'])->name('admin_about_page');

    Route::post('/admin/page_faq/update/{id}',[AdminPageController::class,'faq_update'])->name('admin_faq_update');
    Route::get('/admin/page/faq',[AdminPageController::class,'faq'])->name('admin_faq_page');

    Route::post('/admin/contact/update/{id}',[AdminPageController::class,'contact_update'])->name('admin_contact_update');
    Route::get('/admin/page/c0ntact',[AdminPageController::class,'contact'])->name('admin_contact_page');

    Route::post('/admin/login_page/update/{id}',[AdminPageController::class,'login_update'])->name('admin_login_update');
    Route::get('/admin/page/login',[AdminPageController::class,'login'])->name('admin_login_page');



    Route::post('/admin/terms_page/update/{id}',[AdminPageController::class,'terms_update'])->name('admin_terms_update');
    Route::get('/admin/page/terms&con',[AdminPageController::class,'terms'])->name('admin_terms_page');

    Route::post('/admin/privacy_page/update/{id}',[AdminPageController::class,'privacy_update'])->name('admin_privacy_update');
    Route::get('/admin/page/privacy',[AdminPageController::class,'privacy'])->name('admin_privacy_page');


    Route::post('/admin/disclaim_page/update/{id}',[AdminPageController::class,'disclaim_update'])->name('admin_disclaim_update');
    Route::get('/admin/page/disclaim',[AdminPageController::class,'disclaim'])->name('admin_disclaim_page');

    Route::get('/admin/faq/create',[AdminFaqController::class,'create'])->name('admin_faq_create');
    Route::get('/admin/faq/show',[AdminFaqController::class,'show'])->name('admin_faq_show');
    Route::post('/admin/faq/store',[AdminFaqController::class,'faq_store'])->name('admin_faq_store');
    Route::get('/admin/faq/edit/{id}',[AdminFaqController::class,'faq_edit'])->name('admin_faq_edit');
    Route::post('/admin/faq/update/{id}',[AdminFaqController::class,'faq_update'])->name('admin_faq_updated');
    Route::get('/admin/faq/delete/{id}',[AdminFaqController::class,'faq_delete'])->name('admin_faq_delete');

    Route::get('/admin/subscribers/all',[AdminSubscriberController::class,'show_all'])->name('admin_subscriber_all');
    Route::get('/admin/subscribers/send_email',[AdminSubscriberController::class,'send_email'])->name('admin_subscriber_send_email');
    Route::post('/admin/subscribers/send_email_submit',[AdminSubscriberController::class,'send_email_submit'])->name('admin_subscriber_send_email_submit');


    Route::get('/admin/online_poll/create',[AdminOnlinePollController::class,'create'])->name('admin_online_poll_create');
    Route::get('/admin/online_poll/show',[AdminOnlinePollController::class,'show'])->name('admin_online_poll_show');
    Route::post('/admin/online_poll/store',[AdminOnlinePollController::class,'online_poll_store'])->name('admin_online_poll_store');
    Route::get('/admin/online_poll/edit/{id}',[AdminOnlinePollController::class,'online_poll_edit'])->name('admin_online_poll_edit');
    Route::post('/admin/online_poll/update/{id}',[AdminOnlinePollController::class,'online_poll_update'])->name('admin_online_poll_update');
    Route::get('/admin/online_poll/delete/{id}',[AdminOnlinePollController::class,'online_poll_delete'])->name('admin_online_poll_delete');


    Route::get('/admin/social_item/create',[SocialItemController::class,'create'])->name('admin_social_item_create');
    Route::get('/admin/social_item/show',[SocialItemController::class,'show'])->name('admin_social_item_show');
    Route::post('/admin/social_item/store',[SocialItemController::class,'social_item_store'])->name('admin_social_item_store');
    Route::get('/admin/social_item/edit/{id}',[SocialItemController::class,'social_item_edit'])->name('admin_social_item_edit');
    Route::post('/admin/social_item/update/{id}',[SocialItemController::class,'social_item_update'])->name('admin_social_item_update');
    Route::get('/admin/social_item/delete/{id}',[SocialItemController::class,'social_item_delete'])->name('admin_social_item_delete');


    Route::get('/admin/admin_author/create',[AuthorController::class,'create'])->name('admin_author_create');
    Route::get('/admin/admin_author/show',[AuthorController::class,'show'])->name('admin_author_show');
    Route::post('/admin/admin_author/store',[AuthorController::class,'author_store'])->name('admin_author_store');
    Route::get('/admin/admin_author/edit/{id}',[AuthorController::class,'author_edit'])->name('admin_author_edit');
    Route::post('/admin/admin_author/update/{id}',[AuthorController::class,'author_update'])->name('admin_author_update');
    Route::get('/admin/admin_author/delete/{id}',[AuthorController::class,'author_delete'])->name('admin_author_delete');

});
