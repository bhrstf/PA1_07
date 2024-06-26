<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        $kurikulum = Kurikulum::all();
        return view('admin.kurikulum.index', ['kurikulum' => $kurikulum]);
    }

    public function create()
    {
        return view('admin.kurikulum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|string',
            'kode_mk' => 'required|string', 
            'subject' => 'required|string', 
            'sks' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);
    
        $kurikulum = new Kurikulum([
            'semester' => $request->get('semester'),
            'kode_mk' => $request->get('kode_mk'), 
            'subject' => $request->get('subject'),
            'sks' => $request->get('sks'),
            'status' => $request->get('status') 
        ]);
    
        $kurikulum->save();
        return redirect()->route('admin.kurikulum.index')->with('success', 'Kurikulum berhasil dibuat!');
    }
    
    public function edit($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        
        return view('admin.kurikulum.edit', compact('kurikulum'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|string',
            'kode_mk' => 'required|string',
            'subject' => 'required|string',
            'sks' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);
    
        $kurikulum = Kurikulum::findOrFail($id);
        
        $kurikulum->semester = $request->input('semester');
        $kurikulum->kode_mk = $request->input('kode_mk');
        $kurikulum->subject = $request->input('subject');
        $kurikulum->sks = $request->input('sks');
        $kurikulum->status =$request->input('status');

        $kurikulum->save();

        return redirect()->route('admin.kurikulum.index')->with('success', 'Kurikulum berhasil diperbarui!');
    }
    
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
