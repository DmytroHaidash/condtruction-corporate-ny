@extends('layouts.admin', ['app_title' => 'Banners'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Banners</h1>
    </div>
    @forelse($banners as $banner)
        <article class="item">
            <div class="item-id">{{ $banner->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($banner->hasMedia('banner'))
                        <img src="{{ $banner->getFirstMediaUrl('banner', 'thumb') }}" class="rounded-circle"
                             alt="{{ $banner->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $banner->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="underline">
                            {{ $banner->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Created {{ $banner->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.banners.edit', $banner) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Banners not created yet!
    @endforelse
@endsection

