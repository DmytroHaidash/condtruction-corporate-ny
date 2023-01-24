@extends('layouts.admin', ['app_title' => 'Записи на курсы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Обратная связь</h1>
    </div>
    @forelse($feedbacks as $feedback)
        <article class="item">
            <div class="item-id">{{ $feedback->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.feedback.edit', $feedback) }}" class="underline">
                            {{ $feedback->name  }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $feedback->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.feedback.edit', $feedback) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.feedback.destroy', $feedback) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $feedback->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.feedback.destroy', $feedback) }}"
                          id="delete-form-{{ $feedback->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Откликов пока нет!
    @endforelse
    {{ $feedbacks->links() }}
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