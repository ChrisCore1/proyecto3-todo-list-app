@extends('layouts.navigation')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0">Editar Categoria</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="name_category" class="form-label">
                            <i class="bi bi-bookmark-star-fill"></i> Nombre de la Categoria
                        </label>
                        <input type="text" name="name_category" id="name_category" class="form-control" value="{{ old('name_category', $category->name_category) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
