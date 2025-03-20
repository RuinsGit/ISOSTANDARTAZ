<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeFollows = HomeFollow::orderBy('order')->get();
        $canCreate = $homeFollows->count() < 3;
        return view('back.admin.home-follows.index', compact('homeFollows', 'canCreate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $count = HomeFollow::count();
        
        if ($count >= 3) {
            return redirect()->route('back.pages.home-follows.index')
                ->with('error', 'Yalnız bir sosial hesab bloğu əlavə edilə bilər. Mövcud bir blok var.');
        }
        
        return view('back.admin.home-follows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = HomeFollow::count();
        
        if ($count >= 3) {
            return redirect()->route('back.pages.home-follows.index')
                ->with('error', 'Yalnız bir sosial hesab bloğu əlavə edilə bilər. Mövcud bir blok var.');
        }
        
        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'name_az' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        // Resim yükleme
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home-follows'), $imageName);
            $data['image'] = 'uploads/home-follows/' . $imageName;
        }

        HomeFollow::create($data);

        return redirect()->route('back.pages.home-follows.index')->with('success', 'Sosial hesab uğurla əlavə edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $homeFollow = HomeFollow::findOrFail($id);
        return view('back.admin.home-follows.edit', compact('homeFollow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_az' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ru' => 'nullable|string|max:255',
            'name_az' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $homeFollow = HomeFollow::findOrFail($id);
        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        // Resim yükleme
        if ($request->hasFile('image')) {
            // Eski resmi varsa sil
            if ($homeFollow->image && File::exists(public_path($homeFollow->image))) {
                File::delete(public_path($homeFollow->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home-follows'), $imageName);
            $data['image'] = 'uploads/home-follows/' . $imageName;
        }

        $homeFollow->update($data);

        return redirect()->route('back.pages.home-follows.index')->with('success', 'Sosial hesab uğurla yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $homeFollow = HomeFollow::findOrFail($id);
        
        // Resim varsa sil
        if ($homeFollow->image && File::exists(public_path($homeFollow->image))) {
            File::delete(public_path($homeFollow->image));
        }
        
        $homeFollow->delete();

        return redirect()->route('back.pages.home-follows.index')->with('success', 'Sosial hesab uğurla silindi.');
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(string $id)
    {
        $homeFollow = HomeFollow::findOrFail($id);
        $homeFollow->status = !$homeFollow->status;
        $homeFollow->save();

        return redirect()->route('back.pages.home-follows.index')->with('success', 'Sosial hesab statusu uğurla dəyişdirildi.');
    }
}
