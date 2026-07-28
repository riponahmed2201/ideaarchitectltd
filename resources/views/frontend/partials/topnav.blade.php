<div class="header-area ia-topbar">
    <div class="container ia-site-container">
        <div class="ia-topbar-inner">
            <ul class="top-left">
                <li>
                    <i class="flaticon-envelope"></i>
                    <a href="mailto:{{ site_setting('site_email') }}">{{ site_setting('site_email') }}</a>
                </li>
                <li>
                    <i class="flaticon-telephone"></i>
                    <a href="tel:{{ preg_replace('/\s+/', '', site_setting('site_phone_1')) }}">
                        {{ site_setting('site_phone_1') }}@if (site_setting('site_phone_2')), {{ site_setting('site_phone_2') }}@endif
                    </a>
                </li>
            </ul>
            <ul class="top-right top-right-two ia-topbar-actions">
                <li class="ia-topbar-utils">
                    <div class="ia-lang-switch" aria-label="Language">
                        <a href="{{ route('locale.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                        <span class="ia-lang-divider">|</span>
                        <a href="{{ route('locale.switch', 'bn') }}" class="{{ app()->getLocale() === 'bn' ? 'active' : '' }}">বাংলা</a>
                    </div>
                </li>
                <li>
                    <button type="button" class="ia-theme-toggle" id="iaThemeToggle" aria-label="Toggle dark mode">
                        <i class="ri-moon-line"></i>
                    </button>
                </li>
                <li>
                    <a href="https://www.facebook.com/iab2021" target="_blank" aria-label="Facebook">
                        <i class="ri-facebook-fill"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@ideaArchitectsLtd-cw6em" target="_blank" aria-label="YouTube">
                        <i class="ri-youtube-fill"></i>
                    </a>
                </li>
                <li>
                    <a href="http://www.linkedin.com/" target="_blank" aria-label="LinkedIn">
                        <i class="ri-linkedin-fill"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/" target="_blank" aria-label="Instagram">
                        <i class="ri-instagram-fill"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
