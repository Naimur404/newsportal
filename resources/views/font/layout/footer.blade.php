<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">About Us</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Useful Links</h2>
                    <ul class="useful-links">
                        <li><a href="index.html">Home</a></li>
                        @if ($global_page_data->terms_status == '1')


                        <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                        @endif
                        @if ($global_page_data->privacy_status == '1')
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        @endif
                        @if ($global_page_data->disclaim_status == '1')
                        <li><a href="{{ route('disclaim') }}">Disclaimer</a></li>
                        @endif
                        @if ($global_page_data->contact_status == '1')
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        @endif
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Contact</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            G Block, Chittagong<br>
                            Usual, BD, 4216
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="right">
                            naimur404cse@gmail.com
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="right">
                            122-222-1212
                        </div>
                    </div>
                    <ul class="social">
                        @foreach ($global_social_item as $data)


                        <li><a href="{{ $data->url }}"><i class="fab fa-{{ $data->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Postletter</h2>
                    <p>
                        In order to get the latest posts and other great items, please subscribe us here:
                    </p>
                    <form action="{{ route('subscriber') }}" method="post" class="form_subscribe_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
