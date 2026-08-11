@extends('layouts.navigation')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0"><i class="bi bi-clipboard2-fill"></i> Crear Tareas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="bi bi-asterisk"></i> Titulo
                        </label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <i class="bi bi-card-text"></i> Descripcion
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">
                            <i class="bi bi-bookmark-star-fill"></i> Seleccione una categoria
                        </label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">
                                Ninguna
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-tags-fill"></i> Seleccione las etiquetas
                        </label>
                        <div class="border rounded p-3 bg-white shadow-sm @error('tags.*') border-danger @enderror" style="max-height: 150px; overflow-y: auto;">
                            @forelse ($tags as $tag)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->tag_id }}" id="tag_{{ $tag->tag_id }}" {{ is_array(old('tags')) && in_array($tag->tag_id, old('tags')) ? 'checked' : '' }} style="cursor: pointer;">
                                    <label class="form-check-label user-select-none" for="tag_{{ $tag->tag_id }}">
                                        {{ $tag->name_tag }}
                                    </label>
                                </div>
                                
                            @empty
                                <div class="text-muted small">
                                    Etiquetas no disponibles
                                </div>
                            @endforelse

                        </div>
                        @error('tags.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
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
