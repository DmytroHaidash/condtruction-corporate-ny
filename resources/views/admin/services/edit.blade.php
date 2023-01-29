@extends('layouts.admin', ['app_title' => $service->title])

@section('content')
    <form action="{{ route('admin.services.update', $service) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($lang.'.title') ?? $service->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>

                            <wysiwyg class="mb-0"
                                     content="{{ old('body') ?? $service->translate('content', $lang)['body'] }}"
                                     name="{{$lang}}[content][body]"
                                     label="Body"></wysiwyg>
                        </fieldset>

                    @endforeach
                </block-editor>
                <hr class="my-5">
                @includeIf('partials.admin.meta', ['meta' => $service->meta()->first()])
            </div>
            <div class="col-md-4">
                <image-uploader ratio="67%" name="service" image-id="{{ optional($service->getFirstMedia('service'))->id }}"
                                src="{{ $service->getFirstMediaUrl('service') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection
