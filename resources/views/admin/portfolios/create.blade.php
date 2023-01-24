@extends('layouts.admin', ['app_title' => 'Новое портфолио'])

@section('content')
    <section>
        <form action="{{ route('admin.portfolios.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новое портфолио">
                        @foreach(config('app.locales') as $lang)

                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input id="title"
                                           type="text"
                                           name="{{$lang}}[title]"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.title') }}"
                                           required>
                                    @if($errors->has('title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="address">Адресс</label>
                                    <input id="address"
                                           type="text"
                                           name="{{$lang}}[content][address]"
                                           class="form-control"
                                           value="{{ old($lang.'.address') }}">
                                </div>

                                <wysiwyg class="mb-0"
                                         content="{{ old('body') }}"
                                         name="{{$lang}}[content][body]"
                                         label="Описание"></wysiwyg>
                            </fieldset>
                        @endforeach
                    </block-editor>
                    <div class="form-group mt-2">
                        <label for="video">Видео обзор (ссылка на youtube)</label>
                        <input id="video" type="text" name="video"
                               class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                               value="{{ old('video') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="portfolio">Лого для портфолио</label>
                    <image-uploader name="portfolio" ratio="67%"></image-uploader>
                </div>
            </div>
            <hr class="my-5">

            <multi-uploader class="mt-4"></multi-uploader>

            <div class="mt-4">
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
