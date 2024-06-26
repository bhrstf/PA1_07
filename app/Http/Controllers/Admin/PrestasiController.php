<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;


class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'time_event' => 'required|string',
            'description' => 'required|string',
            'achievement_level' => 'required|in:Lokal,Wilayah,Nasional,Internasional' 
        ]);

        // Create a new Prestasi instance
        $prestasi = new Prestasi([
            'name' => $request->get('name'),
            'time_event' => $request->get('time_event'), // Ensure 'time_event' is provided in the request
            'description' => $request->get('description'),
            'achievement_level' => $request->get('achievement_level')
        ]);
    
        // Save the Prestasi instance
        $prestasi->save();
    
        // Redirect back to the index page with a success message
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dibuat!');
    }
        public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        
        return view('admin.prestasi.edit', compact('prestasi'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'time_event' => 'required|string',
            'description' => 'required|string',
            'achievement_level' => 'required|in:Lokal,Wilayah,Nasional,Internasional' 
        ]);
    
        $prestasi = Prestasi::findOrFail($id);
        
        $prestasi->name = $request->input('name');
        $prestasi->time_event = $request->input('time_event');
        $prestasi->description = $request->input('description');
        $prestasi->achievement_level = $request->input('achievement_level');

        $prestasi->save();

        return redirect()->route('admin.prestasi.index')->with('success', 'prestasi berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);

        if ($prestasi) {
            $prestasi->delete();
            
            return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
        } else {
            return redirect()->route('admin.prestasi.index')->with('error', 'Prestasi tidak ditemukan.');
        }
}
}