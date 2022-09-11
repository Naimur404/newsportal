<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @if ($global_setting->top_bar_date_status == '1')
                    <li class="today-text">Today: {{ date('d F, Y') }}</li>
                    @endif
                    @if ($global_setting->top_bar_email_status == '1')
                    <li class="email-text">{{ $global_setting->top_bar_email }}</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">

                    @if ($global_page_data->faq_status == '1')

                    <li class="menu"><a href="{{ route('faq') }}">FAQ</a></li>
@endif
                    @if ($global_page_data->about_status == '1')
                    <li class="menu"><a href="{{ route('about') }}">About</a></li>
                    @endif
                    @if ($global_page_data->contact_status == '1')
                    <li class="menu"><a href="{{ route('contact') }}">Contact</a></li>
                    @endif
                    @if ($global_page_data->login_status == '1')
                    <li class="menu"><a href="{{ route('author_login') }}">Login</a></li>
                    @endif
                    {{-- <li>
                        <div class="language-switch">
                            <select name="">
                                <option value="">English</option>
                                <option value="">Hindi</option>
                                <option value="">Arabic</option>
                            </select>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
