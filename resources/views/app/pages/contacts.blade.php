@extends('layouts.app', ['page_title' => trans('pages.header.contacts')])

@section('content')
    <section id="page-contacts" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item active">@lang('pages.header.contacts')</li>
                        </ol>
                    </nav>
                    <div class="logo">
                        <svg width="865" height="120">
                            <use xlink:href="#page-logo"></use>
                        </svg>
                    </div>
                    <a href="{{url()->previous()}}" class="back-navigation">
                        @lang('breadcrumb.back')
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="decor-bg"></div>
                    <h1 class="section-title text-center">
                        @lang('pages.header.contacts')
                    </h1>
                    <div class="contacts-description">
                        <div class="map-contacts">
{{--                            <div class="map-mask">--}}
{{--                                @lang('pages.map.click')--}}
{{--                            </div>--}}
{{--                            <div id="contacts-page-maps"></div>--}}
                            <img src="../../images/main/Map NY.png" alt="image">
                        </div>
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
                                <a href="tel:{{phone_link(app('settings')->phone_additional)}}" class="contacts-item__link">
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
    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection