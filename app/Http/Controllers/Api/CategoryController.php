<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()){
            $data = [
                'message' => 'No hay registros de categorias',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'categories' => $categories,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        $data = [
            'message' => 'Categoria creada',
            'category' => $category,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category){
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'category' => $category,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(CategoryRequest $request, $id)
    {   
        $category = Category::find($id);  
        
        if (!$category){
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $category->update($request->validated());

        $data = [
            'message' => 'Categoria actualizada',
            'category' => $category,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {   
        $category = Category::find($id);

        if(!$category){
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $category->delete();

        $data = [
            'message' => 'Categoria eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
