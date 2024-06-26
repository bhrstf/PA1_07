<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;
use Illuminate\Http\Request;


class KerjaSamaController extends Controller
{
    public function index()
    {
    $kerjasama = KerjaSama::all();
    return view('admin.kerjasama.index', ['kerjasama' => $kerjasama]);
    }

    public function create()
    {
    return view('admin.kerjasama.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name_of_agency' => 'required|string',
        'description' => 'required|string',
        'logo' => 'image|mimes:jpg,jpeg,png|max:5000'
    ]);

    $namaFile = null;
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'aset/img';

        if (!$file->move($tujuanFile, $namaFile)) {
            return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah logo.'])->withInput();
        }
    }

    $newKerjasama = new KerjaSama();
    $newKerjasama->name_of_agency = $request->name_of_agency;
    $newKerjasama->description = $request->description;
    $newKerjasama->logo = $namaFile;

    $newKerjasama->save();

    return redirect()->route('admin.kerjasama.index')->with('success', 'kerjasama berhasil dibuat!');
    }

    public function edit($id)
    {
    $kerjasama = KerjaSama::findOrFail($id);
    
    return view('admin.kerjasama.edit', compact('kerjasama'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'name_of_agency' => 'required|string',
        'description' => 'required|string',
        'logo' => 'image|mimes:jpg,jpeg,png|max:5000'
    ]);

    $kerjasama = KerjaSama::findOrFail($id);

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'aset/img';

        if (!$file->move($tujuanFile, $namaFile)) {
            return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah logo.'])->withInput();
        }
        if ($kerjasama->logo && file_exists($tujuanFile . '/' . $kerjasama->logo)) {
            unlink($tujuanFile . '/' . $kerjasama->logo);
        }

        $kerjasama->logo = $namaFile;
    }

    $kerjasama->name_of_agency = $request->name_of_agency;
    $kerjasama->description = $request->description;
    $kerjasama->save();

    return redirect()->route('admin.kerjasama.index')->with('success', 'kerjasama berhasil diperbarui!');
    }
    public function destroy($id)
    {
    $kerjasama = KerjaSama::findOrFail($id);
    $kerjasama->delete();

    return redirect()->back()->with([
        'message' => 'Success Delete!',
        'alert-type' => 'danger'
    ]);
}

}
