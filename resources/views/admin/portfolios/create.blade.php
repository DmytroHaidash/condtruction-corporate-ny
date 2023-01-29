@extends('layouts.admin', ['app_title' => 'New portfolio'])

@section('content')
    <section>
        <form action="{{ route('admin.portfolios.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
                                           value="{{ old($lang.'.title') }}"
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
                                           value="{{ old($lang.'.address') }}">
                                </div>

                                <wysiwyg class="mb-0"
                                         content="{{ old('body') }}"
                                         name="{{$lang}}[content][body]"
                                         label="Body"></wysiwyg>
                            </fieldset>
                        @endforeach
                    </block-editor>
                    <div class="form-group mt-2">
                        <label for="video">Video (youtube-link)</label>
                        <input id="video" type="text" name="video"
                               class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                               value="{{ old('video') }}">
                    </div>
                    @includeIf('partials.admin.meta', ['meta' => null])
                </div>
                <div class="col-md-4">
                    <label for="portfolio">Logo</label>
                    <image-uploader name="portfolio" ratio="67%"></image-uploader>
                </div>
            </div>
            <hr class="my-5">

            <multi-uploader class="mt-4"></multi-uploader>

            <div class="mt-4">
                <button class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>
    </section>
@endsection
