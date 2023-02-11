@extends('layouts.app', ['page_title' => trans('pages.header.about')])

@section('content')
    <section id="single-article" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item active">@lang('pages.header.about')</li>
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
            <div class="row position-relative">
                <div class="decor-bg"></div>
                <div class="col-sm-10 mx-auto">
                    <div class="article-blog">
                        @if($page->hasMedia('page'))
                            <div class="image">
                                <div>
                                    <img src="{{ $page->getFirstMediaUrl('page') }}" alt="image article">
                                </div>
                            </div>
                        @endif
                        <h1 class="title">
                            {{ $page->title }}
                        </h1>
                        <div class="description">
                            {!! $page->content->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection

@section('meta')
    @includeIf('partials.app.layout.meta', ['meta' => $page->meta()->first()])
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $page->preview }}">
    <meta property="article:author" content="Green estate">
@endsection