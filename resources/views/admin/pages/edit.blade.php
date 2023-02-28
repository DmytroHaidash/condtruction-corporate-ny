@extends('layouts.admin', ['app_title' => $page->title])

@section('content')
    <form action="{{ route('admin.pages.update', $page) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($lang.'.title') ?? $page->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description"
                                       type="text"
                                       name="{{$lang}}[content][description]"
                                       class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                       value="{{ old($lang.'.description') ?? ($page->translate('content', $lang)['description'] ?? '') }}"
                                       required>
                                @if($errors->has('description'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <wysiwyg class="mb-0"
                                     content="{{ old('body') ?? $page->translate('content', $lang)['body'] }}"
                                     name="{{$lang}}[content][body]"
                                     label="Body"></wysiwyg>
                        </fieldset>

                    @endforeach
                </block-editor>
                <hr class="my-5">
                @includeIf('partials.admin.meta', ['meta' => $page->meta()->first()])
            </div>
            <div class="col-md-4">
                <image-uploader ratio="67%" name="page" image-id="{{ optional($page->getFirstMedia('page'))->id }}"
                                src="{{ $page->getFirstMediaUrl('page') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection