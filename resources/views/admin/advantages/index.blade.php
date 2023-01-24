@extends('layouts.admin', ['app_title' => 'Преимущества'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Преимущества</h1>
        <div class="ml-3">
            <a href="{{ route('admin.advantages.create') }}" class="btn btn-primary">
                Создать преимущество
            </a>
        </div>
    </div>
    @forelse($advantages as $advantage)
        <article class="item">
            <div class="item-id">{{ $advantage->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($advantage->hasMedia('advantage'))
                        <img src="{{ $advantage->getFirstMediaUrl('advantage', 'thumb') }}" class="rounded-circle"
                             alt="{{ $advantage->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $advantage->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.advantages.edit', $advantage) }}" class="underline">
                            {{ $advantage->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $advantage->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.advantages.edit', $advantage) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.advantages.destroy', $advantage) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $advantage->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.advantages.destroy', $advantage) }}"
                          id="delete-form-{{ $advantage->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Статьи пока не созданы!
    @endforelse
    {{ $advantages->links() }}
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
