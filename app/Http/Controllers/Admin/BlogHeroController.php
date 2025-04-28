<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogHero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BlogHeroController extends Controller
{
    public function index()
    {
        $blogHeroes = BlogHero::all();
        return view('back.admin.blog-hero.index', compact('blogHeroes'));
    }

    public function create()
    {
        return view('back.admin.blog-hero.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'alt_az' => 'required|string|max:255',
                'alt_en' => 'nullable|string|max:255',
                'alt_ru' => 'nullable|string|max:255',
                'status' => 'boolean'
            ]);

            $data = $request->except('image');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('uploads/blog-hero');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_path'] = 'uploads/blog-hero/' . $imageName;
            }

            BlogHero::create($data);

            return redirect()->route('back.pages.blog-hero.index')->with('success', 'Blog hero başarıyla oluşturuldu!');
        } catch (\Exception $e) {
            Log::error('BlogHero oluşturma hatası: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $blogHero = BlogHero::findOrFail($id);
        return view('back.admin.blog-hero.edit', compact('blogHero'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'alt_az' => 'required|string|max:255',
                'alt_en' => 'nullable|string|max:255',
                'alt_ru' => 'nullable|string|max:255',
                'status' => 'boolean'
            ]);

            $blogHero = BlogHero::findOrFail($id);
            $data = $request->except('image');

            if ($request->hasFile('image')) {
                // Eski resmi sil
                if ($blogHero->image_path && File::exists(public_path($blogHero->image_path))) {
                    File::delete(public_path($blogHero->image_path));
                }
                
                // Yeni resmi yükle
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('uploads/blog-hero');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_path'] = 'uploads/blog-hero/' . $imageName;
            }

            $blogHero->update($data);

            return redirect()->route('back.pages.blog-hero.index')->with('success', 'Blog hero başarıyla güncellendi!');
        } catch (\Exception $e) {
            Log::error('BlogHero güncelleme hatası: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $blogHero = BlogHero::findOrFail($id);
            
            // Resmi sil
            if ($blogHero->image_path && File::exists(public_path($blogHero->image_path))) {
                File::delete(public_path($blogHero->image_path));
            }
            
            $blogHero->delete();
            
            return redirect()->route('back.pages.blog-hero.index')->with('success', 'Blog hero başarıyla silindi!');
        } catch (\Exception $e) {
            Log::error('BlogHero silme hatası: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        try {
            $blogHero = BlogHero::findOrFail($id);
            $blogHero->status = !$blogHero->status;
            $blogHero->save();
            
            return redirect()->back()->with('success', 'Durum başarıyla güncellendi!');
        } catch (\Exception $e) {
            Log::error('BlogHero durum değiştirme hatası: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
