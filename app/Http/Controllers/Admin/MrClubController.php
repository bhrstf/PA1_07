<?php

namespace App\Http\Controllers\Admin;

use App\Models\MrClub;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MrClubController extends Controller
{
    public function index()
        {
        $mrclub = MrClub::all();
        return view('admin.mrclub.index', ['mrclub' => $mrclub]);
        }

        public function create()
        {
        return view('admin.mrclub.create');
        }

        public function store(Request $request)
        {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|mimes:jpg,jpeg,png|'
        ]);
    
        $namaFile = null;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';
    
            if (!$file->move($tujuanFile, $namaFile)) {
                return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah images.'])->withInput();
            }
        }
    
        $newmrclub = new MrClub();
        $newmrclub->name = $request->name;
        $newmrclub->description = $request->description;
        $newmrclub->images = $namaFile;
    
        $newmrclub->save();
    
        return redirect()->route('admin.mrclub.index')->with('success', 'mrclub berhasil dibuat!');
        }

        public function edit($id)
        {
        $mrclub = MrClub::findOrFail($id);
        
        return view('admin.mrclub.edit', compact('mrclub'));
        }
    
        public function update(Request $request, $id)
        {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|mimes:jpg,jpeg,png'
        ]);
    
        $mrclub = MrClub::findOrFail($id);
    
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';
    
            if (!$file->move($tujuanFile, $namaFile)) {
                return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah images.'])->withInput();
            }
            if ($mrclub->images && file_exists($tujuanFile . '/' . $mrclub->images)) {
                unlink($tujuanFile . '/' . $mrclub->images);
            }
    
            $mrclub->images = $namaFile;
        }
    
        $mrclub->name = $request->name;
        $mrclub->description = $request->description;
        $mrclub->save();
    
        return redirect()->route('admin.mrclub.index')->with('success', 'mrclub berhasil diperbarui!');
        }
        public function destroy($id)
        {
        $mrclub = MrClub::findOrFail($id);
        $mrclub->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
