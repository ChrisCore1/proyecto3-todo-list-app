@extends('layouts.navigation')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Etiquetas</h2>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">
        Nueva Etiqueta
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre de la Etiqueta</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                        <tr>
                            <td class="align-middle fw-medium">
                                <span class="badge bg-secondary fs-6"><i class="bi bi-tags-fill"></i> {{ $tag->name_tag }}</span>
                            </td>
                            <td class="text-end align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('tags.show', $tag) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pen-fill"></i> Editar</a>
                                    <form action="{{ route('tags.destroy', $tag) }}" method="POST" onsubmit="return confirm('Estas seguro de eliminar esta etiqueta?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3-fill"></i> Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                No hay etiquetas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
