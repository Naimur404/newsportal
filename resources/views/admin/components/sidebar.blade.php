<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html"></a>
    </div>

    <ul class="sidebar-menu">

        <li class="@yield('dashboard')"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

        <li class="nav-item dropdown @yield('advertisement')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisement</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('top_advertisement')"><a class="nav-link" href="{{ route('top_ad_show') }}"><i class="fas fa-angle-right"></i> Top Advertisement</a></li>
                <li class="@yield('home_advertisement')"><a class="nav-link" href="{{ route('home_ad_show') }}"><i class="fas fa-angle-right"></i> Home Advertisement</a></li>
                <li class="@yield('sidebar_advertisement')"><a class="nav-link" href="{{ route('sidebar_ad_show') }}"><i class="fas fa-angle-right"></i> Sidebar Advertisement</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown @yield('author')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Author Section</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('author_list')"><a class="nav-link" href="{{ route('admin_author_show') }}"><i class="fas fa-hand-point-right"></i> <span>Author List</span></a></li>
                <li class="@yield('faq')"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-hand-point-right"></i> <span>Author Posts</span></a></li>
                <li class="@yield('contact')"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-hand-point-right"></i> <span>Contact</span></a></li>
                <li class="@yield('login')"><a class="nav-link" href="{{ route('admin_login_page') }}"><i class="fas fa-hand-point-right"></i> <span>Login</span></a></li>
                <li class="@yield('terms')"><a class="nav-link" href="{{ route('admin_terms_page') }}"><i class="fas fa-hand-point-right"></i> <span>Terms And Conditions</span></a></li>
                <li class="@yield('privacy')"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-hand-point-right"></i> <span>Privacy Policy</span></a></li>
                <li class="@yield('dis')"><a class="nav-link" href="{{ route('admin_disclaim_page') }}"><i class="fas fa-hand-point-right"></i> <span>Disclaimer</span></a></li>
            </ul>
        </li>

        <li class="nav-item dropdown @yield('news')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('category')"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-hand-point-right"></i>Categories</a></li>
                <li class="@yield('sub_category')"><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-hand-point-right"></i>Sub Categories</a></li>
                <li class="@yield('post')"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-hand-point-right"></i>Post</a></li>
            </ul>
        </li>
        <li class="@yield('setting')"><a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>


        <li class="nav-item dropdown @yield('gallery')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Gallery</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('photo')"><a class="nav-link" href="{{ route('admin_photo_show') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>
                <li class="@yield('video')"><a class="nav-link" href="{{ route('admin_video_show') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>
            </ul>
        </li>

        <li class="nav-item dropdown @yield('pages')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Pages</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('about')"><a class="nav-link" href="{{ route('admin_about_page') }}"><i class="fas fa-hand-point-right"></i> <span>About</span></a></li>
                <li class="@yield('faq')"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ</span></a></li>
                <li class="@yield('contact')"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-hand-point-right"></i> <span>Contact</span></a></li>
                <li class="@yield('login')"><a class="nav-link" href="{{ route('admin_login_page') }}"><i class="fas fa-hand-point-right"></i> <span>Login</span></a></li>
                <li class="@yield('terms')"><a class="nav-link" href="{{ route('admin_terms_page') }}"><i class="fas fa-hand-point-right"></i> <span>Terms And Conditions</span></a></li>
                <li class="@yield('privacy')"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-hand-point-right"></i> <span>Privacy Policy</span></a></li>
                <li class="@yield('dis')"><a class="nav-link" href="{{ route('admin_disclaim_page') }}"><i class="fas fa-hand-point-right"></i> <span>Disclaimer</span></a></li>
            </ul>
        </li>


        <li class="@yield('faq_content')"><a class="nav-link" href="{{ route('admin_faq_show') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ Section</span></a></li>
        <li class="nav-item dropdown @yield('subscribers')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Subscribers</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('subscriber')"><a class="nav-link" href="{{ route('admin_subscriber_all') }}"><i class="fas fa-hand-point-right"></i> <span>All Subscribers</span></a></li>
                <li class="@yield('email')"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fas fa-hand-point-right"></i> <span>Send Eamil To All</span></a></li>

            </ul>
        </li>
        <li class="@yield('poll')"><a class="nav-link" href="{{ route('admin_online_poll_show') }}"><i class="fas fa-hand-point-right"></i> <span>Online Poll</span></a></li>
        <li class="@yield('social')"><a class="nav-link" href="{{ route('admin_social_item_show') }}"><i class="fas fa-hand-point-right"></i> <span>Social Item</span></a></li>





    </ul>
</aside>
