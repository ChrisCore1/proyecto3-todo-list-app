@extends('layouts.navigation')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detalle de la Etiqueta</h4>
                <span class="badge bg-secondary">ID: {{ $tag->tag_id }}</span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted">Nombre </h5>
                    <p class="fs-4 fw-medium">
                        <span class="badge bg-secondary"><i class="bi bi-tags-fill"></i> {{ $tag->name_tag }}</span>
                    </p>
                </div>
            </div>
            <div class="card-footer bg-light d-flex justify-content-between">
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                    Volver
                </a>
                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
