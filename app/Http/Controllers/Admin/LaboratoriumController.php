<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratorium;
use Illuminate\Http\Request;



class LaboratoriumController extends Controller
{
    public function index()
    {
    $laboratorium = Laboratorium::all();
    return view('admin.laboratorium.index', ['laboratorium' => $laboratorium]);
    }

    public function create()
    {
    return view('admin.laboratorium.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'lab_name' => 'required|string',
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

    $newlaboratorium = new Laboratorium();
    $newlaboratorium->lab_name = $request->lab_name;
    $newlaboratorium->content = $request->content;
    $newlaboratorium->images = $namaFile;

    $newlaboratorium->save();

    return redirect()->route('admin.laboratorium.index')->with('success', 'laboratorium berhasil dibuat!');
    }

    public function edit($id)
    {
    $laboratorium = Laboratorium::findOrFail($id);
    
    return view('admin.laboratorium.edit', compact('laboratorium'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'lab_name' => 'required|string',
        'content' => 'required|string',
        'images' => 'image|mimes:jpg,jpeg,png|max:5000'
    ]);

    $laboratorium = Laboratorium::findOrFail($id);

    if ($request->hasFile('images')) {
        $file = $request->file('images');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'aset/img';

        if (!$file->move($tujuanFile, $namaFile)) {
            return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah images.'])->withInput();
        }
        if ($laboratorium->images && file_exists($tujuanFile . '/' . $laboratorium->images)) {
            unlink($tujuanFile . '/' . $laboratorium->images);
        }

        $laboratorium->images = $namaFile;
    }

    $laboratorium->lab_name = $request->lab_name;
    $laboratorium->content = $request->content;
    $laboratorium->save();

    return redirect()->route('admin.laboratorium.index')->with('success', 'laboratorium berhasil diperbarui!');
    }
    public function destroy($id)
    {
    $laboratorium = Laboratorium::findOrFail($id);
    $laboratorium->delete();

    return redirect()->back()->with([
        'message' => 'Success Delete!',
        'alert-type' => 'danger'
    ]);
}

}
