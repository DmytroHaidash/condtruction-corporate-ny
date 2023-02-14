<!-- App-footer -->
<footer id="app-footer">
    <div class="container-fluid px-5">
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
                    <a href="{{app('settings')->twitter}}">
                        <svg width="22" height="22">
                            <use xlink:href="#twitter-icon"></use>
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