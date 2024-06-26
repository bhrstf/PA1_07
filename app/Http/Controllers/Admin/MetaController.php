<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaController extends Controller
{
    public function index()
    {
        $meta = Meta::all();
        return view('admin.meta.index', compact('meta'));
    }

    public function create()
    {
        return view('admin.meta.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meta_key' => 'required|string|unique:metas,meta_key',
            'meta_description' => 'required|string',
            'meta_title' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();
    
        try {
            $validatedData['meta_key'] = Str::slug($validatedData['meta_key']);
            Meta::create($validatedData);
            return redirect()->route('admin.meta.index')->with('success', 'Meta Profil berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['meta_key' => 'Meta Key sudah digunakan.']);
        }
    }    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        return view('admin.meta.edit', compact('meta'));
    }

    public function update(Request $request, $id)
    {
        $meta = Meta::findOrFail($id);
        $meta->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return redirect()->route('admin.meta.index')->with('success', 'Meta Profil berhasil diupdate');
    }

    public function destroy($id)
    {
        Meta::findOrFail($id)->delete();
        return redirect()->route('admin.meta.index')->with('success', 'Meta Profil berhasil dihapus');
    }
}
