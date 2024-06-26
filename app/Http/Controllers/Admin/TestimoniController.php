<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'jobdescription' => 'required|string',
            'images' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            'created_by' => 'required|string',
        ]);

        try {
            $imageName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $request->file('images')->move(public_path('aset/img'), $imageName);

            $newTestimoni = new Testimoni();
            $newTestimoni->name = $request->name;
            $newTestimoni->content = $request->content;
            $newTestimoni->jobdescription = $request->jobdescription;
            $newTestimoni->created_by = $request->created_by;
            $newTestimoni->updated_by = 'some_default_value'; 
            $newTestimoni->images = $imageName;

            $newTestimoni->save();

            return redirect()->route('admin.testimoni.index')->with('status', 'Testimoni berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }    
    public function edit($id)
    {
        try {
            $testimoni = Testimoni::findOrFail($id);
            return view('admin.testimoni.edit', compact('testimoni'));
        } catch (\Exception $e) {
            return redirect()->route('admin.testimoni.index')->with('error', 'Testimoni tidak ditemukan');
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'jobdescription' => 'required|string',
            'images' => 'image|mimes:jpg,jpeg,png|max:5000',
            'created_by' => 'required|string',
        ]);
    
        try {
            $testimoni = Testimoni::findOrFail($id);
    
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $namaFile = $images->getClientOriginalName();
                $tujuanFile = 'aset/img';
                $images->move($tujuanFile, $namaFile);
                $testimoni->images = $namaFile;
            }
    
            $testimoni->name = $request->name;
            $testimoni->content = $request->content;
            $testimoni->jobdescription = $request->jobdescription;
            $testimoni->created_by = $request->created_by;
    
            $testimoni->save();
    
            return redirect()->route('admin.testimoni.index')->with('status', 'Testimoni berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function destroy($id)
    {
            $testimoni = Testimoni::findOrFail($id);
            $testimoni->delete();

            return redirect()->route('admin.testimoni.index')->with('status', 'Testimoni berhasil dihapus');

    }
}
