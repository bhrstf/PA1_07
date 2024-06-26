<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class StafController extends Controller
{
    public function index()
    {
        $staf = Staf::all();
        return view('admin.staf.index', compact('staf'));
    }

    public function create()
    {
        return view('admin.staf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string',
            'education' => 'required|string',
            'riset'=> 'nullable|string',
            'courses'=> 'nullable|string',
            'room'=>'nullable|string'
        ]);

        $namaFile = $request->file('images')->getClientOriginalName();
        $tujuanFile = 'aset/img'; 
        $request->file('images')->move($tujuanFile, $namaFile);

        $newStaf = new Staf;
        $newStaf->name = $request->name;
        $newStaf->education = $request->education;
        $newStaf->riset = $request->riset;
        $newStaf->courses = $request->courses;
        $newStaf->room = $request->room;
        $newStaf->images = $namaFile; 
        $newStaf->save();

        return redirect()->route('admin.Staf.index')->with('status', 'Staf dan Staff berhasil ditambahkan');
    }

    public function edit($id)
    {
        $staf = Staf::findOrFail($id);
        return view('admin.staf.edit', compact('staf'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'education' => 'required|string',
            'riset'=> 'nullable|string',
            'courses'=> 'nullable|string',
            'room'=>'nullable|string',
            'images' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $staf = Staf::findOrFail($id);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';

            if (!$file->move($tujuanFile, $namaFile)) {
                return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah gambar.'])->withInput();
            }
            if ($staf->images && file_exists($tujuanFile . '/' . $staf->images)) {
                unlink($tujuanFile . '/' . $staf->images);
            }
    
            $staf->images = $namaFile;
        }

        $staf->name = $request->name;
        $staf->education = $request->education;
        $staf->riset = $request->riset;
        $staf->courses = $request->courses;
        $staf->room = $request->room;
        $staf->save();

        return redirect()->route('admin.staf.index')->with('success', 'staf berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
