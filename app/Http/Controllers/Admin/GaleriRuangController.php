<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GaleriRuang;
use App\Models\CategoryRoom;


class GaleriRuangController extends Controller
{
    public function index(){
        $ruang = GaleriRuang::all();
        return view('admin.ruang.index', compact('ruang'));
    }

    public function create(){
        $category = CategoryRoom::all();
        return view('admin.ruang.create', ['category' => $category]);
    }

    public function store(Request $request){
        $request->validate([
            'images' => 'required|image|mimes:jpg,jpeg,png',
            'room_id' => 'required',
        ]);

        $file = $request->file('images');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'aset/img';
        $file->move($tujuanFile, $namaFile);

        $newgaleris = new GaleriRuang();
        $newgaleris->images = $namaFile;     
        $newgaleris->room_id = $request->room_id;     
        $newgaleris->save(); 

        return redirect()->route('admin.ruang.index')->with('success', 'Galeri Ruang Baca berhasil di buat!');

    }
        public function edit($id)
    {
        $galeri = GaleriRuang::findOrFail($id);

        return view('admin.ruang.edit', compact('galeri'));
    }
        public function update(Request $request, $id)
    {
        $request->validate([
            'images' => 'image|mimes:jpg,jpeg,png',
        ]);

        $galeri = GaleriRuang::findOrFail($id);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';
            $file->move($tujuanFile, $namaFile);
            $galeri->images = $namaFile;
        }

        $galeri->save();

        return redirect()->route('admin.ruang.index')->with('success', 'Data berhasil diperbarui.');
    }

        public function destroy($id)
    {
        $galeri = GaleriRuang::findOrFail($id);

        $galeri->delete();

        return redirect()->route('admin.ruang.index')->with('success', 'Data berhasil dihapus.');
    }
}
