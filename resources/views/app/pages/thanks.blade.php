@extends('layouts.app', ['page_title' => trans('pages.thanks.title')])

@section('content')

    <section id="page-thanks">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col text-center">
                    <div class="thanks-item">
                        <h1 class="title">
                           @lang('pages.thanks.title')
                        </h1>
                        <p class="subtitle">
                            @lang('pages.thanks.description')
                        </p>
                        <a href="/" class="btn btn-primary">
                            @lang('pages.thanks.main')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="decor-list">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </section>

@endsection