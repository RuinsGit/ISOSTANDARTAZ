<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

       
        if ($request->filled('search')) {
            $query->where('title_az', 'like', '%' . $request->search . '%');
        }

        
        if ($request->filled('blog_type_id')) {
            $query->where('blog_type_id', $request->blog_type_id);
        }

        
        if ($request->filled('is_popular')) {
            $query->where('is_popular', $request->is_popular);
        }

        $blogs = $query->latest()->paginate(10);
        $popularBlogs = Blog::where('is_popular', 1)->get();
        $blogTypes = BlogType::all(); 

        return view('back.pages.blog.index', compact('blogs', 'popularBlogs', 'blogTypes'));
    }

    public function create()
    {
        $blogTypes = BlogType::all();
        return view('back.pages.blog.create', compact('blogTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_az' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'text_az' => 'required',
            'text_en' => 'required',
            'text_ru' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'blog_type_id' => 'required|exists:blog_types,id'
        ]);

        $data = $request->all();

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('uploads/blogs');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_' . $originalFileName . '.webp';

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                imagewebp($imageResource, $webpPath, 80);
                imagedestroy($imageResource);
                $data['image'] = 'uploads/blogs/' . $webpFileName;
            }
        }

       
        if ($request->hasFile('bottom_image')) {
            $file = $request->file('bottom_image');
            $destinationPath = public_path('uploads/blogs');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_bottom_' . $originalFileName . '.webp';

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                imagewebp($imageResource, $webpPath, 80);
                imagedestroy($imageResource);
                $data['bottom_image'] = 'uploads/blogs/' . $webpFileName;
            }
        }

        Blog::create($data);

        return redirect()->route('back.pages.blogs.index')
            ->with('success', 'Blog başarıyla eklendi.');
    }

    public function edit(Blog $blog)
    {
        $blogTypes = BlogType::all();
        return view('back.pages.blog.edit', compact('blog', 'blogTypes'));
    }

    public function update(Request $request, Blog $blog)
    {
       

        $request->validate([
            'title_az' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'text_az' => 'nullable',
            'text_en' => 'required',
            'text_ru' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bottom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_popular' => 'required|boolean'
        ]);

        $data = $request->all();

       
        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }

            $file = $request->file('image');
            $destinationPath = public_path('uploads/blogs');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_' . $originalFileName . '.webp';

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                imagewebp($imageResource, $webpPath, 80);
                imagedestroy($imageResource);
                $data['image'] = 'uploads/blogs/' . $webpFileName;
            }
        }

        
        if ($request->hasFile('bottom_image')) {
            if ($blog->bottom_image && File::exists(public_path($blog->bottom_image))) {
                File::delete(public_path($blog->bottom_image));
            }

            $file = $request->file('bottom_image');
            $destinationPath = public_path('uploads/blogs');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $webpFileName = time() . '_bottom_' . $originalFileName . '.webp';

            $imageResource = imagecreatefromstring(file_get_contents($file));
            $webpPath = $destinationPath . '/' . $webpFileName;

            if ($imageResource) {
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                imagewebp($imageResource, $webpPath, 80);
                imagedestroy($imageResource);
                $data['bottom_image'] = 'uploads/blogs/' . $webpFileName;
            }
        }

        
        $blog->update($data);
        
        
        $updatedBlog = Blog::find($blog->id);
       

        return redirect()->route('back.pages.blogs.index')
            ->with('success', 'Blog başarıyla güncellendi.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }
        if ($blog->bottom_image && File::exists(public_path($blog->bottom_image))) {
            File::delete(public_path($blog->bottom_image));
        }

        $blog->delete();

        return redirect()->route('back.pages.blogs.index')
            ->with('success', 'Blog başarıyla silindi.');
    }

    public function toggleStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();

        return redirect()->route('back.pages.blogs.index')->with('success', __('Blog durumu başarıyla güncellendi.'));
    }
}
