<!-- App-header -->
<form action="{{ route('app.locale') }}" method="post" id="locale" style="display: none">
    @csrf
    <input type="hidden" name="locale">
</form>
<header id="app-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-4 col-sm-5">
                <nav class="header-nav">
                    <ul class="menu-list">
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
                       {{-- <li>
                            <a href="{{ route('app.portfolios.index') }}">
                                @lang('pages.header.portfolio')
                            </a>
                        </li>--}}
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

                    </ul>
                </nav>
                <div class="burger-menu">
                    <div class="line line--top"></div>
                    <div class="line line--middle"></div>
                    <div class="line line--bottom"></div>
                    <div class="line line--close line--left"></div>
                    <div class="line line--close line--right"></div>
                </div>
            </div>
            <div class="col-8 col-sm-2">
                <div class="d-flex align-items-center">
                    <div class="locale-selector d-block d-sm-none">
                        <div class="locale-selector-value text-primary">
                            @if(app()->getLocale() == 'uk' )
                                ua
                            @else
                                {{ app()->getLocale() }}
                            @endif
                        </div>
                        <ul class="locale-selector-list">
                            @foreach($locales as $locale)
                                <li>
                                    <a href="#{{ $locale }}" class="locales">
                                        @if ($locale == 'uk')
                                            ua
                                        @else
                                            {{ $locale }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="/" class="logo">
                        <img src="/images/icon/GE-03-1.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="header-contacts">
                    <div class="locale-selector d-none d-sm-block">
                        <div class="locale-selector-value text-primary">
                            @if(app()->getLocale() == 'uk' )
                                ua
                            @else
                                {{ app()->getLocale() }}
                            @endif
                        </div>
                        <ul class="locale-selector-list">
                            @foreach($locales as $locale)
                                <li>
                                    <a href="#{{ $locale }}" class="locales">
                                        @if ($locale == 'uk')
                                            ua
                                        @else
                                            {{ $locale }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="contacts-item">
                        <div class="contacts-item__title">
                            @lang('pages.header.phone')
                        </div>
                        <a href="tel: {{phone_link(app('settings')->phone)}}" class="contacts-item__link">
                            {{app('settings')->phone}}
                        </a>
                    </div>
                    @if(app('settings')->phone_additional)
                        <div class="contacts-item">
                            <div class="contacts-item__title">
                                @lang('pages.header.phone')
                            </div>
                            <a href="tel:{{phone_link(app('settings')->phone_additional)}}" class="contacts-item__link">
                                {{app('settings')->phone_additional}}
                            </a>
                        </div>
                    @endif
                    @if(request()->route()->getName() == 'app.home')
                        <a href="#feedback" class="btn btn-primary d-none d-sm-inline-flex scroll-link">
                            @lang('pages.header.feedback')
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-wrap">
            <ul class="menu-list">
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
                {{--<li>--}}
                    {{--<a href="{{ route('app.portfolios.index') }}">--}}
                        {{--@lang('pages.header.portfolio')--}}
                    {{--</a>--}}
                {{--</li>--}}
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

            </ul>
            <div class="menu-contacts">
                <div class="contacts-item">
                    <div class="contacts-item__title">
                        @lang('pages.header.phone')
                    </div>
                    <a href="tel:={{phone_link(app('settings')->phone)}}" class="contacts-item__link">
                        {{app('settings')->phone}}
                    </a>
                </div>
                @if(app('settings')->phone_additional)
                    <div class="contacts-item">
                        <div class="contacts-item__title">
                            @lang('pages.header.phone')
                        </div>
                        <a href="tel:= {{phone_link(app('settings')->phone_additional)}}" class="contacts-item__link">
                            {{app('settings')->phone_additional}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
@includeIf('partials.app.layout.modal')