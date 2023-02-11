@extends('layouts.app', ['page_title' => trans('breadcrumb.main')])

@section('content')
    @if(!empty(app('settings')->title))
        @include('partials.app.sections.intro')
    @endif
    {{--@includeWhen($portfolios->count(), 'partials.app.sections.portfolio')--}}
    @includeWhen($services->count(),'partials.app.sections.services')
    @includeWhen($advantages->count(), 'partials.app.sections.advantages')
    @include('partials.app.sections.feedback')
    @include('partials.app.sections.about')
    @includeWhen($blog->count(), 'partials.app.sections.blog')
@endsection


@section('meta')
    @includeIf('partials.app.layout.meta', ['meta' => $about->meta()->first()])
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $about->banner }}">
    <meta property="article:author" content="Green estate">
@endsection