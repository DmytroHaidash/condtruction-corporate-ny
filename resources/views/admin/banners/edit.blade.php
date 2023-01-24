@extends('layouts.admin', ['app_title' => $banner->title])

@section('content')
    <form action="{{ route('admin.banners.update', $banner) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <h2> Banner </h2>
                <h3> for page </h3>
                <br>
                <h4> {{ $banner->title }} </h4>
            </div>
            <div class="col-md-4">
                <image-uploader name="banner" image-id="{{ optional($banner->getFirstMedia('banner'))->id }}"
                                src="{{ $banner->getFirstMediaUrl('banner') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection