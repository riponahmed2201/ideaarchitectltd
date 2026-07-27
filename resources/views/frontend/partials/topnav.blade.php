<div class="header-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-8">
                <ul class="top-left">
                    <li>
                        <i class="flaticon-envelope"></i>
                        <a href="mailto:{{ site_setting('site_email') }}">
                            <span>{{ site_setting('site_email') }}</span>
                        </a>
                    </li>
                    <li>
                        <i class="flaticon-telephone"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_1')) }}">
                            {{ site_setting('site_phone_1') }}@if(site_setting('site_phone_2')), {{ site_setting('site_phone_2') }}@endif
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="top-right top-right-two">
                    <li>
                        <a href="https://www.facebook.com/iab2021" target="_blank">
                            <i class="ri-facebook-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@ideaArchitectsLtd-cw6em" target="_blank">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/" target="_blank">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/" target="_blank">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
