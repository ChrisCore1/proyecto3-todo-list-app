<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        if($tags->isEmpty()){
            $data = [
                'message' => 'No hay registros de etiquetas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'tags' => $tags,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        $data = [
            'message' => 'Etiqueta creada',
            'tag' => $tag,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {   
        $tag = Tag::find($id);

        if(!$tag){
            $data = [
                'message' => 'Etiqueta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'tag' => $tag,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::find($id);

        if(!$tag){
            $data = [
                'message' => 'Etiqueta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $tag->update($request->validated());

        $data = [
            'messsage' => 'Etiqueta actualizada',
            'tag' => $tag,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if(!$tag){
            $data = [
                'message' => 'Etiqueta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $tag->delete();

        $data = [
            'message' => 'Etiqueta eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
