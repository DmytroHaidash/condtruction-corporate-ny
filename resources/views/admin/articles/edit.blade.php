@extends('layouts.admin', ['app_title' => $article->title])

@section('content')
    <form action="{{ route('admin.articles.update', $article) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($lang.'.title') ?? $article->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>

                            <wysiwyg class="mb-0"
                                     content="{{ old('body') ?? $article->translate('content', $lang)['body'] }}"
                                     name="{{$lang}}[content][body]"
                                     label="Body"></wysiwyg>
                        </fieldset>

                    @endforeach
                </block-editor>

                {{--<select class="form-control position-relative mt-3" name="category_id" id="category_id" required>--}}
                    {{--<option value="" disabled selected style='display:none;'>Select category</option>--}}
                    {{--@foreach($categories as $category)--}}
                        {{--<option value="{{ $category->id }}"{{ $category->id === $article->category->id ? ' selected' : '' }}>--}}
                            {{--{{ $category->title }}--}}
                        {{--</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                <hr class="my-5">
                @includeIf('partials.admin.meta', ['meta' => $article->meta()->first()])
            </div>
            <div class="col-md-4">
                <image-uploader ratio="67%" name="article" image-id="{{ optional($article->getFirstMedia('article'))->id }}"
                                src="{{ $article->getFirstMediaUrl('article') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection
