@extends('layouts.navigation')

@section('content')
<div class="card shadow-sm mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0 {{ $task->status ? 'text-decoration-line-through text-muted' : '' }}">
            <i class="bi bi-clipboard2-fill"></i> {{ $task->title }}
        </h3>
        <span class="badge {{ $task->status ? 'bg-success' : 'bg-warning text-dark' }}">
            {{ $task->status ? 'Completada' : 'Pendiente' }}
        </span>
    </div>

    <div class="card-body">
        <h6 class="text-muted mb-4">
            Categoria <span class="fw-bold"><i class="bi bi-bookmark-star-fill"></i> {{ $task->category ? $task->category->name_category : 'Sin categoria asignada'}}</span>
        </h6>

        <h5>Descripcion:</h5>
        <p class="card-text border p-3 bg-light rounded">
            {!! $task->description ? nl2br(e($task->description)) : '<em>Sin descripcion asignada</em>' !!}
        </p>

        <h5>Etiquetas:</h5>
        <div class="mb-4">
            @forelse ($task->tags as $tag)
                <span class="badge bg-secondary fs-6 me-1">
                    <i class="bi bi-tags-fill"></i> {{ $tag->name_tag }}
                </span>
            @empty
                <span class="text-muted">
                    Sin etiquetas asignadas
                </span>
            @endforelse
        </div>
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Regresar</a>
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Editar</a>
    </div>
</div>
@endsection
