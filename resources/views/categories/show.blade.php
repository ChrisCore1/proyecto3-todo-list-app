@extends('layouts.navigation')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detalle de Categoria</h4>
                <span class="badge bg-secondary">ID: {{ $category->category_id }}</span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted">Nombre</h5>
                    <p class="fs-4 fw-medium"><i class="bi bi-bookmark-star-fill"></i> {{ $category->name_category }}</p>
                </div>

            </div>
            <div class="card-footer bg-light d-flex justify-content-between">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Volver
                </a>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
