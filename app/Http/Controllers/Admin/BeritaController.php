<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.berita.index', ['berita' => $berita]);
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'images' => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'description' => 'required',
            'date' => 'required|date',
            'created_by'=>'required|string'
        ]);

        $namaFile = $request->file('images')->getClientOriginalName();
        $tujuanFile = 'aset/img';
        $request->file('images')->move($tujuanFile, $namaFile);

        $newBerita = new Berita;
        $newBerita->title = $request->title;
        $newBerita->images = $namaFile;
        $newBerita->description = $request->description;
        $newBerita->date = $request->date;
        $newBerita->created_by = $request->created_by;
        $newBerita->updated_by = 'some_default_value';

        $newBerita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
   }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'images' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'description' => 'required',
            'date' => 'required|date',
            'created_by' => 'required|string' 
        ]);
    
        $berita = Berita::findOrFail($id);
    
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $namaFile = $images->getClientOriginalName();
            $tujuanFile = 'aset/img';
            $images->move($tujuanFile, $namaFile);
            $berita->images = $namaFile;
        }
    
        $berita->title = $request->title;
        $berita->description = $request->description;
        $berita->date = $request->date;
        $berita->created_by = $request->created_by;
    
        $berita->save();
    
        return redirect()->route('admin.berita.index')->with('status', 'Berita berhasil diubah');
    }            
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('status', 'Berita berhasil dihapus');
    }
}
