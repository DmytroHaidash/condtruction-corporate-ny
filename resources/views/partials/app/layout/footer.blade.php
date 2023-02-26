<!-- App-footer -->
<footer id="app-footer">
    <div class="container-fluid px-5">
        <div class="row justify-content-between mb-4">
            <div class="footer-item footer-copyright">
            </div>
            <ul class="social-list">
                <li>
                    <a href="{{ route('app.home') }}">
                        @lang('pages.header.home')
                    </a>
                </li>
                <li>
                    <a href="{{route('app.services.index')}}">
                        @lang('pages.header.service')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.about') }}">
                        @lang('pages.header.about')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.articles.index') }}">
                        @lang('pages.header.blog')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.contacts') }}">
                        @lang('pages.header.contacts')
                    </a>
                </li>
                <li>
                    <a href="{{ route('app.pages.privacy') }}">
                        @lang('pages.header.privacy')
                    </a>
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