<!-- App-footer -->
<footer id="app-footer">
    <div class="container-fluid px-5">
        <div class="row justify-content-between mb-4">
            <div class="footer-item footer-copyright">
            </div>
            <ul class="social-list ">
                <li>
                    <a href="{{ route('app.home') }}" class="footer-menu">
                        @lang('pages.header.home')
                    </a>
                </li>
                <li>
                    <a href="{{route('app.services.index')}}" class="footer-menu">
                        @lang('pages.header.service')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.about') }}" class="footer-menu">
                        @lang('pages.header.about')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.articles.index') }}" class="footer-menu">
                        @lang('pages.header.blog')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.contacts') }}" class="footer-menu">
                        @lang('pages.header.contacts')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.privacy') }}" class="footer-menu">
                        @lang('pages.header.privacy')
                    </a>
                </li>
            </ul>
            <div class="footer-item mt-2 mt-sm-0">
            </div>
        </div>
        <div class="row justify-content-between mb-4">
            <div class="footer-item footer-copyright">
            </div>
            <ul class="social-list">
                <li>
                    <p>License:</p>
                </li>
                <li>
                    <p>NYS LIC # 16000079372</p>
                </li>
                <li>
                    <p>NJS LIC # 24GI00191800</p>
                </li>
                <li>
                    <p>MOLD ASSESSOR NYS DOL CERT# MA01425</p>
                </li>
            </ul>
            <div class="footer-item mt-2 mt-sm-0">
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="footer-item footer-copyright">
            </div>
            <ul class="social-list">
                <li>
                    <a href="{{app('settings')->facebook}}">
                        <svg width="22" height="22">
                            <use xlink:href="#facebook-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{app('settings')->instagram}}">
                        <svg width="22" height="22">
                            <use xlink:href="#instagram-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{app('settings')->linked_in}}">
                        <svg width="22" height="22">
                            <use xlink:href="#linkedin-icon"></use>
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="footer-item mt-2 mt-sm-0">
            </div>
        </div>
    </div>
    <!-- Data Maps -->
    <div id="coordinateLat" data-coordinate="{{app('settings')->latitude}}"></div>
    <div id="coordinateLon" data-coordinate="{{app('settings')->longitude}}"></div>
</footer>