<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string',
            'employee_no' => 'required|string',
            'education' => 'required|string',
            'role' => 'required|in:dosen,staff',
            'riset'=> 'required|string',
            'courses'=> 'required|string',
            'room'=>'required|string'
        ]);

        $namaFile = $request->file('images')->getClientOriginalName();
        $tujuanFile = 'aset/img'; 
        $request->file('images')->move($tujuanFile, $namaFile);

        $newDosen = new Dosen;
        $newDosen->name = $request->name;
        $newDosen->education = $request->education;
        $newDosen->employee_no = $request->employee_no;
        $newDosen->role = $request->role;
        $newDosen->riset = $request->riset;
        $newDosen->courses = $request->courses;
        $newDosen->room = $request->room;
        $newDosen->images = $namaFile; 
        $newDosen->save();

        return redirect()->route('admin.dosen.index')->with('status', 'Dosen dan Staff berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'education' => 'required|string',
            'role' => 'required|string|in:dosen,staff',
            'employee_no' => 'required|string',
            'riset'=> 'required|string',
            'courses'=> 'required|string',
            'room'=>'required|string',
            'images' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        $dosen = Dosen::findOrFail($id);
    
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'aset/img';
    
            if (!$file->move($tujuanFile, $namaFile)) {
                return redirect()->back()->withErrors(['upload' => 'Gagal mengunggah gambar.'])->withInput();
            }
            if ($dosen->images && file_exists($tujuanFile . '/' . $dosen->images)) {
                unlink($tujuanFile . '/' . $dosen->images);
            }
    
            $dosen->images = $namaFile;
        }
    
        $dosen->name = $request->name;
        $dosen->education = $request->education;
        $dosen->role = $request->role;
        $dosen->employee_no = $request->employee_no;
        $dosen->riset = $request->riset;
        $dosen->courses = $request->courses;
        $dosen->room = $request->room;
        $dosen->save();
    
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
