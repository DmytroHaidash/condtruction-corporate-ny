@extends('layouts.admin', ['app_title' => 'Страницы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Страницы</h1>
    </div>
    @forelse($pages as $page)
        <article class="item">
            <div class="item-id">{{ $page->id }}</div>

            <div class="item-body">
                <div class="col">

                    <h3>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="underline">
                            <p>{{ $page->slug }}</p>
                            {{ $page->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $page->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.pages.edit', $page) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Страниц пока нет!
    @endforelse

@endsection

