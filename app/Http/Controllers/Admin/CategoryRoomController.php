<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\GaleriRuang;
use Illuminate\Http\Request;

class CategoryRoomController extends Controller
{
    public function index()
    {
        $category = CategoryRoom::all();
        return view('admin.category.index', ['category' => $category]);
    }

    public function create()
    {
        $category = CategoryRoom::all();
        return view('admin.category.create', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $newCategory = new CategoryRoom();
        $newCategory->category = $request->category;
        $newCategory->description = $request->description;
        $newCategory->save();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dibuat!');
    }

    public function show($id)
    {
        $category = CategoryRoom::find($id);
        $galery = GaleriRuang::where('room_id', $id)->get();
        return view('admin.category.view', compact('category', 'galery'));
    }
    public function edit($id)
    {
        $category = CategoryRoom::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $category = CategoryRoom::findOrFail($id);
        $category->category = $request->category;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data terkait di tabel 'galery_room' terlebih dahulu
        GaleriRuang::where('room_id', $id)->delete();
    
        // Kemudian hapus data dari 'category_room'
        $category = CategoryRoom::findOrFail($id);
        $category->delete();
        
        return redirect()->route('admin.category.index')->with('success', 'Data berhasil dihapus.');
    }
    
}
