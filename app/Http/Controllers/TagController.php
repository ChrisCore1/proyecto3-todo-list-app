<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('tasks')->orderBy('name_tag')->get();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Etiqueta creada');
    }

    public function show(Tag $tag)
    {
        $tag->load('tasks');

        return view('tags.show', compact('tag'));
    }
    
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('success', 'Etiqueta actualizada');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Etiqueta eliminada');
    }
}
