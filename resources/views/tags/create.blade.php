@extends('layouts.navigation')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0">Crear Etiquetas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name_tag" class="form-label">
                            <i class="bi bi-tag-fill"></i> Nombre de la Etiqueta
                        </label>
                        <input type="text" name="name_tag" id="name_tag" class="form-control @error('name_tag') is-invalid @enderror" value="{{ old('name_tag') }}">
                        @error('name_tag') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
