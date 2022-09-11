<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html"></a>
    </div>

    <ul class="sidebar-menu">

        <li class="@yield('dashboard')"><a class="nav-link" href="{{ route('author_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>





        <li class="nav-item dropdown @yield('news')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog</span></a>
            <ul class="dropdown-menu">

                <li class="@yield('post')"><a class="nav-link" href="{{ route('author_post_show') }}"><i class="fas fa-hand-point-right"></i>Post</a></li>
            </ul>
        </li>



        <li class="nav-item dropdown @yield('gallery')">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Gallery</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('photo')"><a class="nav-link" href="{{ route('admin_photo_show') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>
                <li class="@yield('video')"><a class="nav-link" href="{{ route('admin_video_show') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>
            </ul>
        </li>










    </ul>
</aside>
