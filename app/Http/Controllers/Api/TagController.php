<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

        if($tags->isEmpty()){
            $data = [
                'message' => 'No hay registros de etiquetas',
                'data' => []
            ];
            return response()->json($data, 200);
        }

        $data = [
            'tags' => $tags,
        ];
        return response()->json($data, 200);
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        $data = [
            'tag' => $tag
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {   
        $tag = Tag::findOrFail($id);

        $data = [
            'tag' => $tag
        ];
        return response()->json($data, 200);
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->update($request->validated());

        $data = [
            'messsage' => 'Etiqueta actualizada',
            'tag' => $tag
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $deleted_data = $tag;

        $tag->delete();

        $data = [
            'message' => 'Etiqueta eliminada',
            'deleted_tag' => $deleted_data
        ];
        return response()->json($data, 200);
    }
}
