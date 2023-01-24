@extends('layouts.app', ['page_title' => trans('breadcrumb.blog')])

@section('content')
    <section id="page-blog" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item active">@lang('breadcrumb.blog')</li>
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
                <div class="col-12 text-center">
                    <h1 class="section-title">
                        @lang('breadcrumb.blog')
                    </h1>
                </div>
                @foreach($blog as $item)
                    <div class="col-sm-7 col-lg-4">
                        <a href="{{ route('app.articles.index', ['id'=>$item->id] )}}" class="blog-card">
                            <h3 class="title">
                                {{ $item->title }}
                            </h3>
                            <div class="image" style="background-image: url({{ $item->getFirstMediaUrl('category') }});"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection