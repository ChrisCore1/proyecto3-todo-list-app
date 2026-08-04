@extends('layouts.navigation')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 mt-4">
    <h2>Categorias</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Nueva Categoria
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre de la Categoria</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="align-middle fw-medium">{{ $category->name_category }}</td>
                            <td class="text-end align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pen-fill"></i> Editar</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Estas seguro de eliminar esta categoria?');" style="display:inline;">
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
                                No hay categorías registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
