@extends('layouts.navigation')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Tareas</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear nueva Tarea</a>
</div>

<div class="list-group">
    @forelse($tasks as $task)
        <div class="list-group-item d-flex align-items-center justify-content-between">
            <div class="me-3">
                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $task->title }}">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" class="form-check-input" style="transform: scale(1.5);"
                        onchange="this.form.submit()" {{ $task->status ? 'checked' : '' }}>
                </form>
            </div>

            <div class="flex-grow-1 overflow-hidden me-3" style="min-width: 0;">
                <div class="d-flex align-items-baseline">
                    <h5 class="mb-0 text-truncate me-2 {{ $task->status ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $task->title }}
                    </h5>
                    @if($task->category)
                        <span class="badge bg-info text-dark rounded-pill">{{ $task->category->name_category }}</span>
                    @endif
                </div>
                <p class="mb-0 text-muted text-truncate">
                    {{ $task->description ?: 'Sin descripción' }}
                </p>
                <div>
                    @foreach($task->tags as $tag)
                        <span class="badge bg-secondary" style="font-size: 0.7em;">#{{ $tag->name_tag }}</span>
                    @endforeach
                </div>
            </div>

            <div class="btn-group flex-shrink-0">
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill"></i> Ver</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pen-fill"></i> Editar</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Estas seguro de eliminar esta tarea?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3-fill"></i> Eliminar</button>
                </form>
            </div>

        </div>
    @empty
        <div class="alert alert-light text-center">No hay tareas registradas</div>
    @endforelse
</div>

@endsection