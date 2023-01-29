@extends('layouts.admin', ['app_title' => $portfolio->title])

@section('content')
    <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <block-editor title="New">
                    @foreach(config('app.locales') as $lang)

                        <fieldset slot="{{ $lang }}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title"
                                       type="text"
                                       name="{{$lang}}[title]"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       value="{{ old($lang.'.title') ?? $portfolio->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address"
                                       type="text"
                                       name="{{$lang}}[content][address]"
                                       class="form-control"
                                       value="{{ old($lang.'.address') ?? $portfolio->translate('content', $lang)['address'] }}"
                                       required>
                            </div>
                            <wysiwyg class="mb-0"
                                     content="{{ old('body') ?? $portfolio->translate('content', $lang)['body'] }}"
                                     name="{{$lang}}[content][body]"
                                     label="Body"></wysiwyg>
                        </fieldset>
                    @endforeach
                </block-editor>
                <div class="form-group mt-2">
                    <label for="video">Video (youtube-link)</label>
                    <input id="video" type="text" name="video"
                           class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                           value="{{ old('video') ?? $portfolio->video }}">
                </div>
                @includeIf('partials.admin.meta', ['meta' => $portfolio->meta()->first()])
            </div>
            <div class="col-md-4">
                <label for="portfolio">Logo</label>
                <image-uploader ratio="67%" name="portfolio"
                                image-id="{{ optional($portfolio->getFirstMedia('portfolio'))->id }}"
                                src="{{ $portfolio->getFirstMediaUrl('portfolio') }}"></image-uploader>
            </div>
        </div>
        <hr class="my-5">
        <multi-uploader
                class="mt-4"
                :src="{{ json_encode($portfolio->images_list) }}"></multi-uploader>


        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection
