<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        if ($categories->isEmpty()){
            $data = [
                'message' => 'No hay registros de categorias',
                'data' => []
            ];
            return response()->json($data, 200);
        }

        $data = [
            'categories' => $categories
        ];

        return response()->json($data, 200);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        $data = [
            'category' => $category
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        $data = [
            'category' => $category
        ];
        return response()->json($data, 200);
    }

    public function update(CategoryRequest $request, $id)
    {   
        $category = Category::findOrFail($id);  

        $category->update($request->validated());

        $data = [
            'message' => 'Categoria actualizada',
            'category' => $category
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {   
        $category = Category::findOrFail($id);

        $deleted_data = $category;

        $category->delete();

        $data = [
            'message' => 'Categoria eliminada',
            'deleted_category' => $deleted_data
        ];
        return response()->json($data, 200);
    }
}
