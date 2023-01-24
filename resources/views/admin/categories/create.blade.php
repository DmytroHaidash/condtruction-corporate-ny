@extends('layouts.admin', ['app_title' => 'New category'])

@section('content')
    <section>
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новая статья">
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

                            </fieldset>

                        @endforeach
                    </block-editor>
                    <hr class="my-5">
                </div>
                <div class="col-md-4">
                    <image-uploader name="category" ratio="67%"></image-uploader>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>
    </section>



@endsection