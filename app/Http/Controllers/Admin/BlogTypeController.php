<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogType;
use Illuminate\Http\Request;

class BlogTypeController extends Controller
{
    public function index()
    {
        $blogTypes = BlogType::all();
        return view('back.pages.blog_type.index', compact('blogTypes'));
    }

    public function create()
    {
        return view('back.pages.blog_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        BlogType::create($request->all());

        return redirect()->route('back.pages.blog_types.index')->with('success', __('Blog türü başarıyla oluşturuldu.'));
    }

    public function edit(BlogType $blogType)
    {
        return view('back.pages.blog_type.edit', compact('blogType'));
    }

    public function update(Request $request, BlogType $blogType)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $blogType->update($request->all());

        return redirect()->route('back.pages.blog_types.index')->with('success', __('Blog türü başarıyla güncellendi.'));
    }

    public function destroy(BlogType $blogType)
    {
        $blogType->delete();
        return redirect()->route('back.pages.blog_types.index')->with('success', __('Blog türü başarıyla silindi.'));
    }
} 