<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Himamera;
use Illuminate\Http\Request;

class HimameraController extends Controller
{
    public function index()
        {
        $himamera = Himamera::all();
        return view('admin.himamera.index', ['himamera' => $himamera]);
        }

        public function create()
        {
        return view('admin.himamera.create');
        }

        public function store(Request $request)
        {
        $request->validate([
            'activity_name' => 'required|string',
            'content' => 'required|string',
            'images' => 'image|mimes:jpg,jpeg,png|max:5000'
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
    
        $newHimamera = new Himamera();
        $newHimamera->activity_name = $request->activity_name;
        $newHimamera->content = $request->content;
        $newHimamera->images = $namaFile;
    
        $newHimamera->save();
    
        return redirect()->route('admin.himamera.index')->with('success', 'Himamera berhasil dibuat!');
        }

        public function edit($id)
        {
        $himamera = Himamera::findOrFail($id);
        
        return view('admin.himamera.edit', compact('himamera'));
        }
    
        public function update(Request $request, $id)
        {
        $request->validate([
            'activity_name' => 'required|string',
            'content' => 'required|string',
            'images' => 'image|mimes:jpg,jpeg,png|max:5000'
        ]);
    
        $himamera = Himamera::findOrFail($id);
    
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';
    
            if (!$file->move($tujuanFile, $namaFile)) {
                return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah images.'])->withInput();
            }
            if ($himamera->images && file_exists($tujuanFile . '/' . $himamera->images)) {
                unlink($tujuanFile . '/' . $himamera->images);
            }
    
            $himamera->images = $namaFile;
        }
    
        $himamera->activity_name = $request->activity_name;
        $himamera->content = $request->content;
        $himamera->save();
    
        return redirect()->route('admin.himamera.index')->with('success', 'Himamera berhasil diperbarui!');
        }
        public function destroy($id)
        {
        $himamera = Himamera::findOrFail($id);
        $himamera->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
