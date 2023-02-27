<!-- Contacts -->
<section id="contacts">
    <div class="map-contacts">
        @if(request()->route()->getName() == 'app.home')
            <img src="../../images/main/NY-map.png" alt="image">
        @else
{{--            <div class="map-mask">--}}
{{--                @lang('pages.contacts.map')--}}
{{--            </div>--}}

{{--            <div id="contacts-map"></div>--}}
            <img src="../../images/main/Map NY.png" alt="image">
        @endif
    </div>
    <div class="contain-fluid">
        <div class="row w-100 m-0">
            <div class="col-lg-6">
                <div class="contacts-wrapper">
                    <a href="/" class="logo">
                        <img src="/images/icon/GE-03-1.png" alt="logo">
                    </a>
                    <h2 class="title">
                        @if(request()->route()->getName() == 'app.home')
                            @lang('pages.contacts.main')
                        @else
                            @lang('pages.contacts.contacts')
                        @endif
                    </h2>
                    <div class="contacts-list">
                        <div class="contacts-item">
                            <div class="contacts-item__title">
                                @lang('pages.contacts.phone')
                            </div>
                            <a href="tel:{{phone_link(app('settings')->phone)}}" class="contacts-item__link">
                                {{app('settings')->phone}}
                            </a>
                        </div>
                        @if(app('settings')->phone_additional)
                            <div class="contacts-item">
                                <div class="contacts-item__title">
                                    @lang('pages.contacts.phone')
                                </div>
                                <a href="tel:{{phone_link(app('settings')->phone_additional)}}"
                                   class="contacts-item__link">
                                    {{app('settings')->phone_additional}}
                                </a>
                            </div>
                        @endif
                        <div class="contacts-item">
                            <div class="contacts-item__title">
                                @lang('pages.contacts.address')
                            </div>
                            <a href="" target="_blank" class="contacts-item__link">
                                {{app('settings')->content->address}}
                            </a>
                        </div>
                        <div class="contacts-item">
                            <div class="contacts-item__title">
                                @lang('pages.contacts.email')
                            </div>
                            <a href="mailto:{{app('settings')->email}}" class="contacts-item__link">
                                {{app('settings')->email}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
