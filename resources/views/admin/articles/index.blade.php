@extends('layouts.admin', ['app_title' => 'Статьи'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Статьи</h1>
        <div class="ml-3">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                Создать новую статью
            </a>
        </div>
    </div>
    @forelse($articles as $article)
        <article class="item">
            <div class="item-id">{{ $article->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($article->hasMedia('article'))
                        <img src="{{ $article->getFirstMediaUrl('article', 'thumb') }}" class="rounded-circle"
                             alt="{{ $article->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $article->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="underline">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $article->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.articles.edit', $article) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.articles.destroy', $article) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $article->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.articles.destroy', $article) }}"
                          id="delete-form-{{ $article->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Статьи пока не созданы!
    @endforelse
    {{ $articles->links() }}
@endsection

@push('scripts')
    <script>
      function confirmDelete(id) {
        event.preventDefault();
        const agree = confirm('Уверены?');
        if (agree) {
          document.getElementById('delete-form-' + id).submit();
        }
      }
    </script>
@endpush
